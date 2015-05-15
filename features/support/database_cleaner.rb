Before do |_|
  PrescricoesDB[:atendimento].delete
  PrescricoesDB[:paciente].delete
  PrescricoesDB[:unidade].delete
end
