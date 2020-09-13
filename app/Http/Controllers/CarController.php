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
      $validatedData = $request->validate([
        'manufacturer' => 'required|max:255',
        'model' => 'required|max:255',
        'year' => 'required|integer|min:1900|max:2020',
        'engine' => 'required|max:255',
        'plate' => 'required|max:255',
        'user_id' => 'required|integer|max:255',
      ]);

      $data = $request->all();

      $new_car = new Car();
      $new_car->fill($data);
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
    public function edit(Car $car)
    {
      $tags = Tag::all();
      $users = User::all();
      return view('cars.edit', compact('car','tags', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
      $validatedData = $request->validate([
        'manufacturer' => 'required|max:255',
        'model' => 'required|max:255',
        'year' => 'required|integer|min:1900|max:2020',
        'engine' => 'required|max:255',
        'plate' => 'required|max:255',
        'user_id' => 'required|integer|max:255',
      ]);

      $data = $request->all();

      $car->update($data);
      $car->save();

      if (isset($data['tags'])) {
        $car->tags()->detach();
        $car->tags()->sync($data['tags']);
      }

      return redirect()->route('cars.show', $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
      $car->tags()->detach();
      $car->delete();
      return redirect()->route('cars.index');
    }
}
