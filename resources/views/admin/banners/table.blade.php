<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="banners-table" width="100%">
    <thead>
     <tr>
        <th>Name</th>
        <th>Heading</th>
      
      
        <th data-orderable="false">Type</th>
        <th>Source</th>
       
        <th>Status</th>
        <th class="text-center" data-orderable="false">Edit</th>
        <th class="text-center" data-orderable="false">Delete</th>
     </tr>
    </thead>
    <tbody>
    @foreach($banners as $banner)
        <tr>
            <td>{!! $banner->name !!}</td>
            <td>{!! $banner->heading !!}</td>
           
           
            <td>{!! $banner->type !!}</td>
            <td>
                
                {{ $banner->source }}
                
            </td>
           
            <td>{!! $banner->status !!}</td>
            <td class="text-center">

                 <a href="{{ route('admin.banners.edit', collect($banner)->first() ) }}" class="btn btn-sm btn-info">
                    Edit
                 </a>
               
            </td>
            <td class="text-center">  <a href="{{ route('admin.banners.confirm-delete', collect($banner)->first() ) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.banners.delete', collect($banner)->first() ) }}">
                Delete

            </a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this Item? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#banners-table').DataTable({
                      responsive: true,
                      pageLength: 25
                  });
                  $('#banners-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#banners-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop
