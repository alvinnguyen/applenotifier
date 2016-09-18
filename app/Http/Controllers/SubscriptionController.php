<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscriptions = Subscription::orderBy('id', 'desc')->paginate(10);

		return view('subscriptions.index', compact('subscriptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subscriptions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$subscription = new Subscription();

		$subscription->user_id = $request->input("user_id");
        $subscription->topic_id = $request->input("topic_id");

		$subscription->save();

		return redirect()->route('subscriptions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subscription = Subscription::findOrFail($id);

		return view('subscriptions.show', compact('subscription'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subscription = Subscription::findOrFail($id);

		return view('subscriptions.edit', compact('subscription'));
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
		$subscription = Subscription::findOrFail($id);

		$subscription->user_id = $request->input("user_id");
        $subscription->topic_id = $request->input("topic_id");

		$subscription->save();

		return redirect()->route('subscriptions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subscription = Subscription::findOrFail($id);
		$subscription->delete();

		return redirect()->route('subscriptions.index')->with('message', 'Item deleted successfully.');
	}

}
