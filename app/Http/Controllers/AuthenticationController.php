<?php
namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class AuthenticationController extends Controller {
    /**
     * Show the login form
     *
     * @return \Illuminate\View\View
     */
    public function getLogin() {
    	return view('auth.login');
    }
    /**
     * Process the login request
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) {
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required'
    	]);
    	if (Auth::attempt($request->only('email', 'password'))) {
            //dd(Auth::user());
    		return redirect()->intended('/');
    	}
        return redirect('login')
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'These credentials do not match our records.'
            ]);
    }
    /**
     * Logout the user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout() {
        if(Auth::user()){
            Auth::logout();
        }
     	return redirect('/');
    }
}