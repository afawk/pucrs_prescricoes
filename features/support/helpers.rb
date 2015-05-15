module Helpers
  class << self
    def formata_sexo(sexo)
      case sexo
      when 'M'
        'Masculino'
      when 'F'
        'Feminino'
      else
        raise 'Sexo desconhecido'
      end
    end

    def formata_cpf(cpf)
      cpf.to_s.gsub(/\A(\d{3})(\d{3})(\d{3})(\d{2})\Z/, "\\1.\\2.\\3-\\4")
    end

    def formata_date(data)
      data.strftime('%d/%m/%Y')
    end

    def calcula_idade(nascimento)
      age = Date.today.year - nascimento.year
      age -= 1 if Date.today < nascimento + age.years
      age
    end
  end
end
