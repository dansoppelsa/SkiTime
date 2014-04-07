{{ Form::model( $user,  [ 'url' => 'users' , 'method' => 'POST' , 'class' => 'form-horizontal' ] ) }}

  <div class="form-group">

    {{ Form::label( 'first_name' , 'First Name' ) }}
    {{ Form::text( 'first_name' , null, [ 'id' => 'first_name' , 'class' => 'form-control' , 'required' => 'required' ] ) }}

  </div>
  <div class="form-group">

    {{ Form::label( 'last_name' , 'Last Name' ) }}
    {{ Form::text( 'last_name' , null, [ 'id' => 'last_name' , 'class' => 'form-control' , 'required' => 'required' ] ) }}

  </div>
  <div class="form-group">

    {{ Form::label( 'email' , 'Email' ) }}
    {{ Form::email( 'email' , null, [ 'id' => 'email' , 'class' => 'form-control' , 'required' => 'required' ] ) }}

  </div>
  <div class="well-lg">
    <div class="form-group">

      {{ Form::label( 'password' , 'Password' ) }}
      {{ Form::password( 'password' , [ 'id' => 'password' , 'class' => 'form-control' ] ) }}

    </div>
    <div class="form-group">

      {{ Form::label( 'password2' , 'Password (Again)' ) }}
      {{ Form::password( 'password2' , [ 'id' => 'password2' , 'class' => 'form-control' ] ) }}

    </div>
  </div>
  <div class="form-group text-center well-lg">

    {{ Form::submit( 'Sign Up' , [ 'class' => 'btn btn-primary'] ) }}

  </div>

{{ Form::close() }}