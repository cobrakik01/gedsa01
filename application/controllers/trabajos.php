<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Trabajos_Controller extends Base_Controller {

    public function get_index(){
        return View::make('client.trabajos');
    }

}

?>
