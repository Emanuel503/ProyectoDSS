<a href="" class="btn btn-danger btn-pdf">PDF</a><br><br>
<div class="table-responsive">
<table class="table table-active table-striped table-bordered">
    <thead>
        <tr>
            <td>#</td>
            <td>Rol</td>
            <td>Cantidad maxima de libros prestados</td>
            <td>Maximo de dias de prestamo</td>
            <td>Descripcion</td>
            <td>Opciones</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once "class/Roles.php";
            $roles = new Roles();
            $datos = $roles->mostrarRoles();

            $contador=0;
            foreach ($datos as $rol) {
                $contador++;
                echo "<tr>";
                    echo "<td>".$contador."</td>";
                    echo "<td>".$rol["rol"]."</td>";
                    echo "<td>".$rol["cantidad_libros"]."</td>";
                    echo "<td>".$rol["dias_maximos_prestamo"]."</td>";
                    echo "<td>".$rol["descripcion"]."</td>";
                    echo "<td>
                            <a href='page.php?pag=configuracion.php&opc=modificar_roles.php&id=".$rol["id"]."' class='btn btn-success'>Modificar</a>
                          </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</div>

<?php
    if(isset($_GET["modificado"]) && $_GET["modificado"]="si"){
        echo '
        <div class="alert alert-success alert-dismissible fade show fixed-top text-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <b>Modificado correctamente</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
?>