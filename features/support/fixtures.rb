module Fixtures
  class << self
    def medico(email, senha)
      medico = PrescricoesDB[:medico].where(usuario: email).first
      return medico if medico

      PrescricoesDB[:medico].insert(MEDICOS.fetch(email).merge(senha: Helpers.hash_senha(senha)))
      PrescricoesDB[:medico].where(usuario: email).first
    end

    # Cria um paciente com o nome passado como parametro ou retorna o registro
    # associado caso ele já exista
    def paciente(nome)
      paciente = PrescricoesDB[:paciente].where(nome: nome).first
      return paciente if paciente

      PrescricoesDB[:paciente].insert(PACIENTES.fetch(nome))
      PrescricoesDB[:paciente].where(nome: nome).first
    end

    # Cria uma unidade com o nome passado como parametro ou retorna o registro
    # associado caso ela já exista
    def unidade(nome)
      unidade = PrescricoesDB[:unidade].where(nome: nome).first
      return unidade if unidade

      PrescricoesDB[:unidade].insert(nome: nome)
      PrescricoesDB[:unidade].where(nome: nome).first
    end

    # Atribui um paciente a unidade passada como parametro caso ainda não exista
    def atribui_paciente_a_unidade(cod_paciente, cod_unidade)
      atendimento = PrescricoesDB[:atendimento].where(cod_paciente: cod_paciente, cod_unidade: cod_unidade).first
      return atendimento if atendimento

      PrescricoesDB[:atendimento].insert(cod_paciente: cod_paciente, cod_unidade: cod_unidade)
      PrescricoesDB[:atendimento].where(cod_paciente: cod_paciente, cod_unidade: cod_unidade).first
    end

    def prescreve_medicamentos(cod_prescricao, prescricoes)
      prescricoes.each do |prescricao|
        qtd, apresentacao, cod_medicamento, via, frequencia = prescricao

        cod_via          = PrescricoesDB[:cadastro_via].where(descricao: via).first[:codigo]
        cod_frequencia   = PrescricoesDB[:cadastro_frequencia].where(descricao: frequencia).first[:codigo]
        cod_apresentacao = PrescricoesDB[:cadastro_apresentacao].where(descricao: apresentacao).first[:codigo]

        PrescricoesDB[:prescricao_item].insert(
          cod_prescricao:   cod_prescricao,
          cod_item:         cod_medicamento,
          tipo_item:        'm',
          posologia:        qtd,
          cod_via:          cod_via,
          cod_frequencia:   cod_frequencia,
          cod_apresentacao: cod_apresentacao,
          se_necessario:    0,
          observacao:       ''
        )
      end
    end

    # Cria um medicamento com o nome passado como parametro ou retorna o registro
    # associado caso ele já exista
    def medicamento(nome)
      medicamento = PrescricoesDB[:cadastro_medicamentos].where(nome: nome).first
      return medicamento if medicamento

      data = MEDICAMENTOS.fetch(nome)
      PrescricoesDB[:cadastro_medicamentos].insert(data.slice(:nome))
      PrescricoesDB[:cadastro_medicamentos].where(nome: nome).first.tap do |medicamento|
        data[:medicamento_frequencia].each do |freq|
          PrescricoesDB[:cadastro_frequencia].insert(freq)
          freq = PrescricoesDB[:cadastro_frequencia].where(descricao: freq[:descricao]).first
          PrescricoesDB[:medicamento_frequencia].insert(
            cod_medicamento: medicamento[:codigo],
            cod_frequencia:  freq[:codigo]
          )
        end
        data[:medicamento_via].each do |via|
          PrescricoesDB[:cadastro_via].insert(via)
          via = PrescricoesDB[:cadastro_via].where(descricao: via[:descricao]).first
          PrescricoesDB[:medicamento_via].insert(
            cod_medicamento: medicamento[:codigo],
            cod_via:         via[:codigo]
          )
        end
        data[:medicamento_apresentacao].each do |apresentacao|
          PrescricoesDB[:cadastro_apresentacao].insert(apresentacao)
          apresentacao = PrescricoesDB[:cadastro_apresentacao].where(descricao: apresentacao[:descricao]).first
          PrescricoesDB[:medicamento_apresentacao].insert(
            cod_medicamento:  medicamento[:codigo],
            cod_apresentacao: apresentacao[:codigo]
          )
        end
      end
    end

    # Cria uma prescricao para uma atendimento e um médico
    def prescricao(cod_atendimento, crm_medico)
      PrescricoesDB[:prescricao].insert(cod_atendimento: cod_atendimento, crm_medico: crm_medico, status: 1)
      PrescricoesDB[:prescricao].where(cod_atendimento: cod_atendimento, crm_medico: crm_medico).first
    end

    private

    PACIENTES = {
      'João Silva' => {
        nome:            'João Silva',
        sexo:            'M',
        cpf:             '12345678901',
        data_nascimento: '2012-12-25'
      },
      'Fulano de Tal' => {
        nome:            'Fulano de Tal',
        sexo:            'M',
        cpf:             '12345678902',
        data_nascimento: '2011-02-05'
      },
    }

    MEDICOS = {
      'medico@hospital.org' => {
        crm:     '1234567',
        usuario: 'medico@hospital.org',
        nome:    'Medico 1',
      }
    }

    MEDICAMENTOS = {
      "Dipirona" => {
        nome: "Dipirona",
        medicamento_frequencia: [
          { descricao: "A cada hora" },
          { descricao: "A cada 2 horas" },
          { descricao: "A cada 3 horas" },
          { descricao: "A cada 4 horas" },
          { descricao: "A cada 5 horas" },
          { descricao: "A cada 6 horas" },
        ],
        medicamento_via: [
          { descricao: 'Oral', abreviacao: 'oral' }
        ],
        medicamento_apresentacao: [
          { descricao: 'Comprimido', abreviacao: 'unid' }
        ]
      },
      "Omepazol" => {
        nome: "Omepazol",
        medicamento_frequencia: [
          { descricao: 'A cada hora' },
          { descricao: 'A cada 2 horas' },
          { descricao: 'A cada 3 horas' },
          { descricao: 'A cada 4 horas' },
          { descricao: 'A cada 5 horas' },
          { descricao: 'A cada 6 horas' },
          { descricao: 'Três vezes ao dia' },
          { descricao: 'Duas vezes ao dia' },
          { descricao: 'Uma dose diária' },
          { descricao: 'Dose única' },
          { descricao: 'Somente sob crise' }
        ],
        medicamento_via: [
          { descricao: 'Nasal', abreviacao: 'nasal' }
        ],
        medicamento_apresentacao: [
          { descricao: 'Ampola', abreviacao: 'unid' },
          { descricao: 'Frasco', abreviacao: 'unid' }
        ]
      }
    }
  end
end
