<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomersController extends Controller
{
    //
    public function index() {
        return view('customers');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // Add validation rules for other fields
        ]);
        // Insert query in laravel using ORM
        $customers = new Customers();
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->password = md5($request['password']);
        $customers->gender = $request['gender'];
        $customers->address = $request['address'];
        $customers->country = $request['country'];
        $customers->state = $request['state'];
        $customers->dob = $request['dob'];
        $customers->save();

        return redirect('customers/view');
    }

    public function view() {
        $customers = Customers::all();
//        precode($customers);
//        die;
        $data = compact('customers');

        return view('customer-view')->with($data);
    }

    public function trash() {
        $customers = Customers::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function forceDelete($id) {
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect('customers/view');
    }

    public function delete($id) {
        $customer = Customers::find($id);
        Log::info('customer id' . $customer);
        if(!is_null($customer)) {
            $customer->delete();
        }
        return redirect('customers/view');
    }

    public function restore($id) {
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)) {
            $customer->restore();
        }
        return redirect('customers/view');
    }

    public function edit($id) {
        $customer = Customers::find($id);
        if(is_null($customer)) {
            return('customers/view');
        } else {
            $data = compact('customer');
            return view('customers-update')->with($data);
        }
    }

    public function update($id, Request $request) {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
            ]
        );
        $customer = Customers::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->country = $request['country'];
        $customer->state = $request['state'];
        $customer->dob = $request['dob'];
        $customer->save();

        return redirect('customers/view');
    }
}
