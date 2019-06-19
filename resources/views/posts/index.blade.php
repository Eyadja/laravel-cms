@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add Post</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">

            @if ($posts->count() > 0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{url("storage") . "/" . $post->image}}" height="60px" width="60px" alt="">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $post->category->id) }}">{{ $post->category->name }}</a>
                            </td>
                            @if(!$post->trashed())

                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                @else
                                <td>
                                    <form method="POST" action="{{route('restore-posts', $post->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                </td>
                            @endif
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">No posts yet</h3>
            @endif
        </div>
    </div>
@stop