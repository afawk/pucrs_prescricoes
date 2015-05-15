<?php

function idade($dataNascimento)
{
	return date_diff(date_create($dataNascimento), date_create('now'))->y;
}
