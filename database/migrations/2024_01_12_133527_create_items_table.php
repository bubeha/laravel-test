<?php

declare(strict_types=1);

use Database\Seeders\CreateUsersSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', static function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique();
            $table->string('url');
        });

        (new DatabaseSeeder())->call(CreateUsersSeeder::class);
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
