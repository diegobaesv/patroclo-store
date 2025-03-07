<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrolo Store | SISE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <header>
        <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main style="padding: 20px;">
        <div style="display: flex; gap: 20px;">
            <h1>Listado de categorias</h1>
            <p><a class="btn btn-primary" href="/?controller=Categoria&action=viewInsertar">Agregar categoria +</a></p>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($categorias)): ?>
                    <?php foreach($categorias as $cat): ?>
                        <tr>
                            <th scope="row"><?php echo $cat['id_categoria']; ?></th>
                            <td><?php echo $cat['nombre']; ?></td>
                            <td>
                                <img src="<?php echo $cat['imagen_url']; ?>" width="200px" height="150px" alt="<?php echo $cat['nombre']; ?>">
                            </td>
                            <td><?php echo $cat['fecha_creacion_auditoria']; ?></td>
                            <td>
                                <a href="/?controller=Categoria&action=viewActualizar&idCategoria=<?php echo $cat['id_categoria']; ?>" type="button" class="btn btn-warning">Editar</a>
                                <a onclick="onClickDarBaja(<?php echo $cat['id_categoria']; ?>)" type="button" class="btn btn-danger">Dar de Baja</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No existen registros</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<script>

    const onClickDarBaja = (idCategoria) => {
        console.log('idCategoria',idCategoria);
        Swal.fire({
            title: "¿Quieres eliminar el registro?",
            text: "No podras revertir los cambios",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "¡Eliminado!",
                text: "El registro ha sido eliminado con éxito",
                icon: "success"
                }).then(()=>{
                    console.log('elminando...');
                    window.location = `/?controller=Categoria&action=darBaja&idCategoria=${idCategoria}`
                });
                
            }
        });
    }
</script>
</html>