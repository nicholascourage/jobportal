@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection