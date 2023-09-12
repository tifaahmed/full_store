<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\Category;
use App\Models\Item;
use App\Models\Variants;
use App\Models\Cart;
use App\Models\Extra;
use App\Models\ItemImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index()
    {
        $getproductslist = Item::with('variation', 'category_info','item_image')->where('vendor_id', Auth::user()->id)->orderby('reorder_id')->get();
        return view('admin.product.product', compact('getproductslist'));
    }
    public function add(Request $request)
    {
        $checkplan = helper::checkplan(Auth::user()->id, '');
        $v = json_decode(json_encode($checkplan));
        if (@$v->original->status == 2) {
            return redirect('admin/products')->with('error', @$v->original->message);
        }
        $getcategorylist = Category::where('is_available', 1)->where('is_deleted', 2)->where('vendor_id', Auth::user()->id)->get();
        return view('admin.product.add_product', compact("getcategorylist"));
    }
    public function save(Request $request)
    {
        $checkplan = helper::checkplan(Auth::user()->id, '');
        $v = json_decode(json_encode($checkplan));
        if (@$v->original->status == 2) {
            return redirect('admin/products')->with('error', @$v->original->message);
        }
      
        $slug = Str::slug($request->product_name . ' ' , '-').'-'.Str::random(5);
        $price = $request->price;
        $original_price = $request->original_price;
        if ($request->has_variants == 1) {
            foreach ($request->variation as $key => $no) {
                if (@$no != "" && @$request->variation_price[$key] != "" && @$request->variation_original_price[$key] != "") {
                    $price = $request->variation_price[$key];
                    $original_price = $request->variation_original_price[$key];
                    break;
                }
            }
        }
        $product = new Item();
        $product->vendor_id = Auth::user()->id;
        $product->cat_id = $request->category;
        $product->item_name = $request->product_name;
        $product->slug = $slug;
        $product->item_price = $price;
        $product->item_original_price = $original_price;
        $product->has_variants = $request->has_variants;
        $product->tax = $request->tax;
        $product->description = $request->description;
       
        $product->save();
        if ($request->has_variants == 1) {
            foreach ($request->variation as $key => $no) {
                if (@$no != "" && @$request->variation_price[$key] != "") {
                    $variation = new Variants();
                    $variation->item_id = $product->id;
                    $variation->name = $no;
                    $variation->price = $request->variation_price[$key];
                    $variation->original_price = $request->variation_original_price[$key];
                    $variation->save();
                }
            }
        }
        foreach ($request->extras_name as $key => $no) {
            if (@$no != "" && @$request->extras_price[$key] != "") {
                $extras = new Extra();
                $extras->item_id = $product->id;
                $extras->name = $no;
                $extras->price = $request->extras_price[$key];
                $extras->save();
            }
        }


        foreach($request->file('product_image') as $img){
            $itemimage = new ItemImages;
            $image = 'item-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(env('ASSETSPATHURL').'/item', $image);
            $itemimage->item_id = $product->id;
            $itemimage->image = $image;
            $itemimage->save();
        }        
        return redirect('admin/products/')->with('success', trans('messages.success'));
    }
    public function edit($slug)
    {
        $getproductdata = Item::where('slug', $slug)->first();
        $getproductimage = ItemImages::where('item_id',$getproductdata->id)->get();
      
        if (!empty($getproductdata)) {
            $getcategorylist = Category::where('is_available', 1)->where('is_deleted', 2)->where('vendor_id', Auth::user()->id)->get();
            return view('admin.product.edit_product', compact('getproductdata', 'getcategorylist','getproductimage'));
        }
        return redirect('admin/products')->with('error', trans('messages.wrong'));
    }
    public function update_product(Request $request, $slug)
    {
       
        try {
            $slug = Str::slug($request->product_name . ' ' , '-').'-'.Str::random(5);
            $price = $request->price;
            $original_price = $request->original_price;
            if ($request->has_variants == 1) {
                $variation_id = $request->variation_id;
                foreach ($request->variation as $key => $no) {
                    if (@$no != "" && @$request->variation_price[$key] != "" && @$request->variation_original_price[$key] != "") {
                        if (@$variation_id[$key] == "") {
                            $price = $request->variation_price[$key];
                            $original_price = $request->variation_original_price[$key];
                            break;
                        } else if (@$variation_id[$key] != "") {
                            $price = $request->variation_price[$key];
                            $original_price = $request->variation_original_price[$key];
                            break;
                        }
                    }
                }
            }
            $product = Item::where('slug', $request->slug)->first();
            $product->cat_id = $request->category;
            $product->item_name = $request->product_name;
            $product->item_price = $price;
            $product->item_original_price = $price;
            $product->item_original_price = $original_price;
            $product->slug = $slug;
            $product->has_variants = $request->has_variants;
            $product->tax = $request->tax;
            $product->description = $request->description;
            $product->update();
            if ($request->has_variants == 2) {
                Variants::where('item_id', $request->id)->delete();
            }
            if ($request->has_variants == 1) {
                $variation_id = $request->variation_id;
                foreach ($request->variation as $key => $no) {
                    if (@$no != "" && @$request->variation_price[$key] != "" && @$request->variation_original_price[$key] != "") {
                        if (@$variation_id[$key] == "") {
                            $variation = new Variants();
                            $variation->item_id = $product->id;
                            $variation->name = $no;
                            $variation->price = $request->variation_price[$key];
                            $variation->original_price = $request->variation_original_price[$key];
                            $variation->save();
                        } else if (@$variation_id[$key] != "") {
                            Variants::where('id', @$variation_id[$key])->update(['price' => $request->variation_price[$key], 'name' => $request->variation[$key], 'original_price' => $request->variation_original_price[$key]]);
                        }
                    }
                }
            }
            $extras_id = $request->extras_id;
            foreach ($request->extras_name as $key => $no) {
                if (@$no != "" && @$request->extras_price[$key] != "") {
                    if (@$extras_id[$key] == "") {
                        $extras = new Extra();
                        $extras->item_id = $product->id;
                        $extras->name = $no;
                        $extras->price = $request->extras_price[$key];
                        $extras->save();
                    } else if (@$extras_id[$key] != "") {
                        Extra::where('id', @$extras_id[$key])->update(['name' => $request->extras_name[$key], 'price' => $request->extras_price[$key]]);
                    }
                }
            }
            return redirect('admin/products')->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function update_image(Request $request)
    {
     
            if ($request->has('product_image')) {
               
                if (file_exists(storage_path('app/public/item/' . $request->image))) {
                    unlink(storage_path('app/public/item/' . $request->image));
                }
                $productimage = 'item-' . uniqid() . "." . $request->file('product_image')->getClientOriginalExtension();
                $request->file('product_image')->move(storage_path('app/public/item/'), $productimage);

             
                $itemimage = ItemImages::where('id',$request->id)->first();
                $itemimage->image = $productimage;
                $itemimage->save();
                
                
                return redirect()->back()->with('success', trans('messages.success'));
            } else {
                return redirect()->back()->with('error', trans('messages.wrong'));
            }
    }

    public function store_image(Request $request)
    {
            if ($request->hasFile('file')) {
                $files = $request->file('file');
                
                    foreach($files as $file){
                        $itemimage = new ItemImages;
                        $image = 'item-' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(env('ASSETSPATHURL').'/item', $image);
                        $itemimage->item_id = $request->itemid;
                        $itemimage->image = $image;
                        $itemimage->save();
                    }
            }
            return redirect()->back()->with('success', trans('messages.success'));
    }


    public function destroyimage(Request $request)
    {
   
        $getitemimages = ItemImages::where('item_id', $request->item_id)->count();
        if ($getitemimages > 1) {
            $itemimage=ItemImages::where('id', $request->id)->delete();
            if ($itemimage) {
               return 1;
            } else {
               return 0;
            }
        } else {
            return 2;
        }
    }

    public function delete_variation(Request $request)
    {
        $checkvariationcount = Variants::where('item_id', $request->product_id)->count();
       
        if ($checkvariationcount > 1) {
            $UpdateDetails = Variants::where('id', $request->id)->delete();
            if ($UpdateDetails) {
                Cart::where('variants_id', $request->id)->delete();
                return redirect()->back()->with('success', trans('messages.success'));
            } else {
                return redirect()->back()->with('error', trans('messages.wrong'));
            }
        } else {
            return redirect()->back()->with('error', trans('messages.last_variation'));
        }
    }
    public function delete_extras(Request $request)
    {
        $deletedata = Extra::where('id', $request->id)->delete();
        if ($deletedata) {
            return redirect()->back()->with('success', trans('messages.success'));
        } else {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function status($slug, $status)
    {
        try {
            $checkproduct = Item::where('slug', $slug)->first();
            $checkproduct->is_available = $status;
            $checkproduct->save();
            if ($status == 2) {
                Cart::where('item_id', $checkproduct->id)->delete();
            }
            return redirect('admin/products')->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function delete_product($slug)
    {
        try {
            $checkproduct = Item::where('slug', $slug)->first();
            $deletevariations = Variants::where('item_id', $checkproduct->id)->delete();
            $deleteextras = Extra::where('item_id', $checkproduct->id)->delete();
            $deletecarts = Cart::where('item_id', $checkproduct->id)->delete();
            $itemimages = ItemImages::where('item_id', $checkproduct->id)->get();
           
            foreach($itemimages as $itemimage)
            {
                if (file_exists(storage_path('app/public/item/' . $itemimage->image))) {
                    unlink(storage_path('app/public/item/' . $itemimage->image));
                }
            }

            $item_image = ItemImages::where('item_id', $checkproduct->id)->delete();
    
            $checkproduct->delete();
            return redirect()->back()->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }

    public function reorder_product(Request $request)
    {
        $getproduct = Item::where('vendor_id', Auth::user()->id)->get();
        foreach ($getproduct as $product) {
            foreach ($request->order as $order) {
               $product = Item::where('id',$order['id'])->first();
               $product->reorder_id = $order['position']; 
               $product->save();
            }
        }
        return response()->json(['status' => 1,'msg' =>'Update Successfully!!'], 200);
    }
}