@extends('layouts.app')

@section('content')
<div class="container my-5">
    @if(Session::has('message'))

        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>

    @endif
    @if(Session::has('err_message'))

        <div class="alert alert-danger">
            {{Session::get('err_message')}}
        </div>

    @endif
    @if(isset($errors)&&count($errors)>0)

        <div class="alter alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>

    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="bg-white border rounded py-4 border-top-blue-3">
                <div class="col-md-12">
                    <h1 class="font-weight-bold">{{$job->position}}</h1>
                    <p class="">Posted {{$job->created_at->diffForHumans()}} by <a href="{{route('company.index', [$job->company->id, $job->company->slug] )}}">{{$job->company->cname}}</a></p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-light border border-info rounded px-4 py-3">
                                        <div class="row">
                                            <div class="col-lg-6 d-flex align-items-center"><i class="lar la-clock mr-2 la-lg"></i><span class="font-weight-bold">{{$job->type}}</span></div>
                                            <div class="col-lg-6 d-flex align-items-center"><i class="las la-map-marker mr-2 la-lg"></i><span class="font-weight-bold">Bournemouth, Dorset</span></div>
                                
                                            <!-- Force next columns to break to new line -->
                                            <div class="w-100"></div>
                                        
                                            <div class="col-lg-6 d-flex align-items-center"><i class="las la-pound-sign mr-2 la-lg"></i><span class="font-weight-bold">Competitive salary</span></div>
                                            <div class="col-lg-6 d-flex align-items-center"><i class="las la-tag mr-2 la-lg"></i><span class="font-weight-bold">{{$job->category->name}}</span></div>
                                        </div>
                                    </div>    
                                </div> 
                                <div class="col-md-12">
                                    <div class="py-3">
                                        {{$job->description}}    
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <div class="col-md-3">
                            @if(Auth::check()&&Auth::user()->user_type=='seeker')
                                @if(!$job->checkApplication())
                                    <apply-component :jobid="{{$job->id}}"></apply-component>
                                @endif
                                <favourite-component :jobid="{{$job->id}}" :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                            @endif
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary form-control shadow-none" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-share-alt mr-2"></i><span class="font-weight-bold">Share this job</span>
                            </button>
                            <div class="border border-info rounded my-4">
                                <a href="{{route('company.index', [$job->company->id, $job->company->slug] )}}"><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" class="img-fluid p-3"></a>
                                <div class="border-top border-info p-2">
                                    <a href="{{route('company.index', [$job->company->id, $job->company->slug] )}}" class="text-decoration-none">About this company</a>
                                </div>    
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Send this job to your friend</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('mail')}}" method="POST">@csrf
                                            <input type="hidden" name="job_id" value="{{$job->id}}">
                                            <input type="hidden" name="job_slug" value="{{$job->slug}}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Your name</label>
                                                    <input type="text" name="your_name" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Your email address</label>
                                                    <input type="text" name="your_email" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Person name</label>
                                                    <input type="text" name="friend_name" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>person email</label>
                                                    <input type="text" name="friend_email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Mail this job</button>
                                            </div>
                                        </form>    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>    
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="border rounded bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="h4 font-weight-bold px-4 py-3 m-0">Similar jobs</h5>
                        <ul class="list-unstyled">
                            @foreach($jobRecommendations as $jobRecommendation)
                                <li class="border-top px-4 py-3">
                                    <a href="{{route('jobs.show', [$jobRecommendation->id, $jobRecommendation->slug])}}" class="text-decoration-none">
                                        <h6>{{$jobRecommendation->position}}</h6>
                                        <p class="mb-0 text-secondary">£ Competitive Salary</p>
                                        <p class="mb-0 text-secondary">Town/City, County</p>
                                    </a>    
                                </li>
                            @endforeach    
                        </ul> 
                        <!--<ul class="list-unstyled advertise-features">
                            <li class="border-top py-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-3">Lorem Ipsum</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0">Qty: <strong>1</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0 float-md-right">Qty: <strong>1</strong></p>
                                    </div>

                                </div>
                            </li>
                            <li class="border-top py-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-3">Lorem Ipsum</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0">Qty: <strong>1</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0 float-md-right">Qty: <strong>1</strong></p>
                                    </div>
                                </div>
                            </li>
                            <li class="border-top py-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-3">Lorem Ipsum</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0">Qty: <strong>1</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0 float-md-right">Qty: <strong>1</strong></p>
                                    </div>
                                </div>
                            </li>
                        </ul>-->
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection