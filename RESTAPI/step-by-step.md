After creating the image and making sure it starts both mongod and nginx daemos
we create a container with `seris/docker` image

`docker run -d -P --name db seris/docker`
