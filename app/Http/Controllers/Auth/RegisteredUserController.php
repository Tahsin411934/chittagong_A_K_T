<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'UserName' => ['required', 'string', 'max:255'],
            'Name' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
            'Image' => ['required','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'Signature' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // Prepare image paths
        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imageExtension = $request->file('Image')->getClientOriginalExtension();
            $imagePath = 'images/' . $request->UserName . '.' . $imageExtension;
            $request->file('Image')->storeAs('public/' . dirname($imagePath), basename($imagePath));
        }

        $signaturePath = null;
        if ($request->hasFile('Signature')) {
            $signatureExtension = $request->file('Signature')->getClientOriginalExtension();
            $signaturePath = 'Signatures/' . $request->UserName . '.' . $signatureExtension;
            $request->file('Signature')->storeAs('public/' . dirname($signaturePath), basename($signaturePath));
        }

        $user = User::create([
            'UserName' => $request->UserName,
           'password' => Hash::make($request->password),// Access password directly from $request
            'Name' => $request->Name,
            'Role' => $request->Role,
            'Image' => $imagePath,
            'Signature' => $signaturePath,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
