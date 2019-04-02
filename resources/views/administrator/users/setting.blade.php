@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 " >
        <form action="{{route('user.settingUpdate', $user->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Setting</div>
                <div class="card-body">
                    <div class="form-group">
                        <div>
                            <label for="Name" class=" form-control-label">Name</label>
                        </div>
                        <div>
                            <input type="text" name="name" placeholder="Name User" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->name }}" required>
                        </div>
                        @if ($errors->has('name'))
                        <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('name')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="email" class=" form-control-label">Email</label>
                        </div>
                        <div>
                            <input type="text" name="email" placeholder="email" class="form-control  {{$errors->has('email') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->email }}" required>
                        </div>
                        @if ($errors->has('email'))
                        <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('email')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="passwordNew" class=" form-control-label">Password Baru</label>
                        </div>
                        <div>
                            <input type="password" name="passwordNew" placeholder="password Baru" class="form-control  {{$errors->has('passwordNew') ? 'form-control is-invalid' : 'form-control'}}" >
                        </div>
                        @if ($errors->has('passwordNew'))
                        <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('passwordNew')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="passwordConfrim" class=" form-control-label">Password Confrim</label>
                        </div>
                        <div>
                            <input type="password" name="passwordConfrim" placeholder="Password Confrim" class="form-control  {{$errors->has('passwordConfrim') ? 'form-control is-invalid' : 'form-control'}}">
                        </div>
                        @if ($errors->has('passwordConfrim'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('passwordConfrim')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="file" value="upload icon" name="icon" id="icon" class="form-control">
                    </div>
                    <div class="preview"></div>
                    @if (isset($user) && $user->icon)
                    <div class="form-group">
                        <img class="img-profile img-responsive" width="60%" src="{{ asset('img')}}/{{$user->icon}}">
                    </div>
                    @endif
                    <div>
                        @if ($errors->has('icon'))
                        <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $errors->first('icon')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
                        <a class="btn btn-primary" href="{{route('user.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.selected2').select2();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(".preview").html("<img src='" + e.target.result + "' width='310' id='image'>");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#icon").change(function () {
        readURL(this);
        $('.img-responsive').remove();
        $('.img-profile').remove();
    });

    $('.close').on('click', function(){
        $('#image').remove();
    });
</script>
@endpush
