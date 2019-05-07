@extends('plants.layout')

@section('main')

    <div>
    <ul>
    @foreach ($plants as $plant) 
            <li>   {{ $plant->name }} </li>
        @endforeach
    
    </ul>
    </div>

@endsection