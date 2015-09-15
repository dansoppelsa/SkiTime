@extends( 'layouts.master' )

@section( 'pageTitle' , 'Account - Edit' )


@section( 'content' )

<div class="row">
    <h1>Edit Account</h1>

    <div class="col-sm-6">
        <div class="well">
            <h3>Reset Password</h3>

            <form action="" class="form">
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" id="password1" name="password1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password2">Password (again)</label>
                    <input type="password" id="password2" name="password2" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@stop