# language: pt
Funcionalidade: UC01 - Login
  Para realizar qualquer ação no sistema, os médicos deverão realizar o login
  com credenciais válidas e o sistema deve restringir o acesso a usuários
  com credenciais inválidas.

  Cenário: TC01a - Realizar login com sucesso:
    Dado que eu estou registrado no sistema com o email "medico@hospital.org" e a senha "xpto-senha"
    Quando eu tento realizar o login com "medico@hospital.org" e "xpto-senha"
    Então eu devo ver a tela de seleção de unidades

  Cenário: TC01b - Realizar login com falha - usuário inválido:
    Dado que eu estou registrado no sistema com o email "medico@hospital.org" e a senha "xpto-senha"
    Quando eu tento realizar o login com "invalido@hospital.org" e "xpto-senha"
    Então eu devo ver o formulário de login com uma mensagem de erro

  Cenário: TC01c - Realizar login com falha - senha inválida:
    Dado que eu estou registrado no sistema com o email "medico@hospital.org" e a senha "xpto-senha"
    Quando eu tento realizar o login com "medico@hospital.org" e "senha-invalida"
    Então eu devo ver o formulário de login com uma mensagem de erro
