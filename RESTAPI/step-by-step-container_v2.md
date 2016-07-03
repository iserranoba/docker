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


