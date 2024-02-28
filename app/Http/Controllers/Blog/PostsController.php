<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Posts;
use App\Models\Blog\Tags;
use App\Http\Requests\Admin\Posts\StorePostRequest;
use App\Http\Requests\Admin\Posts\UpdatePostRequest;

class PostsController extends Controller
{
    public function index() {
        $posts  =   Posts::paginate();
        $tags   =   Tags::all();

        return view('admin.blog.index', compact('posts', 'tags'));
    }

    public function show(Posts $post){
        return [
            'post'  =>  $post,
            'tags'  =>  $post->tags()->get(),
        ];
    }

    public function store(StorePostRequest $request) {
        $attributes = $request->all();

        $attributes['author_id'] = auth()->user()->id;

        if (!empty($attributes['status']) && $attributes['status'] == 1) {
            $attributes['status'] = true;
        } else {
            $attributes['status'] = false;
        }

        $post = Posts::create($attributes);

        $post->tags()->attach($attributes['tags']);

        if ($post) {
            return redirect()->back()->with('success', 'Post feito com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao criar um post');
    }

    public function update(Posts $post, UpdatePostRequest $request) {
        $attributes = $request->all();

        if (!empty($attributes['status']) && $attributes['status'] == 1) {
            $attributes['status'] = true;
        } else {
            $attributes['status'] = false;
        }

        $post->update($attributes);

        $post->tags()->sync($attributes['tags']);

        if($post->save()) {
            return redirect()->back()->with('success', 'Post atualizada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar post');
    }

    public function delete(Posts $post) {
        if ($post->delete()) {
            return redirect()->back()->with('success', 'Post deletado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao deletar o post');
    }

}
