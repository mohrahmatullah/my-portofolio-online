<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\Resume;
use App\Models\Param;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['abouts'] = Param::where('params', 'admin-abouts')->first();
        return view('frontend.home.index', $data);
    }

    public function resume()
    {
        $data['resume'] = Resume::get();
        // $arr = get_defined_vars();
        // dd($arr);
        return view('frontend.resume.index', $data);
    }

    public function portofolio()
    {
        $data['category'] = Category::where('type', 'portofolio')->get();
        $data['portofolio'] = Portofolio::orderBy('project_date', 'DESC')->get();
        return view('frontend.portofolio.index', $data);
    }

    public function portofolioDetail( $slug )
    {
        // $arr = get_defined_vars();
        // dd($arr);
        $data['portofolio'] = Portofolio::leftjoin('tbl_category','tbl_category.id', 'tbl_portofolio.id_category')->select('tbl_portofolio.*', 'tbl_category.nama_category')->where('tbl_portofolio.slug', $slug)->first();
        return view('frontend.portofolio.detail', $data);
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }
}
