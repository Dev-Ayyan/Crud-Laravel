<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="languages-table" width="100%">
    <thead>
     <tr>
        <th>Lang Name</th>
        <th>Archived</th>
        <th>Is Featured</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($languages as $language)
        <tr>
            <td>{!! $language->lang_name !!}</td>
            
<td>@if($language->archived =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</td>


            
<td>@if($language->is_featured =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</td>


            <td>
                 <a href="{{ route('admin.languages.show', collect($language)->first() ) }}">
                     <i class="fas fa-eye text-success mr-2" title="view language"></i>
                 </a>
                 <a href="{{ route('admin.languages.edit', collect($language)->first() ) }}">
                     <i class="fas fa-edit text-primary  mr-2" title="edit language"></i>
                 </a>
                 <a href="{{ route('admin.languages.confirm-delete', collect($language)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.languages.delete', collect($language)->first() ) }}">
                     <i class="fas fa-trash-alt text-danger"  title="delete language"></i>

                 </a>
            </td>
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
        $('#languages-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#languages-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#languages-table').on( 'length.dt', function ( e, settings, len ) {
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
