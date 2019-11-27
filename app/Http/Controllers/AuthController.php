<?php
	
	namespace App\Http\Controllers;
	
	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class AuthController extends Controller
	{
		
		public function register(Request $request)
		{
			$request->validate([
				'email' => 'required|string|unique:users,email',
				'name' => 'required|string',
				'password' => 'required|string',
			]);
			
			$user = new User();
			$user->email = $request->email;
			$user->name = $request->name;
			$user->password = password_hash($request->password,1);
			
			$user->save();
			return null;
			
		}
		
		public function login(Request $request)
		{
			$request->validate([
				'email' => 'required|string',
				'password' => 'required|string',
			]);
			
			if (Auth::guard('web')->attempt($request->only('email','password'))){
				return Auth::guard('web')->user();
			}
			
			return null;
		}
		//
	}
