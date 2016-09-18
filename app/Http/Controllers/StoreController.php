<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stores = Store::orderBy('id', 'desc')->paginate(10);

		return view('stores.index', compact('stores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('stores.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$store = new Store();

		$store->code = $request->input("code");
        $store->name = $request->input("name");
        $store->country = $request->input("country");

		$store->save();

		return redirect()->route('stores.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$store = Store::findOrFail($id);

		return view('stores.show', compact('store'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$store = Store::findOrFail($id);

		return view('stores.edit', compact('store'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$store = Store::findOrFail($id);

		$store->code = $request->input("code");
        $store->name = $request->input("name");
        $store->country = $request->input("country");

		$store->save();

		return redirect()->route('stores.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$store = Store::findOrFail($id);
		$store->delete();

		return redirect()->route('stores.index')->with('message', 'Item deleted successfully.');
	}

}
