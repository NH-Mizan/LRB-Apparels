<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Galleryimage;
use Toastr;
use Image;
use File;
use DB;

class GalleryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:gallery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $show_data = Gallery::orderBy('id','DESC')->get();
        return view('backEnd.gallery.index', compact('show_data'));
    }
    public function create()
    {
        return view('backEnd.gallery.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=>'required',
            'status'=>'required',
        ]);
        $store_data = new Gallery();
        $store_data->name = $request->name;
        $store_data->status = $request->status;
        $store_data->save();

        $gallery_id=$store_data->id;
        $images = $request->file('image');
        $titles = $request->title;

        foreach($images as $key => $image) {
            // image01 upload
            $name =  time().'-'.$image->getClientOriginalName();
            $uploadpath = 'public/uploads/gallery/';
            $image->move($uploadpath, $name);
            $imageUrl = $uploadpath.$name;

            $modelName = new Galleryimage;
            $modelName->image = $imageUrl;
            $modelName->gallery_id = $gallery_id;
            $modelName->title = isset($titles[$key]) ? $titles[$key] : ''; 
            $modelName->save();
        }
        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('galleries.index');
    }

    public function edit($id)
    {
        $edit_data = Gallery::find($id);
        return view('backEnd.gallery.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $update_data = Gallery::find($request->hidden_id);
        $update_data->name = $request->name;
        $update_data->status = $request->status;
        $update_data->save();

        $images = $request->file('image');
        if($images){
            $gallery_id=$update_data->id;
            $titles = $request->title;
            foreach($images as $key => $image) {
                // image01 upload
                $name =  time().'-'.$image->getClientOriginalName();
                $uploadpath = 'public/uploads/gallery/';
                $image->move($uploadpath, $name);
                $imageUrl = $uploadpath.$name;

                $modelName = new Galleryimage;
                $modelName->image = $imageUrl;
                $modelName->gallery_id = $gallery_id;
                $modelName->title = isset($titles[$key]) ? $titles[$key] : ''; 
                $modelName->save();
            }
        }


        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('galleries.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Gallery::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Gallery::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }
    
    public function destroy(Request $request)
    {
        $delete_data = Gallery::find($request->hidden_id);
        if ($delete_data && $delete_data->image) {
            File::delete(public_path('uploads/gallery/' . $delete_data->image));
        }
        $deleteallimage = Galleryimage::where('gallery_id', $request->hidden_id)->get();
    
        foreach ($deleteallimage as $deleteimage) {
            if ($deleteimage->image) {
                File::delete(public_path('uploads/gallery/' . $deleteimage->image));
            }
            $deleteimage->delete();
        }
        if ($delete_data) {
            $delete_data->delete();
        }
    
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }

     public function singleitemdelete($id){
        $singleitemdelete = Galleryimage::find($id);
        File::delete(public_path() . 'public/uploads/gallery', $singleitemdelete->image);  
        $singleitemdelete->delete();
        Toastr::success('message', 'Gallery delete successfully!');
         return redirect()->back(); 
    }
    
}
