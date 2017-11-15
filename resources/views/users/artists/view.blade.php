@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="media">
                    @if(asset('storage/avatars/'.Auth::user()->id.'.jpg'))
                        <img class="mr-3 img-fluid" src="{{ asset('storage/avatars/'.Auth::user()->id.'.jpg')  }}" alt="Profil picture" width="200px">
                    @else
                        <img class="mr-3" src="{{ asset('images/avatar.png') }}" alt="Profil picture" width="200px">
                    @endif
                    <div class="media-body">
                        <h5 class="mt-0">
                            @if($artist->name_artist)
                                {{ $artist->name_artist  }}
                            @else
                                {{ Auth::user()->first_name . ' ' .  Auth::user()->last_name }}
                            @endif
                        </h5>
                        {{ $artist->biography }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="section-title">Art Work</h2>
            <div class="container">
                @if(Auth::user()->artist === $artist)
                    <div class="row justify-content-end">
                        <i class="material-icons md-36" onclick="showAddArtWorkModal()">add</i>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('users.artists.addArtWork')
@endsection
