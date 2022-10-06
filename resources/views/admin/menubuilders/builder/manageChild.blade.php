<ol class="dd-list">
    @foreach($childs as $child)
        <li class="dd-item" data-id="{{ $child->id }}">
            <div class="dd-handle">{{ $child->title }}
            </div>
            <div class="item_actions">
                    <a href="#" class="btn btn-sm edit-item" >@lang('button.edit')</a>
                    <a href="{{ route('admin.builders.confirm-delete', $child->id ) }}" data-id="{{ route('admin.builders.delete', $child->id ) }}"  data-toggle="modal" data-target="#delete_confirm">Delete</a>
                </div>
            
            @if(count($child->childs))
                @include('admin.menubuilders.builder.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ol>