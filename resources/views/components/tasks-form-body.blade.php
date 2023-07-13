@csrf

<div class="row mb-3">
    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Título') }}</label>
    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $tasks[0]->title) }}" required autocomplete="title" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

    <div class="col-md-6">
        <!-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> -->
        <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" required autofocus>{{ old('description', $tasks[0]->description) }}</textarea>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Guardar') }}
        </button>
    </div>
</div>