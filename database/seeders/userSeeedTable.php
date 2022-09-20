<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->novo('Administrador', 'administrador@email.com', 'admin@123');
    }

    function novo(string $nome, string $email, string $senha) {
        if (User::where('email', $email)->first() != null)
            return;

        $user = new User();

        $ano = date('Y');

        $user->name = $nome;
        $user->matricula = (int)((string)$ano.'000001');
        $user->birthday = '2022-01-01';
        $user->email = $email;
        $user->password = bcrypt($senha);


        $user->save();
    }


}
