<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
    <table class="table table-striped table-bordered" id="footers-table" width="100%">
        <thead>
            <tr>
                <th>Copyrights</th>
              
               
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Twitter</th>
                <th>Linkedin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($footers as $footer)
            <tr>
                <td>{!! $footer->copyrights !!}</td>
                <td>{!! $footer->facebook !!}</td>
                <td>{!! $footer->instagram !!}</td>
                <td>{!! $footer->twitter !!}</td>
                <td>{!! $footer->linkedin !!}</td>
                <td>
                    <a href="{{ route('admin.footers.show', collect($footer)->first() ) }}">
                        <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA"
                            data-hc="#428BCA" title="view footer"></i>
                    </a>
                    <a href="{{ route('admin.footers.edit', collect($footer)->first() ) }}">
                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA"
                            data-hc="#428BCA" title="edit footer"></i>
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('footer_scripts')


<script>$(function () { $('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); }); });</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $('#footers-table').DataTable({
        responsive: true,
        pageLength: 25
    });
    $('#footers-table').on('page.dt', function () {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });
    $('#footers-table').on('length.dt', function (e, settings, len) {
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