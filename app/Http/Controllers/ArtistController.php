<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Requests\CreateArtistRequest;

use Carbon\Carbon;

use Auth;

class ArtistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the view page of an artist
     *
     * @param integer $id artist id in the database
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id = null)
    {
        // If the user search for a special artist get it
        // Otherwise is the artist of the author
        if($id != null)
            $artist = Artist::find($id);
        else
            $artist = Auth::user()->artist;

        return view('users.artists.view', compact('artist'));
    }

    /**
     * Add a new artist in the database
     *
     * @param \App\Http\Requests\CreateArtistRequest $createArtistRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(CreateArtistRequest $createArtistRequest)
    {
        if(Auth::user()->artist)
            return redirect()->back();

        Artist::create([
            'name_artist' => $createArtistRequest->input('name_artist'),
            'biography' => $createArtistRequest->input('biography'),
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('artist_view');
    }
}
