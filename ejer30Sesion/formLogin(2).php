<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                
                <input class="inpForm" type="password" placeholder=" " name="contra" id="contra">
                <span class="textForm">Ingrese su contraseña</span>
            </label> 

            <div class="textoMostrar"> 
                    <input type="checkbox" name="mostrarC" id="mostrarC" >
                    <span class="">Mostrar contraseña</span>
            </div>

        </div>
        
        
        <div class="cont2"> 
            <button name="btEnviar" id="btenviar" type="submit" value="INGRESAR">INGRESAR</button>
        </div>  

    </form>

    <style>
         *{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
            box-sizing: border-box;            
            width: 100%;
            
        }
        body,html{
            background-image:url('fondo.webp');
            background-size:100%;
            background-repeat:repeat;
            box-sizing: border-box;
            margin: 0%;
            padding: 0%;
            overflow: auto;
            background-color: grey; 
            height: 100%;           
           
        }

        form{
            
            margin: 20vh auto;      
            max-width: 500px;
            height:60vh;
            border-radius:3%;           
            padding:1rem .5rem; 
            background-color: #cee7f0;
            box-shadow:0px 0px 50px #1b353b;

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
        .cont2{
            height:30%;
            align-items:center;
            
        }

        .cont1{
            height:15%;
            text-align:center;            
        }
        
        

        .inputsBox{
            display:grid;
            width: 95%;
            height:40%;
            margin:2% auto;
            padding: 0.7rem 1.5rem ;
            background-color:#cee7f0;
            gap:12%;

        }

        .labelForm{
            width: 100%;
            height:100%;
            display:grid;
            grid-template-areas:"input";
        }
        .inpForm{
            grid-area:input;
            width: 100%;
            height:100%;
            border:1px solid #748b93;
            border-radius:7px;
            background-color:#cee7f0;
            display:flex;
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
            
            transform:translateY(-50%) scale(.7);
            background-color:#cee7f0;
        }

        #btenviar
        {
            display: block;            
            height: 30%;
            width: 60%;
            margin:4% auto ;
            border-radius:2em;
            background-color:#2196f3;
            border:none;        
            box-shadow: 0 0 10px #607abb;
            transition-duration:2s;
            cursor:pointer;
        }

        #btenviar:hover{
            scale:1.05;
            background-color:#3b9ec0;
            border:none;        
            box-shadow: 0 0 10px #3b9ec0;
            transition-duration:1s;
        }
       
        .mContra{
            float:left;
            display:flex;
            width: 90%;            
        }

        .textoMostrar{
            margin:auto;
            width: 90%;            
            display:flex;
            float:left;
        }
        #mostrarC{
            width: 25px;
            margin-left:0;
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

        $('#mostrarC').change(function () {        
            const input = $('#contra');
            if ($(this).is(':checked')) {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password'); 
            }
        });    
});


    </script>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                
                <input class="inpForm" type="password" placeholder=" " name="contra" id="contra">
                <span class="textForm">Ingrese su contraseña</span>
            </label> 

            <div class="textoMostrar"> 
                    <input type="checkbox" name="mostrarC" id="mostrarC" >
                    <span class="">Mostrar contraseña</span>
            </div>

        </div>
        
        
        <div class="cont2"> 
            <button name="btEnviar" id="btenviar" type="submit" value="INGRESAR">INGRESAR</button>
        </div>  

    </form>

    <style>
         *{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
            box-sizing: border-box;            
            width: 100%;
            
        }
        body,html{
            background-image:url('fondo.webp');
            background-size:100%;
            background-repeat:repeat;
            box-sizing: border-box;
            margin: 0%;
            padding: 0%;
            overflow: auto;
            background-color: grey; 
            height: 100%;           
           
        }

        form{
            
            margin: 20vh auto;      
            max-width: 500px;
            height:60vh;
            border-radius:3%;           
            padding:1rem .5rem; 
            background-color: #cee7f0;
            box-shadow:0px 0px 50px #1b353b;

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
        .cont2{
            height:30%;
            align-items:center;
            
        }

        .cont1{
            height:15%;
            text-align:center;            
        }
        
        

        .inputsBox{
            display:grid;
            width: 95%;
            height:40%;
            margin:2% auto;
            padding: 0.7rem 1.5rem ;
            background-color:#cee7f0;
            gap:12%;

        }

        .labelForm{
            width: 100%;
            height:100%;
            display:grid;
            grid-template-areas:"input";
        }
        .inpForm{
            grid-area:input;
            width: 100%;
            height:100%;
            border:1px solid #748b93;
            border-radius:7px;
            background-color:#cee7f0;
            display:flex;
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
            
            transform:translateY(-50%) scale(.7);
            background-color:#cee7f0;
        }

        #btenviar
        {
            display: block;            
            height: 30%;
            width: 60%;
            margin:4% auto ;
            border-radius:2em;
            background-color:#2196f3;
            border:none;        
            box-shadow: 0 0 10px #607abb;
            transition-duration:2s;
            cursor:pointer;
        }

        #btenviar:hover{
            scale:1.05;
            background-color:#3b9ec0;
            border:none;        
            box-shadow: 0 0 10px #3b9ec0;
            transition-duration:1s;
        }
       
        .mContra{
            float:left;
            display:flex;
            width: 90%;            
        }

        .textoMostrar{
            margin:auto;
            width: 90%;            
            display:flex;
            float:left;
        }
        #mostrarC{
            width: 25px;
            margin-left:0;
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

        $('#mostrarC').change(function () {        
            const input = $('#contra');
            if ($(this).is(':checked')) {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password'); 
            }
        });    
});


    </script>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                
                <input class="inpForm" type="password" placeholder=" " name="contra" id="contra">
                <span class="textForm">Ingrese su contraseña</span>
            </label> 

            <div class="textoMostrar"> 
                    <input type="checkbox" name="mostrarC" id="mostrarC" >
                    <span class="">Mostrar contraseña</span>
            </div>

        </div>
        
        
        <div class="cont2"> 
            <button name="btEnviar" id="btenviar" type="submit" value="INGRESAR">INGRESAR</button>
        </div>  

    </form>

    <style>
         *{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
            box-sizing: border-box;            
            width: 100%;
            
        }
        body,html{
            background-image:url('fondo.webp');
            background-size:100%;
            background-repeat:repeat;
            box-sizing: border-box;
            margin: 0%;
            padding: 0%;
            overflow: auto;
            background-color: grey; 
            height: 100%;           
           
        }

        form{
            
            margin: 20vh auto;      
            max-width: 500px;
            height:60vh;
            border-radius:3%;           
            padding:1rem .5rem; 
            background-color: #cee7f0;
            box-shadow:0px 0px 50px #1b353b;

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
        .cont2{
            height:30%;
            align-items:center;
            
        }

        .cont1{
            height:15%;
            text-align:center;            
        }
        
        

        .inputsBox{
            display:grid;
            width: 95%;
            height:40%;
            margin:2% auto;
            padding: 0.7rem 1.5rem ;
            background-color:#cee7f0;
            gap:12%;

        }

        .labelForm{
            width: 100%;
            height:100%;
            display:grid;
            grid-template-areas:"input";
        }
        .inpForm{
            grid-area:input;
            width: 100%;
            height:100%;
            border:1px solid #748b93;
            border-radius:7px;
            background-color:#cee7f0;
            display:flex;
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
            
            transform:translateY(-50%) scale(.7);
            background-color:#cee7f0;
        }

        #btenviar
        {
            display: block;            
            height: 30%;
            width: 60%;
            margin:4% auto ;
            border-radius:2em;
            background-color:#2196f3;
            border:none;        
            box-shadow: 0 0 10px #607abb;
            transition-duration:2s;
            cursor:pointer;
        }

        #btenviar:hover{
            scale:1.05;
            background-color:#3b9ec0;
            border:none;        
            box-shadow: 0 0 10px #3b9ec0;
            transition-duration:1s;
        }
       
        .mContra{
            float:left;
            display:flex;
            width: 90%;            
        }

        .textoMostrar{
            margin:auto;
            width: 90%;            
            display:flex;
            float:left;
        }
        #mostrarC{
            width: 25px;
            margin-left:0;
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

        $('#mostrarC').change(function () {        
            const input = $('#contra');
            if ($(this).is(':checked')) {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password'); 
            }
        });    
});


    </script>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                
                <input class="inpForm" type="password" placeholder=" " name="contra" id="contra">
                <span class="textForm">Ingrese su contraseña</span>
            </label> 

            <div class="textoMostrar"> 
                    <input type="checkbox" name="mostrarC" id="mostrarC" >
                    <span class="">Mostrar contraseña</span>
            </div>

        </div>
        
        
        <div class="cont2"> 
            <button name="btEnviar" id="btenviar" type="submit" value="INGRESAR">INGRESAR</button>
        </div>  

    </form>

    <style>
         *{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
            box-sizing: border-box;            
            width: 100%;
            
        }
        body,html{
            background-image:url('fondo.webp');
            background-size:100%;
            background-repeat:repeat;
            box-sizing: border-box;
            margin: 0%;
            padding: 0%;
            overflow: auto;
            background-color: grey; 
            height: 100%;           
           
        }

        form{
            
            margin: 20vh auto;      
            max-width: 500px;
            height:60vh;
            border-radius:3%;           
            padding:1rem .5rem; 
            background-color: #cee7f0;
            box-shadow:0px 0px 50px #1b353b;

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
        .cont2{
            height:30%;
            align-items:center;
            
        }

        .cont1{
            height:15%;
            text-align:center;            
        }
        
        

        .inputsBox{
            display:grid;
            width: 95%;
            height:40%;
            margin:2% auto;
            padding: 0.7rem 1.5rem ;
            background-color:#cee7f0;
            gap:12%;

        }

        .labelForm{
            width: 100%;
            height:100%;
            display:grid;
            grid-template-areas:"input";
        }
        .inpForm{
            grid-area:input;
            width: 100%;
            height:100%;
            border:1px solid #748b93;
            border-radius:7px;
            background-color:#cee7f0;
            display:flex;
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
            
            transform:translateY(-50%) scale(.7);
            background-color:#cee7f0;
        }

        #btenviar
        {
            display: block;            
            height: 30%;
            width: 60%;
            margin:4% auto ;
            border-radius:2em;
            background-color:#2196f3;
            border:none;        
            box-shadow: 0 0 10px #607abb;
            transition-duration:2s;
            cursor:pointer;
        }

        #btenviar:hover{
            scale:1.05;
            background-color:#3b9ec0;
            border:none;        
            box-shadow: 0 0 10px #3b9ec0;
            transition-duration:1s;
        }
       
        .mContra{
            float:left;
            display:flex;
            width: 90%;            
        }

        .textoMostrar{
            margin:auto;
            width: 90%;            
            display:flex;
            float:left;
        }
        #mostrarC{
            width: 25px;
            margin-left:0;
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

        $('#mostrarC').change(function () {        
            const input = $('#contra');
            if ($(this).is(':checked')) {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password'); 
            }
        });    
});


    </script>
</body>
</html>