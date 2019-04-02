<div class="modal fade" id="ModalHapusRole-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalHapusUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Hapus Modul {{ ucfirst($task->title) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus Modul ini?</p>
                <div class="db-list">
                    <dl>
                        <dt>Modul</dt>
                        <dd>{{ $task->title }}</dd>

                        <dt>Tanggal Dibuat</dt>
                        <dd>
                            {{ $task->created_at->format('Y-m-d') }}
                            Pukul {{ $task->created_at->format('H:i') }}
                            ({{ $task->created_at->diffForHumans() }})
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('task.destroy', $task->id)}}" method="POST">
                        {{ csrf_field() }}
                    {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
