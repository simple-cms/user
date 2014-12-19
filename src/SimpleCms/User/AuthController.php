<?php namespace SimpleCMS\User;


use SimpleCms\Core\BaseController;
use Illuminate\Contracts\Auth\Authenticator;

class AuthenticationController extends BaseController {

	protected $authenticator;

	public function __construct(Authenticator $authenticator)
	{
		$this->authenticator = $authenticator;

    // Apply the relevant filters
		$this->beforeFilter('csrf', ['on' => ['post']]);
		$this->beforeFilter('guest', ['except' => ['getLogout']]);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return view('user::Authentication.Register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function postRegister(RegisterRequest $request)
	{
		// Registration form is valid, create user...

		$this->authenticator->login($user);

		return redirect('/');
	}

	/**
	 * Show the application login form.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return view('user::Authentication.Login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{
		if ($this->authenticator->attempt($request->only('email', 'password')))
		{
			return redirect('/');
		}

		return redirect('/login')->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		$this->authenticator->logout();

		return redirect('/');
	}

}
