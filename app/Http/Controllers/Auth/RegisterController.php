<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Admin;
	use App\Http\Controllers\Controller;
	use App\User;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	
	class RegisterController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Register Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles the registration of new users as well as their
		| validation and creation. By default this controller uses a trait to
		| provide this functionality without requiring any additional code.
		|
		*/
		
		use RegistersUsers;
		
		/**
		 * Where to redirect users after registration.
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
			$this->middleware('guest');
		}
		
		public function register(Request $request)
		{
			
			if ($request->has('role')){
				$this->validator($request->all())->validate();
				
				event(new Registered($user = $this->create($request->all())));
				
				$this->guard()->login($user);
				
				return $this->registered($request,$user)
					?: redirect($this->redirectPath());
			}


//			$this->validator($request->all())->validate();

			event(new Registered($user = $this->create($request->all())));
			
			$this->guard()->login($user);
			
			return $user;
			return $this->registered($request,$user)
				?: redirect($this->redirectPath());
			
		}
		
		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 *
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			return Validator::make($data,[
				'name' => ['required','string','max:255'],
				'email' => ['required','string','email','max:255'],
				'password' => ['required','string','min:8','confirmed'],
				'role' => ['nullable'],
			]);
		}
		
		/**
		 * Create a new user instance after a valid registration.
		 *
		 * @param array $data
		 *
		 * @return User
		 */
		protected function create(array $data)
		{
			
			
			$credentials = [
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
			];
			
			if (array_key_exists('role',$data)){
				return Admin::create($credentials);
			}
//
			
			return User::create($credentials);
			
		}
	}
