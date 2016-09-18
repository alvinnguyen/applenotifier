<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscribers = Subscriber::orderBy('id', 'desc')->paginate(10);

		return view('subscribers.index', compact('subscribers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subscribers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$subscriber = new Subscriber();

		$subscriber->email = $request->input("email");

		$subscriber->save();

		return redirect()->route('subscribers.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subscriber = Subscriber::findOrFail($id);

		return view('subscribers.show', compact('subscriber'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subscriber = Subscriber::findOrFail($id);

		return view('subscribers.edit', compact('subscriber'));
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
		$subscriber = Subscriber::findOrFail($id);

		$subscriber->email = $request->input("email");

		$subscriber->save();

		return redirect()->route('subscribers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subscriber = Subscriber::findOrFail($id);
		$subscriber->delete();

		return redirect()->route('subscribers.index')->with('message', 'Item deleted successfully.');
	}

}
