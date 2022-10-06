<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md theme_datatable">
    <table class="table table-striped table-bordered" id="pages-table" width="100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Heading</th>
                <th>Sub Heading</th>
                <th>Meta Title</th>
                <th>Visit</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>{!! $page->heading !!}</td>
                <td>{!! \Illuminate\Support\Str::limit($page->sub_heading, 120, $end='...') !!}</td>

                <td>{!! $page->meta_title !!}</td>
                <td>
                    @if($page->type == 'home')

                    <a href="/" target="_blank"><i class="livicon" data-name="external-link" data-size="18"
                            data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view page"></i>&nbsp;Visit</a>
                    @else
                    <a href="/{{ $page->slug }}" target="_blank"><i class="livicon" data-name="external-link"
                            data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA"
                            title="view page"></i>&nbsp;Visit</a>
                    @endif



                </td>
                <td>
                    <a href="{{ route('admin.pages.show', collect($page)->first() ) }}">

                        <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA"
                            data-hc="#428BCA" title="view page"></i>
                    </a>
                    <a href="{{ route('admin.pages.edit', collect($page)->first() ) }}">
                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA"
                            data-hc="#428BCA" title="edit page"></i>
                    </a>

                    @php
                    $infoBoxList = array("propertyreport", "riskdata", "courthouse-documents",
                    "individualmaps","professional-services");
                    @endphp

                    @if(in_array($page->type, $infoBoxList))

                    <a href="{{ route('admin.pages.infobox', collect($page)->first() ) }}">
                        <i class="livicon" data-name="inbox" data-size="18" data-loop="true" data-c="#515763"
                            data-hc="#515763" title="Info Boxes"></i>

                    </a>
                    @endif

                    @if($page->type == 'home')
                    <a href="{{ route('admin.homeblocks.index') }}">
                        <i class="livicon" data-c="#515763" data-hc="#515763" data-name="thumbnails-big" data-size="18"
                            title="Home Modal Box" data-loop="true"></i>
                    </a>
                    @endif
                </td>
                <td class="text-center">
                    @if($page->type == 'default')
                    <a href="{{ route('admin.pages.confirm-delete', collect($page)->first() ) }}" data-toggle="modal"
                        data-target="#delete_confirm"
                        data-id="{{ route('admin.pages.delete', collect($page)->first() ) }}"
                        class="btn btn-sm btn-danger">
                        Delete
                    </a>
                    @else
                    Disabled
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('footer_scripts')

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
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
<script>$(function () { $('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); }); });</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $('#pages-table').DataTable({
        responsive: true,
        pageLength: 25,

    });
    $('#pages-table').on('page.dt', function () {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });
    $('#pages-table').on('length.dt', function (e, settings, len) {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });

    $('#delete_confirm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var $recipient = button.data('id');
        var modal = $(this);
        modal.find('.modal-footer a').prop("href", $recipient);
    })

</script>

@stop