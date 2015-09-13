@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-6">
            <h2>Forgot Password</h2>

            <form method="POST" action="forgot-password">

                <div class="form-group">
                    <label for="email">Username (e-mail address)</label>
                    <input type="email" required class="form-control" name="email" />
                </div>
            	<div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>

    </div>


@stop