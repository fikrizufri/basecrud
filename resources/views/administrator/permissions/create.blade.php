@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="card">
                <div class="card-header">Tambah Hak Akses</div>
                <div class="card-body" style="max-height:65vh; overflow-y:auto;">
                    <div class="form-group">
                        <div>
                                <label for="Name" class=" form-control-label">Name</label>
                        </div>
                        <div>
                            <input type="text" name="name" placeholder="Input name" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}">
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
                        <table class="table table-bordered" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" style="vertical-align:middle">Tugas</th>
                                    <th scope="col" colspan="5">Hak Akses</th>
                                </tr>
                                <tr>
                                    <th scope="col">Tambah</th>
                                    <th scope="col">Lihat</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td scope="row">{{ $task->title }}</td>
                                    @foreach ($task->permissions as $permission)
                                    <td>
                                    <input type="checkbox" name="izin_akses[]" value="{{$permission->id}}">
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                @if ($errors->has('izin_akses'))
                                <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ $errors->first('izin_akses')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
                        <a class="btn btn-primary" href="{{route('permission.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
