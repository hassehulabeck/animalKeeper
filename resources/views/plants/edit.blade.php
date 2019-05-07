@extends('plants.layout')

@section('main')

{!! Form::open(['route' => ['plants.update', $plant->plant_id], 'method' => 'post']) !!}
            {{ method_field('PATCH') }}
            @csrf
 
    <div class="form-group">
        {!! Form::label('name', 'Vad heter plantan?') !!}
        {!! Form::text('name', $plant->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('height', 'Höjd') !!}
        {!! Form::text('height', $plant->height, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Uppdatera plantan', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}


@endsection