<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->novo('Administrador', 'administrador@email.com', 'admin@1234', '2022-01-01');
    }

    function novo(string $nome, string $email, string $senha, string $data) {
        if (User::where('email', $email)->first() != null)
            return;

        $user = new User();

        $user->name = $nome;
        $user->birthday = $data;
        $user->email = $email;
        $user->matricula = getNextMatriculaGeradoPorAno();
        $user->password = bcrypt($senha);

        $user->save();
    }
}
