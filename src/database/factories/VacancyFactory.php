<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $all_users = User::with("roles")->get();
        $users = $all_users->filter(function ($user) {
            return $user->hasRole('customer');
        });
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->catchPhrase,
            'about_worker' => $this->faker->catchPhrase,
            'responsibilities' => $this->faker->catchPhrase,
            'requirements' => $this->faker->catchPhrase,
            'author_id' => $this->faker->randomElement($users->pluck('id')->toArray()),
        ];
    }
}
