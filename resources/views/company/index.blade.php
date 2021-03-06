@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(empty($company->cover_photo))
                <img src="{{asset('cover/default-cover-img.jpg')}}" style="width:100%">
            @else
                <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width:100%">

            @endif
            <div class="company-desc">
                @if(empty($company->logo))
                    <img src="{{asset('avatar/default-avatar-img.jpg')}}" width="100">
                @else
                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="100">
                @endif 
                <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp; Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}&nbsp;</p>
            </div>
        </div>
        <table class="table">
           <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
           </thead>
           <tbody>
               @foreach($company->jobs as $job)
               <tr>
                   <td><img src="{{asset('avatar/default-avatar-img.jpg')}}" width="80px"></td>
                   <td>Position: {{$job->position}}
                       <br>
                       <i class="fas fa-clock" aria-hidden="true"></i>&nbsp; {{$job->type}}
                   </td>
                   <td><i class="fas fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                   <td><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp; Date: {{$job->created_at->diffForHumans()}}</td>
                   <td>
                       <a href="{{route('jobs.show', [$job->id, $job->slug])}}"><button class="btn btn-success btn-sm">Apply</button></a>
                    </td>
               </tr>
               @endforeach
           </tbody>
       </table>
    </div>
</div>    

@endsection
