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
  * 