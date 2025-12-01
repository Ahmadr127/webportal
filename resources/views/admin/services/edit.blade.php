@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Details</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" id="serviceForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="icon">Icon (FontAwesome class) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" name="icon" value="{{ old('icon', $service->icon) }}" required>
                            @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $service->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug', $service->slug) }}">
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                      id="short_description" name="short_description" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="full_description">Full Description</label>
                            <textarea class="form-control @error('full_description') is-invalid @enderror" 
                                      id="full_description" name="full_description" rows="6">{{ old('full_description', $service->full_description) }}</textarea>
                            @error('full_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($service->image)
                        <div class="form-group">
                            <label>Current Image</label>
                            <div>
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-thumbnail" style="max-width: 300px;">
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="image">{{ $service->image ? 'Change Image' : 'Upload Image' }}</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <h5 class="mb-3">Features</h5>
                        <div id="features-container">
                            @foreach(old('features', $service->features ?? []) as $index => $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="{{ $feature }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-feature">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary mb-3" id="add-feature">
                            <i class="fas fa-plus"></i> Add Feature
                        </button>

                        <hr>

                        <h5 class="mb-3">SEO Settings</h5>
                        
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}">
                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $service->meta_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Service
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Options</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $service->order) }}" form="serviceForm">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_active" 
                                   name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} form="serviceForm">
                            <label class="custom-control-label" for="is_active">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="text-muted small">
                        <p class="mb-1"><strong>Created:</strong> {{ $service->created_at->format('d M Y H:i') }}</p>
                        <p class="mb-0"><strong>Updated:</strong> {{ $service->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#add-feature').click(function() {
        $('#features-container').append(`
            <div class="input-group mb-2">
                <input type="text" name="features[]" class="form-control">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-feature">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.remove-feature', function() {
        $(this).closest('.input-group').remove();
    });
});
</script>
@endpush
