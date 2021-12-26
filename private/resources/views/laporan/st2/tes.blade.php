@include('html.print')
<?php 
$phpWord = new \PhpOffice\PhpWord\PhpWord();



			$phpWord->setDefaultParagraphStyle(
				array(
					'alignment'  => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
					'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(12),
					'spacing'    => 120,
				)
			);

			$phpWord->setDefaultFontSize(12);
			$phpWord->setDefaultFontName('Times New Roman');

			// New section
			$section = $phpWord->addSection();
			
			$section->addText( $title, array('bold' => true, 'size' => '14'), null);
			
			foreach($tbtatapamongs as $value) {
			
			$section->addText('Tata Pamong', array('bold' => true), null);
			
			$section->addText(strip_tags($value->tataPamong), null, array('indentation' => array('firstLine' => 560)));
			
			$section->addText('Kepemimpinan', array('bold' => true), null);
			$section->addText(strip_tags($value->kepemimpinan), null, array('indentation' => array('firstLine' => 560)));
			
			$section->addText('Sistem Pengelolaan', array('bold' => true), null);
			$section->addText(strip_tags($value->sistemPengelolaan), null, array('indentation' => array('firstLine' => 560)));
			
			$section->addText('Penjaminan Mutu', array('bold' => true), null);
			$section->addText(strip_tags($value->penjaminanMutu), null, array('indentation' => array('firstLine' => 560)));
			
			}
		
			
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('laporan/'.$filename.'.docx');
			
?>

<body onload="window.location.replace('laporan/<?php echo $filename ?>.docx');">

</body>			


