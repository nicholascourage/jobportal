@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            <img src="{{asset('cover/default-cover-img.jpg')}}" style="width:100%">
            <div class="company-desc">
                <img src="{{asset('avatar/default-avatar-img.jpg')}}" width="100">
                <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp; Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}&nbsp;</p>
            </div>
        </div>
    </div>
</div>    

@endsection
