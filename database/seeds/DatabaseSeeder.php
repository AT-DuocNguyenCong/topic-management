<?php

use App\Field;
use App\Level;
use App\Topic;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Topic::truncate();
        Field::truncate();

        factory(User::class, 15)->create();
        factory(Field::class, 5)->create();
        factory(Level::class, 5)->create();
        factory(Topic::class, 20)->create();

    }
}
