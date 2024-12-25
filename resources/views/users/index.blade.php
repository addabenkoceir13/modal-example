@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUserAdd">
                Added User
            </button>
            @include('users.add')
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->lname . ' ' . $user->fname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at->format('m-d-Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalUserShow-{{ $user->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalUseredit-{{ $user->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalUserDelete-{{ $user->id }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                        @include('users.show')
                        @include('users.edit')
                        @include('users.delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
