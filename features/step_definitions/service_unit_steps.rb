Então(/^eu devo ver a tela de seleção de unidades$/) do
  expect(page).to have_content('Selecione uma unidade para iniciar o atendimento')
  expect(page).to have_selector('ul#unidades')
end

Quando(/^eu seleciono a unidade "([^"]*)"$/) do |unidade|
  visit '/'
  click_link unidade
end

Então(/^eu devo ver "([^"]*)" na lista de pacientes$/) do |paciente|
  within 'ul#pacientes' do
    expect(page).to have_link(paciente)
  end
end

Dado(/^a unidade "([^"]*)" não possui pacientes$/) do |nome_unidade|
  PrescricoesDB[:unidade].insert(nome: nome_unidade)
end

Dado(/^eu selecionei a unidade "([^"]*)"$/) do |nome_unidade|
  visit '/'
  click_link nome_unidade
end

Quando(/^altero a unidade para "([^"]*)"$/) do |nome_unidade|
  visit '/'
  click_link nome_unidade
end
