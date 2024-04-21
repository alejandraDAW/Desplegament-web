# Desplegament-web
 Pequeña aplicación hecha en PHP que nos permite interactuar con una base de datos mostrando, modificando, eliminando y añadiendo productos

## Requisitos
 
* PHP 8 o superior
* Servidor web
* MySQL

## Instalación

* Importar el proyecto a nuestro IDE
* Crear una base de datos MySQL llamada "la_meva_botiga"
  
  ```
  CREATE DATABASE IF NOT EXISTS la_meva_botiga;
  USE la_meva_botiga;

  -- Crea la taula 'categories'
  CREATE TABLE IF NOT EXISTS categories (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nom VARCHAR(50) NOT NULL
  );
  
  -- Insereix dades a la taula 'categories'
  INSERT INTO categories (nom) VALUES
       ('Electrònics'),
       ('Roba');
  
  -- Crea la taula 'productes'
  CREATE TABLE IF NOT EXISTS productes (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nom VARCHAR(100) NOT NULL,
       descripció TEXT,
       preu DECIMAL(10, 2) NOT NULL,
       categoria_id INT NOT NULL,
       FOREIGN KEY (categoria_id) REFERENCES categories(id)
  );
  
  -- Insereix dades a la taula 'productes'
  INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES
       ('Laptop', 'Portàtil d\'alta gamma', 1200.00, 1),
       ('Smartphone', 'Telèfon intel·ligent d\'última generació', 800.00, 1),
       ('Camisa', 'Camisa de vestir per a homes', 50.00, 2),
       ('Vestit', 'Vestit de nit per a dones', 80.00, 2),
       ('Sabates', 'Sabates esportives per córrer', 120.00, 2);
     
  ```
* Ejecutar el proyecto 

## Uso

* Botón Modificar: Accedemos a un formulario cargado con los datos del acrtículo que queremos modificar y nos permite añadir, suprimir o reemplazar la información deseada
* Botón Añadir: Nos permite añadir un artículo nuevo mediante un formulario
* Botón Eliminar: Elimina el artículo seleccionado
  
## Autores

* Alejandra Pérez Prim

* Trabajo inicial de Carles Canals - Bifurcación del proyecto Desplegament-web https://github.com/CarlesCanals/Desplegament-web
