<?php
 
require_once "../clases/clase_conexion.php";


class soldadura_interna{

    //metodo para crear registros de tuberia
    public static function crear_registro_tuberia_interna($tuberia_in123,$Tin_ID_tubo,$Tin_No_tubo,$Tin_No_placa,
                                                          $Tin_ID_proyecto,$Tin_Lote_alambre,$Tin_Lote_fundente,
                                                          $Tin_FolioOperador,$Tin_Fecha,$Tin_Hora,$Tin_hora_db,
                                                          $Tin_Archivos_excel,$Tin_Observaciones) {
        $conexion_db =new Conexion();
        $query = "INSERT INTO " . $tuberia_in123 . " (Tin_ID_tubo,Tin_No_tubo,Tin_No_placa,Tin_ID_proyecto,Tin_Lote_alambre,
                                                      Tin_Lote_fundente,Tin_FolioOperador,Tin_Fecha,Tin_Hora,Tin_hora_db,
                                                      Tin_Archivos_excel,Tin_Observaciones)
        VALUES ('$Tin_ID_tubo', '$Tin_No_tubo', '$Tin_No_placa', '$Tin_ID_proyecto','$Tin_Lote_alambre',
                '$Tin_Lote_fundente','$Tin_FolioOperador','$Tin_Fecha','$Tin_Hora','$Tin_hora_db','$Tin_Archivos_excel',
                '$Tin_Observaciones')";
        $conexion_db->query($query);
        if($conexion_db->affected_rows) {
            echo "Tubo No: " . $Tin_No_tubo . " fue registrado";
            return TRUE;
        }//end if
        return FALSE;
    }//end 

    //Metodos (funciones) por busqueda para de registros

    public static function obtener_todos_registros_interna($tuberia_in123){
        $conexion_db =new Conexion();
        $query = "SELECT *FROM ". $tuberia_in123;
        //echo "request: " . $query;
        
        $resultado = $conexion_db->query($query);
        
        $datos_in = [];
        if($resultado->num_rows){
            while($row = $resultado-> fetch_assoc()){
                $datos_in[]=[
                    'T_ID_Rtubo'=>$row['Tin_ID_Rtubo'],
                    'T_ID_tubo'=>$row['Tin_ID_tubo'],
                    'T_No_tubo'=>$row['Tin_No_tubo'],
                    'T_No_placa'=>$row['Tin_No_placa'],
                    'T_ID_proyecto'=>$row['Tin_ID_proyecto'],
                    'T_Lote_alambre'=>$row['Tin_Lote_alambre'],
                    'T_Lote_fundente'=>$row['Tin_Lote_fundente'],
                    'T_FolioOperador'=>$row['Tin_FolioOperador'],
                    'T_Fecha'=>$row['Tin_Fecha'],
                    'T_Hora'=>$row['Tin_Hora'],
                    'T_Hora_db'=>$row['Tin_Hora_db'],
                    'T_Archivos_excel'=>$row['Tin_Archivos_excel'],
                    'T_Observaciones'=>$row['Tin_Observaciones']
                ];
                
            }//end while
            return $datos_in;
            
        }//end if
        
    }//end 
    
    public static function obtener_registros_interna($tuberia_in123,$T_C_get,$T_D_get) {
        $conexion_db =new Conexion();
        $query = "SELECT *FROM ".  $tuberia_in123." WHERE " . $T_C_get. "=\"" . $T_D_get . "\"";
        //echo "\n" . $query . "\n";
        $resultado = $conexion_db->query($query);
        $datos_in = [];
        if($resultado->num_rows){
            while($row = $resultado-> fetch_assoc()){
                $datos_in[]=[
                    'T_ID_tubo'=>$row['Tin_ID_tubo'],
                    'T_No_tubo'=>$row['Tin_No_tubo'],
                    'T_No_placa'=>$row['Tin_No_placa'],
                    'T_ID_proyecto'=>$row['Tin_ID_proyecto'],
                    'T_Lote_alambre'=>$row['Tin_Lote_alambre'],
                    'T_Lote_fundente'=>$row['Tin_Lote_fundente'],
                    'T_FolioOperador'=>$row['Tin_FolioOperador'],
                    'T_Fecha'=>$row['Tin_Fecha'],
                    'T_Hora'=>$row['Tin_Hora'],
                    'T_Hora_db'=>$row['Tin_Hora_db'],
                    'T_Archivos_excel'=>$row['Tin_Archivos_excel'],
                    'T_Observaciones'=>$row['Tin_Observaciones']
                ];
            }//end while
            return $datos_in;
        }//end if
    }//end read_usuario


    //metodo (funcion) para actulizar datos de registro del tubo 
    public static function actualizar_tubo_interna($tuberia_in123,$T_Cbusqueda,$T_Dbusqueda,$T_Cactualizar,$T_Dactualizar) {
        $conexion_db = new Conexion(); 
        $query = "UPDATE " .$tuberia_in123. " SET " . $T_Cactualizar . "='" . $T_Dactualizar .
                 "' WHERE " . $T_Cbusqueda . "=\"" . $T_Dbusqueda . "\"";
        $conexion_db->query($query);
        if($conexion_db->affected_rows) {
            return TRUE;
        }//end if
        return FALSE;
    }//end update_usuario

    //metodo para borrar registro de tubo
    public static function borrar_tubo_interna($tuberia_in123,$ID_tubo) {
        $conexion_db = new Conexion();
        $query = "DELETE FROM " . $tuberia_in123 . " WHERE Pro_ID=\"" . $ID_tubo . "\"";
        $conexion_db->query($query);
        if($conexion_db->affected_rows) {
            return TRUE;
        }//end if
        return FALSE;
    }//end delete_usuario

}
?>