@extends('layouts.master')


@section('content')

   <div class="col-sm-6">
        <h1>Racer Profile</h1>
        <div class="well">
            <a class="btn btn-primary btn-sm pull-right" title="Edit Racer {{ $racer->present()->fullName }}" href="/account/edit-racer/{{ $racer->id }}"><i class="glyphicon glyphicon-edit"></i> Edit Racer</a>
            <br><br>
            <button class="btn btn-danger btn-sm pull-right"
                id="delete-racer-btn"
                data-racer-name="{{ $racer->present()->fullName  }}"
                title="Delete Racer {{ $racer->present()->fullName }}"
                href="/account/delete-racer/{{ $racer->id }}"><i class="glyphicon glyphicon-trash"></i> Delete Racer</button>

            <table class="table table-condensed table-striped pull-left" style="width: auto;">
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
            <br style="clear: both;"/>
        </div>
   </div>
   <div class="col-sm-6">
        <h2>Races</h2>

        @if( $racer->races->count() > 0 )
            <ul>
                @foreach( $racer->races as $race )
                    <li>
                        <a href="/account/racer/{{ $racer->id }}/race/{{ $race->id }}">{{ $race->present()->skiHill }} - <em>{{ $race->present()->date }}</em></a>
                        &nbsp;&nbsp;
                        <button class="btn btn-danger btn-sm delete-race-btn"
                                href="/account/racer/{{ $racer->id }}/races/{{ $race->id }}/delete"
                                data-race-name="{{ $race->present()->skiHill  }} - {{ $race->present()->date }}"
                                ><i class="glyphicon glyphicon-trash"></i> Delete Race</button>
                        <br><br>

                    </li>
                @endforeach
            </ul>
        @else
            <p><em>There are no races currently registered for this racer.</em></p>
        @endif

        <br/>
        <br/>

        <a class="btn btn-primary btn-lg" href="/account/racer/{{ $racer->id }}/add-race"><i class="glyphicon glyphicon-plus-sign"></i> Add Race</a>
   </div>

   @include('racers/_confirm-delete-racer-modal')

   @include('racers/_confirm-delete-race-modal')

@stop