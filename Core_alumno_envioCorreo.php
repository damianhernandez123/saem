<?php include './headers.php'; ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EnvioAviso">Enviar correo</button>

<!-- Modal -->
<div class="modal fade" id="EnvioAviso" tabindex="-1" role="dialog" aria-labelledby="EnvioAvisoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Envio de aviso a padres de familia/tutores</h4><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label id="ticketTitulo"></label>
                    </div>
                    <div class="col">
                        <label id="ventaTitulo"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label>Matricula</label>
                        <input class="form-control form-control-sm" type="text" id="matricula" value="" name="matricula" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <label>Nombre de Alumno</label>
                        <input class="form-control form-control-sm" type="text" name="nombre" value="" id="nombre" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <label>Nombre de Tutor</label>
                        <input class="form-control form-control-sm" type="text" name="rfc" value="" id="tutor" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <label>Descripcion</label>
                        <textarea class="form-control max-textarea"  rows="3" id="descripcion" name="descripcion"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <label>Email</label>
                        <input class="form-control form-control-sm" type="email" name="email" value="" id="email" required ">
                    </div>
                </div>
            </div>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success ">Enviar correo</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    var idialumno = "<?php echo $_GET["idialumno"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getalumnoinnerjoinidigenerales&idialumno=" + idialumno,
            success: function (text) {
                //console.log(text);
                var alumno = text.data[0];
                $("#matricula").val(alumno.matricula);
                $("#nombre").val(alumno.nombre + ' ' + alumno.apellido_paterno + ' ' + alumno.apellido_materno);
                $("#tutor").val(alumno.nombre_tutor + ' ' + alumno.apellidos);
                $("#email").val(alumno.email);
            }
        });
    });
</script>