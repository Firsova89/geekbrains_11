<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private function generateFakeCategories(): array
    {
        return [
            ['id' => 0, 'title' => 'Политика' ],
            ['id' => 1, 'title' => 'Спорт' ],
            ['id' => 2, 'title' => 'Погода' ],
        ];
    }
	protected function getNews(): array
	{
		$faker = Factory::create('ru_RU');
		$data = [];
		$countNumber = mt_rand(5,15);
		$categories = $this->getCategories();
		$countCategories = count($categories);
		for($i=0; $i<$countNumber; $i++) {
		    $categorieId = $i%$countCategories;
			$data[] = [
				'id' => $i+1,
                'categorie_id' => $categorieId,
                'categorie_title' => $categories[$categorieId]['title'],
				'title' => $faker->jobTitle(),
				'description' => "<strong>" . $faker->sentence(3) . "</strong>",
				'author' => $faker->name(),
				'created_at' => now()
			];
		}

		return $data;
	}
    protected function getNewsByCategory(int $id): array
    {
        $filteredNews = [];
        $sourceNews = $this->getNews();
        foreach ($sourceNews as $news)
        {
            if ($news['categorie_id'] === $id)
            {
                $filteredNews[] = $news;
            }
        }
        return $filteredNews;
    }
	protected function getCategories(): array
    {
        return $this->generateFakeCategories();
    }
}
