<?php

namespace App\Http\Controllers\addons;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class LanguageController extends Controller
{
    public function add()
    {
        return view('admin.language.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'code'=> 'required',
            'layout'=> 'required',
            'name'=> 'required_with:code',
            'image.*' => 'mimes:jpeg,png,jpg',
        ],[
            "code.required"=>trans('messages.language_required'),
            "layout.required"=>trans('messages.layout_required'),
            "name.required_with"=>trans('messages.wrong'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $path = base_path('resources/lang/'.$request->code);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            File::copyDirectory( base_path().'/resources/lang/en', base_path().'/resources/lang/'.$request->code);
            
            if($request->default == 1) {
                Languages::where('is_default','1')->update(array('is_default' => 2));
                $default = 1;
            } else {
                $default = 2;
            }

            $language = new Languages();
            $language->code = $request->code;
            $language->name = $request->name;
            $language->layout = $request->layout;
            $language->is_default = $default;
            if ($request->has('image')) {
                $flagimage = 'flag-' . uniqid() . "." .$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(storage_path('app/public/admin-assets/images/language/'), $flagimage);
                $language->image = $flagimage;
            }
            $language->is_available = 1;
            $language->save();
            return redirect('admin/language-settings')->with('success',trans('messages.success'));
        }
    }

    public function status(Request $request)
    {
        $language = Languages::find($request->id);
        $language->is_available = $request->status;
        $language->save();
        if($language){
            return redirect()->back()->with('success', trans('messages.success'));
        }else{
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
}
