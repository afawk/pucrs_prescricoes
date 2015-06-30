Dado(/^eu prescrevi 2 comprimidos de dipirona \(oral\) a cada hora para o paciente$/) do
  @prescricao = Fixtures.prescricao(@atendimento[:codigo], @medico[:crm])
  @medicamento = Fixtures.medicamento("Dipirona")
  Fixtures.prescreve_medicamentos(@prescricao[:codigo], [
    [2, 'Comprimido', @medicamento[:codigo], "Oral", "A cada hora"]
  ])
end

Quando(/^eu visualizo a prescrição em aberto$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Ver mais'
end

Então(/^eu devo ver o medicamento prescrito$/) do
  within '.panel-heading' do
    expect(page).to have_content("Prescrição do atendimento ##{@atendimento['codigo']}")
  end
  within '.panel-body' do
    expect(page).to have_content("Sob responsabilidade do doutor #{@medico['nome']}")
    expect(page).to have_content(@medicamento['nome'])
  end
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
