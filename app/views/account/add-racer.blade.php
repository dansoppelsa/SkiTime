@extends( 'layouts.master' )

@section( 'pageTitle' , 'Account Home' )


@section( 'content' )


<div class="row">
    <h1>Add Racer</h1>

    {{ Form::open( [ 'url' => '/account/add-racer' , 'method' => 'POST' , 'class' => 'form-horizontal' ] ) }}

        <div class="form-group">
            {{ Form::label( 'first_name', 'First Name' ) }}
            {{ Form::text( 'first_name' , null, [ 'id' => 'first_name' , 'class' => 'form-control' ,'required' => 'required' ] ) }}
        </div>

        <div class="form-group">
            {{ Form::label( 'last_name', 'Last Name' ) }}
            {{ Form::text( 'last_name' , null, [ 'id' => 'last_name' , 'class' => 'form-control' , 'required' => 'required' ] ) }}
        </div>

        <div class="form-group">
            {{ Form::label( 'dob' , 'Date of Birth' ) }}
            {{ Form::text( 'dob' , null , [ 'id' => 'dob' , 'class' => 'form-control' , 'required' => 'required' ] ) }}
        </div>

        <div class="form-group">
            {{ Form::label( 'home_ski_hill' , 'Home Ski Hill') }}
            {{ Form::select( 'home_ski_hill' ,  $ski_hills , null , [ 'id' => 'home_ski_hill' , 'class' => 'form-control' ] ) }}
        </div>

        <div class="form-group">
            {{ Form::submit( 'Add Racer' , [ 'class' => 'btn btn-primary' ] ) }}
        </div>

    {{ Form::close() }}

</div>

@stop



@section('scripts')
    <script>
        $(document).ready(function()
        {
            $('#dob').datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: new Date(1990, 1 - 1, 1),
                maxDate: new Date(2008, 1 - 1, 1),
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@stop