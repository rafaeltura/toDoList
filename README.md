## Instalação
- Pode clonar este repositório OU baixar o .zip

- Ao descompactar/clonar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

- Vá até a pasta do projeto, pelo *prompt/terminal* e execute o comando abaixo, com isso as dependências do projeto serão instaladas pelo composer (irá criar uma pasta denominada vendor):
> composer install

## Configuração
- Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

- As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

- É importante configurar corretamente a constante *BASE_DIR*:
> Linha 5: const BASE_DIR = '/**PastaDoProjeto**/public';
> Linha 11: const DB_PASS = '**Caso tenha configurado senha para acessar o BD**';

## Uso
- Você deve acessar a pasta *public* do projeto.

- O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Usuario extends Model {

}
```

## Banco de Dados
- Copiar arquivo toDo.sql e executá-lo via phpmyadmin.

## Extra
- Caso possuam algum problema em que apenas a 'home' é acessivel, ou seja, as demais páginas retornam 404, abrir o arquivo /etc/apache2/apache2.conf e em ``` <Directory /var/www/> ``` opção ``` AllowOverride ``` trocar para **All**, ficará:
```
<Directory /var/www/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```
- Após reiniciar o apache, pode executar pelo terminal:
> systemctl restart apache2

