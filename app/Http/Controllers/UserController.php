<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    	return view('user.index', [
    		'users' => User::orderBy('id', 'desc')->get()
    	]);
    }

    public function create()
    {
    	return view('user.create');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name' => 'required|max:255',
    		'email' => 'required|email|unique:users|max:255',
    		'password' => 'required|max:255|min:5'
    	]);

    	$validatedData['password'] = Hash::make($validatedData['password']);
    	if ($request->is_admin) {
    		$validatedData['is_admin'] = 1;
    	}

    	User::create($validatedData);
    	return redirect('user')->with('success', 'Data Saved Successfully');
    }

    public function edit(Request $request, User $user)
    {
    	return view('user.edit', [
    		'user' => $user
    	]);
    }

    public function update(Request $request, User $user)
    {
    	$rules = [
    		'name' => 'required|max:255'
    	];

    	if ($request->email != $user->email) {
    		$rules['email'] = 'required|email|unique:users|max:255';
    	}

    	if ($request->password) {
    	    $rules['password'] = 'max:255|min:5';
    	}

    	$validatedData = $request->validate($rules);

    	if (isset($validatedData['password'])) {
	    	$validatedData['password'] = Hash::make($validatedData['password']);
    	}

    	if ($request->is_admin) {
    		$validatedData['is_admin'] = 1;
    	} else {
    		$validatedData['is_admin'] = 0;
    	}

    	$user->update($validatedData);
    	return redirect('user')->with('success', 'Data Updated Successfully');
    }

    public function destroy(User $user)
    {
    	try {
	    	$user->delete();
	    	return redirect('user')->with('success', 'Data Deleted Successfully');
    	} catch (QueryException $e) {
    		return redirect('user')->with('fail', 'Data cannot be deleted because there is related transaction data');
    	}
    }
}
