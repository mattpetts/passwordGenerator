<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class generate {

    /**
     * 
     * validatePost
     * Validate the POST data and check nothing nasty is in there
     */
    function validatePost ($postArg){
        if ($postArg != '' && isset($postArg)) {
            return htmlentities($postArg);
        }else{
            return false;
        }
    }

    /**
     * 
     * generateString
     * Generate and return a random string of characters
     */
    function generateString ($post) {

        //set vars from the post
        $length = $this->validatePost($post['length']);
        $capitals = (isset($post['capitals'])) ? $this->validatePost($post['capitals']) : '';
        $numbers = (isset($post['numbers'])) ? $this->validatePost($post['numbers']) : '';
        $symbols = (isset($post['symbols'])) ? $this->validatePost($post['symbols']) : '';

        //list of characters 
        $characters = "abcdefghijklmnopqrstuvwxyz";

        //Addons
        $charactersCaps = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charactersNums = "0123456789";
        $charactersSyms = "?;:@<>()*&%$[]";

        //addon any extra characters
        if ($capitals) {
            $characters .= $charactersCaps;
        }
        if ($numbers) {
            $characters .= $charactersNums;
        }
        if ($symbols) {
            $characters .= $charactersSyms; 
        }


        //Split characters into an array
        $characterArray = str_split($characters);

        //Set blank password variable
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $char = array_rand($characterArray);

            $getChar = $characterArray[$char]; 

            $password .= $getChar;
        }

        return $password;
    }

}

$gen = new generate();

if ($_POST) {
    $response = $gen->generateString($_POST);
    echo $response;
}