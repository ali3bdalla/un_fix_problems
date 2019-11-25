<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Foundation\Auth\AuthenticatesUsers;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Auth;
	
	class LoginController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Login Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles authenticating users for the application and
		| redirecting them to your home screen. The controller uses a trait
		| to conveniently provide its functionality to your applications.
		|
		*/
		
		use AuthenticatesUsers;
		
		/**
		 * Where to redirect users after login.
		 *
		 * @var string
		 */
		protected $redirectTo = '/home';
		
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('guest')->except('logout');
		}
		
		/**
		 * Send the response after the user was authenticated.
		 *
		 * @param Request $request
		 *
		 * @return Response
		 */
		protected function sendLoginResponse(Request $request)
		{
			
			if ($request->has("role")){
				$request->session()->regenerate();
				
				$this->clearLoginAttempts($request);
				
				return $this->authenticated($request,$this->guard()->user())
					?: redirect()->intended($this->redirectPath());
			}else{
				return auth('web')->user();
			}
			
		}
		
		protected function guard()
		{
			if (key_exists('role',$_POST)){
				return Auth::guard();
			}
			
			return Auth::guard('web');
			
		}
		
		/**
		 * Attempt to log the user into the application.
		 *
		 * @param Request $request
		 *
		 * @return bool
		 */
		protected function attemptLogin(Request $request)
		{
			$credentials = $this->credentials($request);
			
			if ($request->has('role')){
				return $this->guard()->attempt(
					$credentials,$request->filled('remember')
				);
			}else{
				return $this->guard()->attempt(
					$credentials,$request->filled('remember')
				);
			}
			
			
		}
		
	}
