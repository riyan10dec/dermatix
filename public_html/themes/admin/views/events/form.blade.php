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
                {{ Theme::partial('file', ['name'=>'image', 'model'=> isset($model) ? $model : null]) }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('community')) has-error @endif">
                    {{ Form::label('community', 'Community :', ['class'=>'control-label']) }}
                    {{ Form::text('community', Input::old('community'), ['class'=>'form-control', 'placeholder'=>'Enter The Community']) }}
                    @if ($errors->has('community')) <p class="help-block">{{ $errors->first('community') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                            {{ Form::label('city', 'City :', ['class'=>'control-label']) }}
                            {{ Form::text('city', Input::old('city'), ['class'=>'form-control', 'placeholder'=>'Enter The City']) }}
                            @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group @if ($errors->has('country')) has-error @endif">
                            {{ Form::label('country', 'Country :', ['class'=>'control-label']) }}
                            {{ Form::text('country', Input::old('country'), ['class'=>'form-control', 'placeholder'=>'Enter The Country']) }}
                            @if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p> @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('place')) has-error @endif">
                    {{ Form::label('place', 'Place :', ['class'=>'control-label']) }}
                    {{ Form::textarea('place', Input::old('place'), ['class'=>'form-control', 'placeholder'=>'Enter The Place', 'rows'=>3]) }}
                    @if ($errors->has('place')) <p class="help-block">{{ $errors->first('place') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('agenda')) has-error @endif">
                    {{ Form::label('agenda', 'Agenda :', ['class'=>'control-label']) }}
                    {{ Form::textarea('agenda', Input::old('agenda'), ['class'=>'form-control', 'placeholder'=>'Enter The Agenda', 'rows'=>3]) }}
                    @if ($errors->has('agenda')) <p class="help-block">{{ $errors->first('agenda') }}</p> @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('date')) has-error @endif">
                    {{ Form::label('date', 'Date :', ['class'=>'control-label']) }}
                    {{ Form::text('date', Input::old('date'), ['class'=>'form-control', 'placeholder'=>'Enter The Date', 'data-plugin-datepicker', 'data-plugin-options'=>'{"format":"yyyy-mm-dd "}']) }}
                    @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group @if ($errors->has('time')) has-error @endif">
                    {{ Form::label('time', 'Time :', ['class'=>'control-label']) }}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        {{ Form::text('time[start]', Input::old('time[start]'), ['class'=>'form-control', 'placeholder'=>'Enter The Start Time', 'data-plugin-timepicker', 'data-plugin-options' => '{ "showMeridian": false }']) }}
                        <span class="input-group-addon">to</span>
                        {{ Form::text('time[end]', Input::old('time[end]'), ['class'=>'form-control', 'placeholder'=>'Enter The End Time',  'data-plugin-timepicker', 'data-plugin-options' => '{ "showMeridian": false }']) }}
                    </div>
                    @if ($errors->has('time')) <p class="help-block">{{ $errors->first('time') }}</p> @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                {{ Theme::partial('file', ['name'=>'banner', 'model'=> isset($model) ? $model : null]) }}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        {{ Form::submit('Publish', ['class'=>'btn btn-primary', 'name'=>'publish']) }}
        {{ Form::submit('Save as Draft', ['class'=>'btn btn-success', 'name'=>'draft']) }}
    </div>
</section>
{{ Theme::partial('form-footer') }}