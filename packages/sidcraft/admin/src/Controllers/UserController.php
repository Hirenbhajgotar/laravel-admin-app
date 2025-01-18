<?php

// namespace App\Http\Controllers\Admin;
namespace Sidcraft\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // return view('sidcraft.admin.users.index', compact('users'));
        return view('admin::users.index', compact('users'));
    }

    public function create()
    {
        // return view('sidcraft.admin.users.create');
        return view('admin::users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        User::create($request->all());

        // return redirect()->route('users.index')->with('success', 'User created successfully.');
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('sidcraft.admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // return view('sidcraft.admin.users.edit', compact('user'));
        return view('admin::users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        // return redirect()->route('users.index')->with('success', 'User updated successfully.');
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        // return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
