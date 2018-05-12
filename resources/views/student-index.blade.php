@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.alert')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard > Students List
                        <span class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('students.create') }}">Add new student</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Phone</th>
                                <th scope="col" class="text-center" style="width: 140px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($students->isEmpty())
                                <tr>
                                    <td colspan="6">No record yet.</td>
                                </tr>
                            @endif
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $student->dob)->format(config('app.date_format')) }}</td>
                                <td>{{ $student->nationality }}</td>
                                <td>{{ $student->phone }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-light" href="{{ route('students.edit', ['id' => $student->id]) }}">Edit</a>
                                    <form class="float-right" action="{{ route('students.destroy', ['id' => $student->id]) }}" method="POST">
                                        {!! csrf_field() !!}
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
