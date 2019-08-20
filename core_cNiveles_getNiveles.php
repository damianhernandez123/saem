<?php
include './headers.php';
?>
<div class="row">

    <div class="col-12">
        <div class="card card-border-success">
            <div class="card-header bg-white cfos"> <h4 class="float-left">Listado de Niveles</h4> <span class="float-right"><a href="core_cNiveles_addcNiveles.php" class="btn btn-success btn-sm">Agregar nuevo Nivel <i class="pe-7s-plus"></i></a></span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nivel">Seleccione el Campus</label>
                            <div id="divNivel"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div id="loadTablecNiveles"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getAulas();
        getNivel();
    });
    function getAulas() {
        var idicampus = $("#idicampus").val();
        //alert (idicampus);
        $("#loadTablecNiveles").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcNivelesbyidicampus&idicampus=" + idicampus,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tableAulas" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Descripción</th><th>Abreviatura</th><th>RVOE</th><th>Estatus</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].NivelId + ' <a href="core_cNiveles_updateNivel.php?NivelId=' + date[x].NivelId + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
                <button class="btn btn-link" onclick="deletecNiveles(' + date[x].NivelId + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].Abreviatura + "</td>";
                    txt += "<td>" + date[x].RVOE + "</td>";
                    if(date[x].Estatus == 0){
                    txt += "<td> Inactivo </td>";    
                    //txt += "<td>" + date[x].Estatus  + "</td>";
                }else{
                    txt += "<td> Activo </td>";
                }
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTablecNiveles").innerHTML = txt;
                var table = $('#tableAulas').DataTable({
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

                $('#tableAulas tbody').on('click', 'tr', function () {
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
                document.getElementById("loadTablecNiveles").innerHTML = '0 Niveles';
            }
        });
    }


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
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required onchange="getAulas()">';
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

    function deletecNiveles(NivelId) {
        var txt;
        var r = confirm("Desea eliminar el Nivel? " + NivelId);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletecNiveles&NivelId=" + NivelId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Nivel Eliminado', 'success');
                        getAulas();
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