<?php

require('Conexion.php');
// require('../actions/encript.php');
require ('PHPExcel.php');
//echo "<script>console.log('Ingreso');</script>";

$FECHA1 =  date('Y/m/d',strtotime($_POST['fecha-inicio-conectados'])) ;
$FECHA2 = date('Y/m/d',strtotime($_POST['fecha-fin-conectados'])) ;

echo "<script>console.log('FECHA1: ".$FECHA1."');</script>";

if(isset($_POST['buttom-conectados'])){

$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$myparams['fecha_inicio'] = $FECHA1;
$myparams['fecha_fin'] = $FECHA2; 

 $procedure_params = array(
 array(&$myparams['fecha_inicio'], SQLSRV_PARAM_IN),
 array(&$myparams['fecha_fin'], SQLSRV_PARAM_IN)
); 
 

/* $sqlserver ="SPR_CONECTADOS '".$FECHA1."','".$FECHA2."'"; */

$sqlserver ="SELECT 
[CON_NID_CONBOT]
,[CON_CESTADO_BOT]
,[CON_CIPPC_BOT]
,[CON_CNOMPC_BOT]
/* ,[REG_CJEFE_INMEDIATO] */
,[CON_CSECPC_BOT]
,[CON_DFECREG_BOT]
,[CON_CHORREG_BOT]
,[CON_DFECACT_BOT]
,[CON_CHORACT_BOT]
/* ,[REG_DETALLE_2] */
,[CON_CDETALLES]
,[CON_CDETALLE0]
,[CON_CDETALLE1]
,[CON_CDETALLE2]
,[CON_CDETALLE3]
,[CON_CDETALLE4]
FROM TBL_ACONTROLLOG_BOT_VTR
/* join TBL_AREG_ASESOR_VTR on REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CDETALLE1, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CCEDULA_ASESOR, char(13), ''), char(10), '')
 */ where /* REG_DETALLE_2='VOZ' and  */( CON_DFECACT_BOT
between '$FECHA1' and '$FECHA2') and (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') 
order by CON_DFECREG_BOT asc";

/* $sqlserver="SELECT * FROM TBL_ACONTROLLOG_BOT_VTR  where CON_DFECREG_BOT
between '$FECHA1' and '$FECHA2' and (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') 
order by CON_DFECREG_BOT asc"; */

$stmt = sqlsrv_query($conn, $sqlserver);

  $fila = 2;

	$objPHPExcel = new PHPExcel ();
	$objPHPExcel->getProperties ()->setCreator("Descargue_Conectados")->setDescription("Descargue_Conectados");
	$objPHPExcel->setActiveSheetIndex (0);

		$objPHPExcel->getActiveSheet ()->setTitle ("Descargue_Conectados");       
/* 		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'ESTADO'); */
		$objPHPExcel->getActiveSheet () -> setCellValue ('A1', 'CEDULA');
		$objPHPExcel->getActiveSheet () -> setCellValue ('B1', 'NOMBRE');
		$objPHPExcel->getActiveSheet () -> setCellValue ('C1', 'USUARIO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('D1', 'SUPERVISOR'); 
		$objPHPExcel->getActiveSheet () -> setCellValue ('E1', 'IP');
		$objPHPExcel->getActiveSheet () -> setCellValue ('F1', 'POSICION');
		$objPHPExcel->getActiveSheet () -> setCellValue ('G1', 'FECHA LOGIN');
		$objPHPExcel->getActiveSheet () -> setCellValue ('H1', 'HORA LOGIN');
		$objPHPExcel->getActiveSheet () -> setCellValue ('I1', 'FECHA LOGOUT');
		$objPHPExcel->getActiveSheet () -> setCellValue ('J1', 'HORA LOGOUT');
		$objPHPExcel->getActiveSheet () -> setCellValue ('K1', 'SEGMENTO');
		$objPHPExcel->getActiveSheet () -> setCellValue ('L1', 'VERSION BOT');
		$objPHPExcel->getActiveSheet () -> setCellValue ('A2', print_r(sqlsrv_errors(),true));
			
			

		while($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

			$REG_CJEFE_INMEDIATO = "";
			$CON_CDETALLE1 = $row['CON_CDETALLE1'];
			$sqlserver_2 = "SELECT * FROM TBL_AREG_ASESOR_VTR WHERE REPLACE(REPLACE(REG_CCEDULA_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE('$CON_CDETALLE1', char(13), ''), char(10), '') /* and REG_DETALLE_2='VOZ' */";
			$stmt_2 = sqlsrv_query($conn, $sqlserver_2);
			while($row_2=sqlsrv_fetch_array($stmt_2, SQLSRV_FETCH_ASSOC)){
				$REG_CJEFE_INMEDIATO = $row_2['REG_CJEFE_INMEDIATO'];
			} 

/* 		$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $row['CON_CESTADO_BOT']);
 */			
			$objPHPExcel->getActiveSheet () -> setCellValue ('A'.$fila, $row['CON_CDETALLE1']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('B'.$fila, $row['CON_CDETALLE2']);
 			$objPHPExcel->getActiveSheet () -> setCellValue ('C'.$fila, $row['CON_CSECPC_BOT']);
  			$objPHPExcel->getActiveSheet () -> setCellValue ('D'.$fila, $REG_CJEFE_INMEDIATO);
 			$objPHPExcel->getActiveSheet () -> setCellValue ('E'.$fila, $row['CON_CIPPC_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('F'.$fila, $row['CON_CNOMPC_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('G'.$fila, $row['CON_DFECACT_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('H'.$fila, $row['CON_CHORACT_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('I'.$fila, $row['CON_DFECREG_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('J'.$fila, $row['CON_CHORREG_BOT']);
			$objPHPExcel->getActiveSheet () -> setCellValue ('K'.$fila, $row['CON_CDETALLE0']);
 			$objPHPExcel->getActiveSheet () -> setCellValue ('L'.$fila, $row['CON_CDETALLES']);


			
            

		$fila++;

		}
		
			// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Informe_Conectados.xlsx"');
		$objWriter->save('php://output');







}?>