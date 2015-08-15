<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
 $todo=array();
 $i=0; 
$directorio = opendir("../../../intellibanks/data/EmpowerLabsIntellibanks/ProyectoPAP"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes 
    }
    else
    {
        chmod($archivo, 0755);
   $pos = strpos($archivo, "PAP-E0");
   $pos2 = strpos($archivo, ",v");
   $pos3 = strpos($archivo, ".lease");
   if($pos!==false&&$pos2===false&&$pos3===false){
   $campos=explode('%META:FORM{name="PAPAxisForm"}%',file_get_contents("../../../intellibanks/data/EmpowerLabsIntellibanks/ProyectoPAP/".$archivo));
    $n=count($campos);
   $campo=explode('%META:FIELD{',$campos[$n-1]);

   $Title=explode('"',$campo[1]);
   $Description=explode('"',$campo[2]);
   $Owner=explode('"',$campo[3]);
   $Player_Now=explode('"',$campo[4]);
   $Timing=explode('"',$campo[5]);
   $Status=explode('-',$campo[6]);
   $PercentComplete=explode('"',$campo[7]);
   $Priority=explode('"',$campo[8]);
   $Metric=explode('"',$campo[9]);
   $Business_Impact=explode('"',$campo[10]);
   $StartDate=explode('"',$campo[11]);
   $TargetCloseDate=explode('"',$campo[12]);
   $Harea=explode('"',$campo[13]);
   $Jerarquia= explode('"',$archivo);
   $EW_ACTIVE_TAB= explode('"',$autor[14]);
   $name= explode('.',$autor[15]);
   
	 	$todo[]=array("Titulo1"=>utf8_encode ($Title[7]), "Estado"=> ($Status[7]),"Descripcion"=>utf8_encode ($Description[7]), "Encargado"=>$Player_Now[7], "Prioridad"=>utf8_encode ($Priority[7]), "FechaI"=>utf8_encode ($StartDate[7]), "FechaF"=>utf8_encode ($TargetCloseDate[7]), "Porcentaje"=>utf8_encode ($PercentComplete[7]), "Estado"=>utf8_encode ($Status[7]));
     $i++;
   }
    }
}
usort($todo,function($a,$b) {return strnatcasecmp($a['Titulo'],$b['Titulo']);});
echo json_encode($todo);
?>


 