@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('message'))

        <div class="alert alert-success">{{Session::get('message')}}</div>

    @endif
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <td>Date</td>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('storage/' . $post->image)}}" class="img-fluid"></td>
                            <td>{{$post->title}}</td>
                            <td>{{Str::limit($post->content, '20')}}</td>
                            <td>
                                @if($post->status == 1)
                                
                                    <a href="{{route('post.toggle', [$post->id])}}">Live</a>

                                @else

                                    <a href="{{route('post.toggle', [$post->id])}}">Draft</a>

                                @endif    

                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <button class="btn btn-primary"><a href="{{route('post.edit',[$post->id])}}" class="text-white">Edit</a></button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete?
                                            </div>
                                            <form action="{{route('post.delete')}}" method="POST">@csrf
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="{{$post->id}}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection