@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                Added Post
            </button>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Craated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->user->lname . ' ' . $post->user->fname }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->created_at->format('m-d-Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
