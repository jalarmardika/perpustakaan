<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
    	return view('report');
    }

    public function filter(Request $request)
    {
    	$validatedData = $request->validate([
    		'start' => 'required|date',
    		'end' => 'required|date'
    	]);
    	return view('report', [
            'startDate' => $request->start,
            'endDate' => $request->end,
            'transactions' => Transaction::whereDate('transaction_date', '>=', $validatedData['start'])->whereDate('transaction_date', '<=', $validatedData['end'])->get()
        ]);
    }
}
