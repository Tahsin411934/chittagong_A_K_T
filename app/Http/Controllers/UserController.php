<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('Admin.addUser.add-user');
    }

    public function store(Request $request)
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
           'password' => ($request->password),// Access password directly from $request
            'Name' => $request->Name,
            'Role' => $request->Role,
            'Image' => $imagePath,
            'Signature' => $signaturePath,
        ]);

        return redirect()->route('users.create')->with('success', 'User added successfully.');
    }

    public function setRoleCreate() 
    {
        $users= User::all();
   
            return view('Admin.update-role.update-role', ['users' => $users]);
    }
    public function updateRole(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'UserName' => 'required|string|max:255',  // Ensure the username exists in the users table
            'FullName' => 'required|string|max:255',
            'CurrentPosition' => 'required|string|max:255',
            'Role' => 'required|string|in:admin,user,moderator',
        ]);
    
        // Find the user by the given username
        $user = User::where('UserName', $request->UserName)->firstOrFail();
    
        // Check if the current role matches the user's role
        if ($user->Role !== $request->CurrentPosition) {
            return back()->with('error', 'The role does not match the current role of the user!');
        }
    
        // Update the user's data
        $user->update([
           
            'Role' => $request->Role,
        ]);
    
        // Return success message
        return redirect()->back()->with('success', 'User role updated successfully!');
    }

    // Controller Method to show the reset password form
public function resetPasswordCreate()
{
    $users = User::all(); 
    return view('Admin.reset-password.reset-password', compact('users')); // Pass the users data to the view
}


public function resetPassword(Request $request)
{
    // Validate incoming data
    $request->validate([
        'UserName' => 'required|string|max:255',  
        'NewPassword' => ['required', 'min:8', 'confirmed'],  
        'old_password' => ['required', 'min:8'],  
    ]);

   
    try {
        $user = User::where('UserName', $request->UserName)->firstOrFail();
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->withErrors(['UserName' => 'Username not found!']);
    }

    // Verify old password directly (not recommended for production)
    if ($request->old_password !== $user->password) {
        return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
    }

    // Update the password directly (no hashing)
    $user->update([
        'password' => $request->NewPassword,
    ]);

    // Return success message
    return redirect()->back()->with('success', 'Password reset successfully!');
}



    
}