@extends('main')
@section('content')
<div class="margin">
    <h2>Welcome to the Cube Summation Solver <i class="ion-cube"></i> </h2>
    <br>
    <div class="margin col-md-12">
        {!! Form::open(array('action' => 'CubeController@processData'))  !!}
    <div class="margin">
        {{ Form::textarea('input', null, ['class' => 'form-control']) }}
    </div>
        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}    
        {!! Form::close() !!}
    </div>
</div>

<div class="col-md-6">
    @include('includes/constrains')
</div>
<div class="col-md-6">
    @include('includes/input-example')
</div>
@endsection