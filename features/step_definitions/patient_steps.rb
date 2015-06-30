Dado(/^(?:que )?o paciente "([^"]*)" está em atendimento na unidade "([^"]*)"$/) do |nome_paciente, nome_unidade|
  @paciente = Fixtures.paciente(nome_paciente)
  @unidade = Fixtures.unidade(nome_unidade)
  @atendimento = Fixtures.atribui_paciente_a_unidade(@paciente[:registro], @unidade[:codigo])
end

Quando(/^eu seleciono o paciente "([^"]*)" que está em atendimento na unidade "([^"]*)"$/) do |nome_paciente, nome_unidade|
  @paciente = Fixtures.paciente(nome_paciente)
  @unidade = Fixtures.unidade(nome_unidade)
  Fixtures.atribui_paciente_a_unidade(@paciente[:registro], @unidade[:codigo])

  visit '/'
  click_link nome_unidade
  click_link nome_paciente
end

Então(/^eu devo ver o CPF, sexo, data de nascimento e idade do paciente$/) do
  within '#paciente' do
    expect(page).to have_content("Sexo #{Helpers.formata_sexo(@paciente[:sexo])}")
    expect(page).to have_content("CPF #{Helpers.formata_cpf(@paciente[:cpf])}")
    expect(page).to have_content("Data de Nascimento #{Helpers.formata_date(@paciente[:data_nascimento])}")
    expect(page).to have_content("Idade #{Helpers.calcula_idade(@paciente[:data_nascimento])}")
  end
end
