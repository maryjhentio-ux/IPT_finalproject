<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Student;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with(['student', 'organization'])
            ->latest()->paginate(10);

        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        $students = Student::orderBy('last_name')->get();
        $organizations = Organization::orderBy('name')->get();

        return view('memberships.create', compact('students', 'organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,id',
                Rule::unique('memberships', 'student_id')
                    ->where(fn ($query) => $query->where(
                        'organization_id', $request->input('organization_id')
                    )),
            ],
            'organization_id' => ['required', 'exists:organizations,id'],
            'joined_at' => ['required', 'date'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        Membership::create($validated);

        return redirect()->route('memberships.index')
            ->with('success', 'Membership created successfully.');
    }

    public function show(Membership $membership)
    {
        $membership->load(['student', 'organization']);

        return view('memberships.show', compact('membership'));
    }

    public function edit(Membership $membership)
    {
        $students = Student::orderBy('last_name')->get();
        $organizations = Organization::orderBy('name')->get();

        return view('memberships.edit', compact(
            'membership', 'students', 'organizations'
        ));
    }

    public function update(Request $request, Membership $membership)
    {
        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,id',
                Rule::unique('memberships', 'student_id')
                    ->where(fn ($query) => $query->where(
                        'organization_id', $request->input('organization_id')
                    ))
                    ->ignore($membership->id),
            ],
            'organization_id' => ['required', 'exists:organizations,id'],
            'joined_at' => ['required', 'date'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $membership->update($validated);

        return redirect()->route('memberships.index')
            ->with('success', 'Membership updated successfully.');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('memberships.index')
            ->with('success', 'Membership deleted successfully.');
    }
}
