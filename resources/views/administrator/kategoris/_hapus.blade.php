<div class="modal fade" id="ModalHapusRole-{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalHapusUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Hapus Hak Akses {{ ucfirst($kategori->name) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus Hak Akses ini?</p>
                <div class="db-list">
                    <dl>
                        <dt>Hak Akses</dt>
                        <dd>{{ $kategori->name }}</dd>

                        <dt>Tanggal Dibuat</dt>
                        <dd>
                            {{ $kategori->created_at->format('Y-m-d') }}
                            Pukul {{ $kategori->created_at->format('H:i') }}
                            ({{ $kategori->created_at->diffForHumans() }})
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('kategori.destroy', $kategori->id)}}" method="POST">
                        {{ csrf_field() }}
                    {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
