<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
//        die(var_dump($request->all()));
    	if($request->isMethod('post')){
    		$data = $request->all();
//    		echo "<pre>"; print_r($data); die;
    		$category = new Category;
            $category->parent_id = $data['parent_id'];
    		$category->name = $data['name'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
            $category->status = $data['status'];
    		$category->save();
    		return redirect('/admin/view-categories')->with('flash_message_success','Category added successfully!');
    	}

        $levels = Category::where(['parent_id'=>0])->get();

    	return view('backend.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->update([
                'parent_id' => $data['parent_id'],
                'name'=>$data['name'],
                'description'=>$data['description'],
                'url'=>$data['url'],
                'status'=>$data['status']
            ]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category updated successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('backend.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
    }

    public function viewCategories(){

    	$categories = Category::paginate(10);
    	return view('backend.categories.view_categories')->with(compact('categories'));
    }
}
