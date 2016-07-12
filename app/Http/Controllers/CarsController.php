<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\Http\Requests\CarRequest;
use DB;
use Response;

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
        $customers = Customer::select(DB::raw('CONCAT(last_name, ", ", name) as customer'), 'id')
            ->orderBy('last_name')
            ->lists('customer', 'id');

        return view('cars.create', compact('region', 'customers'));
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
        $customers = Customer::select(DB::raw('CONCAT(last_name, ", ", name) as customer'), 'id')
            ->orderBy('last_name')
            ->lists('customer', 'id');

        return view('cars.edit', compact('car', 'customers'));
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

    public function info($id)
    {

        $cars = Car::where('customer_id', $id)
            ->get();

        /*if  (Gate::denies('customers', $customers)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return Response::json(['success' => true, 'info' => $cars]);
    }

    public function details($id)
    {

        $details = Car::findorFail($id);

        /*if  (Gate::denies('customers', $customers)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return Response::json(['success' => true, 'info' => $details]);
    }
    
}
