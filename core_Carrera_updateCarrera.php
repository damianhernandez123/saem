<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fab fa-mizuni bg-pic"></i>
                    <div class="d-inline">
                        <h4>Editar Carrera</h4>
                        <a href="core_Carrera_getCarrera.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card card-border-warning">
            <div class="card-body">
                <form role="form" id="formCarrera" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="idicarrera" name="idicarrera" placeholder="Enter idicarrera" required>
                                <label for="Campus">Seleccione el Campus</label>
                                <div id="divCampus"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
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
                                <label for="numero_carrera">Numero de Carrera</label>
                                <input type="text" class="form-control" id="numero_carrera" name="numero_carrera" placeholder="Enter numero_carrera" required maxlength="2">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="clave">clave</label>
                                <input type="text" class="form-control" id="clave" name="clave" placeholder="Enter clave" required maxlength="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="duracion">Duraccion</label>
                                <input type="number" class="form-control" id="duracion" name="duracion" placeholder="Enter duracion" required maxlength="4">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Actualizar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
    $(document).ready(function () {
        getCampus();
    });
    function getCampus() {
        $("#divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $("#divCampus").html(txt);
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        getNivel();
    });
    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivel",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="NivelId" name="NivelId" required">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }
</script>
<script>
    var idicarrera = "<?php echo $_GET["idicarrera"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCarrerabyidcarrera&idicarrera=" + idicarrera,
            success: function (text) {
                console.log(text);
                var Carrera = text.data[0];
                $("#idicarrera").val(Carrera.idicarrera);
                $("#idicampus").val(Carrera.idicampus);
                $("#NivelId").val(Carrera.NivelId);
                $("#numero_carrera").val(Carrera.numero_carrera);
                $("#clave").val(Carrera.clave);
                $("#nombre").val(Carrera.nombre);
                $("#duracion").val(Carrera.duracion);
            }
        });
    });
</script>
<script>
    $("#formCarrera").validator().on("submit", function (event) {
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
            var dataString = $('#formCarrera').serialize();

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updateCarrera&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Grado actualizado correctamente', 'success');
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
        location.href = "core_Carrera_getCarrera.php";
        $("#formCarrera")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formCarrera").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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