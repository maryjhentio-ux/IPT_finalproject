
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Student Number *</label>
        <input type="text" name="student_number"
               value="{{ old('student_number', $student->student_number ?? '') }}"
               class="form-control @error('student_number') is-invalid @enderror"
               required>
        @error('student_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email *</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email ?? '') }}"
               class="form-control @error('email') is-invalid @enderror"
               required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">First Name *</label>
        <input type="text" name="first_name"
               value="{{ old('first_name', $student->first_name ?? '') }}"
               class="form-control @error('first_name') is-invalid @enderror"
               required>
        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Last Name *</label>
        <input type="text" name="last_name"
               value="{{ old('last_name', $student->last_name ?? '') }}"
               class="form-control @error('last_name') is-invalid @enderror"
               required>
        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Course *</label>
        <input type="text" name="course"
               value="{{ old('course', $student->course ?? '') }}"
               class="form-control @error('course') is-invalid @enderror"
               placeholder="e.g. BSIT" required>
        @error('course') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Year Level *</label>
        <select name="year_level"
                class="form-select @error('year_level') is-invalid @enderror" required>
            <option value="">Select year level</option>
            @foreach (range(1, 6) as $year)
                <option value="{{ $year }}"
                    @selected(old('year_level', $student->year_level ?? '') == $year)>
                    Year {{ $year }}
                </option>
            @endforeach
        </select>
        @error('year_level') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone"
               value="{{ old('phone', $student->phone ?? '') }}"
               class="form-control @error('phone') is-invalid @enderror">
        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        Please correct the errors above before submitting.
    </div>
@endif

<div class="my-4"></div>
