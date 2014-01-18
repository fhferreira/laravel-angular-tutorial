<?php
class CustomerController extends BaseController {

	public function getIndex() {
		$id = Input::get( 'id' );
		return Customer::find( $id );
	}

	public function getAll() {
		return Customer::all();
	}

	public function postIndex() {
		if ( Input::has( 'first_name', 'last_name', 'email' ) ) {
			$input = Input::all();
			if ( $input['first_name'] == '' || $input['last_name'] == '' || $input['email'] == '' ) {
				return Response::make( 'You need to fill all of the input fields', 400 );
			}
			$customer = new Customer;
			$customer->first_name = $input['first_name'];
			$customer->last_name = $input['last_name'];
			$customer->email = $input['email'];
			$customer->save();
			return $customer;
		} else {
			return Response::make( 'You need to fill all of the input fields', 400 );
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postEdit() {
		if ( Input::has( 'id', 'first_name', 'last_name', 'email' ) ) {
			$input = Input::all();
			$customer = Customer::find( $input['id'] );
			$customer->first_name = $input['first_name'];
			$customer->last_name  = $input['last_name'];
			$customer->email      = $input['email'];
			$customer->save();
			return $customer;
		} else {
			return Response::make( 'You need to fill all of the input fields', 400 );
		}
	}

	public function deleteIndex() {
		$id = Input::get( 'id' );
		$customer = Customer::find( $id );
		$customer->delete();
		return $id;
	}

}
