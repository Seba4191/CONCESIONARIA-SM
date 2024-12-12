<?php

if(!empty($_POST['btEnviar'])){
    

        if(!empty($_POST['nombreUsuario']) && !empty($_POST['contra'])){
            
        echo "ingreso";


        }
        else{
            echo "campos incompletos";
        }
        
    }
    else 
    {
        echo "";
    }
    

?>