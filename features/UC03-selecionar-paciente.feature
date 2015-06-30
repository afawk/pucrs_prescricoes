# language: pt
Funcionalidade: UC03 - Selecionar Paciente
  Após realizar a seleção de uma unidade de atendimento, o médico devera
  selecionar o paciente que será atendido de modo a realizar prescrições.

  Cenário: TS03a - Selecionar paciente de uma unidade:
    Dado que eu estou logado no sistema
    Quando eu seleciono o paciente "João Silva" que está em atendimento na unidade "Pediatria"
    Então eu devo ver uma mensagem indicando que não existem prescrições cadastradas para o paciente
    E eu devo ver um link para criar uma nova prescrição para o paciente
    E eu devo ver o CPF, sexo, data de nascimento e idade do paciente

  Cenário: TS03b - Selecionar paciente com prescrição em aberto:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E eu prescrevi 2 comprimidos de dipirona (oral) a cada hora para o paciente
    Quando eu visualizo a prescrição em aberto
    Então eu devo ver o medicamento prescrito
