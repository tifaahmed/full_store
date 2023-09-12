<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $allcategories = Category::where('vendor_id', Auth::user()->id)->where('is_deleted', 2)->orderby('reorder_id')->get();
        return view('admin.category.category', compact("allcategories"));
    }
    public function add_category(Request $request)
    {
        return view('admin.category.add');
    }
    public function save_category(Request $request)
    {
        $slug = Str::slug($request->category_name . ' ' , '-').'-'.Str::random(5);
        $savecategory = new Category();
        if ($request->hasfile('category_image')) {
          
            $image = 'category-' . uniqid() . '.' . $request->category_image->getClientOriginalExtension();
            $request->file('category_image')->move(storage_path('app/public/admin-assets/images/category/'), $image);
            $savecategory->image = $image;
        }
        $savecategory->vendor_id = Auth::user()->id;
        $savecategory->name = $request->category_name;
        $savecategory->slug = $slug;
        $savecategory->save();
        return redirect('admin/categories/')->with('success', trans('messages.success'));
    }
    public function edit_category(Request $request)
    {
        $editcategory = category::where('slug', $request->slug)->first();
        return view('admin.category.edit', compact("editcategory"));
    }
    public function update_category(Request $request)
    {
        $slug = Str::slug($request->category_name . ' ' , '-').'-'.Str::random(5);
        $editcategory = Category::where('slug', $request->slug)->first();
        if ($request->hasfile('category_image')) {
          
            if (file_exists(storage_path('app/public/admin-assets/images/category/' . $editcategory->image))) {
                unlink(storage_path('app/public/admin-assets/images/category/' . $editcategory->image));
            }
            $image = 'category-' . uniqid() . '.' . $request->category_image->getClientOriginalExtension();
            $request->file('category_image')->move(storage_path('app/public/admin-assets/images/category/'), $image);
            $editcategory->image = $image;
        }
        $editcategory->name = $request->category_name;
        $editcategory->slug = $slug;
        $editcategory->update();
        return redirect('admin/categories')->with('success', trans('messages.success'));
    }
    public function change_status(Request $request)
    {
        Category::where('slug', $request->slug)->update(['is_available' => $request->status]);
        return redirect('admin/categories')->with('success', trans('messages.success'));
    }
    public function delete_category(Request $request)
    {
        $checkcategory = Category::where('slug', $request->slug)->first();
        if (!empty($checkcategory)) {
            Item::where('cat_id', $checkcategory->id)->update(['is_available' => 2]);
            $checkcategory->is_deleted = 1;
            $checkcategory->save();
            return redirect('admin/categories')->with('success', trans('messages.success'));
        } else {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function reorder_category(Request $request)
    {
       
        $getcategory = Category::where('vendor_id', Auth::user()->id)->get();
        foreach ($getcategory as $category) {
            foreach ($request->order as $order) {
               $category = Category::where('id',$order['id'])->first();
               $category->reorder_id = $order['position']; 
               $category->save();
            }
        }
        return response()->json(['status' => 1,'msg' =>'Update Successfully!!'], 200);
    }
}