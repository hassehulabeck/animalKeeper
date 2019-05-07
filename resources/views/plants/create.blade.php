@extends('plants.layout')

@section('main')

{!! Form::open(['route' => 'plants.store']) !!}
 
    <div class="form-group">
        {!! Form::label('name', 'Vad heter plantan?') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('height', 'Höjd') !!}
        {!! Form::text('height', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Lägg till plantan', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}


@endsection