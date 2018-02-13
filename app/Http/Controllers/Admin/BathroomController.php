<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Validator;
use App\Bathroom;

class BathroomController extends Controller
{

    public function __construct()
      {
      $this->middleware('auth');
      $this->middleware('role:admin');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bathrooms = Bathroom::all();

        return view('admin.bathrooms.index')->with(array('bathrooms' => $bathrooms
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bathrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'address' => 'required|max:191',
            'longitude' => 'required|max:191',
            'latitude' => 'required|max:191',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|max:191'
            ]);

        $bathroom = new Bathroom();
        $bathroom->title = $request->input('title');
        $bathroom->address = $request->input('address');
        $bathroom->longitude = $request->input('longitude');
        $bathroom->latitude = $request->input('latitude');
        $bathroom->price = $request->input('price');
        $bathroom->rating = $request->input('rating');
        $bathroom->save();

        $session = $request->session()->flash('message','Bathroom adding succesfully');
        
        return redirect()->route('admin.bathrooms.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bathroom = Bathroom::findOrFail($id);
        return view('admin.bathrooms.show')->with(array(
            'bathroom' => $bathroom
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bathroom = Bathroom::findOrFail($id);
        return view('admin.bathrooms.edit')->with(array(
            'bathroom' => $bathroom
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bathroom = Bathroom::findOrFail($id);

        $request->validate([
            'title' => 'required|max:191',
            'address' => 'required|max:191',
            'longitude' => 'required|max:191',
            'latitude' => 'required|max:191',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|max:191'
            ]);

        $bathroom->title = $request->input('title');
        $bathroom->address = $request->input('address');
        $bathroom->longitude = $request->input('longitude');
        $bathroom->latitude = $request->input('latitude');
        $bathroom->price = $request->input('price');
        $bathroom->rating = $request->input('rating');
        $bathroom->save();

        $session = $request->session()->flash('message','Bathroom updated succesfully');
        
        return redirect()->route('admin.bathrooms.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bathroom = Bathroom::findOrFail($id);

        $bathroom->delete();

        Session::flash('message', 'Bathroom deleted successfully!');

        return redirect()->route('admin.bathrooms.index');
    }
}
