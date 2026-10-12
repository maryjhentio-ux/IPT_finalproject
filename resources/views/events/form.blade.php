
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Event Title *</label>
        <input type="text" name="title"
               value="{{ old('title', $event->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror"
               required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Organization *</label>
        <select name="organization_id"
                class="form-select @error('organization_id') is-invalid @enderror" required>
            <option value="">Select organization</option>
            @foreach ($organizations as $organization)
                <option value="{{ $organization->id }}"
                    @selected((string) old('organization_id', $event->organization_id ?? '') === (string) $organization->id)>
                    {{ $organization->name }}
                </option>
            @endforeach
        </select>
        @error('organization_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $event->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Location *</label>
        <input type="text" name="location"
               value="{{ old('location', $event->location ?? '') }}"
               class="form-control @error('location') is-invalid @enderror" required>
        @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Status *</label>
        <select name="status" class="form-select" required>
            @foreach (['upcoming', 'completed', 'cancelled'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $event->status ?? 'upcoming') === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Start Date and Time *</label>
        <input type="datetime-local" name="start_at"
               value="{{ old('start_at', isset($event) ? $event->start_at->format('Y-m-d\TH:i') : '') }}"
               class="form-control @error('start_at') is-invalid @enderror" required>
        @error('start_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">End Date and Time</label>
        <input type="datetime-local" name="end_at"
               value="{{ old('end_at', isset($event) && $event->end_at ? $event->end_at->format('Y-m-d\TH:i') : '') }}"
               class="form-control @error('end_at') is-invalid @enderror">
        @error('end_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        Please correct the highlighted fields.
    </div>
@endif

<div class="my-4"></div>
