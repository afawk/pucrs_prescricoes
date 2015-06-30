# language: pt
Funcionalidade: UC14 - Quantidade de Acessos
  Cenário: TS14a - Registro de acessos ao sistema:
    Dado que eu estou registrado no sistema com o email "medico@hospital.org" e a senha "xpto-senha"
    Quando eu realizo login com "medico@hospital.org" e "xpto-senha"
    Então um acesso deve ser registrado
    Quando eu realizo o logout
    E eu realizo login com "medico@hospital.org" e "xpto-senha"
    Então mais um acesso deve ser registrado

  Cenário: TS14b - Relatório de acessos ao sistema:
    Dado que eu estou logado no sistema
    E 3 acessos foram registrados para hoje
    E 2 acessos foram registrados a dois dias atras
    E 2 acessos foram registrados no mes passado
    Quando eu acesso o relatório de acessos
    Então eu devo ver 8 acessos contabilizados para o ano atual
    E eu devo ver 6 acessos contabilizados para o mes atual
    E eu devo ver 4 acessos contabilizados para hoje
