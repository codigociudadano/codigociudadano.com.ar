
# [Codigo ciudadano](https://github.com/codigociudadano/codigociudadano.com.ar)

Sitio de Código Ciudadano

## Tabla de contenido

 - [Requerimientos](#requerimientos)
 - [Instalacion](#instalacion)
 - [Bugs y peticiones de nuevas features](#Bugs-y-peticiones-de-nuevas-features)
 - [Contribuir](#contribuir)
 - [Comunidad](#comunidad)

## Requerimientos

Para que puedas ayudarnos en este proyecto se requiere tener instalado:
 - Los requerimientos mínimos de Drupal: https://drupal.org/requirements
 - Drush (interfaz de linea de comandos para Drupal)
   - En Ubuntu: sudo apt-get install drush
   - Otros Sist. Op: ver https://drupal.org/node/1791676

## Instalación

1) Clonar el repositorio:  `git clone https://github.com/codigociudadano/codigociudadano.com.ar.git`.

2) Configurar un Virtual Host de Apache para que apunte a src/ donde el servername sea codigociudadano.local y agregarlo al archivo `000-default` que generalmente se encuentra en `etc/apache2/sites-enabled/000-default`
   Un ejemplo: 
   ```
    <VirtualHost *:80>      
      DocumentRoot {DocumentRoot de Apache}/codigociudadano.com.ar/src
      ServerName codigociudadano.local
      RewriteEngine On
      RewriteOptions inherit
      CustomLog /var/log/apache2/codigociudadano.com.ar.log combined
      <Directory {DocumentRoot de Apache}/codigociudadano.com.ar/src>
        Options +FollowSymLinks Indexes
        AllowOverride All
        order allow,deny
        allow from all
      </Directory>
    </VirtualHost>
   ```

3) Añadir codigociudadano.local a la tabla de hosts (/etc/hosts).

4) Crear una base de datos MYSQL llamada codigociudadano.
   
  ```sql
  CREATE DATABASE codigociudadano;
  ```

5) Crear un usuario codigociudadano en MYSQL con la password codigociudadano y que tenga accesso full en la base codigociudadano.
  
  ```sql
  GRANT ALL PRIVILEGES ON codigociudadano.* TO codigociudadano@localhost IDENTIFIED BY 'codigociudadano'
  ```

6) Bajar la ultima base de datos para development que está en la carpeta codigociudadano.com.ar/sql

7) Importar el dump de la base de datos de prueba.

8) Desde `src/` correr en la terminal: 
```shell
$ bash scripts/adjust-db-to-site.sh default`
```

9) Entrar con el browser a http://codigociudadano.local

## Bugs y peticiones de nuevas features

Si encontraste un bug, tenés un error, problemas para levantar el entorno o querés pedir una feature nueva? Podés agregarlo a la [lista de issues](https://github.com/codigociudadano/esculturas/issues). Te pedimos por favor, antes de agregar tu idea o problema, revisá si no hay un pedido similar que fué hecho anteriormente.

## Contribuir

El sitio esta hecho en su mayoría con varias tecnologías, principalmente en Drupal. En esta sección podés encontrar links útiles que te pueden ser de ayuda:

### PHP ####
 
 - [Manual de PHP](http://www.php.net/manual/es/)

### Drupal ###
 - [Documentación oficial Drupal](https://drupal.org/documentation)
 - [Foro oficial](https://drupal.org/forum)
 - [Drupal Answers](http://drupal.stackexchange.com/) (pertence a la red Stack Exchange)

### HTML/CSS/Javascript

 - (General) [Mozilla Developer Network español](https://developer.mozilla.org/es/)
 - (Javascript) [Eloquent Javascript](http://eloquentjavascript.net/contents.html)
 - (jQuery) [jQuery API Documentation](http://api.jquery.com/)
 - (jQuery) [jQuery enlightment](http://jqueryenlightenment.com/jquery_enlightenment.pdf)

### Google Map

 - Google developers - [Google Map API](https://developers.google.com/maps/)

## Comunidad

 Seguí las ultimas noticias de Esculturas y mas sobre Código Ciudadano en:
 - El sitio oficial: [Codigo Ciudadano](http://www.codigociudadano.cc/)
 - Seguinos en Facebook[CiudadanosC](https://www.facebook.com/CiudadanosC)
 - Seguinos en Twitter: [@CiudadanoCo](https://twitter.com/CiudadanoCo)
