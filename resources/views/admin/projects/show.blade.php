@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            {{-- Back to All --}}
            <div class="mt-5">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            {{-- /Back to All --}}

            <div class="col-8">

                {{-- Year + Slug --}}
                <div class="d-flex justify-content-between mt-3">
                    <h6>{{ $project->creation_year }}</h6>
                    <h6>{{ $project->slug }}</h6>
                </div>
                {{-- / Year + Slug --}}

                {{-- Title --}}
                <h1 class="text-center my-3">{{ $project->title }}</h1>
                {{-- / Title --}}

                {{-- Type --}}
                <div class="text-center text-success">
                    @if ($project->type)
                        <h5>{{ $project->type->name }}</h5>
                    @else
                        <h5>---</h5>
                    @endif
                </div>
                {{-- /Type --}}

                {{-- Description --}}
                <div class="mt-3 px-5">
                    <p> {{ $project->description }}</p>
                </div>
                {{-- / Description --}}

                {{-- Image --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{-- <strong class="d-block">Image:</strong> --}}
                    @if ($project->cover_img)
                        <img class="w-25 rounded border border-dark" src="{{ asset('storage/' . $project->cover_img) }}"
                            alt="{{ 'cover img of ' . $project->title }}">
                    @else
                        <div class="w-25 py-4 text-center bg-warning bg-opacity-25"> No image found </div>
                    @endif
                </div>
                {{-- / Image --}}

                {{-- Btn EDIT --}}
                <div class="mt-3 text-end">
                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                        Modify
                    </a>
                </div>
                {{-- /Btn EDIT --}}
            </div>
        </div>
    </div>
@endsection
