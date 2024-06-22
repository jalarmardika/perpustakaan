<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'members' => Member::orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'nim' => ['required','numeric','unique:members'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'study_program' => ['required','max:255'],
            'no_hp' => ['required','max:13']
        ]);

        Member::create($validatedData);
        return redirect('member')->with('success', 'Data Saved Successfully');
    }

    public function edit(Member $member)
    {
        return view('member.edit', ['member' => $member]);
    }

    public function update(Request $request, Member $member)
    {
        $rules = [
            'name' => ['required','max:255'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'study_program' => ['required','max:255'],
            'no_hp' => ['required','max:13']
        ];

        if ($member->nim != $request->nim) {
            $rules['nim'] = 'required|numeric|unique:members';
        }

        $validatedData = $request->validate($rules);

        $member->update($validatedData);
        return redirect('member')->with('success', 'Data Updated Successfully');
    }

    public function destroy(Member $member)
    {
        try{
            $member->delete();
            return redirect('member')->with('success', 'Data Deleted Successfully');
        } catch (QueryException $e) {
            return redirect('member')->with('fail', 'Data cannot be deleted because there is related transaction data');
        }
    }
}
