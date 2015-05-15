# language: pt
Funcionalidade: UC02 - Selecionar Unidade
  De modo a realizar prescrições para pacientes, o médico deverá selecionar a
  o local onde o paciente se encontra na instituição de saúde (unidade de
  atendimento).

  Cenário: TS02a - Selecionar unidade que possui pacientes
    Dado que eu estou logado no sistema
    E o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E o paciente "Fulano de Tal" está em atendimento na unidade "Pediatria"
    Quando eu seleciono a unidade "Pediatria"
    Então eu devo ver "João Silva" na lista de pacientes
    E eu devo ver "Fulano de Tal" na lista de pacientes

  Cenário: TS02b - Selecionar unidade que não possui pacientes
    Dado que eu estou logado no sistema
    E a unidade "Recuperação" não possui pacientes
    Quando eu seleciono a unidade "Recuperação"
    Então eu devo ver uma mensagem informando que não existem pacientes em atendimento

  Cenário: TS02c - Alterar unidade selecionada
    Dado que eu estou logado no sistema
    E a unidade "Recuperação" não possui pacientes
    E o paciente "Fulano de Tal" está em atendimento na unidade "Pediatria"
    E eu selecionei a unidade "Recuperação"
    Quando altero a unidade para "Pediatria"
    Então eu devo ver "Fulano de Tal" na lista de pacientes
