<?php

namespace App\Http\Presenter;

use App\Prescricao;

class PrescricoesPresenter
{
    private $atendimentoId;

    function __construct($atendimentoId)
    {
        $this->atendimentoId = $atendimentoId;
    }

    public function actual($prescricaoId = null, $necessitaLiberacao = true)
    {
        $prescricao = Prescricao::with('Atendimento')
            ->with('Itens')
            ->with('Medico')
            ->where('cod_atendimento', $this->atendimentoId);

        if ($prescricaoId) {
            $prescricao->where('codigo', $prescricaoId);
        }

        if ($necessitaLiberacao) {
            $prescricao->whereNotNull('data_hora_liberacao');
        }

        $data = $prescricao->orderBy('data_hora_liberacao', 'DESC')
            ->first();

        return $data;
    }

    public function previous($prescricaoId, $necessitaLiberacao = true)
    {
        $prescricao = Prescricao::with('Atendimento')
            ->with('Itens')
            ->with('Medico')
            ->where('cod_atendimento', $this->atendimentoId)
            ->where('codigo', '<', $prescricaoId);

        if ($necessitaLiberacao) {
            $prescricao->whereNotNull('data_hora_liberacao');
        }

        $data = $prescricao->orderBy('data_hora_liberacao', 'DESC')
            ->first();

        return $data;
    }

    public function next($prescricaoId, $necessitaLiberacao = true)
    {
        $prescricao = Prescricao::with('Atendimento')
            ->with('Itens')
            ->with('Medico')
            ->where('cod_atendimento', $this->atendimentoId)
            ->where('codigo', '>', $prescricaoId);

        if ($necessitaLiberacao) {
            $prescricao->whereNotNull('data_hora_liberacao');
        }

        $data = $prescricao->orderBy('data_hora_liberacao', 'ASC')
            ->first();

        return $data;
    }
}
