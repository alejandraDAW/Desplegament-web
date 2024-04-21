<?php

// Incluye el archivo de conexión
require_once('Connexio.php');

/**
 * Clase que permite añadir o actualizar productos en la base de datos
 * 
 * 
 *
 * @author alejandra
 * @version 1.0
 */

class Actualitzar {
        
    /**
     * Método que actualiza la base de datos creando o modificando un producto
     * 
     * Según de la página de la que provengamos hace un INSERT o un UPDATE
     * a la base de datos
     * 
     * @param Integer $id Identificador del producto que queremos eliminar
     * @param String $nom Nombre del producto
     * @param String $descripcio Descripción del producto
     * @param Float $preu precio del producto
     * @param String $categoria Categoría del producto
     * 
     * @return void 
     */
    public function actualizar($id, $nom, $descripcio, $preu, $categoria) {
        // Verifica si todos los campos requeridos están presentes
        if (!isset($id) || !isset($nom) || !isset($descripcio) || !isset($preu) || !isset($categoria)) {
            echo '<p>Se requieren todos los campos para actualizar el producto.</p>';
            return;
        }

        // Crea una instancia de la clase de conexión
        $conexionObj = new Connexio();
        // Obtiene la conexión a la base de datos
        $conexion = $conexionObj->obtenirConnexio();

        // Escapa las variables para prevenir SQL injection
        $id = $conexion->real_escape_string($id);
        $nom = $conexion->real_escape_string($nom);
        $descripcio = $conexion->real_escape_string($descripcio);
        $preu = $conexion->real_escape_string($preu);
        $categoria = $conexion->real_escape_string($categoria);
        
        
        $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : null;
        echo $pagina;
        if($pagina === "Nou.php") {
            //Consulta SQL de inserción
            $consulta = "INSERT INTO productes (nom, descripcio, preu, categoria_id) 
                        VALUES ('$nom', '$descripcio', '$preu', '$categoria');";
        } elseif ($pagina === "Modificar.php") {
            // Construye la consulta SQL de actualización
            $consulta = "UPDATE productes
                     SET nom = '$nom', descripcio = '$descripcio', preu = '$preu', categoria_id = '$categoria'
                     WHERE id = '$id'";
        } else {
            echo '<p>Página no válida</p>';
            return;
        }
        
        // Ejecuta la consulta y redirige a la página principal si tiene éxito
        if ($conexion->query($consulta) === TRUE) {
            header('Location: Principal.php');
            exit();
        } else {
            // Muestra un mensaje de error si la consulta falla
            echo '<p>Error al actualizar el producto: ' . $conexion->error . '</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Obtiene los valores del formulario (si existen)
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$descripcio = isset($_POST['descripcio']) ? $_POST['descripcio'] : null;
$preu = isset($_POST['preu']) ? $_POST['preu'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;



// Crea una instancia de la clase Actualitzar y llama al método actualizar
$actualizarProducto = new Actualitzar();
$actualizarProducto->actualizar($id, $nom, $descripcio, $preu, $categoria);

?>
