@extends('students.layout')

@section('content')

    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Student Management</h2>
            <a class="btn btn-success" href="{{ route('students.create') }}">Create New Student</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact Numbers</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('styles')
<style>
    .margin-tb {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }
    .btn-info, .btn-primary, .btn-danger {
        margin-right: 5px;
    }
</style>
@endsection