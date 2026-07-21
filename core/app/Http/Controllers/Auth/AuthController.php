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
     | Save a login record for the given user
     *-------------------------------------------------*/
    protected function storeLoginLog($user)
    {
        try {
            $ip = getRealIP();
            $exist = \App\Models\UserLogin::where('user_ip', $ip)->first();
            $userLogin = new \App\Models\UserLogin();

            if ($exist) {
                $userLogin->longitude   = $exist->longitude;
                $userLogin->latitude    = $exist->latitude;
                $userLogin->city        = $exist->city;
                $userLogin->country_code = $exist->country_code;
                $userLogin->country     = $exist->country;
            } else {
                $info = json_decode(json_encode(getIpInfo()), true);
                $userLogin->longitude    = is_array(@$info['long'])    ? @implode(',', $info['long'])    : (string)@$info['long'];
                $userLogin->latitude     = is_array(@$info['lat'])     ? @implode(',', $info['lat'])     : (string)@$info['lat'];
                $userLogin->city         = is_array(@$info['city'])    ? @implode(',', $info['city'])    : (string)@$info['city'];
                $userLogin->country_code = is_array(@$info['code'])    ? @implode(',', $info['code'])    : (string)@$info['code'];
                $userLogin->country      = is_array(@$info['country']) ? @implode(',', $info['country']) : (string)@$info['country'];
            }

            $userAgent = osBrowser();
            $userLogin->user_id = $user->id;
            $userLogin->user_ip = $ip;
            $userLogin->browser = @$userAgent['browser'];
            $userLogin->os      = @$userAgent['os_platform'];
            $userLogin->save();
        } catch (\Throwable $e) {
            // silently ignore geo/log failures
        }
    }

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
            $this->storeLoginLog($user);

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
            'username'  => 'required|string|min:3|max:40|alpha_dash|unique:users,username',
            'email'     => 'required|string|email|max:40|unique:users',
            'password'  => 'required|string|min:6',
        ], [
            'username.unique' => 'This username is already taken.',
            'email.unique'    => 'This email is already registered.',
            'username.alpha_dash' => 'Username may only contain letters, numbers, dashes and underscores.',
        ]);

        $user            = new User();
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email     = $request->email;
        $user->username  = strtolower(trim($request->username));
        $user->password  = Hash::make($request->password);
        $user->status    = 1;
        $user->ev        = 1;
        $user->sv        = 1;
        $user->kv        = 1;
        $user->save();

        $pending = session()->get('pending_order');
        Auth::guard('web')->login($user);
        $request->session()->regenerate();
        $this->storeLoginLog($user);
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

        $pending = session()->get('pending_order');
        Auth::guard('web')->login($user);
        session()->regenerate();
        if ($pending) {
            session()->put('pending_order', $pending);
        }
        $this->storeLoginLog($user);

        if ($user->profile_complete == 0) {
            return redirect()->route('user.profile.complete')->with('success', 'Logged in! Please complete your profile first.');
        }

        if (session()->has('pending_order')) {
            return redirect()->route('user.product.order.process');
        }

        return redirect()->route('user.home')->with('success', 'Logged in via ' . ucfirst($provider) . ' successfully.');
    }
}
