@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create A Job
                </div>
                <div class="card-body">
                    <form action="{{route('job.store')}}" method="POST">@csrf
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles: </label>
                            <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select name="category" class="form-control">
                                @foreach (App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position: </label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type: </label>
                            <select class="form-control" name="type">
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="casual">Casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select class="form-control" name="status">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="lastdate">Closing Date: </label>
                            <input type="text" name="last_date" id="datepicker" class="form-control @error('address') is-invalid @enderror" value="{{ old('last_date') }}">
                            @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
