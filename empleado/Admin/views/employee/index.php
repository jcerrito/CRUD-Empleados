
        <div class="container">
            <?php if(isset($result)) 
                if($result) 
                    include_once('./Admin/views/modal/success.php');
                else
                    include_once('./Admin/views/modal/danger.php');
            ?>   
            <div class="row mt-5">
                <div class="col-sm-10">
                    <a href="./" class="link-dark" ><h1>Empleados</h1></a>
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-success" href="?action=create" role="button"><i class="fa-solid fa-user-plus"></i> Agregar Empleado</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class='table table-bordered border-light mt-5'>
                    <thead>
                        <tr>
                            <th scope="col">Empleado</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Salario</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $employee): ?><tr>
                            <td><?=$employee['name'] ?></td>
                            <td><?=$employee['phone']?></td>
                            <td><?=$employee['domicile']?></td>
                            <td><?=$employee['birthday']?></td>
                            <td><?=$employee['salary']?></td>
                            <td><?=$employee['observation']?></td>
                            <td class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar Registro" href="./?action=show&employee=<?=$employee['id_employee']?>" role="button"><i class="fa-solid fa-pencil"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Registro" href="./?action=delete&employee=<?=$employee['id_employee']?>" role="button"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?></tbody>
                </table>
            </div>
        </div>
