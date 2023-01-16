@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-8">

                {{-- HEADING --}}
                <div class=" mb-3 pb-2 border-bottom border-success border-2">
                    <h4 class="pb-2">Create new project</h4>
                </div>
                {{-- / HEADING --}}

                @include('partials.errors')

                {{-- FORM PROJECT --}}
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title Project --}}
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" type="text"
                            name="title" value="{{ old('title') }}">

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

                        {{-- Previw Image --}}
                        <div class="mt-3">
                            <img id="image_preview" src="" alt="" style="max-height: 200px">
                        </div>
                    </div>
                    {{-- / IMAGE --}}

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ old('description') }}</textarea>

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
                            type="number" min="1990" max="2030" name="creation_year"
                            value="{{ old('creation_year') == true ? old('creation_year') : '2020' }}">
                        @error('creation_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- /Year --}}

                    {{-- Btn CREATE --}}
                    <div class="mb-3 pt-2">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                    {{-- / Btn CREATE --}}
                </form>
                {{-- /FORM PROJECT --}}

            </div>
        </div>
    </div>
@endsection
