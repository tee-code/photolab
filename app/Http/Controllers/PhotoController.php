<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoUploadStoreRequest;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function dashboard()
    {

        $photos = Photo::paginate(5);

        return view('dashboard', compact('photos'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(30);

        return view('welcome', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $photo = $request->file('file');

        $originalName = explode('.', $photo->getClientOriginalName())[0];
        
        $photoName = $originalName . '.' . time() . '.' . $photo->extension();

        $photo->move(storage_path('app/public/images'), $photoName);

        Photo::create([
            'name' => $originalName,
            'path' => '/storage/images/' . $photoName,
            'user_id' => auth()->user()->id
        ]);

        return response()->json(['success' => $photoName]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::destroy($id);


        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}
