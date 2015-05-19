Before do |_|
  PrescricoesDB[:medico].delete
  PrescricoesDB[:atendimento].delete
  PrescricoesDB[:paciente].delete
  PrescricoesDB[:unidade].delete
end
