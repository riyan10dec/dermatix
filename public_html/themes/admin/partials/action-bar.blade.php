<div class="action-bar">
    <a href="{{ URL::to('admin/'.Request::segment(2).'/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
    @if(Input::get('trash'))
        <a href="{{ URL::to('admin/'.Request::segment(2)) }}" class="trash text-danger"><i class="fa fa-trash"></i></a>
    @else
        <a href="{{ URL::to('admin/'.Request::segment(2)) }}?trash=true" class="trash text-muted"><i class="fa fa-trash"></i></a>
    @endif
</div>