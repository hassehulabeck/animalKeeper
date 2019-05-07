@extends ('plants.layout')

@section('main')

    <div class="blomma">
        {{ $plant->name }}
        <div class="high">
            {{ $plant->height }}
        </div>
    </div>

@endsection