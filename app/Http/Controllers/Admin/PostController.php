<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // take athe user under authentification from the model
        $user_id = Auth::id();
        $posts = Post::where('user_id', $user_id)->get();
        // return the index view
        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return the create view
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {   
            // requesting all data
            $data = $request->all();
            $user_id = Auth::id();
            // make back-end validations
            $request->validate(
                [
                    "title" => "required|max:100",
                    "slug"=> "required|unique:posts|max:100",
                    // "password" => "required|max:150",
                    "description" => "required",
                    // "image" => "image|max:200"
                ]
            );
            // make user object instance
            $post = new Post;
            $post->user_id = $user_id;
            $post->title = $data["title"];
            $post->slug = $data["slug"];
            // $post->password = $data["password"];
            $post->description = $data["description"];
            // $post->image = $data["image"];
            
            // save the object modify
            $post->save();

            // redirect the objects to the index route
            return redirect()->route("admin.posts.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find a single objetc with the find method
        $post = Post::find($id);
        // return the show view
        return view("admin.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return the edit view for the single object id
        return view('admin.edit', compact('user'));
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
        // request all objects data
        $data = $request->all();
        // find a specific object
        $post = User::find($id);
            // make validations
            $request->validate(
                [
                    "name" => "required|max:100",
                    "email"=> ["required",
                                Rule::unique('posts')->ignore($id),
                                "max:300"
                              ],
                    "password"=> "required|max:150",
                    "description" => "required",
                    "image" => "image|max:200"
                ]
            );
            // make user object instance
            $post = new Post;
            
            $post->title = $data["title"];
            $post->slug = $data["slug"];
            $post->password = $data["password"];
            $post->description = $data["description"];
            $post->image = $data["image"];
            
            // save the object modify
            $post->save();
            // redirect the objects to the index route
            return redirect()->route("admin.index", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find a specific object
        $post = Post::find($id);
        // delete the selected object
        $post->delete();
        // redirect index route
        return redirect()->route("admin.index");
    }
}
