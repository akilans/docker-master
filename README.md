# docker-master
  * Docker is not a mini VM it is a process
 
# Basics

  * docker container * - new way of play arround docker containers [ run, kill, inspect, logs, stats etc ]
  * docker container inspect --format '{{ .NetworkSettings.IPAddress }}' $CONTAINER_NAME - fetch the IP address from container information
  * Default docker network in Bridge
  * docker network * - Play arround docker network [ ls, inspect, create etc ]
  * Docker default network bridge has no inbuilt DNS server [ go for --link for linking containers ]. Newly created network has inbuilt DNS server
  * docker container run --net-alias $DNS_NAME - group containers by DNS name
  * Docker build process each line in the docker file & creates layer stores that in build cache. So next time if there is no changes in the dockerfile then it will use the build cache. If there is any changes in the dockerfile it will start build it again. So keep the command which u won't change much at top & keep the command which u change most of the time at bottom

# Docker Swarm

  * Docker manager node has local database called RAFT database to store cluster information
  * Manager 
    * API - Get request to create service from client through cli
    * Orchestrator - Loops for service objects to create all tasks
    * Allocator - Allocates IP address for each tasks
    * Scheduler - Assign nodes for tasks
    * Dispatcher - Checks on Workers

  * Workers
    * Connect to dispacther to check on assigned tasks
    * Executes tasks assigned

  * docker swarm init -Initiate docker swarm cluster
    * Root sigining certificate for swarm cluster
    * Certificate issued for first manager node
    * Creates token for workes to join
    * Creates Raft DB to store certificate , Secret, config etc. All data encrypted
  
  * docker service create --name web-app -p 80:80 httpd - create a service with name & exposing port
  * docker service ls - lists all the service
  * docker service ps $SERVICE_NAME - lists all the containers under the service
  * docker service update web-app --replicas 3 - Update service by increasing no of replicas
  * docker stack - production grade compose YAML file
  * docker secret - To deal with secret information inside swarm cluster
  * Docker swarm has built in secret service but in docker-compose is possible via mounting secrent as a plain text
  * docker-compose is only for development & testing not for production. Same compose file can be used for stack deploy & docker-compose [ docker-compose ignores "deploy" & stack ignores "build" ]
  * echo "akilan@321" | docker secret create mysql-pwd -create docker secret
  * docker service update --secret-rm="my_secret_data" $SERVICE_NAME -delete secret from service
  * docker-compose works only with file based secret
  * docker-compose - Read more about docker-compose.override.yaml, docker-compose.yaml & docker-compose config - CI/CD better solution 
  * docker service update --force $SERVICE_NAME - when u add new nodes to swarm run this command to place containers to that new nodes. Cluster will become balanced
  * healthcheck command is intresting - --health-cmd="pg_ispready -U postgres || exit 1" 

# Docker Repo
  * docker hub
  * docker store - buy docker certified images from docker store
  * docker cloud - web based swarm manager - build images from repository, run containers, add or remove node from AWS, AZURE, GCP etc
  * docker private repo - download github.com/docker/distribution. Configure TSL/SSL so that docker pull/push image to that registry
  * docker tag $IP_ADDRESS:$PORT/php-employee akilan/php-employee
  * docker push $IP_ADDRESS:$PORT/php-employee 

# Clean up
  * docker system df - shows how much image, volumes occupies the space
  * docker volume, image prune - clean up each separately
  * docker system prune - cleans volume, image all at once

Talk:

  https://www.youtube.com/watch?v=ZdUcKtg84T8
  https://dockercon.docker.com/watch/WdAeLaLuSCNQwEp61YVXUt
  https://www.youtube.com/watch?v=Qsv-q8WbIZY