<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tag::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'slag' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'two_factor_secret' => $faker->text(),
        'two_factor_recovery_codes' => $faker->text(),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'worker_specialization' => $faker->sentence,
        'worker_group' => $faker->sentence,
        'worker_cathedra' => $faker->sentence,
        'worker_faculty' => $faker->sentence,
        'customer_work_place' => $faker->sentence,
        'about' => $faker->text(),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Vacancy::class, static function (Faker\Generator $faker) {
    return [
        'author_id' => $faker->sentence,
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'about_worker' => $faker->text(),
        'responsibilities' => $faker->text(),
        'requirements' => $faker->text(),
        'personal_skills' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
