module Helpers
  class << self
    def login(context, email, senha)
      context.visit '/'
      context.fill_in 'Usuário', with: email
      context.fill_in 'Senha',   with: senha
      context.click_button 'Acessar'
    end

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

    def hash_senha(senha)
      (@hash_senha ||= {})[senha] ||= generate_password(senha)
    end

    private

    # Ugly hack to generate password in a way that the framework expects
    def generate_password(pass)
      `echo 'Hash::make("#{pass}")' | ./artisan tinker --no-ansi -q | grep '=>'`
        .chomp
        .strip
        .gsub(/=> "([^"]+)"$/, '\\1')
    end
  end
end
