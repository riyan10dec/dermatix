@if(Request::is('*/edit'))
    {{ Form::model( $model, array( 'route' => array('admin.' . Request::segment(2) . '.update', $model->id), 'files' => true, 'method' => 'put', 'role' => 'form' ) ) }}
@else
    {{ Form::open( array( 'route' => array('admin.' . Request::segment(2) . '.index'), 'files' => true, 'method' => 'post', 'role' => 'form' ) ) }}
@endif