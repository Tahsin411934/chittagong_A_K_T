<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TransectionProfile;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->Role === "User") {
            // Fetch the last 6 transactions
            $Transections = TransectionProfile::orderBy('Trans_ID', 'desc')->limit(8)->get();

            // Group transactions by year and count the number of transactions per year
            $transactionsByYear = TransectionProfile::selectRaw('YEAR(date) as year, COUNT(*) as count')
                ->groupByRaw('YEAR(date)')  // Group by year using SQL Server syntax
                ->orderByRaw('YEAR(date) DESC')  // Order by year in descending order
                ->get();

            // Prepare the years and counts for the chart
            $years = $transactionsByYear->pluck('year');
            $counts = $transactionsByYear->pluck('count');

            return view('dashboard', compact('Transections', 'years', 'counts'));
        } else {
            $Transections = TransectionProfile::orderBy('Trans_ID', 'desc')->limit(8)->get();

            // Group transactions by year and count the number of transactions per year
            $transactionsByYear = TransectionProfile::selectRaw('YEAR(date) as year, COUNT(*) as count')
                ->groupByRaw('YEAR(date)')  // Group by year using SQL Server syntax
                ->orderByRaw('YEAR(date) DESC')  // Order by year in descending order
                ->get();

            // Prepare the years and counts for the chart
            $years = $transactionsByYear->pluck('year');
            $counts = $transactionsByYear->pluck('count');
            return view('Admin.deshboard', compact('Transections', 'years', 'counts'));
        }
    }
}


