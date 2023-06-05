<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Customize the logic after successful login if needed
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ])->status(429);
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        $maxLoginAttempts = 3;
        $lockoutTime = 30; // in seconds

        if ($this->limiter()->tooManyAttempts($this->throttleKey($request), $maxLoginAttempts)) {
            Cache::put($this->throttleKey($request), true, $lockoutTime);
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.throttle', ['seconds' => $lockoutTime])],
            ])->status(429);
        }

        return $this->limiter()->tooManyAttempts($this->throttleKey($request), $maxLoginAttempts);
    }

    protected function throttleKey(Request $request)
    {
        return mb_strtolower($request->input($this->username())) . '|' . $request->ip();
    }
}
