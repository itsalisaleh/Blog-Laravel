<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){

        $postFromDB = Post::all();
        
        
        return view('posts.index',['posts' => $postFromDB]);
    }

    public function show($postId) {

        
        $singlePost = Post::findOrFail($postId);
        return view('posts.show',['singlePost' => $singlePost]);
    }

    public function create() {

        $allusers = User::all();

        return view('posts.create',['allusers'=>$allusers]);
    }

    public function store() {

        request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:6']
        ]);

        $title = Request()->title;
        $description = Request()->description;
        $selection = Request()->selection; //who create the post
        
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $selection
        ]);
        return to_route('posts.index');
        
        /*
       $newPost = new Post();
       $newPost->title = $title;
       $newPost->description = $description;
       $newPost->save();
        */
        
    }

    public function edit($postID) {

        $allusers = User::all();

        $singlePost = Post::findOrFail($postID);

        
        

        return view('posts.edit',['allusers' => $allusers,'singlepost'=>$singlePost]);
    }

    public function update($postID) {

        request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:6']
        ]);
        
        $title = Request()->title;
        $description = Request()->description;
        $selection = Request()->selection;

        $singlePostFromDB = Post::find($postID);

        $singlePostFromDB->update([
            
            'title' => $title,
            'description' => $description,
            'user_id' => $selection
        ]);

        /*
            $affected = DB::table('posts')
              ->where('id', $postID)
              ->update([
                
                'title' => $title,
               'description' => $description
        ]);
        */

        
        
        return to_route('posts.show',$postID);
    }

    public function destroy($postID) {

        $deletedPost = Post::findOrFail($postID);

        $deletedPost->delete();
        //$deleted = DB::table('posts')->where('id', $postID)->delete();





        
        return to_route('posts.index');
    }
}
