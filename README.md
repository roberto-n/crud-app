# crud-app
 Back-end para plataforma de cadastro de cursos e alunos 


#Pré-Requisitos

* PHP >= 8 
* Laravel >= 8 
* MariaDB >=10 

#Como executar o projeto 


#clonar o repositorio
``` bash
git clone https://github.com/roberto-n/crud-app.git
```
#cria as configuraçoes 
*Crie o .env e copie o conteudo do .env.example e faça o update dos valores 

#instalar as dependencias
``` bash
composer install
```
#criar a base de dados
``` bash
php artisan migrate:fresh
```
#rodar o projeto
``` bash
php artisan serve
```
