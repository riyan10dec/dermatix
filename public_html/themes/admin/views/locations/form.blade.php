{{ Theme::partial('form-header', ['model'=> isset($model) ? $model : null ]) }}
<section class="panel">
    <div class="panel-heading">
        <a href="{{ URL::route('admin.'.Request::segment(2).'.index') }}" class="btn btn-default">Back</a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group @if ($errors->has('city')) has-error @endif">
                    {{ Form::label('city', 'City :', ['class'=>'control-label']) }}
                    {{ Form::select('city', $cities, Input::old('city'), ['class'=>'form-control', 'placeholder'=>'Select The City', 'data-plugin-selectTwo']) }}
                    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group @if ($errors->has('store_name')) has-error @endif">
                    {{ Form::label('store_name', 'Store Name :', ['class'=>'control-label']) }}
                    {{ Form::text('store_name', Input::old('store_name'), ['class'=>'form-control', 'placeholder'=>'Enter The Store Name']) }}
                    @if ($errors->has('store_name')) <p class="help-block">{{ $errors->first('store_name') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group @if ($errors->has('address')) has-error @endif">
                    {{ Form::label('address', 'Address :', ['class'=>'control-label']) }}
                    {{ Form::textarea('address', Input::old('address'), ['class'=>'form-control', 'placeholder'=>'Enter The Address', 'rows'=>3]) }}
                    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                </div>
            </div>
        </div>

    </div>
    <div class="panel-footer">
        {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
    </div>
</section>
{{ Theme::partial('form-footer') }}