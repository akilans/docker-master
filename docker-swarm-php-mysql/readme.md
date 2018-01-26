# Docker service for php-mysql app

* Creatae Overlay network
    * docker network create php-mysql-network --driver overlay 

* Create PHP service
    * docker service create --name php-app \
    -p 80:80 \
    -e DB_HOST=mysql-db \
    -e DB_USER=root \
    -e DB_PWD=akilan@123 \
    -e DB_NAME=employee \
    --network php-mysql-network \
    akilan/php-employee:1


* Create Mysql Service
    * docker service create --name mysql-db \
    -e MYSQL_ROOT_PASSWORD=akilan@123 \
    --mount type=volume,src=db_volume,dst=/var/lib/mysql \
    --network php-mysql-network \
    akilan/mysql-employee:1

* Create adminer - web based sql client
    * docker service create --name adminer \
    -p 8080:8080 \
    --network php-mysql-network \
    adminer