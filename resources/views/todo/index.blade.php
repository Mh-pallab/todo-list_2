@extends('layouts.app')

@section('content')
    <div class="container ">

        <form class="row g-2 " action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="col-10">
                <input class="form-control col-auto" type="text" name="post" required>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <th>ID</th>
                <th>Post</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->post }}</td>
                        <td>
                            <a href="{{ route('post.edit', $item->id) }}" class="btn btn-success mx-2">Edit</a>

                            <form class="d-inline-block" action="{{ route('post.destroy', $item->id) }}" method="POST">
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
