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
    return null; // Return null if the file doesn't exist
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
  $bh_barangay_name = $row->barangay; // Retrieve the barangay name from the result
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
$pdf->Cell(200, 5, 'District: ');
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

if ($bh_district == '1' || $bh_district == '2' || $bh_district == '3' || $bh_district == '4' || $bh_district == '5' || $bh_district == '6' || $bh_district == '7') {
  $checkmark = "\x34";
} else {


  $checkmark = "\x34";
}



$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_district == '1') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_district == '2') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_district == '3') {
  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_district == '4') {
  $pdf->Text($rect3_x + 40.5, $rect_y + 2.5, $checkmark);
} elseif ($bh_district == '5') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 7.5, $checkmark);
} elseif ($bh_district == '6') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 7.5, $checkmark);
} elseif ($bh_district == '7') {
  $pdf->Text($rect3_x + 0.3, $rect_y + 7.5, $checkmark);
}


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
$pdf->Cell(200, 5, 'Barangay: ' . $bh_barangay_name, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Province: ' . $bh_province, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'BH Control No.: ' . $bh_control_no, 1);
$pdf->Ln();

$pdf->Rect(11, 110, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Official Receipt', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 1, 'OR No.: ' . $bh_or_num,  '', 0);
$pdf->Ln();


$pdf->Rect(11, 125, 200, 21);
$pdf->Cell(1);
$pdf->Cell(200, 25, 'Date Issued: ', '', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, -20, '', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 25, $date_issued,  '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Amount Paid: ' . $amount_paid, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Business Permit Number: ' . $bh_bpn, 1);
$pdf->Ln();

$pdf->Rect(11, 156, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 10, 'Mode of Payment: ', 0);
$pdf->Ln();



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
$pdf->Cell(200, 15, 'Date Paid: ' . $date_paid, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, -10, '', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 4, 'Period Covered: ' . $bh_period_cover, 1);
$pdf->Ln();

$pdf->Rect(11, 186, 200, 15);
$pdf->Cell(1);
$pdf->Cell(200, 10, 'Compliant: ');
$pdf->Ln();


if ($bh_mp == 'annual' || $bh_mp == 'semi_annual' || $bh_mp == 'monthly' || $bh_mp == 'quarterly') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_mp == 'annual') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_mp == 'semi_annual') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_mp == 'monthly') {
  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_mp == 'quarterly') {
  $pdf->Text($rect4_x + 0.3, $rect_y + 2.5, $checkmark);
}


if ($bh_complaint == 'yes' || $bh_complaint == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_complaint == 'yes') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 32.5, $checkmark);
} elseif ($bh_complaint == 'no') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 32.5, $checkmark);
}

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
$pdf->Cell(200, 10, 'Specify: ' . $bh_specify, 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, -5, '', '', 0);
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();


$pdf->Rect(11, 255, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 20, 'Class of the Boarding House: ', 0);
$pdf->Ln();


if ($bh_construction_kind == 'a__made_of_strong_materials' || $bh_construction_kind == 'b__made_of_light_materials' || $bh_construction_kind == 'c__other__specify') {
  $checkmark = "\x34";
} else {
  $bh_construction_kind = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_construction_kind == 'a__made_of_strong_materials') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_construction_kind == 'b__made_of_light_materials') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 2.5, $checkmark);
} else {
  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
}

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
$pdf->Cell(200, 8, '', 0);
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
$pdf->Cell(200, 5, 'Rates being Charges: ', 0);
$pdf->Ln();


if ($bh_class == 'class_a' || $bh_class == 'class_b' || $bh_class == 'class_c' || $bh_class == 'class_d') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_class == 'class_a') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_class == 'class_b') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_class == 'class_c') {
  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_class == 'class_d') {
  $pdf->Text($rect4_x + 0.3, $rect_y + 2.5, $checkmark);
}
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



if ($bh_rates_charge == 'lodging' || $bh_rates_charge == 'board' || $bh_rates_charge == 'bed_space' || $bh_rates_charge == 'room_rent' || $bh_rates_charge == 'house_rent' || $bh_rates_charge == 'rent_per_unit__apartment' || $bh_rates_charge == 'other') {
  $checkmark = "\x34";
} else {
  $bh_rates_charge = "";
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_rates_charge == 'lodging') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_rates_charge == 'board') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_rates_charge == 'bed_space') {
  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_rates_charge == 'room_rent') {
  $pdf->Text($rect4_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_rates_charge == 'house_rent') {
  $pdf->Text($rect5_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_rates_charge == 'rent_per_unit__apartment') {
  $pdf->Text($rect6_x + 0.3, $rect_y + 2.5, $checkmark);
} else {
  $pdf->Text($rect1_x + 0.3, $rect_y + 10.5, $checkmark);
}
$pdf->SetX(85);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 20;
$rect_y = 291;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-63, 5, '', 0, 0);
$pdf->Cell(0, -5, ($bh_rates_charge != 'lodging' && $bh_rates_charge != 'board' && $bh_rates_charge != 'bed_space' && $bh_rates_charge != 'room_rent' && $bh_rates_charge != 'house_rent' && $bh_rates_charge != 'rent_per_unit__apartment') ? "Others: $bh_ratescharge_other" : 'Others:_______', 0, 0);
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
$pdf->Cell(200, 35, 'Source of Water Supply: ', 0);
$pdf->Ln();


$water_sources = explode(' ', $bh_water_source);


if (in_array('nawasa', $water_sources) && in_array('deep_well', $water_sources)) {
  $checkmark = "\x34";
} elseif (in_array('nawasa', $water_sources)) {
  $checkmark = "\x34";
} elseif (in_array('deep_well', $water_sources)) {
  $checkmark = "\x34";
} else {
  $checkmark = "";
}

$pdf->SetFont('ZapfDingbats', '', 8);


if (in_array('nawasa', $water_sources) && in_array('deep_well', $water_sources)) {

  $pdf->Text($rect1_x + 0.3, $rect_y + 31.5, $checkmark);
  $pdf->Text($rect2_x + 0.3, $rect_y + 31.5, $checkmark);
} elseif (in_array('nawasa', $water_sources)) {
  $pdf->Text($rect1_x + 0.3, $rect_y + 31.5, $checkmark);
} elseif (in_array('deep_well', $water_sources)) {
  $pdf->Text($rect2_x + 0.3, $rect_y + 31.5, $checkmark);
}

if ($bh_adequate == 'yes' || $bh_adequate == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_adequate == 'yes') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 41.5, $checkmark);
} elseif ($bh_adequate == 'no') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  41.5, $checkmark);
}


if ($bh_portable == 'yes' || $bh_portable == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_portable == 'yes') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 51.5, $checkmark);
} elseif ($bh_portable == 'no') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  51.5, $checkmark);
}

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
$pdf->Cell(200, 40, 'Adequate: ', 0);
$pdf->Ln();



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
$pdf->Cell(200, 45, 'Portable: ', 0);
$pdf->Ln();


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


$pdf->AddPage();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Toilet Facilities Type: ' . $bh_toilet_type, 1);
$pdf->Ln();

$pdf->Rect(11, 15, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Sanitary Condition (Toilet Facilities): ', 0);
$pdf->Ln();

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
$pdf->Cell(200, 5, 'Sanitary Condition (Bath Facilities): ', 0);
$pdf->Ln();



if ($bh_toilet_cond == 'good' || $bh_toilet_cond == 'fair' || $bh_toilet_cond == 'poor') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_toilet_cond == 'good') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($bh_toilet_cond == 'fair') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  2.5, $checkmark);
} elseif ($bh_toilet_cond == 'poor') {
  $pdf->Text($rect3_x + 0.3, $rect_y +  2.5, $checkmark);
}


if ($bh_bath_cond == 'good' || $bh_bath_cond == 'fair' || $bh_bath_cond == 'poor') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_bath_cond == 'good') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 17.5, $checkmark);
} elseif ($bh_bath_cond == 'fair') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  17.5, $checkmark);
} elseif ($bh_bath_cond == 'poor') {
  $pdf->Text($rect3_x + 0.3, $rect_y +  17.5, $checkmark);
}
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
$pdf->Cell(200, 5, 'Sanitary Condition of the Premises: ', 0);
$pdf->Ln();


if ($bh_bath_cond == 'good' || $bh_premises_cond == 'fair' || $bh_premises_cond == 'poor') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_premises_cond == 'good') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 22.5, $checkmark);
} elseif ($bh_premises_cond == 'fair') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  22.5, $checkmark);
} elseif ($bh_premises_cond == 'poor') {
  $pdf->Text($rect3_x + 0.3, $rect_y +  22.5, $checkmark);
}
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
$pdf->Cell(200, 5, '1. Type of Garbage Disposal: ', 0);
$pdf->Ln();


if ($bh_garbage_disposal == 'dps' || $bh_garbage_disposal == 'others') {
  $checkmark = "\x34";
} else {
  $bh_garbage_disposal = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_garbage_disposal == 'dps') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} else {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}
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
$pdf->Cell(0, 5, ($bh_garbage_disposal != 'dps') ? "Others: $bh_garbage_other" : 'Others:_______', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 70, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, '2. Type of Sewage Disposal: ', 0);
$pdf->Ln();


if ($bh_sewage_disposal == 'dps' || $bh_sewage_disposal == 'others') {
  $checkmark = "\x34";
} else {
  $bh_sewage_disposal = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_sewage_disposal == 'dps') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} else {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}
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
$pdf->Cell(0, 5, ($bh_sewage_disposal != 'dps') ? "Others: $bh_sewage_other" : 'Others:_______', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 80, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, '3. Type of Rodent/Vermin Disposal: ', 0);
$pdf->Ln();


if ($bh_rodent_disposal == 'dps' || $bh_rodent_disposal == 'others') {
  $checkmark = "\x34";
} else {
  $bh_rodent_disposal = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_rodent_disposal == 'dps') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} else {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}
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
$pdf->Cell(0, 5, ($bh_rodent_disposal != 'dps') ? "Others: $bh_rodent_other" : 'Others:_______', 0, 0);
$pdf->Ln();

$pdf->Rect(11, 90, 200, 10);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Lightning and Ventilation: ', 0);
$pdf->Ln();


if ($light_ventilation == 'natural' || $light_ventilation == 'artificial') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($light_ventilation == 'natural') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} elseif ($light_ventilation == 'artificial') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}

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
$pdf->Cell(200, 5, 'Natural/Artificial: ', 0);
$pdf->Ln();


if ($natural_artificial == 'satisfactory' || $natural_artificial == 'unsatisfactory') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($natural_artificial == 'satisfactory') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} elseif ($natural_artificial == 'unsatisfactory') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}
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
$pdf->Cell(200, 5, 'Is there any extension or additional construction in the establishment?:', 0);
$pdf->Ln();


if ($establishment_extension == 'yes' || $establishment_extension == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($establishment_extension == 'yes') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 12.5, $checkmark);
} elseif ($establishment_extension == 'no') {
  $pdf->Text($rect2_x + 0.3, $rect_y +  12.5, $checkmark);
}
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
$pdf->Cell(200, 5, 'With Permit:', 0);
$pdf->Ln();


if ($with_permit == 'yes' || $with_permit == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($with_permit == 'yes') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 17.5, $checkmark);
} elseif ($with_permit == 'no') {
  $pdf->Text($rect2_x + 0.3, $rect_y + 17.5,  $checkmark);
}
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
$pdf->Cell(200, 5, $office_required, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Failure to do so will compel this commission to file necessary action againts your business establishment', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 10, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Inspected by: ' . $inspected_by, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Acknowledge by: ' . $acknowledge_by, 1);
$pdf->Ln();

$pdf->Rect(11, 175, 200, 150);
$pdf->Cell(1);
$pdf->Cell(200, 5, 'Current Location: ' . $current_loc, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(100, 5, 'Latitude (x.y): ' . $bh_latitude, 1);
$pdf->Cell(100, 5, 'Longitutde (x.y): ' . $bh_longitude, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(100, 5, 'Altitude (m): ' . $bh_altitude, 1);
$pdf->Cell(100, 5, 'Accuracy (m): ' . $bh_precision, 1);
$pdf->Ln();



$pdf->Cell(1);
$pdf->Cell(200, 5, 'Boarding House Picture: ', 1);
$pdf->Ln();

$pdf->Cell(1);

if ($imagePath !== null) {
  $pdf->Image($imagePath, $x = null, $y = null, $w = 200, $h = 100, $type = '', $link = '');
} else {
  $pdf->Cell(0, 10, "", 0, 1);
}


$pdf->Ln();




$pdf->Output();
