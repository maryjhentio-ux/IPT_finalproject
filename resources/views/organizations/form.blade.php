
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Organization Name *</label>
        <input type="text" name="name"
               value="{{ old('name', $organization->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Acronym</label>
        <input type="text" name="acronym"
               value="{{ old('acronym', $organization->acronym ?? '') }}"
               class="form-control @error('acronym') is-invalid @enderror"
               placeholder="e.g. JPCS">
        @error('acronym')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Category *</label>
        <select name="category"
                class="form-select @error('category') is-invalid @enderror" required>
            <option value="">Select category</option>
            @foreach (['Academic', 'Technology', 'Arts and Culture', 'Sports', 'Community Service', 'Other'] as $category)
                <option value="{{ $category }}"
                    @selected(old('category', $organization->category ?? '') === $category)>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="email"
               value="{{ old('email', $organization->email ?? '') }}"
               class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $organization->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Status *</label>
        <select name="status"
                class="form-select @error('status') is-invalid @enderror" required>
            <option value="active"
                @selected(old('status', $organization->status ?? 'active') === 'active')>
                Active
            </option>
            <option value="inactive"
                @selected(old('status', $organization->status ?? 'active') === 'inactive')>
                Inactive
            </option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        Please correct the highlighted fields.
    </div>
@endif

<div class="my-4"></div>
