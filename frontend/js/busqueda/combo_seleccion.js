let direccion_pagina;
//direccion_pagina="https://jgmweb.tech";
direccion_pagina="http://10.10.20.15";
//crear tablas por maquina 12
function combo_proyectos() {
    document.getElementById('INTERNAS').innerHTML = "";
    document.getElementById('EXTERNAS').innerHTML = "";
    let proyecto = document.getElementById("proyectos").value;
    maquina=document.getElementById("maquina").value;
    soldadura = document.getElementById("soldadura").value;
    index=proyecto.indexOf(" ");
    
    //console.log("proyectos: "+index+"/"+proyecto.substr(0,index)+"-"+proyecto+" "+soldadura+" "+maquina);
    if (proyecto != "SELECCIONE UNO") {
        if(soldadura =="SELECCIONE UNO" && maquina=="SELECCIONE UNO"){

            document.getElementById('INTERNAS').innerHTML = "";
            document.getElementById('EXTERNAS').innerHTML = "";

            for(i=1;i<=3;i++){
                urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_"+i+".php?proyecto=" + proyecto.substr(0,index);
                tabla_externas(urlf,("EXTERNA"+i),i);
                urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_"+i+".php?proyecto=" + proyecto.substr(0,index);
                tabla_internas(urlf,("INTERNA"+i),i);
            }

            
        }else if (soldadura != "SELECCIONE UNO" && maquina=="SELECCIONE UNO"){
            combo_soldadura();
        }else if(soldadura !="SELECCIONE UNO" && maquina!="SELECCIONE UNO"){
            combo_maquina();
        }
        
    }else{
        location.reload(true);
    }

}
function combo_soldadura() {
    //que ?
    let urlf="";
    document.getElementById('INTERNAS').innerHTML = "";
    document.getElementById('EXTERNAS').innerHTML = "";
    proyecto=document.getElementById("proyectos").value;
    soldadura = document.getElementById("soldadura").value;
    index=proyecto.indexOf(" ");
    //console.log("soldadura: "+index+"/"+proyecto.substr(0,index)+"-"+proyecto+" "+soldadura+" "+maquina);
    document.getElementById("maquina").innerHTML = "";
    if (soldadura == "EXTERNA") {
        combo = `<option selected>SELECCIONE UNO</option>
                <option>EXTERNA1</option>
                <option>EXTERNA2</option> 
                <option>EXTERNA3</option>`;
                
                for(i=1;i<=3;i++){
                    urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_"+i+".php?proyecto=" + proyecto.substr(0,index);
                    tabla_externas(urlf,("EXTERNA"+i),i);
                }
        
        document.getElementById("maquina").innerHTML=combo;

    } else if (soldadura == "INTERNA") {
        combo = `<option selected>SELECCIONE UNO</option>
                <option>INTERNA1</option>
                <option>INTERNA2</option> 
                <option>INTERNA3</option>`;
        
                for(i=1;i<=3;i++){
                    urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_"+i+".php?proyecto=" + proyecto.substr(0,index);
                    tabla_internas(urlf,("INTERNA"+i),i);
                }
        document.getElementById("maquina").innerHTML=combo
    }else{
        combo = `<option selected>SELECCIONE UNO</option>`;
        document.getElementById("maquina").innerHTML=combo;
        combo_proyectos();
    }
}
function combo_maquina() {
    let numero_maquina;
    document.getElementById('INTERNAS').innerHTML = "";
    document.getElementById('EXTERNAS').innerHTML = "";
    proyecto=document.getElementById("proyectos").value;
    soldadura = document.getElementById("soldadura").value;
    maquina=document.getElementById("maquina").value;
    index=proyecto.indexOf(" ");
    //console.log("maquina: "+index+"/"+proyecto.substr(0,index)+"-"+proyecto+" "+soldadura+" "+maquina);
    if (soldadura == "INTERNA") {
        switch(maquina)
        {
            case "INTERNA1":
                urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_1.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=1;
                break;
            case "INTERNA2":
                urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_2.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=2;
                break;
            case "INTERNA3":
                urlf = direccion_pagina + "/api/internas/rq_tTuberiaInterna_3.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=3;
                break;
            default:
                break;
        }
        
        tabla_internas(urlf,maquina,numero_maquina);

    }else if (soldadura=="EXTERNA"){
        switch(maquina)
        {
            case "EXTERNA1":
                urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_1.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=1;
                break;
            case "EXTERNA2":
                urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_2.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=2;
                break;
            case "EXTERNA3":
                urlf = direccion_pagina + "/api/externas/rq_tTuberiaExterna_3.php?proyecto=" + proyecto.substr(0,index);
                numero_maquina=3;
                break;
            default:
                break;
        }
        
        tabla_externas(urlf,maquina,numero_maquina);

    }else{
        combo = `<option selected>SELECCIONE UNO</option>`;
        document.getElementById("maquina").innerHTML=combo
        combo_proyectos();
    }
}
