@extends('layouts.master')


@section('content')

    <h1>Race</h1>

    <div class="well">
        <p><strong>Ski Hill:</strong> <em>{{ $race->present()->skiHill }}</em></p>
        <p><strong>Date:</strong> <em>{{ $race->present()->date }}</em></p>
    </div>

    <div class="well well-lg col-sm-5">

        {{ Form::open([ 'method' => 'POST' , 'class' => 'form form-horizontal' ]) }}

            @if( $race->times->count() > 0 )
                <?php $counter = 1; ?>
                @foreach( $race->times as $time )
                    <div class="form-group">
                        <label for="">Run {{ $counter++ }}:</label>
                        <input type="text" name="run_{{ $counter }}" class="form-control" value="{{ $time->time }}"/>
                    </div>
                @endforeach
            @else
                <div class="form-group">
                    <label for="">Run 1:</label>
                    <input type="text" name="run_1" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Run 2:</label>
                    <input type="text" name="run_2" class="form-control" />
                </div>
            @endif

            <div class="form-group">
                <label for="">Finishing Place:</label>
                <input type="text" name="finishing_place" class="form-control" value="{{ $race->finishing_place }}"/>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Times</button>
            </div>
            <input type="hidden" name="race_id" value="{{ $race->id }}"/>

        {{ Form::close() }}
    </div>


    <div class="col-sm-3">
        <?php $text = urlencode('I just finished in position ' . $race->finishing_place . ' at the Ski Race at ' . $race->ski_hill . '.'); ?>
        <a class="twitter-hashtag-button btn btn-info btn-lg"
          href="https://twitter.com/intent/tweet?button_hashtag=SkiTime&text={{ $text }}"
          data-related="twitter">
        <img src="/img/twitter-logo.png" width="32" alt=""/> Tweet About It
        </a>
    </div>

@stop



@section('scripts')

@stop