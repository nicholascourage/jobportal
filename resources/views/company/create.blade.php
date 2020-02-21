@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/default-avatar-img.jpg')}}" width="100" style="width: 100%">
            @else
                <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width: 100%">
            @endif    
            <br>
            <br>
            <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Update Logo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar">
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                        @if($errors->has('avatar'))
                        <div class="error" style="color: red;">
                            {{$errors->first('avatar')}}
                        </div>
                    @endif
                    </div>
                </div>
            </form> 
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Your Company Information
                </div>
                <form method="POST" action="{{route('company.store')}}">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{Auth::user()->company->address}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{Auth::user()->company->phone}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" class="form-control" value="{{Auth::user()->company->website}}">
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" id="slogan" name="slogan" class="form-control" value="{{Auth::user()->company->slogan}}">
                        </div>
                        <div class="form-group">
                            <label for="descriptio">Description</label>
                            <textarea id="description" name="description" class="form-control">{{Auth::user()->company->description}}</textarea>
                        </div>



                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                </form>    
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About Your Company</div>
                <div class="card-body">
                    <p>Company Name: {{Auth::user()->company->cname}}</p>
                    <p>Address: {{Auth::user()->company->address}}</p>
                    <p>Website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                    <p>Slogan: {{Auth::user()->company->slogan}}</p>
                    <p>Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                </div>
            </div>
            <br>
            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo">
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                        @if($errors->has('cover_letter'))
                        <div class="error" style="color: red;">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                    </div>
                </div>
            </form>
   
        </div>
    </div>
</div>
@endsection
