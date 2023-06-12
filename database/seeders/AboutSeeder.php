<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'name' => rand(1, 10) . " - About",
            'description' => 'Pizzaria Web 2 é um projeto feito como avaliação para a disciplina de Desenvolvimento Web 2* do Curso Técnico em Informática - Integrado ao Ensino Médio do Instituto Federal de Mato Grosso do Sul Campus Campo Grande.'
        ]);
    }
}
