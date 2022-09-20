<?php

use Illuminate\Support\Facades\DB;

function getNextMatriculaGeradoPorAno() {
    $ano = date('Y');
    $item = DB::table('users')->where('matricula', DB::raw("(SELECT MAX(matricula) FROM users)"))->first();
    $max = isset($item) ? $item->matricula : 0;
    $numeroFinal = 0;

    if (($max == 0) || (substr($max, 0, 4) != $ano)) {
        $numeroFinal = (int)((string)$ano . "000001");
    } else {
        $numeroFinal = (int)$max + 1;
    }
    return $numeroFinal;
}
