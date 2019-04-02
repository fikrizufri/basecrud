@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('menu.update', $items->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="card">
                    <div class="form-group">
                            <label for="title" class="col-lg-4 control-label">Nama Menu </label>
                            <div class="col-lg-10">
                            <input type="text" name="name" placeholder="Input name" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{$items->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-lg-2 control-label">URL</label>
                            <div class="col-lg-10">
            
                                <input type="text" name="url" placeholder="Input url" class="form-control  {{$errors->has('url') ? 'form-control is-invalid' : 'form-control'}}" value="{{$items->url}}">
                                <small>diharapkan mengunakan huruf kecil tanpa nama domain</small>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-10">
                                <label for="parent_id" class="control-label"><span>Menu Parent</span></label>
                                <div>                                
                                    <select name="parent_id" class="selected2 form-control" >
                                        <option value="0">--Pilih Menu Parent--</option>
                                        @foreach ($menus as $menu)     
                                    <option value="{{$menu->id}}" {{$menu->id != $items->parent_id ?:'selected'}}>{{$menu->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="class" class="col-lg-2 control-label">Class</label>
                            <div class="col-lg-10">
                                <input type="text" name="class" placeholder="Input class" class="form-control  {{$errors->has('class') ? 'form-control is-invalid' : 'form-control'}}" value="{{$items->class}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10">
                                <label for="target" class="control-label"><span>Target</span></label>
                                <div>                                
                                    <select name="target" class="selected2 form-control" >
                                        <option value="">--Pilih Target--</option>
                                        @foreach ($listTarget as $target)      
                                    <option value="{{$target}}" {{$target != $items->target ?:'selected'}}>{{$target}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
                        <a class="btn btn-primary" href="{{route('menu.index')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    
</script>
@endpush
