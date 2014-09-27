@extends( 'layouts.master' )

@section( 'pageTitle' , 'Verify Account' )

@section( 'content' )

<div class="row">
    <h1>Verify Account</h1>

    <div class="alert alert-success">
        <h3>Account Verified</h3>
        <p>
            Your account has been successfully verified with <strong>Ski Time</strong>!
        </p>
        <p>
            Please continue to the <a href="/login">Login Page</a> to login to your account.
        </p>
    </div>
</div>

@stop