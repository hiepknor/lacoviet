<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all();
//    		echo "<pre>"; print_r($data); die;
    		if(empty($data['category_id'])){
    			return redirect()->back()->with('flash_message_error','Under Category is missing!');	
    		}
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->name = $data['name'];
            $product->sku = $data['sku'];
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }
    		$product->url = $data['url'];
    		$product->unit_price = $data['unit_price'];
            if ($product->promotion_price) $product->promotion_price = $data['promotion_price'];

    		// Upload Image
//    		if($request->hasFile('image')){
//    			$image_tmp = Input::file('image');
//    			if($image_tmp->isValid()){
//    				$extension = $image_tmp->getClientOriginalExtension();
//    				$filename = rand(111,99999).'.'.$extension;
//    				$large_image_path = 'images/backend/products/large/'.$filename;
//    				$medium_image_path = 'images/backend/products/medium/'.$filename;
//    				$small_image_path = 'images/backend/products/small/'.$filename;
//    				// Resize Images
//    				Image::make($image_tmp)->save($large_image_path);
//    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
//    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);
//
//    				// Store image name in products table
//    				$product->image = $filename;
//    			}
//    		}

            $product->status = $data['status'];

    		$product->save();
    		/*return redirect()->back()->with('flash_message_success','Product has been added successfully!');*/
            return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully!');
    	}

    	$categories = Category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	return view('backend.products.add_product')->with(compact('categories_dropdown'));
    }

    public function viewProducts(){
        $products = Product::paginate(10);
        foreach($products as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        //echo "<pre>"; print_r($products); die;
        return view('backend.products.view_products')->with(compact('products'));
    }
}
