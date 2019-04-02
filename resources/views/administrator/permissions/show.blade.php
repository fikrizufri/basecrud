@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Hak Akses {{ $role->name }}</div>
                <div class="card-body">
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
                                            @if(in_array($permission->name, $izin))
                                            <input type="checkbox" name="izin_akses[]" value="{{$permission->id}}" checked disabled></label>
                                            @else
                                            <input type="checkbox" name="izin_akses[]" value="{{$permission->id}}" disabled></label>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('permission.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection