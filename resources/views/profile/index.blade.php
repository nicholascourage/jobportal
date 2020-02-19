@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{asset('avatar/default-avatar-img.jpg')}}" width="100">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Experience</label>
                        <textarea id="experience" name="experience" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Your Information</div>
                <div class="card-body">
                    Details Of User
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Cover Letter</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
