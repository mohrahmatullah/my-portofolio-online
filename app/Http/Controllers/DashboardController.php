<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\Resume;
use App\Models\Param;
use Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderby('created_at', 'DESC')->get();
        $data['title_form'] = 'List Produk';
        return view('admin.products.index', $data);
        // return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsDetails($id = null)
    {
        $params = [];

        $object = Product::where('id', $id)->first();
        if(!$object)
            {
                return redirect()->route('products');
            }

        $params['products'] = $object;
        $params['title_form'] = 'Detail Product';
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.products.details', $params);
    }

    public function productsUpdate($id = null)
    {
        $params = [];

        if($id){
            $object = Product::where('id', $id)->first();
            if(!$object)
                {
                    return redirect()->route('products');
                }
            $params['title_form'] = "Update Product";
        }else{
            $object = "";
            $params['title_form'] = "Add Product";
        }

        $params['products'] = $object;
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.products.update', $params);
    }

    public function saveProducts(Request $request, $id = Null)
    {
        $data = $request->all();
        if($id == 0 ){
            $rules =  ['product_nama'  => 'required|unique:tbl_produk,nama_produk' ,'product_image' => 'required|mimes:jpeg,png,jpg', 'product_harga' => 'required', 'product_stock' => 'required'];
            $atributname = [
              'product_nama.required' => 'The product name field is required.',
              'product_nama.unique' => 'The product name can not be the same.',
              'product_harga.required' => 'The product harga field is required.',
            ];
        }else{
            $get_produk = Product::where('id', $id)->first();
            if($get_produk->nama_produk == $request->product_nama){
                $rules =  ['product_nama'  => 'required' , 'product_image' => 'required', 'product_harga' => 'required|numeric', 'product_stock' => 'required'];
                $atributname = [
                  'product_nama.required' => 'The product name field is required.',
                  'product_harga.required' => 'The product harga field is required.',
                ];                
            }else{
                $rules =  ['product_nama'  => 'required|unique:tbl_produk,nama_produk' , 'product_image' => 'required', 'product_harga' => 'required|numeric', 'product_stock' => 'required'];
                $atributname = [
                  'product_nama.required' => 'The product name field is required.',
                  'product_harga.required' => 'The product harga field is required.',
                ];
            }           
        }

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            if($id == 0 ){
                $p        =  new Product; 

                $cover = $request->file('product_image');
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getClientOriginalName(),  File::get($cover));

                $p->nama_produk                 = $request->product_nama;
                // $file = $request->file('product_image');
                // $path = Storage::disk('public')->put('uploads/'.date('FY'), $file);

                $p->image                       = $cover->getClientOriginalName();
                $p->harga                       = $request->product_harga;
                $p->stock                       = $request->product_stock;
                $p->save();

              Session::flash('success-message', "Success add banner" );
              return redirect()->route('products');

            }else{
                $cover = $request->file('product_image');
                // dd($cover);
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getClientOriginalName(),  File::get($cover));

              $data = array(
                'nama_produk'                  => $request->product_nama,
                'image'             => $cover->getClientOriginalName(),
                'harga'             => $request->product_harga,
                'stock'               => $request->product_stock
              );
              Product::where('id', $id)->update($data);

              Session::flash('success-message', "Success update product" );
              return redirect()->route('products');

            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $data['products'] = Category::orderby('created_at', 'DESC')->get();
        $data['title_form'] = 'List Category';
        // dd($data);
        return view('admin.category.index', $data);
    }

    public function categoryUpdate($id = null)
    {
        $params = [];

        if($id){
            $object = Category::where('id', $id)->first();
            if(!$object)
                {
                    return redirect()->route('category');
                }
            $params['title_form'] = "Update category";
        }else{
            $object = "";
            $params['title_form'] = "Add category";
        }

        $params['products'] = $object;
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.category.update', $params);
    }

    public function saveCategory(Request $request, $id = Null)
    {
        $data = $request->all();
        // dd($data);
        if($id == 0 ){
            $rules =  ['category_nama'  => 'required|unique:tbl_category,nama_category' ,'category_type' => 'required'];
            $atributname = [
              'category_nama.required' => 'The category name field is required.',
              'category_nama.unique' => 'The category name can not be the same.',
              'category_type.required' => 'The category type field is required.',
            ];
        }else{
            $rules =  ['category_nama'  => 'required' , 'category_type' => 'required'];
            $atributname = [
              'category_nama.required' => 'The category name field is required.',
              'category_type.required' => 'The category type field is required.',
            ];         
        }

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            if($id == 0 ){
                $p        =  new Category; 
                $p->nama_category                 = $request->category_nama;
                // $file = $request->file('product_image');
                // $path = Storage::disk('public')->put('uploads/'.date('FY'), $file);

                $p->type                       =  $request->category_type;
                $p->save();

              Session::flash('success-message', "Success add category" );
              return redirect()->route('category');

            }else{
              $data = array(
                'nama_category'                  => $request->category_nama,
                'type'             => $request->category_type
              );
              Category::where('id', $id)->update($data);

              Session::flash('success-message', "Success update category" );
              return redirect()->route('category');

            }
        }

    }

    public function portofolio(Request $request)
    {
        $data['products'] = Portofolio::orderby('created_at', 'DESC')->get();
        $data['title_form'] = 'List Portofolio';
        // dd($data);
        return view('admin.portofolio.index', $data);
    }

    public function portofolioUpdate($id = null)
    {
        $params = [];

        if($id){
            $params['category'] = Category::where('type','portofolio')->get()->toarray();
            $object = Portofolio::where('id', $id)->first();
            if(!$object)
                {
                    return redirect()->route('portofolio');
                }
            $params['title_form'] = "Update portofolio";
        }else{
            $params['category'] = Category::where('type','portofolio')->get()->toarray();
            $object = "";
            $params['title_form'] = "Add portofolio";
        }

        $params['products'] = $object;
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.portofolio.update', $params);
    }

    public function savePortofolio(Request $request, $id = Null)
    {
        $data = $request->all();
        // dd($data);
        if($id == 0 ){
            $rules =  ['category_nama'  => 'required' ,'portofolio_title' => 'required', 'portofolio_slug'  => 'required' ,'portofolio_content' => 'required', 'portofolio_image'  => 'required' ,'portofolio_gallery' => 'required', 'portofolio_client'  => 'required' ,'portofolio_project_date' => 'required','portofolio_project_url' => 'required'];
            $atributname = [
              'category_nama.required' => 'Field is required.',
              'portofolio_title.required' => 'Field is required.',
              'portofolio_slug.required' => 'Field is required.',
              'portofolio_content.required' => 'Field is required.',
              'portofolio_image.required' => 'Field is required.',
              'portofolio_gallery.required' => 'Field is required.',
              'portofolio_client.required' => 'Field is required.',
              'portofolio_project_date.required' => 'Field is required.',
              'portofolio_project_url.required' => 'Field is required.'
            ];
        }else{
            $rules =  ['category_nama'  => 'required' , 'portofolio_title' => 'required'];
            $atributname = [
              'category_nama.required' => 'Field is required.',
              'portofolio_title.required' => 'Field is required.',
              'portofolio_slug.required' => 'Field is required.',
              'portofolio_content.required' => 'Field is required.',
              'portofolio_image.required' => 'Field is required.',
              'portofolio_gallery.required' => 'Field is required.',
              'portofolio_client.required' => 'Field is required.',
              'portofolio_project_date.required' => 'Field is required.',
              'portofolio_project_url.required' => 'Field is required.'
            ];         
        }

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            if($id == 0 ){
                $p        =  new Portofolio; 
                $p->id_category                 = $request->category_nama;
                $p->title                       = $request->portofolio_title;
                $p->slug                        = $request->portofolio_slug;
                $p->content                     = $request->portofolio_content;
                $p->image                       = $request->portofolio_image;
                $p->gallery                     = $request->portofolio_gallery;
                $p->client                      = $request->portofolio_client;
                $p->project_date                = $request->portofolio_project_date;
                $p->project_url                 = $request->portofolio_project_url;
                $p->save();

              Session::flash('success-message', "Success add portofolio" );
              return redirect()->route('portofolio-list');

            }else{
              $data = array(
                'nama_category'                  => $request->category_nama,
                'title'                          => $request->portofolio_title,
                'slug'                           => $request->portofolio_slug,
                'content'                        => $request->portofolio_content,
                'image'                          => $request->portofolio_image,
                'gallery'                        => $request->portofolio_gallery,
                'client'                         => $request->portofolio_client,
                'project_date'                   => $request->portofolio_project_date,
                'project_url'                    => $request->portofolio_project_url
              );
              Portofolio::where('id', $id)->update($data);

              Session::flash('success-message', "Success update portofolio" );
              return redirect()->route('portofolio-list');

            }
        }

    }

    public function resume()
    {
        $data['products'] = Resume::orderby('created_at', 'DESC')->get();
        $data['title_form'] = 'List Resume';
        // dd($data);
        return view('admin.resume.index', $data);
    }

    public function resumeUpdate($id = null)
    {
        $params = [];

        if($id){
            $params['category'] = Category::where('type','resume')->get()->toarray();
            $object = Resume::where('id', $id)->first();
            if(!$object)
                {
                    return redirect()->route('resume');
                }
            $params['title_form'] = "Update resume";
        }else{
            $params['category'] = Category::where('type','resume')->get()->toarray();
            $object = "";
            $params['title_form'] = "Add resume";
        }

        $params['products'] = $object;
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.resume.update', $params);
    }

    public function saveResume(Request $request, $id = Null)
    {
        $data = $request->all();
        // dd($data);
        if($id == 0 ){
            $rules =  ['category_nama'  => 'required' ,'resume_title' => 'required', 'resume_start'  => 'required' ,'resume_end' => 'required', 'resume_address'  => 'required' ,'resume_description' => 'required'];
            $atributname = [
              'category_nama.required' => 'Field is required.',
              'resume_title.required' => 'Field is required.',
              'resume_start.required' => 'Field is required.',
              'resume_end.required' => 'Field is required.',
              'resume_address.required' => 'Field is required.',
              'resume_description.required' => 'Field is required.'
            ];
        }else{
            $rules =  ['category_nama'  => 'required' , 'resume_title' => 'required'];
            $atributname = [
              'category_nama.required' => 'Field is required.',
              'resume_title.required' => 'Field is required.',
              'resume_start.required' => 'Field is required.',
              'resume_end.required' => 'Field is required.',
              'resume_address.required' => 'Field is required.',
              'resume_description.required' => 'Field is required.'
            ];         
        }

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            if($id == 0 ){
                $p        =  new Resume; 
                $p->id_category                 = $request->category_nama;
                $p->title                       = $request->resume_title;
                $p->start                        = $request->resume_start;
                $p->end                     = $request->resume_end;
                $p->address                       = $request->resume_address;
                $p->description                     = $request->resume_description;
                $p->save();

              Session::flash('success-message', "Success add resume" );
              return redirect()->route('resume-list');

            }else{
              $data = array(
                'nama_category'                  => $request->category_nama,
                'title'                          => $request->resume_title,
                'start'                           => $request->resume_start,
                'end'                        => $request->resume_end,
                'address'                          => $request->resume_address,
                'description'                        => $request->resume_description
              );
              Portofolio::where('id', $id)->update($data);

              Session::flash('success-message', "Success update resume" );
              return redirect()->route('resume-list');

            }
        }

    }

    public function abouts()
    {
        $data['title_form'] = 'Abouts';
        $data['products'] = Param::where('params', 'admin-abouts')->first();
        // dd($data);
        return view('admin.abouts.index', $data);
    }

    public function saveAbouts(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $rules =  ['abouts_title'  => 'required' ,'abouts_description' => 'required'];
        $atributname = [
          'abouts_title.required' => 'Field is required.',
          'abouts_description.required' => 'Field is required.'
        ];

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{
          $cek = Param::where('params', 'admin-abouts')->first();
          // dd($cek);
          if($cek){
            // echo "edit";
            $data = array(
              'title'              => $request->abouts_title,
              'description'        => $request->abouts_description
            );
            Param::where('params', 'admin-abouts')->update($data);

            Session::flash('success-message', "Success update Abouts" );
            return redirect()->route('abouts-admin');
          }else{            
            
            $p        =  new Param; 
            $p->params                 = $request->abouts_params;
            $p->title                  = $request->abouts_title;
            $p->description            = $request->abouts_description;
            $p->save();

            Session::flash('success-message', "Success update Abouts" );
            return redirect()->route('abouts-admin');
          }            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
