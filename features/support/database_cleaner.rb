Before do |scenario|
  PrescricoesDB[:paciente].delete
  PrescricoesDB[:unidade].delete
  PrescricoesDB[:atendimento].delete
end
