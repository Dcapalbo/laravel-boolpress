<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
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
        // take all the users from the model
        $users = User::all();
        // return the index view
        return view('admin.index', compact('users'));
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
            // make back-end validations
            $request->validate(
                [
                    "name" => "required|max:100",
                    "email"=> "required|unique:users|max:100",
                    "password"=> "required|max:150",
                ]
            );
            // make user object instance
            $user = new User;
            
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = $data["password"];
            
            // save the object modify
            $user->save();

            // redirect the objects to the index route
            return redirect()->route("admin.index");
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
        $user = User::find();
        // return the show view
        return view("admin.show", compact("user"));
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
        $user = User::find($id);
            // make validations
            $request->validate(
                [
                    "name" => "required|max:100",
                    "email"=> ["required",
                                Rule::unique('users')->ignore($id),
                                "max:300"
                              ],
                    "password"=> "required|max:150",
                ]
            );
            // make an objects instance
            $user = new User;
    
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = $data["password"];
            
            // save the specific object
            $user->save();

            return redirect()->route("admit.index", $id);
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
        $user = User::find($id);
        // delete the selected object
        $user->delete();
        // redirect index route
        return redirect()->route("admin.index");
    }
}
