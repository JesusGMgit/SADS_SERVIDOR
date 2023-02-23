var busqueda_reporte_externas=0; 
var busqueda_reporte_internas=0;
let direccion_pagina="http://10.10.20.15";
console.log("IP servidor: " + direccion_pagina);
function descarga_reportes(){
    document.getElementById('links_descarga').innerHTML="";
    No_tubo=document.getElementById("No_tubo").value;
    console.log("No tubo: " + No_tubo);

    for(i=1;i<=3;i++){
        urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_"+i+".php?No_tubo=" + No_tubo;
        tabla_internas_1(urlf,("INTERNA"+i));   
    }
    console.log("bri: " + busqueda_reporte_internas);
    
    for(i=1;i<=3;i++){
        urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_"+i+".php?No_tubo=" + No_tubo;
        tabla_externas_1(urlf,("EXTERNA"+i)); 
    }
    console.log("bre: " + busqueda_reporte_externas);
    
    busqueda_reporte_internas=0;
    busqueda_reporte_externas=0;
}


function tabla_externas_1(urlf,maquina_1){
    
    fetch(urlf).then(response => response.json())
            .then(data11 => datos11_fetch(data11))
            .catch(error => console.log(error))
        
        const datos11_fetch=(data11)=>{
            maquina=maquina_1;
            try{
                nom_reporte=data11[0].Tex_Reporte_excel;
                
                if(nom_reporte!="" && busqueda_reporte_externas==0){
                
                    ruta_reporte ="/Reportes/"+maquina+"/"+nom_reporte;
                    var link_reporte=`<a href=${ruta_reporte}>Descargar Reporte : ${nom_reporte} </a>`;
                    let p_externas=document.createElement('p');
                    p_externas.innerHTML=link_reporte;
                    document.getElementById('links_descarga').appendChild(p_externas);
                    console.log("encontrado en " + maquina);
                    busqueda_reporte_externas=1;
               
                }
            }catch{
                console.log("no encontrado en " + maquina);
            }
        

        }
        data11=0;
}
function tabla_internas_1(urlf,maquina_2){
    
    fetch(urlf).then(response => response.json())
            .then(data12 => datos12_fetch(data12))
            .catch(error => console.log(error))
        
        const datos12_fetch=(data12)=>{
            maquina=maquina_2;
            try{
                nom_reporte=data12[0].Tin_Reporte_excel;
                
                if(nom_reporte!="" && busqueda_reporte_internas==0){
                    ruta_reporte ="/Reportes/"+maquina+"/"+nom_reporte;
                    var link_reporte=`<a href=${ruta_reporte}>Descargar Reporte : ${nom_reporte} </a>`;
                    let p_internas=document.createElement('p');
                    p_internas.innerHTML=link_reporte;
                    document.getElementById('links_descarga').appendChild(p_internas);
                    console.log("encontrado en " + maquina);
                    busqueda_reporte_internas=1; 
            }
            }catch{
            console.log("no encontrado en " + maquina);
        }
        }
        data12=0;
}