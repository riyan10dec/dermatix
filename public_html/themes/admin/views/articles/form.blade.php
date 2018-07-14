{{ Theme::partial('form-header', ['model'=> isset($model) ? $model : null ]) }}
<section class="panel">
    <div class="panel-heading">
        <a href="{{ URL::route('admin.'.Request::segment(2).'.index') }}" class="btn btn-default">Back</a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('title')) has-error @endif">
                    {{ Form::label('title', 'Title :', ['class'=>'control-label']) }}
                    {{ Form::text('title', Input::old('title'), ['class'=>'form-control', 'placeholder'=>'Enter The Title', 'data-slug-converter']) }}
                    <div class="slug">
                        {{ Form::label('slug', URL::to(Str::singular(Request::segment(2))).'/', ['class'=>'slug-label']) }}
                        {{ Form::text('slug', Input::old('slug'), ['class'=>'slug-url', 'data-slug', 'readonly']) }}
                    </div>
                    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                @if(isset($model) and $model->image->url('thumb'))
                    <div class="row">
                        <div class="col-sm-3">
                                <img src="{{ $model->image->url('thumb') }}" alt="" width="100" height="100">
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group @if ($errors->has('image')) has-error @endif">
                                {{ Form::label('image', 'Image :', ['class'=>'control-label']) }}
                                {{ Form::file('image', ['class'=>'form-control']) }}
                                @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group @if ($errors->has('image')) has-error @endif">
                        {{ Form::label('image', 'Image :', ['class'=>'control-label']) }}
                        {{ Form::file('image', ['class'=>'form-control']) }}
                        @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                <div class="form-group @if ($errors->has('body')) has-error @endif">
                    {{ Form::label('body', 'Content :', ['class'=>'control-label']) }}
                    {{ Form::textarea('body', Input::old('body'), ['class'=>'form-control', 'placeholder'=>'Enter The Content', 'data-plugin-redactor']) }}
                    @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
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