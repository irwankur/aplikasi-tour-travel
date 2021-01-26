<?php 
			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			$pdf->SetTitle('Data Penumpang '.$data['tujuan'] .' - '.$data['paket']);
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',16);
			// mencetak string 
			$pdf->Cell(190,7,'DATA PENUMPANG',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,7,$data['tujuan'] .' - '.$data['paket'],0,1,'C');

			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);

			$pdf->SetFont('Arial','B',8,'C');
			$pdf->Cell(8,6,'NO.',1,0,'C');
			$pdf->Cell(40,6,'NAMA',1,0,'C');
			$pdf->Cell(25,6,'JUMLAH TIKET',1,0,'C');
			$pdf->Cell(33,6,'NO. HANDPHONE',1,0,'C');
			$pdf->Cell(50,6,'EMAIL',1,0,'C');
			$pdf->Cell(33,6,'KETERANGAN',1,1,'C');


		if(isset($query[0]->tujuan)){
			$tujuan = ucwords($query[0]->tujuan);
			$paket = $query[0]->paket;
			// intance object dan memberikan pengaturan halaman PDF
			
			$pdf->SetFont('Arial','',9);
			$no = 1;
			$total = 0;
			foreach($query as $row){
				$total += $row->jumlah_penumpang;
			    $pdf->Cell(8,6,$no++.'.',1,0,'C');
			    $pdf->Cell(40,6,$row->nama,1,0,'C');
			    $pdf->Cell(25,6,$row->jumlah_penumpang,1,0,'C');
			    $pdf->Cell(33,6,$row->no_handphone,1,0,'C');
			    $pdf->Cell(50,6,$row->email,1,0,'C');  
			    $pdf->Cell(33,6,'',1,1,'C');
			    // $pdf->Cell(10,6,$row->email,1,1);
			}
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(33,6,'Total Penumpang',0,0);
			$pdf->Cell(25,6,': '.$total,0,1);
			$pdf->Output();
		} else {
			$pdf->SetFont('Arial','',9);
			$no = 1;
			    $pdf->Cell(8,6,$no++.'.',1,0);
			    $pdf->Cell(40,6,'',1,0);
			    $pdf->Cell(25,6,'',1,0);
			    $pdf->Cell(33,6,'',1,0);
			    $pdf->Cell(50,6,'',1,0);  
			    $pdf->Cell(33,6,'',1,1);
			    // $pdf->Cell(10,6,$row->email,1,1);
			$pdf->Output();
		}
		

 ?>
