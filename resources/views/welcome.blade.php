@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <table class="table">
           <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
           </thead>
           <tbody>
               @foreach($jobs as $job)
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
    <div>
        <button class="btn btn-success btn-lg" style="width:100%">Browse all jobs</button>
    </div>
    <br>
    <br>
    <h1>Featured Companies</h1>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                IMAGES
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    .fas{

        color: #4183D7;
    }
</style>
