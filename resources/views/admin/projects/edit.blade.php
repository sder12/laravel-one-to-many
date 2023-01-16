@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        {{-- Back to All --}}
        <div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        {{-- / Back to All --}}

        <div class="row justify-content-center">
            <div class="col col-8">

                {{-- HEADING --}}
                <div class="mb-3 pb-2 border-bottom border-warning  border-2">
                    <span class="d-block mb-2"> MODIFY: </span>
                    <h4> {{ $project->title }}</h4>
                </div>
                {{-- / HEADING --}}

                @include('partials.errors')

                {{-- FORM PROJECT --}}
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title project --}}
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control  @error('title') is-invalid @enderror" id="title" type="text"
                            name="title" value="{{ $project->title }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- / Title project --}}

                    {{-- IMAGE --}}
                    <div class="mb-3">
                        <label class="form-label" for="cover_img">Image</label>
                        <input class="form-control @error('cover_img') is-invalid @enderror" id="cover_img" type="file"
                            name="cover_img">

                        @error('cover_img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- / IMAGE --}}

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ $project->description }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- / Description --}}

                    {{-- Year --}}
                    <div class="mb-3">
                        <label class="form-label" for="creation_year">Year of creation</label>
                        <input class="form-control  @error('creation_year') is-invalid @enderror" id="creation_year"
                            type="number" min="1990" max="2030" value="{{ $project->creation_year }}"
                            name="creation_year">

                        @error('creation_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- / Year --}}

                    {{-- Btn SAVE --}}
                    <div class="mb-3 pt-2">
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                    {{-- /Btn SAVE --}}

                </form>
                {{-- /FORM PROJECT --}}
            </div>
        </div>
    </div>
@endsection
