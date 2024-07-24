@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Branches</h1>
    <a href="{{ route('branches.create') }}" class="btn btn-primary">Add Branch</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->id }}</td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->address }}</td>
                    <td>{{ $branch->latitude }}</td>
                    <td>{{ $branch->longitude }}</td>
                    <td>
                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
