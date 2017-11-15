<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddArtworkRequest;

use App\Models\Artist;
use App\Models\Artwork;

use Carbon\Carbon;

use Auth;

class ArtworkController extends Controller
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
     * Display the view page of an artwork
     *
     * @param integer $id artwork id in the database
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id = null)
    {
        if($id != null)
            $artwork = Artwork::find($id);
        else
            $artwork = null;

        return view('users.artists.view', compact('$artwork'));
    }

    /**
     * Add a new artwork in the database
     *
     * @param \App\Http\Requests\CreateArtistRequest $createArtistRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(AddArtworkRequest $addArtworkRequest)
    {
        if($addArtworkRequest->hasFile('image_artwork'))
            $path = $addArtworkRequest->file('image_artwork')->store('artworks');

        Artwork::create([
            'title' => $addArtworkRequest->input('title'),
            'description' => $addArtworkRequest->input('description'),
            'path_image' => $path,
            'artist_id' => Auth::user()->artist->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}
