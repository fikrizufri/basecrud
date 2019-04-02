@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('task.update', $task->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Tambah Modul</div>
                <div class="card-body" style="max-height:65vh; overflow-y:auto;">
                    <div class="form-group">
                        <div>
                                <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div>
                        <input type="text" name="title" placeholder="input Title" class="form-control  {{$errors->has('title') ? 'form-control is-invalid' : 'form-control'}}" value="{{$task->title}}">
                        </div>
                        @if ($errors->has('title'))
                        <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('title')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                            <div>
                                <label for="description" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div>
                                <input type="text" name="description" placeholder="Input Deskripsi" class="form-control  {{$errors->has('description') ? 'form-control is-invalid' : 'form-control'}}" value="{{$task->description}}">
                            </div>
                            @if ($errors->has('description'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('description')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
                        <a class="btn btn-primary" href="{{route('task.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    
</script>
@endpush
