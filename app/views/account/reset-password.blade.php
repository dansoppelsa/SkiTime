@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-6">
            <h2>Reset Password</h2>

            <form method="POST" action="/reset-password">

                <div class="form-group">
                    <label for="password1">New Password</label>
                    <input type="password" required class="form-control" name="password1" />
                </div>

                <div class="form-group">
                    <label for="password2">Confirm New Password</label>
                    <input type="password" required class="form-control" name="password2" />
                </div>

                <input type="hidden" name="code" value="{{ $code }}">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>


@stop