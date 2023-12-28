<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
class BranchController extends Controller
{
    public function index(){
        $branchs = Branch::where('vendor_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.branch.index',compact('branchs'));
    }
    public function add(){
        return view('admin.branch.add');
    }
    public function show(Request $request){
        $branch = Branch::find($request->id);
        return view('admin.branch.show',compact('branch'));
    }
    public function update(Request $request,$id){
        $data = $request->validate([
            'name' => 'required',
            'deliveryarea_id' => 'required',
            'is_active' => 'sometimes',
        ],[
            'name.required' => trans('messages.name_required'),
        ]);
        try {
            Branch::where('id',$id)->update($data);
            return redirect('/admin/branch')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'deliveryarea_id' => 'required',
            'is_active' => 'sometimes',
        ],[
            'name.required' => trans('messages.name_required'),
        ]);
        try {
            $branch = new Branch();
            $branch->vendor_id = Auth::user()->id;
            $branch->name = $request->name;
            $branch->deliveryarea_id = $request->deliveryarea_id;
            $branch->is_active = $request->is_active ? 1 : 0;
            $branch->save();
        return redirect('/admin/branch')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function delete(Request $request){
        try {
            $branch = Branch::find($request->id);
            $branch->delete();
            return redirect('/admin/branch')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
}