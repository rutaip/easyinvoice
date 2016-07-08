<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
{
    public function index()
    {

        $customers = Customer::orderBy('last_name')
            ->get();

        /*if  (Gate::denies('customers', $customers)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('customers.index', compact('customers'));
    }

    public function show($id)
    {

        $customer = Customer::findOrFail($id);

        /*if  (Gate::denies('customers', $customers)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        //$countries = Countries::orderBy('name')->lists('name', 'name');

        return view('customers.create', compact('region', 'countries'));
    }

    public function store(CustomerRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Customer::create($request->all());

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('customers');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        //$countries = Countries::lists('name', 'name');

        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        /*if  (Gate::denies('edit', $customer)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $customer->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('customers');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        /*if  (Gate::denies('delete', $customer)) {

            abort(403, 'Sorry, not allowed');
        }*/
        session()->flash('flash_message', 'Record successfully deleted!');
        $customer->delete();

        return redirect('customers');
    }
}
