<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\UserStory;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'project_id' => Project::factory(),
            'active' => true,
            'code' => $this->faker->randomNumber(3, true),
            'condition' => $this->faker->sentence,
            'expectation' => $this->faker->sentence,
            'objective' => $this->faker->sentence,
            'test' => $this->faker->paragraph
        ];
    }
}
