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
                   <td><button class="btn btn-success btn-sm">Apply</button></td>
               </tr>
               @endforeach
           </tbody>
       </table>
    </div>
</div>
@endsection
<style>
    .fas{

        color: #4183D7;
    }
</style>
