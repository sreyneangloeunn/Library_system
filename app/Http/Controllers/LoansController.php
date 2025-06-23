<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Loans::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loan = new Loans();
        $loan->member_id = $request->input('member_id');
        $loan->book_id = $request->input('book_id');
        $loan->Loan_date = $request->input('loan_date');
        $loan->due_date = $request->input('due_date');
        $loan->return_date = $request->input('return_date');
        $loan->status = $request->input('status');

        $loan->save();
        return response()->json([
            "message"=>"Create succesfully",
            "data"=>$loan,
        ]);

    }


    /**
     * Display the specified resource.
     */
    public function show(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loans $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loans)
    {
        //
    }
}
