<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    
    <form action="" method="POST" id="formulario">

        <div class="cont1">
            <h2>INGRESO AL SISTEMA</h2>
            <div id="respuesta">
                    <?php
                        include ("ingresoSistema.php");
                    ?>
            </div>
        </div>

        <div class="inputsBox">

            <label class="labelForm">
                
                <input class="inpForm" type="text" placeholder=" " required name="nombreUsuario" id="nombreUsuario">
                <span class="textForm">Ingrese su usuario</span>
            </label>  
            
            <label class="labelForm">
                
                <input class="inpForm" type="text" placeholder=" " name="contra" id="contra">
                <span class="textForm">Ingrese su contraseña</span>
            </label>        
        </div>
        
        
        <div class="cajasInp">
            <button name="btEnviar" id="btenviar" type="submit" value="INGRESAR">INGRESAR</button>
           
        </div>
       

        

    </form>

    <style>
         *{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            box-sizing: border-box;
            width: 100%;
            
        }
        body,html{
            
            box-sizing: border-box;
            margin: 0%;
            padding: 0%;
            overflow: auto;
            background-color: grey; 
            height: 100%;           
           
        }

        form{
            display:grid;
            margin: 8% auto;            
            gap: 1rem;
            width: 80%;
            height:40%;
            border-radius:3%;           
            padding:1rem .5rem; 
            background-color: cadetblue;

        }
        h1{
            height:10%;
            margin:10% auto;
        }

          
       #enviar
        {
            display: block;            
            height: 40%;
            width: 70%;
            margin: auto;
           

        }
        input{
            font:inherit;
        }
        .cont1{
            height:30%;
            align-items:center;
        }

        .inputsBox{
            width: 95%;
            height:60%;
            margin:2% auto;
            padding: 0.7rem 1.5rem ;
            display:grid;
            gap:30%;

        }

        .labelForm{
            width: 100%;
            display:grid;
            grid-template-areas:"input";
        }
        .inpForm{
            grid-area:input;
            width: 100%;
            border:1px grey;
            border-radius:7px;
        }
        .textForm{
            grid-area:input;
            z-index: 100;
            width: max-content;
            height:100%;    
            margin-left:2rem;
            display:flex;
            align-items:center;
            transform-origin: left center;
            transition:transform .3s;

        }
        .inpForm:focus + .textForm,
        .inpForm:not(:placeholder-shown)+ .textForm{
            background-color:white;
            transform:translateY(-50%) scale(.9);
        }


        

    
        #btenviar
        {
            display: block;            
            height: 10%;
            width: 60%;
            margin:auto ;
            border-radius:2em;
            background-color:#D89696;
            border:none;        
            box-shadow: 0 0 10px #D89696;
            transition-duration:2s;
        }

        #btenviar:hover{
            scale:1.05;
            background-color:#B24444;
            border:none;        
            box-shadow: 0 0 10px #B24444;
            transition-duration:1s;
        }
       

    </style>
    <script src="app_modulo1/jquery.js"></script>
    <script type="text/javascript">

$(document).ready(function() {
    $('#formulario').submit(function() {
        

        $.ajax({
            url: 'ingresoSistema.php',  
            type: 'POST',
            data: {
                nombreUsuario: $('#nombreUsuario').val(),
                contra: $('#contra').val(),
                
            },
            success: function(response) {
              
            },
           error: function(xhr, status, error) {            
                
                
                $('#respuesta').html("Error: " );
            }
        });
    });
});


    </script>
</body>
</html>