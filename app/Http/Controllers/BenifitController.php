<?php

namespace App\Http\Controllers;
use App\Models\BankInfo;
use App\Models\BankTransactionProfile;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BenifitController extends Controller
{
    public function create(){

        return view('Admin.benifits.add_bank_account');
    }

    public function store(Request $request)
{
   
    $validatedData = $request->validate([
        'bank_name' => 'required|string|max:255',
        'branch_name' => 'required|string|max:255',
        'acc_no' => 'required|string|unique:Bank_Info,Acc_No|max:50',
        'acc_type' => 'required|string|in:Savings,Current',
        'opening_year' => 'required|integer|min:1900|max:' . date('Y'),
        'duration' => 'nullable|integer|min:1',
        'opening_amount' => 'required|numeric|min:0',
        'active' => 'required|boolean',
    ]);

    // Create a new Bank_Info record
    $bankInfo = new BankInfo([
        'Bank_Name' => $validatedData['bank_name'],
        'Branch_Name' => $validatedData['branch_name'],
        'Acc_No' => $validatedData['acc_no'],
        'Acc_Type' => $validatedData['acc_type'],
        'Opening_Year' => $validatedData['opening_year'],
        'Duration' => $validatedData['duration'],
        'Opening_Amount' => $validatedData['opening_amount'],
        'Current_Amount' => $validatedData['opening_amount'], // Initial current amount is same as opening
        'Active' => $validatedData['active'],
    ]);

    // Save the record
    $bankInfo->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Bank information added successfully.');
}
public function createAddInterest(){

    $banks= BankInfo::all();
    return view('Admin.benifits.add_interest', compact('banks'));
}


public function storeInterest(Request $request)
{
    // Validation of input data 
    $validatedData = $request->validate([
        'bank_acc_id' => 'required|string|max:255',
        'cause' => 'required|string|max:255',
        'year' => 'required|integer',
        'amount' => 'nullable|numeric',
    ]);

    // Set Debit or Credit value based on the 'cause' field
   

    // Fetch the current transaction details for the specified bank account
   
    $debit = 0;
    $credit = null;
    // If the cause is 'interest added', calculate the new debit
    if ($request->cause == 'interest added') {
        // If there's an existing Debit value, add the new amount to it; otherwise, use the amount as is
        $credit =  $validatedData['amount'] ?? 0 ;
    } else {
        // If the cause is not 'interest added', subtract the amount from the existing Credit value
        $debit =  $validatedData['amount'] ?? 0;
    }

    // Create a new record in the BankTransactionProfile model
    $newBankTransaction = new BankTransactionProfile([
        'Bank_Acc_Id' => $validatedData['bank_acc_id'],
        'Cause' => $validatedData['cause'],
        'Date_Time' => Carbon::now(), // Use Carbon::now() to get the current date and time
        'Year' => $validatedData['year'],
        'Debit' => $debit, // Set Debit
        'Credit' => $credit, // Set Credit (subtracting amount if not 'interest added')
    ]);

    // Save the record into the database
    $newBankTransaction->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Bank Transaction added successfully.');
}
public function createDeductionInterest(){

    $banks= BankInfo::all();
    return view('Admin.benifits.deduction_interest', compact('banks'));
}

}
