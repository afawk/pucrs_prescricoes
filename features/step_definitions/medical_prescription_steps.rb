Quando(/^eu inicio uma nova prescrição$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Criar Prescrição'

  # HACK: Should have a better way to set things up
  Fixtures.medicamento("Dipirona")
  Fixtures.medicamento("Omepazol")
  @medicamentos = []
end

Dado(/^que eu iniciei uma nova prescrição$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Criar Prescrição'

  # HACK: Should have a better way to set things up
  Fixtures.medicamento("Dipirona")
  Fixtures.medicamento("Omepazol")
  @medicamentos = []
end

Quando(/^prescrevo 1 comprimido de dipirona \(oral\) a cada 6 horas$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  select 'Comprimido', from: 'Apresentação'
  select 'A cada 6 horas', from: 'Frequência'
  select 'Oral', from: 'Via'
  fill_in 'Quantidade', with: '1'
  click_button 'Adicionar'

  @medicamentos << 'Dipirona'
  expect(all('#selectedList p').size).to eq(@medicamentos.size)
end

Quando(/^eu tento prescrever dipirona sem informar a via$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  select 'Comprimido', from: 'Apresentação'
  select 'A cada 6 horas', from: 'Frequência'
  # select 'Oral', from: 'Via'
  fill_in 'Quantidade', with: '1'
  click_button 'Adicionar'
end

Quando(/^eu tento prescrever dipirona sem informar a quantidade$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  select 'Comprimido', from: 'Apresentação'
  select 'A cada 6 horas', from: 'Frequência'
  select 'Oral', from: 'Via'
  # fill_in 'Quantidade', with: '1'
  click_button 'Adicionar'
end

Quando(/^eu tento prescrever dipirona sem informar a frequencia$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  select 'Comprimido', from: 'Apresentação'
  # select 'A cada 6 horas', from: 'Frequência'
  select 'Oral', from: 'Via'
  fill_in 'Quantidade', with: '1'
  click_button 'Adicionar'
end

Quando(/^eu preencho os campos para a prescrição de dipirona$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  select 'Comprimido', from: 'Apresentação'
  select 'A cada 6 horas', from: 'Frequência'
  select 'Oral', from: 'Via'
  fill_in 'Quantidade', with: '1'
end

Quando(/^prescrevo 2 ampolas de omepazol \(nasal\) a cada duas vezes ao dia$/) do
  sleep 0.3 # HACK
  fill_in 'Medicamento', with: 'Omepazol'
  find('a[data-search="medicamento"]').click

  select 'Ampola', from: 'Apresentação'
  select 'Duas vezes ao dia', from: 'Frequência'
  select 'Nasal', from: 'Via'
  fill_in 'Quantidade', with: '2'
  click_button 'Adicionar'

  @medicamentos << 'Omepazol'
  expect(all('#selectedList p').size).to eq(@medicamentos.size)
end

Quando(/^cancelo a prescrição do medicamento$/) do
  expect(page).to have_selector('#medicamento_form', visible: true)
  click_link 'Cancelar'
end

Então(/^o formulário de prescrição do medicamento deve ser escondido$/) do
  expect(page).to have_selector('#medicamento_form', visible: false)
end

Dado(/^eu prescrevi 2 comprimidos de dipirona \(oral\) a cada hora para o paciente$/) do
  @prescricao = Fixtures.prescricao(@atendimento[:codigo], @medico[:crm])
  @medicamento = Fixtures.medicamento("Dipirona")
  Fixtures.prescreve_medicamentos(@prescricao[:codigo], [
    [2, 'Comprimido', @medicamento[:codigo], "Oral", "A cada hora"]
  ])
end

Dado(/^que eu pesquisei pelo medicamento "Dipirona"$/) do
  sleep 0.5 # HACK
  fill_in 'Medicamento', with: 'Dipirona'
  find('a[data-search="medicamento"]').click

  @params_medicamento = {
    apresentacoes: all('#apresentacao_medicamento option').map(&:text),
    frequencias:   all('#frequencia_medicamento option').map(&:text),
    vias:          all('#via_medicamento option').map(&:text)
  }
end

Quando(/^eu pesquiso pelo medicamento "Omepazol"$/) do
  fill_in 'Medicamento', with: 'Omepazol'
  find('a[data-search="medicamento"]').click
end

Então(/^eu devo ver os novos parametros para a prescrição do medicamento$/) do
  sleep 0.5 # HACK
  novo_params_medicamento = {
    apresentacoes: all('#apresentacao_medicamento option').map(&:text),
    frequencias:   all('#frequencia_medicamento option').map(&:text),
    vias:          all('#via_medicamento option').map(&:text)
  }

  expect(novo_params_medicamento).to_not eq(@params_medicamento)
end

Então(/^eu devo ser informado de que o medicamento não pode ser prescrito$/) do
  expect(all('select:invalid, input[type=text]:invalid').size).to eq(1)
end

Quando(/^eu salvo a prescrição$/) do
  within '#form-prescricao' do
    click_button 'Salvar'
  end
end

Quando(/^eu visualizo a prescrição em aberto$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Ver mais'
end

Então(/^eu devo ver o medicamento prescrito$/) do
  sleep 0.5
  within '.panel-heading' do
    expect(page).to have_content("Prescrição do atendimento ##{@atendimento['codigo']}")
  end
  within '.panel-body' do
    expect(page).to have_content("Sob responsabilidade do doutor #{@medico['nome']}")
    expect(page).to have_content(@medicamento['nome'])
  end
end

Então(/^eu devo ver os medicamentos prescritos$/) do
  sleep 0.5
  within '.panel-heading' do
    expect(page).to have_content("Prescrição do atendimento ##{@atendimento['codigo']}")
  end
  within '.panel-body' do
    expect(page).to have_content("Sob responsabilidade do doutor #{@medico['nome']}")
    @medicamentos.each do |medicamento|
      expect(page).to have_content(medicamento)
    end
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

Dado(/^que o paciente possui uma prescrição em aberto com medicamentos prescritos$/) do
  @prescricao = Fixtures.prescricao(@atendimento[:codigo], @medico[:crm])
  @medicamento = Fixtures.medicamento("Dipirona")
  Fixtures.prescreve_medicamentos(@prescricao[:codigo], [
    [2, 'Comprimido', @medicamento[:codigo], "Oral", "A cada hora"]
  ])
end

Quando(/^eu libero a prescrição em aberto$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Ver mais'
  click_link 'Liberar prescrição'
end

Então(/^o sistema deve alterar o status da prescrição$/) do
  expect(page).to have_content('Prescrição médica liberada')
end

Dado(/^que o paciente possui uma prescrição em aberto sem medicamentos prescritos$/) do
  @prescricao = Fixtures.prescricao(@atendimento[:codigo], @medico[:crm])
end

Quando(/^eu tento liberar a prescrição$/) do
  visit '/'
  click_link @unidade[:nome]
  click_link @paciente[:nome]
  click_link 'Ver mais'
end

Então(/^o sistema deve bloquear a liberação da prescrição$/) do
  expect(find_link('Liberar prescrição')[:href]).to match(/\#$/)
  expect(find_link('Liberar prescrição')[:onclick]).to_not be nil
end
