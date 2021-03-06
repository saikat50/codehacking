<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate();


        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();


        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
         $user = Auth::user();


         $input = $request->all();

         if($file = $request->file('photo_id')){

             $name = time() . $file->getClientOriginalName();

             $file->move('images', $name);

             $photo = Photo::create(['file'=>$name]);

             $input['photo_id'] = $photo->id;

             $input['user_id'] = $user->id;

             Post::create($input);

             return redirect('/admin/posts');

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
        //

        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));

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
        //

        $post = Post::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){

            iF($post->photo){

                unlink(public_path() . $post->photo->file);

                $post->photo->delete();
            }


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        if($post->photo){

            unlink(public_path() . $post->photo->file);

            $post->photo->delete();
        }

        $post->delete();

        session(['deleted_post'=>'Post has been deleted successfully!!!']);

        return redirect('admin/posts');

    }


    public function post($slug){

        $post = Post::findBySlug($slug);

        $posts = Post::findOrFail($post->id);

        $comments = $posts->comments()->where('is_active', 1)->get();

        return view('post', compact('post', 'comments'));


    }

}
