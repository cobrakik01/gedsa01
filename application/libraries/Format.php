<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Format
 *
 * @author cobrakik
 */
class Format {

    /**
     * 
     * @param string $text Contiene el texto
     * @return string Retorna el texto sin tildes ejemplo, sustituye: Álbum por: Album.
     */
    public static function skipTilde($text) {
        return str_replace(array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'), array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'), $text);
    }

    /**
     * 
     * @param string $text Contiene el texto
     * @return string Sustituye los espacios en blanco por guiones bajos omitiendo todas las tíldes ejemplo: Mi Descripción por: Mi_Descripcion.
     */
    public static function textToDirFormat($text) {
        return str_replace(' ', '_', self::skipTilde($text));
    }

    /**
     * 
     * @param string $text Contiene el texto
     * @return string Sustituye los guiones bajos por espacios en blanco omitiendo todas las tíldes ejemplo: Mi_Descripción por: Mi Descripcion.
     */
    public static function dirToTextFormat($text) {
        return str_replace('_', ' ', self::skipTilde($text));
    }

    /**
     * 
     * @param type $text
     * @param type $textSearch
     * @return type
     */
    static function ends_with($text, $textSearch) {
        return $textSearch == substr($text, strlen($text) - strlen($textSearch));
    }

    /**
     * 
     * @param type $old_object Objeto a castear
     * @param type $new_classname Objeto al que se quiere convertir
     * @return boolean Retorna falso si no se realiza el cast, de lo contrario retorna el nuevo objeto
     */
    public static function cast($old_object, $new_classname) {
        if (class_exists($new_classname)) {
            $old_serialized_object = serialize($old_object);
            $old_object_name_length = strlen(get_class($old_object));
            $subtring_offset = $old_object_name_length + strlen($old_object_name_length) + 6;
            $new_serialized_object = 'O:' . strlen($new_classname) . ':"' . $new_classname . '":';
            $new_serialized_object .= substr($old_serialized_object, $subtring_offset);
            $new_serialized_object = base64_encode($new_serialized_object);

            return unserialize(base64_decode($new_serialized_object));
        } else {
            return false;
        }
    }

    /**
     * Retorna true si el formato de fecha es correcto
     * @param string $date aaaa-mm-dd
     * @return boolean
     */
    public static function date($date) {
        $b = true;
        $token = explode('-', trim($date));
        if (count($token) != 3)
            return false;
        list($anio, $mes, $dia) = $token;
        if (((strlen($anio) != 4) || (strlen($mes) != 2) || (strlen($dia) != 2))) {
            return false;
        }
        if (((int) $dia) <= 0 || ((int) $mes) <= 0 || ((int) $dia) > 31 || ((int) $mes) > 12) {
            return false;
        }
        return $b;
    }

}

?>
