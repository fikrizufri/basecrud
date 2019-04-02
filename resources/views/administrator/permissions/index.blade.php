@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">


                    @can('create-hak-akses')
                        <div class="row">
                            <a class="btn btn-success btn-sm" href="{{ route('permission.create') }}" style="margin-left:20px;margin-bottom:20px"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</a>
                        </div>
                    @endcan

                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th width="50" scope="col" class="align-middle text-center">#</th>
                                <th scope="col" class="align-middle text-center">Nama</th>
                                <th width="155" class="align-middle text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $index =>$role)
                            <tr>
                                <th class="align-middle text-center">{{ $index+1 }}</th>
                                <td scope="row" class="align-middle text-center">{{ ucfirst($role->name) }}</td>
                                <td>
                                    @can('view-hak-akses')
                                        <a class="btn btn-info btn-sm" href="{{ route('permission.show', $role->id) }}" role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    @endcan
                                    @can('edit-hak-akses')
                                        <a class="btn btn-primary btn-sm" href="{{ route('permission.edit', $role->id) }}" role="button"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                    @endcan
                                    @can('delete-hak-akses')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalHapusRole-{{ $role->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        @include('administrator.permissions._hapus')
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">Daftar Role User tidak ada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
        $('.selected2').select2();
    });
</script>
@endpush
