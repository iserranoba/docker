## Creating the REST API

Now that we have the v1 up and running we need to do more modifications in ordert for Nginx to forward to php the api requests
php will be responsible to implement the logic for the http requests
we will do a very simple API implementation and will leave the interaction with Mondo DB for later.

*The following based on: http://stackoverflow.com/questions/28094865/nginx-configuration-for-a-restful-api*

We want Nginx to redirect all /api/v1/* requests to our apiv1.php script. For that we will modify again `/etc/nginx/sites-available/default` to include the following in the server block:

`rewrite ^/api/v1/([^/]+)/([^/]+)/?$ /apiv1.php?class=$1&method=$2? last;`

The `default` file in `/etc/nginx/sites-available/` would look like that:
```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;

    server_name _;
    
    rewrite ^/api/v1/([^/]+)/([^/]+)/?$ /apiv1.php?class=$1&method=$2? last;
    
    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
To test the new configuration we will create a php script called apiv1.php in the root directory:
```
<?php
$class  = filter_input(INPUT_GET, 'class',  FILTER_SANITIZE_STRING);
$method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_STRING);

echo $class;
echo '<br />';
echo $method;
```
Now let's go an do the testing (subtitute myServer for ip:port):

`http://myServer/api/v1/members/getInfo`

##Testing the php integration and playing around on HTTP methods

As we are going to be testing different php scrips until we finally create the REST interface we are going to use the capability to mount a host directory onto the container. For that purpose we will be developing back on the mac and mount the `/Users/<user_name>/php-docs` directory in the mac onto the `/var/www/html` in the container through:

`docker run -d -P --name rest -v /Users/<user_name>/php-docs:/var/www/html seris/apiv2`


