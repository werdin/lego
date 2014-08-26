Lego 
========================
Installation
1. git clone https://github.com/werdin/lego.git .2. 
2. chmod 777 app/cache/ app/logs web/uploads3. 
3. composer install4. 
4. app/console doctrine:database:create5. 
5. app/console doctrine:schema:update  --force6. 
6. app/console doctrine:fixtures:load
