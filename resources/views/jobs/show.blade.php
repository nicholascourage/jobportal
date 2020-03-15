@extends('layouts.app')

@section('content')
<div class="container my-5">
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
                                            <div class="col-md-6 col-sm-3"><i class="lar la-clock"></i></div>
                                            <div class="col-md-6 col-sm-3">.col-6 .col-sm-3</div>
                                        
                                            <!-- Force next columns to break to new line -->
                                            <div class="w-100"></div>
                                        
                                            <div class="col-md-6 col-sm-3">.col-6 .col-sm-3</div>
                                            <div class="col-md-6 col-sm-3">.col-6 .col-sm-3</div>
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
                            <div class="border border-info rounded mb-4">
                                <a href="{{route('company.index', [$job->company->id, $job->company->slug] )}}"><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" class="img-fluid p-3"></a>
                                <div class="border-top border-info p-2">
                                    <a href="{{route('company.index', [$job->company->id, $job->company->slug] )}}" class="text-decoration-none">About this company</a>
                                </div>    
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">
                                Share this job
                            </button>
                            
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
                                        <form>
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
                                                <button type="button" class="btn btn-primary">Mail this job</button>
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
            <div class="border rounded bg-white pt-5 border-top-blue-3">
                <div class="row px-4">
                    <div class="col-md-12">
                        <h5 class="h4 font-weight-bold mb-4">Lorem Ipsum</h5>
                        <ul class="list-unstyled advertise-features">
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
                        </ul>
                    </div>
                </div>
                <div class="bg-light rounded-bottom">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled p-4 advertise-features">
                                <li>
                                    <div class="row">
                                        <div class="col-md-8"><p>Lorem Ipsum:</p></div>
                                        <div class="col-md-4"><p><strong>000.00</strong></p></div>
                                    </div>    
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-8"><p>Lorem Ipsum:</p></div>
                                        <div class="col-md-4"><p><strong>000.00</strong></p></div>
                                    </div>    
                                </li>
                                <li class="border-top border-secondary pt-3">
                                    <div class="row">
                                        <div class="col-md-8"><p><strong>Lorem:</strong></p></div>
                                        <div class="col-md-4"><p><strong>000.00</strong></p></div>
                                    </div>    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection