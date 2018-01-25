# docker-master
  * Docker is not a mini VM it is a process
  * 
 
# Basic Commands 
  * docker container * - new way of play arround docker containers [ run, kill, inspect, logs, stats etc ]
  * docker container inspect --format '{{ .NetworkSettings.IPAddress }}' $CONTAINER_NAME - fetch the IP address from container information
  * Default docker network in Bridge
  * docker network * - Play arround docker network [ ls, inspect, create etc ]
  * Docker default network bridge has no inbuilt DNS server [ go for --link for linking containers ]. Newly created network has inbuilt DNS server
  * docker container run --net-alias $DNS_NAME - group containers by DNS name
