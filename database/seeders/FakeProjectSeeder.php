<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\UserStory;
use Illuminate\Database\Seeder;

class FakeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()
            ->count(5)
            ->has(UserStory::factory()->count(3))
            ->create();
    }
}
