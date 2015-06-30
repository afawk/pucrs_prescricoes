Before do |_|
  PrescricoesDB[:sessions].delete
  PrescricoesDB[:medico].delete
  PrescricoesDB[:atendimento].delete
  PrescricoesDB[:paciente].delete
  PrescricoesDB[:unidade].delete
  PrescricoesDB[:prescricao_item].delete
  PrescricoesDB[:prescricao].delete
  PrescricoesDB[:medicamento_apresentacao].delete
  PrescricoesDB[:medicamento_frequencia].delete
  PrescricoesDB[:medicamento_via].delete
  PrescricoesDB[:cadastro_via].delete
  PrescricoesDB[:cadastro_medicamentos].delete
  PrescricoesDB[:cadastro_apresentacao].delete
  PrescricoesDB[:cadastro_frequencia].delete
end
