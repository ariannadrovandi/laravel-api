@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <h1>Create Post</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror"
                    name="title" id="title" required maxlength="150" minlength="3">
                @error('title')
                    <div class="invalid-feedback ">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Image url</label>
                <input type="url" class="form-control @error('image')
                    is-invalid
                @enderror"
                    name="image" id="image" required maxlength="255">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="10"
                    class="form-control
                    @error('description')is-invalid

                @enderror" aria-describedby="descriptionProject">
                </textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Select tech</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <p>Seleziona i Tag:</p>
                @foreach ($tags as $tag)
                    <div>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label for="{{ $tag->name }}" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
