Lego
========================
Installation
1. git clone https://github.com/werdin/lego.git .
2. chmod 777 app/cache/ app/logs web/uploads
3. composer install
4. app/console doctrine:database:create
5. app/console doctrine:schema:update  --force
6. app/console doctrine:fixtures:load