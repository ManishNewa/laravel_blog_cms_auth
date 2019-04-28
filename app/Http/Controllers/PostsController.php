<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count()==0){

            $notification = array(

                'message' => 'You must have some categories before creating a post',
                'alert-type' =>'error'
    
            );

            return redirect()->back()->with($notification);

        }

        return view('admin.posts.create')->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request['title'];

        $this->validate($request,[
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([

            'title' => $request['title'],
            'content' => $request['content'],
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)

        ]);

        $notification = array(

            'message' => 'Post created successfully',
            'alert-type' =>'success'

        );
        
        return redirect('/admin/posts')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'

        ]);
        
        $post = Post::find($id);
        
        if($request->hasFile('featured')){

            $featured = $request->featured;

            $img_path = substr($post->featured,17);

            unlink(public_path($img_path));    

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $notification = array(

            'message' => 'Post updated successfully',
            'alert-type' =>'success'

        );
        
        return redirect('/admin/posts')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::find($id);

        $post->delete();

        
        $notification = array(

            'message' => 'The post was trashed successfully',
            'alert-type' =>'success'

        );
         
        return redirect()->back()->with($notification);

    }

    public function trashed(){

        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts',$posts);

    }
    
    public function kill($id){

        $post = Post::withTrashed()->where('id', $id)->first();
        
        $img_path = substr($post->featured,17);

        unlink(public_path($img_path));

        $post->forceDelete();

        $notification = array(

            'message' => 'Post permanently deleted',
            'alert-type' =>'error'

        );

        return redirect()->back()->with($notification);


    }

    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();
        
        $notification = array(

            'message' => 'Post has been restored successfully',
            'alert-type' =>'success'

        );

        return redirect()->back()->with($notification);


    }
}
