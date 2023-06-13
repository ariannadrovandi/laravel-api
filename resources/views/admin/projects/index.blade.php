@extends('layouts.admin')

@section('content')
    <h1 class="m-3 ">Lista dei progetti</h1>
    <div class="text-end mx-5 mb-2">
        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success my-2">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td><img class="img-thumbnail" style="width:100px" src="{{ $project->image }}" alt="{{ $project->title }}"></td>
                    <td>{{ $project->created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary m-1">
                            <a href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                        </button>
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="delete-button btn btn-outline-danger m-1" data-item-title="{{ $project->title }}"> <i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <td> {{ $project->type ? $project->type->name : 'No tech specified' }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
