<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fas fa-chalkboard bg-pic"></i>
                    <div class="d-inline">
                        <h4>Catálogo de Niveles</h4>
                        <a href="core_cGrados_getcGrados.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card card-border-warning">
            <div class="card-body">
                <form role="form" id="formcGrados" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Nivel</label>
                                <div id="divNivel"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione la Carrera</label>
                                <div id="divCarrera"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Emisor</label>
                                <div id="divEmisor"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Lugar de expedicion Id</label>
                                <div id="divLugarExpedicion"></div>
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
                                <label for="TieneCarreras">Tiene carreras?</label>
<!--                                    <input type="text" class="form-control" id="Estatus" name="Estatus" placeholder="Enter Estatus">-->
                                <select class="form-control" id="TieneCarreras" name="TieneCarreras" placeholder="" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="true">Si</option>
                                    <option value="false">No</option>
                                </select>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>}
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="RVOE">RVOE</label>
                                <input type="text" class="form-control" id="RVOE" name="RVOE" placeholder="Enter Abreviatura" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Abreviatura">Nivel de facturacion</label>
                                <input type="text" class="form-control" id="Abreviatura" name="Abreviatura" placeholder="Enter Abreviatura" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Abreviatura">Clasificacion de Nivel</label>
                                <input type="text" class="form-control" id="ClasificacionNivel" name="ClasificacionNivel" placeholder="Enter Abreviatura" required>
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