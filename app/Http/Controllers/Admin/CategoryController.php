<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Toastr;


class CategoryController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = Category::orderBy('id','DESC')->get();
        return view('backEnd.category.index',compact('data'));
    }
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->select('id','name')->get();
        return view('backEnd.category.create',compact('categories'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048', // validate image
    ]);

    $input = $request->all(); // safer input collection

    // Generate slug
    $slug = strtolower(preg_replace('/\s+/', '-', $request->name));
    $slug = str_replace('/', '', $slug);
    $input['slug'] = $slug;

    $image = $request->file('image');
    if ($image) {
        $name =  time() . '-' . $image->getClientOriginalName();
        $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
        $name = strtolower(preg_replace('/\s+/', '-', $name));
        $uploadpath = 'public/uploads/category/';
        $imageUrl = $uploadpath . $name;
        $img = Image::make($image->getRealPath());
        $img->encode('webp', 90);
        $width = "400";
        $height = "400";
        $img->height() > $img->width() ? $width = null : $height = null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imageUrl);
    } else {
        $imageUrl = null;
    }

    // Create the category
    $input['image'] = $imageUrl;
    Category::create($input);

    Toastr::success('Success', 'Data inserted successfully');
    return redirect()->route('category.index');
}


    public function edit($id)
    {
        $edit_data = Category::find($id);
        return view('backEnd.category.edit',compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $update_data = Category::find($request->id);
        $input = $request->all();

        
        $image = $request->file('image');
        if($image){
            // image with intervention
            $name =  time().'-'.$image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath.$name;
            $img=Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? $width=null : $height=null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        }else{
            $input['image'] = $update_data->image;
        }
        
        $input['status'] = $request->status?1:0;
        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $request->name));
        $input['slug'] = str_replace('/', '', $input['slug']);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('category.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Category::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Category::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Category::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
   
}
