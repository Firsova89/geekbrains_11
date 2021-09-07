<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
	{
		return view('news.index', [
			'newsList' => $this->getNews(),
            'categories'
		]);
	}

	public function show(int $id)
	{
		return view('news.show', [
			'id' => $id
		]);
	}

	public function categories()
    {
        return view('news.categories', [
            'categoriesList' => $this->getCategories()
        ]);
    }
    public function news_by_category(int $id)
    {
        echo "111111";
        return view('news.index', [
            'newsList' => $this->getNewsByCategory($id),
            'categories'
        ]);

    }
}
