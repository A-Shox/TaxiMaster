@extends('layout')t

@section('content')

    <form method="POST" action="/test">


        <div class="form-group">
            <input name="name" class="form-control"/>
        </div>

        <div class="form-group">
            <button type="submit" class="form-control">Submit</button>
        </div>

    </form>

@stop