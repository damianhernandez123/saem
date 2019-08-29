<?php
include './headers.php';
?>
<div class="row">

    <div class="col-12">
        <div class="card card-border-success">
            <div class="card-header bg-white cfos"> <h4 class="float-left">Listado de Carreras</h4> <span class="float-right"><a href="core_Carrera_addCarrera.php" class="btn btn-success btn-sm">Agregar nueva Carrera <i class="pe-7s-plus"></i></a></span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nivel">Seleccione el Campus</label>
                            <div id="divCampus"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div id="loadTableCarrera"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>

<script>
    $(document).ready(function () {
        getcarrera();
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
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required" onchange="getcarrera()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $("#divCampus").html(txt);
            }
        });
    }
    function getcarrera() {
        var idicampus = $("#idicampus").val();
        //alert (idicampus);
        $("#loadTableCarrera").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCarrerabyidicampus&idicampus=" + idicampus,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tableCarrera" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Nivel</th><th>Numero</th><th>clave</th><th>Nombre</th><th>Duraccion</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idicarrera + ' <a href="core_Carrera_updateCarrera.php?idicarrera=' + date[x].idicarrera + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
               <button class="btn btn-link" onclick="deleteCarrera(' + date[x].idicarrera + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].numero_carrera + "</td>";
                    txt += "<td>" + date[x].clave + "</td>";
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].duracion + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableCarrera").innerHTML = txt;
                var table = $('#tableCarrera').DataTable({
                    responsive: true,
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

                $('#tableCarrera tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
                    $("#idiservicio").val(datos[0]);
                    $("#descripcion").val(datos[1]);
                    $("#precio").val(datos[2]);
                    //$("#infoAlumno").html('<strong>Alumno:</strong> ' + datos[1] + " " + datos[2] + " " + datos[3] + ' <strong>Matrícula: </strong>' + datos[5] + ' <strong>Carrera: </strong>' + datos[4]);
                    $("#modalMateriales .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("loadTableCarrera").innerHTML = '0 Carreras';
            }
        });
    }
</script>
<script>

    function deleteCarrera(idicarrera) {
        var txt;
        var r = confirm("Desea eliminar la carrera? " + idicarrera);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteCarrera&idicarrera=" + idicarrera,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Carrera Eliminado', 'success');
                        getcarrera();
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