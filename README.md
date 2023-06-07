## Indicaciones para clonar el sistema de manera correcta
- Instalar las dependencias de Composer: composer install
- Instalar las dependencias de NodeJs: npm install
- Copiar el .env.example y cambiarle el nombre por .env
- Generar la llave de app con el comando: php artisan key:generate
- Correr las migraciones.

## Indicaciones para la BD
- Ejecutar los procedimientos almacenados de la BD ( para este ejemplo MySQL )

- Base de datos: `abcc_articulos`

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cambio_articulo` (IN `p_sku` INT, IN `p_article` VARCHAR(15), IN `p_brand` VARCHAR(15), IN `p_model` VARCHAR(20), IN `p_family_id` INT, IN `p_date_high` DATE, IN `p_stock` INT, IN `p_quantity` INT, IN `p_discontinued` TINYINT, IN `p_date_low` DATE)   BEGIN
    UPDATE articles
    SET sku = p_sku, article = p_article, brand = p_brand, model = p_model,
        family_id = p_family_id,
        date_high = p_date_high, stock = p_stock, quantity = p_quantity,
        discontinued = p_discontinued, date_low = p_date_low
    WHERE sku = p_sku;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_articulo` (IN `p_sku` INT)   BEGIN
    DELETE FROM articles
    WHERE sku = p_sku;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_articulo` (IN `p_sku` INT, IN `p_article` VARCHAR(15), IN `p_brand` VARCHAR(15), IN `p_model` VARCHAR(20), IN `p_family_id` BIGINT(20), IN `p_date_high` DATE, IN `p_stock` INT, IN `p_quantity` INT, IN `p_discontinued` TINYINT, IN `p_date_low` DATE)   BEGIN
    INSERT INTO articles (sku, article, brand, model, family_id, date_high, stock, quantity, discontinued, date_low)
    VALUES (p_sku, p_article, p_brand, p_model, p_family_id, p_date_high, p_stock, p_quantity, p_discontinued, p_date_low);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_articulo` (IN `p_sku` INT)   BEGIN
    SELECT *
    FROM articles
    WHERE sku = p_sku;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_articulos` ()   BEGIN
    SELECT * FROM articles;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_categoria` (IN `p_id` INT)   BEGIN
    SELECT * FROM categories WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_departamento` (IN `p_id` INT)   BEGIN
    SELECT * FROM departments WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_familia` (IN `p_id` INT)   BEGIN
    SELECT * FROM families WHERE id = p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------


## Indicaciones para correr el sistema
- Ejecutar el comando: php artisan serve
- Ejecutar el comando: npm run dev
