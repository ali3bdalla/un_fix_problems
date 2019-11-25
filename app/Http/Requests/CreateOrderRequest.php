<?php
	
	namespace App\Http\Requests;
	
	use App\Order;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Support\Facades\Storage;
	
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
//				'attachment' => 'nullable',
				'note' => 'nullable',
				'lat' => 'required|numeric',
				'long' => 'required|numeric'
			];
		}
		
		public function save()
		{
			
			if ($this->has('attachment')){
//				$file = base64_decode($this->attachment);
				
				$name = "images/".uniqid().".jpg";
				Storage::put("public/" . $name,base64_decode($this->attachment));
			}else{
				$name = "";
			}
			$order = new Order();
			$order->user_id = $this->user_id;
			$order->menu_id = $this->menu_id;
			$order->lat = $this->lat;
			$order->long = $this->long;
			$order->attachment = $name;
			$order->note = $this->note;
			$order->save();
//			$order->attachment = $imageName;

//			return $this->attachment;
			return $order->id;
			
		}
	}
