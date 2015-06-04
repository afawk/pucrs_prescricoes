Dado(/^que eu estou registrado no sistema com o email "([^"]*)" e a senha "([^"]*)"$/) do |email, senha|
  Fixtures.medico(email, senha)
end

Quando(/^eu (?:tento realizar|realizo) login com "([^"]*)" e "([^"]*)"$/) do |email, senha|
  Helpers.login(self, email, senha)
end

Então(/^eu devo ver o formulário de login com uma mensagem de erro$/) do
  step("eu devo ver o formulário de login")
  expect(page).to have_content('Usuário e / ou senha inválido')
end

Dado(/^que eu estou logado no sistema$/) do
  Fixtures.medico('medico@hospital.org', 'password')
  Helpers.login(self, 'medico@hospital.org', 'password')
end

Quando(/^eu realizo o logout$/) do
  visit '/'
  within '.navbar' do
    click_link 'Sair'
  end
end

Então(/^eu devo ver o formulário de login$/) do
  expect(page).to have_css('form#login')
end
