<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

	public function run()
	{

		factory(App\Models\Pages\PageModel::class, 2)->create();

	}
}
