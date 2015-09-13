@extends( 'layouts.master' )

@section( 'pageTitle' , 'Login' )
@section( 'metaDescription' , 'Login to Ski Time' )


@section( 'content' )

<div class="row">

    <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
        <h1>Login</h1>

        <form action="/login" method="POST" class="form-horizontal well well-lg" role="form">
            <div class="form-group">
                <label for="email">Username (e-mail address):</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="e-mail address" required="required">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="glyphicon glyphicon-log-in"></i> Login
                </button>
            </div>
        </form>

        <p><a href="/forgot-password">Forgot your password?</a></p>

    </div>
</div>

@stop