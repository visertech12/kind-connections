<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*--------------------------------------------------
     | Show login form
     *-------------------------------------------------*/
    public function login()
    {
        return view('template.user.login');
    }

    /*--------------------------------------------------
     | Handle login
     *-------------------------------------------------*/
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login       = $request->username;
        $field       = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [$field => $login, 'password' => $request->password];

        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            $pending = session()->get('pending_order');
            $request->session()->regenerate();
            if ($pending) {
                session()->put('pending_order', $pending);
            }

            $user = Auth::guard('web')->user();

            // Login Log Create
            $ip = getRealIP();
            $exist = \App\Models\UserLogin::where('user_ip', $ip)->first();
            $userLogin = new \App\Models\UserLogin();

            if ($exist) {
                $userLogin->longitude =  $exist->longitude;
                $userLogin->latitude =  $exist->latitude;
                $userLogin->city =  $exist->city;
                $userLogin->country_code = $exist->country_code;
                $userLogin->country =  $exist->country;
            } else {
                $info = json_decode(json_encode(getIpInfo()), true);
                $userLogin->longitude =  @implode(',', $info['long']);
                $userLogin->latitude =  @implode(',', $info['lat']);
                $userLogin->city =  @implode(',', $info['city']);
                $userLogin->country_code = @implode(',', $info['code']);
                $userLogin->country =  @implode(',', $info['country']);
            }

            $userAgent = osBrowser();
            $userLogin->user_id = $user->id;
            $userLogin->user_ip =  $ip;
            $userLogin->browser = @$userAgent['browser'];
            $userLogin->os = @$userAgent['os_platform'];
            $userLogin->save();

            if ($user->profile_complete == 0) {
                return redirect()->route('user.profile.complete')->with('success', 'Logged in! Please complete your profile first.');
            }
            
            if (session()->has('pending_order')) {
                return redirect()->route('user.product.order.process');
            }

            $redirect = $request->input('redirect');
            if ($redirect && filter_var($redirect, FILTER_VALIDATE_URL) && str_starts_with($redirect, url('/'))) {
                return redirect($redirect)->with('success', 'Logged in successfully.');
            }
            return redirect(route('user.home'))->with('success', 'Logged in successfully.');
        }

        return back()->with('error', 'Invalid credentials.')->withInput();
    }

    /*--------------------------------------------------
     | Show register form
     *-------------------------------------------------*/
    public function register()
    {
        return view('template.user.register');
    }

    /*--------------------------------------------------
     | Handle registration
     *-------------------------------------------------*/
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname'  => 'required|string|max:40',
            'email'     => 'required|string|email|max:40|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        $user            = new User();
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email     = $request->email;
        $user->username  = strtolower(trim($request->firstname)) . rand(100, 999);
        $user->password  = Hash::make($request->password);
        $user->status    = 1;
        $user->ev        = 1;
        $user->sv        = 1;
        $user->kv        = 1;
        $user->save();

        $pending = session()->get('pending_order');
        Auth::guard('web')->login($user);
        $request->session()->regenerate();
        if ($pending) {
            session()->put('pending_order', $pending);
        }

        if (session()->has('pending_order')) {
            return redirect()->route('user.product.order.process');
        }

        $redirect = $request->input('redirect');
        if ($redirect && filter_var($redirect, FILTER_VALIDATE_URL) && str_starts_with($redirect, url('/'))) {
            return redirect($redirect)->with('success', 'Registration successful! Welcome aboard.');
        }

        return redirect()->route('user.home')->with('success', 'Registration successful! Welcome aboard.');
    }

    /*--------------------------------------------------
     | Logout
     *-------------------------------------------------*/
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Logged out successfully.');
    }

    /*--------------------------------------------------
     | Forgot password form
     *-------------------------------------------------*/
    public function forgotPassword()
    {
        return view('template.auth.forgot');
    }

    /*--------------------------------------------------
     | Social login redirect
     *-------------------------------------------------*/
    public function socialLogin($provider)
    {
        return \Laravel\Socialite\Facades\Socialite::driver($provider)->redirect();
    }

    public function socialLoginCallback($provider)
    {
        try {
            $socialUser = \Laravel\Socialite\Facades\Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('user.login')->with('error', 'Authentication failed');
        }

        $user = User::where('provider_id', $socialUser->getId())->orWhere('email', $socialUser->getEmail())->first();

        if (!$user) {
            // create user
            $user = new User();
            $user->firstname = $socialUser->getName() ?? 'User';
            $user->lastname = '';
            $user->email = $socialUser->getEmail();
            $user->username = explode('@', $socialUser->getEmail())[0] . rand(100, 999);
            $user->password = \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(24));
            $user->provider = $provider;
            $user->provider_id = $socialUser->getId();
            $user->status = 1;
            $user->ev = 1;
            $user->sv = 1;
            $user->kv = 1;
            $user->save();
        } else {
            // update provider id if not set
            if (!$user->provider_id) {
                $user->provider = $provider;
                $user->provider_id = $socialUser->getId();
                $user->save();
            }
        }

        Auth::guard('web')->login($user);
        return redirect()->route('user.home')->with('success', 'Logged in via ' . ucfirst($provider) . ' successfully.');
    }
}
