{{ Form::open([ 'url' => '' , 'method' => 'POST' , 'class' => 'form-horizontal' ]) }}

  <div class="form-group">
    <div class="form-group">
      {{ Form::label( 'ski_hill' , 'Ski Hill') }}
      {{ Form::select( 'ski_hill' ,  $skiHills , null , [ 'id' => 'ski_hill' , 'class' => 'form-control' ] ) }}
    </div>
    <div class="form-group">
      {{ Form::label('date', 'Date' ) }}
      {{ Form::text( 'date', null , [ 'class' => 'form-control' ] ) }}
    </div>
    <div class="form-group">
      <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Race</button>
    </div>
  </div>

{{ Form::close() }}