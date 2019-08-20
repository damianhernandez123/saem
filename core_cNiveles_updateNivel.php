<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fas fa-layer-group bg-pic"></i>
                    <div class="d-inline">
                        <h4>Actualizar Nivel</h4>
                        <a href="core_cNiveles_getNiveles.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card card-border-warning">
            <div class="card-body">
                <form role="form" id="formcNiveles" data-toggle="validator" class="shake" autocomplete="off">
                    <input type="hidden" class="form-control" id="NivelId" name="NivelId" placeholder="Enter NivelId">
                    <input type="hidden" class="form-control" id="TieneCarreras" name="TieneCarreras" placeholder="Enter TieneCarreras">
                    <input type="hidden" class="form-control" id="GradoMaximo" name="GradoMaximo" placeholder="Enter GradoMaximo">
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
                                <label for="Descripcion">Descripción</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Abreviatura">Abreviatura</label>
                                <input type="text" class="form-control" id="Abreviatura" name="Abreviatura" placeholder="Enter Abreviatura" required>
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
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="RVOE">RVOE</label>
                                <input type="text" class="form-control" id="RVOE" name="RVOE" placeholder="Enter RVOE">
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
        getNivel();
    });

    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }



</script>
<script>
    var NivelId = "<?php echo $_GET["NivelId"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcNivelesbyIdNiveles&NivelId=" + NivelId,
            success: function (text) {
                //console.log(text);
                var cNiveles = text.data[0];
                $("#NivelId").val(cNiveles.NivelId);
                $("#Descripcion").val(cNiveles.Descripcion);
                $("#Abreviatura").val(cNiveles.Abreviatura);
                $("#idicampus").val(cNiveles.idicampus);
                if (cNiveles.Estatus == 1) {
                    $("#Estatus").val('true').change();
                } else {
                    $("#Estatus").val('false').change();
                }
                $("#RVOE").val(cNiveles.RVOE);
                $("#TieneCarreras").val(cNiveles.TieneCarreras);
                $("#GradoMaximo").val(cNiveles.GradoMaximo);
            }
        });
    });

</script>
<script>
    $("#formcNiveles").validator().on("submit", function (event) {
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
            var dataString = $('#formcNiveles').serialize();
            //alert('data ' + dataString);

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updatecNiveles&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Nivel actualizado correctamente', 'success');
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
        location.href = "core_cNiveles_getNiveles.php";
        $("#formcNiveles")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formcNiveles").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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