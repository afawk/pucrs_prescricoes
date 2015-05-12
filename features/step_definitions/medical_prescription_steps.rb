Dado(/^(?:que )?eu prescrevi um "([^"]*)" a cada (\d+) horas para "([^"]*)"$/) do |arg1, arg2, arg3|
  pending # Write code here that turns the phrase above into concrete actions
end

Então(/^eu devo ver os dados da prescrição que está em aberto$/) do
  pending # Write code here that turns the phrase above into concrete actions
end

Então(/^eu devo ver um link para criar uma nova prescrição para o paciente$/) do
  expect(page).to have_link('Criar Prescrição')
end

Então(/^eu devo ver uma mensagem indicando que não existem prescrições cadastradas para o paciente$/) do
  expect(page).to have_content('Este paciente não possui nenhuma prescrição cadastrada')
end

Então(/^eu devo ver uma mensagem informando que não existem pacientes em atendimento$/) do
  expect(page).to have_content('Esta unidade não possui pacientes em atendimento')
end
