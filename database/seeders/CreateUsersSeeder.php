<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

final class CreateUsersSeeder extends Seeder
{
    public function run(): void
    {
        Item::factory(10)->create();
    }
}
