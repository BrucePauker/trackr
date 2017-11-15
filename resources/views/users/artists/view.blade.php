@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div id="carouselArtwork" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($artist->artworks->sortByDesc('created_at') as $key => $artwork)
                    <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                        <img class="d-block img-fluid image-carousel-profil m-auto" src="{{ asset('storage/'.$artwork->path_image) }}" alt="First slide">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselArtwork" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselArtwork" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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
                <div class="grid-artwork">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                    @foreach($artist->artworks->sortByDesc('created_at') as $artwork)
                        <div class="grid-item">
                            <img src="{{ asset('storage/'.$artwork->path_image) }}" class="img-fluid artwork-image" alt="{{ $artwork->title  }}">
                        </div>
                    @endforeach
                </div>
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
