<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransectionProfile;
use App\Models\Member;

class TransectionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedDate = $request->query('date') ?? now()->format('Y-m-d');
      
        $transactions = TransectionProfile::where('Date', $selectedDate)->get();
    
        // Pass the transactions and the selected date to the view
        return view('user.transectionHistory.index', [
            'transactions' => $transactions,
           'selectedDate' => $selectedDate,
        ]);
    }
    
    public function create(){
        $transections = TransectionProfile::all();
        return view('Admin.view_transection.view_transection', compact('transections'));
    }
    
    
    public function monthlyReport(Request $request)
    {
        // Get the 'year' and 'month' query parameters, or default to current year and month
        $selectedYear = $request->query('year', now()->year);  // Default to current year
        $selectedMonth = $request->query('month', now()->format('m'));  // Default to current month
    
        // Fetch transactions for the selected year and month
        $transactions = TransectionProfile::whereYear('Date', $selectedYear)
                                          ->whereMonth('Date', $selectedMonth)
                                          ->get();
    
        // Pass the transactions, selected month, and selected year to the view
        return view('user.transectionHistory.monthlyReport', [
            'transactions' => $transactions,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ]);
    }
    

    public function findByMemberId(Request $request)
{
    // Get the Member_ID from the request
    $memberId = $request->input('member_id');

    // Fetch the transactions for the given Member_ID
    $transactions = TransectionProfile::where('Member_ID', $memberId)->get();

    // Return the view with transactions and Member_ID
    return view('user.transectionHistory.memberReport', [
        'transactions' => $transactions,
        'memberId' => $memberId,
    ]);
}


public function updateCreate(){
    $transections = TransectionProfile::all();
    return view('Admin.edit_transection.edit_transection', compact('transections'));
}

public function update(Request $request)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'transaction_id' => 'required|exists:Transection_Profile,Trans_ID', // Ensures the Trans_ID exists
        'previous_debit' => 'nullable|numeric', 
        'previous_credit' => 'nullable|numeric',
        'corrected_amount' => 'nullable|numeric',
        'transactionType' => 'required|in:debit,credit',  // Ensure transactionType is either 'debit' or 'credit'
    ]);

    // Find the transaction record by its Trans_ID
    $transaction = TransectionProfile::find($validatedData['transaction_id']);
    $member= Member::find($transaction->Member_ID);
    

    if ($transaction) {
        // Update the fields based on the transaction type
        if ($validatedData['transactionType'] == 'debit') {
            // Update the Debit if transaction type is 'debit'
            $transaction->Debit = $validatedData['corrected_amount'] ?? $transaction->Debit;
        } else {
            // Update the Credit if transaction type is 'credit'
            $transaction->Credit = $validatedData['corrected_amount'] ?? $transaction->Credit;
        }

        // Save the updated record
        $transaction->save();

        // Return success message
        return redirect()->back()->with('success', 'Transaction updated successfully.');
    } else {
        // If transaction is not found
        return redirect()->back()->withErrors(['error' => 'Transaction not found.']);
    }
}

}