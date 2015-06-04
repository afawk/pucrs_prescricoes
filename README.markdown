# Prescrições Médicas - PUCRS

https://github.com/andersonfraga/prescricoes_pucrs

Sistema para gerenciamento de prescrições médicas desenvolvido como parte do curso
de Desenvolvimento de Sistemas 2015.1 da PUCRS

## Dependências

Aplicação:

- [PostgreSQL](http://www.postgresql.org/)
- [PHP](http://php.net/) 5.6+
- [Composer](https://getcomposer.org/)
- [nodejs](https://nodejs.org/) e [npm](https://www.npmjs.com/) (necessários apenas para a compilação de código javascript e CSS)

Testes funcionais:

- [Ruby](https://www.ruby-lang.org/) 2.2+
- [Bundler](http://bundler.io/)
- [PhantomJS](http://phantomjs.org/)

## Setup inicial

1. Criar o banco de dados `prescricoes_medicas` e `prescricoes_medicas-unit` no PostgreSQL
2. Rodar `composer install`
3. Rodar `php artisan migrate`
4. Rodar `php artisan db:seed`

## Iniciar servidor de desenvolvimento

```sh
php artisan serve --port 8080 --host 0.0.0.0
```

## Compilação de JS / CSS durante desenvolvimento

```sh
npm install
gulp --watch
```

## Scripts de deploy

_NOTA_: Os scripts funcionam apenas a partir de uma máquina Linux

### Homologação

```sh
# Necessário apenas a primeira vez
git config --add prescricoes.homolog NOME_DA_APP_DO_HEROKU

./deploy-to-homolog
```

### Produção


```sh
# Necessário apenas a primeira vez
git config --add prescricoes.prod NOME_DA_APP_DO_HEROKU

./deploy-to-prod
```

## Execução de testes funcionais

_NOTA_: Os testes funcionam apenas a partir de uma máquina Linux

Setup inicial:

```sh
cd projeto
gem install bundler
bundle install
```

### Utilizando servidor local

Setup e inicialização do servidor de testes:

```sh
export DATABASE_URL='postgres://postgres:postges@localhost:5432/prescricoes_medicas-features'
php artisan migrate --force
php artisan serve --port 8081 --host 0.0.0.0
```

Execução dos testes utilizando cucumber:

```sh
bundle exec cucumber
```

### Execução de testes funcionais utilizando servidor de testes remoto

```sh
HEROKU_APP_NAME='nome-da-app-heroku' bundle exec cucumber
```
