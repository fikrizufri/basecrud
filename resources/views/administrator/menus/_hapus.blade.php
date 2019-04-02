<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('menu.destroy')}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h class="modal-title">Hapus Menu</h>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <p>Kamu yakin mengapus?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="delete_id" id="postvalue" value="" />
            <input type="submit" class="btn btn-danger" value="Delete Item" />
            </div>
        </form>
        </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>