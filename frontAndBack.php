<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * Primer Pregunta
 */
function ciudadesUnicas(array $array1, array $array2): array{
    return array_unique(array_merge($array1, $array2));
}

$ciudades = ciudadesUnicas(['Madrid', 'Londres', 'París', 'Madrid'], ['París', 'Copenhague', 'Londres']);
echo join(', ', $ciudades);


/**
 * Segunda Pregunta
 */
function empleadosPorCiudad(array $array): array{
    $group = [];
    $i = 0;
    $group["Keys"] = array_keys($array);
    $group["Values"] = array_values($array);
    for ($i=0; $i < sizeof($array); $i++) {
        $new[$i] = array("Name" => $group["Keys"][$i], "City" => $group["Values"][$i]);
    }

    $key = "City"; //Group By...
    foreach($new as $val) {
        if(array_key_exists($key, $val)){
            $result[$val[$key]][] = $val["Name"];
        }else{
            $result[""][] = $val["Name"];
        }
    }
    
    return $result;
}

$empleados = array(
    "Ariel Patrick" => "Frankfurt, DE",
    "Adriana Thomson" => "Londres, UK",
    "Geoffrey Robinson" => "Guadalajara, MX",
    "Malikah Novak" => "Londres, UK",
    "Bertie Frye" => "Londres, UK",
    "Fathima Fritz" => "Frankfurt, DE",
    "Lilly-May Snyder" => "Liverpool, UK",
    "Isaak Terry" => "Guadalajara, MX",
    "Travis Beil" => "Berlín, DE"
);



/**
 * Tercera Pregunta
 */
function ciudadesPorPais(array $array): array{
    $group = [];
    $group["Keys"] = array_keys($array);
    $group["Values"] = array_values($array);
    for ($i=0; $i < sizeof($array); $i++) {
        $new[$i] = array("Name" => $group["Keys"][$i], "City" => $group["Values"][$i], "Country" => trim(explode(",", $group["Values"][$i])[1]));
    }

    $key = "Country"; //Group By...
    foreach($new as $val) {
        $city_ = explode(",", $val["City"]);
        if(array_key_exists($key, $val)){
            $result[$val[$key]][] = $city_[0];
        }else{
            $result[""][] = $city_[0];
        }
        $result[$val[$key]] = array_unique($result[$val[$key]]);
        //$result[$val[$key]] = count($result[$val[$key]]);
    }

    foreach($result as $val => $sd) {
        $totalCiudades[$val]["TotalCiudades"] = count($result[$val]);
    }
    
    return $totalCiudades;
}

echo "<pre>";
var_dump(ciudadesPorPais($empleados));
echo "</pre>";

/**
 * Cuarta Pregunta
 */
$variable1 = 'Hello ';
$variable2 = 'World';

// Sentencia 1
$variable3 = $variable1.$variable2;
echo $variable3;

// Sentencia 2
$variable3 = "$variable1$variable2";
echo $variable3;


/**
 * QUERY - Pregunta 7
 */
//SELECT `mail_miembro` as Miembro, (CHAR_LENGTH(`mails_recomendados`) - CHAR_LENGTH(REPLACE(`mails_recomendados`, ',','')) + 1) as INVITADOS  FROM `recomendaciones`

/**
 * Pregunta 9
 */
echo "<br><br>===========================<br>";
$entrada = "Lorem ipsum dolor sit amet (999-345-7876).
Donec vel blandit turpis (8CP-45-888J).
Donec eget pretium nunc (K98-BG9-555b).
Phasellus ornare suscipit maximus (999-345-C846)
{678-G7-6578} Sed consequat est id luctus luctus.
Proin aliquet porta BB7-5490-C2FX libero.
Vel cursus massa bibendum tempus (98-4567-98R56).
Curabitur nisl metus 66-987-ARK7.
(46G-yt-3598) Fermentum et lectus.
Pellentesque quis ultrices libero [65R-11-BYTR].
Eu ullamcorper (TT-98/0987) diam.
Gravida metus vel, (6-55U-9823) <- consequat velit.
Diam ipsum sodales ligula (Y78-09T4-23). <-
Vestibulum et sodales metus (657-EH8-990).
Donec (878-UGF-LK4) quis faucibus elit.";

$patrón = ;
preg_match_all('/\(([A-Za-z0-13-9 -\/]+?)\)/', $entrada, $coincidencias);
echo "<pre>";
var_dump($coincidencias[1]);
echo "</pre>";

/* $resultado = array(9) {
    [0]=>
    string(12) "999-345-7876"
    [1]=>
    string(11) "8CP-45-888J"
    [2]=>
    string(12) "K98-BG9-555b"
    [3]=>
    string(12) "999-345-C846"
    [4]=>
    string(13) "98-4567-98R56"
    [5]=>
    string(11) "46G-yt-3598"
    [6]=>
    string(10) "TT-98/0987"
    [7]=>
    string(11) "657-EH8-990"
    [8]=>
    string(11) "878-UGF-LK4"
  } */