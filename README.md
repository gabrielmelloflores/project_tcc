<p>Instrussão de uso:</p><br><br>
<p>Requisitos:</p>
    <p>PHP: 8.0^</p>
    <p>Node: 16^</p> 
    <p>Composer: 2.4</p>
    <p>Laravel: 9</p>
<br><br>
<p>Após download do código</p>
    <p>composer install -> irá criar a pasta vendor no projeto</p>
    <p>cp .env.example .env & php artisan key:generate -> Irá cria o .env (onde deve ser definido o banco de dados e o nome dele, assim como login e senha)</p>
    <p>npm install & npm run build</p> 
<br><br>
<p>Comandos especificos</p>
    <p>php artisan migrate --seed -> Cria as tabelas no banco e popula com dados ficticios</p>
    <p>php artisan serve -> Cria um servidor para acessar o site</p>