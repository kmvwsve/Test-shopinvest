<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Product {

	public function get($id) {
		$product = array();
		if($id) {
			$return = DB::select('SELECT p.*, m.name AS mark 
				FROM product p 
				LEFT JOIN mark m ON p.mark_id = m.mark_id 
				WHERE product_id = ?', [$id]);
		} else {
			return false;
		}
		
  	if ($return) {
  		$product["product_id"]  = $return[0]->product_id;
  		$product["name"]        = $return[0]->name;
  		$product["description"] = $return[0]->description;
  		$product["image"]       = $return[0]->image;
  		$product["mark_id"]     = $return[0]->mark_id;
  		$product["mark"]        = $return[0]->mark;
  		$product["quantity"]    = $return[0]->quantity;
  		$product["price"]       = $return[0]->price;
  		$product["special"]     = $return[0]->special;
  		$product["sort_order"]  = $return[0]->sort_order;
  		$product["images"]      = array();
  		$images = $this->getProductImages($id);
  		foreach ($images as $image) {
  			if($image->image)
  				$product["images"][] = PATH_IMAGE.$image->image;
  		}
  	}
  	return $product;
	}

	public function getProductImages($id) {
		return $return = DB::select('SELECT * FROM product_image WHERE product_id = ?', [$id]);
	}

	public function getMarks() {
		return $return = DB::select('SELECT * FROM mark');
	}

	public function getAll() {
		return $return = DB::select('SELECT p.*, m.name AS mark 
				FROM product p 
				LEFT JOIN mark m ON p.mark_id = m.mark_id');		
	}

	public function add($data) {
		DB::table('product')->insert([
		  'name'        => (string)$data['name'],
		  'description' => (string)$data['description'],
		  'mark_id'     => (int)$data['mark_id'],
		  'price'       => (float)$data['price'],
		  'special'     => (float)$data['special'],
		  'quantity'    => (int)$data['quantity'],
		  'image'       => (string)$data['image'],
		  'sort_order'  => (int)$data['sort_order']
		]);
		$product_id = DB::getPdo()->lastInsertId();
		$image_additional = explode(",", str_replace(" ", "", $data['image_additional']));
		if($image_additional) {
			foreach ($image_additional as $ima) {
				DB::table('product_image')->insert([
				  'product_id'  => (int)$product_id,
				  'image'       => (string)$ima
				]);
			}
		}
	}

	public function update($data) {
		$product_id = (int)$data['product_id'];
		DB::table('product')
		->where('product_id', '=', $product_id)
		->update([
		  'name'        => (string)$data['name'],
		  'description' => (string)$data['description'],
		  'mark_id'     => (int)$data['mark_id'],
		  'price'       => (float)$data['price'],
		  'special'     => (float)$data['special'],
		  'quantity'    => (int)$data['quantity'],
		  'image'       => (string)$data['image'],
		  'sort_order'  => (int)$data['sort_order']
		]);

		DB::table('product_image')->where('product_id', '=', $product_id)->delete();
		$image_additional = explode(",", str_replace(" ", "", $data['image_additional']));
		if($image_additional) {
			foreach ($image_additional as $ima) {
				DB::table('product_image')->insert([
				  'product_id'  => (int)$product_id,
				  'image'       => (string)$ima
				]);
			}
		}		
	}

	public function remove($product_id) {
		DB::table('product')->where('product_id', '=', $product_id)->delete();
		DB::table('product_image')->where('product_id', '=', $product_id)->delete();
	}
}