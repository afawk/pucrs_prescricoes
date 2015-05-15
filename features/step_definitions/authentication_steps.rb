Dado(/^que eu estou registrado no sistema com o email "([^"]*)" e a senha "([^"]*)"$/) do |arg1, arg2|
  puts '[WARNING] Login ainda não foi implementado'
end

Quando(/^eu (?:tento realizar|realizo) login com "([^"]*)" e "([^"]*)"$/) do |arg1, arg2|
  puts '[WARNING] Login ainda não foi implementado'
end

Então(/^eu devo ver o formulário de login com uma mensagem de erro$/) do
  expect(page).to have_content('Usuário e / ou senha inválido')
  expect(page).to have_css('form#login')
end

Dado(/^que eu estou logado no sistema$/) do
  puts '[WARNING] Login ainda não foi implementado'
end
