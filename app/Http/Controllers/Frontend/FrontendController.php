<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Commitment;
use App\Models\Feedback;
use App\Models\License;
use App\Models\Product;
use App\Models\WhyChoose;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use App\Models\CreatePage;
use App\Models\Slider;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\OurGallery;
use App\Models\Gallery;
use App\Models\Galleryimage;
use App\Models\Category;

use Cache;
use DB;
use Log;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders          = Slider::where('status', 1)->get();
        $products          = Product::where('status', 1)->get();
        $blogs            = Blog::where('status', 1)->get();
        $category            = Category::where('status', 1)->get();
        $license          = License::where('status', 1)->get();
        // return $category;
        $galleries = Gallery::where('status',1)->orderBy('id','DESC')->get();
     
        // return $blogs;
        return view('frontEnd.layouts.pages.index', compact('sliders', 'blogs', 'category','galleries', 'products','license'));
    }

    public function about_us()
    {
        $about = About::where('status', 1)->get();
        
        return view('frontEnd.layouts.pages.about_us', compact('about'));
    }

    public function photo(){
        $galleries = Gallery::where('status',1)->orderBy('id','DESC')->get();
        return view('frontEnd.layouts.pages.photo',compact('galleries'));
    }
    public function whychoose(){
        $choosedata = WhyChoose::where('status',1)->orderBy('id','DESC')->get();
        return view('frontEnd.layouts.pages.whychoose',compact('choosedata'));
    }
    public function commitment(){
        $commitmentdata = Commitment::where('status',1)->orderBy('id','DESC')->get();
        return view('frontEnd.layouts.pages.commitment',compact('commitmentdata'));
    }
    public function feedback(){
        $feedbackdata = Feedback::where('status',1)->orderBy('id','DESC')->get();
        return view('frontEnd.layouts.pages.feedback',compact('feedbackdata'));
    }
    public function gallerydetails($id){
        $breadcrumb = Gallery::where(['id'=>$id,'status'=>1])
            ->first();
        $allphotos = Galleryimage::where('gallery_id',$id)->get();

        $galleriesright = Gallery::where('status',1)->orderBy('id','DESC')->limit(10)->get();

        return view('frontEnd.layouts.pages.gallerydetails',compact('breadcrumb','allphotos','galleriesright'));
    }
    
    public function blog_details($slug)
    {
        $details = Blog::where('slug', $slug)->first();
        $blogs = Blog::where(['status' => 1])->get();

        return view('frontEnd.layouts.pages.blogdetails', compact('details', 'blogs'));
    }
    public function category($slug , Request $request)
    {
        $category = Category::where(['slug' => $slug, 'status' => 1])->first();
        $product  = Product::where(['status' => 1, 'category_id' => $category->id])->orderBy('id','DESC')->get();
        ;
        return view('frontEnd.layouts.pages.category', compact('category', 'product'));
    }
    public function product_details($slug)
    {
        $details  = Product::where(['status' => 1, 'slug' => $slug])->orderBy('id','DESC')->first();
        ;
        return view('frontEnd.layouts.pages.productdetails', compact('details',));
    }
    public function blog_category($slug)
    {
        $category = BlogCategory::where(['slug' => $slug, 'status' => 1])->first();
        $blogs = Blog::where(['status' => 1, 'category_id' => $category->id])->orderBy('id','DESC')->get();
        
        return view('frontEnd.layouts.pages.blog_category', compact('category','blogs'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->paginate(10);
        $brands = Brand::where('status', 1)->get();
        return view('frontEnd.layouts.pages.blogs', compact('blogs', 'brands'));
    }


    public function contact()
    {
        return view('frontEnd.layouts.pages.contact');
    }
    public function page($slug)
    {
        $pageinfo = CreatePage::where('slug', $slug)->first();
        return view('frontEnd.layouts.pages.morepages', compact('pageinfo'));
    }
   
}
