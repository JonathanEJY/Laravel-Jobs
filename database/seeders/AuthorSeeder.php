<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pode chamar esse sozinho com o comando abaixo
        // php artisan db:seed --class=AuthorSeeder vai executar só esse trecho
        Author::factory(2)->create();
    }
}