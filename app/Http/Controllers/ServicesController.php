<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\Http\Requests\ServiceRequest;

class ServicesController extends Controller
{
    public function index()
    {

        $services = Service::latest()->get();

        /*if  (Gate::denies('services', $services)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('services.index', compact('services'));
    }

    public function show($id)
    {

        $service = Service::findOrFail($id);

        /*if  (Gate::denies('services', $services)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('services.show', compact('service'));
    }

    public function create()
    {
        //$countries = Countries::orderBy('name')->lists('name', 'name');

        return view('services.create', compact('region', 'countries'));
    }

    public function store(ServiceRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Service::create($request->all());

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('services');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        //$countries = Countries::lists('name', 'name');

        return view('services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        /*if  (Gate::denies('edit', $service)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $service->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('services');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        /*if  (Gate::denies('delete', $service)) {

            abort(403, 'Sorry, not allowed');
        }*/
        session()->flash('flash_message', 'Record successfully deleted!');
        $service->delete();

        return redirect('services');
    }
}
