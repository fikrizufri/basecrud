@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">


                    @can('create-modul')
                        <div class="row">
                            <a class="btn btn-success btn-sm" href="{{ route('task.create') }}" style="margin-left:20px;margin-bottom:20px"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</a>
                        </div>
                    @endcan

                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th width="50" scope="col" class="align-middle text-center">#</th>
                                <th scope="col" class="align-middle text-center">Title</th>
                                <th scope="col" class="align-middle text-center">Discription</th>
                                <th width="155" class="align-middle text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $index => $task)
                            <tr>
                                <th class="align-middle text-center">{{ $index+1 }}</th>
                                <td scope="row" class="align-middle text-center">{{ ucfirst($task->title) }}</td>
                                <td scope="row" class="align-middle text-center">{{ ucfirst($task->description) }}</td>
                                <td>
                                    @can('view-modul')
                                        <a class="btn btn-info btn-sm" href="{{ route('task.show', $task->id) }}" role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    @endcan
                                    @if ($task->title != 'User' && $task->title != 'Roles' && $task->title != 'Tasks')
                                    @can('edit-modul')
                                    <a class="btn btn-primary btn-sm" href="{{ route('task.edit', $task->id) }}" role="button"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                @endcan
                                @can('delete-modul')
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalHapusRole-{{ $task->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    @include('administrator.tasks._hapus')
                                @endcan   
                                    @endif
                                   
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">Daftar task tidak ada</td>
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
{{-- <script>
    @if (session('status'))
      notif('success',  "{{ session('status') }}");
    @endif

    @if($errors->any())
      notif('danger','Terjadi kesalahan silahkan cek inputan anda');
    @endif
</script> --}}
@endpush
