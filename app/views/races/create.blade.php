@extends('layouts.master')


@section('content')

    <h1>Add Race</h1>

    <div class="col-sm-5">
        <p><strong>Racer:</strong> {{ $racer->present()->fullName }}</p>

            {{ Form::open( [ 'method' => 'POST' , 'class' => 'form form-horizontal' ] ) }}

                <div class="form-group">
                    {{ Form::label( 'ski_hill' , 'Ski Hill') }}
                    {{ Form::select( 'ski_hill' ,  $skiHills , null , [ 'id' => 'ski_hill' , 'class' => 'form-control' ] ) }}
                </div>
                <div class="form-group">
                    {{ Form::label( 'date' , 'Date' ) }}
                    {{ Form::text( 'date' , null , [ 'id' => 'date' , 'class' => 'form-control' , 'required' => 'required' ] ) }}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Race</button>
                </div>
                <input type="hidden" name="racer_id" value="{{ $racer->id }}"/>
            {{ Form::close() }}
    </div>


@stop



@section('scripts')
    <script>
        $(document).ready(function()
        {
            $('#date').datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: new Date(),
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@stop