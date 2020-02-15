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
               @for($i=0;$i<10;$i++)
               <tr>
                   <td><img src="{{asset('avatar/default-avatar-img.jpg')}}" width="80px"></td>
                   <td>Position: Web Developer</td>
                   <td><i class="fas fa-map-marker" aria-hidden="true"></i> Cornwall</td>
                   <td>Closing Date: 2020-03-04</td>
                   <td><button class="btn btn-success btn-sm">Apply</button></td>
               </tr>
               @endfor
           </tbody>
       </table>
    </div>
</div>
@endsection
