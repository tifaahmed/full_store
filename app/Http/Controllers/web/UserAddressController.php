<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;

use App\Models\UserAddress;
use App\Enums\AddressTypeEnums;

use Illuminate\Support\Facades\Auth;
 
class UserAddressController extends Controller
{
    public function index(Request $request)
    {
        $storeinfo = helper::storeinfo($request->vendor);  
        $coordinatesArray  =  $storeinfo->deliveryAreas->where('coordinates','!=',null)
                ->pluck('coordinates')->toArray(); 
        $coordinates = json_encode($coordinatesArray);

        $addresses = UserAddress::AuthUser()->orderBy('is_active','desc')->latest()->paginate(6);
        $address_types  = AddressTypeEnums::mapValueToName();
        return view('front.user-address.index',compact(
            'coordinates','addresses','address_types','storeinfo'
        ));
    }

    public function edit(Request $request,$vendor,$id)
    {
        $address_types  = AddressTypeEnums::mapValueToName();
        $storeinfo = helper::storeinfo($request->vendor); 
        $coordinatesArray  =  $storeinfo->deliveryAreas->where('coordinates','!=',null)
                ->pluck('coordinates')->toArray();             
        $coordinates = json_encode($coordinatesArray);
        $address = UserAddress::AuthUser()->where('id',$id)->first();
        return view('front.user-address.edit',compact('coordinates','address','address_types','storeinfo'));
    }
    public function update(Request $request,$vendor,$id)
    {
        
        $address = UserAddress::AuthUser()->where('id',$id)->first();
        if ($request->is_active) {
            // Deactivate all other rows
            UserAddress::AuthUser()->where('id', '!=', $address->id)
            ->update(['is_active' => 0]);
        }
        $address->update( $request->except('_token','_method'));

        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function create(Request $request) 
    {
        $address_types  = AddressTypeEnums::mapValueToName();
        $storeinfo = helper::storeinfo($request->vendor);  
        return view('front.user-address.create',compact('address_types','storeinfo'));
    }
    public function store(Request $request) 
    {
        $storeinfo = helper::storeinfo($request->vendor);  
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $address = UserAddress::create($data);
        if ($address && $address->is_active) {
            // Deactivate all other rows
            UserAddress::AuthUser()->where('id', '!=', $address->id)
            ->update(['is_active' => 0]);
        }
        return redirect(request()->segment(1).'/user-address')->with('success', trans('messages.success'));
    }
    public function destroy(Request $request) 
    {
        $address = UserAddress::AuthUser()->where('id',$request->id)->first();
        if ($address && $address->is_active) {
            // activate on of other rows
            UserAddress::AuthUser()->first()->update(['is_active' => 1]);        
        }
        $address->delete();
        return redirect(request()->segment(1).'/user-address')->with('success', trans('messages.success'));
    }
     
}
