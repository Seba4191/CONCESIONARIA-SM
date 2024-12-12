<?php
Session_start();
    if(!isset($_SESSION['identificativo'])) {
        header('location:../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionaria de autos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div id="contenedor">
        <header>
            <h2 id="titulo">SM CARS</h2>
            
            <button id="abre">Altas</button>   
            <button id="cierraSesion">
            <?php

                echo "Usuario: " . $_SESSION['nombreUsuario'];
            ?>

            </button>
        </header>
        <div id="contenedor1">
            <table id="tabla">
                <thead>
                    <tr>
                        <th campo-dato='patente'><button class="boton-campos" id="patente">Patente</button>
                            <input type="text" id="f_patente" class="input-campos" >
                        </th>
                        <th campo-dato='Marca'><button class="boton-campos" id="marca">Marca</button>
                            <select id="f_marca" name="marca" class="input-campos" ></select>
                        </th>
                        <th campo-dato='Modelo'>
                            <button class="boton-campos" id="modelo">Modelo</button>
                            <input type="text" id="f_modelo" class="input-campos">
                        </th>
                        <th campo-dato='Año'><button class="boton-campos" id="anio">Año</button>
                            <input type="text" id="f_anio" class="input-campos">
                        </th>
                        <th campo-dato='FechaPatentado'><button class="boton-campos" id="fecha">Fecha de Patentado</button>
                            <input type="text" id="f_fecha" class="input-campos">
                        </th>
                        <th campo-dato='partido'><button class="boton-campos" id="partido">Partido</button>
                            <input type="text" id="f_partido" class="input-campos">
                        </th>
                        <th campo-dato='imagenes'>                 
                        </th>
                        

                    </tr>
                </thead>
                <tbody id="Ttbody">
                </tbody>
            </table>
        </div>
        <footer>
        <label for="orden" class="orden">Orden:</label>
        <input type="text" name="orden" id="orden" class="orden" value="patente">
            <div id="botones">
                <button id="cargar">Cargar datos</button>
                <button id="vaciar">Vaciar datos</button>
            </div>
        </footer>
    </div>

        <div id="ventanaForm">
            <div id="marcoForm">
                <h3>Marco Ventana Modal</h3>
                <button id="cerrarForm">X</button>
                <input id="valorF" type="hidden" value="">
            </div>     

                <form method="POST" id="formulario" enctype="multipart/form-data" >
                    <div class="cajasInp">

                        <label for="Fmarca" id="labelM" class="inpForm">Marca:</label>
                        <select  id="Fmarca" name="Fmarca" class="labelForm" required>
                    </select>                     
                    </div>                     

                    <div class="cajasInp">
                        <label for="Fpatente" class="inpForm">Patente:</label>
                        <input type="text" class="labelForm" required name="Fpatente" id="Fpatente">
                    </div>  
                    <div class="cajasInp">
                        <label for="Fmodelo" class="inpForm">Modelo:</label>
                        <input type="text" class="labelForm" required name="Fmodelo" id="Fmodelo">
                    </div>  
                    
                    <div class="cajasInp">
                        <label for="Fpartido" class="inpForm"  >partido:</label>
                        <input type="text" class="labelForm" name="Fpartido" id="Fpartido">
                    </div>

                    <div class="cajasInp">
                        <label for="Fanio" class="inpForm" >Anio:</label>
                        <input type="text" class="labelForm" required name="Fanio" id="Fanio">
                    </div>

                    <div class="cajasInp">
                        <label for="FfechaPat" class="inpForm" >Fecha Patentado:</label>
                        <input type="date" class="labelForm" required name="FfechaPat" id="FfechaPat">
                    </div>     
                    
                    <div class="cajasInp">
                        <label for="imagen" class="inpForm" >Agregar imagen:</label>
                        <input type="file" class="labelForm"  name="imagen" id="imagen">
                    </div>             
                    

                    
                    <button class="botonEnviar" id="enviarForm" type="submit">Enviar</button>

                    <div id="respuestaServ"></div>
                </form>       
        </div>

    <div id="ventanaIMG">
        <div id="marco">
            <h3>Marco Ventana Modal</h3>
            <button id="cerrar">X</button>
        </div>  
        <div id="IMG">
        </div>  
     </div>

    <style>
        *{
            font-family: "Inter", sans-serif;
            
            font-weight: bold;
            font-style: normal;
            font-size:2vh;
           
            
        }

        body, html {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            overflow: auto;
        }

        /* estilos form */

        #marcoForm 
        {
            display: flex;
            margin-top: 0%;
            height:10%;
            width: 100%;
            overflow: hidden; 
            background-color: rgb(18, 18, 77);
            color:rgb(255, 255, 255);
            text-align: center;        
        }
        #marco h3,#marcoForm h3
        {
            width:90%;
            height: 90%;
            margin-left: 10%;          
            
        }
        #cerrar
        {
           
            width: 10%;
            height: 10%;
            font-size: 2em;
            color: red;
        }
        #formulario
        {
            padding: 0%;            
            position: absolute;
            top: 10%;
            width: 100%;
            height: 90%;
            display: flex;                      
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            float: left;     
            align-items: center;
            background-color: aquamarine;  
            overflow: auto;          
        }

        .caja-marca
        {
            width: 50%;
            height: 15%;
            display: flex;
            align-items: center; 
            text-align: center;
            justify-content: center; 
            margin-top: 2%;   
        }      

      

        .cajasInp
        {
            width: 45%;
            height: 20%;            
             display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;      
        }    
       

        .labelForm ,.inpForm
        {
            display: block;            
            height: 20%;
            margin: auto;
            border:none;
        }

        .labelForm{
            width: 40%;
            height: 50%;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .inpForm{
            width: 60%;
            height: 30%;
            border-radius: 4%;
            border:none;
        }
        input{
            border-radius: 4%;
            border:none;

        }
        #labelM
        {
            width: 10%;
            height: 50%;
            left: 0%;
            text-align: center;
        }
        
        #enviar,#modificar{
            display: block;
            width: 80%;
            height: 8%;
            margin: auto;
        }

        @media (min-width:620px) and (max-width:1100px)
        {
            .cajasInp
            {
                width: 90%;
                height: 18%;
                display: block;                
            }            
            #enviar{
                display: block;
                height: 5%;
            }
           .caja-marca
            {            
                
                width:  90%;
                height: 20%;
                display: block;
            }
        
            #labelM
            {   
                    width: 80%;

            }
            *{
                font-size:1.8vh;
            }
           
        }

        @media (min-width:0px) and (max-width:620px)
        {

            .cajasInp
            {
                width: 90%;
                height: 18%;
                display: block;                
            }

            #enviar{
                display: block;
                height: 5%;
            }

           .caja-marca
            {            
                
                width:  90%;
                height: 20%;
                display: block;
            }
           
            #labelM
            {   
                    width: 80%;
            }
             *{
                font-size:1vh;
            }
            

        }
        /* estilos tabla */
        
        
        #contenedor1 {
            background-color: azure;
            height: 70%;
            width: 100%;
            left: 0;
            display: block;
            position: absolute;
            top: 15%;
            overflow: auto;
        }

         
          .input-campos,.boton-campos {
            width: 100%;
            height: 50%;
            box-sizing:border-box;
            border-radius:2%;
        }
        .input-campos {            
            border-radius:0 0 0.5em 0.5em;
        }
        .boton-campos {            
            border-radius: 0.5em 0.5em 0 0;
        }


        button {
            background-color: darkgreen;
            color: white;
            border-radius:0.5em;
        }

        header {
            top: 0;
            left: 0;
            position: fixed;
            background-color: rgb(126, 115, 115);
            width: 100%;
            height: 15%;
            overflow: hidden;
            text-align: center;
            font-size: larger;
            color: azure;
            display: flex;
        }

        footer {
            width: 100%;
            height: 15%;
            top: 85%;
            left: 0;
            position: fixed;
            background-color: rgb(126, 115, 115);
            color: azure;
            text-align: center;
            font-size: larger;
            align-items: center;
        }

        #tabla {
            height: 100%;
            width: 100%;
           
        }

        #Ttbody {
            
            height: 100%;
            width: 100%;
        }

        [campo-dato='Año'] {
            width: 9%;
        }

        [campo-dato='Marca'] {
            width: 15%;
        }

        [campo-dato='Modelo'] {
            width: 15%;
        }

        [campo-dato='partido'] {
            width: 15%;
        }

        [campo-dato='patente'] {
            width: 8%;
        }

        [campo-dato='FechaPatentado'] {
            width: 15%;
        }
        [campo-dato='imagenes'] {
            width: 7%;
        }
        [campo-dato='modi'] {
            width: 7%;
        }
        [campo-dato='baja'] {
            width: 7%;
        }

        tbody tr:nth-child(odd) {
            background-color: rgb(161, 184, 169);
            padding: 0;
        }

         .filas{
            height:20%;
            width: 100%;
        }

         #tabla th {
            height: 5em;
            
            border-radius: 0.2em;
            text-align: center;
            font-size: larger;
            font-weight: bold;
        }

        #tabla th {
            border-radius: 0;
            border-style: solid;
            border-color: black;
            background-color: rgb(0, 91, 32);
            font-size: 1.5em;
            color: white;
            margin: 0;
            padding: 0;
            border-radius:0.5em;
        }

        #botones {
            display:flex;
            margin: auto;
            height: 30%;
            width: 100%;
            justify-content:center;
            float:left;
            
        }

        #cargar, #vaciar {
            float: left;
            width: 40%;
            height: 100%;
            font-size: 0.9em;
        }

        #titulo {
            display: flex;
            text-align: center;
            justify-content: center;
            font-size: 1.9em;
        }

        .orden {
            width: 10%;
            height: 20%;
            display: none;        
            margin-left:2%;         
        }    
         td.celdas{
             height: 10px;
         }

      
       

         /*estilos ventana modal */

         #ventanaModal,#ventanaForm
        {
            width: 60%;
            height: 70%;
            position: fixed;
            top: 20%;
            left: 20%;
            border-style: solid;
            border-radius: 2%;
                       
            
        }

        #ventanaIMG
        {
            max-width: 110vh;
            max-height: 90vh;
            height: auto;
            width: auto;
            position: fixed;
            top: 0%;
            /* left: auto; */
            border-style: solid;
            border-radius: 2%;
        }
        iframe
        {
            width: 100%;
            height: 100%;      
        }
        
        #IMG{
            width: 100%;
            height: 90%;
            border: none;
            display:flex;           
        }

        #contenedor
        {
            width: 100%;
            height: 100%;
        }
        
        #abre,#cierraSesion
        {
            width: 20%;
            height:30%;
            position: absolute;        
            top:10%;    
            left: 75%;
        }   
        #cierraSesion{
            top:60%;
        }  
        div.ventanaEncendida
        {
            visibility: visible;
        }

        div.ventanaApagada
        {
            visibility: hidden;
        }
        div.contenedorActivo
        {
            opacity: 1;
            pointer-events: auto;
        }

        div.contenedorInactivo
        {
            opacity: 0.1;
            pointer-events: none;
        }
        #marco 
        {
            display: flex;
            margin-top: 0%;
            height:10%;
            width: 100%;
            overflow: hidden; 
            background-color: rgb(18, 18, 77);
            color:white;
            text-align: center;        
        }
        
        #cerrar,#cerrarForm
        {
            
           
            width: 10%;
            height: 100%;
            font-size: 2em;
            color: red;
            
        }
        #secPulser{
           
            display:flex;
            position:fixed;
            width: 50%;
            height:50%;
            top:25%;
            left:25%;            
            justify-content:center;
            align-items:center;            
        }
        .pulser{        
            
            width: 3em;
            height:3em;
            background-color:grey;
            border-radius:100%;
            transition-duration:5s;
            transition-timing-function:ease;            
            position:relative;
            margin :25px; 
        }
        .pulser:nth-child(1){
            animation: preloader .6s ease-in-out 
            alternate infinite ;
        }
        .pulser:nth-child(2){
            animation: preloader .2s ease-in-out 
            alternate infinite ;
        }
        .pulser:nth-child(3){
            animation: preloader .4s ease-in-out 
            alternate infinite ;
        }

        @keyframes preloader {
            100% {transform:scale(2);}
        }      

      
    </style>
    <script src="./jquery.js"></script>

    <script type="text/javascript">
        $('#ventanaIMG').attr('class', 'ventanaApagada');                
            $('#contenedor').attr('class', 'contenedorActivo');
            $('#ventanaForm').attr('class', 'ventanaApagada');                
            $('#contenedor').attr('class', 'contenedorActivo');

        $(document).ready(function () {
            $('#formulario').on('submit', function(e)  {
            e.preventDefault();

            var data = new FormData($("#formulario")[0]);

            var objAjax=$.ajax({
                type: 'POST', 
                method:'POST',
                enctype:'multipart/form-data',
                url: $("#valorF").val(), 
                processData: false,
                contentType: false,
                cache:false,
                data: data,
                success: function(response) {
                    $('#respuestaServ').html(response);
                },
                error: function(xhr, status, error) {
                    $('#respuestaServ').html("Error: " + error);
                }
            });
        });
            cargaLista();
            function cargaLista() {
                $.ajax({
                    type: "get",
                    url: "conexionLista.php",
                    data: {
                        marca: $("#f_marca").val()
                    },
                    success: function (respServ) {
                        $("#f_marca").empty();

                        let listJson = JSON.parse(respServ);

                        const objNada = document.createElement("option");
                        objNada.setAttribute("id", "elementoOption");
                        objNada.innerHTML="";                        
                        document.getElementById("f_marca").appendChild(objNada);

                        listJson.marcas.forEach(function (marcas, indice) {
                            const objOpcion = document.createElement("option");
                            objOpcion.setAttribute("id", "elementoOption");
                            objOpcion.setAttribute("value", marcas.nobreMarca);
                            objOpcion.innerHTML = marcas.nombreMarca;
                            objOpcion.value=marcas.nombreMarca;
                            document.getElementById("f_marca").appendChild(objOpcion);
                        });
                    }
                });
            }

            cargaLista2();
            function cargaLista2() {
                $.ajax({
                    type: "get",
                    url: "conexionLista.php",
                    data: {
                        marca: $("#Fmarca").val()
                    },
                    success: function (respServ) {
                        $("#Fmarca").empty();

                        let listJson = JSON.parse(respServ);

                        const objNada = document.createElement("option");
                        objNada.setAttribute("id", "elementoOption");
                        objNada.innerHTML="";                        
                        document.getElementById("Fmarca").appendChild(objNada);

                        listJson.marcas.forEach(function (marcas, indice) {
                            const objOpcion = document.createElement("option");
                            objOpcion.setAttribute("id", "elementoOption");
                            objOpcion.setAttribute("value", marcas.nobreMarca);
                            objOpcion.innerHTML = marcas.nombreMarca;
                            objOpcion.value=marcas.nombreMarca;
                            document.getElementById("Fmarca").appendChild(objOpcion);
                        });
                    }
                });
            }

            function muestraImg(valor) {
                
                $.ajax({
                    type:"get",
                    url:"leeIMG.php",
                    data:{
                        patente:valor,
                    },
                    success:function (respServ)
                    {
                                         
                        imagenJson=JSON.parse(respServ);
                        imgN=imagenJson.imagenVehiculo;
                        
                        $("#IMG").html("<img class='imagenN' display='flex' background-size='contain' width='100%' height='100%' max-width='100%' max-height='100%' src='data:image/jpg;base64,"+imgN+"'></img>");
                    }
                })                
            }                 
            

            function cargaTabla() {
                $("#Ttbody").empty();
                $("#Ttbody").html("<section id='secPulser'></section>");
                $("#secPulser").html("<div class='pulser'></div> <div class='pulser'></div> <div class='pulser'></div>");
                
                $.ajax({                    
                    type: "get",
                    url: "salidaJsonVehiculos.php",
                    data: {
                        orden: $("#orden").val(),
                        patente: $("#f_patente").val(),
                        marca: $("#f_marca").val(),
                        modelo: $("#f_modelo").val(),
                        anio: $("#f_anio").val(),
                        fechaPat: $("#f_fecha").val(),
                        partido: $("#f_partido").val()
                    },
                    success: function (respServ) {
                        
                        $("#Ttbody").empty();
                        autosJson = JSON.parse(respServ);
                        

                        autosJson.vehiculos.forEach(function (vehiculos) {
                            var fila = document.createElement("tr");
                            fila.setAttribute("class", "filas");
                            fila.style.height='20px';
                            

                            var celdaPatente = document.createElement("td");
                            celdaPatente.innerHTML = vehiculos.patente;
                            celdaPatente.setAttribute("class", "celdas");
                            fila.appendChild(celdaPatente);
                            //celdaPatente.style.height='10vh';

                            var celdaMarca = document.createElement("td");
                            celdaMarca.innerHTML = vehiculos.marca;
                            celdaMarca.setAttribute("class", "celdas");
                            fila.appendChild(celdaMarca);
                            //celdaMarca.style.height='10px';

                            var celdaModelo = document.createElement("td");
                            celdaModelo.innerHTML = vehiculos.modelo;
                            celdaModelo.setAttribute("class", "celdas");
                            fila.appendChild(celdaModelo);
                            //celdaModelo.style.height='10px';

                            var celdaAnio = document.createElement("td");
                            celdaAnio.innerHTML = vehiculos.anio;
                            celdaAnio.setAttribute("class", "celdas");
                            fila.appendChild(celdaAnio);
                            //celdaAnio.style.height='10px';

                            var celdaFechaPat = document.createElement("td");
                            celdaFechaPat.innerHTML = vehiculos.FechaPatentado;
                            celdaFechaPat.setAttribute("class", "celdas");
                            fila.appendChild(celdaFechaPat);
                            //celdaFechaPat.style.height='10px';

                            var celdaPartido = document.createElement("td");
                            celdaPartido.innerHTML = vehiculos.partido;
                            celdaPartido.setAttribute("class", "celdas");
                            fila.appendChild(celdaPartido);
                            //celdaPartido.style.height='10px';

                            var celdaImg = document.createElement("td");
                            var boton = document.createElement("button");
                            boton.classList.add("boton_img");
                            boton.setAttribute("data-valor", celdaPatente.innerHTML);                            
                            boton.innerHTML = "IMG";
                            celdaImg.appendChild(boton);                           
                            fila.appendChild(celdaImg);             

                            var boton = document.createElement("button");
                            boton.classList.add("boton_modi");
                            boton.setAttribute("data-valor", celdaPatente.innerHTML);   
                            boton.innerHTML = "Modi";
                            celdaImg.appendChild(boton);                            
                            fila.appendChild(celdaImg);

                            var boton = document.createElement("button");
                            boton.classList.add("boton_baja");
                            boton.setAttribute("data-valor", celdaPatente.innerHTML);   
                            boton.innerHTML = "Baja";
                            celdaImg.appendChild(boton);                             
                            fila.appendChild(celdaImg); 
                            celdaImg.setAttribute("class", "celdas");
                            //celdaImg.style.height='10px';
                            
                            $("#Ttbody").append(fila);
                            
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log("Error en la solicitud: " + error);
                    }
                });
            }

            function llenaForm(valor) {
                $.ajax({
                    type: "get",
                    url: "completaForm.php",
                    data: {                        
                        patente: valor,                        
                    },
                    success: function (respServ) {
                        autosJson = JSON.parse(respServ);
                        

                        autosJson.vehiculos.forEach(function (vehiculos) {
                            $("#Fmarca").val(vehiculos.marca);
                            $("#Fpatente").val(vehiculos.patente);
                            $("#Fmodelo").val(vehiculos.modelo);
                            $("#Fanio").val(vehiculos.anio);
                            $("#FfechaPat").val(vehiculos.FechaPatentado);
                            $("#Fpartido").val(vehiculos.partido);     
                        });                        
                    },
                    error: function (xhr, status, error) {
                        console.log("Error en la solicitud: " + error);
                    }
                });
            }
            function borrar(valor) {
                alert(valor);
                $.ajax({                   
                    type: "get",
                    url: "baja.php",
                    data: {                        
                        Fpatente: valor,                        
                    },
                    success: function (respServ) {    
                            alert(respServ);
                    },
                    error: function (xhr, status, error) {
                        alert("Error en la solicitud: " + error);
                    }
                });               
            } 
            $(document).on("click", ".boton_img", function() {
                $('#ventanaIMG').attr('class', 'ventanaEncendida');                
                $('#contenedor').attr('class', 'contenedorInactivo');
                
                var valor = $(this).data('valor');
                console.log(valor);
                muestraImg(valor);
            });

            $(document).on("click", ".boton_baja", function() {                
                var valor = $(this).data('valor');
                borrar(valor);
               
            });
            
            $(document).ready(function() {
                $("#cierraSesion").click(function() {
                location.href="../destruirSesion.php";
                });
            });


            $("#cargar").click(function () {
                cargaTabla();
            });

            $("#vaciar").click(function () {
                $("#Ttbody").empty();
            });

            $("#marca").click(function () {
                $("#orden").val("marca");
            });

            $("#patente").click(function () {
                $("#orden").val("patente");
            });

            $("#fecha").click(function () {
                $("#orden").val("fechaPatentado");
            });

            $("#modelo").click(function () {
                $("#orden").val("modelo");
            });

            $("#anio").click(function () {
                $("#orden").val("anio");
            });
            

            $("#partido").click(function () {
                
                $("#orden").val("partidoRadicado");
                
            });

            $('#abre').click(function() {
                
                $('#ventanaForm').attr('class', 'ventanaEncendida');                
                $('#contenedor').attr('class', 'contenedorInactivo');
                 $('#valorF').val("alta.php");
            });

            $(document).on("click", ".boton_modi", function() {
                $('.botonEnviar').attr('id', 'modificar');
                $('#ventanaForm').attr('class', 'ventanaEncendida');           
                $('#contenedor').attr('class', 'contenedorInactivo');
                var valor = $(this).data('valor');
                llenaForm(valor);
                $('#valorF').val("modi.php");               
            });

            $('#cerrar').click(function() {
                    
                $('#ventanaIMG').attr('class', 'ventanaApagada');                
                $('#contenedor').attr('class', 'contenedorActivo'); 
                $('.botonEnviar').attr('id', 'enviarForm');
                document.getElementById('formulario').reset();
                $('#respuestaServ').empty();
            }); 

            $('#cerrarForm').click(function() {
                
                $('#ventanaForm').attr('class', 'ventanaApagada');                
                $('#contenedor').attr('class', 'contenedorActivo');
                document.getElementById('formulario').reset();
                $('#respuestaServ').empty();
            });        
        });

      
    </script>

 
</body>
</html>
