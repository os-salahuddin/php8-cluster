## docker-compose.yml file, used to define and manage multi-container Docker applications
## Version
version: '3.7'
This specifies the version of the Docker Compose file format you are using. 
Version 3.7 is compatible with Docker Engine 19.03.0 and above.

## Services
The services section defines the different containers that will be created. 
In this case, there is only one service called app.

## image: php8_ready
Image: This specifies the Docker image to use for this service. 
In this case, it will use an image called php8_ready. If this image is not found locally, 
Docker will attempt to pull it from Docker Hub or the configured image repository.

## container_name: php8_ready
Container Name: This sets a custom name for the container that will be created from this service. 

## restart: unless-stopped
Restart Policy: This defines the restart policy for the container. unless-stopped means the container 
will automatically restart unless it has been manually stopped.

## hostname: php8_ready
Hostname: This sets the hostname of the container to php8_ready. This can be useful for network 
communication between containers.

## build:
context: .
dockerfile: Dockerfile
Build Configuration:
context: The . indicates that the build context is the current directory where the docker-compose.yml 
file is located.
dockerfile: Specifies the Dockerfile to use for building the image. Here, it's named Dockerfile.

## ports:
- 8484:80
Ports: This maps port 80 inside the container to port 8484 on the host machine. 
This allows you to access the application running in the container by navigating 
to http://localhost:8484 in your web browser.

## networks:
- network
Networks: This specifies the networks the service is connected to. In this case, 
it connects to a network named network, which is defined later in the file.
  
## volumes:
- ./:/app
Volumes: This mounts the current directory (./) on the host machine to the /app directory inside the container.
This means that any changes made to the files in the host directory will be reflected inside 
the container, allowing for live updates during development.

## Networks
networks:
network:
driver: bridge
Networks Definition: This section defines the custom network that the service will use.
network: The name of the network.
driver: The network driver to use. The bridge driver creates a private internal network on the host, 
allowing containers to communicate with each other.
  

In summary, this docker-compose.yml file sets up a Docker environment 
for a PHP 8 application using an Apache server. 
It defines how the container is built, how it interacts with the host machine, 
and how it connects to other services. 
The use of volumes and restart policies makes it suitable for development, while the specified 
ports allow easy access to the application.