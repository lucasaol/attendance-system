# Attendance System


## Execução
Através do docker:
O comando ```docker compose up -d``` inicia o básico do ambiente containerizado, com o banco de dados MySQL e aplicação web Laravel.

Para executar as migrations: ``` docker compose exec app php artisan migrate:fresh --seed```
O comando irá rodar as migrations e já popular o banco de dados com alguns registros de teste.
