<?php include('head.php') ?>

<?php
/*
    Examen ampliación Sistemas expertos para la administración
    Jesús Gutiérrez Matarrita
    B53280
    2022
*/

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST["calculate"])) {
        //connecting to database
        require_once("database-connection.php");

        $conn = base::connection();

        //final result variable
        $style = "";
        $minimum = 300000.0;
        $prior_prob_Ac = 14/77;
        $prior_prob_As = 21/77;
        $prior_prob_Co = 21/77;
        $prior_prob_Di = 21/77;
        $frecuency_product_acomodador = 1;
        $Producto_Frecuencia_asimilador = 1;
        $Producto_Frecuencia_convergente = 1;
        $Producto_Frecuencia_divergente = 1;
        //save data chosen by the user
        $recinto = $_POST["Recinto"];
        $promedio = $_POST["Promedio"];
        $sexo = $_POST["sexo"];
        //Sentencias SQL para traer los valores de una tabla especifica de la base de datos
  $sqlSexo = "SELECT * FROM  prob_sexo;";
  $querySexo = mysqli_query($connection, $sqlSexo);
  $sqlPromedio = "SELECT * FROM  prob_promedio;";
  $queryPromedio = mysqli_query($connection, $sqlPromedio);
  $sqlRecinto = "SELECT * FROM  prob_recinto;";
  $queryRecinto = mysqli_query($connection, $sqlRecinto);
  //Sentencias while que recorre todos los valores traidos desde la base de datos
  while ($Row = mysqli_fetch_array($querySexo)) {
      //sentencias if para escoger las frecuencias de cada variable y
      //almacenarlas en una variable para calcular el producto de las frecuencias        
      if ($Row['criterio'] == 'ACOMODADOR' && $Row['sexo'] == $Sexo) {
          $Producto_Frecuencia_Ac*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'ASIMILADOR' && $Row['sexo'] == $Sexo) {
          $Producto_Frecuencia_As*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'CONVERGENTE' && $Row['sexo'] == $Sexo) {
          $Producto_Frecuencia_Co*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'DIVERGENTE' && $Row['sexo'] == $Sexo) {
          $Producto_Frecuencia_Di*=$Row['probabilidad'];
      };        
  }
  while ($Row = mysqli_fetch_array($queryPromedio)) {
      //sentencias if para escoger las frecuencias de cada variable y
      //almacenarlas en una variable para calcular el producto de las frecuencias        
      if ($Row['criterio'] == 'ACOMODADOR' && $Row['promedio'] == $Promedio) {
          $Producto_Frecuencia_Ac*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'ASIMILADOR' && $Row['promedio'] == $Promedio) {
          $Producto_Frecuencia_As*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'CONVERGENTE' && $Row['promedio'] == $Promedio) {
          $Producto_Frecuencia_Co*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'DIVERGENTE' && $Row['promedio'] == $Promedio) {
          $Producto_Frecuencia_Di*=$Row['probabilidad'];
      }; 
  }
  while ($Row = mysqli_fetch_array($queryRecinto)) {
      //sentencias if para escoger las frecuencias de cada variable y
      //almacenarlas en una variable para calcular el producto de las frecuencias        
      if ($Row['criterio'] == 'ACOMODADOR' && $Row['recinto'] == $Recinto) {
          $Producto_Frecuencia_Ac*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'ASIMILADOR' && $Row['recinto'] == $Recinto) {
          $Producto_Frecuencia_As*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'CONVERGENTE' && $Row['recinto'] == $Recinto) {
          $Producto_Frecuencia_Co*=$Row['probabilidad'];
      } else if ($Row['criterio'] == 'DIVERGENTE' && $Row['recinto'] == $Recinto) {
          $Producto_Frecuencia_Di*=$Row['probabilidad'];
      }; 
  }
  //sentencia if para determinar cual resultado es más probable
  if ((($Producto_Frecuencia_Ac*$Prior_prob_Ac) > ($Producto_Frecuencia_As*$Prior_prob_As))
    && (($Producto_Frecuencia_Ac*$Prior_prob_Ac) > ($Producto_Frecuencia_Co*$Prior_prob_Co))
    && (($Producto_Frecuencia_Ac*$Prior_prob_Ac) > ($Producto_Frecuencia_Di*$Prior_prob_Di))) {
    $Estilo = 'Acomodador';
  } else if ((($Producto_Frecuencia_As*$Prior_prob_As) > ($Producto_Frecuencia_Co*$Prior_prob_Co))
    && (($Producto_Frecuencia_As*$Prior_prob_As) > ($Producto_Frecuencia_Di*$Prior_prob_Di))) {
    $Estilo = 'Asimilador';
  } else if ((($Producto_Frecuencia_Co*$Prior_prob_Co) > ($Producto_Frecuencia_Di*$Prior_prob_Di))) {
    $Estilo = 'Convergente';
  } else {
    $Estilo = 'Divergente';
  };
}

?>

<main class="flex-shrink-0">
    <div class="container">
        <br>
        <div class="card text-bg-warning mb-3">
            <div class="card-header">
                <img src="img/learning.svg" class="card-img-top img-fluid" style="height: 250px;" alt="learning">
            </div>
            <div class="card-body">
                <h5 class="card-title">¿Cuál es su estilo de aprendizaje?</h5>
                <p class="card-text">Instrucciones:</p>
                <p class="card-text">
                    Para utilizar el instrumento usted debe conceder una calificación alta a
                    aquellas palabras que mejor caracterizan la forma en que usted aprende,
                    y una calificación baja a las palabras que menos
                    caracterizan su estilo de aprendizaje.
                </p>

                <p class="card-text">
                    Le puede ser difícil seleccionar las palabras que mejor describen
                    su estilo de aprendizaje, ya que no hay respuestas correctas o incorrectas.
                </p>

                <p class="card-text">
                    Todas las respuestas son buenas, ya que el fin del instrumento es describir
                    cómo y no juzgar su habilidad para aprender.
                </p>

                <p class="card-text"> De
                inmediato encontrará nueve series o líneas de cuatro palabras cada una.
                Ordene de mayor a menor cada serie o juego de cuatro palabras que hay en cada línea,
                ubicando 4 en la palabra que mejor caracteriza su estilo de
                aprendizaje, un 3 en la palabra siguiente en cuanto a la
                correspondencia con su estilo; a la siguiente un 2, y un 1 a la
                palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un
                número distinto al lado de cada palabra en la misma línea. </font></font></p>

                <!--
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
            </div>
            <div class="card-footer">
                Yo aprendo...
            </div>
        </div>
        <br>

        <form name="learning-style" action="learning-style.php" method="post">
            <table class="table table-striped table-responsive">
                <tbody>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                        <select name="c1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                        </select>
                        discerniendo<br>
                    </td>
                    <td style="vertical-align: top; width: 25%;">
                        <select name="c2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                        </select>
                        ensayando<br>
                    </td>
                    <td style="vertical-align: top;">
                        <select name="c3">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                    </select>
            involucrándome</td>
                    <td style="vertical-align: top;">
                    <select name="c4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            practicando</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            receptivamente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c6">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            relacionando </td>
                    <td style="vertical-align: top;">
                    <select name="c7">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            analíticamente </td>
                    <td style="vertical-align: top;">
                    <select name="c8">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            imparcialmente </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c9">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            sintiendo </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c10">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            observando </td>
                    <td style="vertical-align: top;">
                    <select name="c11">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            pensando </td>
                    <td style="vertical-align: top;">
                    <select name="c12">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            haciendo </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c13">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aceptando </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c14">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            arriesgando </td>
                    <td style="vertical-align: top;">
                    <select name="c15">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            evaluando </td>
                    <td style="vertical-align: top;">
                    <select name="c16">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            con cautela </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c17">Adivinar
            intuitivamente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c18">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            productivamente </td>
                    <td style="vertical-align: top;">
                    <select name="c19">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            lógicamente </td>
                    <td style="vertical-align: top;">
                    <select name="c20">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            cuestionando </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c21">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            abstracto </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c22">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            observando </td>
                    <td style="vertical-align: top;">
                    <select name="c23">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            concreto </td>
                    <td style="vertical-align: top;">
                    <select name="c24">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            activo </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c25">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            orientado al presente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c26">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            reflexivamente </td>
                    <td style="vertical-align: top;">
                    <select name="c27">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            orientado hacia el futuro </td>
                    <td style="vertical-align: top;">
                    <select name="c28">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            pragmático </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c29">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la experiencia </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c30">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la observación </td>
                    <td style="vertical-align: top;">
                    <select name="c31">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la conceptualización </td>
                    <td style="vertical-align: top;">
                    <select name="c32">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la experimentación </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c33">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            emotivo </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c34">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            reservado </td>
                    <td style="vertical-align: top;">
                    <select name="c35">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            racional </td>
                    <td style="vertical-align: top;">
                    <select name="c36">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            abierto </td>
                </tr>

                </tbody>
            </table>
        <br>
        
        <button name="calculate" class="btn btn-primary">Calcular</button>

        </form>

        <form name="final" action="learning-style.php" method="post">
                <?php echo "<font size='3'><b>ESTILO: $style  </b></font>" ?>
        </form>

        <form name="final" action="estilo.php" method="post" class="w3-display-middle">
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
      <h2>Estilo de aprendizaje</h2>
      <h4>Ingrese los datos que se le solicitan a continuación<br> y presione el boton "Adivinar" para que el sistema <br>le muestre su estilo de aprendizaje</h4>  
    </div>
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
      <div class="w3-panel w3-border w3-round-xxlarge">
        Escoja su recinto:
        <select name="Recinto" value="Recinto">
          <option value='Paraiso'>Paraíso</option>
          <option value='Turrialba'>Turrialba</option>
        </select>
      </div>
      <div class="w3-panel w3-border w3-round-xxlarge">
        Promedio (utilizar "." en lugar de  ","):
        <input class="w3-input" type="Text" name="Promedio"></p>
      </div>
      <div class="w3-panel w3-border w3-round-xxlarge">
        Sexo:
        <select name="Sexo" value="Sexo">
          <option value='F'>Femenino</option>
          <option value='M'>Masculino</option>
        </select>
      </div>
      <input class="w3-button w3-white w3-border w3-border-red w3-round-large" name="Adivinar" value="Adivinar" type="submit">
      <br><br>
      <?php echo "<font size='3'><b>ESTILO: $Estilo </b></font>" ?></p>
      <br><br><br>
    </div>
  </form>
</main>

<?php include('footer.php') ?>