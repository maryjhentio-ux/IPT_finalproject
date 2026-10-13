<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    // READ: Display all membership records
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.index', compact('memberships'));
    }

    // CREATE: Show form to create a new membership
    public function create()
    {
        return view('memberships.create');
    }

    // STORE: Save the new membership record to the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        Membership::create($validated);

        return redirect()->route('memberships.index')->with('success', 'Membership added successfully!');
    }

    // EDIT: Show form to edit an existing record
    public function edit(Membership $membership)
    {
        return view('memberships.edit', compact('membership'));
    }

    // UPDATE: Update the record in the database
    public function update(Request $request, Membership $membership)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $membership->update($validated);

        return redirect()->route('memberships.index')->with('success', 'Membership updated successfully!');
    }

    // DESTROY: Delete the record
    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Membership removed successfully!');
    }
}