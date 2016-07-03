##The step-by-step of RESTAPI deployment with NGINX and MONGODB

###First we need a container with both nginx and mongodb
After creating the image and making sure it starts both mongod and nginx daemons
we create a container with `seris/apiv1` image

`docker run -d -P --name apiv1 seris/apiv1`

We want to make sure everything is running

###nginx
First let's look at the port assigned to 80 in the docker engine (output depends on the execution):

`docker port apiv1`

27017/tcp -> 0.0.0.0:32777

28017/tcp -> 0.0.0.0:32776

443/tcp -> 0.0.0.0:32778

80/tcp -> 0.0.0.0:32779

And the ip address of the Engine (on MAC)

`docker-machine ip default`

192.168.99.100

On the browser: **http://192.168.99.100:32779**

if docker is running on ubuntu directly we need the ip address of the host:

`http://192.198.99.200:32779`

We should be getting NGINX welcome page

###Mongo
We will connect to the `mongod`from the client (on OSX. Use 192.168.99.200 on ubuntu VM)

`mongo --port 32777 --host 192.168.99.100`

MongoDB shell version: 3.2.7
connecting to: 192.168.99.100:32797/test

Successfully connected!!

If we execute a shell into the container: `docker exec -it apiv1 /bin/bash`

and do a `ps -ef`

we see the processess running:

```
UID        PID  PPID  C STIME TTY          TIME CMD
root         1     0  0 09:27 ?        00:00:00 /bin/bash /etc/onstartup.sh
root         5     1  0 09:27 ?        00:00:00 /bin/sh /etc/init.d/nginx start
root         7     1  0 09:27 ?        00:00:03 /usr/bin/mongod --smallfiles
root        33     5  0 09:27 ?        00:00:00 nginx: master process /usr/sbin/nginx
www-data    41    33  0 09:27 ?        00:00:00 nginx: worker process
root        44     1  0 09:27 ?        00:00:00 php-fpm: master process (/etc/php/7.0/fpm/php-fpm.conf)
www-data    45    44  0 09:27 ?        00:00:00 php-fpm: pool www
www-data    46    44  0 09:27 ?        00:00:00 php-fpm: pool www
root        54     0  0 09:36 ?        00:00:00 /bin/bash
root        62    54  0 09:36 ?        00:00:00 ps -ef
```


