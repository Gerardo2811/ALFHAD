<?php
    header("content-type: application/json");
    include_once("../class/class-motoristas-Oficiales.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $motoristas = new MotoristasOficiales($_POST["nombreCompleto"], $_POST["email"], $_POST["numeroCelular"], $_POST["fechaNacimiento"], $_POST["departamentoLaboral"], $_POST["password"]);
            $motoristas->guardarMotoristaOficial();
            $resultado["Mensaje"] = "Guardar el empresas, informacion: ". json_encode($_POST);
            echo json_encode($resultado);
        break;
        
        case 'GET':
            if(isset($_GET['id'])){
                MotoristasOficiales::obtenerMotorista($_GET['id']);
            }else{
                MotoristasOficiales::obtenerMotoristas();
            }
         break;
         
         case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input') , true);
            $motoristas = new MotoristasOficiales($_PUT['nombreCompleto'],$_PUT['email'],$_PUT['numeroCelular'],$_PUT['fechaNacimiento'],$_PUT['departamentoLaboral'], $_PUT['password']);
            $motoristas->actualizarMotoristaOficial($_GET['id']);
    
          $resultado["mensaje"]= "actualizar un usuario con el id: ". $_GET['id']." , "."Informacion a actualizar: ". json_encode($_PUT);
            echo json_encode($resultado);
        break;

        case 'DELETE':
            MotoristasOficiales::eliminarMotorista($_GET["id"]);
            $resultado["mensaje"]= "Eliminar un Motorista con el id: ". $_GET['id'];
            echo json_encode($resultado);
            break;
    }

?>