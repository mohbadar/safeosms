<?php
/**
 * @author Balam Gonzalez Luis Humberto
 * @version 0.0.01
 * @package
 */
//=====================================================================================================
	include_once("../core/go.login.inc.php");
	include_once("../core/core.error.inc.php");
	include_once("../core/core.html.inc.php");
	include_once("../core/core.init.inc.php");
	include_once("../core/core.db.inc.php");
	$theFile			= __FILE__;
	$permiso			= getSIPAKALPermissions($theFile);
	if($permiso === false){	header ("location:../404.php?i=999");	}
	$_SESSION["current_file"]	= addslashes( $theFile );
//=====================================================================================================
$xHP		= new cHPage("TR.Reporte de CATALOGO_CONTABLE", HP_FORM);
$xQL		= new MQL();
$xLi		= new cSQLListas();
$xF			= new cFecha();
$xDic		= new cHDicccionarioDeTablas();
//$jxc = new TinyAjax();
//$jxc ->exportFunction('datos_del_pago', array('idsolicitud', 'idparcialidad'), "#iddatos_pago");
//$jxc ->process();
$clave		= parametro("id", 0, MQL_INT); $clave		= parametro("clave", $clave, MQL_INT);  
$fecha		= parametro("idfecha-0", false, MQL_DATE); $fecha = parametro("idfechaactual", $fecha, MQL_DATE);  $fecha = parametro("idfecha", $fecha, MQL_DATE);
$persona	= parametro("persona", DEFAULT_SOCIO, MQL_INT); $persona = parametro("socio", $persona, MQL_INT); $persona = parametro("idsocio", $persona, MQL_INT);
$credito	= parametro("credito", DEFAULT_CREDITO, MQL_INT); $credito = parametro("idsolicitud", $credito, MQL_INT); $credito = parametro("solicitud", $credito, MQL_INT);
$cuenta		= parametro("cuenta", DEFAULT_CUENTA_CORRIENTE, MQL_INT); $cuenta = parametro("idcuenta", $cuenta, MQL_INT);
$jscallback	= parametro("callback"); $tiny = parametro("tiny"); $form = parametro("form"); $action = parametro("action", SYS_NINGUNO);
$monto		= parametro("monto",0, MQL_FLOAT); $monto	= parametro("idmonto",$monto, MQL_FLOAT); 
$recibo		= parametro("recibo", 0, MQL_INT); $recibo	= parametro("idrecibo", $recibo, MQL_INT);
$empresa	= parametro("empresa", 0, MQL_INT); $empresa	= parametro("idempresa", $empresa, MQL_INT); $empresa	= parametro("iddependencia", $empresa, MQL_INT);
$grupo		= parametro("idgrupo", 0, MQL_INT); $grupo	= parametro("grupo", $grupo, MQL_INT);
$ctabancaria = parametro("idcodigodecuenta", 0, MQL_INT); $ctabancaria = parametro("cuentabancaria", $ctabancaria, MQL_INT);

$observaciones= parametro("idobservaciones");

$xHP->init();

$xFRM		= new cHForm("frmrptcatalogo", "./", false, "", "formoid-default panel");
$xSel		= new cHSelect();
$xRPT		= new cPanelDeReportesContables(false, false);
$xRPT->OFRM()->setTitle($xHP->getTitle());
$xRPT->OFRM()->addHElem($xSel->getListaDeTiposDeCuentasContables()->get(true) );
$xRPT->OFRM()->addHElem($xSel->getListaDeNivelesDeCuentasContables()->get(true) );
$xRPT->OFRM()->OCheck("TR.SOLO AFECTABLES", "idafectables");
$xRPT->OFRM()->OCheck("TR.MOSTRAR TODO", "idtodo");
echo $xRPT->render();

//$jxc ->drawJavaScript(false, true);
?>
<script>
var xG 	= new Gen();
function jsGetReporte(){
	var idtipodecuentacontable	= $("#idtipodecuentacontable").val();
	var idniveldecuenta			= $("#idniveldecuenta").val();
	var idtodo					= document.getElementById("idtodo").checked;
	var idafectables			= document.getElementById("idafectables").checked;
	var urlrpt 		= "rpt_reporte_del_catalogo.php?mostrar=" + idtodo + "&afectables=" + idafectables;
	xG.w({ url : urlrpt });
}
</script>
<?php
$xHP->fin();

?>