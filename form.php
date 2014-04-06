<?php require_once('Connections/denuncia.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO denuncias (idIdenuncia, nombre, apellido, fecha, descripcion, imagen, status, email) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idIdenuncia'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['descripcion'], "text"),
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_denuncia, $denuncia);
  $Result1 = mysql_query($insertSQL, $denuncia) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
	
  }
  header(sprintf("Location: %s", $insertGoTo));
  
}
?>

<!DOCTYPE HTML"-//W3C//DTD HTML 4.01//EN>
<html><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F40945043798868" title="oEmbed Form">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Formulario</title>
<link href="http://cdn.jotfor.ms/static/formCss.css?3.2.1246" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://cdn.jotfor.ms/css/styles/nova.css?3.2.1246" />
<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.2.1246" />
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    body, html{
        margin:0;
        padding:0;
        background:#DEEEFA;
    }

    .form-all{
        margin:0px auto;
        padding-top:20px;
        width:650px;
        background:#DEEEFA;
        color:#555 !important;
        font-family:'Lucida Grande';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#555;
    }

</style>
<link rel="stylesheet" type="text/css" href="button.css" />
<link type="text/css" rel="stylesheet" href="http://jotform.co/css/styles/buttons/form-submit-button-flat_round_teal.css?3.2.1246"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="http://cdn.jotfor.ms/static/jotform.js?3.2.1246" type="text/javascript"></script>
<script src="https://js.jotform.com/vendor/postMessage.min.js" type="text/javascript"></script>
<script src="https://js.jotform.com/WidgetsServer.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      JotForm.description('input_3', 'Capturar imagen para denuciar');
      JotForm.description('input_9', 'La descripción es muy importante');
      $('input_6').hint('ex: myname@example.com');
      JotForm.setCalendar("10", false);
      JotForm.displayLocalTime("hour_10", "min_10", "ampm_10");
      JotForm.alterTexts({"alphabetic":"Este campo solo puede contener letras","alphanumeric":"Este campo solo puede contener letras y números.","confirmClearForm":"¿Está seguro de querer borra el formulario?","confirmEmail":"Correo electrónico no coincide","email":"Introduzca una dirección e-mail válida","generalError":"Existen errores en el formulario, por favor corríjalos antes de continuar.","generalPageError":"Hay errores en esta página. Por favor, corríjalos antes de continuar.","gradingScoreError":"El puntaje total debería ser sólo \"menos que\" o \"igual que\"","incompleteFields":"Existen campos requeridos incompletos. Por favor complételos.","inputCarretErrorA":"El valor introducido no puede ser menor que el mínimo especificado:","inputCarretErrorB":"Entrada no debe ser mas grande que el valor maximo:","lessThan":"Tu cuenta debería ser menor o igual que","maxDigitsError":"El máximo de dígitos permitido es","maxSelectionsError":"El número máximo de selecciones es","minSelectionsError":"El número mínimo de selección requerido es","multipleFileUploads_emptyError":"El fichero {file} está vacío; por favor, selecciona de nuevo los ficheros sin él.","multipleFileUploads_minSizeError":"{file} is demasiado pequeño, el tamaño mínimo de fichero es: {minSizeLimit}.","multipleFileUploads_onLeave":"Se están cargando los ficheros, si cierras ahora, se cancelará dicha carga.","multipleFileUploads_sizeError":"{file} es demasiado grande; el tamaño del archivo no debe superar los {sizeLimit}.","multipleFileUploads_typeError":"El fichero {file} posee una extensión no permitida. Sólo están permitidas las extensiones {extensions}.","numeric":"Este campo sólo admite valores numéricos","pastDatesDisallowed":"La fecha debe ser futura","pleaseWait":"Por favor, espere ...","required":"Campo requerido.","requireEveryRow":"Todas las filas son obligatorias.","requireOne":"Por lo menos un campo requerido","submissionLimit":"¡Lo siento! Sólo se permite una entrada. Múltiples envíos están desactivados para este formulario.","uploadExtensions":"Solo puede subir los siguientes archivos:","uploadFilesize":"Tamaño del archivo no puede ser mayor que:"});
   });
</script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="button.css" />
<script>
   function subirimagen()
  { 
      self.name="opener";
	  remote=open('gestionimagen.php','remote',
	  'width=200,height=230,location=no,menubar=no,scrollbars=yes,statusbar=no,titlebar=no');
	  remote.focus();
  }
  </script>
 
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line" id="id_3">
        <div id="cid_3" class="form-input-wide">
          <img alt="" class="form-image" border="0" src="imagenes/denuncia.jpg" height="240" width="625" />
        </div>
      </li>    
      
      <li class="form-line" id="id_8">
       
        <div id="cid_8" class="form-input">
          <div style="width:100%; text-align:Left;">
            
            <div>
              <input id="input_8" class="form-hidden widget-required form-widget" type="hidden" name="q8_tomaUna" value="">
            </div>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="40945043798868" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "40945043798868-40945043798868";
  </script>
  <script src="http://jotform.co/js/widgetResizer.js?REV=3.2.1246" type="text/javascript"></script>
</form><img src="//tracking.jotform.com/form/40945043798868" style="display:none" />
<div>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apellido:</td>
      <td><input type="text" name="apellido" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fecha:</td>
      <td><input type="datetime-local" name="fecha" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" valign="top">Descripcion:</td>
      <td><textarea name="descripcion" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
        <td nowrap="nowrap" align="right">Imagen</td>
        <td><label for="strImagen"></label>
          <input type="text" name="strImagen" id="strImagen" />
          <input type="button" name="button" id="button" value="Subir Imagen" onclick="javascript:subirimagen();" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><span id="sprytextfield1">
        <input name="email" type="text" value="" size="32">
        <span class="textfieldRequiredMsg">Necesitamos su correo para informes sobre su denuncia.</span></span></td>
    </tr>
    <script type="text/javascript" language="JavaScript">
        $(function() {
            $('#webcam').createWebCam();
            $('#capture').click(function() {
                 $('#webcam').getWebCam().capture(function(json){
                    if(json.type=="success") {
                        console.log('URL: '+json.msg);
                    } else if(json.type == "error") {
                        console.log('ERROR: '+json.msg);
                    }
                });
            });
            $('#reset').click(function() {
                 $('#webcam').getWebCam().reset();
            });
            $('#configure').click(function() {
                 $('#webcam').getWebCam().configure();
            });
        });
    </script>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro">
        </a>
  </table>
  <input type="hidden" name="idIdenuncia" value="">
  <input type="hidden" name="status" value="0">
  <input type="hidden" name="MM_insert" value="form1">
</form>
</div>
<a href="index.html" class="boton rosa formaBoton">Volver</a>

<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>