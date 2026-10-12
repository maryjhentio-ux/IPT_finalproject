
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Student *</label>
        <select name="student_id" class="form-select" required>
            <option value="">Select student</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}"
                    @selected((string) old('student_id', $membership->student_id ?? '') === (string) $student->id)>
                    {{ $student->student_number }} —
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>
        @error('student_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Organization *</label>
        <select name="organization_id" class="form-select" required>
            <option value="">Select organization</option>
            @foreach ($organizations as $organization)
                <option value="{{ $organization->id }}"
                    @selected((string) old('organization_id', $membership->organization_id ?? '') === (string) $organization->id)>
                    {{ $organization->name }}
                </option>
            @endforeach
        </select>
        @error('organization_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Date Joined *</label>
        <input type="date" name="joined_at"
               value="{{ old('joined_at', isset($membership) ? $membership->joined_at->format('Y-m-d') : date('Y-m-d')) }}"
               class="form-control" required>
        @error('joined_at') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Membership Status *</label>
        <select name="status" class="form-select" required>
            @foreach (['active', 'inactive'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $membership->status ?? 'active') === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        Please correct the errors before submitting.
    </div>
@endif

<div class="my-4"></div>
