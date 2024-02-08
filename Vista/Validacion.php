<?php
    class Validar 
    {
        function __construct()
        {
        }

        public function ValidarInt($Val)
        {       
            if(is_numeric($Val))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function ValidarText($text)
        {
            $Patron='/^[a-zA-Z, ]*$/';
            if($text == null)
            {
                return false;
            }
            elseif(preg_match($Patron,$text))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function ValidarVacio($Vaci)
        {
            if($Vaci== null)
            {
                return false;
            }
            else
            {
                return true;
            }
        }


    }

?>