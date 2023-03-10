<?php
//editar para la tabla Proyectos
require_once "../clases/clase_proyecto.php";
//header("Content-Type: application/json");
switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
            
        $_POST=json_decode(file_get_contents('php://input'),true);
        echo json_encode($_POST);
            
        if($_POST != NULL) {
            if(Proyecto::crear_proyecto($_POST['Pro_Nombre'],$_POST['Pro_Diametro'],$_POST['Pro_Espesor'],
                                        $_POST['Pro_Alambre'],$_POST['Pro_Fundente'],$_POST['Pro_OrdenTrabajo']
                                        ,$_POST['Pro_Especificacion'],$_POST['Pro_WPS'])){
                    
                http_response_code(200);
            }//end if
            else {
                http_response_code(400);
            }//end else
        }//end if
        else {
            http_response_code(405);
        }//end else
            
        break;

    case 'GET':

        if(isset($_GET['Pro_ID'])) {
            echo json_encode(Proyecto::Leer_proyecto($_GET['Pro_ID']));
        }//end if
        else {
            echo json_encode(Proyecto::Leer_proyectos());
        }//end else

        break;

    case 'PUT':

        $_PUT=json_decode(file_get_contents('php://input'),true);
        //echo json_encode($_PUT);
        if($_PUT != NULL) {
            if(Proyecto::actualizar_proyecto($_GET['Pro_ID'],$_PUT['Pro_Nombre'],$_PUT['Pro_Diametro'],$_PUT['Pro_Espesor'],
                                             $_PUT['Pro_Alambre'],$_PUT['Pro_Fundente'],$_PUT['Pro_OrdenTrabajo'],
                                             $_PUT['Pro_Especificacion'],$_PUT['Pro_WPS'])) {
                http_response_code(200);
            }//end if
            else {
                http_response_code(400);
            }//end else
        }//end if
        else {
            http_response_code(405);
        }//end else

        break;

    case 'DELETE':

        if(isset($_GET['Pro_ID'])){
            if(Proyecto::borrar_proyecto($_GET['Pro_ID'])) {
                http_response_code(200);
            }//end if
            else {
                http_response_code(400);
            }//end else
        }//end if 
        else {
            http_response_code(405);
        }//end else

        break;

    default:

        http_response_code(405);

        break;

}//end while
?>