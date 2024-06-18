<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/styles.css'); ?>" rel="stylesheet">
    <title>CRUD Codeigniter</title>
</head>

<body>
    <div class="container">
        <h1 class="label-color">CRUD con Codeigniter 4</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="<?php echo base_url('/crear') ?>">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control custom-input">
                    <label for="paterno" class="form-label">Apellido paterno</label>
                    <input type="text" name="paterno" id="paterno" class="form-control custom-input">
                    <label for="materno" class="form-label">Apellido materno</label>
                    <input type="text" name="materno" id="materno" class="form-control custom-input">
                    <br>
                    <button class="btn btn-primary">Registrar</button>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-center image-container">
                <img src="<?php echo base_url('assets/images/registro.png'); ?>" alt="Registro" width="550">
            </div>
        </div>
        <hr>
        <h2 class="custom-heading">Listado de personas</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach ($datos as $key) : ?>
                            <tr>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->paterno ?></td>
                                <td><?php echo $key->materno ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editar('<?php echo $key->id_nombre ?>', '<?php echo $key->nombre ?>', '<?php echo $key->paterno ?>', '<?php echo $key->materno ?>')">Editar</button>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('/eliminar/' . $key->id_nombre) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal">
                <form method="POST" action="<?php echo base_url('/actualizar') ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarLabel">Editar Persona</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idNombre" id="idNombre">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombreEditar" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="paterno" class="form-label">Apellido paterno</label>
                            <input type="text" name="paterno" id="paternoEditar" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="materno" class="form-label">Apellido materno</label>
                            <input type="text" name="materno" id="maternoEditar" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal(":D", "Agregado con éxito", "success");
        } else if (mensaje == '0') {
            swal(":(", "Fallo al agregar", "error");
        } else if (mensaje == '2') {
            swal(":D", "Actualizado con éxito", "success");
        } else if (mensaje == '3') {
            swal(":(", "Fallo al actualizar", "error");
        } else if (mensaje == '4') {
            swal(":D", "Eliminado con éxito", "success");
        } else if (mensaje == '5') {
            swal(":(", "Fallo al eliminar", "error");
        }

        function editar(id, nombre, paterno, materno) {
            document.getElementById('idNombre').value = id;
            document.getElementById('nombreEditar').value = nombre;
            document.getElementById('paternoEditar').value = paterno;
            document.getElementById('maternoEditar').value = materno;
            var myModal = new bootstrap.Modal(document.getElementById('modalEditar'));
            myModal.show();
        }
    </script>
</body>

</html>
