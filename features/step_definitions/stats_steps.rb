Então(/^um acesso deve ser registrado$/) do
  expect(PrescricoesDB[:sessions].count).to eq(1)
end

Então(/^mais um acesso deve ser registrado$/) do
  expect(PrescricoesDB[:sessions].count).to eq(2)
end

Dado(/^3 acessos foram registrados para hoje$/) do
  3.times do |i|
    i += PrescricoesDB[:sessions].count + rand(9999)
    PrescricoesDB[:sessions].insert(id: "session-#{i}", created_at: Date.today, payload: '', last_activity: Time.now.to_i)
  end
end

Dado(/^2 acessos foram registrados a dois dias atras$/) do
  today = Date.today
  # FIXME: Isso vai quebrar na virada do mes
  two_days_ago = Date.new(today.year, today.month, today.day - 2)
  2.times do |i|
    i += PrescricoesDB[:sessions].count + rand(100)
    PrescricoesDB[:sessions].insert(id: "session-#{i}", created_at: two_days_ago, payload: '', last_activity: Time.now.to_i)
  end
end

Dado(/^2 acessos foram registrados no mes passado$/) do
  today = Date.today
  # FIXME: Isso vai quebrar no mes de janeiro
  last_month = Date.new(today.year, today.month - 1, today.day)
  2.times do |i|
    i += PrescricoesDB[:sessions].count + rand(10000)
    PrescricoesDB[:sessions].insert(id: "session-#{i}", created_at: last_month, payload: '', last_activity: Time.now.to_i)
  end
end

Quando(/^eu acesso o relatório de acessos$/) do
  visit '/sessions'
end

Então(/^eu devo ver 4 acessos contabilizados para hoje$/) do
  expect(page).to have_content('4 Acessos no dia')
end

Então(/^eu devo ver 6 acessos contabilizados para o mes atual$/) do
  expect(page).to have_content('6 Acessos no mês')
end

Então(/^eu devo ver 8 acessos contabilizados para o ano atual$/) do
  expect(page).to have_content('8 Acessos no ano')
end
