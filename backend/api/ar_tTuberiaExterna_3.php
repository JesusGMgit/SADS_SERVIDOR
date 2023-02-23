<?php

require_once "../clases/clase_soldadura_externa.php";
//header("Content-Type: application/json");
switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
            
        $_POST=json_decode(file_get_contents('php://input'),true);
        echo json_encode($_POST);
         
        if($_POST != NULL) {
            if(soldadura_externa::crear_registro_tuberia_externa("tuberia_soldadura_externa_3",$_POST['T_ID_tubo'],$_POST['T_No_tubo'],$_POST['T_No_placa'],
                                        $_POST['T_ID_proyecto'],$_POST['T_Lote_alambre'],$_POST['T_Lote_fundente'],$_POST['T_FolioOperador']
                                        ,$_POST['T_Fecha'],$_POST['T_Hora'],$_POST['T_Hora_db'],$_POST['T_Archivos_excel']
                                        ,$_POST['T_Observaciones'])){
                    
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
        $Garray_columnas= array();
        $Garray_datos=array();
        $Garray=array();
        $i=0;
        foreach($_GET as $key => $value) {
            $Garray[$i]=$key;
            $Garray_columnas[$i]=str_replace("T","Tex",$key);
            $Garray_datos[$i]=$_GET[$key];
            //echo "i= " . $i . " " . $Garray_columnas[$i] . ' = ' . $Garray_datos[$i] . "\n";
            $i+=1;
        }
        if(isset($_GET[$Garray[0]])){
            //echo "fecha: " . $_GET['fecha'] . " :";
            echo json_encode(soldadura_externa::obtener_registros_externa("tuberia_soldadura_externa_3",$Garray_columnas[0],$Garray_datos[0]));
        }
        else {
            //echo "TODOS LOS REGISTROS DE TUBERIA EXTERNA 34";
            echo json_encode(soldadura_externa::obtener_todos_registros_externa("tuberia_soldadura_externa_3"));
        }//end else

        break;

    case 'PUT':
        $array_columnas= array();
        $array_datos=array();
        $_PUT=json_decode(file_get_contents('php://input'),true);
        $i=0;
        if($_PUT != NULL) {
            $Maquina="tuberia_soldadura_externa_3";
            foreach($_PUT as $key => $value) {
                $array_columnas[$i]=str_replace("T","Tex",$key);
                $array_datos[$i]=$_PUT[$key];
                //echo "i= " . $i . " " . $array_columnas[$i] . ' = ' . $array_datos[$i] . "\n";
                $i+=1;
            }
            if(soldadura_externa::actualizar_tubo_externa($Maquina,$array_columnas[0],$array_datos[0],$array_columnas[1],$array_datos[1])) {
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

        if(isset($_GET['T_ID_tubo'])){
            if(soldadura_externa::borrar_tubo_externa("tuberia_soldadura_externa_3",$_GET['T_ID_tubo'])) {
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