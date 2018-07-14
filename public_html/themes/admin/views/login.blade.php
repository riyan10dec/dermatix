<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
    </div>
    <div class="panel-body">
        {{ Form::open(['method'=>'post']) }}
            <div class="form-group mb-lg @if ($errors->has('login')) has-error @endif">
                <label>Username / Email</label>
                <div class="input-group input-group-icon">
                    {{ Form::text('login', Input::old('login'), ['class'=>'form-control input-lg']) }}
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-user"></i>
                        </span>
                    </span>
                </div>
                @if ($errors->has('login')) <p class="help-block">{{ $errors->first('login') }}</p> @endif
            </div>

            <div class="form-group mb-lg @if ($errors->has('password')) has-error @endif">
                <div class="clearfix">
                    <label class="pull-left">Password</label>
                    <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
                </div>
                <div class="input-group input-group-icon">
                    {{ Form::password('password', ['class'=>'form-control input-lg']) }}
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-lock"></i>
                        </span>
                    </span>
                </div>
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="checkbox-custom checkbox-default">
                        <input id="RememberMe" name="rememberme" type="checkbox"/>
                        <label for="RememberMe">Remember Me</label>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                </div>
            </div>

        {{ Form::close() }}
    </div>
</div>

<p class="text-center text-muted mt-md mb-md">&copy; Copyright {{ date('Y', time()) }}. All Rights Reserved.</p>