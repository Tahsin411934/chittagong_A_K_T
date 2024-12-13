<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransectionProfile;
use App\Models\Member;
class GenerateReceiptController extends Controller
{

    public function create(Request $request)
    {
        $transaction = null;
        $members = null;
        $currentDate=null;
        if ($request->has('Trans_ID')) {
            $transaction = TransectionProfile::where('Trans_ID', $request->input('Trans_ID'))->first();
    
            // Check if transaction exists before fetching member data
            if ($transaction) {
                $members = Member::where('Member_ID', $transaction->Member_ID)->first();
                $currentDate = now()->toDateTimeString();
            } else {
                return redirect()->back()->withErrors(['Trans_ID' => 'Trans_ID not found.']);
            }
        }
    
        return view('user.generateReceipt.generateReceipt', compact('transaction', 'members', 'currentDate'));
    }
    

    public function show(Request $request)
    {
        
        $transId = $request->input('Trans_ID');

        
        if ($transId) {
            try {
               
                $receipt = TransectionProfile::where('Trans_ID', $transId)->firstOrFail();

               
                return view('user.generateReceipt.showReceipt', compact('receipt'));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                
                return redirect()->route('generate-receipt.show')
                    ->with('error', 'Transaction not found for the given ID');
            }
        }

        
        return redirect()->route('user.generateReceipt.generateReceipt')
            ->with('error', 'Transaction ID is required');
    }
}

