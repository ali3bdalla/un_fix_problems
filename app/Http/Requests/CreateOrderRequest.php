<?php

namespace App\Http\Requests;

use App\Order;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
	        'user_id' => 'required|integer|exists:users,id',
	        'menu_id' => 'required|integer|exists:menus,id',
	        'attachment' => 'file|nullable',
	        'lat' => 'required|numeric',
	        'long' => 'required|numeric'
        ];
    }
	
	public function save()
	{
		$order = new Order();
		$order->user_id = $this->user_id;
		$order->menu_id = $this->menu_id;
		$order->lat = $this->lat;
		$order->long = $this->long;
		 $order->save();
		
		 return $order->id;
		
    }
}
