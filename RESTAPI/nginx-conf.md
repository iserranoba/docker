### Snippet for nginx configuration
### Only gathering info. I HAVE NOT TRIED

`server {`

        server_name myServer;
        root /usr/share/nginx/html;
        
        rewrite ^/api/v1/([^/]+)/([^/]+)/?$ /apiv1.php?class=$1&method=$2? last;

        location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
    }
    
###php file called apiv1.php in the root directory
    
`<?php`

`$class  = filter_input(INPUT_GET, 'class',  FILTER_SANITIZE_STRING);`

`$method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_STRING);`

`echo $class;`

`echo '<br />';`

`echo $method;`


###Test it
`http://myServer/api/v1/members/getInfo`
