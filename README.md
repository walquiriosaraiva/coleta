<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Informações Laravel

Aplicação desenvolvida com Laravel + MySQL utilizando docker:

- [Documentação Laravel](https://laravel.com/docs/8.x).
- Utilizando como base de dados banco de dados MySQL (https://dev.mysql.com/doc/).

# Passo 1 - Informações sobre a aplicação
- Clone do projeto pelo link [Github](https://github.com/walquiriosaraiva/desafio.git)
- Copie o conteúdo do arquivo .env.example para .env utilizando o comando `cp .env.example .env`
## Passo 2 - docker-compose
- Execute o comando `docker-compose up -d --build desafio`
- Com o comando acima será feito a build do projeto desafio e agora estamos quase lá

## Passo 3 - rodando os container adicionais para manipular comandos Composer e Artisan
- Execute o comando do composer update `docker-compose run --rm composer update`
- Execute o comando `docker-compose run --rm artisan migrate --seed`
- Agora acesse a aplicação na url [http://localhost](http://localhost), vai aparecer a tela principal do Laravel com dois links de acesso no menu superior.
- Clique em acessar e o campo de usuário e senha já está preenchido com o usuário criado pelos migrations seeds
- E-mail: `walquiriosaraiva@gmail.com`
- senha: `Esqueci01`
- Caso queria se cadastrar vá para o link Cadastrar e faça seu cadastro para ter acesso.

# Problemas de permissão
## Caso tenha problema de permissão e não consiga rodar com o docker tente novamente seguindo os comandos abaixo
- Derrube o ambiente de desafio - `docker-compose down`
- Reconstrua os contêiners - `docker-compose build --no-cache`

## Caso queira executar fora do Docker basta seguir os passos abaixo
# Lembrando que para executar localmente você precisa ter o PHP Instalado de preferência na versão 8.0 e o banco de dados MySQL

# Passo 1
- Clone do projeto pelo link [Github](https://github.com/walquiriosaraiva/desafio.git)

# Passo 2
- Cria uma cópia do arquivo .env.example para .env e altere as informações referente ao banco de dados conforme seu banco mysql local

# Passo 3
- Execute o comando `composer install`

# Passo 4
- Execute o comando `php artisan migrate --seed` assim será realizado as migrations e inseridos os dados de teste para a aplicação

# Passo 5
- E por último execute o comando `php artisan serve`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
