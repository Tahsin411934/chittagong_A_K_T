<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('Admin.view_member.view_member', ['members' => $members]);
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
        $data['CurrentAmount'] = '0';
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

    public function memberInfo(Request $request)
    {
        $members = Member::all();

        $selectedMember = null;
        if ($request->has('Member_ID')) {
            $selectedMember = Member::with('nominees')->where('Member_ID', $request->input('Member_ID'))->first();

            if (!$selectedMember) {
                return redirect()->back()->withErrors(['Member_ID' => 'Member not found.']);
            }
        }

        return view('user.memberInfo.showMemberInfo', compact('selectedMember', 'members'));
    }

    public function updateMember(Request $request)
    {
       //dd($request);
      
        try {
      
            $request->validate([
                'Member_ID' => 'required',
                'Name' => 'required|string|max:255',
                'FatherName' => 'nullable|string|max:255',
                'MotherName' => 'nullable|string|max:255',
                'SpouseName' => 'nullable|string|max:255',
                'PerAddress' => 'nullable|string|max:500',
                'MailAddress' => 'nullable|string|max:500',
                'PhoneNumber' => 'nullable|string|max:20',
                'EMail' => 'nullable|email|max:255',
                'DateOfBirth' => 'nullable|date',
                'NID' => 'nullable|string|max:20',
                'Date' => 'nullable|date',
                'Occupation' => 'nullable|string|max:255',
                'EducationalQualification' => 'nullable|string|max:255',
                'MemberOfAkhondomondoli' => 'nullable|string|max:255',
                'AddressOfAkhondomondoli' => 'nullable|string|max:500',
                'VerifiedBy' => 'nullable|string|max:255',
                // 'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'Signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'CurrentAmount' => 'nullable|numeric',
            ]);
    
    
           
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
    
        // Find member by Member_ID
        $member = Member::where('member_id', $request->Member_ID)->first();

        if (!$member) {
            return redirect()->route('admin.members.index')->with('error', 'Member not found.');
        }

       

        $member = Member::find($request->Member_ID);
        DB::table('User_Info')
    ->where('member_id', $request->Member_ID)
    ->update([
        'Name' => $request->Name,
        'FatherName' => $request->FatherName,
        'MotherName' => $request->MotherName,
        'SpouseName' => $request->SpouseName,
        'PerAddress' => $request->PerAddress,
        'MailAddress' => $request->MailAddress,
        'PhoneNumber' => $request->PhoneNumber,
        'EMail' => $request->EMail,
        'DateOfBirth' => $request->DateOfBirth,
        'NID' => $request->NID,
        'Date' => $request->Date,
        'Occupation' => $request->Occupation,
        'EducationalQualification' => $request->EducationalQualification,
        'MemberOfAkhondomondoli' => $request->MemberOfAkhondomondoli,
        'AddressOfAkhondomondoli' => $request->AddressOfAkhondomondoli,
        'VerifiedBy' => $request->VerifiedBy,
        'CurrentAmount' => $request->CurrentAmount,
    ]);

        
     


        return redirect()->back()->with('success', 'Member information updated successfully.');
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
    public function update(Request $request, $Member_ID)
    {
        // Find the member by the primary key (Member_ID)
        dd('hello');
        $member = Member::findOrFail($Member_ID);
    
        // Update logic
        $member->update($request->all());
    
        return redirect()->route('member.index'); // Or any other redirect as needed
    }
    
    
   
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
