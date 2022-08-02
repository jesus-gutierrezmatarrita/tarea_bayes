<?php include('head.php') ?>

<?php
/*
    Examen ampliación Sistemas expertos para la administración
    Jesús Gutiérrez Matarrita
    B53280
    2022
*/

error_reporting(E_ERROR | E_PARSE);
//Llamada a la conexion con la base de datos
require_once("database-connection.php");

$conn = base::connection();

  //se llama a los adatos del data set
  $sql = "SELECT * FROM estilosexopromedio";
/// se llama a la base de datos que posee las frecuencias que se hicieron abajo
  $datoss = mysqli_query( $conexion, $sql );
  $sqlf = "SELECT * FROM frecuenciasformulariodos";
  $frecuencias = mysqli_query( $conexion, $sqlf );

 // se llama a las a la tabla que posee las probabilidades de las frecuencias
 $sqlff = "SELECT * FROM pfrecuencias";

 $pfrecuencias = mysqli_query( $conexion, $sqlff );

 //se llena el arreglo con los datos de la base de datos para sacar los resultados
while ( $row = mysqli_fetch_array( $datoss) ) {

      $estiloSexo[$row['id']] = array( 'sexo' => $row['sexo'], 
                                      'promedio' => $row['promedio'], 
                                      'estilo' => $row['estilo'], 
                                      'recinto' => $row['recinto']);
};
      

$nTurrialba=0;
$nParaiso=0;
//cantidad de atributos
$m=3;
$p=1/2;
$pEstilo=1/4;
$pPromedio=1/4;
//auxiliares para sacar frecuencias
$ncSexoTurrialba=0;
$ncSexoParaiso=0;
$ncEstiloTurrialba=0;
$ncEstiloParaiso=0;
$ncPromedioParaiso=0;
$ncPromedioTurrialba=0;
// cada p tiene su atributo ya que cambian

$nSexoMasculino=0;
$nSexoFemenino=0;
$nEstilo=0;
// se cuenta los n de cada clase

foreach($estiloSexo as $key => $row ) { 

    if ($row['recinto']=='Turrialba'):

        $nTurrialba++;
    elseif($row['recinto']=='Paraiso'):
        $nParaiso++;
    endif;

}

foreach($estiloSexo as $key => $row ) { 

    if ($row['sexo']=='M'):

        $nSexoMasculino++;
    elseif($row['sexo']=='F'):
        $nSexoFemenino++;
    endif;

}


//auxiliares para sacar las frecuencias
$ncSexoMasculinoTurrialba =0;
$ncSexoFemeninoTurrialba=0;
$ncSexoMasculinoParaiso =0;
$ncSexoFemeninoParaiso =0;
$sexoMasculinoTurrialba="M";
$sexoFemeninoTurrialba="F";
$sexoFemeninoParaiso="F";
$sexoMasculinoParaiso="M";

/// se sacan las frecuencias de sexo en turrialba y paraiso
foreach($estiloSexo as $key => $row ) { 
    if ($row['sexo']==$sexoMasculinoTurrialba and $row['recinto']=='Turrialba'):

        $ncSexoMasculinoTurrialba++;
    endif;
    if($row['sexo']==$sexoFemeninoTurrialba and $row['recinto']=='Turrialba'):
        $ncSexoFemeninoTurrialba++;
    endif;
        if($row['sexo']==$sexoMasculinoParaiso and $row['recinto']=='Paraiso'):
            $ncSexoMasculinoParaiso++;
        endif;
    if($row['sexo']==$sexoFemeninoParaiso and $row['recinto']=='Paraiso'):
                $ncSexoFemeninoParaiso++;
endif;
}

$ncEstiloAcomodadorTurrialba=0;
$ncEstiloDivergenteTurrialba=0;
$ncEstiloConvergenteTurrialba=0;
$ncEstiloAsimiladorTurrialba=0;


$ncEstiloAcomodadorParaiso =0;
$ncEstiloDivergenteParaiso=0;
$ncEstiloConvergenteParaiso=0;
$ncEstiloAsimiladorParaiso=0;

$estiloAcomodador="ACOMODADOR";
$estiloDivergente="DIVERGENTE";
$estiloConvergente="CONVERGENTE";
$estiloAsimilador="ASIMILADOR";
// se sacan las frecuencias por estilo, ya sea en turrialba o en paraiso

foreach($estiloSexo as $key => $row ) { 
    // acomodadorees en turrialba
    if ($row['estilo']==$estiloAcomodador and $row['recinto']=='Turrialba'):

        $ncEstiloAcomodadorTurrialba++;
    endif;
    //divergentes en turrialba
    if($row['estilo']==$estiloDivergente and $row['recinto']=='Turrialba'):
        $ncEstiloDivergenteTurrialba++;
    endif;
    //convergentes en paraiso
        if($row['estilo']==$estiloConvergente and $row['recinto']=='Turrialba'):
            $ncEstiloConvergenteTurrialba++;
        endif;
        //asimiladores en turrialba
    if($row['estilo']==$estiloAsimilador and $row['recinto']=='Turrialba'):
        $ncEstiloAsimiladorTurrialba++;
endif;

// se sacan los acomodadores,divergentes,asimiladores, de paraiso
if ($row['estilo']==$estiloAcomodador and $row['recinto']=='Paraiso'):

    $ncEstiloAcomodadorParaiso++;
endif;
if($row['estilo']==$estiloDivergente and $row['recinto']=='Paraiso'):
    $ncEstiloDivergenteParaiso++;
endif;
    if($row['estilo']==$estiloConvergente and $row['recinto']=='Paraiso'):
        $ncEstiloConvergenteParaiso++;
    endif;
if($row['estilo']==$estiloAsimilador and $row['recinto']=='Paraiso'):
    $ncEstiloAsimiladorParaiso++;
endif;

}


$ncPromedioSeisTurrialba=0;
$ncPromedioSieteTurrialba=0;
$ncPromedioOchoTurrialba=0;
$ncPromedioNueveTurrialba=0;


$ncPromedioSeisParaiso=0;
$ncPromedioSieteParaiso=0;
$ncPromedioOchoParaiso=0;
$ncPromedioNueveParaiso=0;
$promedioSeis=6;
$promedioSiete=7;
$promedioOcho=8;
$promedioNueve=9;
// se sacan los promedios, se quitan los decimales, por lo que p=1/4 tomando en cuenta los numros 6 7 89 

foreach($estiloSexo as $key => $row ) { 
    if (($row['promedio']>=$promedioSeis && $row['promedio'] < 7) and $row['recinto']=='Turrialba'):

        $ncPromedioSeisTurrialba++;
    endif;

    if (($row['promedio']>=$promedioSiete && $row['promedio'] < 8) and $row['recinto']=='Turrialba'):

        $ncPromedioSieteTurrialba++;
    endif;

    if (($row['promedio']>=$promedioOcho && $row['promedio'] < 9) and $row['recinto']=='Turrialba'):

        $ncPromedioOchoTurrialba++;
    endif;
    if (($row['promedio']>=$promedioNueve && $row['promedio'] < 10) and $row['recinto']=='Turrialba'):

        $ncPromedioNueveTurrialba++;
    endif;
    if (($row['promedio']>=$promedioSeis && $row['promedio'] < 7) and $row['recinto']=='Paraiso'):

        $ncPromedioSeisParaiso++;
    endif;
    if (($row['promedio']>=$promedioSiete && $row['promedio'] < 8) and $row['recinto']=='Paraiso'):

        $ncPromedioSieteParaiso++;
    endif;

    if (($row['promedio']>=$promedioOcho && $row['promedio'] < 9) and $row['recinto']=='Paraiso'):

        $ncPromedioOchoParaiso++;
    endif;
    if (($row['promedio']>=$promedioNueve && $row['promedio'] < 10) and $row['recinto']=='Paraiso'):

        $ncPromedioNueveParaiso++;
    endif;
}

// cada nc fue guardado en la base de datos, la consuta se borro para no usarla mas.



while($roww = mysqli_fetch_array($frecuencias)){


/// se calcula las probabilidades de las frecuencias de sexo en turrialba
        $ncSexoMasculinoTurrialba=$roww['ncSexoMasculinoTurrialba'];
        $PFSexoMasculinoTurrialba=(($ncSexoMasculinoTurrialba+($m*$p))/($nTurrialba+$m));
        $ncSexoFemeninoTurrialba=$roww['ncSexoFemeninoTurrialba'];
        $PFSexoFemeninoTurrialba=(($ncSexoFemeninoTurrialba+($m*$p))/($nTurrialba+$m));
/// se calcula las p de las frecuencias de sexo en Paraiso

$ncSexoMasculinoParaiso=$roww['ncSexoMasculinoParaiso'];
$PFSexoMasculinoParaiso=(($ncSexoMasculinoParaiso+($m*$p))/($nParaiso+$m));
$ncSexoFemeninoParaiso=$roww['ncSexoFemeninoParaiso'];
$PFSexoFemeninoParaiso=(($ncSexoFemeninoParaiso+($m*$p))/($nParaiso+$m));
//// se calcula las probabiidades de las frecuencias de los estilo en turrialba
$ncEstiloAcomodadorTurrialba=$roww['ncEstiloAcomodadorTurrialba'];
$PFEstiloAcomodadorTurrialba=(($ncEstiloAcomodadorTurrialba+($m*$pEstilo))/($nTurrialba+$m));
$ncEstiloDivergenteTurrialba=$roww['ncEstiloDivergenteTurrialba'];
$PFEstiloDivergenteTurrialba=(($ncEstiloDivergenteTurrialba+($m*$pEstilo))/($nTurrialba+$m));
$ncEstiloConvergenteTurrialba=$roww['ncEstiloConvergenteTurrialba'];
$PFEstiloConvergenteTurrialba=(($ncEstiloConvergenteTurrialba+($m*$pEstilo))/($nTurrialba+$m));
$ncEstiloAsimiladorTurrialba=$roww['ncEstiloAsimiladorTurrialba'];
$PFEstiloAsimiladorTurrialba=(($ncEstiloAsimiladorTurrialba+($m*$pEstilo))/($nTurrialba+$m));
// se calcula los probabilidades de frecuecnias de estiloen paraiso
$ncEstiloAcomodadorParaiso=$roww['ncEstiloAcomodadorParaiso'];
$PFEstiloAcomodadorParaiso=(($ncEstiloAcomodadorParaiso+($m*$pEstilo))/($nParaiso+$m));
$ncEstiloDivergenteParaiso=$roww['ncEstiloDivergenteParaiso'];
$PFEstiloDivergenteParaiso=(($ncEstiloDivergenteParaiso+($m*$pEstilo))/($nParaiso+$m));
$ncEstiloConvergenteParaiso=$roww['ncEstiloConvergenteParaiso'];
$PFEstiloConvergenteParaiso=(($ncEstiloConvergenteParaiso+($m*$pEstilo))/($nParaiso+$m));
$ncEstiloAsimiladorParaiso=$roww['ncEstiloAsimiladorParaiso'];
$PFEstiloAsimiladorParaiso=(($ncEstiloAsimiladorParaiso+($m*$pEstilo))/($nParaiso+$m));

/// se calcula los probabilidades de frecuencias de los promedios por recinto

$ncPromedioSeisTurrialba=$roww['ncPromedioSeisTurrialba'];
$PFPromedioSeisTurrialba=(($ncPromedioSeisTurrialba+($m*$pPromedio))/($nTurrialba+$m));
$ncPromedioSieteTurrialba=$roww['ncPromedioSieteTurrialba'];
$PFPromedioSieteTurrialba=(($ncPromedioSieteTurrialba+($m*$pPromedio))/($nTurrialba+$m));
$ncPromedioOchoTurrialba=$roww['ncPromedioOchoTurrialba'];
$PFPromedioOchoTurrialba=(($ncPromedioOchoTurrialba+($m*$pPromedio))/($nTurrialba+$m));
$ncPromedioNueveTurrialba=$roww['ncPromedioNueveTurrialba'];
$PFPromedioNueveTurrialba=(($ncPromedioNueveTurrialba+($m*$pPromedio))/($nTurrialba+$m));
//// se calcula la p de frecuencia de los promedios de paraiso
$ncPromedioSeisParaiso=$roww['ncPromedioSeisParaiso'];
$PFPromedioSeisParaiso=(($ncPromedioSeisParaiso+($m*$pPromedio))/($nParaiso+$m));
$ncPromedioSieteParaiso=$roww['ncPromedioSieteParaiso'];
$PFPromedioSieteParaiso=(($ncPromedioSieteParaiso+($m*$pPromedio))/($nParaiso+$m));
$ncPromedioOchoParaiso=$roww['ncPromedioOchoParaiso'];
$PFPromedioOchoParaiso=(($ncPromedioOchoParaiso+($m*$pPromedio))/($nParaiso+$m));
$ncPromedioNueveParaiso=$roww['ncPromedioNueveParaiso'];
$PFPromedioNueveParaiso=(($ncPromedioNueveParaiso+($m*$pPromedio))/($nParaiso+$m));
}
//$sqlConsulta = "INSERT INTO frecuenciasformulariodos VALUES ('$ncSexoMasculinoTurrialba', '$ncSexoFemeninoTurrialba','$ncSexoMasculinoParaiso ','$ncSexoFemeninoParaiso','$ncEstiloAcomodadorTurrialba','$ncEstiloDivergenteTurrialba','$ncEstiloConvergenteTurrialba','$ncEstiloAsimiladorTurrialba','$ncEstiloAcomodadorParaiso','$ncEstiloDivergenteParaiso','$ncEstiloConvergenteParaiso','$ncEstiloAsimiladorParaiso','$ncPromedioSeisTurrialba','$ncPromedioSieteTurrialba','$ncPromedioOchoTurrialba','$ncPromedioNueveTurrialba','$ncPromedioSeisParaiso','$ncPromedioSieteParaiso','$ncPromedioOchoParaiso','$ncPromedioNueveParaiso')";
// estos datos se guardan en la base de datos la consulta fue borrada para no usarla mas
//echo($nTurrialba);
$entradaPromedio= $_GET["promedio"];
$entradaEstilo=$estilo= $_GET["estilo"];
$entradaSexo=$_GET["sexo"];



echo Bayes($entradaPromedio,$entradaSexo,$entradaEstilo,$pfrecuencias);

function Bayes($entradaPromedio,$entradaSexo,$entradaEstilo,$pfrecuencias){
    $nParaiso=38; // hay 38 opciones en paraiso
    $nTurrialba=38;
    
    $femenino="F";
$masculino="M";

// SE HACEN VALIDACIONES DE LAS ENTRADAS PARA PODES BUSCAR CORRECTAMENTE///////
if($entradaSexo==$femenino){

$auxiliar=2;
$auxiliar1=4;

}

if($entradaSexo==$masculino){
    $auxiliar=1;
    $auxiliar1=3;


}

if($entradaPromedio>=9){

$auxiliarPromedioParaiso=20;
$auxiliarPromedioTurrialba=16;


}


if($entradaPromedio>=8&&$entradaPromedio<9){

    $auxiliarPromedioParaiso=19;
    $auxiliarPromedioTurrialba=15;
    
    
    }
    if($entradaPromedio>=7&&$entradaPromedio<8){

        $auxiliarPromedioParaiso=18;
        $auxiliarPromedioTurrialba=14;
        
        
        }
        if($entradaPromedio>=6 && $entradaPromedio<7){

            $auxiliarPromedioParaiso=17;
            $auxiliarPromedioTurrialba=13;
            
            
            }



if($entradaEstilo=="ASIMILADOR"){

$auxiliarEstiloTurrialba=8;
$auxiliarEstiloParaiso=12;

}
if($entradaEstilo=="CONVERGENTE"){

    $auxiliarEstiloTurrialba=7;
    $auxiliarEstiloParaiso=11;
    
    }


    if($entradaEstilo=="ACOMODADOR"){

        $auxiliarEstiloTurrialba=5;
        $auxiliarEstiloParaiso=9;
        
        }
        if($entradaEstilo=="DIVERGENTE"){

            $auxiliarEstiloTurrialba=6;
            $auxiliarEstiloParaiso=10;
            
            }
//SE LLAMA AL ARRAY PFRECUECIAS EL CUAL TINEE LAS PROBABILIDADES DE LAS FRECUENCIAS YA CALCULADAS
while($roww = mysqli_fetch_array($pfrecuencias)){
//SE BUSCA EN EL ARRAY CON LOS FILTROS DE ARRIBA

$sexoTurrialba=$roww[$auxiliar];
$sexoParaiso=$roww[$auxiliar1];
$promedioParaiso=$roww[$auxiliarPromedioParaiso];
$promedioTurrialba=$roww[$auxiliarPromedioTurrialba];
$estiloTurrialba=$roww[$auxiliarEstiloTurrialba];
$estiloParaiso=$roww[$auxiliarEstiloParaiso];

}

//SE SACA LA PRIORIDAD DE PARAISO Y TURRIALBA
$totalDatosDataSet=$nParaiso+$nTurrialba;
$priorParaiso=$nParaiso/$totalDatosDataSet;
$priorTurrialba=$nTurrialba/$totalDatosDataSet;

$turrialba=$sexoTurrialba*$promedioTurrialba*$estiloTurrialba;// SE MULTIPLICAN LAS DE UNA MISMA CLASE
$paraiso=$sexoParaiso*$promedioParaiso*$estiloParaiso;

$finalTurrial=$turrialba*$priorTurrialba;// SE HACE LA MULTIPLICACION FINAL DELA FORMULA
$finalParaiso=$paraiso*$priorParaiso;



if($finalTurrial>$finalParaiso){
$probabilidadGanadora="Turrialba";

}elseif($finalTurrial<$finalParaiso){
    $probabilidadGanadora="Paraiso";

}

return  json_encode(['elReciton'=>$probabilidadGanadora]);

}





 ?>

<main class="flex-shrink-0">
    <h1>Guess gender</h1>
</main>

<?php include('footer.php') ?>