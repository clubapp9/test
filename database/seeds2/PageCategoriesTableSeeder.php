<?php
use Faker\Factory as Faker;

class PageCategoriesTableSeeder extends DatabaseSeeder
{

    function __construct() {
        echo "YES";
    }
	public function run()
	{

		factory(App\Models\Pages\PageCategoryModel::class, 2)->create();

	}
}
