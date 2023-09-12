<?php

namespace App\Http\Controllers\Addons;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\User;
use App\Models\Settings;
use App\Helpers\helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BlogController extends Controller

{
    public function index()
    {
        $blog = Blog::orderByDesc('id')->where('vendor_id', Auth::user()->id)->get();
        return view('admin.blog.blog', compact('blog'));
    }
    public function add()
    {
        return view('admin.blog.add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ], [
            'title.required' => trans('messages.title_required'),
            'description.required' => trans('messages.description_required'),
            'image.required' => trans('messages.image_required'),
        ]);
        $check_slug = Blog::where('slug', Str::slug($request->title, '-'))->first();
        if (!empty($check_slug)) {
            $last_id = Blog::select('id')->orderByDesc('id')->first();
            $slug = Str::slug($request->title . ' ' . $last_id->id, '-');
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $blogimage = 'blog-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(storage_path('app/public/admin-assets/images/blog/'), $blogimage);
        $blog = new Blog();
        $blog->vendor_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->description = $request->description;
        $blog->image = $blogimage;
        $blog->save();
        return redirect('admin/blogs')->with('success', trans('messages.success'));
    }
    public function edit($slug)
    {
        $getblog = Blog::where('slug', $slug)->first();
        if (!empty($getblog)) {
            return view('admin.blog.edit', compact('getblog'));
        }
        return redirect('admin/blogs');
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ], [
            'title.required' => trans('messages.title_required'),
            'description.required' => trans('messages.description_required'),
            'image.mimes' => trans('messages.valid_image'),
            'image.image' => trans('messages.enter_image_file'),
        ]);
        $blog = Blog::where('slug', $slug)->first();
        $check_slug = Blog::where('slug', Str::slug($request->title, '-'))->first();
        if (!empty($check_slug)) {
            $slug = Str::slug($request->title . ' ' . $blog->id, '-');
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $blog->slug = $slug;
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->has('image')) {
            if (file_exists(storage_path('app/public/admin-assets/images/blog/' . $blog->image))) {
                unlink(storage_path('app/public/admin-assets/images/blog/' . $blog->image));
            }
            $blogimage = 'blog-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/blog/'), $blogimage);
            $blog->image = $blogimage;
        }
        $blog->update();
        return redirect('admin/blogs')->with('success', trans('messages.success'));
    }
    public function delete($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if (file_exists(storage_path('app/public/admin-assets/images/blog/' . $blog->image))) {
            unlink(storage_path('app/public/admin-assets/images/blog/' . $blog->image));
        }
        $blog->delete();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    
    // ------------front blogs functions----------
    public function blogs(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $getblog = Blog::where('vendor_id',$vdata)->orderByDesc('id')->paginate(6);
        return view('front.blogs.index',compact('getblog','storeinfo'));
    }
    public function blogdetails(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $blogdetail = Blog::where('slug',$request->slug)->first();
        $getblog = Blog::where('vendor_id',$vdata)->orderByDesc('id')->take(3)->get();
        return view('front.blogs.blog_detail',compact('getblog','blogdetail','storeinfo'));
    }
    
    // landing page function
    public function allblogs()
    {
        $admindata =User::where('type',1)->first();
        $blogs = Blog::where('vendor_id',$admindata->id)->orderByDesc('id')->paginate(12);
        return view('landing.bloglist',compact('blogs'));
    }
    public function pageblogdetail(Request $request)
    {
        $admindata =User::where('type',1)->first();
        $getblog = Blog::where('slug',$request->slug)->first();
        $blogs= Blog::where('vendor_id',$admindata->id)->orderByDesc('id')->take(5)->get();
        return view('landing.blogdetail',compact('getblog','blogs'));
    }
}