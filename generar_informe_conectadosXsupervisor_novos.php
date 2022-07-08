<?php

require('Conexion.php');
// require('../actions/encript.php');
require ('PHPExcel.php');
//echo "<script>console.log('Ingreso');</script>";

$FECHA1 =  date('Y/m/d',strtotime($_POST['fecha-inicio-supervisor'])) ;
$FECHA2 = date('Y/m/d',strtotime($_POST['fecha-fin-supervisor'])) ;


if(isset($_POST['buttom-supervisor'])){

/* $params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$myparams['fecha_inicio'] = $FECHA1;
$myparams['fecha_fin'] = $FECHA2; 

 $procedure_params = array(
 array(&$myparams['fecha_inicio'], SQLSRV_PARAM_IN),
 array(&$myparams['fecha_fin'], SQLSRV_PARAM_IN)
);  */
 

$sqlserver ="SELECT 
[CON_NID_CONBOT]
,[CON_CESTADO_BOT]
,[CON_CIPPC_BOT]
,[CON_CNOMPC_BOT]
,[CON_CSECPC_BOT]
,[REG_CNOMBRE_ASESOR]
,[REG_CJEFE_INMEDIATO]
,[CON_DFECREG_BOT]
,[CON_CHORREG_BOT]
,[CON_DFECACT_BOT]
,[CON_CHORACT_BOT]
,[REG_DETALLE_2]
,[CON_CDETALLES]
,[CON_CDETALLE0]
,[CON_CDETALLE1]
,[CON_CDETALLE2]
,[CON_CDETALLE3]
,[CON_CDETALLE4]
FROM TBL_ACONTROLLOG_BOT_VTR 
join TBL_AREG_ASESOR_VTR on REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CDETALLE1, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CCEDULA_ASESOR, char(13), ''), char(10), '')
where REG_DETALLE_2='NO VOZ' AND CON_DFECREG_BOT
between '$FECHA1' and '$FECHA2' order by CON_DFECREG_BOT";


$stmt = sqlsrv_query($conn, $sqlserver);

  $fila = 2;

	$objPHPExcel = new PHPExcel ();
	$objPHPExcel->getProperties ()->setCreator("Descargue_X_SUPERVISOR_No_Voz")->setDescription("Descargue_X_SUPERVISOR_No_Voz");
	$objPHPExcel->setActiveSheetIndex (0);

		$objPHPExcel->getActiveSheet ()->setTitle ("Descargue_X_SUPERVISOR_No_Voz");       
		/* 		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'ESTADO');
 */		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'CEDULA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('B1', 'NOMBRE');
		$objPHPExcel->getActiveSheet () -> setCellValue ('C1', 'USUARIO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('D1', 'IP');
		$objPHPExcel->getActiveSheet () -> setCellValue ('E1', 'POSICION');
		$objPHPExcel->getActiveSheet () -> setCellValue ('F1', 'SUPERVISOR');
		$objPHPExcel->getActiveSheet () -> setCellValue ('G1', 'FECHA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('H1', 'HORA LOGIN');
		$objPHPExcel->getActiveSheet () -> setCellValue ('I1', 'HORA LOGOUT');
		$objPHPExcel->getActiveSheet () -> setCellValue ('J1', 'SEGMENTO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('A2', print_r(sqlsrv_errors(),true));
			
			

		while($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

/* 			$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $row['CON_CESTADO_BOT']);
 */			$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $row['CON_CDETALLE1']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('B'.$fila, $row['CON_CDETALLE2']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('C'.$fila, $row['CON_CSECPC_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('D'.$fila, $row['CON_CIPPC_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('E'.$fila, $row['CON_CNOMPC_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('F'.$fila, $row['REG_CJEFE_INMEDIATO']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('G'.$fila, $row['CON_DFECREG_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('H'.$fila, $row['CON_CHORACT_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('I'.$fila, $row['CON_CHORREG_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('J'.$fila, $row['REG_DETALLE_2']);


			
            

		$fila++;

		}
		
			// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Informe_X_SUPERVISOR_No Voz.xlsx"');
		$objWriter->save('php://output');


		




}?>