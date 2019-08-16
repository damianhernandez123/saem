<?php
include './headers.php';
?>
<div class="card">
    <div class="card-body">
        <form role="form" id="formcTurno" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="fas fa-user-clock bg-c-lite-green"></i>
                            <div class="d-inline">
                                <h4>Editar Turno</h4>
                                <span><a href="core_cTurno_getcTurno.php"><p class="pe-7s-back-2"></p> Regresar</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card card-border-success">
                    <div class="card-body">
                        <h5>Datos del Turno</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <input type="hidden" class="form-control" id="TurnoId" name="TurnoId" placeholder="Enter TurnoId" required>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripción" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Estatus">Estatus</label>
                                    <select class="form-control" id="Estatus" name="Estatus" placeholder="" required>
                                        <option value="" id="opt">Seleccione una opción</option>
                                        <option value="true" id="act">Activo</option>
                                        <option value="false" id="ina">Inactivo</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Actualizar datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    var TurnoId = "<?php echo $_GET["TurnoId"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampusbycTurnoId&TurnoId=" + TurnoId,
            success: function (text) {
                //console.log(text);
                var cTurno = text.data[0];
                $("#TurnoId").val(cTurno.TurnoId);
                $("#Descripcion").val(cTurno.Descripcion);
                if (cTurno.Estatus == 1) {
                    $("#Estatus").val('true').change();
                } else {
                    $("#Estatus").val('false').change();
                }
            }
        });
    });

</script>

<script>
    $("#formcTurno").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Todos los campos son requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm() {
        var txt;
        var r = confirm("Esta seguro de aplicar este cambio?");
        if (r) {
            // Initiate Variables With Form Content
            var dataString = $('#formcTurno').serialize();
            //alert('data ' + dataString);

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updatecTurno&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Turno actualizado correctamente', 'success');
                    } else {
                        formError();
                        swalert("Mensaje!", text, 'info');
                        //submitMSG(false,text);
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function formSuccess() {
        location.href = "core_cTurno_getcTurno.php";
        $("#formcTurno")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formcTurno").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated text-success";
        } else {
            var msgClasses = "h3 text-center text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
</script>