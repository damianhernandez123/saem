<?php

/**
 * Description of ucp
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class ucp {

    public $idiControlEscolar; //usuario de control escolar logueado
    public $NombreControlEscolar; //Nombre de control escolar logueado

    public function __construct() {
        date_default_timezone_set('America/Mexico_City');
        include '../BackEndSAP/session.php';
        $this->idiControlEscolar = $globalIdiUsurio;
        $this->NombreControlEscolar = $globalNombre;
        //error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'getcardAlumnoById') {
                    $this->getcardAlumnoById();
                }
                if ($action == 'getnewSatudent') {
                    $this->getnewSatudent();
                }
                if ($action == 'getManPerson') {
                    $this->getManPerson();
                }
                if ($action == 'getWomanPerson') {
                    $this->getWomanPerson();
                }
                if ($action == 'cobroAlumnoDiplo') {
                    $this->cobroAlumnoDiplo();
                }
                if ($action == 'getPlantel') {
                    $this->getPlantel();
                }
                if ($action == 'getMatriculaAlumnoByID') {
                    $this->getMatriculaAlumnoByID();
                }
                if ($action == 'getGenerales') {
                    $this->getDatosGenerales();
                }
                if ($action == 'getProfesores') {
                    $this->getProfesores();
                }
                if ($action == 'getOferta') {
                    $this->getOferta();
                }
                if ($action == 'getNivel') {
                    $this->getNivel();
                }
                if ($action == 'getcCarrerasbyID') {
                    $this->getcCarrerasbyID();
                }
                if ($action == 'getbMateriasbyID') {
                    $this->getbMateriasbyID();
                }
                if ($action == 'getTurno') {
                    $this->getTurno();
                }
                if ($action == 'getcardAlumno') {
                    $this->getcardAlumno();
                }
                if ($action == 'getcardAlumnoAll') {
                    $this->getcardAlumnoAll();
                }
                if ($action == 'getcardAlumnoByMatricula') {
                    $this->getcardAlumnoByMatricula();
                }
                if ($action == 'getGeneralesbyID') {
                    if (empty($_GET["idigenerales"])) {
                        echo "codigo is required ";
                    } else {
                        $idi = $_GET["idigenerales"];
                        $this->getDatosGeneralesbyId($idi);
                    }
                }
                if ($action == 'getDatosProfesorbyId') {
                    if (empty($_GET["idiprofesor"])) {
                        echo "idiprofesor is required ";
                    } else {
                        $idi = $_GET["idiprofesor"];
                        $this->getDatosProfesorbyId($idi);
                    }
                }
                if ($action == 'getTutoresByID') {
                    if (empty($_GET["idialumno"])) {
                        echo "idialumno is required ";
                    } else {
                        $idi = $_GET["idialumno"];
                        $this->getTutoresByID($idi);
                    }
                }
                if ($action == 'getOfertabyID') {
                    if (empty($_GET["idioferta"])) {
                        echo "idioferta is required ";
                    } else {
                        $idi = $_GET["idioferta"];
                        $this->getOfertaById($idi);
                    }
                }
                if ($action == 'getImageAlumnoByID') {
                    if (empty($_GET["idialumno"])) {
                        echo "idialumno is required ";
                    } else {
                        $idialumno = $_GET["idialumno"];
                        $this->getImageAlumnoByID($idialumno);
                    }
                }
                if ($action == 'getImageProfesorByID') {
                    if (empty($_GET["idiprofesor"])) {
                        echo "idiprofesor is required ";
                    } else {
                        $idiprofesor = $_GET["idiprofesor"];
                        $this->getImageProfesorByID($idiprofesor);
                    }
                }
                if ($action == 'getUserSAEM') {
                    $this->getUserSAEM();
                }
                if ($action == 'getUserSAEMByID') {
                    $this->getUserSAEMByID();
                }
                if ($action == 'getCiclo') {
                    $this->getCiclo();
                }
                if ($action == 'getCicloByEstatus') {
                    $this->getCicloByEstatus();
                }
                if ($action == 'getPlanPago') {
                    $this->getPlanPago();
                }
                if ($action == 'getCicloByID') {
                    $this->getCicloByID();
                }
                if ($action == 'getcGradosById') {
                    $this->getcGradosById();
                }
                if ($action == 'getCicloByAbrev') {
                    $this->getCicloByAbrev();
                }
                if ($action == 'countAllAlumno') {
                    $this->countAllAlumno();
                }
                if ($action == 'countAllAspiirante') {
                    $this->countAllAspiirante();
                }
                if ($action == 'getcardAlumnoMatricula') {
                    $this->getcardAlumnoMatricula();
                }
                if ($action == 'getVencimiento') {
                    $this->getVencimiento();
                }
                if ($action == 'getGrupos') {
                    $this->getGrupos();
                }
                if ($action == 'getVencimientoByID') {
                    $this->getVencimientoByID();
                }
                if ($action == 'getGradosByID') {
                    $this->getGradosByID();
                }
                if ($action == 'getMateriasByCarreraAndGradoID') {
                    $this->getMateriasByCarreraAndGradoID();
                }
                if ($action == 'getNivelbyAlumnoId') {
                    $this->getNivelbyAlumnoId();
                }
                if ($action == 'getCiclosyAlumnoId') {
                    $this->getCiclosyAlumnoId();
                }
                if ($action == 'getCalificacionesyAlumnoId') {
                    $this->getCalificacionesyAlumnoId();
                }
                if ($action == 'getcAulas') {
                    $this->getcAulas();
                }
                if ($action == 'getcAulasbyidicampus') {
                    $this->getcAulasbyidicampus();
                }
                if ($action == 'getbAlumnoGrupoByIdGrupo') {
                    $this->getbAlumnoGrupoByIdGrupo();
                }

                //DAMIAN HERNANDEZ MERINO
                if ($action == 'getCampus') {
                    $this->getCampus();
                }
                if ($action == 'getCampusbyidicampus') {
                    $this->getCampusbyidicampus();
                }
                if ($action == 'getCampusbycTurnoId') {
                    $this->getCampusbycTurnoId();
                }
                if ($action == 'getcSituacion') {
                    $this->getcSituacion();
                }
                if ($action == 'getSituacionbyId') {
                    $this->getSituacionbyId();
                }
                if ($action == 'getAulasbyId') {
                    $this->getAulasbyId();
                }
                if ($action == 'getcCarrerasbyID2') {
                    $this->getcCarrerasbyID2();
                }
                if ($action == 'getGradosByIdCarrera') {
                    $this->getGradosByIdCarrera();
                }
                if ($action == 'getcGradosbyId') {
                    $this->getcGradosbyId();
                }
                if ($action == 'getcGradosbyIdcarrera') {
                    $this->getcGradosbyIdcarrera();
                }
                if ($action == 'getcNivelesbyidicampus') {
                    $this->getcNivelesbyidicampus();
                }
                if ($action == 'getcNivelesbyIdNiveles') {
                    $this->getcNivelesbyIdNiveles();
                }
                if ($action == 'getcarrerabyId') {
                    $this->getcarrerabyId();
                }
                if ($action == 'getcarrerabyNivelId') {
                    $this->getcarrerabyNivelId();
                }
                if ($action == 'getMateriasByNivelIDAndCarreraIdAndGradoId') {
                    $this->getMateriasByNivelIDAndCarreraIdAndGradoId();
                }
                if ($action == 'getcGradobyIDcarreraID') {
                    $this->getcGradobyIDcarreraID();
                }
                if ($action == 'getcTablaMateriaId') {
                    $this->getcTablaMateriaId();
                }
                if ($action == 'getgradobyId') {
                    $this->getgradobyId();
                }
                if ($action == 'getgradobyNivelId') {
                    $this->getgradobyNivelId();
                }
                if ($action == 'getReporteByIdAlumno') {
                    $this->getReporteByIdAlumno();
                }
                if ($action == 'getcTablaAlumnoReporte') {
                    $this->getcTablaAlumnoReporte();
                }
                if ($action == 'getCarrerabyidicampus') {
                    $this->getCarrerabyidicampus();
                }
                if ($action == 'getCarrerabyidcarrera') {
                    $this->getCarrerabyidcarrera();
                }
                if ($action == 'getprofesorId') {
                    $this->getprofesorId();
                }

                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'addGeneral') {
                    $this->addDatosGenerales();
                }
                if ($action == 'putGenerales') {
                    $this->updateDatosGenerales();
                }
                if ($action == 'addAlumno') {
                    $this->addAlumno();
                }
                if ($action == 'setTutor') {
                    $this->setTutor();
                }
                if ($action == 'addDocumentos') {
                    $this->addDocumentos();
                }
                if ($action == 'updateImageAlumnoByIDArchivo') {
                    $this->updateImageAlumnoByIDArchivo();
                }
                if ($action == 'updateImageProfesorById') {
                    $this->updateImageProfesorById();
                }
                if ($action == 'reinscription') {
                    $this->reinscription();
                }
                if ($action == 'profesor') {
                    $this->profesor();
                }
                if ($action == 'borrarProf') {
                    $this->borrarProf();
                }
                if ($action == 'borrarUserSAEM') {
                    $this->borrarUserSAEM();
                }
                if ($action == 'borrarAspirante') {
                    $this->borrarAspirante();
                }
                if ($action == 'addUserSAEM') {
                    $this->addUserSAEM();
                }
                if ($action == 'updateUSerSAEM') {
                    $this->updateUSerSAEM();
                }
                if ($action == 'beca') {
                    $this->beca();
                }
                if ($action == 'addCiclo') {
                    $this->addCiclo();
                }
                if ($action == 'updateCiclo') {
                    $this->updateCiclo();
                }
                if ($action == 'updateEstatusByIdiAlumno') {
                    $this->updateEstatusByIdiAlumno();
                }
                if ($action == 'updateCodigoCredencialByIdiAlumno') {
                    $this->updateCodigoCredencialByIdiAlumno();
                }
                if ($action == 'addVencimiento') {
                    $this->addVencimiento();
                }
                if ($action == 'deleteFechaPago') {
                    $this->deleteFechaPago();
                }
                if ($action == 'updateVencimiento') {
                    $this->updateVencimiento();
                }
                if ($action == 'updateSignByIdiAlumno') {
                    $this->updateSignByIdiAlumno();
                }
                if ($action == 'addGrupoEscolar') {
                    $this->addGrupoEscolar();
                }
                // DAMIAN HERNANDEZ MERINO
                if ($action == 'deleteCampus') {
                    $this->deleteCampus();
                }
                if ($action == 'updateCampus') {
                    $this->updateCampus();
                }
                if ($action == 'addCampus') {
                    $this->addCampus();
                }
                if ($action == 'addcTurno') {
                    $this->addcTurno();
                }
                if ($action == 'updatecTurno') {
                    $this->updatecTurno();
                }
                if ($action == 'deletecTurno') {
                    $this->deletecTurno();
                }
                if ($action == 'addcSituacion') {
                    $this->addcSituacion();
                }
                if ($action == 'deletecSituacion') {
                    $this->deletecSituacion();
                }
                if ($action == 'updatecSituacion') {
                    $this->updatecSituacion();
                }
                if ($action == 'addAulas') {
                    $this->addAulas();
                }
                if ($action == 'deleteAula') {
                    $this->deleteAula();
                }
                if ($action == 'updateAula') {
                    $this->updateAula();
                }
                if ($action == 'addcGrados') {
                    $this->addcGrados();
                }
                if ($action == 'updatecGrados') {
                    $this->updatecGrados();
                }
                if ($action == 'deletecGrados') {
                    $this->deletecGrados();
                }
                if ($action == 'addcNiveles') {
                    $this->addcNiveles();
                }
                if ($action == 'deletecNiveles') {
                    $this->deletecNiveles();
                }
                if ($action == 'updatecNiveles') {
                    $this->updatecNiveles();
                }
                if ($action == 'addTablaMateria') {
                    $this->addTablaMateria();
                }
                if ($action == 'deleteTablaMateria') {
                    $this->deleteTablaMateria();
                }
                if ($action == 'updateTablaMaterias') {
                    $this->updateTablaMaterias();
                }
                if ($action == 'addcReporte') {
                    $this->addcReporte();
                }
                if ($action == 'deleteAlumnoReporte') {
                    $this->deleteAlumnoReporte();
                }
                if ($action == 'updateAlumnoReporte') {
                    $this->updateAlumnoReporte();
                }
                if ($action == 'addcarrera') {
                    $this->addcarrera();
                }
                if ($action == 'deleteCarrera') {
                    $this->deleteCarrera();
                }
                if ($action == 'updateCarrera') {
                    $this->updateCarrera();
                }
                if ($action == 'updateProfesor') {
                    $this->updateProfesor();
                }
                break;
            case 'PUT':
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE'://elimina
                echo 'METODO NO SOPORTADO';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    function xss($data) {
        $data = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($data)))));
        return $data;
    }

    /**
     * cocnsulta el la tabla de clicos escolares
     */
    function getCiclo() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cliclo  ORDER BY abrev ASC";
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

    function getCicloByEstatus() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cliclo WHERE estatus='Activo'  ORDER BY abrev ASC";
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

    function getcAulas() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cAulas";
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

    function getcAulasbyidicampus() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cAulas WHERE idicampus=$idicampus";
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
     * get catalogo planes de pago
     */
    function getPlanPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM plan_pago  ORDER BY idiplan DESC";
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

    /**
     * consulta la tabla de cliclos escolares por idperiodo
     */
    function getCicloByID() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idiciclo"])) {
            $errorMSG = "idiciclo is required ";
        } else {
            $idiciclo = $_GET["idiciclo"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cliclo where idiciclo = $idiciclo";
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

    /*
     * SE SUSTITUYE POR getcGradosbyIdicarrera

      function getcGradosById2() {
      $errorMSG = "";
      //CarreraId
      if (empty($_GET["CarreraId"])) {
      $errorMSG = "CarreraId is required ";
      } else {
      $CarreraId = $_GET["CarreraId"];
      }
      if ($errorMSG == "") {
      header('Content-Type: application/json');
      include './conexion.php';
      $sql = "SELECT * FROM cGrados where CarreraId = $CarreraId";
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
     */

    /**
     * consulta la tabla de cliclos escolares por la abreviatura del periodo 192, 201 etc
     */
    function getCicloByAbrev() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_GET["abrev"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cliclo where abrev = '$abrev'";
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
     * Consulta el ultimo id de la tabla matrucila para obtener el
     * consecutivo
     * @return type
     */
    function getLastIdMatricula() {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT MAX(idimatricula) FROM matricula";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["MAX(idimatricula)"];
            }
            return $rows;
        } else {
            if (empty($rows)) {
                $rows = 1;
                return $rows;
            } else {
                return $rows;
            }
        }
        $conn->close();
    }

    /**
     * retorna el numero de carrera necesario para formar la matricula
     * @param type $idiCarrera
     * @return string
     */
    function getNumero_Carrera($idiCarrera) {
        $numero = "";
        include './conexion.php';
        $sql = "select numero_carrera from carrera WHERE idicarrera= $idiCarrera";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["numero_carrera"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

    /**
     * retourna retorna la ultima matricuala agregada de la tabal matricula
     * @param type $id
     * @return string
     */
    function getMatriculaByID($id) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT matricula FROM matricula WHERE idimatricula = $id";
        $result = $conn->query($sql);
        $rows = "";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["matricula"];
            }
            return $rows;
        } else {
            return "0 results";
        }
        $conn->close();
    }

    /**
     * getDatosGeneralesbyId()
     * consulta los datos generales de una persona basado en el ID
     * @param type $idi
     */
    function getDatosGeneralesbyId($idi) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM datos_generales WHERE idigenerales =" . $idi;
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

    /**
     * retorna la tabla de trofesores filtrada por idiprofesor
     * @param type $idi
     */
    function getDatosProfesorbyId($idi) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM profesor WHERE idiprofesor =" . $idi;
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

    /**
     * devuelve la lista de tutores del estudiante por idiestudiante
     * @param type $idi
     */
    function getTutoresByID($idi) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM tutor WHERE idialumno =" . $idi;
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

    /**
     * getDatosGenerales()
     * consulta la table de datos generales y muestra la lista de pre inscripciones
     */
    function getDatosGenerales() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM datos_generales WHERE estatus LIKE '%pre-inscrito%' order by idigenerales desc";
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

    function countAllAlumno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT COUNT(*) as total from alumno";
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

    function getProfesores() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM profesor order by idiprofesor desc";
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

    function borrarProf() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM profesor WHERE idiprofesor=$idiprofesor";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    function borrarUserSAEM() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiuser"])) {
            $errorMSG = "idiuser is required ";
        } else {
            $idiuser = $_POST["idiuser"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM user WHERE idiuser=$idiuser";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    function borrarAspirante() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM datos_generales WHERE idigenerales=$idigenerales";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    function getnewSatudent() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM alumno where estatus = 'Nuevo Ingreso' and cuatrimestre = '1'";
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

    function getManPerson() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where genero = 'Masculino'";
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

    function getWomanPerson() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where genero = 'Femenino'";
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

    function countAllAspiirante() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where estatus = 'pre-inscrito'";
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

    /**
     * addImageAlumno
     * En cuanto se crea un alumno, guarda la foto tomada en la tabla archivo con el id del estudiante
     * @param type $last_id
     */
    function addImageAlumno($last_id) {
        $var = null;
        $errorMSG = "";
        //idicarrera
        if (empty($_POST["image"])) {
            $fileName = 'usermix.jpg';
        } else {
            $img = $_POST["image"];
            $fileName = uniqid() . '.png';
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);
        }
        if (empty($_POST["signaturePicture"])) {
            $signaturePicture = "empty_sing.png";
        } else {
            $signaturePicture = $_POST["signaturePicture"];
        }

        if ($errorMSG == "") {
            include './conexion.php';

            //$sql = "INSERT INTO archivo (idialumno, nombre, contenido, titulo, tipo) VALUES ('" . $last_id . "','$fileName','$contenido','perfil','$image_type')";
            $sql = "INSERT INTO archivo (idialumno, nombre, titulo, tipo) VALUES ('" . $last_id . "','$fileName','perfil','$image_type');";
            $sql .= "INSERT INTO archivo (idialumno, nombre, titulo, tipo) VALUES ('" . $last_id . "','$signaturePicture','firma','PNG');";
            if ($conn->multi_query($sql) === TRUE) {
                //echo "success";
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

    function getImageAlumnoByID($idialumno) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT idiarchivo, idialumno, nombre FROM archivo WHERE idialumno = $idialumno";
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

    function getImageProfesorByID($idiprofesor) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT imagen_perfil, idiprofesor, nombre, apellido_paterno, apellido_materno FROM profesor WHERE idiprofesor = $idiprofesor";
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

    function updateImageAlumnoByIDArchivo() {
        $errorMSG = "";
        //idiarchivo
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //image
        if (empty($_POST["image"])) {
            $errorMSG .= "image is required ";
        } else {
            $img = $_POST["image"];
        }
        //UPDATE `archivo` SET `nombre` = '5c759d6f5e060.png' WHERE `archivo`.`idiarchivo` = 4
        if ($errorMSG == "") {
            include './conexion.php';
            $img = $_POST['image'];
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);

            $sql = "UPDATE archivo SET nombre = '" . $fileName . "' WHERE archivo.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Imagen Actualizada";
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

    function updateImageProfesorById() {
        $errorMSG = "";
        //idiarchivo
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //image
        if (empty($_POST["image"])) {
            $errorMSG .= "image is required ";
        } else {
            $img = $_POST["image"];
        }
        if ($errorMSG == "") {
            $img = $_POST['image'];
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);

            include './conexion.php';
            $sql = "UPDATE profesor SET imagen_perfil = '" . $fileName . "' WHERE idiprofesor = $idiprofesor;";
            if ($conn->query($sql) === TRUE) {
                echo "Imagen Actualizada";
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

    /**
     * addDatosGenerales()
     * Agrega un registro a la tabla de datos Generales
     * @param type $estatus
     * @param type $nombre required
     * @param type $apellidos required
     * @param type $genero
     * @param type $edad
     * @param type $curp required unique
     * @param type $rfc unique
     * @param type $email
     * @param type $telefono
     * @param type $movil
     * @param type $email2
     * @param type $pais
     * @param type $ciudad
     * @param type $direccion
     * @param type $municipio
     * @param type $cp
     * @param type $escegreso
     * @param type $nivelegreso
     * @param type $fechaegreso
     * @param type $infoadicional
     * @param type $tiposangre
     * @param type $alergias
     * @param type $fecha_nacimiento
     */
    function addDatosGenerales() {
        $errorMSG = "";
        //estatus
        if (empty($_POST["estatus"])) {
            $estatus = "";
        } else {
            $estatus = $_POST["estatus"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
//genero
        if (empty($_POST["genero"])) {
            $genero = "";
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = "18";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
//nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = "";
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = "";
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = "";
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = "";
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = "";
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = "";
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = "";
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = date("Y/m/d");
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = "";
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = "";
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = "";
        } else {
            $emergencias = $_POST["emergencias"];
        }


        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento, interes, turno, emergencias) VALUES "
                    . "                         ('" . $estatus . "', '" . strtoupper($nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "','" . $genero . "', '" . $edad . "', '" . $curp . "', '" . $rfc . "', '" . $nss . "','" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $num . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . $escegreso . "', '" . $nivelegreso . "', '" . $fechaegreso . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "','" . $interes . "','" . $turno . "', '" . $emergencias . "');";
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
     * Actualiza un registro de la table de datos Generales
     * @param type $idigeneral
     * @param type $estatus
     * @param type $nombre required
     * @param type $apellidos required
     * @param type $genero
     * @param type $edad
     * @param type $curp required unique
     * @param type $rfc unique
     * @param type $email
     * @param type $telefono
     * @param type $movil
     * @param type $email2
     * @param type $pais
     * @param type $ciudad
     * @param type $direccion
     * @param type $municipio
     * @param type $cp
     * @param type $escegreso
     * @param type $nivelegreso
     * @param type $fechaegreso
     * @param type $infoadicional
     * @param type $tiposangre
     * @param type $alergias
     * @param type $fecha_nacimiento
     */
    function updateDatosGenerales() {
        $errorMSG = "";
        //estatus
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= "idigenerales es required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if (empty($_POST["estatus"])) {
            $estatus = null;
        } else {
            $estatus = $_POST["estatus"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = null;
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
//genero
        if (empty($_POST["genero"])) {
            $genero = null;
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = null;
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = null;
        } else {
            $curp = strtoupper($_POST["curp"]);
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = null;
        } else {
            $rfc = strtoupper($_POST["rfc"]);
        }
//nss
        if (empty($_POST["nss"])) {
            $nss = null;
        } else {
            $nss = strtoupper($_POST["nss"]);
        }
        //email
        if (empty($_POST["email"])) {
            $email = null;
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = null;
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = null;
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = null;
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = null;
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = null;
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = null;
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"];
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = null;
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = null;
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = null;
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = null;
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = null;
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = null;
        } else {
            $tiposangre = strtoupper($_POST["tiposangre"]);
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = null;
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = null;
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = null;
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = null;
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = null;
        } else {
            $turno = $_POST["turno"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = null;
        } else {
            $interes = $_POST["interes"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE datos_generales SET  emergencias = '" . $emergencias . "' ,turno = '" . $turno . "' , interes = '" . $interes . "' , nombre = '" . strtoupper($nombre) . "', apellido_materno = '" . strtoupper($apellido_materno) . "', apellido_paterno = '" . strtoupper($apellido_paterno) . "',genero = '" . $genero . "', edad = '" . $edad . "', curp = '" . $curp . "', rfc = '" . $rfc . "', nss = '" . $nss . "',email = '" . $email . "', telefono = '" . $telefono . "', movil = '" . $movil . "', email2 = '" . $email2 . "', pais = '" . $pais . "', ciudad = '" . $ciudad . "', direccion = '" . $num . " " . $direccion . "', municipio = '" . $municipio . "', cp = '" . $cp . "', escegreso = '" . $escegreso . "', nivelegreso = '" . $nivelegreso . "', fechaegreso = '" . $fechaegreso . "', infoadicional = '" . $infoadicional . "', tiposangre = '" . $tiposangre . "', alergias = '" . $alergias . "', fecha_nacimiento = '" . $fecha_nacimiento . "' WHERE datos_generales.idigenerales = " . $idigenerales . ";";
            if ($conn->query($sql) === TRUE) {
                echo "Registro actualizado";
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

    function addDocumentos() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_POST["doc_nacimiento"])) {
            $doc_nacimiento = "no";
        } else {
            $doc_nacimiento = $_POST["doc_nacimiento"];
        }
        if (empty($_POST["doc_nacimiento_copia"])) {
            $doc_nacimiento_copia = "no";
        } else {
            $doc_nacimiento_copia = $_POST["doc_nacimiento_copia"];
        }
//doc_certificado
        if (empty($_POST["doc_certificado"])) {
            $doc_certificado = "no";
        } else {
            $doc_certificado = $_POST["doc_certificado"];
        }
        if (empty($_POST["doc_certificado_copia"])) {
            $doc_certificado_copia = "no";
        } else {
            $doc_certificado_copia = $_POST["doc_certificado_copia"];
        }
//doc_curp
        if (empty($_POST["doc_curp"])) {
            $doc_curp = "no";
        } else {
            $doc_curp = $_POST["doc_curp"];
        }
        if (empty($_POST["doc_curp_copia"])) {
            $doc_curp_copia = "no";
        } else {
            $doc_curp_copia = $_POST["doc_curp_copia"];
        }
        //doc_ine
        if (empty($_POST["doc_ine"])) {
            $doc_ine = "no";
        } else {
            $doc_ine = $_POST["doc_ine"];
        }
        if (empty($_POST["doc_ine_copia"])) {
            $doc_ine_copia = "no";
        } else {
            $doc_ine_copia = $_POST["doc_ine_copia"];
        }
//doc_fotos
        if (empty($_POST["doc_fotos"])) {
            $doc_fotos = "no";
        } else {
            $doc_fotos = $_POST["doc_fotos"];
        }
//doc_comprobante
        if (empty($_POST["doc_comprobante"])) {
            $doc_comprobante = "no";
        } else {
            $doc_comprobante = $_POST["doc_comprobante"];
        }
        if (empty($_POST["doc_comprobante_copia"])) {
            $doc_comprobante_copia = "no";
        } else {
            $doc_comprobante_copia = $_POST["doc_comprobante_copia"];
        }
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET doc_nacimiento = '" . $doc_nacimiento . "', doc_nacimiento_copia = '$doc_nacimiento_copia', doc_certificado = '" . $doc_certificado . "',doc_certificado_copia = '" . $doc_certificado_copia . "', doc_curp = '" . $doc_curp . "', doc_curp_copia = '" . $doc_curp_copia . "', doc_ine = '" . $doc_ine . "', doc_ine_copia = '" . $doc_ine_copia . "', doc_fotos = '" . $doc_fotos . "', doc_comprobante = '" . $doc_comprobante . "', doc_comprobante_copia = '" . $doc_comprobante_copia . "'  WHERE alumno.idialumno = " . $idialumno;
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
     * UpdateEstatusGeneral()
     * Actualiza el estatus de una persona de Pre-Inscrito a Inscrito
     * @param type $idigeneral
     */
    function UpdateEstatusGeneral($idigeneral) {
        include './conexion.php';
        $sql = "UPDATE datos_generales SET estatus = 'Inscrito' WHERE datos_generales.idigenerales = " . $idigeneral . ";";
        if ($conn->query($sql) === TRUE) {
            //echo "Estatus Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * getOferta()
     * consulta la table de ccarrera
     */
    function getOferta() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM carrera ORDER BY carrera.nivel ASC";
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

    function getNivel() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cNiveles";
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

    function getcCarrerasbyID() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where NivelId = $NivelId";
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

    function getbMateriasbyID() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT m.MateriaId, g.Descripcion as GradoId, m.Clave, m.Nombre from tbMaterias as m, cGrados as g WHERE m.GradoId = g.GradosId AND m.CarreraId = $CarreraId";
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

    function getTurno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cTurno ";
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

    /**
     * consulta planteles
     */
    function getPlantel() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM campus";
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

    /**
     * getOferta()
     * consulta la table de ccarrera
     */
    function getOfertaById($id) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM carrera where idicarrera = " . $id;
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

    function getcardAlumno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales, alumno, archivo, credencial, carrera where carrera.idicarrera = alumno.idicarrera AND datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno and alumno.estatus = 'Activo' AND archivo.titulo = 'perfil' ORDER BY alumno.alta DESC";
        //$sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales inner join alumno on datos_generales.idigenerales = alumno.idigenerales inner join archivo on archivo.idialumno= alumno.idialumno inner join credencial on credencial.idialumno=alumno.idialumno inner join carrera on carrera.idicarrera = alumno.idicarrera ORDER BY alumno.alta DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $idialumno = $row["idialumno"];
                $idigenerales = $row["idigenerales"];
                $nombre = $row["nomalu"];
                $apellido_paterno = $row["apellido_paterno"];
                $apellido_materno = $row["apellido_materno"];
                $carrera = $row["carrera"];
                $cuatrimestre = $row["cuatrimestre"];
                $vigencia = $row["vigencia"];
                $matricula = $row["matricula"];
                $turno = $row["turno"];
                $idicredencial = $row["idicredencial"];
                $codigo_credencial = $row["codigo_credencial"];
                $estatus = $row["estatus"];
                $bloqueo = $row["bloqueo"];
                $idiarchivo = $row["idiarchivo"];
                $contenido = $row["nombre"];
                $foto = explode(',', $contenido);
                $data = array(
                    'idialumno' => $idialumno,
                    'idigenerales' => $idigenerales,
                    'nombre' => $nombre,
                    'apellido_paterno' => $apellido_paterno,
                    'apellido_materno' => $apellido_materno,
                    'carrera' => $carrera,
                    'cuatrimestre' => $cuatrimestre,
                    'idicredencial' => $idicredencial,
                    'beca_colegiatura' => $row["beca_colegiatura"],
                    'codigo_credencial' => $codigo_credencial,
                    'estatus' => $estatus,
                    'bloqueo' => $bloqueo,
                    'vigencia' => $vigencia,
                    'matricula' => $matricula,
                    'turno' => $turno,
                    'idiarchivo' => $idiarchivo,
                    'categoria' => $row["categoria"],
                    'contenido' => '<center><img width="160px;" src="dataConect/upload/' . $contenido . '"></center>',
                    'btnEditar' => '<a href="updateAlumno.php?p=' . $idigenerales . '&idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '"" target="_blank"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>',
                    'btnCredencial' => '<a href="credencialEstudiante.php?idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '" target="_blank"><i class="pe-7s-id pe-2x pe-va" title="Imprimir Credencial"></i></a></td>',
                );
                $rows['data'][] = $data;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcardAlumnoAll() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales, alumno, archivo, credencial, carrera where carrera.idicarrera = alumno.idicarrera AND datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno AND archivo.titulo = 'perfil'";
        //$sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales inner join alumno on datos_generales.idigenerales = alumno.idigenerales inner join archivo on archivo.idialumno= alumno.idialumno inner join credencial on credencial.idialumno=alumno.idialumno inner join carrera on carrera.idicarrera = alumno.idicarrera ORDER BY alumno.alta DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $idialumno = $row["idialumno"];
                $idigenerales = $row["idigenerales"];
                $nombre = $row["nomalu"];
                $apellido_paterno = $row["apellido_paterno"];
                $apellido_materno = $row["apellido_materno"];
                $carrera = $row["carrera"];
                $cuatrimestre = $row["cuatrimestre"];
                $vigencia = $row["vigencia"];
                $matricula = $row["matricula"];
                $turno = $row["turno"];
                $idicredencial = $row["idicredencial"];
                $codigo_credencial = $row["codigo_credencial"];
                $estatus = $row["estatus"];
                $bloqueo = $row["bloqueo"];
                $idiarchivo = $row["idiarchivo"];
                $contenido = $row["nombre"];
                $foto = explode(',', $contenido);
                $data = array(
                    'idialumno' => $idialumno,
                    'idigenerales' => $idigenerales,
                    'nombre' => $nombre,
                    'apellido_paterno' => $apellido_paterno,
                    'apellido_materno' => $apellido_materno,
                    'carrera' => $carrera,
                    'cuatrimestre' => $cuatrimestre,
                    'idicredencial' => $idicredencial,
                    'beca_colegiatura' => $row["beca_colegiatura"],
                    'codigo_credencial' => $codigo_credencial,
                    'estatus' => $estatus,
                    'bloqueo' => $bloqueo,
                    'vigencia' => $vigencia,
                    'matricula' => $matricula,
                    'turno' => $turno,
                    'idiarchivo' => $idiarchivo,
                    'categoria' => $row["categoria"],
                    'contenido' => '<center><img width="160px;" src="dataConect/upload/' . $contenido . '"></center>',
                    'btnEditar' => '<a href="updateAlumno.php?p=' . $idigenerales . '&idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '"" target="_blank"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>',
                    'btnCredencial' => '<a href="credencialEstudiante.php?idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '" target="_blank"><i class="pe-7s-id pe-2x pe-va" title="Imprimir Credencial"></i></a></td>',
                );
                $rows['data'][] = $data;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    /**
     * Muestra el la tarjeta de estudiante filtrado por id 
     */
    function getcardAlumnoById() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT alumno.carrera,alumno.beca_colegiatura, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante FROM alumno, credencial WHERE credencial.idialumno = alumno.idialumno AND alumno.idialumno = $idialumno";
            $sql = "SELECT alumno.idialumno, alumno.carrera,alumno.beca_colegiatura, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, alumno.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_nacimiento_copia, alumno.doc_certificado, alumno.doc_certificado_copia, alumno.doc_curp, alumno.doc_curp_copia, alumno.doc_ine, alumno.doc_ine_copia, alumno.doc_fotos, alumno.doc_comprobante, alumno.doc_comprobante_copia, datos_generales.nombre, datos_generales.apellido_paterno, datos_generales.apellido_materno FROM datos_generales, alumno, credencial WHERE datos_generales.idigenerales = alumno.idigenerales and credencial.idialumno = alumno.idialumno AND alumno.idialumno = $idialumno";
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

    function getcardAlumnoMatricula() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT alumno.carrera,alumno.beca_colegiatura, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante FROM alumno, credencial WHERE credencial.idialumno = alumno.idialumno AND alumno.idialumno = $idialumno";
            //$sql = "SELECT alumno.idialumno, alumno.carrera, alumno.categoria, alumno.beca_colegiatura, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, alumno.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante, datos_generales.nombre, datos_generales.apellido_paterno, datos_generales.apellido_materno FROM datos_generales, alumno, credencial WHERE datos_generales.idigenerales = alumno.idigenerales and credencial.idialumno = alumno.idialumno AND alumno.matricula = '$matricula'";
            $sql = "SELECT
	alumno.idialumno,
	alumno.carrera,
	carrera.categoria,
	alumno.beca_colegiatura,
	alumno.matricula,
	alumno.generacion,
	alumno.cuatrimestre,
	alumno.cuatrimestres_trasncurridos,
	alumno.turno,
	credencial.idicredencial,
	credencial.codigo_credencial,
	credencial.vigencia,
	alumno.estatus,
	credencial.bloqueo,
	alumno.doc_nacimiento,
	alumno.doc_certificado,
	alumno.doc_curp,
	alumno.doc_ine,
	alumno.doc_fotos,
	alumno.doc_comprobante,
	datos_generales.nombre,
	datos_generales.apellido_paterno,
	datos_generales.apellido_materno 
FROM
	datos_generales,
	alumno,
	credencial,
	carrera
WHERE
	carrera.idicarrera = alumno.idicarrera
	AND datos_generales.idigenerales = alumno.idigenerales 
	AND credencial.idialumno = alumno.idialumno 
	AND alumno.matricula = '$matricula'";
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
     * Muestra el la tarjeta de estudiante filtrado por matriticla escolar
     */
    function getcardAlumnoByMatricula() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT alumno.carrera,alumno.nombre, alumno.apellido_paterno,alumno.apellido_materno, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante , alumno.beca_colegiatura FROM alumno, credencial WHERE credencial.idialumno = alumno.idialumno AND alumno.matricula = '" . $matricula . "'";
            $sql = "SELECT alumno.carrera,datos_generales.nombre, datos_generales.apellido_paterno,datos_generales.apellido_materno, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante , alumno.beca_colegiatura, datos_generales.rfc, datos_generales.email  FROM alumno, credencial, datos_generales WHERE datos_generales.idigenerales = alumno.idigenerales and credencial.idialumno = alumno.idialumno AND alumno.matricula = '$matricula'";
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

    function getMatriculaAlumnoByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT matricula from alumno where idialumno = $idialumno";
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
     * Agrega los datos de la credencial asociados al elstudiante
     * @param type $idialimno
     */
    function addDataCredencial($idialumno) {
        $var = null;
        $errorMSG = "";
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        //estatus
        if (empty($_POST["estatus"])) {
            $estatus = "";
        } else {
            $estatus = $_POST["estatus"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO credencial (idialumno, codigo_credencial, estatus, fecha_mod) VALUES  ('" . $idialumno . "', '" . $codigo_credencial . "', 'Activo', CURRENT_TIMESTAMP);";
            if ($conn->query($sql) === TRUE) {
                // echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $var = false;
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
                $var = false;
            }
        }
        return $var;
    }

    function setTutor() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //parentesco
        if (empty($_POST["parentesco"])) {
            $errorMSG .= "parentesco is required ";
        } else {
            $parentesco = $_POST["parentesco"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellidos"])) {
            $errorMSG .= "apellidos is required ";
        } else {
            $apellidos = $_POST["apellidos"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //celular
        if (empty($_POST["celular"])) {
            $celular = "";
        } else {
            $celular = $_POST["celular"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //cuidad
        if (empty($_POST["cuidad"])) {
            $cuidad = "";
        } else {
            $cuidad = $_POST["cuidad"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = "";
        } else {
            $cp = $_POST["cp"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //addinfo
        if (empty($_POST["addinfo"])) {
            $addinfo = "";
        } else {
            $addinfo = $_POST["addinfo"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tutor (idialumno, parentesco, nombre, apellidos, telefono, celular, email, email2, pais, cuidad, cp, direccion, addinfo) VALUES "
                    . "('" . $idialumno . "', '" . $parentesco . "', '" . $nombre . "', '" . $apellidos . "', '" . $telefono . "', '" . $celular . "', '" . $email . "', '" . $email2 . "', '" . $pais . "', '" . $cuidad . "', '" . $cp . "', '" . $direccion . "', '" . $addinfo . "')";
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
     * Retorna si la fecha de inscripcione esta vencida o no.
     * @param type $fecha
     * @return boolean
     */
    function comparaCicloVencido($fecha) {
        if (empty($fecha)) {
            return false;
        } else {
            echo $hoy = date("Y-m-d");
            if ($hoy > $fecha) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Esta funcion calcula el descuento de un producto o servicio
     * dado el precio y el descuento a aplicar
     * @param type $price
     * @param type $descuento
     * @return $precioReal
     */
    function descuento($price, $descuento) {
        $precioReal = "";
        $descuentoReal = ($price * $descuento) / 100;
        $precioReal = $price - $descuentoReal;
        return $precioReal;
    }

    /**
     * retorna el recio con recargo de un servicio dado el precio actual mas el recargo
     * @param type $price
     * @param type $recargo
     * @return type
     */
    function recargo($price, $recargo) {
        $precioReal = "";
        $descuentoReal = ($price * $recargo) / 100;
        $precioReal = $price + $descuentoReal;
        return $precioReal;
    }

    /**
     *  Genera el cobro automatico a un estudante inscrito a Licenciatura
     * @param type $idialumno int
     * @param type $cuatrimestre int
     * @param type $periodo int 
     * @param type $idiplan int
     */
    function cobroAlumnoLicenciatura($idialumno, $cuatrimestre, $periodo, $idiplan) {
        $credencial = 2; //idiservicio CREDENCIAL
        $costCredencial = $this->getPrecioServicioByID($credencial);
        $coverturaAnual = 3; //idiservicio COBERTURA ANUAL
        $costoCoverturaAnual = $this->getPrecioServicioByID($coverturaAnual);

        include './conexion.php';
        //CREDENCIAL
        $sql = "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //COVERTURA
        if ($cuatrimestre === 0 || $cuatrimestre === 3 || $cuatrimestre === 7 || $cuatrimestre === 11 || $cuatrimestre === 15 || $cuatrimestre === 19 || $cuatrimestre === 23 || $cuatrimestre === 27) {
            $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $coverturaAnual . "',  '" . $costoCoverturaAnual . "', '1', '0', '" . $costoCoverturaAnual . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Cobertura Anual Estudiantil', 'Pendiente');";
        }
        //PARCIALIDADES
        $sql .= "INSERT INTO venta_as_servicio ( idiservicio, precio, descuento, total, periodo, comentario, recargo, fecha_limite, idiuser, idialumno, unidad ) SELECT s.idiservicio, s.precio, s.descuento, s.precio AS total, c.ciclo AS periodo, UPPER( CONCAT( s.Descripcion,' ', v.mVence ) ) AS comentario, v.porcentaje_cargo AS recargo, v.fecha_limite AS fecha_limite, $this->idiControlEscolar, $idialumno, 1 FROM plan_pago AS p, cliclo AS c, cNiveles AS n, cTurno AS t, servicios AS s, vencimiento AS v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan;";
        if ($conn->multi_query($sql) === TRUE) {
            // echo " Cobros por inscripcion la licenciatura agregados coorectamente ";
            // sleep(3); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function cobroAlumnoLicenciaturaOriginal($idialumno, $periodo, $turno, $matricula, $cuatrimestre, $beca_colegiatura, $f_limite_inscripcion) {
        //$idialumno = 1;
        //$idiventa = $this->generarFolioPago();
        $idiventa = null;
        //$periodo = "2019-2";
        $inscripcion = 1; //idiservicio
        //$msginscripcion
        $vencido = $this->comparaCicloVencido($f_limite_inscripcion);
        /**
         * Validamos si el alumno va a pagar recargo por inscriocion extemporánea
         */
        if ($vencido) {
            $msginscripcion = "Extemporánea, recargo del 10% periodo $periodo";
            //$costInscripcion = $this->getPrecioServicioByID($inscripcion);
            $costInscripcion = $this->recargo($this->getPrecioServicioByID($inscripcion), 10);
        } else {
            $msginscripcion = "Inscripción periodo $periodo";
            $costInscripcion = $this->getPrecioServicioByID($inscripcion);
        }
        $credencial = 2; //idiservicio
        $costCredencial = $this->getPrecioServicioByID($credencial);
        //$parcialidad = ""; //idiservicio
        if ($turno == "Matutino") {
            $parcialidad = 6;
        }
        if ($turno == "Vespertino") {
            $parcialidad = 7;
        }
        if ($turno == "Nocturno") {
            $parcialidad = 8;
        }
        if ($turno == "Martes y Jueves") {
            $parcialidad = 9;
        }
        if ($turno == "Sabatino") {
            $parcialidad = 11;
        }
        if ($turno == "Dominical") {
            $parcialidad = 11;
        }
        $costParcialidad = $this->descuento($this->getPrecioServicioByID($parcialidad), $beca_colegiatura);
        $plataforma = 19; //idiservicio
        $costPlanaforma = $this->getPrecioServicioByID($plataforma);
        $coverturaAnual = 3;
        $costoCoverturaAnual = $this->getPrecioServicioByID($coverturaAnual);

        include './conexion.php';
        //inscripcion diplomado
        $sql = "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $inscripcion . "',  '" . $costInscripcion . "', '1', '0', '" . $costInscripcion . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', '$msginscripcion', 'Pendiente');";
        //credencial diplomado
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //covertura anual estudiantil
        if ($cuatrimestre === 0 || $cuatrimestre === 3 || $cuatrimestre === 7 || $cuatrimestre === 11 || $cuatrimestre === 15 || $cuatrimestre === 19 || $cuatrimestre === 23 || $cuatrimestre === 27) {
            //echo "CUATRIMESTRES $cuatrimestre";
            $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $coverturaAnual . "',  '" . $costoCoverturaAnual . "', '1', '0', '" . $costoCoverturaAnual . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Cobertura Anual Estudiantil', 'Pendiente');";
        }
        //parcialidad 1
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Primera Parcialidad', 'Pendiente');";
        //parcialidad 2
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Segunda Parcialidad', 'Pendiente');";
        //parcialidad 3
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Tercera Parcialidad', 'Pendiente');";
        //parcialidad 4
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Cuarta Parcialidad', 'Pendiente');";
        //parcialidad 5
        //$sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, idiventa, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "', '" . $idiventa . "', '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Quinta Parcialidad');";
        //Uso de plataforma
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $plataforma . "',  '" . $costPlanaforma . "', '1', '0', '" . $costPlanaforma . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Uso de plataforma moodle', 'Pendiente');";

        if ($conn->multi_query($sql) === TRUE) {
            // echo " Cobros por inscripcion la licenciatura agregados coorectamente ";
            // sleep(3); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Genera el cobro automatico a un estudante inscrito a Maestria
     * @param type $idialumno
     * @param type $cuatrimestre
     * @param type $periodo
     * @param type $idiplan
     */
    function cobroAlumnoMaestria($idialumno, $cuatrimestre, $periodo, $idiplan) {
        $credencial = 12; //idiservicio
        $costCredencial = $this->getPrecioServicioByID($credencial);
        include './conexion.php';
        //Credencial
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //PARCIALIDADES
        $sql .= "INSERT INTO venta_as_servicio ( idiservicio, precio, descuento, total, periodo, comentario, recargo, fecha_limite, idiuser, idialumno, unidad ) SELECT s.idiservicio, s.precio, s.descuento, s.precio AS total, c.ciclo AS periodo, UPPER( CONCAT( s.Descripcion,' ', v.mVence ) ) AS comentario, v.porcentaje_cargo AS recargo, v.fecha_limite AS fecha_limite, $this->idiControlEscolar, $idialumno, 1 FROM plan_pago AS p, cliclo AS c, cNiveles AS n, cTurno AS t, servicios AS s, vencimiento AS v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan;";
        if ($conn->multi_query($sql) === TRUE) {
            //echo " Cobros por inscripcion a maestria agregados ";
            // sleep(2); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function cobroAlumnoMaestriaOriginal($idialumno, $periodo, $matricula, $beca_colegiatura, $f_limite_inscripcion) {
        //$idialumno = 1;
        //$idiventa = $this->generarFolioPago();
        $idiventa = null;
        //$periodo = "2019-2";
        $inscripcion = 4; //idiservicio
        //$costInscripcion = $this->getPrecioServicioByID($inscripcion);
        //$msginscripcion
        $vencido = $this->comparaCicloVencido($f_limite_inscripcion);
        /**
         * Validamos si el alumno va a pagar recargo por inscriocion extemporánea
         */
        if ($vencido) {
            $msginscripcion = "Extemporánea, recargo del 10% periodo $periodo";
            //$costInscripcion = $this->getPrecioServicioByID($inscripcion);
            $costInscripcion = $this->recargo($this->getPrecioServicioByID($inscripcion), 10);
        } else {
            $msginscripcion = "Inscripción periodo $periodo";
            $costInscripcion = $this->getPrecioServicioByID($inscripcion);
        }
        $credencial = 12; //idiservicio
        $costCredencial = $this->getPrecioServicioByID($credencial);
        $parcialidad = 5; //idiservicio
        //$costParcialidad = $this->getPrecioServicioByID($parcialidad);
        $costParcialidad = $this->descuento($this->getPrecioServicioByID($parcialidad), $beca_colegiatura);
        $plataforma = 19; //idiservicio
        $costPlanaforma = $this->getPrecioServicioByID($plataforma);

        include './conexion.php';
        //inscripcion diplomado
        $sql = "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $inscripcion . "',  '" . $costInscripcion . "', '1', '0', '" . $costInscripcion . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', '$msginscripcion', 'Pendiente');";
        //credencial diplomado
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //parcialidad 1
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Primera Parcialidad', 'Pendiente');";
        //parcialidad 2
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Segunda Parcialidad', 'Pendiente');";
        //parcialidad 3
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Tercera Parcialidad', 'Pendiente');";
        //parcialidad 4
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Cuarta Parcialidad', 'Pendiente');";
        //parcialidad 5
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $parcialidad . "',  '" . $costParcialidad . "', '1', '0', '" . $costParcialidad . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Quinta Parcialidad', 'Pendiente');";
        //Uso de plataforma
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio, precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $plataforma . "',  '" . $costPlanaforma . "', '1', '0', '" . $costPlanaforma . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Uso de plataforma moodle', 'Pendiente');";
        if ($conn->multi_query($sql) === TRUE) {
            //echo " Cobros por inscripcion a maestria agregados ";
            // sleep(2); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Genera el cobro automatico a un estudante inscrito a Doctorado
     * @param type $idialumno
     * @param type $cuatrimestre
     * @param type $periodo
     * @param type $idiplan
     */
    function cobroAlumnoDoctorado($idialumno, $cuatrimestre, $periodo, $idiplan) {
        $credencial = 15; //idiservicio
        $costCredencial = $this->getPrecioServicioByID($credencial);
        include './conexion.php';
        //credencial 
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //PARCIALIDADES
        $sql .= "INSERT INTO venta_as_servicio ( idiservicio, precio, descuento, total, periodo, comentario, recargo, fecha_limite, idiuser, idialumno, unidad ) SELECT s.idiservicio, s.precio, s.descuento, s.precio AS total, c.ciclo AS periodo, UPPER( CONCAT( s.Descripcion,' ', v.mVence ) ) AS comentario, v.porcentaje_cargo AS recargo, v.fecha_limite AS fecha_limite, $this->idiControlEscolar, $idialumno, 1 FROM plan_pago AS p, cliclo AS c, cNiveles AS n, cTurno AS t, servicios AS s, vencimiento AS v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan;";
        if ($conn->multi_query($sql) === TRUE) {
            //echo " Cobros por inscripcion al doctorado agregados ";
            //sleep(2); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Genera el cobro automatico a un estudante inscrito a Diplomado
     * @param type $idialumno
     * @param type $cuatrimestre
     * @param type $periodo
     * @param type $idiplan
     */
    function cobroAlumnoDiplo($idialumno, $cuatrimestre, $periodo, $idiplan) {
        $credencial = 17; //idiservicio
        $costCredencial = $this->getPrecioServicioByID($credencial);
        include './conexion.php';
        //credencial diplomado
        $sql .= "INSERT INTO venta_as_servicio (idialumno, idiservicio,  precio, unidad, descuento, total, idiuser, periodo, comentario, estatus) VALUES ('" . $idialumno . "', '" . $credencial . "',  '" . $costCredencial . "', '1', '0', '" . $costCredencial . "', '" . $this->idiControlEscolar . "', '" . $periodo . "', 'Credencial', 'Pendiente');";
        //PARCIALIDADES
        $sql .= "INSERT INTO venta_as_servicio ( idiservicio, precio, descuento, total, periodo, comentario, recargo, fecha_limite, idiuser, idialumno, unidad ) SELECT s.idiservicio, s.precio, s.descuento, s.precio AS total, c.ciclo AS periodo, UPPER( CONCAT( s.Descripcion,' ', v.mVence ) ) AS comentario, v.porcentaje_cargo AS recargo, v.fecha_limite AS fecha_limite, $this->idiControlEscolar, $idialumno, 1 FROM plan_pago AS p, cliclo AS c, cNiveles AS n, cTurno AS t, servicios AS s, vencimiento AS v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan;";
        if ($conn->multi_query($sql) === TRUE) {
            //echo " Cobros por inscripcion al diplomado agregados ";
            //sleep(2); //delay de un segundo para que derive el cobro completo
            //$this->setPagoDetalleToAlumno($idiventa, $idialumno, $matricula);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function setPagoDetalleToAlumno($idiventa, $idialumno, $matricula) {
        sleep(0.5); //
        echo "*setPagoDetalleToAlumno idiventa: $idiventa idialumno: $idialumno * ";
        //$TotalConcepos = $this->getSubtotal($idiventa, $idialumno);
        $folio = $this->getFolioPagoByID($idiventa); //getfoioVentabyID
        $estatus = "Pendiente"; //Pendiente
        //getSubtotal($idiventa, $idialumno)
        $subtotal = $this->getSubtotal($idiventa, $idialumno); //getSubtotalVenta
        $descuento = 0; //0
        $total = $this->getSubtotal($idiventa, $idialumno); //getSubtotalVenta
        $metodo_pago = "EFECTIVO";
        $comentarios = "Cargos por inscripción";

        include './conexion.php';
        $sql = "INSERT INTO pagos (idiventa, matricula,folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, idiusuario) VALUES ('" . $idiventa . "', '" . $matricula . "','" . $folio . "', '" . $estatus . "', '" . $subtotal . "', '" . $descuento . "', '" . $total . "', '" . $metodo_pago . "', '" . $comentarios . "', '" . $this->NombreControlEscolar . "')";
        if ($conn->query($sql) === TRUE) {
            echo "Cobro agregado correctamente $subtotal ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Genera folio de pago y retorna el id del registro qie se genero
     * al momento de cargar la pagina de pago.php
     */
    function generarFolioPago() {
        include './conexion.php';
        $cons = $this->lastIdVenta(); //consecutivo de venta
        $key = $this->generarCodigo(6); //string de 6 numeros
        $folio = $key . '-' . $cons;
        $sql = "INSERT INTO venta (folio) VALUES ('" . strtoupper($folio) . "')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id; // devuelve el id de registro
            return $last_id;
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
    function getFolioPagoByID($idiventa) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT folio FROM venta WHERE idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["folio"];
            }
            return $rows;
        } else {
            return $row + 1;
        }
        $conn->close();
    }

    function getSubtotal($idiventa, $idialumno) {
        include './conexion.php';
        $sql = "SELECT SUM(total) as subtotal FROM venta_as_servicio WHERE idiventa = " . $idiventa . " and idialumno = " . $idialumno;
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["subtotal"];
            }
            return $rows;
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

    function getPrecioServicioByID($idiservicio) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT precio FROM servicios WHERE idiservicio = $idiservicio";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["precio"];
            }
            return $rows;
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
     * Trigger que inserta a alumno en moodle
     */
    public function core_user_create_user($username, $firstname, $lastname, $email) {
        try {
            include '../msw/core_token_service_web_moodle.php';
            $functionname = 'core_user_create_users';
            $restformat = 'json';

            $user = array(
                'username' => strtolower($username), // must be unique string in lowercase
                'password' => '1234567891011',
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email, //unique
                'auth' => 'manual',
                'lang' => 'en'
            );

            $users = array($user); // must be wrapped in an array because it's plural.
            $param = array("users" => $users); // the paramater to send
            $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
            require_once('../msw/curl.php'); // You can put it in the top.
            $curl = new curl;
            $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
            $resp = $curl->post($serverurl . $restformat, $param);
            print_r($resp);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * addAlumno()
     * Guarda el registro de un alumno
     */
    function addAlumno() {
        $errorMSG = "";
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //carrera
        if (empty($_POST["carrera"])) {
            $errorMSG .= "carrera is required ";
        } else {
            $carrera = $_POST["carrera"];
        }
        //idigenerales
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        //generacion
        if (empty($_POST["generacion"])) {
            $errorMSG .= "generacion is required ";
        } else {
            $generacion = $_POST["generacion"];
        }
        if (empty($_POST["periodo"])) {
            $errorMSG .= "periodo is required ";
        } else {
            $periodo = $_POST["periodo"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $errorMSG .= "turno is required ";
        } else {
            $turno = $_POST["turno"];
        }
//        //vigencia
//        if (empty($_POST["vigencia"])) {
//            $errorMSG .= "vigencia is required ";
//        } else {
//            $vigencia = $_POST["vigencia"];
//        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $$codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }
        if (empty($_POST["image"])) {
            //$errorMSG = "Capture la foto del estudiante! ";
            $img = null;
            $var = false;
        } else {
            $img = $_POST["image"];
        }
        //clave
        if (empty($_POST["clave"])) {//Plantel
            $errorMSG .= "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nivel
        if (empty($_POST["nivel"])) {//nivel de estudios
            $errorMSG .= "nivel is required ";
        } else {
            $nivel = $_POST["nivel"];
        }
        //idiCarrera
        if (empty($_POST["idiCarrera"])) {//Numero de carrera
            $errorMSG .= "idiCarrera is required ";
        } else {
            $idiCarrera = $_POST["idiCarrera"];
        }
        //moodle
        if (empty($_POST["moodle"])) {
            $moodle = "no";
        } else {
            $moodle = $_POST["moodle"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }
        //$categoria
        if (empty($_POST["categoria"])) {
            $errorMSG .= "categoria is required ";
        } else {
            $categoria = $_POST["categoria"];
        }
        //idiplan
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }

        if ($errorMSG == "") {
            $matricula = $this->setMatricula();
            if ($matricula == null) {
                echo 'Sin matricula';
            } else {
                //echo $matricula;
            }
            include './conexion.php';

            $sql = "INSERT INTO alumno (idicarrera, carrera, idigenerales, matricula, generacion, turno, codigo_credencial, cuatrimestre, idiuser, beca_colegiatura) VALUES "
                    . "('" . $idicarrera . "', '" . $carrera . "', '" . $idigenerales . "', '" . $matricula . "', '" . $periodo . "', '" . $turno . "',  '" . $codigo_credencial . "', '1', '" . $this->idiControlEscolar . "', '$beca_colegiatura');";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id; // devuelve el id de registro
                $this->addImageAlumno($last_id); //guardamos la foto del alumno
                $this->addDataCredencial($last_id); //Guardamos los datos de la credencial del estudiante
                $this->UpdateEstatusGeneral($idigenerales); //actualiza el estatus a Inscrito en la table de Datos Generales

                switch ($categoria) {
                    case "Licenciatura":
                        $this->cobroAlumnoLicenciatura($last_id, intval(0), $periodo, $idiplan);
                        break;
                    case "Maestría":
                        $this->cobroAlumnoMaestria($last_id, intval(0), $periodo, $idiplan);
                        break;
                    case "Doctorado":
                        $this->cobroAlumnoDoctorado($last_id, intval(0), $periodo, $idiplan);
                        break;
                    case "Diplomado":
                        $this->cobroAlumnoDiplo($last_id, intval(0), $periodo, $idiplan);
                        break;
                    default:
                        echo "Sin Categoria";
                }
                $rows = array();
                $data = array(
                    'idialumno' => $last_id
                );
                $rows['data'][] = $data;
                header('Content-Type: application/json');
                print json_encode($rows, JSON_PRETTY_PRINT);
//                //core_user_create_user($username, $firstname, $lastname, $email)
//                if ($moodle == "si") {
//                    echo 'moodle si';
//                    $username = $matricula;
//                    $firstname = $nombre;
//                    $lastname = "$apellido_paterno $apellido_materno";
//                    $idialumno = $last_id;
//                    try {
//                        include '../msw/core_token_service_web_moodle.php';
//                        $functionname = 'core_user_create_users';
//                        $restformat = 'json';
//
//                        $user = array(
//                            'username' => strtolower($username), // must be unique string in lowercase
//                            'password' => '123456789',
//                            'firstname' => $firstname,
//                            'lastname' => $lastname,
//                            'email' => $email, //unique
//                            'auth' => 'manual',
//                            'lang' => 'en',
//                            'preferences' => array(array('type' => 'auth_forcepasswordchange', 'value' => true)),
//                        );
//
//                        $users = array($user); // must be wrapped in an array because it's plural.
//                        $param = array("users" => $users); // the paramater to send
//                        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
//                        require_once('../msw/curl.php'); // You can put it in the top.
//                        $curl = new curl;
//                        $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
//                        $resp = $curl->post($serverurl . $restformat, $param);
//                        print_r($resp);
//                        $idimoodle = substr($resp, 7, 1);
//                        try {
//                            include './conexion.php';
//                            //$sql = "UPDATE credencial SET idimoodle = '" . $idimoodle . "', moodle_request = '" . $resp . "' WHERE credencial.idialumno = $last_id";
//                            $sql = "UPDATE credencial SET moodle_request = '" . $resp . "' WHERE credencial.idialumno = $idialumno";
//                            if ($conn->query($sql) === TRUE) {
//                                echo " credencial SET idimoodle updated successfully";
//                            } else {
//                                echo "Error updating record: " . $conn->error;
//                            }
//                            $conn->close();
//                        } catch (Exception $excx) {
//                            echo $excx->getTraceAsString();
//                        }
//                    } catch (Exception $exc) {
//                        echo $exc->getTraceAsString();
//                    }
//                }
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

    function reinscription() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //matricula
        if (empty($_POST["matricula"])) {
            $errorMSG .= "matricula is required ";
        } else {
            $matricula = $_POST["matricula"];
        }
        //carrera
        if (empty($_POST["carrera"])) {
            $errorMSG .= "carrera is required ";
        } else {
            $carrera = $_POST["carrera"];
        }
        //cuatrimestre
        if (empty($_POST["cuatrimestre"])) {
            $errorMSG .= "cuatrimestre is required ";
        } else {
            $cuatrimestre = $_POST["cuatrimestre"];
        }
        //promovido
        if (empty($_POST["promovido"])) {
            $errorMSG .= "promovido is required ";
        } else {
            $promovido = $_POST["promovido"];
        }
        //generacion
        if (empty($_POST["generacion"])) {
            $errorMSG .= "generacion is required ";
        } else {
            $generacion = $_POST["generacion"];
        }
        //generacion
        if (empty($_POST["periodo"])) {
            $errorMSG .= "";
        } else {
            $periodo = $_POST["periodo"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $errorMSG .= "turno is required ";
        } else {
            $turno = $_POST["turno"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $termino = "";
        } else {
            $termino = $_POST["termino"];
        }
        //categoria
        if (empty($_POST["categoria"])) {
            $errorMSG .= "categoria is required ";
        } else {
            $categoria = $_POST["categoria"];
        }
        //idiplan
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET cuatrimestre = '" . $promovido . "', cuatrimestres_trasncurridos = '" . $cuatrimestre . "', turno = '" . $turno . "' WHERE alumno.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Alumno reinscrito";
                $this->reinscripcion_set_credencial(); //Actualiza datos de la credencial
                //Agregamos el cobro automatico al estudiante
                switch ($categoria) {
                    case "Licenciatura":
                        $this->cobroAlumnoLicenciatura($idialumno, intval($cuatrimestre), $periodo, $idiplan);
                        break;
                    case "Maestría":
                        $this->cobroAlumnoMaestria($idialumno, intval($cuatrimestre), $periodo, $idiplan);
                        break;
                    case "Doctorado":
                        $this->cobroAlumnoDoctorado($idialumno, intval($cuatrimestre), $periodo, $idiplan);
                        break;
                    case "Diplomado":
                        $this->cobroAlumnoDiplo($idialumno, intval($cuatrimestre), $periodo, $idiplan);
                        break;
                    default:
                        echo "Your favorite color is neither red, blue, nor green!";
                }
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

    function reinscripcion_set_credencial() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //vigencia
        if (empty($_POST["vigencia"])) {
            $errorMSG .= "vigencia is required ";
        } else {
            $vigencia = $_POST["vigencia"];
        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //
            //echo "success";
            include './conexion.php';
            $sql = "UPDATE credencial SET codigo_credencial = '" . $codigo_credencial . "', vigencia = '" . $vigencia . "' WHERE credencial.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
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

    function profesor() {
        $errorMSG = "";
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
//genero
        if (empty($_POST["genero"])) {
            $genero = "";
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = "18";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
//nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = "";
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["cedula"])) {
            $cedula = "";
        } else {
            $cedula = $_POST["cedula"];
        }
        //nivelegreso
        if (empty($_POST["grado"])) {
            $grado = "";
        } else {
            $grado = $_POST["grado"];
        }
        //fechaegreso
        if (empty($_POST["perfil"])) {
            $perfil = "";
        } else {
            $perfil = $_POST["perfil"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = "";
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = "";
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = "";
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = date("Y/m/d");
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = "";
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = "";
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = "";
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //plantel
        if (empty($_POST["idicampus"])) {
            $idicampus = "";
        } else {
            $idicampus = $_POST["idicampus"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO profesor (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, cedula, grado, perfil, infoadicional, tiposangre, alergias, fecha_nacimiento, emergencias, idicampus) VALUES "
                    . "                  ('1', '" . strtoupper($nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "', '" . $genero . "', '" . $edad . "', '" . strtoupper($curp) . "', '" . strtoupper($rfc) . "', '" . strtoupper($nss) . "', '" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . strtoupper($cedula) . "', '" . $grado . "', '" . $perfil . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "', '$emergencias', '" . $idicampus . "')";
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

    function getUserSAEMByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiuser"])) {
            $errorMSG = "idiuser is required ";
        } else {
            $idiuser = $_GET["idiuser"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT user.idiuser, user.idirole, user.estatus,user.email,  role.role, user.Nombre, user.apellido_paterno, user.apellido_materno, user.user, user.password,user.email from user, role WHERE user.idirole = role.idirole and user.idiuser = $idiuser and user.categoria='admin'";
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

    function getUserSAEM() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT user.idiuser, user.idirole, user.estatus,user.email,  role.role, user.Nombre, user.apellido_paterno, user.apellido_materno, user.user, user.email from user, role WHERE user.idirole = role.idirole and user.categoria='admin'";
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

    function addUserSAEM() {
        $errorMSG = "";
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG = "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $errorMSG .= "apellido_materno is required ";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //rol
        if (empty($_POST["idirole"])) {
            $errorMSG .= "idirole is required ";
        } else {
            $idirole = $_POST["idirole"];
        }
        //user
        if (empty($_POST["user"])) {
            $errorMSG .= "user is required ";
        } else {
            $user = $_POST["user"];
        }
        //password
        if (empty($_POST["sena"])) {
            $errorMSG .= "Contraseña is required ";
        } else {
            $sena = $_POST["sena"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO user (idirole, Nombre, apellido_paterno, apellido_materno, user, password, email, estatus, categoria) VALUES "
                    . "('" . $idirole . "', '" . strtoupper($Nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "', '" . $user . "', '" . $sena . "', '" . $email . "', 'Activo', 'admin')";
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

    function updateUSerSAEM() {
        $errorMSG = "";
        //idiuser
        if (empty($_POST["idiuser"])) {
            $errorMSG .= "idiuser is required ";
        } else {
            $idiuser = $this->xss($_POST["idiuser"]);
        }
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $this->xss($_POST["Nombre"]);
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $this->xss($_POST["apellido_paterno"]);
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $errorMSG .= "apellido_materno is required ";
        } else {
            $apellido_materno = $this->xss($_POST["apellido_materno"]);
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $this->xss($_POST["email"]);
        }
        //user
        if (empty($_POST["user"])) {
            $errorMSG .= "user is required ";
        } else {
            $user = $this->xss($_POST["user"]);
        }
        //idiuser
        if (empty($_POST["idirole"])) {
            $errorMSG .= "idirole is required ";
        } else {
            $idirole = $this->xss($_POST["idirole"]);
        }
        //estatus
        if (empty($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $this->xss($_POST["estatus"]);
        }
        if (empty($_POST["psd"])) {
            $errorMSG .= "password is required ";
        } else {
            $pwd = $this->xss($_POST["psd"]);
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE user SET idirole = '$idirole', password='$pwd', Nombre = '$Nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', user = '$user', email = '$email', estatus = '$estatus' WHERE user.idiuser = $idiuser";
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

    function beca() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET beca_colegiatura = '$beca_colegiatura' WHERE alumno.idialumno = " . $idialumno . ";";
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

    function addCiclo() {
        $errorMSG = "";
        //abrev
        if (empty($_POST["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_POST["abrev"];
        }
        //ciclo
        if (empty($_POST["ciclo"])) {
            $errorMSG .= "ciclo is required ";
        } else {
            $ciclo = $_POST["ciclo"];
        }
        //inicio
        if (empty($_POST["inicio"])) {
            $errorMSG .= "inicio is required ";
        } else {
            $inicio = $_POST["inicio"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $errorMSG .= "termino is required ";
        } else {
            $termino = $_POST["termino"];
        }
        //limite_inscipcion
        if (empty($_POST["limite_inscipcion"])) {
            $errorMSG .= "limite_inscipcion is required ";
        } else {
            $limite_inscipcion = $_POST["limite_inscipcion"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cliclo (abrev, ciclo, inicio, termino, limite_inscipcion) VALUES ('$abrev', '$ciclo', '$inicio', '$termino', '$limite_inscipcion')";
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

    function updateCiclo() {
        $errorMSG = "";
        //abrev
        if (empty($_POST["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_POST["abrev"];
        }
        //ciclo
        if (empty($_POST["ciclo"])) {
            $errorMSG .= "ciclo is required ";
        } else {
            $ciclo = $_POST["ciclo"];
        }
        //inicio
        if (empty($_POST["inicio"])) {
            $errorMSG .= "inicio is required ";
        } else {
            $inicio = $_POST["inicio"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $errorMSG .= "termino is required ";
        } else {
            $termino = $_POST["termino"];
        }
        //idiciclo
        if (empty($_POST["idiciclo"])) {
            $errorMSG .= "idiciclo is required ";
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        //limite_inscipcion
        if (empty($_POST["limite_inscipcion"])) {
            $errorMSG .= "limite_inscipcion is required ";
        } else {
            $limite_inscipcion = $_POST["limite_inscipcion"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cliclo SET abrev = '$abrev', ciclo = '$ciclo', inicio = '$inicio', termino = '$termino', limite_inscipcion='$limite_inscipcion' WHERE cliclo.idiciclo = $idiciclo";
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
     * genera matricula escolar y
     * retorna la matricula
     * @return string
     */
    function setMatricula() {
        $errorMSG = "";
        //generacion
        if (empty($_POST["generacion"])) {//ciclo escolar
            $errorMSG = "generacion is required ";
        } else {
            $generacion = $_POST["generacion"];
        }
        //clave
        if (empty($_POST["clave"])) {//Plantel
            $errorMSG .= "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nivel
        if (empty($_POST["nivel"])) {//nivel de estudios
            $errorMSG .= "nivel is required ";
        } else {
            $nivel = $_POST["nivel"];
        }
        //idiCarrera
        if (empty($_POST["idiCarrera"])) {//Numero de carrera
            $errorMSG .= "idiCarrera is required ";
        } else {
            $idiCarrera = $_POST["idiCarrera"];
        }
        $numeroConsecutivo = $this->getLastIdMatricula(); //numero Consecutivo
        if ($numeroConsecutivo == null) {
            $numeroConsecutivo = 1;
        } else {
            $numeroConsecutivo;
        }
        // redirect to success page
        if ($errorMSG == "") {
            $numero_carrera = $this->getNumero_Carrera($idiCarrera);
            $matriculaEscolar = $generacion . $clave . $nivel . $numero_carrera . $numeroConsecutivo;
            include './conexion.php';
            $sql = "INSERT INTO matricula (matricula, ciclo_escolar, plantel, nivel, carrera, consecutivo) VALUES ('" . $matriculaEscolar . "', '" . $generacion . "', '" . $clave . "', '" . $nivel . "', '" . $idiCarrera . "', '" . $numeroConsecutivo . "')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id; //recupero ultimo id insertado
                //$actualyMatricula = getMatriculaByID($last_id); //consulto la matrucula del ultimo id y lo almaceno en $actualyMatricula
                $actualyMatricula = $this->getMatriculaByID($last_id); //consulto la matrucula del ultimo id y lo almaceno en $actualyMatricula
                return $actualyMatricula; //retono la matricula
            } else {
                return "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                return "Something went wrong :(";
            } else {
                return $errorMSG;
            }
        }
    }

    function updateEstatusByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //estatus
        if (empty($_POST["estatus"]) || is_null($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET estatus='$estatus' WHERE idialumno='$idialumno'";
            if ($conn->query($sql) === TRUE) {
                echo "Alumno actualizado con el estatus: $estatus";
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

    function updateCodigoCredencialByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //estatus
        if (empty($_POST["codigo_credencial"]) || is_null($_POST["codigo_credencial"])) {
            $errorMSG = "NULL";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET codigo_credencial='$codigo_credencial' WHERE idialumno='$idialumno';";
            $sql .= "UPDATE credencial SET codigo_credencial='$codigo_credencial' WHERE idialumno='$idialumno';";
            if ($conn->multi_query($sql) === TRUE) {
                echo "Alumno actualizado con el número de credencial : $codigo_credencial";
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

    function addVencimiento() {
        $errorMSG = "";
        //data
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }
        //idiciclo
        if (empty($_POST["idiciclo"])) {
            $errorMSG .= "idiciclo is required ";
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //idiservicio
        if (empty($_POST["idiservicio"])) {
            $errorMSG .= "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
        //fecha_limite
        if (empty($_POST["fecha_limite"])) {
            $fecha_limite = '2119-01-01';
        } else {
            $fecha_limite = $_POST["fecha_limite"];
        }
        //porcentaje_cargo
        if (empty($_POST["porcentaje_cargo"])) {
            $errorMSG .= "porcentaje_cargo is required ";
        } else {
            $porcentaje_cargo = $_POST["porcentaje_cargo"];
        }
        //mVence
        if (empty($_POST["mVence"])) {
            $errorMSG .= "mVence is required ";
        } else {
            $mVence = $_POST["mVence"];
        }

        $vigencia = true;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO vencimiento (idiplan, idiciclo ,NivelId, TurnoId, idiservicio, fecha_limite, porcentaje_cargo, mVence, vigencia) VALUES ('$idiplan', '$idiciclo','$NivelId', '$TurnoId', '$idiservicio', '$fecha_limite', '$porcentaje_cargo', '$mVence', $vigencia);";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error creating record: " . $conn->error;
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

    function updateVencimiento() {
        $errorMSG = "";
        //idiservicio
        if (empty($_POST["midivencimiento"])) {
            $errorMSG .= "midivencimiento is required ";
        } else {
            $idivencimiento = $_POST["midivencimiento"];
        }
        //mVence
        if (empty($_POST["mmVence"])) {
            $errorMSG .= "mmVence is required ";
        } else {
            $mVence = $_POST["mmVence"];
        }
        //porcentaje_cargo
        if (empty($_POST["mporcentaje_cargo"])) {
            $errorMSG .= "mporcentaje_cargo is required ";
        } else {
            $porcentaje_cargo = $_POST["mporcentaje_cargo"];
        }
        //fecha_limite
        if (empty($_POST["mfecha_limite"])) {
            $errorMSG .= "mfecha_limite is required ";
        } else {
            $fecha_limite = $_POST["mfecha_limite"];
        }
        $vigencia = true;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE vencimiento SET mVence = '$mVence', porcentaje_cargo= '$porcentaje_cargo', fecha_limite = '$fecha_limite' where idivencimiento = $idivencimiento";
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

    function getVencimientoByID() {
        $errorMSG = "";
        //idivencimiento
        if (empty($_GET["idivencimiento"])) {
            $errorMSG = NULL;
        } else {
            $idivencimiento = $_GET["idivencimiento"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT v.idivencimiento, p.clave, p.descripcion as plan, c.ciclo, n.Descripcion as nivel, t.Descripcion as turno, s.descripcion as servicio, s.precio, v.porcentaje_cargo as recargo, v.mVence as mes, v.fecha_limite as vencimiento FROM plan_pago as p, cliclo as c, cNiveles as n, cTurno as t, servicios as s, vencimiento as v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idivencimiento = $idivencimiento";
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

    function getGrupos() {
        $errorMSG = "";
        //idivencimiento
        if (empty($_GET["idicarrera"])) {
            $errorMSG = 'idicarrera is required';
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        //CicloId
        if (empty($_GET["CicloId"])) {
            $CicloId = "";
        } else {
            $CicloId = ' AND c.idiciclo = ' . $_GET["CicloId"];
        }
        //TurnoId
        if (empty($_GET["TurnoId"])) {
            $TurnoId = "";
        } else {
            $TurnoId = ' AND g.TurnoId =' . $_GET["TurnoId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT g.GrupoId, g.Clave, g.Descripcion AS Grupo, cr.nombre AS Carrera, c.ciclo AS Ciclo, gr.Descripcion AS Grado, au.Descripcion AS Aula, t.Descripcion AS Turno, g.SituacionGrupoId AS Estatus, (SELECT COUNT(*) FROM tbAlumnoGrupo as alg where alg.GrupoId = g.GrupoId) as aforo FROM tbGrupos AS g, carrera AS cr, cliclo AS c, cGrados AS gr, cAulas AS au, cTurno AS t WHERE cr.idicarrera = g.CarreraId AND c.idiciclo = g.CicloId AND gr.GradosId = g.GradoId AND au.AulaId = g.AulaId AND t.TurnoId = g.TurnoId AND cr.idicarrera = $idicarrera $CicloId $TurnoId";
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

    function getVencimiento() {
        $errorMSG = "";
        //idicarrera
        if (empty($_GET["idiplan"])) {
            $errorMSG = 'Idiplan is required';
        } else {
            $idiplan = $_GET["idiplan"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT v.idivencimiento, p.clave, p.descripcion as plan, c.ciclo, n.Descripcion as nivel, t.Descripcion as turno, s.descripcion as servicio, s.precio, v.porcentaje_cargo as recargo, v.mVence as mes, v.fecha_limite as vencimiento FROM plan_pago as p, cliclo as c, cNiveles as n, cTurno as t, servicios as s, vencimiento as v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan";
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

    function deleteFechaPago() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idivencimiento"])) {
            $errorMSG = "idivencimiento is required ";
        } else {
            $idivencimiento = $_POST["idivencimiento"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM vencimiento WHERE idivencimiento = $idivencimiento";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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
     * CATALOGOS
     */
    function getGradosByID() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idiCarrera"])) {
            $errorMSG = "idiCarrera is required ";
        } else {
            $idiCarrera = $_GET["idiCarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados WHERE idicarrera =" . $idiCarrera;
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getMateriasByCarreraAndGradoID() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idiCarrera"])) {
            $errorMSG = "idiCarrera is required ";
        } else {
            $idiCarrera = $_GET["idiCarrera"];
        }
        if (empty($_GET["idigrado"])) {
            $errorMSG = "idigrado is required ";
        } else {
            $idigrado = $_GET["idigrado"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbMaterias WHERE CarreraId = '$idiCarrera' AND GradoId = '$idigrado'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getNivelbyAlumnoId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT DISTINCT c.NivelId, n.Descripcion FROM tbCalificaciones AS c, cNiveles AS n WHERE c.NivelId = n.NivelId AND AlumnoId = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getCiclosyAlumnoId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT DISTINCT g.CicloId, g.Descripcion FROM tbCalificaciones AS c, tbCiclos AS g WHERE g.CicloId = c.CicloId AND c.NivelId = $NivelId and c.AlumnoId = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    function getCalificacionesyAlumnoId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if (empty($_GET["CicloId"])) {
            $errorMSG = "CicloId is required ";
        } else {
            $CicloId = $_GET["CicloId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT c.CalificacionId, m.Clave, g.Descripcion as cuatri,m.Nombre, p.Descripcion, c.Promedio from tbCalificaciones as c, tbMaterias as m, tbPeriodo as p, tbGrupos as g WHERE g.GrupoId = c.GrupoId and  p.PeriodoId=c.PeriodoId and m.MateriaId = c.MateriaId and c.NivelId = $NivelId and c.AlumnoId = $idialumno and c.CicloId = $CicloId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    function updateSignByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        if (empty($_POST["sign"])) {
            $errorMSG = "sign is required ";
        } else {
            $sign = $_POST["sign"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE archivo SET nombre ='$sign' WHERE idialumno='$idialumno' AND titulo= 'firma';";
            if ($conn->query($sql) === TRUE) {
                echo "Firma actualizada";
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

    function addGrupoEscolar() {
        //Clave=Okis&Descripcion=Okis&idinivel=1&CarreraId=1&CicloId=3&GradosId=42&AulaId=14&TurnoId=2
        $errorMSG = "";
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = strtoupper($_POST["Clave"]);
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = strtoupper($_POST["Descripcion"]);
        }
        //NivelId
        if (empty($_POST["idinivel"])) {
            $errorMSG .= "idinivel is required ";
        } else {
            $idinivel = $_POST["idinivel"];
        }
        //CicloId
        if (empty($_POST["CicloId"])) {
            $errorMSG .= "CicloId is required ";
        } else {
            $CicloId = $_POST["CicloId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //GradoId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //AulaId
        if (empty($_POST["AulaId"])) {
            $errorMSG .= "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        //TurnoId
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbGrupos (Clave, Descripcion, NivelId, CicloId, GradoId, CarreraId, AulaId, TurnoId, PlantelId, SituacionGrupoId) VALUES ('$Clave', '$Descripcion', $idinivel, $CicloId, $GradosId, $CarreraId , $AulaId, $TurnoId, '1', '1');";
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

    function getbAlumnoGrupoByIdGrupo() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_GET["GrupoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    a.matricula AS Matricula,
                    d.apellido_paterno AS Apellido_Paterno,
                    d.apellido_materno AS Apellido_Materno,
                    d.nombre AS Nombre
                    FROM
                    datos_generales AS d,
                    alumno AS a,
                    tbAlumnoGrupo AS g 
                    WHERE
                    g.idialumno = a.idialumno 
                    AND a.idigenerales = d.idigenerales
                    AND g.GrupoId = $GrupoId
                    ORDER BY d.apellido_paterno ASC";
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

    // -------DAMIAN HERNANDEZ MERINO----------
    /**
     * MUESTRA LOS CAMPUS MEDIANTE UNA TABLA.
     */
    function getCampus() {
        $errorMSG = "";
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM campus";
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

    /*
     * AGREGA UN NUEVO ID  A LA TABLA DE CAMPUS.
     */

    function addCampus() {
        $errorMSG = "";
        //campus
        if (empty($_POST["campus"])) {
            $errorMSG = "campus is required ";
        } else {
            $campus = $_POST["campus"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $errorMSG = "direccion is required ";
        } else {
            $direccion = $_POST["direccion"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $errorMSG = "telefono is required ";
        } else {
            $telefono = $_POST["telefono"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO campus (campus, clave, direccion, telefono) VALUES ('$campus', '$clave', '$direccion', '$telefono')";
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

    /*
     * REALIZA LA ELIMINACION DEL IDI SELECCIONADOS
     */

    function deleteCampus() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM campus WHERE idicampus=$idicampus";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE DATOS DE LA FILA IDI SELECCIONADA 
     */

    function getCampusbyidicampus() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM campus WHERE idicampus=$idicampus";
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

    /*
     * ACTUALIZA LA INFORMACION DEL IDI SELECCIONADO
     */

    function updateCampus() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //campus
        if (empty($_POST["campus"])) {
            $errorMSG .= "campus is required ";
        } else {
            $campus = $_POST["campus"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG .= "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $errorMSG .= "direccion is required ";
        } else {
            $direccion = $_POST["direccion"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $errorMSG .= "telefono is required ";
        } else {
            $telefono = $_POST["telefono"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE campus SET campus='$campus', clave = '$clave', direccion = '$direccion', telefono = '$telefono' WHERE idicampus = '$idicampus'";
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

    /*
     * AGREGA UN NUEVO TURNOID  A LA TABLA DE TURNO.
     */

    function addcTurno() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cTurno (Descripcion, Estatus) VALUES ('$Descripcion', $Estatus)";
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

    /*
     * TRAE DATOS DE LA FILA TURNOID SELECCIONADA 
     */

    function getCampusbycTurnoId() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_GET["TurnoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cTurno WHERE TurnoId='$TurnoId'";
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

    /*
     * ACTUALIZA LA INFORMACION DEL TURNOID SELECCIONADO
     */

    function updatecTurno() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cTurno SET  Descripcion = '$Descripcion', Estatus = '$Estatus' WHERE TurnoId = '$TurnoId'";
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

    /*
     * REALIZA LA ELIMINACION DEL TURNOID SELECCIONADOS
     */

    function deletecTurno() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cTurno WHERE TurnoId=$TurnoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * AGREGA UN NUEVO SITUACIONID  A LA TABLA DE SITUACION.
     */

    function addcSituacion() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cSituacion (Descripcion, Estatus) VALUES ('$Descripcion', $Estatus)";
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
     * MUESTRA LAS SITUACIONES MEDIANTE UNA TABLA.
     */
    function getcSituacion() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cSituacion ";
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

    /*
     * TRAE DATOS DE LA FILA TURNOID SELECCIONADA 
     */

    function getSituacionbyId() {
        $errorMSG = "";
        //SituacionId
        if (empty($_GET["SituacionId"])) {
            $errorMSG = "SituacionId is required ";
        } else {
            $SituacionId = $_GET["SituacionId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cSituacion WHERE SituacionId='$SituacionId'";
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

    /*
     * REALIZA LA ELIMINACION DEL SITUACIONID SELECCIONADOS
     */

    function deletecSituacion() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["SituacionId"])) {
            $errorMSG = "SituacionID is required ";
        } else {
            $SituacionId = $_POST["SituacionId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cSituacion WHERE SituacionID=$SituacionId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * ACTUALIZA LA INFORMACION DEL SITUACION ID SELECCIONADO
     */

    function updatecSituacion() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["SituacionId"])) {
            $errorMSG .= "SituacionId is required ";
        } else {
            $SituacionId = $_POST["SituacionId"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cSituacion SET  Descripcion = '$Descripcion', Estatus = '$Estatus' WHERE SituacionId = '$SituacionId'";
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

    /*
     * AGREGA UNA NUEVA AULA ID A LA TABLA DE cAULAS.
     */

    function addAulas() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Clave"])) {
            $errorMSG = "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Decripcion
        if (empty($_POST["Capacidad"])) {
            $errorMSG .= "Capacidad is required ";
        } else {
            $Capacidad = $_POST["Capacidad"];
        }

        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idiCampus = $_POST["idicampus"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cAulas (Clave, Descripcion, Capacidad, Estatus,idicampus ) VALUES ('$Clave','$Descripcion','$Capacidad',$Estatus,'$idiCampus' )";
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

    /*
     * REALIZA LA ELIMINACION DEL AULA ID SELECCIONADOS
     */

    function deleteAula() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["AulaId"])) {
            $errorMSG = "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cAulas WHERE AulaId='$AulaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE DATOS DE LA FILA AULA ID SELECCIONADA 
     */

    function getAulasbyId() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["AulaId"])) {
            $errorMSG = "AulaId is required ";
        } else {
            $AulaId = $_GET["AulaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cAulas WHERE AulaId='$AulaId'";
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

    /*
     * ACTUALIZA LOS DATOS DE LA FILA AULAID SELECCIONADA 
     */

    function updateAula() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["AulaId"])) {
            $errorMSG .= "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        //Descripcion
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Estatus
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Capacidad
        if (empty($_POST["Capacidad"])) {
            $errorMSG .= "Capacidad is required ";
        } else {
            $Capacidad = $_POST["Capacidad"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cAulas SET  Clave = '$Clave', Descripcion = '$Descripcion', Capacidad = '$Capacidad' , Estatus = '$Estatus', idicampus = '$idicampus'  WHERE AulaId = '$AulaId'";
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

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcCarrerasbyID2() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where NivelId = $NivelId";
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

    /*
     * TRAE EL CAMPO ID CARRERA
     */

    function getGradosByIdCarrera() {
        $errorMSG = "";
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM `cGrados` WHERE idicarrera=$CarreraId;";
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

    /*
     * AGREGA UN NUEVO GRADO ID A LA TABLA DE cGRADOS.
     */

    function addcGrados() {
        $errorMSG = "";
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $idicarrera = $_POST["CarreraId"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cGrados (Descripcion, Abreviatura, NivelId, idicarrera,Estatus ) VALUES"
                    . " ('$Descripcion','$Abreviatura','$NivelId',$idicarrera,$Estatus )";
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

    /*
     * ACTUALIZA LA INFORMACION DEL GRADOS ID SELECCIONADO
     */

    function updatecGrados() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["GradosId"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cGrados SET GradosId = '$GradosId', Descripcion = '$Descripcion', Abreviatura = '$Abreviatura', NivelId= '$NivelId', idicarrera = '$idicarrera', Estatus = '$Estatus' WHERE GradosId = '$GradosId'";
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

    /*
     * REALIZA LA ELIMINACION DEL GRADO ID SELECCIONADOS
     */

    function deletecGrados() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cGrados WHERE GradosId='$GradosId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE EL CAMPO GRADOS ID
     */

    function getcGradosbyIdcarrera() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT FROM cGrados WHERE GradosId='$GradosId'";
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

    /*
     * AGREGA UN NUEVO NIVEL ID A LA TABLA DE cNIVELES.
     */

    function addcNiveles() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idiCampus = $_POST["idicampus"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        //RVOE
        if (empty($_POST["RVOE"])) {
            $RVOE = " ";
        } else {
            $RVOE = $_POST["RVOE"];
        }
        //TieneCarreras
        if (empty($_POST["TieneCarreras"])) {
            $TieneCarreras = 1;
        } else {
            $TieneCarreras = $_POST["TieneCarreras"];
        }
        //GradoMaximo
        if (empty($_POST["GradoMaximo"])) {
            $GradoMaximo = 1;
        } else {
            $GradoMaximo = $_POST["GradoMaximo"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cNiveles (Descripcion, Abreviatura,   idicampus , Estatus,  RVOE,  TieneCarreras,  GradoMaximo ) "
                    . "VALUES ('$Descripcion','$Abreviatura','$idiCampus',$Estatus, '$RVOE', '$TieneCarreras','$GradoMaximo')";
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

    /*
     * TRAE EL CAMPO IDICAMPUS
     */

    function getcNivelesbyidicampus() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cNiveles WHERE idicampus=$idicampus";
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

    /*
     * TRAE EL CAMPO GRADOSID
     */

    function getcGradosbyId() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados WHERE GradosId=$GradosId";
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

    /*
     * REALIZA LA ELIMINACION DEL NIVEL ID SELECCIONADOS
     */

    function deletecNiveles() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cNiveles WHERE NivelId='$NivelId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcNivelesbyIdNiveles() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cNiveles WHERE NivelId='$NivelId'";
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

    /*
     * ACTUALIZA LA INFORMACION DEL NIVEL ID SELECCIONADO
     */

    function updatecNiveles() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        if (empty($_POST["RVOE"])) {
            $RVOE = "";
        } else {
            $RVOE = $_POST["RVOE"];
        }
        //Tiene carrera
        if (empty($_POST["TieneCarreras"])) {
            $TieneCarreras = 1;
        } else {
            $TieneCarreras = $_POST["TieneCarreras"];
        }
        //GradoMaximo
        if (empty($_POST["GradoMaximo"])) {
            $GradoMaximo = 1;
        } else {
            $GradoMaximo = $_POST["GradoMaximo"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cNiveles SET  NivelId = '$NivelId', Descripcion = '$Descripcion', Abreviatura = '$Abreviatura' , idicampus = '$idicampus', Estatus = '$Estatus', RVOE = '$RVOE' , TieneCarreras = '$TieneCarreras', GradoMaximo='$GradoMaximo'  WHERE NivelId = '$NivelId'";
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

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcarrerabyNivelId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where NivelId = $NivelId";
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

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcarrerabyId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //idicarrera
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where idicarrera = $idicarrera";
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

    /*
     * TRAE EL CAMPO SELECCIONADO CON EL FILTRO DE  NIVELID, CARRERAID, GRADOID
     */

    function getMateriasByNivelIDAndCarreraIdAndGradoId() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        //GradoId
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradoId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbMaterias WHERE NivelId = '$NivelId' AND CarreraId = '$CarreraId' AND GradoId = '$GradoId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO SELECCIONADO IDICARRERA
     */

    function getcGradobyIDcarreraID() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where idicarrera = $idicarrera";
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

    /*
     * AGREGA UN NUEVO GRADO ID A LA TABLA DE cGRADOS.
     */

    function addTablaMateria() {
        $errorMSG = "";
        //DescripcionPlan
        if (empty($_POST["DescripcionPlan"])) {
            $errorMSG = "DescripcionPlan is required ";
        } else {
            $DescripcionPlan = $_POST["DescripcionPlan"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //GradosId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //Creditos
        if (empty($_POST["Creditos"])) {
            $errorMSG .= "Creditos is required ";
        } else {
            $Creditos = $_POST["Creditos"];
        }
        //HorasSemana
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }
        //HorasSemana
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbMaterias (DescripcionPlan, NivelId, CarreraId, GradoId, Clave, Nombre, Creditos, HorasSemana ) VALUES"
                    . " ('$DescripcionPlan','$NivelId','$CarreraId','$GradosId','$Clave', '$Nombre', '$Creditos', '$HorasSemana' )"; //AND GradoId = '$GradoId'";
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

    /*
     * REALIZA LA ELIMINACION DEL NIVEL ID SELECCIONADOS
     */

    function deleteTablaMateria() {
        $errorMSG = "";
        //MateriaId
        if (empty($_POST["MateriaId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM tbMaterias WHERE MateriaId='$MateriaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE LA INFORMACION DE LA MATERIA ID
     */

    function getcTablaMateriaId() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["MateriaId"])) {
            $errorMSG = "MateriaId is required ";
        } else {
            $MateriaId = $_GET["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbMaterias WHERE MateriaId=$MateriaId";
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

    /*
     * TRAE LA INFORMACION DE GRADOS ID SELECCIONADO
     */

    function getgradobyId() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where GradosId = $GradosId";
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

    /*
     * TRAE LA INFORMACION DE NIVEL ID SELECCIONADO
     */

    function getgradobyNivelId() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where NivelId = $NivelId";
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

    /*
     * ACTUALIZA LA INFORMACION DE LA MATERIA ID SELECCIONADA
     */

    function updateTablaMaterias() {
        $errorMSG = "";
        //MateriaID
        if (empty($_POST["MateriaId"])) {
            $errorMSG .= "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
            //DescripcionPlan
        }
        if (empty($_POST["DescripcionPlan"])) {
            $errorMSG .= "DescripcionPlan is required ";
        } else {
            $DescripcionPlan = $_POST["DescripcionPlan"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //GradoId
        if (empty($_POST["GradoId"])) {
            $errorMSG .= "GradoId is required ";
        } else {
            $GradoId = $_POST["GradoId"];
        }
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //Creditos
        if (empty($_POST["Creditos"])) {
            $errorMSG .= "Creditos is required ";
        } else {
            $Creditos = $_POST["Creditos"];
        }
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbMaterias SET  MateriaId = '$MateriaId', DescripcionPlan = '$DescripcionPlan', NivelId = '$NivelId' , CarreraId = '$CarreraId', GradoId = '$GradoId', Clave = '$Clave' , Nombre = '$Nombre', Creditos='$Creditos', HorasSemana = '$HorasSemana'  WHERE MateriaId = '$MateriaId'";
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

    /*
     * AGREGA UN NUEVO REPORTE A LA TABLA ALUMNOREPORTE
     */

    function addcReporte() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //idicliclo
        if (empty($_POST["idiciclo"])) {
            $idiciclo = 'NULL';
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        //idiprofesor
        if (empty($_POST["idiprofesor"])) {
            $idiprofesor = 'NULL';
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //descripcion
        if (empty($_POST["descripcion"])) {
            $errorMSG .= "descripcion is required ";
        } else {
            $descripcion = $_POST["descripcion"];
        }
        //citatorio
        if (empty($_POST["citatorio"])) {
            $citatorio = 0;
        } else {
            $citatorio = $_POST["citatorio"];
        }
        //fechaCita
        if (empty($_POST["fechaCita"])) {
            $fechaCita = 'NULL';
        } else {
            $f = $_POST["fechaCita"];
            $fechaCita = "'$f'";
        }
        //horaCita
        if (empty($_POST["horaCita"])) {
            $horaCita = 'NULL';
        } else {
            $h = $_POST["horaCita"];
            $horaCita = "'$h'";
        }
        //requiereTutor
        if (empty($_POST["requiereTutor"])) {
            $errorMSG .= "requiereTutor is required ";
        } else {
            $requiereTutor = $_POST["requiereTutor"];
            if ($requiereTutor === true) {
                $requiereTutor = 1;
            } elseif ($requiereTutor === false) {
                $requiereTutor = 0;
            }
        }
        //precentoTutor
        $precentoTutor = 0;
        //suspension
        if (empty($_POST["suspension"])) {
            $suspension = 0;
        } else {
            $suspension = $_POST["suspension"];
        }
        //fechaInicioSuspension
        if (empty($_POST["fechaInicioSuspension"])) {
            $fechaInicioSuspension = 'NULL';
        } else {
            $fi = $_POST["fechaInicioSuspension"];
            $fechaInicioSuspension = "'$fi'";
        }
        //fechaFinSuspension
        if (empty($_POST["fechaFinSuspension"])) {//true false
            $fechaFinSuspension = 'NULL';
        } else {
            $fn = $_POST["fechaFinSuspension"];
            $fechaFinSuspension = "'$fn'";
        }
        //observaciones
        if (empty($_POST["Observaciones"])) {//true false
            $errorMSG .= "Observaciones is required ";
        } else {
            $Observaciones = $_POST["Observaciones"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO alumnoReporte (idialumno, idiciclo, idiprofesor, descripcion, citatorio, fechaCita, horaCita , requiereTutor , precentoTutor, suspension, fechaInicioSuspension, fechaFinSuspension,  Observaciones ) "
                    . "VALUES ($idialumno, $idiciclo, $idiprofesor, '$descripcion', '$citatorio' , $fechaCita , $horaCita , $requiereTutor, $precentoTutor, $suspension, $fechaInicioSuspension, $fechaFinSuspension, '$Observaciones' )";
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

    /*
     * TRAE TODO LOS DATOS DE IDALUMNO SELECCIONADO
     */

    function getReporteByIdAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM alumnoReporte WHERE idialumno = $idialumno";
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

    /*
     * ELIMINA EL IDIALUMNOREPORTE SELECCIONADO
     */

    function deleteAlumnoReporte() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["idiAlumnoReporte"])) {
            $errorMSG = "idiAlumnoReporte is required ";
        } else {
            $idiAlumnoReporte = $_POST["idiAlumnoReporte"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM alumnoReporte WHERE idiAlumnoReporte='$idiAlumnoReporte'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE TODO LOS DATOS DE IDALUMNO SELECCIONADO
     */

    function getcTablaAlumnoReporte() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM alumnoReporte WHERE idialumno=$idialumno";
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

    /*
     * PERMITE ACTUALIZAR EL IDIALUMNOREPORTE SELECCIONADO
     */

    function updateAlumnoReporte() {
        $errorMSG = "";
        //idiAlumnoReporte
        if (empty($_POST["idiAlumnoReporte"])) {
            $errorMSG .= "idiAlumnoReporte is required ";
        } else {
            $idiAlumnoReporte = $_POST["idiAlumnoReporte"];
        }
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //precentoTutor
        if (empty($_POST["precentoTutor"])) {
            $errorMSG .= "precentoTutor is required ";
        } else {
            $precentoTutor = $_POST["precentoTutor"];
            if ($precentoTutor == 'true') {
                $precentoTutor = 1;
            } elseif ($precentoTutor == 'false') {
                $precentoTutor = 0;
            }
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumnoReporte SET  idialumno = '$idialumno', precentoTutor = '$precentoTutor'  WHERE idiAlumnoReporte = $idiAlumnoReporte";
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

    /*
     * AGREGA UNA NUEVA CARRERA
     */

    function addcarrera() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
            if ($NivelId == "1") {
                $Nivel = "A";
                $categoria = "Licenciatura";
            } else if ($NivelId == "2") {
                $Nivel = "B";
                $categoria = "Maestria";
            } else if ($NivelId == "3") {
                $Nivel = "C";
                $categoria = "Doctorado";
            } else if ($NivelId == "4") {
                $Nivel = "D";
                $categoria = "Diplomado";
            } else {
                $Nivel = "E";
                $categoria = "BASICO";
            }
        }
        //numero_carrera
        if (empty($_POST["numero_carrera"])) {
            $errorMSG = "numero_carrera is required ";
        } else {
            $numero_carrera = $_POST["numero_carrera"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nombew
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //duracion
        if (empty($_POST["duracion"])) {
            $errorMSG = "duracion is required ";
        } else {
            $duracion = $_POST["duracion"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO carrera (idicampus, NivelId,  numero_carrera, clave, Nivel, categoria, nombre, duracion  ) VALUES"
                    . " ($idicampus, $NivelId, '$numero_carrera', '$clave', '$Nivel', '$categoria', '$nombre', $duracion )";
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

    /*
     * TRAE EL CAMPO IDICAMPUS CON INER JOIN cNiveles
     */

    function getCarrerabyidicampus() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //INER JOIN CON cNiveles
            $sql = "SELECT
	carrera.idicarrera,
	carrera.idicampus,
	carrera.numero_carrera,
	carrera.nivel,
	carrera.categoria,
	carrera.clave,
	carrera.duracion,
	carrera.NivelId,
	carrera.nombre,
	cNiveles.Descripcion 
        FROM
	carrera
	INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId  WHERE carrera.idicampus=$idicampus ";
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

    /*
     * REALIZA LA ELIMINACION DEL NIVEL ID SELECCIONADOS
     */

    function deleteCarrera() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM carrera WHERE idicarrera='$idicarrera'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
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

    /*
     * TRAE LOS CAMPOS DE ID CARRERA SELECCIONADO
     */

    function getCarrerabyidcarrera() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera WHERE idicarrera=$idicarrera";
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

    /*
     * ACTUALIZA LA INFORMACION DE ID CARREA SELECCIONADO
     */

    function updateCarrera() {
        $errorMSG = "";
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
            if ($NivelId == "1") {
                $Nivel = "A";
                $categoria = "Licenciatura";
            } else if ($NivelId == "2") {
                $Nivel = "B";
                $categoria = "Maestria";
            } else if ($NivelId == "3") {
                $Nivel = "C";
                $categoria = "Doctorado";
            } else if ($NivelId == "4") {
                $Nivel = "D";
                $categoria = "Diplomado";
            } else {
                $Nivel = "E";
                $categoria = "BASICO";
            }
        }
        //numero_carrera
        if (empty($_POST["numero_carrera"])) {
            $errorMSG = "numero_carrera is required ";
        } else {
            $numero_carrera = $_POST["numero_carrera"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //duracion
        if (empty($_POST["duracion"])) {
            $errorMSG = "duracion is required ";
        } else {
            $duracion = $_POST["duracion"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE carrera SET idicarrera=$idicarrera, idicampus= $idicampus, NivelId = $NivelId,  numero_carrera = '$numero_carrera', clave = '$clave', Nivel = '$Nivel', categoria = '$categoria', nombre = '$nombre', duracion = $duracion  WHERE idicarrera = $idicarrera ";
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

    /*
     * TRAE TODO LOS DATOS DE IDIPROFESOR SELECCIONADO
     */

    function getprofesorId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_GET["idiprofesor"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM profesor WHERE idiprofesor=$idiprofesor";
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
    
    /*
     * ACTUALIZA EL IDIPROFESOR SELECCIONADO
     */
    
    function updateProfesor() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiprofesor"])) {
            $idiprofesor = "";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $idicampus = "";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $nombre = "";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $apellido_paterno = "";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_paterno"];
        }
        //fecha_nacimientos
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = 'NULL';
        } else {
            $f = $_POST["fecha_nacimiento"];
            $fecha_nacimiento = "'$f'";
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $errorMSG .= "edad is required ";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //genero
        if (empty($_POST["genero"])) {
            $errorMSG .= "genero is required ";
        } else {
            $genero = $_POST["genero"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = '';
        } else {
            $movil = $_POST["movil"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["ciudad"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = "";
        } else {
            $cp = $_POST["cp"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = '';
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = '';
        } else {
            $alergias = $_POST["alergias"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = '';
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //cedula
        if (empty($_POST["cedula"])) {
            $cedula = '';
        } else {
            $cedula = $_POST["cedula"];
        }
        //grado
        if (empty($_POST["grado"])) {
            $grado = '';
        } else {
            $grado = $_POST["grado"];
        }
        //perfil
        if (empty($_POST["perfil"])) {
            $perfil = '';
        } else {
            $perfil = $_POST["perfil"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE profesor SET "
                    . "idiprofesor = '$idiprofesor', nombre = '$nombre', idicampus = '$idicampus', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', fecha_nacimiento = $fecha_nacimiento , email = '$email', telefono = '$telefono', edad =  '$edad', genero = '$genero' ,curp = '$curp',"
                    . " rfc = '$rfc', nss = '$nss', "
                    . "movil = '$movil', "
                    . "direccion = '$direccion', "
                    . "ciudad = '$ciudad', "
                    . "municipio = '$municipio', "
                    . "cp = '$cp' "
                    . ", pais = '$pais', "
                    . "tiposangre = '$tiposangre',"
                    . " alergias =  '$alergias',"
                    . " infoadicional = '$infoadicional',"
                    . " cedula = '$cedula', grado = '$grado'  WHERE idiprofesor = '$idiprofesor'";
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
    
}

//termina clase

$api = new ucp();
