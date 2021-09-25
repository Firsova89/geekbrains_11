<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbacksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('feedbacks')->insert($this->getData());
    }
	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i = 0; $i < 50; $i++) {
			$data[] = [
				'username' => $faker->lastName(),
				'userfeedback' => $faker->text(mt_rand(100, 200)),
				'updated_at' => now(),
				'created_at' => now()
			];
		}

		return $data;
	}

}
