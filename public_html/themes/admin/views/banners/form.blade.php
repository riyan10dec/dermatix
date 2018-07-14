{{ Theme::partial('form-header', ['model'=> isset($model) ? $model : null ]) }}
<section class="panel">
    <div class="panel-heading">
        <a href="{{ URL::route('admin.'.Request::segment(2).'.index') }}" class="btn btn-default">Back</a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group @if ($errors->has('title')) has-error @endif">
                    {{ Form::label('title', 'Title :', ['class'=>'control-label']) }}
                    {{ Form::text('title', Input::old('title'), ['class'=>'form-control', 'placeholder'=>'Enter The Title']) }}
                    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-4">
                @if(isset($model) and $model->image->url('thumb'))
                    <img src="{{ $model->image->url('thumb') }}" alt="" width="300" height="105">
                    <div class="form-group @if ($errors->has('image')) has-error @endif">
                        {{ Form::label('image', 'Image :', ['class'=>'control-label']) }}
                        {{ Form::file('image', ['class'=>'form-control']) }}
                        @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                    </div>
                @else
                    <div class="form-group @if ($errors->has('image')) has-error @endif">
                        {{ Form::label('image', 'Image :', ['class'=>'control-label']) }}
                        {{ Form::file('image', ['class'=>'form-control']) }}
                        <small>Size : 1425 x 500</small>
                        @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                    </div>
                @endif
            </div>
            <div class="col-sm-4">
                <div class="form-group @if ($errors->has('type')) has-error @endif">
                    {{ Form::label('type', 'Type :', ['class'=>'control-label']) }}
                    {{ Form::select('type', ['default'=>'default', 'video' => 'video'], Input::old('video'), ['class'=>'form-control', 'id'=>'type']) }}
                    @if ($errors->has('type')) <p class="help-block">{{ $errors->first('type') }}</p> @endif
                </div>
            </div>
            <div id="desc" class="col-sm-12">
                <div class="form-group @if ($errors->has('desc')) has-error @endif">
                    {{ Form::label('desc', 'Description :', ['class'=>'control-label']) }}
                    {{ Form::textarea('desc', Input::old('desc'), ['class'=>'form-control', 'placeholder'=>'Enter The Description', 'rows'=>3]) }}
                    @if ($errors->has('desc')) <p class="help-block">{{ $errors->first('desc') }}</p> @endif
                </div>
            </div>
            <div id="videoUrl" class="col-sm-12">
                <div class="form-group @if ($errors->has('video_url')) has-error @endif">
                    {{ Form::label('video_url', 'Video Url :', ['class'=>'control-label']) }}
                    {{ Form::text('video_url', Input::old('video_url'), ['class'=>'form-control', 'placeholder'=>'Enter The Video Url']) }}
                    @if ($errors->has('video_url')) <p class="help-block">{{ $errors->first('video_url') }}</p> @endif
                </div>
            </div>
        </div>

    </div>
    <div class="panel-footer">
        {{ Form::submit('Publish', ['class'=>'btn btn-primary', 'name'=>'publish']) }}
        {{ Form::submit('Save as Draft', ['class'=>'btn btn-success', 'name'=>'draft']) }}
    </div>
</section>
{{ Theme::partial('form-footer') }}

<script>
    $(document).ready(function () {
        function type(val){
            if(val == 'video'){
                $('#videoUrl').show();
                $('#videoUrl').find('input').val('');
                $('#desc').hide();
                console.log('video');
            } else {
                $('#videoUrl').hide();
                $('#videoUrl').find('input').val('-');
                $('#desc').show();
                console.log('d');
            }
        }

        type($('#type option:selected').text());

        $('#type').on('change',function(){
            var val = $(this).val();
            type(val);
        });
    });
</script>