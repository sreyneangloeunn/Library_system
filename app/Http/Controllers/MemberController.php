<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone = $request->input('phone');
        $member->role = $request->input('role');
        $member->membership_date = $request->input('membership_date');

        $member->save();
        return response()->json([
            'message' => 'create member succesfully',
            'data' => $member,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Member::find($id);

        return response()->json([
            'message' => 'show member',
            'data' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateMemberRequest $request, Member $member)
    {
        // Validate incoming request
        $validated = $request->validated();

        $member->update($validated);
        $member->save();

        return response()->json([
            'message' => 'Member updated successfully',
            'data'    => $member
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json([
            'message' => 'member delete succesfully',
        ]);
    }
}
