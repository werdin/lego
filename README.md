Lego 
========================
Installation
* git clone https://github.com/werdin/lego.git 
* chmod 777 app/cache/ app/logs web/uploads
* composer install
* app/console doctrine:database:create
* app/console doctrine:schema:update  --force
* app/console doctrine:fixtures:load
