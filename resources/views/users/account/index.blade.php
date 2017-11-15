@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                @if(!Auth::user()->artist)
                    <div class="card card-default">
                        <div class="card-heading">Register as artist</div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('artist_add') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name_artist') ? ' has-error' : '' }}">
                                    <label for="name_artist" class="col-md-4 control-label">Artist Name</label>

                                    <div class="col-md-6">
                                        <input id="name_artist" type="name_artist" class="form-control" name="name_artist" value="{{ old('name_artist') }}" autofocus>

                                        @if ($errors->has('name_artist'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name_artist') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('biography') ? ' has-error' : '' }}">
                                    <label for="biography" class="col-md-4 control-label">Biography</label>

                                    <div class="col-md-6">
                                        <textarea id="biography" type="biography" class="form-control" name="biography"></textarea>

                                        @if ($errors->has('biography'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('biography') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
