<?php

namespace App\Business;

use App\Medicamentos;

class SearchItens
{

    function __construct()
    {
        # code...
    }


    public function by(array $rules)
    {
        $apresentacao = $frequencia = $via = [];

        if (isset($rules['medicamento'])) {
            $item = Medicamentos::with('frequencias')
                ->with('vias')
                ->with('apresentacao')
                ->where(['nome' => $rules['medicamento']])
                ->first();
        }
        else if (isset($rules['aplicacao'])) {

        }
        else {
            return [];
        }

        foreach ($item->frequencias()->get() as $_freq) {
            $frequencia[] = [
                'id' => $_freq['codigo'],
                'name' => $_freq['descricao'],
            ];
        }

        foreach ($item->apresentacao()->get() as $_apr) {
            $apresentacao[] = [
                'id' => $_apr['codigo'],
                'name' => $_apr['descricao'],
            ];
        }

        foreach ($item->vias()->get() as $_via) {
            $via[] = [
                'id' => $_via['codigo'],
                'name' => $_via['descricao'],
            ];
        }

        return [
            'medicamento_id' => $item['codigo'], //$item['codigo'],
            'apresentacao' => $apresentacao,
            'frequencia' => $frequencia,
            'via' => $via,
        ];
    }
}
