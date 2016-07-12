<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Customer;
use DB;
use App\Http\Requests;
use App\Http\Requests\InvoiceRequest;

class InvoicesController extends Controller
{
    public function index()
    {

        $invoices = Invoice::latest()->get();

        /*if  (Gate::denies('invoices', $invoices)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('invoices.index', compact('invoices'));
    }

    public function show($id)
    {

        $invoice = Invoice::findOrFail($id);

        /*if  (Gate::denies('invoices', $invoices)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('invoices.show', compact('invoice'));
    }

    public function create()
    {
        $customers = Customer::select(DB::raw('CONCAT(last_name, ", ", name) as customer'), 'id')
            ->orderBy('last_name')
            ->lists('customer', 'id');

        return view('invoices.create', compact('region', 'customers'));
    }

    public function store(InvoiceRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Invoice::create($request->all());

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('invoices');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        //$countries = Countries::lists('name', 'name');

        return view('invoices.edit', compact('invoice'));
    }

    public function update(InvoiceRequest $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        /*if  (Gate::denies('edit', $invoice)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $invoice->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('invoices');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        /*if  (Gate::denies('delete', $invoice)) {

            abort(403, 'Sorry, not allowed');
        }*/
        session()->flash('flash_message', 'Record successfully deleted!');
        $invoice->delete();

        return redirect('invoices');
    }
}
