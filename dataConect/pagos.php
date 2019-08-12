<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagos
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class pagos {

    public $idiControlEscolar; //usuario de control escolar logueado
    public $NombreControlEscolar; //Nombre de control escolar logueado

    public function __construct() {
        date_default_timezone_set('America/Mexico_City');
        include '../BackEndSAP/session.php';
        $this->idiControlEscolar = $globalIdiUsurio;
        $this->NombreControlEscolar = $globalNombre;
        error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'userconected') {
                    $this->getUserConected();
                }
                if ($action == 'getServiciosEscolares') {
                    $this->getServiciosEscolares();
                }
                if ($action == 'getServiciosEscolares2') {
                    $this->getServiciosEscolares2();
                }
                if ($action == 'getCxC') {
                    $this->getCxC();
                }
                if ($action == 'getpartidasServicios') {
                    $this->getpartidasServicios();
                }
                if ($action == 'getSubtotalVentaASservicio') {
                    $this->getSubtotalVentaASservicio();
                }
                if ($action == 'getPago') {
                    $this->getPago();
                }
                if ($action == 'getCobrosPendientesToAlumnoById') {
                    $this->getCobrosPendientesToAlumnoById();
                }
                if ($action == 'getSubTotalOfServiciosByAlumno') {
                    $this->getSubTotalOfServiciosByAlumno();
                }
                if ($action == 'getServiciosEscolaresbyIdAlumno') {
                    $this->getServiciosEscolaresbyIdAlumno();
                }
                if ($action == 'getCuentasPorCobrar') {
                    $this->getCuentasPorCobrar();
                }
                if ($action == 'getPartidasPagadas') {
                    $this->getPartidasPagadas();
                }
                if ($action == 'getTotalAbonoByIdFolio') {
                    $this->getTotalAbonoByIdFolio();
                }
                if ($action == 'getTotalAbonoByIdVenta') {
                    $this->getTotalAbonoByIdVenta();
                }
                if ($action == 'getTotalPagosByIdIdVenta') {
                    $this->getTotalPagosByIdIdVenta();
                }
                if ($action == 'getSubTotalPagosByIdIdVenta') {
                    $this->getSubTotalPagosByIdIdVenta();
                }
                if ($action == 'getServiciosEscolaresByID') {
                    $this->getServiciosEscolaresByID();
                }
                if ($action == 'getPagosLiquidados') {
                    $this->getPagosLiquidados();
                }
                if ($action == 'validAdeudos') {
                    $this->validAdeudos();
                }
                if ($action == 'getPartidasPendientesByIdiAlumno') {
                    $this->getPartidasPendientesByIdiAlumno();
                }
                if ($action == 'getPartidasPendientesByMatricula') {
                    $this->getPartidasPendientesByMatricula();
                }
                /*                 * ******cxc***** */
                if ($action == 'getSubtotalVent') {
                    $this->getSubtotalVent();
                }
                if ($action == 'getHistorialPagosByIdiAlumno') {
                    $this->getHistorialPagosByIdiAlumno();
                }
                if ($action == 'getVASByIDI') {
                    $this->getVASByIDI();
                }
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'generarFolioPago') {
                    $this->generarFolioPago();
                }
                if ($action == 'setVentaAsServicio') {
                    $this->setVentaAsServicio();
                }
                if ($action == 'eliminarPartida') {
                    $this->eliminarPartida();
                }
                if ($action == 'setPago') {
                    $this->setPago();
                }
                if ($action == 'cobraServicio') {
                    $this->cobraServicio();
                }
                if ($action == 'cancelaCobroServicio') {
                    $this->cancelaCobroServicio();
                }
                if ($action == 'addServicio') {
                    $this->addServicio();
                }
                if ($action == 'updateServicio') {
                    $this->updateServicio();
                }
                //****************cxc
                if ($action == 'agregaServicio') {
                    $this->agregaServicio();
                }
                if ($action == 'quitaServicio') {
                    $this->quitaServicio();
                }
                if ($action == 'quitaRecargoPartida') {
                    $this->quitaRecargoPartida();
                }
                if ($action == 'agregaRecargoPartida') {
                    $this->agregaRecargoPartida();
                }
                if ($action == 'deleteVASByID') {
                    $this->deleteVASByID();
                }
                if ($action == 'uptadePriceRecargoVAS') {
                    $this->uptadePriceRecargoVAS();
                }
                if ($action == 'setEstatusFactura') {
                    $this->setEstatusFactura();
                }
                if ($action == 'uploadFileStudent') {
                    $this->uploadFileStudent();
                }
                if ($action == 'addNewPlanPago') {
                    $this->addNewPlanPago();
                }
                break;
            case 'PUT':
                break;
            case 'DELETE'://elimina
                echo 'DELETE';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    /**
     * cambiar estatus de la partida a pagado
     * sumar el total al abono
     * restar el abono al total
     */
    function cobraServicio() {
        $errorMSG = "";
        //total
        if (empty($_POST["total"])) {
            $errorMSG = "total is required ";
        } else {
            $total = $_POST["total"];
        }
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->cambiaStatusPArtida($idiventa_as_servicio, "Pagado");
            //sumar el total al abono
            $abono = $this->SumaAbono($total, $folio);
            if ($estatus && $abono) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * cambiar estatus de la partida a pagado
     * restar el total al abono
     * sumar el abono al total
     */
    function cancelaCobroServicio() {
        $errorMSG = "";
        //total
        if (empty($_POST["total"])) {
            $errorMSG = "total is required ";
        } else {
            $total = $_POST["total"];
        }
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->cambiaStatusPArtida($idiventa_as_servicio, "Pendiente");
            $abono = $this->RestaAbono($total, $folio);
            if ($estatus && $abono) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function cambiaStatusPArtida($idiventa_as_servicio, $estatus) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET estatus = '" . $estatus . "', fecha_mod = NOW() WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
        if ($conn->query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }

    function getPartidasPagadas() {
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pagado' and fecha_mod = NULL and idiventa = $idiventa";
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.recargo, venta_as_servicio.total, venta_as_servicio.fecha_mod FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pendiente' AND venta_as_servicio.fecha_mod <=> NULL and idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalAbonoByIdFolio() {
        $errorMSG = "";
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG = "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "select abono from pagos WHERE folio = '" . $folio . "'";
            $result = $conn->query($sql);
            $abono = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $abono = $row["abono"];
                }
                return $abono;
            } else {
                return "0 results";
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalPagosByIdFolio() {
        $errorMSG = "";
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG = "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "select subtotal as total  from pagos WHERE folio = '" . $folio . "'";
            $result = $conn->query($sql);
            $abono = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $abono = $row["total"];
                }
                return $abono;
            } else {
                return "0 results";
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function SumaAbono($total, $folio) {
        //$this->comparaSiTotal_Abono_son_Iguales($folio);
        $abono = $this->getTotalAbonoByIdFolio();
        $deuda = $this->getTotalPagosByIdFolio();
        //sumamos catidad + totalAbono
        $suma = $abono + $total;
        //restamos cantidad al total
        $resta = $deuda - $total;

        //trigger exception in a "try" block
        try {
            include './conexion.php';
            $sql = "UPDATE pagos SET abono = '" . $suma . "' WHERE pagos.folio = '" . $folio . "';";
            //$sql .= "UPDATE pagos SET subtotal = '" . $resta . "', total = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            $sql .= "UPDATE pagos SET subtotal = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            if ($conn->multi_query($sql) === TRUE) {
                return true;
//                echo " New records created successfully ";
//                echo " mis abonos son de $abono";
//                echo " pero pago la cantidad de: $total";
//                echo " mi deuda total era de $deuda";
//                echo " pero ahora solo debo $resta";
            } else {
                return false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    function RestaAbono($total, $folio) {
        $abono = $this->getTotalAbonoByIdFolio();
        $deuda = $this->getTotalPagosByIdFolio();
        //Restamos catidad + totalAbono
        $suma = $abono - $total;
        //sumamos cantidad al total
        $resta = $deuda + $total;

        //trigger exception in a "try" block
        try {
            include './conexion.php';
            $sql = "UPDATE pagos SET abono = '" . $suma . "' WHERE pagos.folio = '" . $folio . "';";
            //$sql .= "UPDATE pagos SET subtotal = '" . $resta . "', total = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            $sql .= "UPDATE pagos SET subtotal = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            if ($conn->multi_query($sql) === TRUE) {
                return true;
                echo " New records created successfully ";
                echo " mis abonos son de $abono";
                echo " pero pago la cantidad de: $total";
                echo " mi deuda total era de $deuda";
                echo " pero ahora solo debo $resta";
            } else {
                return false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    function getTotalAbonoByIdVenta() {
        $errorMSG = "";
        //folio
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select abono from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalPagosByIdIdVenta() {
        $errorMSG = "";
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select total from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getSubTotalPagosByIdIdVenta() {
        $errorMSG = "";
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select subtotal from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * inserta una partida a la tabla de venta_as_servicio
     * $_POST["idialumno"]
     * $_POST["idiservicio"];
     * $_POST["idiventa"];
     * $_POST["unidad"];
     * $_POST["precio"];
     * $total = $unidad * $precio;
     */
    function setVentaAsServicio() {
        $errorMSG = "";
//idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
//idiservicio
        if (empty($_POST["idiservicio"])) {
            $errorMSG .= "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
//idiventa
        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
//unidad
        if (empty($_POST["unidad"])) {
            $errorMSG .= "unidad is required ";
        } else {
            $unidad = $_POST["unidad"];
        }
//precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        $total = $unidad * $precio;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO venta_as_servicio (idialumno, idiservicio, idiventa, precio, unidad, descuento, total, idiuser, estatus, comentario) VALUES ('" . $idialumno . "', '" . $idiservicio . "', '" . $idiventa . "', '" . $precio . "', '" . $unidad . "', '0', '" . $total . "', '" . $this->idiControlEscolar . "', 'Pagado', '')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Genera folio de pago
     * al momento de cargar la pagina de pago.php
     */
    function generarFolioPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $cons = $this->lastIdVenta();
        $key = $this->generarCodigo(6);
        $folio = $key . '-' . $cons;
        $sql = "INSERT INTO venta (folio) VALUES ('" . strtoupper($folio) . "')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id; // devuelve el id de registro
            $folio = $this->getFolioPago($last_id);
            print_r($folio);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Consulta y retorna el utimo folio ingresado
     * a la base de datos
     * @param type $last_id
     * @return string
     */
    function getFolioPago($last_id) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT * FROM venta WHERE idiventa = $last_id";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            return json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            return "0 results";
        }
        $conn->close();
    }

    /**
     * retorna el ultimo id para generar consecutivo
     * @return int
     */
    function lastIdVenta() {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT MAX(idiventa) FROM venta";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["MAX(idiventa)"];
            }
            return $rows;
        } else {
            return $row + 1;
        }
        $conn->close();
    }

    /**
     * Genera una cadena unica de 6 digitos
     * para armar el numero de folio
     * @param type $longitud
     * @return string
     */
    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return "UCP-" . $key;
    }

    /**
     * Devuelve el catalogo de servicios escolares
     */
    function getServiciosEscolares() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM servicios";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getServiciosEscolares2() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM servicios where categoria = 'colegiatura'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getServiciosEscolaresByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_GET["idiservicio"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM servicios where idiservicio=$idiservicio";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getServiciosEscolaresbyIdAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiservicio, servicios.descripcion, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha, venta_as_servicio.idiuser, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.estatus from venta_as_servicio,servicios where venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pendiente' and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Devuelve las partidas por usuario por venta
     * $_GET["idiventa"]
     * $_GET["idialumno"]
     */
    function getpartidasServicios() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and idiventa = " . $idiventa . " and idialumno = " . $idialumno;
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * devuelve el sub total de la venta
     * $_GET["idiventa"]
     * $_GET["idialumno"]
     */
    function getSubtotalVentaASservicio() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }

        if ($errorMSG == "") {
            $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE idiventa = $idiventa and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Elimina una partida 
     */
    function eliminarPartida() {
        include './conexion.php';
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            // sql to delete a record
            $sql = "DELETE FROM venta_as_servicio WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                //$this->updateEstatusToPagadoOfPartida($idiventa_as_servicio);
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion cambia el estatus de Pagado a Pendiente, de la partida eliminada 
     */
    function updateEstatusToPagadoOfPartida($idiventa_as_servicio) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente' WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        if ($conn->query($sql) === TRUE) {
            echo "UPDATE venta_as_servicio success";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    /**
     * Esta funcion guarda el kardex de de cuentas pendientes de pago  
     * que se le HAYAN asignado a algun alumno
     * En formato JSON
     */
    function setPago() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
        //matricula
        if (empty($_POST["matricula"])) {
            $errorMSG .= "matricula is required ";
        } else {
            $matricula = $_POST["matricula"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }//estatus
        if (empty($_POST["estatus"])) {
            $estatus = "Pagado";
        } else {
            $estatus = $_POST["estatus"];
        }//descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = $_POST["descuento"];
        }//total
        if (empty($_POST["total"])) {
            $errorMSG .= "total is required ";
        } else {
            $total = $_POST["total"];
        }//subtotal
        if (empty($_POST["subtotal"])) {
            $subtotal = $total;
        } else {
            $subtotal = $total;
        }//metodo_pago
        if (empty($_POST["metodo_pago"])) {
            $errorMSG .= "metodo_pago is required ";
        } else {
            $metodo_pago = $_POST["metodo_pago"];
        }
        //comentarios
        if (empty($_POST["comentarios"])) {
            $comentarios = "";
        } else {
            $comentarios = $_POST["comentarios"];
        }
        //iditransaccion
        if (empty($_POST["iditransaccion"])) {
            $iditransaccion = "";
        } else {
            $iditransaccion = strtoupper($_POST["iditransaccion"]);
        }
        //digitos
        if (empty($_POST["digitos"])) {
            $digitos = "";
        } else {
            $digitos = strtoupper($_POST["digitos"]);
        }
        //titular_tarjeta
        if (empty($_POST["titular_tarjeta"])) {
            $titular_tarjeta = "";
        } else {
            $titular_tarjeta = strtoupper($_POST["titular_tarjeta"]);
        }
        //banco
        if (empty($_POST["banco"])) {
            $banco = "N/A";
        } else {
            $banco = $_POST["banco"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO pagos (idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, idiusuario, iditransaccion, digitos, titular_tarjeta, banco) VALUES ('" . $idiventa . "', '" . $matricula . "','" . $folio . "', '" . $estatus . "', '" . $subtotal . "', '" . $descuento . "', '" . $total . "', '" . $metodo_pago . "', '" . $comentarios . "', '" . $this->NombreControlEscolar . "', '$iditransaccion', '$digitos', '$titular_tarjeta', '$banco')";
            if ($conn->query($sql) === TRUE) {
                echo "Cobro agregado correctamente";
                //updateFechaPagoVAS($idiventa);
                $this->updateFechaPagoVAS($idiventa);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateFechaPagoVAS($idiventa) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET fecha_mod = NOW(), estatus = 'Pagado' WHERE idiventa = '$idiventa'";
        if ($conn->query($sql) === TRUE) {
            echo "Cobro agregado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Esta funcion muestra los folios de cuentas pendientes de pago en General 
     * que se le han asignado a todos los alumno
     * En formato JSON
     */
    function getPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT idipago, idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, fecha, idiusuario FROM pagos where estatus = 'Pendiente'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getPagosLiquidados() {
        header('Content-Type: application/json');
        include './conexion.php';
        //$sql = "SELECT idipago, idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, fecha, idiusuario, banco, iditransaccion, titular_tarjeta, digitos FROM pagos where estatus = 'Pagado' ORDER BY idipago ASC";
        $sql = "SELECT * FROM pagos where estatus = 'Pagado' ORDER BY idipago ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getUserConected() {
        print_r($this->idiControlEscolar);
    }

    /**
     * Esta funcion muestra el detalle los servicios pendientes de pago 
     * que se le han asignado al alumno
     * en formato JSON
     */
    function getCobrosPendientesToAlumnoById() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa, alumno.idialumno, alumno.nombre, alumno.apellido_paterno, alumno.apellido_materno, alumno.matricula, servicios.idiservicio, servicios.descripcion, venta_as_servicio.idiventa_as_servicio,venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.estatus, servicios.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha, user.Nombre as nom, user.apellido_paterno as app , user.apellido_materno as apm FROM venta_as_servicio, alumno, servicios, user WHERE venta_as_servicio.idiuser = user.idiuser AND servicios.idiservicio = venta_as_servicio.idiservicio and alumno.idialumno = venta_as_servicio.idialumno and alumno.idialumno = $idialumno ORDER BY idiventa_as_servicio ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion muestra las cuentas por cobrar de los servicios pendientes de pago 
     * que se le han asignado al alumno
     * en formato JSON
     */
    function getCuentasPorCobrar() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT * FROM pagos WHERE matricula = '" . $matricula . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion suma total los servicios pendientes de pago 
     * que se le han asignado al alumno
     * En formato JSON
     */
    function getSubTotalOfServiciosByAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE estatus='Pendiente'and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Consulta el detalle de partida de la cuenta por cobrar
     * de los cargos asignados al alumno
     */
    function getCxC() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus='Pendiente' and idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addServicio() {
        $errorMSG = "";
        //descripcion
        if (empty($_POST["descripcion"])) {
            $errorMSG = "descripcion is required ";
        } else {
            $descripcion = strtoupper($_POST["descripcion"]);
        }
        //precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        //descuento
        if (empty($_POST["es_facturable"])) {
            $es_facturable = "No";
        } else {
            $es_facturable = $_POST["es_facturable"];
        }
        //descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = strtoupper($_POST["descuento"]);
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO servicios (descripcion, precio, descuento, estatus, activo, es_facturable) VALUES ('" . $descripcion . "', '" . $precio . "', '" . $descuento . "', 'Activo', 'si', '$es_facturable')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateServicio() {
        $errorMSG = "";
        //descripcion
        if (empty($_POST["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
        if (empty($_POST["descripcion"])) {
            $errorMSG .= "descripcion is required ";
        } else {
            $descripcion = $_POST["descripcion"];
        }
        //precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        //descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = $_POST["descuento"];
        }
        //estatus
        if (empty($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
        }
        //descuento
        if (empty($_POST["es_facturable"])) {
            $es_facturable = "No";
        } else {
            $es_facturable = $_POST["es_facturable"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE servicios SET es_facturable='$es_facturable', descripcion = '" . $descripcion . "', precio = '" . $precio . "', descuento = '" . $descuento . "', estatus = '" . $estatus . "' WHERE servicios.idiservicio = $idiservicio";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * esta funcion se usa cuando se desea reinscribir a un alumno
     * verifica si tiene adeudos pendientes
     * retouna booleano
     * true: tiene adeudos
     * false: no tiene adeudos
     */
    function validAdeudos() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT SUM(venta_as_servicio.total) as total from venta_as_servicio where estatus= 'Pendiente' and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*     * ****************************************************** */

    function getTotalFromPagosByIdVenta($idiventa) {
        $numero = "";
        include './conexion.php';
        $sql = "SELECT total FROM pagos where folio = '$idiventa'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["total"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

    function getAbonoFromPagosByIdVenta($idiventa) {
        $numero = "";
        include './conexion.php';
        $sql = "SELECT abono FROM pagos where folio = '$idiventa'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["abono"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

//echo $abono = getAbonoFromPagosByIdVenta(20);

    function comparaSiTotal_Abono_son_Iguales($idiventa) {
        echo $abono = $this->getAbonoFromPagosByIdVenta($idiventa);
        echo $total = $this->getTotalFromPagosByIdVenta($idiventa);

        if ($total === $abono) {
            $accion = $this->CambiaEstatusPago($idiventa, "Pagado");
            if ($accion) {
                echo 'Pagado';
            }
        } else {
            $accion = $this->CambiaEstatusPago($idiventa, "Pendiente");
            if ($accion) {
                echo 'Pendiente';
            }
        }
    }

    function CambiaEstatusPago($idiventa, $estatus) {
        include './conexion.php';
        $sql = "UPDATE pagos SET estatus = '$estatus' WHERE pagos.idiventa = $idiventa";
        if ($conn->query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    function getPartidasPendientesByIdiAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad,venta_as_servicio.fecha_limite, venta_as_servicio.recargo,venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE venta_as_servicio.estatus ='Pendiente' and servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            // $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE  servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getHistorialPagosByIdiAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad,venta_as_servicio.fecha_limite, venta_as_servicio.recargo,venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            // $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE  servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getPartidasPendientesByMatricula() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE venta_as_servicio.estatus ='Pendiente' and servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.matricula = '$matricula'";
            // $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE  servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getVASByIDI() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_GET["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT * FROM venta_as_servicio where idiventa_as_servicio = '$idiventa_as_servicio'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['data'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*     * **************************CxC******************************** */

    function agregaServicio() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->agrupaPartida($idiventa_as_servicio, $idiventa, "Pendiente");
            if ($estatus) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Cuando el pago es por transferencia bancaria 
     * y se hizo en tiempo 
     * quita el recargo a la partida 
     */
    function quitaRecargoPartida() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET recargo = 0  WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            $sql .= "UPDATE venta_as_servicio SET total = precio   WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function agregaRecargoPartida() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET recargo = (precio * 0.10)  WHERE venta_as_servicio.idiventa_as_servicio =  $idiventa_as_servicio;";
            $sql .= "UPDATE venta_as_servicio SET total = (precio + recargo)   WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function quitaServicio() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente', fecha_mod = NOW(), idiventa = NULL WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
            $sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente',  idiventa = NULL WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteVASByID() {
        $userd = "CANCELADO POR " . $this->NombreControlEscolar . " " . date("Y-m-d h:i:sa");
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["comentario"])) {
            $comentario = strtoupper($userd);
        } else {
            $comentario = strtoupper($_POST["comentario"] . " " . $userd);
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET estatus = 'Cancelado', comentario = '$comentario'  WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function uptadePriceRecargoVAS() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["recargo"])) {
            $recargo = '0';
        } else {
            $recargo = $_POST["recargo"];
        }
        if (empty($_POST["total"])) {
            $total = "0";
        } else {
            $total = $_POST["total"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET recargo = '$recargo', total = '$total' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            if ($conn->query($sql) === TRUE) {
                echo "Precio actualizado";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function agrupaPartida($idiventa_as_servicio, $idiventa, $estatus) {
        include './conexion.php';
        //$sql = "UPDATE venta_as_servicio SET estatus = '" . $estatus . "', fecha_mod = NOW(), idiventa = '$idiventa' WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
        $sql = "UPDATE venta_as_servicio SET estatus = '" . $estatus . "',  idiventa = '$idiventa' WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
        if ($conn->query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }

    function getSubtotalVent() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        if ($errorMSG == "") {
            $sql = "SELECT SUM(venta_as_servicio.total) as total FROM venta_as_servicio WHERE idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function setEstatusFactura() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
        if (empty($_POST["folio_facturado"])) {
            $errorMSG .= "folio_facturado is required ";
        } else {
            $folio_facturado = $_POST["folio_facturado"];
        }
        if (empty($_POST["facturado"])) {
            $facturado = 'Si';
        } else {
            $facturado = $_POST["facturado"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE pagos SET facturado = '$facturado', folio_facturado='$folio_facturado' WHERE pagos.idiventa = $idiventa";
            if ($conn->query($sql) === TRUE) {
                echo "facturado actualizado";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function uploadFileStudent() {

        $var = null;
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //archivo
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
            $errorMSG .= "ddd is required ";
        } else {
            $archivo = $_FILES["archivo"]["tmp_name"];
        }
        //titulo
        if (empty($_POST["titulo"])) {
            $errorMSG .= "titulo is required ";
        } else {
            $titulo = $_POST["titulo"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $fileName = uniqid() . '.pdf';
            $archivo = $_FILES["archivo"]["tmp_name"];
            $size = $_FILES["archivo"]["size"];
            $tipo = $_FILES["archivo"]["type"];

            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $size);
            $contenido = addslashes($contenido);
            fclose($fp);

            $sql = "INSERT INTO archivo (idialumno, nombre, contenido, titulo, tipo) VALUES ('" . $idialumno . "','$fileName','$contenido','$titulo','PDF')";
            //$sql = "INSERT INTO archivo (idialumno, nombre, titulo, tipo) VALUES ('" . $last_id . "','$fileName','perfil','$image_type')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
                $var = false;
            } else {
                echo $errorMSG;
                $var = false;
            }
        }
        return $var;
    }

    function addNewPlanPago() {
        $errorMSG = "";
        //descripcion
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = strtoupper($_POST["clave"]);
        }
        //descripcion
        if (empty($_POST["descripcion"])) {
            $errorMSG = "descripcion is required ";
        } else {
            $descripcion = strtoupper($_POST["descripcion"]);
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO plan_pago (clave, descripcion) VALUES ('$clave','$descripcion')";
            if ($conn->query($sql) === TRUE) {
                echo "Plan de pago agregado";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

}

$pagos = new pagos();


//SELECT alumno.nombre, alumno.apellido_paterno, alumno.apellido_materno, alumno.matricula, servicios.idiservicio, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, servicios.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, alumno, servicios WHERE servicios.idiservicio = venta_as_servicio.idiservicio and alumno.idialumno = venta_as_servicio.idialumno and idiventa = 2 ORDER BY idiventa_as_servicio ASC