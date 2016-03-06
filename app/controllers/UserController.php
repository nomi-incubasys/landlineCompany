<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index() {
        $data['result'] = User::all();
        return View::make('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $image = Input::file('image');
        
	$destinationPath = 'uploads/';
	$filename = $image->getClientOriginalName();

	Input::file('image')->move($destinationPath, $filename);
        
        $input = Request::all();
        
        $User = new User();
        $User->name = $input['username'];
        $User->email = $input['email'];
        $User->profile_icon = $filename;
        $User->password = Hash::make($input['password']);
        $User->usergroup_id = $input['usergroup'];

        $User->save();
        
//        $this->sendEmail();

        return Redirect::action('UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $data['result'] = User::find($id);
        return View::make('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update() {
        $input = Request::all();
        $store = User::find($input['id']);
        $store->name = $input['username'];
        $store->email = $input['email'];
        $store->usergroup_id = $input['usergroup'];
        $store->update();
        return Redirect::action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $result = User::find($id);
        $result->delete();
        return Redirect::action('UserController@index');
        
    }
    
    public function service() {
        
        $data['result'] = Complaint::all();
        return View::make('service.index',$data);
        
    }
    public function showCustomers() {
        
        $data['result'] = User::all();
        return View::make('service.customer',$data);
        
    }
    public function deleteCustomers($id) {
        
        $result = User::find($id);
        $result->delete();
        return View::make('service.customer',$data);
        
    }
//    
//    public function sendEmail() {
//        
//        $data = User::all();
//        
//        Mail::send('emails.welcome', array('key' => $data), function($message)
//        {
//            $message->to('saadziaps4@gmail.com', 'Nouman Muzammil')->subject('Welcome!');
//        });
//        
//        return View::make('home');
//
//    }

}
