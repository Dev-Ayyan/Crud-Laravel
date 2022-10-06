<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
    <table class="table table-striped table-bordered" id="menus-table" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>

                <th class="text-center" data-orderable="false">Action</th>
                <!-- <th class="text-center" data-orderable="false">Delete</th> -->

            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{!! $menu->id !!}</td>
                <td>{!! $menu->name !!}</td>
                <td>{!! $menu->description !!}</td>

                <td class="fa_action_btn text-center">

                    <a href="{{ route('admin.menubuilders.builder', collect($menu)->first() ) }}" class="btn btn-sm btn-primary">
                        Create New Menu Link
                    </a>
                    <!-- <a href="{{ route('admin.menubuilders.edit', collect($menu)->first() ) }}" class="btn btn-sm btn-info">
                        Edit
                    </a> -->

                </td>
                <!-- <td class="text-center"> <a href="{{ route('admin.menubuilders.confirm-delete', collect($menu)->first() ) }}"
                        data-toggle="modal" data-target="#delete_confirm123"
                        data-id="{{ route('admin.menubuilders.delete', collect($menu)->first() ) }}" class="btn btn-sm btn-danger">
                        Delete </a></td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('footer_scripts')

<div class="modal fade" id="delete_confirm123" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this Item? This operation is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-danger Remove_square">Delete</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });

</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $('#menus-table').DataTable({
        responsive: true,
        pageLength: 25
    });
    $('#menus-table').on('page.dt', function () {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });
    $('#menus-table').on('length.dt', function (e, settings, len) {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });

    $('#delete_confirm123').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var $recipient = button.data('id');
        var modal = $(this);
        modal.find('.modal-footer a').prop("href", $recipient);
    })

</script>

@stop