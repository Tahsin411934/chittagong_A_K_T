<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\Member;

class NomineeController extends Controller
{
    public function create()
    {
        $members = Member::all(); // Fetch all members
        return view('user.nominees.create', compact('members'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'Member_ID' => 'required|exists:User_Info,Member_ID', // Validate against Member_ID in members table
            'Name' => 'required|string|max:255',
            'Age' => 'required|integer',
            'Address' => 'required|string',
            'Relation' => 'required|string',
            'Percentage' => 'required|numeric|min:0|max:100',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Signature' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Nominee instance, excluding images
        $nominee = new Nominee($request->except(['Image', 'Signature']));

        // Handle nominee image upload
        if ($request->hasFile('Image')) {
            $nomineeImage = $request->file('Image');
            $nomineeImageName = time() . '_' . $nomineeImage->getClientOriginalName();
            $nomineeImage->move(public_path('nominee_images'), $nomineeImageName);
            $nominee->Image = 'nominee_images/' . $nomineeImageName; // Save path in Image column
        }

        // Handle nominee signature upload
        if ($request->hasFile('Signature')) {
            $nomineeSignature = $request->file('Signature');
            $nomineeSignatureName = time() . '_' . $nomineeSignature->getClientOriginalName();
            $nomineeSignature->move(public_path('nominee_signatures'), $nomineeSignatureName);
            $nominee->Signature = 'nominee_signatures/' . $nomineeSignatureName; // Save path in Signature column
        }

        // Save the nominee
        $nominee->save();

        return redirect()->route('user.nominees.create')->with('success', 'Nominee added successfully!');
    }
}
