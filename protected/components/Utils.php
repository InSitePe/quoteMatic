<?php

/**
 * @package Sismonitor\Components
 */
class Utils
{

    public static function verifyService($service_id)
    {
        self::setBusqueda(['user_id' => Yii::app()->user->id,'state' => 1]);
        $model = ModelDetailLicense::model()->find(self::getBusqueda());
        if ($model) {
            self::setBusqueda(['license_id' => $model->license_id, 'service_id' => $service_id]);
            return ModelLicenses::model()->find(self::getBusqueda());
        } else {
            return false;
        }
    }
    public static $busqueda = [
        'select'    => '*',
        'condition' => '',
        'params'    => [],
    ];

    public static function encodeUrlTripleDes($string)
    {
        return str_replace(" ", "+", $string);
    }

    public static function show($data, $detenerProcesos = false, $titulo = 'Datos')
    {
        echo "<code><b>{$titulo} :</b></code>";
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        if ($detenerProcesos) {
            die();
        }
    }

    public static function ipUser()
    {
        return $_SERVER["REMOTE_ADDR"];
    }

    public static function setBusqueda($buscar, $select = false, $order = false)
    {
        if (is_array($buscar)) {
            $condition = '';
            $and       = 'AND ';
            $params    = [];
            foreach ($buscar as $key => $val) {
                $valor = Utils::reset_string($key);
                if ($val == ':isnull') {
                    $condition .= "{$key} is null {$and}";
                } else {
                    if ($val == ':nonull') {
                        $condition .= "{$key} is not null {$and}";
                    } else {
                        $condition .= "{$key} = :{$valor} {$and}";
                        $params[":{$valor}"] = $val;
                    }
                }
            }

            $condition = substr($condition, 0, -(strlen($and)));

            self::$busqueda['condition'] = $condition;
            self::$busqueda['params']    = $params;
        } else {
            self::$busqueda['condition'] = $buscar;
            self::$busqueda['params']    = $buscar;
        }
        if ($order) {
            self::$busqueda['condition'] .= " ORDER BY {$order}";
        }

        if ($select) {
            self::$busqueda['select'] = $select;
        }
    }

    public static function getBusqueda()
    {
        return self::$busqueda;
    }

    public static function _get($nombreGet)
    {
        if (!isset($_GET[$nombreGet])) {
            return null;
        }
        return $_GET[$nombreGet];
    }

    /*
     * Funcion:     existeCarpeta
     * Param:       urlServer
     * Descripcion: Se entrega la url absoluta de la carpeta que se quiere verificar su existencia, si no existe se procede a crear la carpeta.
     */

    public static function existeCarpeta($urlServer)
    {
        if (!is_dir($urlServer)) {
            mkdir($urlServer, 0777);
            if (is_dir($urlServer)) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * Funcion que revisa si un directorio esta vacio. Retorna cantidad de archivos si existe la carpeta, retorna NULL cuando no existe el directorio
     * @param string $dir
     * @return int/NULL
     */
    public static function directorio_esta_vacio($dir)
    {
        if (!is_readable($dir)) {
            $cantidad_archivos = null;
        }
        $cantidad_archivos = (count(scandir($dir)) > 2) ? count(scandir($dir)) - 2 : 0;
        return $cantidad_archivos;
    }

    public static function ISOregiones($id_departamento)
    {

        if ($id_departamento == 1) {
            return 'PE-AMA';
        } else if ($id_departamento == 2) {
            return 'PE-ANC';
        } else if ($id_departamento == 3) {
            return 'PE-APU';
        } else if ($id_departamento == 4) {
            return 'PE-ARE';
        } else if ($id_departamento == 5) {
            return 'PE-AYA';
        } else if ($id_departamento == 6) {
            return 'PE-CAJ';
        } else if ($id_departamento == 8) {
            return 'PE-CUS';
        } else if ($id_departamento == 9) {
            return 'PE-HUV';
        } else if ($id_departamento == 10) {
            return 'PE-HUC';
        } else if ($id_departamento == 11) {
            return 'PE-ICA';
        } else if ($id_departamento == 12) {
            return 'PE-JUN';
        } else if ($id_departamento == 13) {
            return 'PE-LAL';
        } else if ($id_departamento == 14) {
            return 'PE-LAM';
        } else if ($id_departamento == 15) {
            return 'PE-LIM';
        } else if ($id_departamento == 16) {
            return 'PE-LOR';
        } else if ($id_departamento == 17) {
            return 'PE-MDD';
        } else if ($id_departamento == 18) {
            return 'PE-MOQ';
        } else if ($id_departamento == 19) {
            return 'PE-PAS';
        } else if ($id_departamento == 20) {
            return 'PE-PIU';
        } else if ($id_departamento == 21) {
            return 'PE-PUN';
        } else if ($id_departamento == 22) {
            return 'PE-SAM';
        } else if ($id_departamento == 23) {
            return 'PE-TAC';
        } else if ($id_departamento == 25) {
            return 'PE-UCA';
        }
    }

    public static function ISOregionesPorId($iso)
    {

        if ($iso == 'PE-AMA') {
            return 1;
        } else if ($iso == 'PE-ANC') {
            return 2;
        } else if ($iso == 'PE-APU') {
            return 3;
        } else if ($iso == 'PE-ARE') {
            return 4;
        } else if ($iso == 'PE-AYA') {
            return 5;
        } else if ($iso == 'PE-CAJ') {
            return 6;
        } else if ($iso == 'PE-CUS') {
            return 8;
        } else if ($iso == 'PE-HUV') {
            return 9;
        } else if ($iso == 'PE-HUC') {
            return 10;
        } else if ($iso == 'PE-ICA') {
            return 11;
        } else if ($iso == 'PE-JUN') {
            return 12;
        } else if ($iso == 'PE-LAL') {
            return 13;
        } else if ($iso == 'PE-LAM') {
            return 14;
        } else if ($iso == 'PE-LIM') {
            return 15;
        } else if ($iso == 'PE-LOR') {
            return 16;
        } else if ($iso == 'PE-MDD') {
            return 17;
        } else if ($iso == 'PE-MOQ') {
            return 18;
        } else if ($iso == 'PE-PAS') {
            return 19;
        } else if ($iso == 'PE-PIU') {
            return 20;
        } else if ($iso == 'PE-PUN') {
            return 21;
        } else if ($iso == 'PE-SAM') {
            return 22;
        } else if ($iso == 'PE-TAC') {
            return 23;
        } else if ($iso == 'PE-UCA') {
            return 25;
        }
    }

    //GENERA STRING ALEATORIO
    public static function textoAleatorio($length)
    {

        $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $key     = "";

        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{rand(0, 62)};
        }
        return $key;
    }

    /**
     * Genera etiquetas HTML con la clase CHtml
     * @param string $nombre name e id del campo
     * @param string $valor en el caso del label, es el for
     * @param string $tipocampo desde input a labels
     * @param array $opciones opciones para el select, radio, checkbox
     * @param array $class_opciones opciones html como class, style, etc.
     * @return object
     */
    public static function generarCHTML($nombre, $valor, $tipocampo, $opciones, $class_opciones)
    {
        $campo = "";
        switch ($tipocampo) {
            case "TEXT":
                $campo = CHtml::textField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "SELECT":
                if (!isset($class_opciones['empty'])) {
                    $class_opciones['empty'] = "Seleccione ... ";
                }
                $campo = CHtml::dropDownList(self::reset_string($nombre), $valor, $opciones, $class_opciones);
                break;
            case "RADIO":
                if ($valor == '' || empty($valor) || $valor == null) {
                    $valor = false;
                }
                $campo = CHtml::radioButton(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "RADIOLIST":
                if ($valor == '' || empty($valor) || $valor == null) {
                    $valor = false;
                }
                $campo = CHtml::radioButtonList(self::reset_string($nombre), $valor, $opciones, $class_opciones);
                break;
            case "CHECK":
                if ($valor == '' || empty($valor) || $valor == null) {
                    $valor = false;
                }
                $campo = CHtml::checkBox(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "CHECKLIST":
                if ($valor == '' || empty($valor) || $valor == null) {
                    $valor = false;
                }
                $campo = CHtml::checkBoxList(self::reset_string($nombre), $valor, $opciones, $class_opciones);
                break;
            case "TEXTAREA":
                $campo = CHtml::textArea(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "HIDDEN":
                $campo = CHtml::hiddenField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "PASSWORD":
                $campo = CHtml::passwordField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "DATE":
                if (isset($class_opciones['class'])) {
                    $class      = $class_opciones['class'];
                    $class_date = "{$class} datepicker";
                } else {
                    $class_date = "datepicker";
                }
                $class_opciones['class']    = $class_date;
                $class_opciones['readonly'] = true;
                $campo                      = CHtml::textField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "SPINNER":
                if (isset($class_opciones['class'])) {
                    $class         = $class_opciones['class'];
                    $class_spinner = "{$class} input-mini spinner-input form-control esNumero";
                } else {
                    $class_spinner = "spinner-input esNumero";
                }
                $class_opciones['class'] = $class_spinner;
//                $class_opciones['readonly'] = true;
                $campo = CHtml::textField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "FILE":
                $campo = CHtml::fileField(self::reset_string($nombre), $valor, $class_opciones);
                break;
            case "LABEL":
                $valor = ($valor != "") ? $valor : false;
                $campo = CHtml::label($nombre, $valor, $class_opciones);
                break;
            default:
                break;
        }
        return $campo;
    }

    /**
     * Reinicia la cadena de caracteres raros.
     * @param string $string
     * @return string
     */
    public static function reset_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $string
        );

//Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "^", "`",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                ".", " "), '', $string
        );

        return $string;
    }

    /**
     * Si existe la variable enviada por GET entonces se limpia los campos vacios y se
     * devuelve el contenifo de la variable, se crea este metodo para mas legibilidad en el codigo
     * @param string $name
     * @return string
     */
    public static function existeGet($name, $default = "")
    {
        if (isset($_GET["{$name}"])) {
            return trim($_GET["{$name}"]);
        } else {
            return $default;
        }
    }

    /**
     * Cambia formato de moneda a decimal
     * @param float $monto
     * @return float
     */
    public static function moneyToDecimal($monto)
    {
        $monto = (trim($monto) == "") ? 0.00 : $monto;
        return Utils::aDecimal((float) str_replace(",", "", $monto));
    }

    public static function moneyToDecimal2($monto)
    {
        $monto = (trim($monto) == "") ? 0.00 : $monto;
        return Utils::aDecimal(str_replace(",", "", $monto));
    }

    /**
     * Cambia formato de decimal a moneda
     * @param float $monto
     * @return float
     */
    public static function decimalToMoney($monto)
    {
        if (trim($monto) == "") {
            return number_format(0, 2, ".", ",");
        } else {
            return number_format($monto, 2, ".", ",");
        }
    }

    /**
     * Convierte el valor dado a decimal
     * @param int/float $valor
     * @param string $simbolo
     * @return float
     */
    public static function aDecimal($valor = 0, $simbolo = ".")
    {
        if (trim($valor) == "") {
            return (float) self::moneyToDecimal(0);
        } else {
            return (float) number_format($valor, 2, $simbolo, '');
        }
    }

    /**
     * Creacion de carpeta de manera recursiva
     * @param string $url url absoluta de la carpeta a ser creada
     * @return boolean
     */
    public static function crearCarpetaRecursiva($url)
    {
        $urlSISMONITOR = yii::getPathOfAlias("webroot");
        $urlPath       = explode($urlSISMONITOR, $url);
        $urlNuevo      = $urlPath[1];
        if (!is_dir($url)) {
            $nivelesnuevos = explode('/', $urlNuevo);
            $ruta_temp     = $urlSISMONITOR;
            for ($i = 1; $i < (count($nivelesnuevos)); $i++) {
                $ruta_temp = $ruta_temp . '/' . $nivelesnuevos[$i];
                Utils::existeCarpeta($ruta_temp);
            }
        }
        return true;
    }

    /**
     * Se ingresa el total, el porcentaje total, y se ingresa o la cantidad, o el porcentaje cantidad para obtener el dato.
     * @param integer $total monto total a evaluar el porcentaje
     * @param integer $porcentaje_total porcentaje actual del monto total a ser evaluado
     * @param integer $cantidad la se ingresa la cantidad para obtener el porcentaje
     * @param integer $porcentaje_cantidad se ingresa el porcentaje para obtener la cantidad
     * @return string/decimal depende si se puede hacer la logica matematiac
     */
    public static function obtener_porcentaje($total, $porcentaje_total, $cantidad = 0, $porcentaje_cantidad = 0)
    {
        $resultado = 0;
        if ($total > 0) {
            if ($cantidad == 0) {
                $resultado = ($total * $porcentaje_cantidad) / $porcentaje_total;
            } elseif ($porcentaje_cantidad == 0) {
                $resultado = ($cantidad * $porcentaje_total) / $total;
            }
            return number_format($resultado, 2);
        } else {
            return "(N/A)";
        }
    }

    /**
     * Funcion que limita los caracteres de una cadena.
     * @param type $string cadena de texto completa
     * @param type $limit cantidad de caracteres para limitar la cadena
     * @param string $ellipsis variable que indica como terminar el texto
     * @return string
     */
    public static function limitcharacters($string, $limit = 10, $ellipsis = "...")
    {
        $cadena = substr($string, 0, $limit);

        $longitud = strlen($string);

        if ($longitud > $limit) {
            return $cadena . $ellipsis;
        } else {
            return $cadena;
        }
    }

    /**
     * Descarga un File especifico, dando los siguientes parametros.
     * @param string $url_file_server url servidor del archivo a descargar
     * @param string $filename nombre del archivo a descargar
     * @param string $extension extension del archivo a descargar
     * @param string $mimetype mimetype del archivo a descargar
     */
    public static function descargarFile($url_file_server, $filename, $extension, $mimetype)
    {
        header('Content-Type: ' . $mimetype);
        header('Content-Disposition: attachment; filename="' . $filename . '.' . $extension . '"');
        header("Content-Transfer-Encoding: binary");
        echo file_get_contents($url_file_server . $filename . '.' . $extension);
    }

    /**
     * Obterner servidor de correo y extension
     * @param string $mail el correo electronico
     */
    public static function getServidorMail($correo = "example@mail.com")
    {
        if ($correo == null) {
            $retorno = '9';
        } else {

            $mail        = explode('@', $correo);
            $host        = strtoupper($mail[1]);
            $dominio     = explode('.', $host);
            $list_server = Constante::SERVIDOR_CORREO;
            $retorno     = "";

            if ($dominio[0] != 'YAHOO') {
                if (isset($list_server[$dominio[0]])) {
                    $retorno = $list_server[$dominio[0]];
                } else {
                    $retorno = '9';
                }
            } else {
                if (isset($list_server[$host])) {
                    $retorno = $list_server[$host];
                } else {
                    $retorno = '9';
                }
            }
        }

        return $retorno;
    }

    /**
     *  Ordena un array  de datos por un subkey. OBS. ideal para ordenar por campo luego de el array sea extraido de la bd
     * @param type $arr tipo  [0] llave => valor
     * @return type array tipo [llave] => valor
     */
    public function ordernamiento_por_subkey(&$array, $subkey = "id", $sort_ascending = false)
    {

        if (count($array)) {
            $temp_array[key($array)] = array_shift($array);
        }

        foreach ($array as $key => $val) {
            $offset = 0;
            $found  = false;
            foreach ($temp_array as $tmp_key => $tmp_val) {
                if (!$found and strtolower($val[$subkey]) > strtolower($tmp_val[$subkey])) {
                    $temp_array = array_merge((array) array_slice($temp_array, 0, $offset), array($key => $val), array_slice($temp_array, $offset)
                    );
                    $found = true;
                }
                $offset++;
            }
            if (!$found) {
                $temp_array = array_merge($temp_array, array($key => $val));
            }

        }

        if ($sort_ascending) {
            $array = array_reverse($temp_array);
        } else {
            $array = $temp_array;
        }

    }

    public static function multidimensional_search($parents, $searched)
    {

        set_time_limit(10);

        foreach ($parents as $key => $value) {
            $exists = true;
            foreach ($searched as $skey => $svalue) {
                $exists = ($exists && isset($parents[$key][$skey]) && $parents[$key][$skey] === $svalue);
//  $exists = ( IsSet($parents[$key][$skey]) && $parents[$key][$skey] == $svalue);
            }
            if ($exists) {
                return $key;
            }
        }

        return false;
    }

    /**
     *  elimina una dimension del array ingresado
     * @param type $arr tipo  [0] llave => valor
     * @return type array tipo [llave] => valor
     */
    public static function subearray($arr)
    {
        $out = array();
        foreach ($arr as $key => $subarr) {

            foreach ($subarr as $subkey => $subvalue) {
                $out[$subkey] = $subvalue;
            }
        }
        return $out;
    }

    public static function recursive_array_search($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $current_key = $key;
            if ($needle === $value or (is_array($value) && Utils::recursive_array_search($needle, $value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }

    public static function agregarComidines($palabra)
    {
        $palabra = addcslashes(trim($palabra), '%_');
        $palabra = str_replace(' ', '%', "%{$palabra}%");
        return $palabra;
    }

    public static function sinLimitesTiempoyMemoria()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);
    }

    public static function exportarToExcel($nombre, $command)
    {

        function cleanData(&$str)
        {
            $str = preg_replace("/\t/", "\\t", $str);
            $str = preg_replace("/\r?\n/", "\\n", $str);
            if (strstr($str, '"')) {
                $str = '"' . str_replace('"', '""', $str) . '"';
            }

            $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
        }

        $filename = $nombre . date('Ymd') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Content-Type: text/html; charset=latin1');
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
        foreach ($command as $row) {
            if (!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\n";
                $flag = true;
            }
            array_walk($row, 'cleanData');
            echo implode("\t", array_values($row)) . "\n";
        }

        exit;
    }

    public static function exportarExcel2($filename)
    {

        $now = gmdate("D, d M Y H:i:s");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
//        exit;
    }

    public static function keyUnique()
    {
// metodo que devuelve un id unico que se usa como llave
        // primaria para todas las tablas, se autogeneran estos id para evitar colision
        // de llaves incrementales en algunas tablas
        $sql     = "SELECT NEWID() AS 'key'";
        $command = Yii::app()->db->createCommand($sql)->queryAll();
        $key     = $command[0]['key'];
        return str_replace("-", "", $key);
    }

    public static function token($valor)
    {
        return sha1(TripleDes::Encrypt($valor));
    }

    public static function validarToken($token, $valor)
    {
        if ($token === self::token($valor)) {
            return true;
        }
        return false;
    }

    public static function encapsularArrayxVal($array)
    {
        $return = [];
        foreach ($array as $key => $val) {
            $return[] = $val;
        }
        return $return;
    }

    public static function encapsularArrayxKey($array)
    {
        $return = [];
        foreach ($array as $key => $val) {
            $return[] = $key;
        }
        return $return;
    }

}
