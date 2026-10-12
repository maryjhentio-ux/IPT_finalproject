
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Student *</label>
        <select name="student_id" class="form-select" required>
            <option value="">Select student</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}"
                    @selected((string) old('student_id', $officer->student_id ?? '') === (string) $student->id)>
                    {{ $student->student_number }} —
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>
        @error('student_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Organization *</label>
        <select name="organization_id" class="form-select" required>
            <option value="">Select organization</option>
            @foreach ($organizations as $organization)
                <option value="{{ $organization->id }}"
                    @selected((string) old('organization_id', $officer->organization_id ?? '') === (string) $organization->id)>
                    {{ $organization->name }}
                </option>
            @endforeach
        </select>
        @error('organization_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Position *</label>
        <select name="position" class="form-select" required>
            <option value="">Select position</option>
            @foreach (['President', 'Vice President', 'Secretary', 'Treasurer', 'Auditor', 'Public Information Officer', 'Other'] as $position)
                <option value="{{ $position }}"
                    @selected(old('position', $officer->position ?? '') === $position)>
                    {{ $position }}
                </option>
            @endforeach
        </select>
        @error('position')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Start Date *</label>
        <input type="date" name="start_date"
               value="{{ old('start_date', isset($officer) ? $officer->start_date->format('Y-m-d') : '') }}"
               class="form-control" required>
        @error('start_date')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">End Date</label>
        <input type="date" name="end_date"
               value="{{ old('end_date', isset($officer) && $officer->end_date ? $officer->end_date->format('Y-m-d') : '') }}"
               class="form-control">
        @error('end_date')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        Please correct the errors before submitting.
    </div>
@endif

<div class="my-4"></div>
