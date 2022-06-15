        
        <div class="container">
            <div class="row mt-5 mb-3">
                <div class="col-sm">
                    <h1><?php if($action == 'create') echo"Agregar Empleado"; else echo"Atualizar Registro";?></h1>
                </div>
            </div>

            <form action="./?action=<?php echo(isset($data))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
                <div class="row g-3 mb-4">
                    <div class="col-sm">
                        <input type="text" name="employee[name]" value="<?php echo (isset($data[0]['name']))?$data[0]['name']:'';?>" class="form-control" placeholder="Nombre(s)" aria-label="Nombre">
                    </div>
                    <div class="col-sm">
                        <input type="text" name="employee[lastname]" value="<?php echo (isset($data[0]['lastname']))?$data[0]['lastname']:'';?>" class="form-control" placeholder="Apellido(s)" aria-label="Apellido">
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <input type="tel" name="employee[phone]" value="<?php echo (isset($data[0]['phone']))?$data[0]['phone']:'';?>" class="form-control" placeholder="Telefono" aria-label="Telefono" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                    </div>
                    <div class="col-sm">
                        <input type="number" name="employee[salary]" value="<?php echo (isset($data[0]['salary']))?$data[0]['salary']:'';?>" class="form-control" placeholder="Salario" aria-label="Salario">
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Nacimiento</span>
                            <input type="date" name="employee[birthday]" value="<?php echo (isset($data[0]['birthday']))?$data[0]['birthday']:'';?>" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-sm">
                        <input type="text" name="employee[domicile]" value="<?php echo (isset($data[0]['domicile']))?$data[0]['domicile']:'';?>" class="form-control" placeholder="Domicilio" aria-label="Domicilio">
                    </div>
                    <div class="col-sm">
                        <input type="text" name="employee[observation]" value="<?php echo (isset($data[0]['observation']))?$data[0]['observation']:'';?>" class="form-control" placeholder="Observaciones" aria-label="Observaciones">
                    </div>
                </div>
                <div class="row g-3 justify-content-evenly mt-5">
                    <div class="col-4 d-grid gap-2 mx-auto">
                        <input type="submit" name="enviar" value=<?php if($action == 'create') echo"Guardar"; else echo"Aceptar"; ?> class="btn btn-success" />
                    </div>
                    <div class="col-4 d-grid gap-2 mx-auto">
                        <input type="button" name="enviar" value="Cancelar" class="btn btn-danger" onClick="history.go(-1);" />
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col col-4 d-grid gap-2 mx-auto">
                        <input type="number" name="employee[id_employee]" value="<?php echo(isset($data)?$id_employee:''); ?>" style="display: none;">
                    </div>
                </div>
            </form>
        </div>
