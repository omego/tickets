<?php
 require_once('fpdf/fpdf.php');
 require_once('fpdi/fpdi.php');
 
 include 'connect.php';
 
 //
 
 $member_id = $_GET['id'];
 
 $member_id_tickets = mysql_query("select * from tickets_entry where id = $member_id");
 
 //
 
 $row1 = mysql_fetch_array($member_id_tickets); 
 
 
 
  $Engineer_ID = $row1['Engineer_ID'];
 
 //echo $Engineer_ID;
$eng_badge = mysql_query("select Badge from users where Real_Name = '". $row1['Engineer_Name'] ."'");

$row2 = mysql_fetch_array($eng_badge); 

$Engineer_IDLIST = $row2['Badge'];
 
 //echo $Engineer_IDLIST;


 //
 $Report_No = $row1['Report_No'];
 $Ticket_Create_Date = $row1['Ticket_Create_Date'];
 $Ticket_Create_Time = $row1['Ticket_Create_Time'];
 //$Ticket_title = $row1['Ticket_title'];
 $Location_Building = $row1['Location_Building'];
 $Location_Room_No = $row1['Location_Room_No'];
 $Location_Floor = $row1['Location_Floor'];
 $Service_Description = $row1['Service_Description'];
 $Engineer_Name = $row1['Engineer_Name'];
 //$Ticket_Category = $row1['Ticket_Category'];

 
 // initiate FPDI  
 $pdf = new FPDI();  
 // add a page
 $pdf->AddPage();  
 // set the sourcefile  
 $pdf->setSourceFile('temp.pdf');  
 // import page 1  
 $tplIdx = $pdf->importPage(1);  
 // use the imported page and place it at point 10,10 with a width of 200 mm   (This is    the image of the included pdf)
 $pdf->useTemplate($tplIdx, 5, 5, 200);  
 // now write some text above the imported page
 $pdf->SetTextColor(0,0,0);

//

 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(114, 90); 
 $pdf->Write(0, $Ticket_title);  

 $pdf->SetFont('Arial','',10);  
 $pdf->SetXY(44, 67.5);  
 $pdf->Write(0, $Report_No);
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(88, 67.5); 
 $pdf->Write(0, $Ticket_Create_Date); 
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(140, 67.5); 
 $pdf->Write(0, $Ticket_Create_Time); 
 
 //
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(42, 79); 
 $pdf->Write(0, $Location_Building);  
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(94, 79); 
 $pdf->Write(0, $Location_Room_No);
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(140, 79); 
 $pdf->Write(0, $Location_Floor);
 
 //
 

 $pdf->SetFont('Arial','',10);
$pdf->SetXY(30,86.5); 
$pdf->MultiCell(152, 5, $Service_Description, 0, 'L'); 
 

 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(53, 125.5); 
 $pdf->Write(0, $Engineer_Name);
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(135, 125.5); 
 $pdf->Write(0, $Engineer_IDLIST);
 
 $pdf->SetFont('Arial','',10);
 $pdf->SetXY(66, 125.5); 
 $pdf->Write(0, $Ticket_Category);
 
 $pdf->Output('1.pdf', 'I');
?>