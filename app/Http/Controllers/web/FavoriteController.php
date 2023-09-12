<?php
namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Item;
use App\Helpers\helper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use URL;
class FavoriteController extends Controller
{
    public function index(Request $request)
    {

        $storeinfo = helper::storeinfo($request->vendor);  
              
        $user_id = @Auth::user()->id;
        $getfavoritelist = Item::with('variation','item_image')->select('items.*','favorite.id as favorite_id',DB::raw('(case when favorite.item_id is null then 0 else 1 end) as is_favorite'),DB::raw('(case when items.item_price is null then 0 else items.item_price end) as price'))
        ->join('favorite', function($query) use($user_id) {
            $query->on('favorite.item_id','=','items.id')
            ->where('favorite.user_id', '=', $user_id);
        })
        ->groupBy('items.id','favorite.item_id')
        ->where('items.is_available','1')
        ->where('favorite.user_id',$user_id)
        ->where('favorite.vendor_id',$storeinfo->id)
        ->orderByDesc('favorite.id')->paginate(6);


       
        return view('front.favoritelist',compact('storeinfo','getfavoritelist'));
    }
    public function managefavorite(Request $request)
    {
        
       $user = User::where('id',$request->vendor_id)->first();
       $base_url = url('/').'/'.$user->slug;
   
        $data = '';
        $checkfavorite = Favorite::where('user_id',Auth::user()->id)->where('item_id',$request->slug)->first();
        try {
            if($request->type == 1){
                $favorite = new Favorite();
                $favorite->user_id = Auth::user()->id;
                $favorite->item_id = $request->slug;
                $favorite->vendor_id = $request->vendor_id;
                $favorite->save();

                $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',0,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.remove_wishlist').'"> <i class="fa-solid fa-heart"></i> </a>';

                if($request->url == $base_url)
                {
                    if(helper::appdata($request->vendor_id)->template == 1)
                    {
                        $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',0,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.remove_wishlist').'"> <i class="fa-solid fa-heart"></i> </a>';
                    }
                    else if(helper::appdata($request->vendor_id)->template == 2)
                    {
                        $data = '<a class="theme-2-product-icon mx-2"  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',0,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.remove_wishlist').'"> <i class="fa-solid fa-heart"></i> </a>';
                    }
                    else if(helper::appdata($request->vendor_id)->template == 3)
                    {
                        $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',0,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.remove_wishlist').'"> <i class="fa-solid fa-heart"></i> </a>';
                    }
                    else
                    {
                          $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',0,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.remove_wishlist').'"> <i class="fa-solid fa-heart"></i> </a>';
                    }
                }
                



            }
            if($request->type == 0){
                $checkfavorite->delete();


                $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',1,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.add_wishlist').'"><i class="fa-regular fa-heart"></i> </a>';

                if($request->url == $base_url)
                {
                    if(helper::appdata($request->vendor_id)->template == 1)
                    {
                        $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',1,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.add_wishlist').'"><i class="fa-regular fa-heart"></i> </a>';
                    }
                    else if(helper::appdata($request->vendor_id)->template == 2)
                    {
                        $data = '<a class="theme-2-product-icon mx-2" href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',1,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.add_wishlist').'"><i class="fa-regular fa-heart"></i> </a>';
                    }
                    else if(helper::appdata($request->vendor_id)->template == 3)
                    {
                        $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',1,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.add_wishlist').'"><i class="fa-regular fa-heart"></i> </a>';
                    }
                    else
                    {
                        $data = '<a  href="javascript:void(0)" onclick="managefavorite('.$request->vendor_id.','.$request->slug.',1,'.chr(0x27).$request->favurl.chr(0x27).','.chr(0x27).$request->url.chr(0x27).')" title="'.trans('labels.add_wishlist').'"><i class="fa-regular fa-heart"></i> </a>';
                    }
                }

            }
            return response()->json(['status'=>1,'message'=>trans('messages.success'),"data"=>$data],200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>0,'message'=>trans('messages.wrong'),"data"=>$data],200);
        }
    }
}
