@extends('layouts.admin')

@section('content')
    <div class="container">

        {{-- Back to All --}}
        <div class="mt-5">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        {{-- /Back to All --}}

        <div>
            {{-- Title --}}
            <h1 class="text-center mt-3">{{ $project->title }}</h1>
            {{-- / Title --}}

            {{-- Year + Slug --}}
            <div class="d-flex justify-content-between mt-3">
                <h5>{{ $project->creation_year }}</h5>
                <p>{{ $project->slug }}</p>
            </div>
            {{-- / Year + Slug --}}

            {{-- Description --}}
            <p class="mt-3">{{ $project->description }}</p>
            {{-- / Description --}}

            {{-- Image --}}
            <div class="mt-3">
                <strong class="d-block">Image:</strong>
                @if ($project->cover_img)
                    <img class="w-25" src="{{ asset('storage/' . $project->cover_img) }}"
                        alt="{{ 'cover img of ' . $project->title }}">
                @else
                    <div class="w-75 py-4 text-center bg-warning bg-opacity-25"> NO IMAGE
                    </div>
                @endif
            </div>
            {{-- / Image --}}

            {{-- Btn EDIT --}}
            <div class="mt-3">
                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                    Modify
                </a>
            </div>
            {{-- /Btn EDIT --}}
        </div>
    </div>
@endsection
