# language: pt
Funcionalidade: UC04 - Prescrever Medicamentos
  Após realizar a seleção de um paciente que está em atendimento, deve ser possivel
  criar uma nova prescrição e adicionar novos medicamentos a ela.

  Cenário: TC04a - Prescrever um medicamento com sucesso:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    Quando eu inicio uma nova prescrição
    E prescrevo 1 comprimido de dipirona (oral) a cada 6 horas
    E prescrevo 2 ampolas de omepazol (nasal) a cada duas vezes ao dia
    E eu salvo a prescrição
    Então eu devo ver os medicamentos prescritos

  Cenário: TC04b - Parametrização de medicamentos:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que eu iniciei uma nova prescrição
    E que eu pesquisei pelo medicamento "Dipirona"
    Quando eu pesquiso pelo medicamento "Omepazol"
    Então eu devo ver os novos parametros para a prescrição do medicamento

  Cenário: TC04c - Prescrever um medicamento com falha - via não informada:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que eu iniciei uma nova prescrição
    Quando eu tento prescrever dipirona sem informar a via
    Então eu devo ser informado de que o medicamento não pode ser prescrito

  Cenário: TC04d - Prescrever um medicamento com falha - quantidade não informada:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que eu iniciei uma nova prescrição
    Quando eu tento prescrever dipirona sem informar a quantidade
    Então eu devo ser informado de que o medicamento não pode ser prescrito

  Cenário: TC04e - Prescrever um medicamento com falha - frequência não informada:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que eu iniciei uma nova prescrição
    Quando eu tento prescrever dipirona sem informar a frequencia
    Então eu devo ser informado de que o medicamento não pode ser prescrito

  Cenário: TC04f - Cancelar prescrição de medicamento durante processo de prescrição:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que eu iniciei uma nova prescrição
    Quando eu preencho os campos para a prescrição de dipirona
    E cancelo a prescrição do medicamento
    Então o formulário de prescrição do medicamento deve ser escondido
