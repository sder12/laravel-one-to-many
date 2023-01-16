@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Projects</h3>

        <div class="row justify-content-center">
            <div class="col-8">

                {{-- MESSAGE FROM CONTROLLER --}}
                @if (session('message'))
                    <div class="alert alert-warning mt-3">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- / MESSAGE FROM CONTROLLER --}}

                {{-- Add new proj --}}
                <div class="text-end">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-dark text-end">
                        <i class="fa-regular fa-square-plus"></i>
                    </a>
                </div>
                {{-- / Add new proj --}}


                {{-- TABLE --}}
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Creation year</th>
                            <th scope="col">Image</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->creation_year }}</td>

                                {{-- Images --}}
                                <td>

                                    @if ($project->cover_img)
                                        <img class="w-75" src="{{ asset('storage/' . $project->cover_img) }}"
                                            alt="">
                                    @else
                                        <div class="w-75 py-4 text-center bg-warning bg-opacity-25"> No image yet </div>
                                    @endif
                                </td>
                                {{-- /Images --}}

                                <td>{{ $project->type ? $project->type->name : '---' }}</td>

                                {{-- ACTIONS --}}
                                <td>
                                    {{-- Show --}}
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- Edit --}}
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    {{-- Delete using app.js and partials.modal --}}
                                    <form class="d-inline-block"
                                        action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger delete-btn"
                                            data-project-title="{{ $project->title }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- /ACTIONS --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- /TABLE --}}

            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    @include('partials.delete-modal')
    {{-- / Delete Modal --}}
@endsection
