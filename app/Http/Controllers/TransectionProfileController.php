<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TransectionProfile;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
class TransectionProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
{
    // dd($type);
    if ($type == 'withdrawls') {
        $members = Member::all();
        // return view('deposits.create', compact('members'));
        return view('user.transection_profiles.withdrawals', compact('members'));
    } else {
        $members = Member::all();
        // return view('deposits.create', compact('members'));
        return view('user.transection_profiles.create', compact('members'));
    }
    
   
}

public function store(Request $request)
{
    $request->validate([
        'Member_ID' => 'required|string',
        'Date' => 'required|date',
        'Debit' => 'nullable|numeric',
        'Credit' => 'nullable|numeric',
    ]);

    // Retrieve member and ensure it exists
    $member = Member::where('Member_ID', $request->input('Member_ID'))->firstOrFail();

    // Prepare data for transaction
    $data = $request->all();
    $data['User_ID'] = Auth::id(); // Set User_ID to the logged-in user's ID

    $transection = null; // Declare variable outside the closure

    // Start a transaction
    DB::transaction(function () use (&$transection, $data, $member) {
        // Create the transaction
        $transection = TransectionProfile::create($data);

        // Update the Member's CurrentAmount based on Debit and Credit
        $currentAmount = (float)$member->CurrentAmount;

        if (!empty($data['Debit'])) {
            $currentAmount += (float)$data['Debit']; // Increase CurrentAmount by Debit
        }

        if (!empty($data['Credit'])) {
            $currentAmount -= (float)$data['Credit']; // Decrease CurrentAmount by Credit
        }

        // Update the CurrentAmount in the database
        DB::table('User_Info')
            ->where('member_id', $member->Member_ID) // Use member's Member_ID
            ->update(['CurrentAmount' => $currentAmount]);

        // Optionally return or store the transaction ID if needed
    });

    // Redirect to the show page of the newly created transaction
    return redirect()->route('transection_profiles.show', $transection->Trans_ID, )
                     ->with('success', 'Profile created successfully.')
                     ->with('member', $member); 
}










    /**
     * Display the specified resource.
     */
    public function show(string $Trans_ID)
    {
        // Retrieve the transection record
        $transection = TransectionProfile::where('Trans_ID', $Trans_ID)->firstOrFail();
        
        // Retrieve the member data related to this transaction
        $member = DB::table('User_Info')
            ->select('Member_ID', 'Name', 'CurrentAmount')
            ->where('Member_ID', $transection->Member_ID)
            ->first();  // Use first() to get a single record
    
        // Pass the data to the view
        return view('user.transection_profiles.show', compact('transection', 'member'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
