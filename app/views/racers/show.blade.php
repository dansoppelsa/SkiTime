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

   <div id="confirmModal" style="display: none;" class="modal fade">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Confirm Racer Delete</h4>
               </div>
               <div class="modal-body">
                   <p><strong>Are you sure you want to delete this racer: <em><span id="racer-name-confirm"></span></em> ?</strong></p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                   <button type="button" id="confirm-delete-btn" data-url="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Yes, delete racer</button>
               </div>
           </div>
       </div>
   </div>

@stop