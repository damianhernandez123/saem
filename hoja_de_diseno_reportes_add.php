<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fas fa-caret-square-up bg-pic"></i>
                    <div class="d-inline">
                        <h4>Reporte de Acusaciones</h4>
                        <a href="#"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card card-border-warning">
            <div class="card-body">
                <form role="form" id="formAlumnoReporte" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cicloAcusar">Ciclo</label>
                                <div id="divNivel"></div>
                                <div class="help-block with-errors text-danger"></div>
                                <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Ciclo">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombreProfesorAcusar">Nombre del Profesor</label>
                                <div id="divProfesor"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion de Incidencia</label>
                                <textarea rows="2" type="textarea" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de Incidencia" required></textarea>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div> 

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="citatorio">¿Aplica citatorio?</label>
                                <br>
                                <label class="switch">
                                    <input type="checkbox" name="citatorio" id="citatorio" value="1" onchange="show_desc()">
                                    <span class="slider round"></span>
                                </label>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div style = "display: none" id="showdivcitatorio" class="form-group col-sm-9">

                            <div class="row" >
                                <div class="col-sm-3" >
                                    <div class="form-group" >
                                        <label for="fechaCita">Fecha de cita</label>
                                        <input type="Date" class="form-control" id="fechaCita" name="fechaCita" placeholder="Enter Fecha de cita" required >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="HorariocitaAcusar">Horario de cita</label>
                                        <input type="time" class="form-control" id="horaCita" name="horaCita" placeholder="Enter Horariocita" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="requiereTutor">¿Presencia de Tutor?</label>
                                        <select class="form-control" id="requiereTutor" name="requiereTutor" placeholder="" >                                           
                                            <!--                                            <option value="null">Seleccione una opción</option>-->
                                            <option value="false">No</option>
                                            <option value="true">Si</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="suspencionAcusar">¿Aplica Suspencion?</label>
                                <br>
                                <label class="switch">
                                    <input type="checkbox" name="suspension" id="suspension" value="1" onchange="show_descsus()">
                                    <span class="slider round"></span>
                                </label>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div style = "display: none" id="showdivsuspencion" class="form-group col-sm-10">
                            <div class="row" >
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fechaInicioSuspension">Fecha incial suspencion</label>
                                        <input type="Date" class="form-control" id="fechaInicioSuspension" name="fechaInicioSuspension" placeholder="" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div> 
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fechaFinSuspension">Fecha final suspencion</label>
                                        <input type="Date" class="form-control" id="fechaFinSuspension" name="fechaFinSuspension" placeholder="" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Observaciones">Observaciones</label>
                                <textarea type="textarea" class="form-control" id="Observaciones" name="Observaciones" placeholder="Anexar observaciones en caso de ser nesesario" required></textarea>
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
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
                                        var idialumno = "<?php echo $_GET['idialumno'] ?>";
                                        $("#idialumno").val(idialumno);
                                        $(document).ready(function () {
                                            getNivel();
                                        });

                                        function getNivel() {
                                            $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
                                            $.ajax({
                                                type: "GET",
                                                url: "dataConect/API.php",
                                                data: "action=getCicloByEstatus",
                                                success: function (text) {
                                                    //console.log(text);
                                                    var date = text.data;
                                                    var txt = "";
                                                    txt += '<select class="form-control fill" id="idiciclo" name="idiciclo">';
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
    $(document).ready(function () {
        getProfesor();
    });

    function getProfesor() {
        $("#divProfesor").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getProfesores",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idiprofesor" name="idiprofesor">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiprofesor + '">' + date[x].nombre + '</option>';
                }
                txt += "</select>";
                $("#divProfesor").html(txt);
            }
        });
    }
</script>
<script>
    $("#formAlumnoReporte").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm() {
        // Initiate Variables With Form Content
        var dataString = $('#formAlumnoReporte').serialize();


        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addcReporte&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'El reporte se agrego correctamente', 'success');

                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                }
            }
        });
    }

    function formSuccess() {
        location.href = "hoja_de_diseño_get_reportes.php";
        $("#formAlumnoReporte")[0].reset();
    }

    function formError() {
        $("#formAlumnoReporte").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
<script>
    function show_desc() {
        var x = document.getElementById("showdivcitatorio");
        if (x.style.display === "none") {
            value = "false"
            x.style.display = "block";
        } else {
            x.style.display = "none";
            value = "true";
        }
    }


</script>
<script>
    function show_descsus() {
        var x = document.getElementById("showdivsuspencion");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }


</script>