<?php

function idade($dataNascimento)
{
	return date_diff(date_create($dataNascimento), date_create('now'))->y;
}

function sexo($sexo)
{
	if ($sexo == 'M')
		return 'Masculino';
	else
		return 'Feminino';
}

function cpf($cpf)
{
	return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '${1}.${2}.${3}-${4}', $cpf);
}
