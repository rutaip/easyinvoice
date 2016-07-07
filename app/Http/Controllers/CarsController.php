<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\Http\Requests\CarRequest;

class CarsController extends Controller
{
    public function index()
    {

        $cars = Car::latest()->get();

        /*if  (Gate::denies('cars', $cars)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('cars.index', compact('cars'));
    }

    public function show($id)
    {

        $car = Car::findOrFail($id);

        /*if  (Gate::denies('cars', $cars)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('cars.show', compact('car'));
    }

    public function create()
    {
        //$countries = Countries::orderBy('name')->lists('name', 'name');

        return view('cars.create', compact('region', 'countries'));
    }

    public function store(CarRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Car::create($request->all());

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('cars');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        //$countries = Countries::lists('name', 'name');

        return view('cars.edit', compact('car'));
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);

        /*if  (Gate::denies('edit', $car)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $car->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('cars');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        /*if  (Gate::denies('delete', $car)) {

            abort(403, 'Sorry, not allowed');
        }*/
        session()->flash('flash_message', 'Record successfully deleted!');
        $car->delete();

        return redirect('cars');
    }
}
