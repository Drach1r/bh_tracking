<?php
require('pdf/fpdf.php');


$conn = new mysqli('localhost', 'root', '', 'bh_tracking');

if ($conn->connect_error) {
  die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}
function getImagePath($bh_image)
{
  $imagePath = "resources/gallery/" . $bh_image;
  if (file_exists($imagePath)) {
    return $imagePath;
  } else {
    return null;
  }
}

$pageId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$select = $conn->prepare("SELECT bht.*, bha.barangay 
                        FROM boarding_house_tracking bht
                        INNER JOIN bh_address bha ON bht.bh_barangay = bha.id
                        WHERE bht.id = ?");
$select->bind_param("i", $pageId);
$select->execute();
$result = $select->get_result();

$pdf = new FPDF('P', 'mm', 'legal');
$pdf->AddPage();

while ($row = $result->fetch_object()) {
  $id = $row->id;
  $account_number = $row->account_number;
  $establishment_name = $row->establishment_name;
  $first_name = $row->first_name;
  $middle_name = $row->middle_name;
  $last_name = $row->last_name;
  $suffix = $row->suffix;
  $bh_address = $row->bh_address;
  $bh_municipality = $row->bh_municipality;
  $bh_district = $row->bh_district;
  $bh_barangay_name = $row->barangay;
  $bh_province = $row->bh_province;
  $bh_control_no = $row->bh_control_no;
  $bh_or_num = $row->bh_or_num;
  $date_issued = $row->date_issued;
  $amount_paid = $row->amount_paid;
  $bh_bpn = $row->bh_bpn;
  $bh_mp = $row->bh_mp;
  $date_paid = $row->date_paid;
  $bh_period_cover = $row->bh_period_cover;
  $bh_complaint = $row->bh_complaint;
  $bh_construction_kind = $row->bh_construction_kind;
  $bh_specify = $row->bh_specify;
  $bh_class = $row->bh_class;
  $bh_room = $row->bh_room;
  $bh_occupants = $row->bh_occupants;
  $bh_overcrowded = $row->bh_overcrowded;
  $bh_rates_charge = $row->bh_rates_charge;
  $bh_ratescharge_other = $row->bh_ratescharge_other;
  $bh_rate = $row->bh_rate;
  $bh_water_source = $row->bh_water_source;
  $bh_nawasa = $row->bh_nawasa;
  $bh_deepwell = $row->bh_deepwell;
  $bh_adequate = $row->bh_adequate;
  $bh_portable = $row->bh_portable;
  $bh_toilet_type = $row->bh_toilet_type;
  $bh_toilet_cond = $row->bh_toilet_cond;
  $bh_bath_type = $row->bh_bath_type;
  $bh_bath_cond = $row->bh_bath_cond;
  $bh_cr_num = $row->bh_cr_num;
  $bh_bathroom_num = $row->bh_bathroom_num;
  $bh_premises_cond = $row->bh_premises_cond;
  $bh_garbage_disposal = $row->bh_garbage_disposal;
  $bh_garbage_other = $row->bh_garbage_other;
  $bh_dps = $row->bh_dps;
  $bh_sewage_disposal = $row->bh_sewage_disposal;
  $bh_sewage_other = $row->bh_sewage_other;
  $bh_sd_dps = $row->bh_sd_dps;
  $bh_rodent_disposal = $row->bh_rodent_disposal;
  $bh_rodent_other = $row->bh_rodent_other;
  $light_ventilation = $row->light_ventilation;
  $natural_artificial = $row->natural_artificial;
  $establishment_extension = $row->establishment_extension;
  $specify_txt = $row->specify_txt;
  $with_permit = $row->with_permit;
  $bh_remarks = $row->bh_remarks;
  $office_required = $row->office_required;
  $inspected_by = $row->inspected_by;
  $acknowledge_by = $row->acknowledge_by;
  $current_loc = $row->current_loc;
  $bh_latitude = $row->bh_latitude;
  $bh_longitude = $row->bh_longitude;
  $bh_altitude = $row->bh_altitude;
  $bh_precision = $row->bh_precision;
  $bh_permit_control = $row->bh_permit_control;
  $bh_class_rates = $row->bh_class_rates;
  $bh_facilities = $row->bh_facilities;
  $bh_id = $row->bh_id;
  $bh_uuid = $row->bh_uuid;
  $submission_time = $row->submission_time;
  $bh_valid_status = $row->bh_valid_status;
  $bh_notes = $row->bh_notes;
  $bh_status = $row->bh_status;
  $submitted_by = $row->submitted_by;
  $bh_version = $row->bh_version;
  $bh_tags = $row->bh_tags;
  $bh_image = $row->bh_image;
  $imagePath = getImagePath($bh_image);
}


$pdf->Image('resources/img/iloilo.png', 15, 7, 30, 30, 'PNG');
$pdf->Image('resources/img/boarding.jpg', 160, 7, 43, 30, 'JPG');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(60);
$pdf->Cell(70, 5, 'Republic of the Philippines', 0, 0, 'C');
$pdf->Cell(-70, 15, 'City of Iloilo', 0, 0, 'C');
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(70, 25, 'OFFICE OF THE CITY MAYOR', 0, 0, 'C');
$pdf->Cell(-70, 35, 'BOARDING HOUSE COMMISSION', 0, 0, 'C');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(70, 45, 'Tel. No. 333-11-11, Local 508', 0, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, -10, '', 0);
$pdf->Ln();

$pdf->Cell(150);
$pdf->Cell(50, 5, 'Date:_________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(200, 5, 'Name of Establishment:_______________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Name of Owner/Manager:_____________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Address:___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(60, 5, 'BH Control No:___________________', 0);
$pdf->Cell(40, 5, 'OR No:_______________', 0);
$pdf->Cell(50, 5, 'Date Issued:_______________', 0);
$pdf->Cell(50, 5, 'Amount:______________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(60, 5, 'Bus. Permit No.:___________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(60, 5, 'RATES BEING CHARGE:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 10, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'KIND OF CONSTRUCTION OF THE BOARDING HOUSE:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____A. Made of Strong Materials', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____B. Made of Light Materials', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____C. Other (Pls. Specify:__________________________________________________________________________)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(70, 10, 'CLASS OF THE BOARDING HOUSE:', 0);
$pdf->Cell(30, 10, 'A: (___)', 0);
$pdf->Cell(30, 10, 'B: (___)', 0);
$pdf->Cell(30, 10, 'C: (___)', 0);
$pdf->Cell(30, 10, 'D: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'No. Of Rooms:__________', 0);
$pdf->Cell(50, 5, 'No. Of Occupants:________', 0);
$pdf->Cell(25, 5, 'Overcrowded: ', 0);
$pdf->Cell(20, 5, 'YES: (___)', 0);
$pdf->Cell(20, 5, 'NO: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'Lodging:_______________', 0);
$pdf->Cell(50, 5, 'Board:__________________', 0);
$pdf->Cell(25, 5, 'Bedspace:_______________________________ ', 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'Room Rent:_______________', 0);
$pdf->Cell(50, 5, 'House Rent:__________________', 0);
$pdf->Cell(25, 5, 'Rent per Unit(Apartment):__________________ ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(80, 10, 'SOURCE OF WATER SUPPLY:_______________', 0);
$pdf->Cell(32, 10, 'Adequate: YES(___)', 0);
$pdf->Cell(20, 10, 'NO: (___)', 0);
$pdf->Cell(30, 10, 'Portable: YES(___)', 0);
$pdf->Cell(30, 10, 'NO: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'TOILET FACILITIES:', 0);
$pdf->Cell(50, 5, 'Type:__________________', 0);
$pdf->Cell(25, 5, 'Sanitary Condition:________________________ ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'BATH FACILITIES:', 0);
$pdf->Cell(50, 5, 'Type:__________________', 0);
$pdf->Cell(25, 5, 'Sanitary Condition:________________________ ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '', 0);
$pdf->Cell(50, 5, 'Total No. Of CR:_________', 0);
$pdf->Cell(25, 5, 'Total No. of Bathroom:_____________________ ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(80, 10, 'SANITARY CONDITION OF THE PREMISES:', 0);
$pdf->Cell(30, 10, 'Good: (___)', 0);
$pdf->Cell(30, 10, 'Fair: (___)', 0);
$pdf->Cell(30, 10, 'Poor: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '1. Type of Garbage Disposal:______________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '2. Type of Sewage Disposal:______________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '3. Type of Rodent/Vermin Control:_________________________________________________________________________', 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(80, 10, 'LIGHTING AND VENTILATION:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '1. Natural: (___)', 0);
$pdf->Cell(50, 5, 'Satisfactory: (___)', 0);
$pdf->Cell(50, 5, 'Unsatisfactory: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '2. Artificial: (___)', 0);
$pdf->Cell(50, 5, 'Satisfactory: (___)', 0);
$pdf->Cell(50, 5, 'Unsatisfactory: (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(150, 10, 'IS THERE ANY EXTENSION OR ADDITIONAL CONSTRUCTION IN THE ESTABLISHMENT?', 0);
$pdf->Cell(20, 10, 'Yes (___)', 0);
$pdf->Cell(20, 10, 'No (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(120, 10, 'Specify if YES:__________________________________________________', 0);
$pdf->Cell(30, 10, 'With Permit (___)', 0);
$pdf->Cell(30, 10, 'Without Permit (___)', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(80, 10, 'REMARKS AND RECOMMENDATION:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(190, 5, '1.___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(190, 5, '2.___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(190, 5, '3.___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(190, 5, '4.___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(190, 5, '5.___________________________________________________________________________________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 10, '', 0);
$pdf->Ln();

$pdf->Cell(90);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(200, 5, 'N O T I C E', 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(200, 5, 'You are hereby requested to appear before this office on__________________________ at __________________________. Failure ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'to do so will compel this commission to file necessary action against your business establishment.', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 10, '', 0);
$pdf->Ln();

$pdf->Cell(120);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(50, 5, 'Inspected by:', 0);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(139, 5, 'Acknowledge by:', 0);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(139, 5, '___________________________', 0);
$pdf->Cell(50, 5, '____________________________', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(150, 5, 'Signature over Printed Name', 0, '');
$pdf->Cell(55, 5, 'Team Leader', 0, 'C');
$pdf->Ln();

$pdf->Output();
