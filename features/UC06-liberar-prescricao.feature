# language: pt
Funcionalidade: UC06 - Liberar Prescrição
  Após finalizar o preenchimento da prescrição, o médico deverar liberar a
  prescrição para utilização.

  Cenário: TS06a - Liberar prescrição que possui itens associados:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que o paciente possui uma prescrição em aberto com medicamentos prescritos
    Quando eu libero a prescrição em aberto
    Então o sistema deve alterar o status da prescrição

  Cenário: TS06b - Tentar liberar prescrição que não possui itens associados:
    Dado que eu estou logado no sistema
    E que o paciente "João Silva" está em atendimento na unidade "Pediatria"
    E que o paciente possui uma prescrição em aberto sem medicamentos prescritos
    Quando eu tento liberar a prescrição
    Então o sistema deve bloquear a liberação da prescrição
