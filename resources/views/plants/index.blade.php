@extends('plants.layout')

@section('main')

    <div>
    <ul>
    @foreach ($plants as $plant) 
            <li>   {{ $plant->name }} </li>
            {!! Form::open(['route' => ['plants.destroy', $plant->plant_id], 'method' => 'post']) !!}
            {{ method_field('DELETE') }}
            @csrf

        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Delete plant">
        </div>
        {!! Form::close() !!}
        @endforeach
    
    </ul>
    </div>

@endsection