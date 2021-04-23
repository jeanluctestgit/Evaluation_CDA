# m2i-php-poo

## installation process

### api
- install symfony CLI
- clone the project
- edit the src/Itech/Repository/DBA.php file for the correct db access
- create an article table like /Itech/Entity/Article.php
- run the Symfony Local Web Server from web folder : symfony server:start --port=4321 --passthru=front.php

### Apache config
```

<VirtualHost *:80>
    ServerName m2i-poo
    DocumentRoot "e:/projects/course/m2i-php-poo/web"
    <Directory  "e:/projects/course/m2i-php-poo/web/">
    DirectoryIndex front.php
        Require all granted
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule . /front.php [L]
    </Directory>
</VirtualHost>

```

