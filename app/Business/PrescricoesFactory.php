<?php

namespace App\Business;

use App\Prescricao;
use App\PrescricaoItem;

class PrescricoesFactory
{
    private $data;

    function __construct(array $data)
    {
        $this->data = $data;
    }

    public function create()
    {
        $prescricao = new Prescricao();
        //$prescricao->data_hora_liberacao = date('Y-m-d H:i:s');
        $prescricao->crm_medico = $this->data['crm_medico'];
        $prescricao->cod_atendimento = $this->data['cod_atendimento'];
        $prescricao->status = 1;

        $prescricao->save();

        $id = $prescricao->codigo;
        $listItens = [];

        $elementos = isset($this->data['elemento']) ? $this->data['elemento'] : [];
        foreach ($elementos as $idItem => $type) {
            $type = ($type == 'medicamento') ? 'm' : 'a';

            $item = new PrescricaoItem();
            $item->cod_prescricao   = $id;
            $item->cod_item         = $idItem;
            $item->tipo_item        = $type;
            $item->posologia        = $this->data['quantidade'][$idItem];
            $item->cod_via          = $this->data['via'][$idItem];
            $item->cod_frequencia   = $this->data['frequencia'][$idItem];
            $item->cod_apresentacao = $this->data['apresentacao'][$idItem];
            $item->se_necessario    = 0;
            $item->observacao       = $this->data['condicao'][$idItem];

            $item->save();
            $listItens[] = $item->codigo;
        }

        return [
            'prescricao' => $id,
            'itens' => $listItens,
        ];
    }
}
