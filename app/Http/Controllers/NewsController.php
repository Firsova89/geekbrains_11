<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($category)
	{
	    $newsList = [];
        $categoriesList = $this->getCategories();
        array_unshift($categoriesList,['id' => "ALL", 'title' => 'Все' ]);
	    if ($category == "ALL")
        {
            $newsList =  $this->getNews();
        }
	    else if (is_numeric($category)) {
            $newsList = $this->getNewsByCategory((int)$category);
        }
		return view('news.index', [
			'newsList' => $newsList,
            'categoriesList' => $categoriesList
		]);
	}

	public function show(int $id)
	{
        $categoriesList = $this->getCategories();
        array_unshift($categoriesList,['id' => "ALL", 'title' => 'Все' ]);
        $newsList =  $this->getNews();
        $news = [];
        if (isset($newsList[$id]))
        {
            $news = $newsList[$id];
        }
		return view('news.show', [
			'news' => $news,
            'categoriesList' => $categoriesList
		]);
	}
}
