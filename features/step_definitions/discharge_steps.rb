Quando(/^eu prescrevo a alta para o paciente$/) do
  @obs_alta = 'Paciente foi curado!!'

  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Indicar alta'
  fill_in 'descr_alta', with: @obs_alta
  click_button 'Salvar'
end

Então(/^eu devo ver as minhas observações para a alta do paciente$/) do
  expect(page).to have_content("Dado alta por \"#{@obs_alta}\"")
end

Quando(/^eu inicio o processo de precricao de alta para o paciente$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Indicar alta'
  fill_in 'descr_alta', with: 'Curado!!!'
end

Quando(/^cancelo a prescrição da alta$/) do
  expect(page).to have_content('Descreva a alta do paciente')
  click_button 'Cancelar'
end

Então(/^o formulário de prescrição de alta deve ser escondido$/) do
  expect(page).to_not have_content('Descreva a alta do paciente')
end

Quando(/^eu tento prescrever alta sem informar a descrição$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Indicar alta'
  click_button 'Salvar'
end

Então(/^eu devo ser informado de que a alta não pode ser prescrita$/) do
  expect(all('#descr_alta:invalid').size).to eq(1)
end
