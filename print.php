<?php
require('pdf/fpdf.php');


$conn = new mysqli('localhost', 'root', '', 'bh_tracking');

if ($conn->connect_error) {
  die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}


$pageId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$select = $conn->prepare("SELECT * FROM boarding_house_tracking WHERE id = ?");
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
  $bh_barangay = $row->bh_barangay;
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
  $bh_dps = $row->bh_dps;
  $bh_sewage_disposal = $row->bh_sewage_disposal;
  $bh_sd_dps = $row->bh_sd_dps;
  $bh_rodent_disposal = $row->bh_rodent_disposal;
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
  $bh_image = $row->bh_image;
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

}



$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(1);
$pdf->Cell(130, 5, '', 0, 0, 'C');
$pdf->Cell(-65, 15, 'Boarding House Tracking Information Management Application', 0, 0, 'C');
$pdf->Ln();




$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Account Number: ' . $account_number, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Establishment Name: ' . $establishment_name, 1);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(62, 5, '', 0, 0, 'C');
$pdf->Cell(-90, 15, 'Name of Owner/Manager', 0, 0, 'C');
$pdf->Ln();




$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'First Name: ' . $first_name, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Middle Name: ' . $middle_name, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Last Name: ' . $last_name, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Suffix: ' . $suffix, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Address: ' . $bh_address, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'City/Municipality: ' . $bh_municipality, 1);
$pdf->Ln();

$pdf->Rect(11, 80, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'District: ' . $bh_district, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 60;
$rect3_x = 100;
$rect4_x = 140;
$rect_y = 86;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Arevalo', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 5, 'City Proper', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-140, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Jaro', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-100, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Lapaz', 0, 0);
$pdf->Ln();

$checkmark = '';
if ($bh_district == 'Arevalo' || $bh_district == 'City Proper' || $bh_district == 'Jaro' || $bh_district == 'Lapaz')  {
  $checkmark = "\x34";
} else {

  $bh_district = '';
  $checkmark = "\x34";
}



$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_district == 'Arevalo') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_district == 'City Proper') {
  $pdf->Text($rect2_x + 0.5, $rect_y + 2.5, $checkmark);
}
elseif ($bh_district == 'Jaro') {
  $pdf->Text($rect3_x + 0.7, $rect_y + 2.5, $checkmark);
} 
elseif ($bh_district == 'Lapaz') {
  $pdf->Text($rect_4x + 0.9, $rect_y + 2.5, $checkmark);
}else {

  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
}


$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 60;
$rect3_x = 100;
$rect_y = 91;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Lapuz', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Mandurriao', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-140, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Molo', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Barangay: ' . $bh_barangay, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Province: ' . $bh_province, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'BH Control No.: ' . $bh_control_no, 1);
$pdf->Ln();

$pdf->Rect(11, 110, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'OR No.: ' . $bh_or_num, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 1, 'Official Receipt',  '', 0);
$pdf->Ln();


$pdf->Rect(11, 125, 200, 21);
$pdf->Cell(1);
$pdf->Cell(200, 25, 'Date Issued: ' . $date_issued, 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, -20, 'Official Receipt',  'a', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 25, 'yyyy-mm-dd',  'a', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Amount Paid: ' . $amount_paid, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Business Permit Number: ' . $bh_bpn, 1);
$pdf->Ln();

$pdf->Rect(11, 156, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 10, 'Mode of Payment: ' . $bh_mp, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 60;
$rect3_x = 100;
$rect4_x = 140;
$rect_y = 165;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 15, '', 0, 0);
$pdf->Cell(0, 1, 'Annual', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 1, 'Semi-Annual', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-140, 5, '', 0, 0);
$pdf->Cell(0, 1, 'Monthly', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-100, 5, '', 0, 0);
$pdf->Cell(0, 1, 'Quarterly', 0, 0);
$pdf->Ln();


$pdf->Rect(11, 171, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 15, 'Date Paid: ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, -10, 'yyyy-mm-dd', 0); // Adjusted parameter order for border
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 5, '', $date_paid, 0); // Adjusted parameter order for border
$pdf->Ln();

$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 4, 'Period Covered: ' . $bh_period_cover, 1);
$pdf->Ln();

$pdf->Rect(11, 186, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 10, 'Complaint: ' . $bh_complaint, 0); // Adjusted to add border
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 60;
$rect_y = 195;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, 1, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 1, 'No', 0, 0);
$pdf->Ln();



$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(62, 20, '', 0, 0, 'C');
$pdf->Cell(-90, 30, 'Classification and Rates', 0, 0, 'C');
$pdf->Ln();

$pdf->Rect(11, 220, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, -5, 'Kind of Construction of the Boarding House: ', 0); // Adjusted to add border
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 80;
$rect3_x = 135;
$rect_y = 228;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, 15, 'A. Made of Strong Materials', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 15, 'B. Made of Light Materials', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-120, 5, '', 0, 0);
$pdf->Cell(0, 15, 'C. Others (Specify)', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 235, 200, 20);
$pdf->Cell(1);
$pdf->Cell(200, 10, 'Specify: ', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, -5, 'Kind of Construction of the Boarding House    ' . $bh_class, 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0); // Adjusted to add border
$pdf->Ln();


$pdf->Rect(11, 255, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 20, 'Class of the Boarding House: ', 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 60;
$rect3_x = 100;
$rect4_x = 140;
$rect_y = 260;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -10, 'Class A', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, -10, 'Class B', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-140, 5, '', 0, 0);
$pdf->Cell(0, -10, 'Class C', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-100, 5, '', 0, 0);
$pdf->Cell(0, -10, 'Class D', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 8, '', 0); // Adjusted to add border
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'No. of Rooms: ' . $bh_room, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'No. of Occupants: ' . $bh_occupants, 1);
$pdf->Ln();


$pdf->Rect(11, 275, 200, 20);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Rates being Charges: ' . $bh_rates_charge, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect3_x = 80;
$rect4_x = 110;
$rect5_x = 140;
$rect6_x = 170;
$rect_y = 283;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect5_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect6_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, 10, 'Lodging', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, 10, 'Board', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-150, 5, '', 0, 0);
$pdf->Cell(0, 10, 'Bed Space', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-120, 5, '', 0, 0);
$pdf->Cell(0, 10, 'Room Rent', 0, 0);
$pdf->Cell($rect5_x - $rect3_x - $rect_size);
$pdf->Cell(-120, 5, '', 0, 0);
$pdf->Cell(0, 10, 'House Rent', 0, 0);
$pdf->Cell($rect6_x - $rect3_x - $rect_size);
$pdf->Cell(-120, 5, '', 0, 0);
$pdf->Cell(0, 10, 'Rent Per Unit (Apartment)', 0, 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();


$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect_y = 291;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -5, 'Others (Specify):____________', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 295, 200, 5);
$pdf->Cell(1);
$pdf->Cell(200, 15, 'Rates:' . $bh_rate, 0, 1);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(62, 5, '', 0, 0, 'C');
$pdf->Cell(-90, -20, 'Facilities and Sanitary', 0, 0, 'C');
$pdf->Ln();


$pdf->Rect(11, 315, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 35, 'Source of Water Supply: ' . $bh_water_source, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 320;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -27, 'NAWASA', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, -27, 'Deep Well', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 325, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 40, 'Adequate: ' . $bh_adequate, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 330;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -33, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, -33, 'No', 0, 0);
$pdf->Ln();



$pdf->Rect(11, 335, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 45, 'Portable: ' . $bh_portable, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 340;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -35, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 5, '', 0, 0);
$pdf->Cell(0, -35, 'No', 0, 0);
$pdf->Ln();


$pdf->AddPage(); //create new page

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Toilet Facilities Type: ' . $bh_toilet_type, 1);
$pdf->Ln();

$pdf->Rect(11, 15, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Sanitary Condition (Toilet Facilities): ' . $bh_toilet_cond, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect3_x = 80;
$rect_y = 21;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Good', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Fair', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-150, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Poor', 0, 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Bath Facilities Type: ' . $bh_bath_type, 1);
$pdf->Ln();

$pdf->Rect(11, 30, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Sanitary Condition (Bath Facilities): ' . $bh_bath_cond, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect3_x = 80;
$rect_y = 36;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Good', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Fair', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-150, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Poor', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Total Number of Comfort Room: ' . $bh_cr_num, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Total Number of Bathroom: ' . $bh_bathroom_num, 1);
$pdf->Ln();

$pdf->Rect(11, 50, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Sanitary Condition of the Premises: ' . $bh_premises_cond, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect3_x = 80;
$rect_y = 56;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Good', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Fair', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-150, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Poor', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 60, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, '1. Type of Garbage Disposal: ' . $bh_garbage_disposal, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 66;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'DPS', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Others:__________________', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 70, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, '2. Type of Sewage Disposal: ' . $bh_sewage_disposal, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 76;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'DPS', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Others:__________________', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 80, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, '3. Type of Rodent/Vermin Disposal: ' . $bh_rodent_disposal, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 86;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'DPS', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Others:__________________', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 90, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Lightning and Ventilation: ' . $light_ventilation, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 96;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Natural', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Artificial', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 100, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Natural/Artificial: ' . $natural_artificial, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 106;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Satisfactory', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Unsatisfactory', 0, 0);
$pdf->Ln();


$pdf->Rect(11, 110, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Is there any extension or additional construction in the establishment? ' . $establishment_extension, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 116;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'No', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Specify if yes: ' . $specify_txt, 1);
$pdf->Ln();

$pdf->Rect(11, 120, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'With Permit' . $with_permit, 0);
$pdf->Ln();

$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect2_x = 50;
$rect_y = 131;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 4, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-180, 4, '', 0, 0);
$pdf->Cell(0, 5, 'No', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Remarks and Recommendations: ' . $bh_remarks, 1);
$pdf->Ln();

$pdf->Rect(11, 140, 200, 25);
$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'You are hereby requested to appear before this office: ', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Failure to do so will conpel this commission t file necessary action againts your business establishment', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'yyyy-mm-dd', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 10, $office_required, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Inspected by:' . $inspected_by, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Acknowledge by:' . $acknowledge_by, 1);
$pdf->Ln();

$pdf->Rect(11, 175, 200, 60);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Get Current Location:' . $current_loc, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(100, 5, 'Latitude (x.y):' . $bh_latitude, 1);
$pdf->Cell(100, 5, 'Longitutde (x.y):' . $bh_longitude, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(100, 5, 'Altitude (m):' . $bh_altitude, 1);
$pdf->Cell(100, 5, 'Accuracy (m):' . $bh_precision, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 45, '', 1);
$pdf->Ln();

$pdf->Rect(11, 240, 200, 100);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Boarding House Picture:', 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, $bh_image, 0);
$pdf->Ln();


$pdf->Output();
