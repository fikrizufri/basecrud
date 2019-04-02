@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Detail User {{ $user->name }}</div>
                <img class="card-img-top" width="50%" src="{{ asset('img')}}/{{$user->icon}}" alt="{{ $user->name }}" >
                <div class="card-body">
                    <div class="form-group">
                        <div>
                            <label for="Name" class=" form-control-label">Name</label>
                        </div>
                        <div>
                            <input disabled type="text" name="name" placeholder="Name User" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->name }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="email" class=" form-control-label">Email</label>
                        </div>
                        <div>
                            <input disabled type="text" name="email" placeholder="email" class="form-control  {{$errors->has('email') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->email }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="hakases" class="control-label"><small>Hak Akses</small></label>
                        </div>
                        <div>                           
                            {{$user->DisplayRole}}
                        </div>
                    
                    </div> 
                    <div class="form-group">
                        
                        @if (Request::segment(2) == 'profile')
                        <a class="btn btn-primary" href="{{route('administrator.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        @else
                        <a class="btn btn-primary" href="{{route('user.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection