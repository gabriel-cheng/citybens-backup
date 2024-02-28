<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Posts;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index() {
        $posts = Posts::limit(4)->get();

        SEOTools::setTitle('citybens consórcios');
        SEOTools::setDescription('Encontre aqui na citybens consórcios, o melhor consórcio para você ou para sua empresa.');
        SEOTools::opengraph()->setUrl(route('home'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(asset('images/logo/logo-branca.png'));

        return view('site.home', compact('posts'));
    }

    public function blog() {
        $posts = Posts::paginate(10);

        SEOTools::setTitle('Blog citybens');
        SEOTools::setDescription('Tudo o que precisa saber sobre a citybens e sobre nossos consórcios.');
        SEOTools::opengraph()->setUrl(route('blog'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(asset('images/logo/logo-branca.png'));

        return view('site.blog', compact('posts'));
    }

    public function post($slug) {
        $post = Posts::where('slug', $slug)->first();

        SEOTools::setTitle('citybens -'.$post->title);
        SEOTools::setDescription($post->short_description);
        SEOTools::opengraph()->setUrl(route('post', $post->slug));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(asset('images/logo/logo-branca.png'));

        return view('site.post', compact('post'));
    }
}
