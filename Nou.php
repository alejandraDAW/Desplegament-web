<?php

require_once('Connexio.php');
require_once('Header.php');
/**
 * Description of Nou
 *
 * @author alejandra
 */
class Nou {
    
    public function introduirProducte() {
        
        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();
        
        echo '<!DOCTYPE html>
                  <html lang="es">
                  <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <title>Modificar producte</title>
                    <!-- Enlace a Bootstrap desde su repositorio remoto -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                  </head>
                  <body>
                    <div class="container mt-5" style="margin-bottom: 200px">
                        <h2>Modificar producte</h2>
                        <hr>
                        <form action="Actualitzar.php" method="POST">
                            <!-- Campos del formulario con la información actual del producto -->
                            <input type="hidden" name="id" value="">

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nombre:</label>
                                <input type="text" name="nom" class="form-control" value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcio" class="form-label">Descripción:</label>
                                <input type="text" name="descripcio" class="form-control" value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="preu" class="form-label">Precio:</label>
                                <input type="number" name="preu" class="form-control" value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría:</label>
                                <select name="categoria" class="form-select" required>
                                    <!-- Opciones del selector de categorías con la opción seleccionada según la información actual -->
                                    <option value="1">Electrónicos</option>
                                    <option value="2">Roba</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>

                            <!-- Agrega más campos según sea necesario -->

                            <hr>
                            <!-- Botones de guardar y cancelar -->
                            <input type="hidden" name="pagina" value="Nou.php">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                            <a href="Principal.php" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>';
            
            // Incluye el pie de página
            require_once('Footer.php');
    }
}



$introduirFormulari = new Nou();
$introduirFormulari->introduirProducte();


?>