<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function getPost(){

        //SELECT * FROM `products` ORDER BY `products`.`id` DESC
        $posts = Post::orderBy('id','desc')->get();

        return view('admin.post.list')
        ->with('datas', $posts);

    }

    public function addPost(Request $request){

        //validate gia tri nguoi dung gui len
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:10240',
            'datetime' => 'required',
            'name' => 'required|min:5|max:100',
            'des' => 'required',
            // 'slug' => 'required',
        ]);


        if ($request->image) {

            $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }


        $post = Post::create([
            'image' => $imageName ?? '',
            'datetime' => $request->datetime,
            'name' => $request->name,
            'des' => $request->des,
            'slug' => $request->slug
        ]);

        return redirect()->route('admin.post.list');
    }

    public function deletePost($id){

        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin.post.list');
    }

    public function getPostDetail($id){

        $post = Post::find($id);

        return view('admin.post.edit')

        ->with('post', $post);
    }

    public function editPost(Request $request, $id){

        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:10240',
            'datetime' => 'required',
            'name' => 'required',
            'des' => 'required',
        ]);




        $post = Post::find($id);
        //ORM - object relation ship management
        $post->datetime = $request->datetime;
        $post->name = $request->name;
        $post->des = $request->des;

        if ($request->image) {
            $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            unlink("images/".$post->image);

            $post->image = $imageName;
        }


        $post->save();

        return redirect()->route('post.edit', $post->id)->with('success', 'Edit successfully !');

    }

    public function getViewAddPost(){

        return view('admin.post.add');

    }

    public function getPostSlug(Request $request){

        $name = $request->title;

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function getPostBySlug($slug){

        $post = Post::where('slug', $slug)->first();

        if(!$post){
            return redirect()->route('home');
        }

        return view('frontend.post_detail')->with('post', $post);
    }

}
