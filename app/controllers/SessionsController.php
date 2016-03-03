<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * Nouman Muzammil
	 * @return Response
	 */

	public function create()
	{
            if(Auth::check()){
                
                return Redirect::to('/');
                
            }
            return View::make('sessions.create');
	}


	
	public function store()
	{
            if(Auth::attempt(Input::only('email','password')))
            {
                
                return Redirect::to('/');
                
            }
            else 
            {
                $message = 'Login Failed';
                return Redirect::to('login')->with('message');
            }
            
	}
        

        public function destroy()
	{
            Auth::logout();
            
            return Redirect::to('/login');
	}


}
