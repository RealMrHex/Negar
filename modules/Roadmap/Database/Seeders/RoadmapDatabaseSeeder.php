<?php

namespace Modules\Roadmap\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Roadmap\Database\Seeders\V1\RoadmapTableSeeder\RoadmapTableSeeder;

class RoadmapDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(
            [
                RoadmapTableSeeder::class
            ]
        );
    }
}
