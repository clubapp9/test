<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Pages\PagesModel::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'page_category_id' => rand(1, 2),
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'content' => $faker->text,
        'source' => $faker->url,
    ];
});


$factory->define(App\Models\Pages\PageCategoryModel::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->define(App\Models\Portfolio::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dob'  => $faker->date(),
        'ssn' => $faker->numberBetween(1000000,9999999),
        'co_borrower_first_name' => $faker->firstName,
        'co_borrower_last_name' => $faker->lastName,
        'co_borrower_ssn'=> $faker->numberBetween(1000000,9999999),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->city,
        'zip_code' => $faker->postcode,
        'original_creditor' => $faker->firstName,
        'original_account_numbers'=> $faker->creditCardNumber(),
        'portfolio_name' => $faker->firstName,
        'reference_name' => $faker->firstName,
        'account_open_date' =>  $faker->date(),
        'first_delinquent_date' =>  $faker->date(),
        'charge_off_date' =>  $faker->date(),
        'last_payment_date' =>  $faker->date(),
        'last_payment_amount' => $faker->numberBetween( 1000, 50000),
        'original_balance' => $faker->numberBetween( 1000, 50000),
        'interest_percentage' => $faker->numberBetween( 5, 50 ),
        'total_interest'=> $faker->numberBetween( 5, 50 ),
        'current_balance_with_interest'=> $faker->numberBetween( 5, 50 ),
        'place_of_employment'=> $faker->streetAddress,
        'home_phone' => $faker->phoneNumber,
        'work_phone' => $faker->phoneNumber,
        'reference_phone' => $faker->phoneNumber,
        'last_contact_date' =>  $faker->date(),
        'status' => $faker->word
    ];
});


