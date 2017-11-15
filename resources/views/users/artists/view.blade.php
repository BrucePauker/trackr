@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($artist->name_artist)
                {{ $artist->name_artist  }}
            @else
                {{ Auth::user()->first_name . ' ' .  Auth::user()->last_name }}
            @endif
        </div>
    </div>
@endsection
