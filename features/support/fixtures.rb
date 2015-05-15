module Fixtures
  class << self
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
      if ! PrescricoesDB[:atendimento].where(cod_paciente: cod_paciente, cod_unidade: cod_unidade).first
        PrescricoesDB[:atendimento].insert(cod_paciente: cod_paciente, cod_unidade: cod_unidade)
      end
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
  end
end
