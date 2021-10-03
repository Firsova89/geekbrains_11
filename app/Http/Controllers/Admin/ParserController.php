<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function __invoke(Request $request, Parser $service)
    {
		$urls = [
			'https://news.yandex.ru/auto.rss',
			'https://news.yandex.ru/auto_racing.rss',
			'https://news.yandex.ru/army.rss',
			'https://news.yandex.ru/gadgets.rss',
			'https://news.yandex.ru/index.rss',
			'https://news.yandex.ru/martial_arts.rss',
			'https://news.yandex.ru/communal.rss',
			'https://news.yandex.ru/health.rss',
			'https://news.yandex.ru/games.rss',
			'https://news.yandex.ru/internet.rss',
			'https://news.yandex.ru/cyber_sport.rss',
			'https://news.yandex.ru/movies.rss',
			'https://news.yandex.ru/cosmos.rss',
		];
        $news = [];
		foreach($urls as $url) {
			$newsFromUrl = $service->parse($url);

            $category = Category::where('title', $newsFromUrl['title'])->first();
            if (!$category)
            {
                $category = new Category();
                $category->title = $newsFromUrl['title'];
                $category->description = $newsFromUrl['description'];
                $category->save();
            }
            foreach($newsFromUrl['news'] as $singleNewsParsed) {
                $singleNewsInDB = News::where('guid',$singleNewsParsed['guid'])->first();
                if (!$singleNewsInDB)
                {
                    $singleNewsInDB = new News();
                    $singleNewsInDB->category_id = $category->id;
                    $singleNewsInDB->title = $singleNewsParsed['title'];
                    $singleNewsInDB->author = "Imported from $url";
                    $singleNewsInDB->description = $singleNewsParsed['description'];
                    $singleNewsInDB->guid = $singleNewsParsed['guid'];
                    $singleNewsInDB->save();
                }
            }
		}
        return redirect()->route('admin.news.index') ->with('success', 'Новости успешно импортированны');;
    }
}
