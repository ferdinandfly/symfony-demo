# Makefile

# Define variables
IMAGE_NAME = mydockerimage
CONTAINER_NAME = mydockercontainer

# Define default target
.DEFAULT_GOAL := help

# Run the Docker container
start:
	docker-compose up -d

# Stop the Docker container
stop:
	docker-compose down

logs:
	docker-compose logs

# Remove the Docker container and image
clean: stop
	docker rm $(CONTAINER_NAME)
	docker rmi $(IMAGE_NAME)

bin-db:
	docker exec -it mysql8-container /bin/bash

bin-php:
	docker exec -it php74-container /bin/bash
# .PHONY: Ensure that these targets are not treated as files
.PHONY: help build run stop clean
