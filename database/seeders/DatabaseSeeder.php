<?php

namespace Database\Seeders;




use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Factory de User em massa:
        // User::factory(10)->create();

        // User individual:
        // User::factory()->create([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'test@example.com',
        // ]);

        // Posso dar seed em outros models que eu quiser aqui dentro:
        // === Job::factory(100)->create();
        // ou separar em arquivos diferentes mas isso vai ser executado com o
        // comendo db:seed. Nota -> db:seed vai executar User e Author seeders

        // Blog
        $this->call(AuthorSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeed::class);
        
        // Laracast
        $this->call(UserSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(JobSeeder::class);

        // Importante: a ordem importa. se 1 seed depende de outro seed, tem 
        // que colocar o dependente depois do outro

        
    }
}