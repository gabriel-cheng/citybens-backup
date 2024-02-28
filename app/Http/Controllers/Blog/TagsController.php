<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Tags;

class TagsController extends Controller
{
    public function index() {
        $tags = Tags::paginate();

        return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request) {
        $attributes = $request->all();

        $tag = Tags::create($attributes);

        if ($tag) {
            return redirect()->back()->with('success', 'Tag Criada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao criar uma tag');
    }

    public function update(Request $request, Tags $tag) {
        $attributes = $request->all();

        $tag->name              =   $attributes['name'];
        $tag->text_color        =   $attributes['text_color'];
        $tag->background_color  =   $attributes['background_color'];

        if ($tag->save()) {
            return redirect()->back()->with('success', 'Tag atualizada com sucesso');
        }
        return redirect()->back()->with('error', 'Houve uma falha ao editar a tag');
    }

    public function delete(Tags $tag) {
        if ($tag->delete()) {
            return redirect()->back()->with('success', 'Tag deletada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao deletar tag');
    }
}
