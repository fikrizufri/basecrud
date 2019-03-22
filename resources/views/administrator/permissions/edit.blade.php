@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Hak Akses</div>
                <div class="card-body" style="max-height:65vh; overflow-y:auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>
                            <label for="Name" class=" form-control-label">Name</label>
                        </div>
                        <div>
                            <input type="text" id="text-input" name="name" placeholder="Judul Post" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $role->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
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
                                    <th scope="col">Buat</th>
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
                                            @if(in_array($permission->name, $izin))
                                            <input type="checkbox" value="" checked></label>
                                            @else
                                            <input type="checkbox" value=""></label>
                                            @endif

                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
        </form>
        </div>
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
