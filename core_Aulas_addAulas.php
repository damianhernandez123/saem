<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fas fa-chalkboard bg-pic"></i>
                    <div class="d-inline">
                        <h4>Catálogo de Aulas</h4>
                        <a href="core_escolares_aulas.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card card-border-warning">
            <div class="card-body">
                <form role="form" id="formaddAulas" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Campus</label>
                                <div id="divNivel"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Enter Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                         <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Capacidad">Capacidad</label>
                                <input type="number" class="form-control" id="Capacidad" name="Capacidad" placeholder="Enter Capacidad" min="1">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div> 
                          <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="Estatus">Estatus</label>
<!--                                    <input type="text" class="form-control" id="Estatus" name="Estatus" placeholder="Enter Estatus">-->
                                    <select class="form-control" id="Estatus" name="Estatus" placeholder="" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="true">Activo</option>
                                        <option value="false">Inactivo</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>

                                </div>
                            </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getNivel();
    });

    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCiclo",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idiciclo" name="idiciclo" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }



</script>
<script>
    $("#formaddAulas").validator().on("submit", function (event) {
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
        // Initiate Variables With Form Content
        var dataString = $('#formaddAulas').serialize();
        //alert('data ' + dataString);

        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addAulas&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'Aula se agrego correctamente', 'success');

                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess() {
        location.href = "core_escolares_aulas.php";
        $("#formaddAulas")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formaddAulas").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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

