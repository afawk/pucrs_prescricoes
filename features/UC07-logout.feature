# language: pt
Funcionalidade: UC07 - Logout
  De forma a liberar uma estação de trabalho para outros usuários, deve ser
  disponibilizado um link para sair do sistema.

  Cenário: TS07a - Realizar logout do sistema
    Dado que eu estou logado no sistema
    Quando eu realizo o logout
    Então eu devo ver o formulário de login
