@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">              
            <div class="card">
                <div class="card-header">Daftar Menu  <a href="#newModal" class="btn btn-success btn-sm float-right" data-toggle="modal"><span class="fa fa-plus"></span> New</a>
                </div>
                <div class="card-body" style="max-height:65vh; overflow-y:auto;">
                <div class="dd" id="nestable">
                    {!! $menu !!}
                </div>
                <p id="success-indicator" style="display:none; margin-right: 10px;">
                        <span class="glyphicon glyphicon-ok"></span> Menu berhasil disimpan
                    </p>
                </div>
            </div>
    
            
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <small>Info</small> 
                </div>
                <div class="card-body">
                    <p>Drag the menu list to re-order, and click Update Menu to save the position. To add a menu, use the Add Menu form below.</p>

                </div>
            </div>
        </div>
        </div>
    </div>
        <!-- Create new item Modal -->
        @include('administrator.menus.create')
        <!-- /.modal -->
        
        <!-- Delete item Modal -->
        @include('administrator.menus._hapus')
        <!-- /.modal -->
@endsection

@push('style')
<link href="{{ asset('template/vendor/nestable/css/nestable.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{ asset('template/vendor/nestable/js/jquery.nestable.js')}}"></script>
<script type="text/javascript">
$(function() {
  $('.dd').nestable({ 
    dropCallback: function(details) {
       
       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });
       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }
       $.post('{{url("menu")}}', 
        { source : details.sourceId, 
          destination: details.destId, 
          order:JSON.stringify(order),
          rootOrder:JSON.stringify(rootOrder),
          _token: "{{ csrf_token() }}"
        }, 
        function(data) {
         console.log('data '+data); 
        })
       .done(function() { 
          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
       })
       .fail(function() {  })
       .always(function() {  });
     }
   });
  $('.delete_toggle').each(function(index,elem) {
      $(elem).click(function(e){
        e.preventDefault();
        $('#postvalue').attr('value',$(elem).attr('rel'));
        $('#deleteModal').modal('toggle');
      });
  });
});
</script>
@endpush
