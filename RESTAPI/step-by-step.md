##The step-by-step of RESTAPI deployment with NGINX and MONGODB
###Let's run the container
After creating the image and making sure it starts both mongod and nginx daemons
we create a container with `seris/docker` image

`docker run -d -P --name db seris/docker`

We want to make sure everything is running

###nginx
First let's look at the port assigned to 80 in the docker engine:

`docker port db`

27017/tcp -> 0.0.0.0:32777

28017/tcp -> 0.0.0.0:32776

443/tcp -> 0.0.0.0:32778

80/tcp -> 0.0.0.0:32779

And the ip address of the Engine

`docker-machine ip default`

192.168.99.100

On the browser: **http://192.168.99.100:32779**

We should be getting NGINX welcome page

###Mongo
We will connect to the `mongod`from the client (on OSX)

`mongo --port 32777 --host 192.168.99.100`

MongoDB shell version: 3.2.7
connecting to: 192.168.99.100:32797/test

Successfully connected!!

If we execute a shell into the container: `docker exec -it db /bin/bash`

and do a `ps -ef`

we see the processess running:


