<?php

namespace App\Http\Controllers\User;

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
      $this->middleware('role:user');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bathrooms = Bathroom::all();

        return view('user.bathrooms.index')->with(array('bathrooms' => $bathrooms
            ));
    }

    public function create()
    {
        return redirect()->route('user.bathrooms.index');
    }

    public function edit($id)
    {
        return redirect()->route('user.bathrooms.index');
    }

    
    public function show($id)
    {
        $bathroom = Bathroom::findOrFail($id);
        return view('user.bathrooms.show')->with(array(
            'bathroom' => $bathroom
            ));
    }

}
