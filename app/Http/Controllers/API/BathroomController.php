<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Validator;
use App\Bathroom;

class BathroomController extends Controller
{

    public function __construct()
      {
      }


    public function index()
    {
        $bathrooms = Bathroom::all();
        $status = 200;
        $response = array(
          'status' => $status,
          'data' => $bathrooms
        );

        return response()->json($response);
    }

    public function show($id)
    {
        $bathroom = Bathroom::find($id);
        if ($bathroom === null) {
            $status = 404;
            $data = null;
        }
        else {
            $status = 200;
            $data = $bathroom;
        }
        $response = array(
            'status' => $status,
            'data' => $data
        );

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $content = $request->getContent();
        $request->merge((array)json_decode($content));

        $rules = [
            'title' => 'required|max:191',
            'address' => 'required|max:191',
            'longitude' => 'required|max:191',
            'latitude' => 'required|max:191',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|max:191'
        ];
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            $data = $validation->getMessageBag();
            $status = 422;
        }
        else {
            $bathroom = new Bathroom();
            $bathroom->title = $request->input('title');
            $bathroom->address = $request->input('address');
            $bathroom->longitude = $request->input('longitude');
            $bathroom->latitude = $request->input('latitude');
            $bathroom->price = $request->input('price');
            $bathroom->rating = $request->input('rating');
            $bathroom->save();

            $data = $bathroom;
            $status = 200;
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $bathroom = Bathroom::find($id);
        if ($bathroom === null) {
            $data = null;
            $status = 404;
        }
        else {
            $content = $request->getContent();
            $request->merge((array)json_decode($content));

            $rules = [
                'title' => 'required|max:191',
                'address' => 'required|max:191',
                'longitude' => 'required|max:191',
                'latitude' => 'required|max:191',
                'price' => 'required|numeric|min:0',
                'rating' => 'required|max:191'
            ];
            $validation = Validator::make($request->all(), $rules);

            if ($validation->fails()) {
                $data = $validation->getMessageBag();
                $status = 422;
            }
            else {
                $bathroom = new Bathroom();
                $bathroom->title = $request->input('title');
                $bathroom->address = $request->input('address');
                $bathroom->longitude = $request->input('longitude');
                $bathroom->latitude = $request->input('latitude');
                $bathroom->price = $request->input('price');
                $bathroom->rating = $request->input('rating');
                $bathroom->save();
                $data = $bathroom;
                $status = 200;
            }
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }

    public function delete(Request $request, $id)
    {
        $book = Book::find($id);
        if ($book === null) {
            $data = null;
            $status = 404;
        }
        else {
            $book->delete();
            $data = null;
            $status = 200;
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }
}
