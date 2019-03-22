@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hak Akses</div>

                <div class="card-body">


                    @can('tambah-roles')
                        <div class="row">
                            <a class="btn btn-success" href="{{ route('permission.create') }}" style="margin-left:20px;margin-bottom:20px"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                            @foreach ($roles as $role)
                            <tr>
                                <th class="align-middle text-center">{{ $role->id }}</th>
                                <td scope="row" class="align-middle text-center">{{ ucfirst($role->name) }}</td>
                                <td>
                                    @can('lihat-roles')
                                        {{-- <a class="btn btn-info" href="{{ route('permission.show', $role->id) }}" role="button"><i class="fa fa-search" aria-hidden="true"></i></a> --}}
                                    @endcan
                                    @can('edit-roles')
                                        <a class="btn btn-primary" href="{{ route('permission.edit', $role->id) }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    @endcan
                                    @can('hapus-roles')
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapusRole-{{ $role->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        @include('permission::roles._hapus')
                                    @endcan
                                </td>
                            </tr>
                            {{-- @php
                                $number++
                            @endphp --}}
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script>
    @if (session('status'))
      notif('success',  "{{ session('status') }}");
    @endif

    @if($errors->any())
      notif('danger','Terjadi kesalahan silahkan cek inputan anda');
    @endif
</script> --}}
@endpush
