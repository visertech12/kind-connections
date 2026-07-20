<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\Facades\Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $pageTitle = 'General Setting';
        $timezones = timezone_identifiers_list();
        $currentTimezone = config('app.timezone');
        return view('admin.setting.general', compact('pageTitle', 'timezones', 'currentTimezone'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|max:100',
            'timezone' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,ico,webp|max:1024',
        ]);

        $general = GeneralSetting::first();
        if (!$general) {
            $general = new GeneralSetting();
        }
        $general->site_name    = $request->site_name;
        $general->envato_token  = $request->envato_token ?? $general->envato_token;
        
        if ($request->has('google_client_id')) {
            $general->google_client_id = $request->google_client_id;
        }
        if ($request->has('google_client_secret')) {
            $general->google_client_secret = $request->google_client_secret;
        }

        $general->save();

        $timezoneFile = config_path('timezone.php');
        $content = "<?php \$timezone = '" . addslashes($request->timezone) . "'; ?>\n";
        file_put_contents($timezoneFile, $content);

        // Env file updating
        $path = base_path('.env');
        $env = file_get_contents($path);
        
        if (preg_match('/APP_TIMEZONE=(.*)/', $env)) {
            $env = preg_replace('/APP_TIMEZONE=(.*)/', 'APP_TIMEZONE="' . $request->timezone . '"', $env);
        } else {
            $env .= "\nAPP_TIMEZONE=\"" . $request->timezone . "\"\n";
        }
        file_put_contents($path, $env);

        $path = public_path('assets/images/logoIcon');
        
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        if ($request->hasFile('logo')) {
            try {
                $image = Image::make($request->file('logo'));
                $image->save($path . '/logo.png');
            } catch (\Exception $exp) {
                return back()->with('error', 'Could not upload the logo.');
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $image = Image::make($request->file('favicon'));
                $image->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                return back()->with('error', 'Could not upload the favicon.');
            }
        }

        try {
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            // Artisan::call can fail on some shared hosting environments
        }

        return back()->with('success', 'General settings updated successfully');
    }
}
