<?php
include './headers.php';
?>
<div class="card">
    <div class="card-body">
        <form role="form" id="formProfesor" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="pe-7s-add-user bg-c-pink"></i>
                            <div class="d-inline">
                                <h4>Actualizar profesor</h4>
                                <span><a href="editaProfesor.php"><p class="pe-7s-back-2"></p> Regresar</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card card-border-success">
                    <div class="card-body">
                        <h5>Datos personales</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140" >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140" required >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">F. de nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter fecha_nacimiento">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" min="17" max="100">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="genero">Género</label>
                                        <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                            <option value="">Seleccione genero</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="curp">CURP</label>
                                        <input type="text" class="form-control" id="curp" name="curp" placeholder="Opcional" maxlength="20" oninput="validarInput(this)" style="text-transform: uppercase">
                                        <pre id="resultado"></pre>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="rfc">RFC</label>
                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Opcional" maxlength="20" style="text-transform: uppercase" >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nss">Numero de seguridad social</label>
                                        <input type="text" class="form-control" id="nss" name="nss" placeholder="Ingrese nss" style="text-transform: uppercase" >
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="tiposangre">Tipo de sangre</label>
                                        <input type="text" class="form-control" id="tiposangre" name="tiposangre" placeholder="Ingrese tipo de sangre" maxlength="15" style="text-transform: uppercase">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="alergias">Alergias</label>
                                    <input type="text" class="form-control" id="alergias" name="alergias" placeholder="Ingrese alergias" maxlength="200">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Datos de contacto</h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="emergencias">Teléfono de emergencias</label>
                                    <input type="text" class="form-control" id="emergencias" name="emergencias" placeholder="Enter emergencias">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono" maxlength="20">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="movil">Móvil</label>
                                        <input type="tel" class="form-control" id="movil" name="movil" placeholder="Ingrese movil" maxlength="20">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email2">Correo electrónico alterno</label>
                                        <input type="email" class="form-control" id="email2" name="email2" placeholder="Ingrese email2" maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Dirección</h5>
                        <div class="row">
                            <div id="locationField" class="col-sm-12">
                                <label for="email2">Ingrese la dirección</label>
                                <input id="autocomplete" class="form-control" placeholder="Escriba la dirección de la persona" onFocus="geolocate()" type="text"/>
                            </div>
                        </div>

                        <!-- Note: The address components in this sample are typical. You might need to adjust them for
                                   the locations relevant to your app. For more information, see
                             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
                        -->
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="Dirección">Dirección</label>
                                <div class="input-group">
                                    <input type="text" class="form-control col-sm-2" placeholder="#" name="num" id="street_number">
                                    <input type="text" class="form-control" id="route" name="direccion">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="locality" name="ciudad">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="administrative_area_level_1" name="municipio">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="cp">Código Postal</label>
                                    <input type="text" class="form-control" id="postal_code" name="cp">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="country" name="pais">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <h5>Datos Profesionales</h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cedula">Cedula profesional</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Enter cedula" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="grado">Último grado de estudios certificado</label>
                                        <select class="form-control" id="grado" name="grado" placeholder="Ingrese nivel de egreso" required>
                                            <option value="">Seleccione uno</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                            <option value="Maestríaa">Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Sin especificar">Sin especificar</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="perfil">Perfil</label>
                                    <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Describa el área de especialidad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Campus">Seleccione el Plantel</label>
                                        <div id="divCampus"></div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="infoadicional">Información Adicional</label>
                                <textarea class="form-control" rows="2" id="infoadicional" name="infoadicional" placeholder="Ingrese Info Adicional" maxlength="200"></textarea>
                                <div class="help-block with-errors text-danger"></div>
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
<!--<div class="card">
    <div class="card-body">
        <form role="form" id="formProfesor" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="fas fa-swatchbook bg-c-yellow"></i>
                            <div class="d-inline">
                                <h4>Editar Profesor</h4>
                                <span><a href="#"><p class="pe-7s-back-2"></p> Regresar</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card card-border-warning">
                    <div class="card-body">
                        <h5>Datos de la Situación </h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter Nombre" required>
                                    <input type="text" class="form-control" id="idiprofesor" name="idiprofesor" placeholder="Enter idprofesor" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Enter Apellido Paterno" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="apellido_materno">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Enter Apellido Materno" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter Fecha de nacimiento" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Correo Electronico" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Enter Telefono" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" class="form-control" id="edad" name="edad" placeholder="Enter Edad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="genero">Género</label>
                                <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                    <option value="">Seleccione genero</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="Enter CURP" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Enter RFC" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="nss">Número de seguridad social </label>
                                    <input type="text" class="form-control" id="nss" name="nss" placeholder="Enter Número de seguridad social" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="movil">Teléfono Móvil </label>
                                    <input type="text" class="form-control" id="movil" name="movil" placeholder="Enter Teléfono Móvil">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Enter Dirección" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad </label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Enter ciudad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="municipio">Estado</label>
                                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Enter Estado">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cp">Código Postal</label>
                                    <input type="text" class="form-control" id="cp" name="cp" placeholder="Enter Código Postal" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais" placeholder="Enter País" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="tiposangre">Tipo de Sangre</label>
                                    <input type="text" class="form-control" id="tiposangre" name="tiposangre" placeholder="Enter País">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="tiposangre">Alergias</label>
                                    <input type="text" class="form-control" id="tiposangre" name="alergias" placeholder="Enter alergias">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Campus">Seleccione el Plantel</label>
                                    <div id="divCampus"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="perfil">Perfil</label>
                                    <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Describa el área de especialidad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="grado">Último grado de estudios certificado</label>
                                    <select class="form-control" id="grado" name="grado" placeholder="Ingrese nivel de egreso" required>
                                        <option value="">Seleccione uno</option>
                                        <option value="Licenciatura">Licenciatura</option>
                                        <option value="Maestríaa">Maestría</option>
                                        <option value="Doctorado">Doctorado</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Sin especificar">Sin especificar</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="infoadicional">Información adicional</label>
                                    <textarea rows="2" type="textarea" class="form-control" id="infoadicional" name="infoadicional" placeholder="Informacion adicional"></textarea>
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
</div>-->
<?php include './footer.php'; ?>
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
                txt += '<select class="form-control fill" id="idicampus" name="idicampus">';
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
    var idiprofesor = "<?php echo $_GET["idiprofesor"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getprofesorId&idiprofesor=" + idiprofesor,
            success: function (text) {
                //console.log(text);
                var profesor = text.data[0];
                $("#idiprofesor").val(profesor.idiprofesor);
                $("#idicampus").val(profesor.idicampus);
                $("#nombre").val(profesor.nombre);
                $("#apellido_paterno").val(profesor.apellido_paterno);
                $("#apellido_materno").val(profesor.apellido_materno);
                $("#fecha_nacimiento").val(profesor.fecha_nacimiento);
                $("#email").val(profesor.email);
                $("#telefono").val(profesor.telefono);
                $("#edad").val(profesor.edad);
                $("#genero").val(profesor.genero);
                $("#curp").val(profesor.curp);
                $("#rfc").val(profesor.rfc);
                $("#nss").val(profesor.nss);
                $("#movil").val(profesor.movil);
                $("#direccion").val(profesor.direccion);
                $("#ciudad").val(profesor.ciudad);
                $("#municipio").val(profesor.municipio);
                $("#cp").val(profesor.cp);
                $("#pais").val(profesor.pais);
                $("#tiposangre").val(profesor.tiposangre);
                $("#alergias").val(profesor.alergias);
                $("#infoadicional").val(profesor.infoadicional);
                $("#cedula").val(profesor.cedula);
                $("#grado").val(profesor.grado);
                $("#perfil").val(profesor.perfil);
                $("#cabecera").append(nombre + " " + apellido_paterno + " " + apellido_materno);
            }
        });
    });
</script>
<script>
//
//    // This sample uses the Autocomplete widget to help the user select a
//
//    // place, then it retrieves the address components associated with that
//
//    // place, and then it populates the form fields with those details.
//
//    // This sample requires the Places library. Include the libraries=places
//
//    // parameter when you first load the API. For example:
//
//    // <script
//
//    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
//
//
////
    var placeSearch, autocomplete;

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('autocomplete'), {types: ['geocode']});

        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields('address_components');

        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle(
                        {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
    // Bias the autocomplete object to the user's geographical location,

    // as supplied by the browser's 'navigator.geolocation' object.
</script>
<script>
    $("#formProfesor").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Los campos son requeridos");
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
            var dataString = $('#formProfesor').serialize();
            //alert('data ' + dataString);

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updateProfesor&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Profesor actualizado correctamente', 'success');
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
        location.href = "editaProfesor.php";
        $("#formProfesor")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }
    function formError() {
        $("#formProfesor").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCABXOLbXlqxpYVeGDggtlghS5DLASUCxU&libraries=places&callback=initAutocomplete"
async defer></script>
