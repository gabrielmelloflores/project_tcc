<p>Instrussão de uso:</p>
Requisitos:
    PHP: 8.0^
    Node: 16^ 
    Composer: 2.4 
    Laravel: 9

Após download do código
    composer install -> irá criar a pasta vendor no projeto
    cp .env.example .env & php artisan key:generate -> Irá cria o .env (aonde você irá definir o banco de dados e o nome dele, assim como login e senha)
    npm install & npm run build 

Comandos especificos
    php artisan migrate --seed -> Cria as tabelas no banco e popula com dados ficticios
    php artisan serve -> Cria um servidor para acessar o site