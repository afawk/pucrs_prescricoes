# language: pt
Funcionalidade: UC12 - Prescrever Alta
  Após finalizar o atendimento ao paciente, o médico deve ser capaz de prescrever
  a alta para o paciente.

  Cenário: TS12a - Prescrever alta com sucesso:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que o paciente possui uma prescrição em aberto com medicamentos prescritos
    Quando eu prescrevo a alta para o paciente
    Então eu devo ver as minhas observações para a alta do paciente

  Cenário: TS12b - Cancelar prescrição de alta durante processo de prescrição:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que o paciente possui uma prescrição em aberto com medicamentos prescritos
    Quando eu inicio o processo de precricao de alta para o paciente
    E cancelo a prescrição da alta
    Então o formulário de prescrição de alta deve ser escondido

  Cenário: TS12c - Prescrever alta com falha - descrição em branco:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que o paciente possui uma prescrição em aberto com medicamentos prescritos
    Quando eu tento prescrever alta sem informar a descrição
    Então eu devo ser informado de que a alta não pode ser prescrita
