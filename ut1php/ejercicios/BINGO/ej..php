<html>

<?php
session_start();
 
$numero=-1;
srand((double)microtime()*1000000);
$numero=rand(1,60);
$salida='';
 
if(isset($_POST['finPartida'])){
        $_SESSION['i']=60;
        unset($_POST['finPartida']);
}
if($_SESSION['i']==60){
        $salida='<div class="mensaje">Otra partida?</div>';
        $salida.='<div id="panelControl">
                        <form id="nuevoJuego" method="post" action="ej..php">
                                <input type="submit" id="nuevaPartida" name="nuevaPartida" value="NUEVA PARTIDA"/>
                        </form>
                </div>';
        $_SESSION = array();
 
       // session_destroy();
}else{
 
        if(isset($_SESSION['cantados'])==FALSE){
 
                $_SESSION['i']=1;
                $_SESSION['cantados'][]=$numero;
        }else{
                while(in_array($numero,$_SESSION['cantados']))   {
                        $numero=rand(1,60);
                }
                $_SESSION['cantados'][]= $numero;
                $_SESSION['i']=$_SESSION['i']+1;
        }
 
        sort($_SESSION['cantados']);
        $salida.='<div class="detalle"># restantes: <span class="negrita">'.(60-$_SESSION['i']).'</span></div>';
        $salida.='<div id="pizarraMain">
                        <div id="pizarraNumero">'.$numero.'</div>
                        <div id="panelControl">
                                <form method="post" action="ej..php">
                                        <input type="submit" id="nuevoNumero" name="nuevoNumero" value="NUEVO NUMERO"/>
                                        <input type="submit" id="finPartida" name="finPartida" value="FIN PARTIDA"/>
                                </form>
                        </div>
                </div>';
       
        
}
?>
<html>
<head><title>Bingoooooo!!!</title>
<style>
body {margin:20px; padding:0px;}
div.mensaje{color:red;padding:20px;font-size:100px;width:100%;text-align:center;}
div#pizarraMain{padding:20px;width:30%;font-size:200px;color:red;float:left;}
div#pizarraNumero{padding-left:100px;width:100%;}
div#panelControl {width:100%;font-size:30px;}
div#pizarraResumen {width:50%;float:left;}
table {font-size:30px;margin:0;padding:0;margin-left:50px;}
td {padding:5px 10px;}
.cantado {color:red;}
.instrucciones {display:none;font-size:20px;width:100%;color:grey;background-color:#efefef;}
.detalle {display:block; font-size:30px;width:100%;}
.negrita {font-weight:bold;}
form {margin:0px;padding:0px; }
input {height:120px;width:190px;font-size:20px;}
form#nuevoJuego{width:100%;text-align:center;}
</style>
</head>
<body>
 
<?php echo $salida;?>
 
</body>
</html>