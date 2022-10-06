<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md theme_datatable">
    <div class="text-right mb-3">

        <a class="btn btn-dark" href="{{ route('admin.infoboxes.createcategory', $category->id ) }}"> Add New InfoBox </a>

    </div>
    <table class="table table-striped table-bordered infobox-table" id="infobox-table{{ $category->id }}" width="100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Heading</th>
                <th>Icon</th>
                @if($page->type != 'courthouse-documents')
                <th>Description</th>
                @endif
                @if($page->type != 'propertyreport')

                <th>Price</th>

                @endif
                <th class="text-center" data-orderable="false">Edit</th>
                <th class="text-center" data-orderable="false">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->infobox as $box)
            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>{!! $box->title !!}</td>
                <td><img src="{{ asset('/'.$box->icon) }}" class="datatable-icon" alt=""></td>
                @if($page->type != 'courthouse-documents')
                <td>{!! \Illuminate\Support\Str::limit($box->description, 120, $end='...') !!}</td>
                @endif
                @if($page->type != 'propertyreport')
                <td>{!! $box->price !!}</td>
                @endif
                <td class="text-center">

                    <a href="{{ route('admin.infoboxes.edit', collect($box)->first() ) }}"  class="btn btn-sm btn-info">
                        Edit Info Box Heading
                    </a>
                </td>
                <td class="text-center"> <a href="{{ route('admin.infoboxes.confirm-delete', collect($box)->first() ) }}"
                        data-toggle="modal" data-target="#delete_confirm"
                        data-id="{{ route('admin.infoboxes.delete', collect($box)->first() ) }}" class="btn btn-sm btn-danger">
                        Delete
                    </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>