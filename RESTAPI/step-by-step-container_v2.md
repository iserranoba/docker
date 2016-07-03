## Creating the REST API

Now that we have the v1 up and running we need to do more modifications in ordert for Nginx to forward to php the api requests
php will be responsible to implement the logic for the http requests
we will do a very simple API implementation and will leave the interaction with Mondo DB for later.

We want Nginx to redirect all /api/v1/* requests to our apiv1.php script. For that we will modify again `/etc/nginx/sites-available/default` to include the following in the server block:

`rewrite ^/api/v1/([^/]+)/([^/]+)/?$ /apiv1.php?class=$1&method=$2? last;`

The `default` file in `/etc/nginx/sites-available/` would look like that:




