<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::latest()->paginate(50);
        $posts = Post::get();
//        if (Auth::user()->organization_id != null) {
//            $posts = Post::get()->where('organization_id', Auth::user()->organization_id);
//        }
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255']
    
        ]);

        $post = new Post();
//        dd($request->get('image'));
        $post->title = $request->input('title');
//        $post->user_id = Auth::user()->id;
        $post->user_id = $request->user()->id;

//        dd($request->input('organization'));
//        $organization = Organization::find($request->input('organization'));

        $post->save();


        return redirect()->route('posts.show', [ 'post' => $post->id ]);
        //                     --------------------------^
        //                    |
        // GET|HEAD  posts/{post} ........ posts.show › PostController@show
    }


    private function uploadPicture(Request $request) {
/*        $uploadedFile = $request->get('image');
//        dd($uploadedFile);
//        dd(time().$uploadedFile->getClientOriginalName());
//        dd(Carbon::now()->format('Y_m_d_His'));
//        $filename = time().$uploadedFile->getClientOriginalName();
        $filename = Carbon::now()->format('Y_m_d_His');
//        dd($filename, $uploadedFile);

        Storage::disk('local')->putFileAs(
            'files/'.$filename,
            $uploadedFile,
            $filename
        );*/
        if (is_null($request->file('upload')))
            return null;
        $path = $request->file('upload')->store('public/files');
        $path = trim(strstr($path,"files"));
//        dd($path);
        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)       // dependency injection
    {
        if (is_int($post->view_count)) {
            $post->view_count = $post->view_count + 1;
            $post->save();
        }
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255']
        ]);

        $post->title = $request->input('title');
        

        $post->save();


        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $title = $request->input('title');
        if ($title == $post->title) {
            $post->delete();
            return redirect()->route('posts.index');
        }

        return redirect()->back();
    }


    public function updateStatus(Request $request, Post $post) {
//        dd($request->get('status'));
        $post->status = $request->get('status');
        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }
}
