<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoansRequest;
use App\Http\Requests\UpdateLoansRequest;
use App\Models\Loans;
use GuzzleHttp\Promise\Create;
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
    public function store(StoreLoansRequest $request )
    {
        $validated =$request->validated();

        $loan = Loans::create($validated);
        return response()->json([
            "message"=>"Create succesfully",
            "data"=>$loan,
        ]);

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loan = Loans::find($id);
        
        return response()->json([
        "message" => "Show loan",
        "data" => $loan,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoansRequest $request, Loans $loan)
{
    // Validate incoming request
    $validated = $request->validated();


    $loan->update($validated);

    return response()->json([
        'message' => 'Loan updated successfully',
        'data'    => $loan,
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loan)
    {
        $loan->delete();

        return response()->json([
            'message'=>'delete succesfully'
        ]);
    }
}
