# Docker service for php-mysql app

* Creatae Overlay network
    * docker network create php-mysql-network --driver overlay 
    
* Create PHP service
    * docker service create --name php-app \
    -p 80:80 \
    -e DB_HOST=mysql-db,DB_USER=root,DB_PWD=akilan@123,DB_NAME=employee \
    --network php-mysql-network \
    akilan/php-employee:1

* Create Mysql Service
    * docker service create --name mysql-db \
    -e MYSQL_ROOT_PASSWORD=akilan@123 \
    --mount type=volume,src=db_volume,dst=/var/lib/mysql \
    --network php-mysql-network \
    akilan/mysql-employee:1
