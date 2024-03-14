<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'Maria Antonieta',
                'cpf' => '123.456.789-00',
                'email' => 'cliente1@email.com',
                'endereco' => 'Rua Exemplo, 123',
            ],
            [
                'nome' => 'Alan Turing',
                'cpf' => '987.654.321-00',
                'email' => 'cliente2@email.com',
                'endereco' => 'Avenida Principal, 456',
            ],
        ]);
    }
}
