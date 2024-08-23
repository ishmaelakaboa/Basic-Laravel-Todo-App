@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo List</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach ($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $todo->title }}</span>
                <div>
                    <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection