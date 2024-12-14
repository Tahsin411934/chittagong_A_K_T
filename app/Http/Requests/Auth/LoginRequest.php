<?php

namespace App\Http\Requests\Auth;

use App\Models\User; // Ensure this line is added
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash; // Make sure to import Hash

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'UserName' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited(); // Ensure the rate limit is not exceeded

        // Get the credentials
        $credentials = $this->only('UserName', 'password','type','secretary_password','president_password');
        // Fetch the user from the database
        $user = User::where('UserName', $credentials['UserName'])->first();

        // Debugging: Check user info and input
        // dd([
        //     'Input Username' => $credentials['UserName'],
        //     'Input Password' => $credentials['password'],
        //     'Found User' => $user ? $user->toArray() : null,
        //     'Stored Password' => $user ? $user->Password : null, // Change this to 'Password' as per your DB field
        // ]);

        // Check if user exists and verify the hashed password
        if ($user && $credentials['password']=== $user->Password && $credentials['type'] === "user" ) { // Verify hashed password
            // If the user is found and the password matches, log the user in
            Auth::login($user);
            RateLimiter::clear($this->throttleKey()); // Clear the rate limiter for this user
        }elseif ($user && $credentials['password']=== $user->Password && $credentials['type'] === "admin" ) {
            if($credentials['secretary_password'] != NULL || $credentials['president_password'] != NULL){
                Auth::login($user);
                RateLimiter::clear($this->throttleKey());
            }
        }
        
        
        else {
            // Hit the rate limiter and throw an error if authentication fails
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'UserName' => trans('auth.failed'), // Return authentication failed message
            ]);
        }
        // if ($user && Hash::check($credentials['password'], $user->Password)) { // Verify hashed password
        //     // If the user is found and the password matches, log the user in
        //     Auth::login($user);
        //     RateLimiter::clear($this->throttleKey()); // Clear the rate limiter for this user
        // } else {
        //     // Hit the rate limiter and throw an error if authentication fails
        //     RateLimiter::hit($this->throttleKey());
        //     throw ValidationException::withMessages([
        //         'UserName' => trans('auth.failed'), // Return authentication failed message
        //     ]);
        // }
    }



    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'UserName' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('UserName')).'|'.$this->ip());
    }
}
