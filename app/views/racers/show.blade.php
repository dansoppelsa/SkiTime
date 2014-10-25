@extends('layouts.master')


@section('content')

   <div class="col-sm-6">
        <h1>Racer Profile</h1>
        <div class="well">
            <table class="table table-condensed table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ $racer->present()->fullName }}</td>
                </tr>
                <tr>
                    <th>Birthdate</th>
                    <td>{{ $racer->present()->birthdate }}</td>
                </tr>
                <tr>
                    <th>Home Ski Hill</th>
                    <td>{{ $racer->present()->homeSkiHill }}</td>
                </tr>
            </table>
        </div>
   </div>
   <div class="col-sm-6">
        <h2>Races</h2>

        @if( $racer->races->count() > 0 )
            <ul>
                @foreach( $racer->races as $race )
                    <li><a href="/account/racer/{{ $racer->id }}/race/{{ $race->id }}">{{ $race->present()->skiHill }} - <em>{{ $race->present()->date }}</em></a></li>
                @endforeach
            </ul>
        @else
            <p><em>There are no races currently registered for this racer.</em></p>
        @endif

        <br/>
        <br/>

        <a class="btn btn-primary btn-lg" href="/account/racer/{{ $racer->id }}/add-race"><i class="glyphicon glyphicon-plus-sign"></i> Add Race</a>
   </div>

@stop