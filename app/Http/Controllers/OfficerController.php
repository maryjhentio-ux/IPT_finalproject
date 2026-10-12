<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\Student;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::with(['student', 'organization'])
            ->latest()->paginate(10);

        return view('officers.index', compact('officers'));
    }

    public function create()
    {
        $students = Student::orderBy('last_name')->get();
        $organizations = Organization::orderBy('name')->get();

        return view('officers.create', compact('students', 'organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'organization_id' => ['required', 'exists:organizations,id'],
            'position' => ['required', 'string', 'max:100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        Officer::create($validated);

        return redirect()->route('officers.index')
            ->with('success', 'Officer assigned successfully.');
    }

    public function show(Officer $officer)
    {
        $officer->load(['student', 'organization']);

        return view('officers.show', compact('officer'));
    }

    public function edit(Officer $officer)
    {
        $students = Student::orderBy('last_name')->get();
        $organizations = Organization::orderBy('name')->get();

        return view('officers.edit', compact(
            'officer', 'students', 'organizations'
        ));
    }

    public function update(Request $request, Officer $officer)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'organization_id' => ['required', 'exists:organizations,id'],
            'position' => ['required', 'string', 'max:100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $officer->update($validated);

        return redirect()->route('officers.index')
            ->with('success', 'Officer updated successfully.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('officers.index')
            ->with('success', 'Officer record deleted successfully.');
    }
}
