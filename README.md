# docker-master
  * Docker is not a mini VM it is a process
 
# Basic Commands 
  * docker container * - new way of play arround docker containers [ run, kill, inspect, logs, stats etc ]
  * docker container inspect --format '{{ .NetworkSettings.IPAddress }}' $CONTAINER_NAME - fetch the IP address from container information
  * Default docker network in Bridge
  * docker network * - Play arround docker network [ ls, inspect, create etc ]
  * Docker default network bridge has no inbuilt DNS server [ go for --link for linking containers ]. Newly created network has inbuilt DNS server
  * docker container run --net-alias $DNS_NAME - group containers by DNS name
  * Docker build process each line in the docker file & creates layer stores that in build cache. So next time if there is no changes in the dockerfile then it will use the build cache. If there is any changes in the dockerfile it will start build it again. So keep the command which u won't change much at top & keep the command which u change most of the time at bottom
