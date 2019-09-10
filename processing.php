<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$number_request = $_POST['number'];
	if($number_request < 0)
		header('Location:index.html');

	$number = $number_request;

	require_once('Packages/tcpdf_include.php');
	require_once('tcpdf.php');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Omar Falih');
	$pdf->SetTitle('Test QrCode');
	$pdf->SetSubject('Print QrCode');

	$pdf->setPrintHeader(false);

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	if (@file_exists(dirname(__FILE__).'/Packages/lang/eng.php')) {
		require_once(dirname(__FILE__).'/Packages/lang/eng.php');
		$pdf->setLanguageArray($l);
	}//End IF

	$style = array(
		'border' => 0,
		'vpadding' => 4,
		'hpadding' => 10,
		'fgcolor' => array(0,0,0),
		'bgcolor' => false, //array(255,255,255)
		'module_width' => 1, // width of a single module in points
		'module_height' => 1 // height of a single module in points
	);


	

	$page = intdiv($number , 30);

	$division = (int)($number % 30);

	//Print Full Page QrCode
	if($page >0)
	for($k=0;$k<$page;$k++)
	{
		$x = 13;
		$y=10;
		$hieght = 40;
		$with = 40;
		$pdf->AddPage();
		$pdf->SetFont('helvetica', '', 10);
		for($i=0;$i<6; $i++){
			// add a page
			for ($j=0; $j < 5 ; $j++)
			{	
				$pdf->write2DBarcode('Test QrCode 2019-09-10', 'QRCODE,H', $x, $y, $hieght,$with, $style, 'N');	
				$x += 35;	
			}	
			$x = 13;	
			$y+=43;
		}//End For		
	}//End For

	
	if($division > 0)
	{
		$row = intdiv($division,5);
		$cell = (int)($division % 5) ;

		//Print Row QrCode 
		if($row > 0)
		{
			$x = 13;
			$y=10;
			$hieght = 40;
			$with = 40;
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			for( $i=0; $i<$row ; $i++ ){
				// add a page
				for ($j=0; $j < 5 ; $j++)
				{	
					$pdf->write2DBarcode('Test QrCode 2019-09-10', 'QRCODE,H', $x, $y, $hieght,$with, $style, 'N');	
					$x += 35;	
				}	
				$x = 13;	
				$y+=43;
			}		
		}

		//Print Cell QrCode 
		if($cell > 0 )
		{
			if(isset($x))
			{
				for ($j=0; $j < $cell ; $j++)
				{	
					$pdf->write2DBarcode('Test QrCode 2019-09-10', 'QRCODE,H', $x, $y, $hieght,$with, $style, 'N');	
					$x += 35;	
				}	
			}else{
				$x = 13;
				$y=10;
				$hieght = 40;
				$with = 40;
				$pdf->AddPage();
				$pdf->SetFont('helvetica', '', 10);
				for ($j=0; $j < $cell ; $j++)
				{	
					$pdf->write2DBarcode('Test QrCode 2019-09-10', 'QRCODE,H', $x, $y, $hieght,$with, $style, 'N');	
					$x += 35;	
				}//End For 	
			}//End IF
		}//End IF		
	}//End IF 

	$pdf->Output('Print QrCode.pdf', 'I');
}else{
	header('Location:index.html');
}//End IF







