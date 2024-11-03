<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $totalMembers = Member::count();
        $largestMemberId = Member::max('member_id'); 
        return view('user.member.create', compact('totalMembers', 'largestMemberId'));
    }
    

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
           'member_id' => 'required|integer',
  // Changed 'int' to 'integer' for consistency
            'Name' => 'required|string|max:255',  
            'FatherName' => 'required|string|max:255',  
            'MotherName' => 'required|string|max:255',  
            'SpouseName' => 'nullable|string|max:255',  
            'PerAddress' => 'required|string',  
            'MailAddress' => 'required|string',  
            'PhoneNumber' => 'nullable|string|max:15',  
            'EMail' => 'nullable|email|max:255',  
            'DateOfBirth' => 'nullable|date',  
            'NID' => 'nullable|string|max:255',
            'Date' => 'nullable|date',   
            'Occupation' => 'nullable|string|max:255',  
            'EducationalQualification' => 'nullable|string|max:255',  
            'MemberOfAkhondomondoli' => 'nullable|string|max:255', 
            'AddressOfAkhondomondoli' => 'nullable|string|max:255',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

           
        ]);
        

        // Create a new member
        $data = $request->except(['image', 'signature']);
        $data['CurrentAmount'] = '1';
        $data['Date'] = now();
        // Handle image upload
       // Handle image upload
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = $request->member_id . '_image.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $data['image'] = 'images/' . $imageName;
}

// Handle signature upload
if ($request->hasFile('signature')) {
    $signature = $request->file('signature');
    $signatureName = $request->member_id . '_signature.' . $signature->getClientOriginalExtension();
    $signature->move(public_path('signatures'), $signatureName);
    $data['signature'] = 'signatures/' . $signatureName;
}


        Member::create($data);

        return redirect()->route('member.create')->with('success', 'Member added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
