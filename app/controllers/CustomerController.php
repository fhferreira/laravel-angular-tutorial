<?php
class CustomerController extends BaseController {

	public function getIndex() {
		$id = Input::get('id');
		return Customer::find($id);
	}

	public function getAll() {
	   return Customer::all();
	}

	public function postIndex() {
		if (Input::has('first_name', 'last_name', 'email')) {
			$input = Input::all();
			if ($input['first_name'] == '' || $input['last_name'] == '' || $input['email'] == '') {
			   return Response::make('You need to fill all of the input fields', 400);
			}
			$customer = new Customer;
			$customer->first_name = $input['first_name'];
			$customer->last_name = $input['last_name'];
			$customer->email = $input['email'];
			$customer->save(); 
			return $customer;
		} else {
	   	   return Response::make('You need to fill all of the input fields', 400);
	   }
	}

	public function deleteIndex() {
		$customer = Customer::find($id);
		$customer->delete();
		return $id;
	}
	
}