<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Tag;
use App\User;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cars= Car::all();
      return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();
      $users = User::all();
      return view('cars.create', compact('tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data_validation->validate([
        'manufacturer' => 'required|max:255',
        'year' => 'required|integer|min:1900|max:2020',
        'engine' => 'required|max:255',
        'plate' => 'required|max:255',
        'user_id' => 'required|integer|max:255',
      ]);

      $data = $request->all();

      $new_car = new Car();
      $new_car->manufacturer = $data['manufacturer'];
      $new_car->year = $data['year'];
      $new_car->engine = $data['engine'];
      $new_car->plate = $data['plate'];
      $new_car->user_id = $data['user_id'];
      $new_car->save();

      if (isset($data['tags'])) {
        $new_car->tags()->sync($data['tags']);
      }

      return redirect()->route('cars.show', $new_car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
      return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
