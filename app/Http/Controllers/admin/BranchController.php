<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryArea;
class BranchController extends Controller
{
    public function index(){
        $branches = Branch::where('vendor_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.branch.index',compact('branches'));
    }
    public function add(){
        $deliveryAreas = DeliveryArea::where('vendor_id',Auth::user()->id)->pluck('name','id')->toArray();
        return view('admin.branch.add',['deliveryAreas' => $deliveryAreas]);
    }
    public function edit(Request $request,$id){
        $branch = Branch::find($request->id);
        $deliveryAreas = DeliveryArea::where('vendor_id',Auth::user()->id)->pluck('name','id')->toArray();
        return view('admin.branch.edit',compact('branch','deliveryAreas'));
    }
    public function update(Request $request,$id){
        $data = $request->validate([
            'name' => 'required',
            'deliveryarea_id' => 'required',
            'is_active' => 'sometimes',
            'latitude' => 'required',
            'longitude' => 'required',
        ],[
            'name.required' => trans('messages.name_required'),
        ]);
        try {
            Branch::where('id',$id)->update($data);
            return redirect('/admin/branches')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'deliveryarea_id' => 'required',
            'is_active' => 'sometimes',
            'latitude' => 'required',
            'longitude' => 'required',
        ],[
            'name.required' => trans('messages.name_required'),
        ]);
        try {
            $branch = new Branch();
            $branch->vendor_id = Auth::user()->id;
            $branch->name = $request->name ;
            $branch->deliveryarea_id = $request->deliveryarea_id;
            $branch->is_active = $request->is_active ? 1 : 0;
            $branch->save();

        return redirect('/admin/branches')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function delete(Request $request){
        try {
            $branch = Branch::find($request->id);
            $branch->delete();
            return redirect('/admin/branches')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
}