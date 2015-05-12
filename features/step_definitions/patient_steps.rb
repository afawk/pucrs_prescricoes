Dado(/^(?:que )?o paciente "([^"]*)" está em atendimento na unidade "([^"]*)"$/) do |nome_paciente, nome_unidade|
  unidade = PrescricoesDB[:unidade].select(:codigo).where(nome: nome_unidade).first
  cod_unidade = nil
  if unidade
    cod_unidade = unidade[:codigo]
  else
    PrescricoesDB[:unidade].insert(nome: nome_unidade)
    cod_unidade = PrescricoesDB[:unidade].select(:codigo).where(nome: nome_unidade).first[:codigo]
  end

  PrescricoesDB[:paciente].insert(nome: nome_paciente)
  registro = PrescricoesDB[:paciente].select(:registro).where(nome: nome_paciente).first[:registro]

  PrescricoesDB[:atendimento].insert(cod_paciente: registro, cod_unidade: cod_unidade)
end

Quando(/^eu seleciono o paciente "([^"]*)" que está em atendimento na unidade "([^"]*)"$/) do |nome_paciente, nome_unidade|
  unidade = PrescricoesDB[:unidade].select(:codigo).where(nome: nome_unidade).first
  cod_unidade = nil
  if unidade
    cod_unidade = unidade[:codigo]
  else
    PrescricoesDB[:unidade].insert(nome: nome_unidade)
    cod_unidade = PrescricoesDB[:unidade].select(:codigo).where(nome: nome_unidade).first[:codigo]
  end

  PrescricoesDB[:paciente].insert(nome: nome_paciente)
  registro = PrescricoesDB[:paciente].select(:registro).where(nome: nome_paciente).first[:registro]

  PrescricoesDB[:atendimento].insert(cod_paciente: registro, cod_unidade: cod_unidade)

  visit '/'
  click_link nome_unidade
  click_link nome_paciente
end
