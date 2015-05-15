# language: pt
Funcionalidade: UC03 - Selecionar Paciente
  Após realizar a seleção de uma unidade de atendimento, o médico devera
  selecionar o paciente que será atendido de modo a realizar prescrições.

  Cenário: TS03a - Selecionar paciente de uma unidade:
    Dado que eu estou logado no sistema
    Quando eu seleciono o paciente "João Silva" que está em atendimento na unidade "Pediatria"
    Então eu devo ver uma mensagem indicando que não existem prescrições cadastradas para o paciente
    E eu devo ver um link para criar uma nova prescrição para o paciente

  Cenário: TS03b - Selecionar paciente com prescrição em aberto:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E eu prescrevi um "Paracetamol" a cada 6 horas para "João Silva"
    Quando eu seleciono o paciente "João Silva" que está em atendimento na unidade "Pediatria"
    Então eu devo ver os dados da prescrição que está em aberto
