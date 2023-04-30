# vpt-symfony
## Commands used to make and execute the project
Commands used to create the docker image and run the container:

```bash
docker-compose run --rm --service-ports installer bash
curl -sS https://get.symfony.com/cli/installer | bash
mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
symfony new symfony-vpt --version=4.4 --webapp
cd symfony-vpt/
symfony server:start --no-tls
```

Commands used to create the table in the database:

```bash
docker-compose up -d
docker-compose exec db mysql -uroot -proot
```
```sql
use proveedores;
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    tipo ENUM('hotel', 'pista', 'complemento') NOT NULL,
    activo BOOLEAN NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

Command used to install and use twig:

```bash
composer require symfony/twig-bundle
```

Command to use every time docker is started:

```bash
docker-compose up -d
symfony server:start --no-tls
```

## Aspectes a destacar
- La versió del Symfony utilitzada és la 4.4
- M'hauria agradat fer noves branques i commits amb seccions de codi més petites pel tema de claredat i un funcionament real, però a causa de la rapidesa del projecte he optat per assegurar que el projecte tingui els objectius demanats.
- He decidit complir amb la part opcional i fer servir Docker per a desplegar el projecte. Un aspecte que he trobat i no he sabut millorar és l'optimització, ja que hi ha un temps de retard més gran del que m'agradaria en la visualització i actualització de les vistes de la pàgina web.
- He usat bootstrap perquè els botons tinguessin colors, el contingut de la pàgina estigués centrat i hi hagués una separació òptima pels diferents elements tant pels formularis de creació i modificació de proveïdors com per la pàgina central de visualització. A continuació hi ha unes imatges de mostra:

/index/:

<img src="https://user-images.githubusercontent.com/19414375/235377697-00f5cfa5-aef9-4f2f-8194-3ab4ae66aa67.png" width=50% height=50%>

/proveedor/edit/2:

<img src="https://user-images.githubusercontent.com/19414375/235377806-9949589e-2204-4f04-84ec-f4338048d85c.png" width=50% height=50%>


