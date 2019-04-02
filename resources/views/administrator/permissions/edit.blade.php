@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <form action="{{route('permission.update', $role->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Edit Hak Akses</div>
                <div class="card-body" style="max-height:65vh; overflow-y:auto;">
                    <div class="form-group">
                        <div>
                            <label for="Name" class=" form-control-label">Name</label>
                        </div>
                        <div>
                            <input type="text" id="text-input" name="name" placeholder="Name Roles" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $role->name }}">
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
                                    <td scope="row">{{ $task->description }}</td>
                                    @foreach ($task->permissions as $permission)
                                        <td>
                                            @if(in_array($permission->name, $izin))
                                            <input type="checkbox" name="izin_akses[]" value="{{$permission->id}}" checked></label>
                                            @else
                                            <input type="checkbox" name="izin_akses[]" value="{{$permission->id}}"></label>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                
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
    // @if (session('status'))
    //   notif('success',  "{{ session('status') }}");
    // @endif

    // @if($errors->any())
    //   notif('danger','Terjadi kesalahan silahkan cek inputan anda');
    // @endif
</script>
@endpush
