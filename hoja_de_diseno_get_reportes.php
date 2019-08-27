<?php
include './headers.php';
?>
<div class="row">
    <div class="col-12">
        <div class="card card-border-success">
            <div class="card-header bg-white cfos"> <h4 class="float-left">Lista de Reportes</h4> <span class="float-right"></span></div>
            <div class="card-body">
                <div class="float-right">
                    <div class="btn-group btn-group-sm">
                    </div>
                </div>
                <div id="loadTableAlumnoReporte"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <form role="form" id="updateReportelumno" data-toggle="validator" class="shake" autocomplete="off">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="precentoTutor">¿Se presento el Tutor?</label>
                                <select class="form-control" id="precentoTutor" name="precentoTutor" placeholder="Seleccione una opción">
                                    <option value="" >Seleccione una opción</option>
                                    <option value="true">Si</option>
                                    <option value="false">No</option>
                                </select>
                                <div class="help-block with-errors text-danger"></div>
                                <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                <input type="hidden" class="form-control" id="idiAlumnoReporte" name="idiAlumnoReporte" placeholder="Enter idialumno" required>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right" >Guardar datos</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getReporteByIdAlumno();
    });
    function getReporteByIdAlumno() {
        var idialumno = "<?php echo $_GET['idialumno'] ?>";
        $("#loadTableAlumnoReporte").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getReporteByIdAlumno&idialumno=" + idialumno,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<hr><div class="table-responsive"> <table id="tableReporteAlumno" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>codigo</th><th>Acciones</th><th>Se presento tutor</th><th>Fecha</th><th>Ciclo</th><th>Profesor</th><th>Descripcion</th><th>Requiere citatorio</th><th>fecha citatorio</th><th>hora de citatorio</th><th>requiere tutor?</th><th>suspension?</th><th>Fecha inicio de supencion</th><th>Fecha fin de supencion</th><th>Observaciones</th></tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr id="row">';
                    txt += "<td >" + date[x].idiAlumnoReporte +"</td>";
                    txt += "<td>" + (a + 1) + ' <i class="pe-7s-note pe-2x pe-va" title="Editar" data-toggle="modal" data-target="#myModal"></i>\n\
                <button class="btn btn-link" onclick="deleteAlumnoReporte(' + date[x].idiAlumnoReporte + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    if (date[x].precentoTutor == 0) {
                        txt += '<td class="table-danger"> No </td>';
                        $("#row").addClass("table-danger");
                    } else {
                        txt += '<td class="table-success"> Si </td >';
                        $("#row").addClass("table-success");
                    }
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "<td> " + date[x].idiciclo + "</td>";
                    txt += "<td>" + date[x].idiprofesor + "</td>";
                    txt += "<td>" + date[x].descripcion + "</td>";
                    if (date[x].citatorio == 0) {
                        txt += "<td> No </td>";
                    } else {
                        txt += "<td> Si </td>";
                    }
                    txt += "<td>" + date[x].fechaCita + "</td>";
                    txt += "<td>" + date[x].horaCita + "</td>";
                    if (date[x].requiereTutor == 0) {
                        txt += "<td> No </td>";
                    } else {
                        txt += "<td> Si </td>";
                    }
                    if (date[x].suspension == 0) {
                        txt += "<td> No </td>";
                    } else {
                        txt += "<td> Si </td>";
                    }
                    txt += "<td>" + date[x].fechaInicioSuspension + "</td>";
                    txt += "<td>" + date[x].fechaFinSuspension + "</td>";
                    txt += "<td>" + date[x].Observaciones + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"

                document.getElementById("loadTableAlumnoReporte").innerHTML = txt;
                var table = $('#tableReporteAlumno').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['excel'],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
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

                $('#tableReporteAlumno tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    $("#idiAlumnoReporte").val(datos[0]);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableAlumnoReporte").innerHTML = '0 Results';
            }
        });
    }
</script>
<script>
    function deleteAlumnoReporte(idiAlumnoReporte) {
        var txt;
        var r = confirm("Desea eliminar el Reporte? " + idiAlumnoReporte);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteAlumnoReporte&idiAlumnoReporte=" + idiAlumnoReporte,
                success: function (text) {
                    if (text == "success") {
                        getReporteByIdAlumno();
                        swalert('Exito!', 'Reporte Eliminado', 'success');
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }
</script>
<!--/////////////////////ACTUALIZAR O REALIZAR UPDATE A precentoTutor/////////////////////-->
<script>
    var idialumno = "<?php echo $_GET['idialumno'] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcTablaAlumnoReporte&idialumno=" + idialumno,
            success: function (text) {
                var alumReport = text.data[0];
                $("#idiAlumnoReporte").val(alumReport.idiAlumnoReporte);
                $("#idialumno").val(alumReport.idialumno);
                if (alumReport.precentoTutor == '0') {
                    $("#precentoTutor").val('true').change();
                } else {
                    $("#precentoTutor").val('false').change();
                }
            }
        });
    });

</script>
<script>
    $("#updateReportelumno").validator().on("submit", function (event) {
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

            var dataString = $('#updateReportelumno').serialize();

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updateAlumnoReporte&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        $(".modal").modal('hide');
                        swalert("Exito!", 'Reporte actualizado correctamente', 'success');
                        getReporteByIdAlumno();

                    } else {
                        formError();
                        swalert("Mensaje!", text, 'info');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function formSuccess() {
        $("#updateReportelumno")[0].reset();
    }

    function formError() {
        $("#updateReportelumno").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
