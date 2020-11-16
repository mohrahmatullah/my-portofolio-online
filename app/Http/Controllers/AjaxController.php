<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Portofolio;
use App\Models\Category;
use App\Models\Resume;
use Validator;
use Illuminate\Support\Facades\File;

class AjaxController extends Controller
{
    public function selectedItemDeleteById( Request $request ){
		$input = $request->all();

		if($input['data']['id'] && $input['data']['track']){
			if($input['data']['track'] == 'product_list'){
				if(Product::where('id', $input['data']['id'])->delete()){
					return response()->json(array('delete' => true));
				}
			}
			if($input['data']['track'] == 'portofolio_list'){
				if(Portofolio::where('id', $input['data']['id'])->delete()){
					return response()->json(array('delete' => true));
				}
			}
			if($input['data']['track'] == 'resume_list'){
				if(Resume::where('id', $input['data']['id'])->delete()){
					return response()->json(array('delete' => true));
				}
			}

		}
	}

	public function saveRelatedImage( Request $request ){
		$input = $request->all();
	    $rules = array();

	    if(isset($input['cover_portofolio'])){
	      $rules = array(
	        'cover_portofolio' => 'image',
	      );
	    }

	    if(isset($input['gallery_portofolio'])){
	      $rules = array(
	        'gallery_portofolio' => 'image',
	      );
	    }

	    $validation = Validator::make($input, $rules);

	    if ($validation->fails()) {
	      return Response::make($validation->errors->first(), 400);
	    }
	    else{
	      $fileName = '';
	      $image    = '';

	      if(isset($input['cover_portofolio'])){
	        $image = $input['cover_portofolio'];
	        $fileName = md5(uniqid())."_cover_portofolio.".$image->getClientOriginalExtension();
	        $upload_success = $image->move(public_path('uploads/'),$fileName);
	        if(!File::isDirectory($upload_success)){
	            File::makeDirectory($upload_success, $mode = 0777, true, true);
	        }
	      }

	      if(isset($input['gallery_portofolio'])){
	        $image = $input['gallery_portofolio'];
	        $fileName = md5(uniqid())."_gallery_portofolio.".$image->getClientOriginalExtension();
	        $upload_success = $image->move(public_path('uploads/'),$fileName);
	        if(!File::isDirectory($upload_success)){
	            File::makeDirectory($upload_success, $mode = 0777, true, true);
	        }
	      }

	      if ($upload_success) {
	        return response()->json(array('status' => 'success', 'name' => $fileName));
	      } else {
	        return Response::json('error', 400);
	      }
	    }
	}

	public function getMenusByCategories(Request $request){
		$input = Request::all();
		$category_id = $input['category_id'];
		$menus = Portofolio::where('id_category', $category_id)->get();

		return view('dekstop.menu.menu_additional_content', compact('menus'));
	}
}
