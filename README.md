# vpt-symfony

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
docker-compose exec db mysql -u root -p #root
use proveedores;
```
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
