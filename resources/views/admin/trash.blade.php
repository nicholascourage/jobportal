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
                                
                                    Live

                                @else

                                    Draft

                                @endif    

                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <button class="btn btn-primary"><a href="{{route('post.restore',[$post->id])}}" class="text-white">Restore</a></button>
                                

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection