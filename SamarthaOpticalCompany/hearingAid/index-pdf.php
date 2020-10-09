<?Php
if(!file_exists('libs/fpdf.php')){
echo " Place fpdf.php file in this directory before using this page. ";
exit;	
}

if(!file_exists('libs/font')){
echo " Place font directory in this directory before using this page. ";
exit;	
}
require "config.php"; // connection to database 

require('libs/fpdf.php');

$pdf = new FPDF(); 
$pdf->AddPage();
$id=$_GET['id'];  // collect student id from URL 
if(!is_numeric($id)){
exit;
}

if($stmt = $mysqli->prepare("select * from users where id=?")){ 

$stmt->bind_param('i',$id);
$stmt->execute();
$result = $stmt->get_result();
$row=$result->fetch_object();

$pdf->Image('1.png',55,10);
$pdf->SetFont('Arial','BU',20);
$pdf->SetXY(90,70);
$pdf->Cell(30,10,'SAMARTHA OPTICAL COMPANY',0,0,'C',false); // First header column 
$pdf->SetY(80);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'CUSTOMER NAME:',1,0,'L',false);  
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->name,1,1,'C',false);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'AGE:',1,0,'L',false);  
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->age,1,1,'C',false);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'GENDER:',1,0,'L',false);  
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->gender,1,1,'C',false);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'BIRTH DATE:',1,0,'L',false);  
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->birthdate,1,1,'C',false);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'ADDRESS:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->address,1,1,'C',false); 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'CONTACT NO.:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->contact,1,1,'C',false); 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'MODEL TYPE / NO.:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->model,1,1,'C',false); 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'VISITING DATE:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->visitingdate,1,1,'C',false); 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'EXPIRY DATE:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->expdate,1,1,'C',false); 


$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,10,'MRP:',1,0,'L',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,10,$row->mrp,1,1,'C',false); 

$pdf->SetXY(20,170);
//$pdf->Line(120,100,190,100);
/*
//Right
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'R_SPH',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'R_CYL',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'R_AXIS',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'R_V/N',1,0,'L',false); 
//Left
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'L_SPH',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'L_CYL',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'L_AXIS',1,0,'L',false); 
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,'L_V/N',1,0,'L',false);

$pdf->SetXY(20,180);

$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_sph1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_cyl1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_axis1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_vn1,1,0,'C',false); 

$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_sph1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_cyl1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_axis1,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_vn1,1,0,'C',false); 

$pdf->SetXY(20,190);

$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_sph2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_cyl2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_axis2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->right_vn2,1,0,'C',false); 

$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_sph2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_cyl2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_axis2,1,0,'C',false); 
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,$row->left_vn2,1,0,'C',false); 
*/

$pdf->SetXY(140,250);
$pdf->Cell(50,10,'Signature',0,1,'L',false);
$pdf->Output();
}else{
//echo $connection->error;	
}	
?>