<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="modal-header">
                <h4 class="modal-title">Provide details of the new menu item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="title" class="col-lg-4 control-label">Nama Menu </label>
                <div class="col-lg-10">
                <input type="text" name="name" placeholder="Input name" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">URL</label>
                <div class="col-lg-10">

                    <input type="text" name="url" placeholder="Input url" class="form-control  {{$errors->has('url') ? 'form-control is-invalid' : 'form-control'}}">
                    <small>diharapkan mengunakan huruf kecil tanpa nama domain</small>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-10">
                    <label for="parent_id" class="control-label"><span>Menu Parent</span></label>
                    <div>                                
                        <select name="parent_id" class="selected2 form-control" required>
                            <option value="0">--Pilih Menu Parent--</option>
                            @foreach ($items as $menu)      
                        <option value="{{$menu->id}}" {{$menu->id == old('parent_id') ?:'selected'}}>{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="class" class="col-lg-2 control-label">Class</label>
                <div class="col-lg-10">
                    <input type="text" name="class" placeholder="Input class" class="form-control  {{$errors->has('class') ? 'form-control is-invalid' : 'form-control'}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <label for="target" class="control-label"><span>Target</span></label>
                    <div>                                
                        <select name="target" class="selected2 form-control" >
                            <option value="">--Pilih Target--</option>
                            @foreach ($listTarget as $target)      
                        <option value="{{$target}}" {{$target == old('target') ?:'selected'}}>{{$target}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>