
<?php 

if(isset($_POST['rut'])){
    $rut = $_POST['rut'];
    print_r(validarRut($rut));
}else{
    print ("errorData");
}


function validarRut($rut){
    if (isset($rut)) { 
        $largo =  strlen($rut);
        if ($largo < 7) {
            echo "error";
        }else{
            if (strpos($rut, "-")){
                $rut_sin_puntos = str_replace('.', "", $rut); //elimino puntos
                $pos = strpos($rut_sin_puntos,"-");
                $numerosentrada = explode("-", $rut_sin_puntos); 
                $verificador = $numerosentrada[1];
                $numeros = strrev($numerosentrada[0]); 
                $count = strlen($numeros); 
                $count = $count -1; 
                $suma = 0;
                $recorreString = 0;
                $multiplo = 2;
                for ($i=0; $i <=$count ; $i++) {  
                    $resultadoM = $numeros[$recorreString]*$multiplo;
                    $suma = $suma + $resultadoM; 
                    if ($multiplo == 7) { 
                        $multiplo = 1;
                    }
                    $multiplo++;
                    $recorreString++;
                }
                $resto = $suma%11;
                $dv= 11-$resto;
                $dvM = $dv;

                if ($dv == 11) {
                    $dv = 0;
                    $dvM = 0;
                }   
                if ($dv == 10) {
                    $dv = "k";
                    $dvM = "K" ;
                }
                if ($verificador == $dv || $verificador == $dvM) {
                    return "valido";
                }else {
                    return "rutInvalido";
                }
            }else{
                return "rutError";
            }
        }
    }else{
        return "rutError";
    }
}
?>