<?php

require('Conexion.php');
// require('../actions/encript.php');
require ('PHPExcel.php');
//echo "<script>console.log('Ingreso');</script>";

$FECHA1 =  date('Y/m/d',strtotime($_POST['fecha-inicio-USO'])) ;
$FECHA2 = date('Y/m/d',strtotime($_POST['fecha-fin-USO'])) ;


if(isset($_POST['buttom-USO'])){

$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$myparams['fecha_inicio'] = $FECHA1;
$myparams['fecha_fin'] = $FECHA2; 

 $procedure_params = array(
 array(&$myparams['fecha_inicio'], SQLSRV_PARAM_IN),
 array(&$myparams['fecha_fin'], SQLSRV_PARAM_IN)
); 
 

/* $sqlserver ="SPR_CONECTADOS '".$FECHA1."','".$FECHA2."'"; */

$sqlserver ="SELECT CON_CESTADO_BOT, CON_DFECREG_BOT, count(CON_CSECPC_BOT)as usuarios FROM TBL_ACONTROLLOG_BOT_VTR 
WHERE CON_DFECREG_BOT between '$FECHA1' and '$FECHA2' and CON_CESTADO_BOT='Activo' group by CON_CESTADO_BOT,CON_DFECREG_BOT";

$stmt = sqlsrv_query($conn, $sqlserver);

  $fila = 2;

	$objPHPExcel = new PHPExcel ();
	$objPHPExcel->getProperties ()->setCreator("Descargue_General_Uso_BOT")->setDescription("Descargue_General_Uso_BOT");
	$objPHPExcel->setActiveSheetIndex (0);

		$objPHPExcel->getActiveSheet ()->setTitle ("Descargue_General_Uso_BOT");       
		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'ESTADO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('B1', 'FECHA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('C1', 'TOTAL CONECTADOS');
		$objPHPExcel->getActiveSheet () -> setCellValue ('A2', print_r(sqlsrv_errors(),true));
			
			

		while($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

			$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $row['CON_CESTADO_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('B'.$fila, $row['CON_DFECREG_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('C'.$fila, $row['usuarios']);


			
            

		$fila++;

		}
		
			// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Informe_General_USO.xlsx"');
		$objWriter->save('php://output');







}?>