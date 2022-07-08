<?php

require('Conexion.php');
// require('../actions/encript.php');
require ('PHPExcel.php');
//echo "<script>console.log('Ingreso');</script>";

$FECHA1 =  date('Y/m/d',strtotime($_POST['fecha-inicio-llamadas'])) ;
$FECHA2 = date('Y/m/d',strtotime($_POST['fecha-fin-llamadas'])) ;


if(isset($_POST['buttom-llamadas'])){

$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$myparams['fecha_inicio'] = $FECHA1;
$myparams['fecha_fin'] = $FECHA2; 

 $procedure_params = array(
 array(&$myparams['fecha_inicio'], SQLSRV_PARAM_IN),
 array(&$myparams['fecha_fin'], SQLSRV_PARAM_IN)
); 
 

/* $sqlserver ="SPR_LLAMADAS_PASOS '".$FECHA1."','".$FECHA2."'"; */

/*$sqlserver ="SELECT
REG_NID_LABOR,CON_NID_CONBOT,REG_CUSUARIO_LABOR,TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO, REG_CRUT_LABOR,REG_CPASO0_LABOR,REG_DFEC_PASO0_BOT,REG_CHOR_PASO0_BOT,REG_COBSERVACION_PASO0,REG_CPASO1_LABOR,REG_DFEC_PASO1_BOT
,REG_CHOR_PASO1_BOT,REG_COBSERVACION_PASO1,REG_CPASO2_LABOR,REG_DFEC_PASO2_BOT,REG_CHOR_PASO2_BOT,REG_COBSERVACION_PASO2,REG_CPASO3_LABOR,REG_DFEC_PASO3_BOT
,REG_CHOR_PASO3_BOT,REG_COBSERVACION_PASO3,REG_CPASO4_LABOR,REG_DFEC_PASO4_BOT,REG_CHOR_PASO4_BOT,REG_COBSERVACION_PASO4,REG_CPASO5_LABOR,REG_DFEC_PASO5_BOT
,REG_CHOR_PASO5_BOT,REG_COBSERVACION_PASO5,REG_CPASO6_LABOR,REG_DFEC_PASO6_BOT,REG_CHOR_PASO6_BOT,REG_COBSERVACION_PASO6
,REG_CPASO7_LABOR,REG_DFEC_PASO7_BOT,REG_CHOR_PASO7_BOT,REG_COBSERVACION_PASO7,REG_CDETALLE0,REG_CDETALLE1,REG_CDETALLE2,REG_CDETALLE3,REG_CDETALLE4
FROM TBL_AREGACTIVIDAD_BOT_VTR
JOIN TBL_AREG_ASESOR_VTR ON TBL_AREGACTIVIDAD_BOT_VTR.REG_CUSUARIO_LABOR = TBL_AREG_ASESOR_VTR.REG_DETALLE_1 
WHERE (REG_DFEC_PASO0_BOT between '$FECHA1' and '$FECHA2')
order by REG_DFEC_PASO0_BOT" ;*/

$sqlserver ="SELECT * from TBL_AREGACTIVIDAD_BOT_VTR WHERE (REG_DFEC_PASO0_BOT between '".$FECHA1."' AND '".$FECHA2."')";

$stmt = sqlsrv_query($conn, $sqlserver);

  $fila = 2;

	$objPHPExcel = new PHPExcel ();
	$objPHPExcel->getProperties ()->setCreator("Descargue_Rut_Consultados")->setDescription("Descargue_Rut_Consultados");
	$objPHPExcel->setActiveSheetIndex (0);

		$objPHPExcel->getActiveSheet ()->setTitle ("Descargue_Rut_Consultados");       
		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'USUARIO ANDES');
		$objPHPExcel->getActiveSheet () -> setCellValue ('B1', 'SUPERVISOR');
		$objPHPExcel->getActiveSheet () -> setCellValue ('C1', 'RUT');
		$objPHPExcel->getActiveSheet () -> setCellValue ('D1', 'FECHA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('E1', 'HORA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('F1', 'RESULTADO PASO 0');
		$objPHPExcel->getActiveSheet () -> setCellValue ('G1', 'RESULTADO PASO 1');
		$objPHPExcel->getActiveSheet () -> setCellValue ('H1', 'RESULTADO PASO 2');
		$objPHPExcel->getActiveSheet () -> setCellValue ('I1', 'RESULTADO PASO 3');
		$objPHPExcel->getActiveSheet () -> setCellValue ('J1', 'RESULTADO PASO 4');
		$objPHPExcel->getActiveSheet () -> setCellValue ('K1', 'RESULTADO PASO 5');
		$objPHPExcel->getActiveSheet () -> setCellValue ('L1', 'RESULTADO PASO 6');
		$objPHPExcel->getActiveSheet () -> setCellValue ('M1', 'RESULTADO PASO 7');
		$objPHPExcel->getActiveSheet () -> setCellValue ('N1', 'PASO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('O1', 'SEGMENTO'); 
		$objPHPExcel->getActiveSheet () -> setCellValue ('A2', print_r(sqlsrv_errors(),true));
			
			

		while($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

			$REG_CJEFE_INMEDIATO = "";
			$REG_CUSUARIO_LABOR = $row['REG_CUSUARIO_LABOR'];
			$sqlserver_2 = "SELECT * FROM TBL_AREG_ASESOR_VTR WHERE REPLACE(REPLACE(REG_DETALLE_1, char(13), ''), char(10), '') = REPLACE(REPLACE('$REG_CUSUARIO_LABOR', char(13), ''), char(10), '')";
			$stmt_2 = sqlsrv_query($conn, $sqlserver_2);
			while($row_2=sqlsrv_fetch_array($stmt_2, SQLSRV_FETCH_ASSOC)){
				$REG_CJEFE_INMEDIATO = $row_2['REG_CJEFE_INMEDIATO'];
			}

			$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $REG_CUSUARIO_LABOR);
			$objPHPExcel->getActiveSheet () -> setCellValue ('B'.$fila, $REG_CJEFE_INMEDIATO);
			$objPHPExcel->getActiveSheet () -> setCellValue ('C'.$fila, $row['REG_CRUT_LABOR']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('D'.$fila, $row['REG_DFEC_PASO0_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('E'.$fila, $row['REG_CHOR_PASO0_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('F'.$fila, $row['REG_COBSERVACION_PASO0']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('G'.$fila, $row['REG_COBSERVACION_PASO1']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('H'.$fila, $row['REG_COBSERVACION_PASO2']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('I'.$fila, $row['REG_COBSERVACION_PASO3']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('J'.$fila, $row['REG_COBSERVACION_PASO4']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('K'.$fila, $row['REG_COBSERVACION_PASO5']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('L'.$fila, $row['REG_COBSERVACION_PASO6']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('M'.$fila, $row['REG_COBSERVACION_PASO7']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('N'.$fila, $row['REG_CDETALLE0']);
		 	$objPHPExcel->getActiveSheet () -> setCellValue ('O'.$fila, $row['REG_CDETALLE1']); 


			
            

		$fila++;

		}
		
			// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Informe_Rut_Consultados.xlsx"');
		$objWriter->save('php://output');







}?>