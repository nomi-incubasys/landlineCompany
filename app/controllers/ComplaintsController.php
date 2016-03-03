<?php

class ComplaintsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $data['result'] = Complaint::all();
            return View::make('complaints.index',$data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('complaints.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = Request::all();

            $Complaint = new Complaint();
            $Complaint->complaint_subject = $input['subject'];
            $Complaint->complaint_body = $input['complaint_body'];
            $Complaint->status = 0;
            $Complaint->user_id = Auth::user()->id;

            $Complaint->save();
            
            return Redirect::to('/complaints');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $data['result'] = Complaint::find($id);
            return View::make('complaints.edit',$data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
            $input = Request::all();
            $store = Complaint::find($input['id']);
            $store->complaint_subject = $input['subject'];
            $store->complaint_body = $input['complaint_body'];
            
            $store->update();
            
            return Redirect::to('/complaints');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
