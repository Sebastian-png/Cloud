<?php

?>

<!DOCTYPE html>
<html lang="es">|
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Celulares</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Styles/Styles.css">
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            max-height: 95vh; /* ajusta este valor como lo necesites */
            overflow-y: auto;
        }
        .col-id {
    width: 10%;
}
.slide-up {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-out;
}

.col-marca {
    width: 15%;
}


        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #34a853;
        }

        .btn-warning {
            background-color: #fbbc05;
        }

        .thead-blue {
            background-color: #007BFF;
            color: white;
        }

        .subtitulo {
            font-size: 16px; /* Ajusta el tamaño de fuente según tu preferencia */
        }

        .zoom-effect:hover {
            transform: scale(1.1);
            transition: transform 0.1s ease-in-out;
        }

        .zoom-effect {
            transition: transform 0.1s ease-in-out;
        }

        .btn-tertiary {
            background-color: #9B59B6;
            border-color: #9B59B6;
            color: white;
        }

        .btn-tertiary:hover {
            background-color: #7D3C98;
            border-color: #7D3C98;
            color: white;
        }
        .btn-larger {
    font-size: 1.5rem; /* Ajusta el tamaño de fuente como lo desees */
    padding: 10px 15px; /* Aumenta el padding */
}
    </style>
</head>

<body>
<?php if (!empty($mensaje)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
<div class="container mt-5 p-4">
    <div class="d-flex justify-content-between mb-4">
        <!-- Título y Subtítulo -->
        <div>
            <h1>Inventario de celulares</h1>
            <h3 class="subtitulo">Un CRUD para un inventario de celulares con un buscador</h3>
        </div>
        <!-- Botones y formulario de búsqueda -->
        <div>
            <div class="mb-2">
                <a href="crear.php" class="btn btn-success">Añadir nuevo</a>
                <a href="login.php" class="btn btn-secondary">Cerrar Sesión</a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#importModal">Importar</button>
                <a href='inventario.php?accion=exportar' class='btn btn-tertiary'>Exportar</a>
            </div>
            <form action="inventario.php" method="GET" class="mt-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar celular..." name="busqueda" value="<?php echo isset($consulta) ? $consulta : '' ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Modal importar -->
    <div class="modal-dialog modal-dialog-centered">    
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="importModalLabel">Importar archivo CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
  
                <div class="modal-body">
                    <form action="?accion=importar" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fileToUpload">Selecciona el archivo CSV para importar:</label>
                            <input type="file" class="form-control-file mt-2" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="btn-group text-center btn-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" name="submit">Importar</button>
                            <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <table class="table table-bordered table-hover">
    <thead class="thead-blue">
    <tr>
        <th class="col-id" style='text-align: center;'>ID registro</th>
        <th class="col-marca" style='text-align: center; width: 100px'>Marca</th>
        <th class="col-id" style='text-align: center;'>Nombre</th>
        <th class="col-almacenamiento" style='text-align: center; width: 50px;'>Almacenamiento</th>
        <th class="col-id" style='text-align: center;'>RAM</th>
        <th class="col-id" style='text-align: center; width: 150px;'>Precio</th>
        <th class="col-id" style='text-align: center;'>Stock</th>
        <th class="col-id" style='text-align: center; width: 200px;'>Acciones</th>
    </tr>
    </thead>

        <tbody>
        <?php
        if (isset($celulares) && is_array($celulares)) {
            foreach ($celulares as $celular) {
                echo "<tr>";
                echo "<td style='text-align: center;'>IPC{$celular['id_celular']}</td>"; 
                echo "<td style='text-align: center;'>{$celular['marca']}</td>";
                echo "<td style='text-align: center;'>{$celular['nombre']}</td>";
                echo "<td style='text-align: center;'>{$celular['almacenamiento']} GB</td>";
                echo "<td style='text-align: center;'>{$celular['ram']} GB</td>";
                $precio = $celular['precio'];
                $precio_con_puntos = number_format($precio, 0, '', '.');
                echo "<td style='text-align: center;'> \$ {$precio_con_puntos} COP</td>";
                echo "<td style='text-align: center;'>{$celular['disponibilidad']}</td>";
                echo "<td style='text-align: center;'>
                <a href='editar.php?id={$celular['id_celular']}' class='btn btn-warning zoom-effect'>Editar</a>
                <a href='eliminar.php?accion=eliminar&id={$celular['id_celular']}' class='btn btn-danger ml-2 zoom-effect'>Eliminar</a>
            </td>";
        
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='8' style='text-align: center;'>No se encontraron resultados</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#importModal').on('show.bs.modal', function() {
            var windowHeight = $(window).height();
            $(this).find('.modal-dialog').css({
                marginTop: '-300px',
                opacity: 0
            }).animate({
                marginTop: (windowHeight - $(this).find('.modal-dialog').height()) / 3,
                opacity: 1
            }, 700);
        });
    });
</script>
</body>
</html>