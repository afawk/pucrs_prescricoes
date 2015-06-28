<?php

namespace App\Business;

class SearchItens
{

    function __construct()
    {
        # code...
    }


    public function by(array $rules)
    {

        return [
            'medicamento_id' => mt_rand(),
            'apresentacao' => [
                [
                    'id' => 1,
                    'name' => 'abc',
                ],
                [
                    'id' => 2,
                    'name' => 'def',
                ]
            ],
            'frequencia' => [],
            'via' => [],
        ];
    }
}
