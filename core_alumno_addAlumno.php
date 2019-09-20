<?php include 'headers.php'; ?>
<!--<div class="card">
    <div class="card-header bg-fos text-light">Inscripción de alumnos</div>
</div>-->


<style type="text/css">
    #signArea{
        width:304px;
        margin: 50px auto;
    }
    .sign-container {
        width: 60%;
        margin: auto;
    }
    .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
    }
    .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
    }
</style>
<div class="card">
    <div class="card-body">
        <form role="form" id="FormInscrpcion" data-toggle="validator" class="shake" autocomplete="off">
            <div class="d-flex">
                <div class="p-2 mr-auto">
                    <div class="page-header-title">
                        <i class="pe-7s-study bg-c-pink"></i>
                        <div class="d-inline">
                            <h4>Alumno de nuevo Ingreso</h4>
                            <span>Seleccione a un aspirante de la lista</span><br>
                            <span><a href="core_alumnos_getAlumnos.php"><p class="pe-7s-back-2"></p> Regresar</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card card-border-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Datos del Alumno</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="apellidos">Nombre</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                        <input type="hidden" class="form-control" id="idigenerales" name="idigenerales">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal" id="abreAspirantes">Aspirantes <i class="pe-7s-search"></i></button> 
                                        </div>
                                    </div>
                                </div>                                            
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido paterno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140" readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <center> <label for="certificado">Desea inscribir al alumno a Moodle? No / Sí</label></center><br>
                                    <label class="switch float-right">
                                        <input type="checkbox" name="moodle" id="moodle" value="si">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <?php
                                $beca = '
                                <div class="col-sm-3">
                                    <div class="form-group" data-toggle="tooltip" data-placement="top" title="Puede asignar un porcentaje de descuento a las colegiaturas del estudiante">
                                        <label for="beca_colegiatura">Beca en colegiatura</label>
                                        <input type="number" value="0" min="0" max="100" class="form-control" id="beca_colegiatura" name="beca_colegiatura" placeholder="Enter beca_colegiatura" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>';
                                if ($globalIdirole == 2) {
                                    echo $beca;
                                }
                                ?>
                                <hr>
                                <h4>Datos Escolares</h4>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="idicampus">Plantel</label>
                                            <div id="selectPlantel"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="nivelegreso">Carrera</label>
                                            <div id="Oferta-Academica"></div>
                                            <input type="hidden" class="form-control" id="carrera" name="carrera"  readonly="true">
                                            <input type="hidden" class="form-control" id="categoria" name="categoria"   readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nivelegreso">Ciclo escolar</label>
                                                <div id="divCiclo"></div>
                                                <input type="hidden" class="form-control" id="periodo" name="periodo">
                                                <input type="hidden" class="form-control" id="clave" name="clave" placeholder="Enter clave" required>
                                                <input type="hidden" class="form-control" id="nivel" name="nivel" placeholder="Enter nivel" required>
                                                <input type="hidden" class="form-control" id="idiCarrera" name="idiCarrera" placeholder="Enter idiCarrera" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="cuatrimestre" name="cuatrimestre" value="1" placeholder="Ingrese cuatrimestre" required readonly="true">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="turno">Turno</label>
                                                <div id="seleTurno"></div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="vigencia">Plan de Pago</label>
                                            <div id="selePlan"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="codigo_credencial">Número de la credencial</label>
                                            <input type="text" class="form-control" id="codigo_credencial" name="codigo_credencial" placeholder="Ingrese codigo_credencial">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 bg-light border">
                                <input type="hidden" name="image" class="image-tag">
                                <input type="hidden" name="titulo" value="imagen_perfil">
                                <input type="hidden" name="signaturePicture" id="signaturePicture">
                                <div id="results" class="text-success text-center">La imagen capturada aparecerá aquí ... <br> Recuerde habilitar el permiso para usar la Camara</div><br>
                                <div class="btn-group">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#photo"><i class="fa fa-camera-retro"></i> Tomar Foto</button>   
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#signature"><i class="fa fa-pencil"></i> Tomar Firma</button>  
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div id="spinner-form"></div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
        </form>
    </div>
</div>



<!-- The Modal -->
<div class="modal" id="photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Capturar foto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <div id="my_camera"></div>
                    <div id="results" class="text-success text-center"></div>
                    <input class="btn btn-primary" type=button value="Tomar foto" onClick="take_snapshot()">
                </center>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un aspirante</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="Solpes"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione Un alumno de la lista</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="TablaAlumnos"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="signature">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tomar Firma</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <center class="sigPad">
                    <div id="signArea">
                        <div class="sig sigWrapper" style="height:auto;">
                            <div class="typed"></div>
                            <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                        </div>
                    </div>
                    <div class="btn btn-group">
                        <button class="btn btn-primary btn-sm" id="btnSaveSign">Tomar firma</button>
                        <button class="btn btn-warning btn-sm clearButton"><a href="#clear">Limpiar</a></button>
                    </div>
                </center>
            </div>

        </div>
    </div>
</div>


<?php include './footer.php'; ?>
<script src="asset/js/getCicloEscolar.js"></script>
<script src="asset/js/addalumno_getaOferta.js"></script>
<script src="asset/js/addalumno_setNivel.js"></script>
<script src="asset/js/validaCURP.js"></script>
<script src="asset/js/webcam.min.js"></script>
<script src="asset/js/addalumno_webcam.js"></script>
<script src="asset/js/addalumno_forrms.js"></script>



<link href="sign/css/jquery.signaturepad.css" rel="stylesheet">
<script src="sign/js/numeric-1.2.6.min.js"></script> 
<script src="sign/js/bezier.js"></script>
<script src="sign/js/jquery.signaturepad.js"></script> 

<script src="asset/js/html2canvas.js"></script>
<script src="sign/js/json2.min.js"></script>
<script src="asset/js/sign-area.js"></script>
<script>
                        $(document).ready(function () {
                            seleTurno();
                        });
                        function seleTurno() {
                            $("#seleTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
                            $.ajax({
                                type: "GET",
                                url: "dataConect/API.php",
                                data: "action=getTurno",
                                success: function (text) {
                                    console.log(text);
                                    var date = text.data;
                                    var txt = "";
                                    txt += ' <select class="form-control" id="turno" name="turno" required>';
                                    txt += '<option value="">Seleccione</option>';
                                    for (x in date) {
                                        txt += '<option value="' + date[x].Descripcion + '"><i class="text-info">' + date[x].Descripcion + '</i></option>';
                                    }
                                    txt += "</select>";
                                    document.getElementById("seleTurno").innerHTML = txt;
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                    //alert("No fue posible conectar con el servidor");
                                    document.getElementById("divCiclo").innerHTML = '0 turnos <a href="core_cTurno_getcTurno.php" class="btn btn-sm btn-info">Crear uno nuevo?</a>';
                                }
                            });
                        }
</script>
