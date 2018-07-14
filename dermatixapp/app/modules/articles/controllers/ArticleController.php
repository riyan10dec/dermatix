<?php namespace App\Modules\Articles\Controllers;

use App\Modules\Articles\Models\Article;
use App\Modules\Main\Controllers\BaseFrontendController;
use App\Modules\Stories\Models\Story;

class ArticleController extends BaseFrontendController
{
    public function index()
    {
        $this->setTitle('Talk About Scar');
        $view = array(
            'articles' => Article::latest()->take(3)->get(),
            'stories' => Story::latest()->take(2)->get()
        );
        return $this->theme->scope('talk-about-scar', $view)->render();
    }

    public function articleScar()
    {
        $this->setTitle('Articles About Scar');
        $view = array(
            'articles' => Article::latest()->paginate(6)
        );
        return $this->theme->scope('article-scar', $view)->render();
    }

    public function article($slug)
    {
        $article = new Article;
        $latest = $article->latest()->take(6)->where('slug', '!=', $slug)->get();
        $article = $article->where('slug', $slug)->first();
        $this->setTitle($article->title);
        $view = array(
            'article' => $article,
            'latest' => $latest
        );
        return $this->theme->scope('article-detail', $view)->render();

    }
}