<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];
	
	
	public function user()
	{
		return $this->belongsTo(User::class,'user_id');
	}
	
	
	
	public function admin()
	{
		return $this->belongsTo(User::class,'admin_id');
	}
	
	
	
	public function menu()
	{
		return $this->belongsTo(Menu::class,'menu_id');
	}
	
	
	
    //
}
