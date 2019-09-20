<?php
include './headers.php';
?>
<div class="card card-border-primary">
    <div class="card-header bg-white cfos"> 
        <div class="row">
            <div class="col-sm-2">
                <h4>Alumnos Activos</h4> 
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="nivel">Seleccione el Nivel</label>
                    <div id="divNivel"></div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="nivel">Seleccione la Carrera</label>
                    <div id="divCarrera"></div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="grado" class="float-right"></label><br>
                     <span class="float-right"><a class="btn btn-sm btn-primary text-light" onclick="sumarb()">Buscar <i class="pe-7s-search"></i></a></span>
                    <div class="help-block with-errors text-danger"></div>
                </div>
            </div>
            <div class="col-sm-2">
                <label for="grado" class="float-right">Agregar nuevo alumno</label><br>
                <span class="float-right"><a href="core_alumno_addAlumno.php" class="btn btn-success btn-sm">Nuevo alumno <i class="pe-7s-add-user"></i></a></span>
            </div>
        </div>


    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                <thead class="table-primary text-light"> 
                    <tr>
                        <th>Editar</th>
                        <th>Credencial</th>
                        <th>#</th>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Carrera</th>
                        <th>Turno</th>
                        <th>Cuatrimestre</th>
                        <th>Estatus</th>
                        <th>Detalle Estatus</th>
                        <th>Vigencia de Credencial</th>
                        <th>Foto</th> 
                    </tr> 
                </thead>
            </table> 
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script src="asset/js/core_alumnos_getAlumnos.js"></script>


<script>
                        var sumarb = function () {
                        var CarreraId = $("#CarreraId").val();
                        var spin = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
                        tablec = $("#sumab").DataTable({
                        responsive: true,
<?php
if ($globalIdirole == 2) {
    echo "dom: 'Bfrtip',";
    echo "buttons: ['excel'],";
}
?>
                        "destroy": true,
                                //"responsive": true,
                                "deferRender": true,
                                //"processing": true,
                                //"serverSide": true,
                                "ajax": {
                                "url": "dataConect/API.php?action=getAlumnoByCarreraAndGradoAndPlantel&CarreraId=" + CarreraId,
                                        "type": "GET"
                                },
                                "columns": [
                                {"data": "btnEditar"},
                                {"data": "btnCredencial"},
                                {"data": "idialumno"},
                                {"data": "matricula"},
                                {"data": "nombre"},
                                {"data": "apellido_paterno"},
                                {"data": "apellido_materno"},
                                {"data": "carrera"},
                                {"data": "turno"},
                                {"data": "cuatrimestre"},
                                {"data": "estatus"},
                                {"data": "bloqueo"},
                                {"data": "vigencia"},
                                {"data": "contenido"},
                                ],
                                //"dom": 't',
                                language: {
                                "decimal": "",
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Entradas",
                                        "loadingRecords": spin,
                                        "processing": "Procesando...",
                                        "search": "Buscar:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                        "first": "Primero",
                                                "last": "Ultimo",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                        }
                                }
                        });
                        }

</script>

