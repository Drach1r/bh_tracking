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
$pdf->Cell(200, 5, 'Name of Establishment: ' . $establishment_name, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('Name of Establishment:  ');
$underlineWidth =  152;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Name of Owner/Manager: ' . $first_name . ' '  . $middle_name . ' ' . $last_name . ' ' . $suffix, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('Name of Owner/Manager:  ');
$underlineWidth =  148.5;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'Address: ' . $bh_address, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('Address:  ');
$underlineWidth =  175;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(60, 5, 'BH Control No: ' . $bh_control_no, 0);
$pdf->Cell(50, 5, 'OR No: ' . $bh_or_num, 0);
$pdf->Cell(50, 5, 'Date Issued: ' . $date_issued, 0);
$pdf->Cell(50, 5, 'Amount: ' . $amount_paid, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('BH Control No:  ');
$underlineWidth =  36;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('OR No:');
$underlineWidth =  38.3;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('Date Issued:');
$underlineWidth =  31.7;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('Amount:');
$underlineWidth =  14.5;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(60, 5, 'Bus. Permit No.: ' . $bh_bpn, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('Bus. Permit No.:  ');
$underlineWidth =  163.5;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(60, 10, 'RATES BEING CHARGE:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(200, 5, 'KIND OF CONSTRUCTION OF THE BOARDING HOUSE:', 0);
$pdf->Ln();


$pdf->SetFont('ZapfDingbats', '', 8);
$pdf->SetFont('Arial', '', 8);

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____A. Made of Strong Materials', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____B. Made of Light Materials', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '_____C. Other (Pls. Specify: ' . $bh_specify, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('_____C. Other (Pls. Specify:  ');
$underlineWidth =  100;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, 0, '', 'B',);
$pdf->Cell($underlineWidth, -5, ')', 0,);
$pdf->Cell(10, 0, '', 0);
$pdf->Ln();

if ($bh_construction_kind == 'a__made_of_strong_materials' || $bh_construction_kind == 'b__made_of_light_materials' || $bh_construction_kind == 'c__other__specify') {
  $checkmark = "\x34";
} else {
  $bh_construction_kind = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);


if ($bh_construction_kind == 'a__made_of_strong_materials') {
  $pdf->Text(15,  +98.5, $checkmark);
} elseif ($bh_construction_kind == 'b__made_of_light_materials') {
  $pdf->Text(15,  +103.5, $checkmark);
} else {
  $pdf->Text(15,  +108.5, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(200, 10, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(70, 10, 'CLASS OF THE BOARDING HOUSE:', 0);
$pdf->Cell(30, 10, 'A: (___)', 0);
$pdf->Cell(30, 10, 'B: (___)', 0);
$pdf->Cell(30, 10, 'C: (___)', 0);
$pdf->Cell(30, 10, 'D: (___)', 0);
$pdf->Ln();


if ($bh_class == 'class_a' || $bh_class == 'class_b' || $bh_class == 'class_c' || $bh_class == 'class_d') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_class == 'class_a') {
  $pdf->Text(87.7,  +126, $checkmark);
} elseif ($bh_class == 'class_b') {
  $pdf->Text(117.7,  +126, $checkmark);
} elseif ($bh_class == 'class_c') {
  $pdf->Text(147.7,  +126, $checkmark);
} elseif ($bh_class == 'class_d') {
  $pdf->Text(177.7,  +126, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'No. Of Rooms:   ' . $bh_room, 0);
$pdf->Cell(50, 5, 'No. Of Occupants:   ' . $bh_occupants, 0);
$pdf->Cell(25, 5, 'Overcrowded: ', 0);
$pdf->Cell(20, 5, 'YES: (___)', 0);
$pdf->Cell(20, 5, 'NO: (___)', 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('No. Of Rooms:_______ ');
$underlineWidth =  20;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('No. Of Occupants:_______ ');
$underlineWidth =  20;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');

$pdf->Ln();


if ($bh_overcrowded == 'yes' || $bh_overcrowded == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);


if ($bh_overcrowded == 'yes') {
  $pdf->Text(156.5,  +133.5, $checkmark);
} elseif ($bh_overcrowded == 'no') {
  $pdf->Text(175,  +133.5, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'Lodging:______', 0);
$pdf->Cell(50, 5, 'Board:______', 0);
$pdf->Cell(25, 5, 'Bedspace:______ ', 0);
$pdf->Cell(50, 5, 'Room Rent:______', 0);

$pdf->Ln();


if ($bh_rates_charge == 'lodging' || $bh_rates_charge == 'board' || $bh_rates_charge == 'bed_space' || $bh_rates_charge == 'room_rent' || $bh_rates_charge == 'house_rent' || $bh_rates_charge == 'rent_per_unit__apartment' || $bh_rates_charge == 'other') {
  $checkmark = "\x34";
} else {
  $bh_rates_charge = "";
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_rates_charge == 'lodging') {
  $pdf->Text(36,  +137.5, $checkmark);
} elseif ($bh_rates_charge == 'board') {
  $pdf->Text(84,  +137.5, $checkmark);
} elseif ($bh_rates_charge == 'bed_space') {
  $pdf->Text(140,  +137.5, $checkmark);
} elseif ($bh_rates_charge == 'room_rent') {
  $pdf->Text(166,  +137.5, $checkmark);
} elseif ($bh_rates_charge == 'house_rent') {
  $pdf->Text(41,  +142.5, $checkmark);
} elseif ($bh_rates_charge == 'rent_per_unit__apartment') {
  $pdf->Text(108,  +142.5, $checkmark);
} else {
  $pdf->Text(134,  +142.5, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'House Rent:______', 0);
$pdf->Cell(50, 5, 'Rent per Unit(Apartment):______', 0);
$pdf->Cell(25, 5, 'Others:_____ : ' . $bh_garbage_other, 0);

$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('House Rent:______Rent per Unit(Apartment):______Others:_____ : ____________________________');
$underlineWidth =  33;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Cell(10, 1, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(80, 10, 'SOURCE OF WATER SUPPLY: ' . $bh_water_source, 0);
$pdf->Cell(32, 10, 'Adequate: YES(___)', 0);
$pdf->Cell(20, 10, 'NO: (___)', 0);
$pdf->Cell(30, 10, 'Portable: YES(___)', 0);
$pdf->Cell(30, 10, 'NO: (___)', 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('SOURCE OF WATER SUPPLY:  ');
$underlineWidth =  30;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -3.5, '', 'B');
$pdf->Cell(10, 1, '', 0);
$pdf->Ln();

if ($bh_adequate == 'yes' || $bh_adequate == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_adequate == 'yes') {
  $pdf->Text(113.5,  +151, $checkmark);
} elseif ($bh_adequate == 'no') {
  $pdf->Text(132,  +151, $checkmark);
}


if ($bh_portable == 'yes' || $bh_portable == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_portable == 'yes') {
  $pdf->Text(164,  +151, $checkmark);
} elseif ($bh_portable == 'no') {
  $pdf->Text(182,  +151, $checkmark);
}


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'TOILET FACILITIES:', 0);
$pdf->Cell(50, 5, 'Type: ' . $bh_toilet_type, 0);
$pdf->Cell(25, 5, 'Sanitary Condition: ' . $bh_toilet_cond, 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('                    TOILET FACILITIES:  Type:                       ');
$underlineWidth =  30;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('Sanitary Condition:________');
$underlineWidth =  30;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, 'BATH FACILITIES:', 0);
$pdf->Cell(50, 5, 'Type: ' . $bh_bath_type, 0);
$pdf->Cell(25, 5, 'Sanitary Condition: ' . $bh_bath_cond, 0);
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('BATH FACILITIES:Type:________________________');
$underlineWidth =  30;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('Sanitary Condition:________');
$underlineWidth =  30;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '', 0);
$pdf->Cell(50, 5, 'Total No. Of CR:         ' . $bh_cr_num, 0);
$pdf->Cell(25, 5, 'Total No. of Bathroom:        ' . $bh_bathroom_num, 0);
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('______________________________ Total No. Of CR:_________');
$underlineWidth =  16;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$labelWidth = $pdf->GetStringWidth('Total No. of Bathroom:________ ');
$underlineWidth =  15;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Cell(10, -2, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(80, 10, 'SANITARY CONDITION OF THE PREMISES:', 0);
$pdf->Cell(30, 10, 'Good: (___)', 0);
$pdf->Cell(30, 10, 'Fair: (___)', 0);
$pdf->Cell(30, 10, 'Poor: (___)', 0);

$pdf->Ln();

if ($bh_bath_cond == 'good' || $bh_premises_cond == 'fair' || $bh_premises_cond == 'poor') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($bh_premises_cond == 'good') {
  $pdf->Text(102.5,  +173, $checkmark);
} elseif ($bh_premises_cond == 'fair') {
  $pdf->Text(130.5,  +173, $checkmark);
} elseif ($bh_premises_cond == 'poor') {
  $pdf->Text(161.5,  +173, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '1. Type of Garbage Disposal:');
if ($bh_garbage_disposal == "others") {
  $pdf->Cell(50, 5, $bh_garbage_other, 0);
} else {
  $pdf->Cell(50, 5, $bh_garbage_disposal, 0);
}
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('1. Type of Garbage Disposal:_______ ');
$underlineWidth =  125;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '2. Type of Sewage Disposal:    ', 0);
if ($bh_sewage_disposal == "others") {
  $pdf->Cell(50, 5, $bh_sewage_other, 0);
} else {
  $pdf->Cell(50, 5, $bh_sewage_disposal, 0);
}
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('2. Type of Sewage Disposal:_______ ');
$underlineWidth =  126;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();


$pdf->Cell(1);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(50, 5, '3. Type of Rodent/Vermin Control:    ');
if ($bh_rodent_disposal == "others") {
  $pdf->Cell(50, 5, $bh_rodent_other, 0);
} else {
  $pdf->Cell(50, 5, $bh_rodent_disposal, 0);
}
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('3. Type of Rodent/Vermin Control:_______ ');
$underlineWidth =  120;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Cell(10, 2, '', 0);
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

if ($light_ventilation == 'natural' || $light_ventilation == 'artificial') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($light_ventilation == 'natural') {
  $pdf->Text(38,  +205.5, $checkmark);
} elseif ($light_ventilation == 'artificial') {
  $pdf->Text(38.8,  +210.5, $checkmark);
}


$pdf->SetFont('ZapfDingbats', '', 8);


if ($light_ventilation == 'natural') {
  if ($natural_artificial == 'satisfactory' || $natural_artificial == 'unsatisfactory') {
    $checkmark = "\x34";
    if ($natural_artificial == 'satisfactory') {
      $pdf->Text(90.6, 205.5, $checkmark);
    } elseif ($natural_artificial == 'unsatisfactory') {
      $pdf->Text(143.6, 205.5, $checkmark);
    }
  }
}


if ($light_ventilation == 'artificial') {
  if ($natural_artificial == 'satisfactory' || $natural_artificial == 'unsatisfactory') {
    $checkmark = "\x34";
    if ($natural_artificial == 'satisfactory') {
      $pdf->Text(90.6, 210.5, $checkmark);
    } elseif ($natural_artificial == 'unsatisfactory') {
      $pdf->Text(143.6, 210.5, $checkmark);
    }
  }
}



$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(150, 10, 'IS THERE ANY EXTENSION OR ADDITIONAL CONSTRUCTION IN THE ESTABLISHMENT?', 0);
$pdf->Cell(20, 10, 'Yes (___)', 0);
$pdf->Cell(20, 10, 'No (___)', 0);
$pdf->Ln();

if ($establishment_extension == 'yes' || $establishment_extension == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($establishment_extension == 'yes') {
  $pdf->Text(170,  +218, $checkmark);
} elseif ($establishment_extension == 'no') {
  $pdf->Text(188.5,  +218, $checkmark);
}

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(120, 10, 'Specify if YES: ' . $specify_txt, 0);
$pdf->Cell(30, 10, 'With Permit (___)', 0);
$pdf->Cell(30, 10, 'Without Permit (___)', 0);
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('Specify if YES:  ');
$underlineWidth =  90;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -3.5, '', 'B');
$pdf->Ln();

if ($with_permit == 'yes' || $with_permit == 'no') {
  $checkmark = "\x34";
} else {

  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($with_permit == 'yes') {
  $pdf->Text(149.5,  +228, $checkmark);
} elseif ($with_permit == 'no') {
  $pdf->Text(183.5,  +228, $checkmark);
}


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(80, 10, 'REMARKS AND RECOMMENDATION:', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0);
$pdf->Ln();

$pdf->Rect(15, 240, 185, 40);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(5);
$pdf->Cell(200, 0, '' . $bh_remarks, 0,);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(1, 40, '', 0);
$pdf->Ln();


$pdf->Cell(90);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(200, 5, 'N O T I C E', 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(200, 5, 'You are hereby requested to appear before this office on   ' . $office_required . '   at __________________________. Failure to do so will compel', 0);
$pdf->Ln();

$labelWidth = $pdf->GetStringWidth('You are hereby requested to appear before this office on   ');
$underlineWidth =  20;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, 'this commission to file necessary action against your business establishment.', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Cell(120);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(50, 5, 'Inspected by:', 0);
$pdf->Ln();


$pdf->Cell(.1);
$pdf->SetFont('Times', '', 10);
$names = explode(',', $inspected_by);
foreach ($names as $name) {
  $name = trim($name);
  if ($name !== "") {
    $pdf->Cell(150);
    $pdf->Cell(50, 5, '' . $name, 0);
    $pdf->Ln();

    $labelWidth = $pdf->GetStringWidth('________________________________________________________________________________');
    $underlineWidth =  49;
    $pdf->Cell($labelWidth);
    $pdf->Cell($underlineWidth, -1, '', 'B');
    $pdf->Ln();
  }
}



$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(130, 10, 'Acknowledge by:', 0);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Times', '', 10);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(139, 5, '' . $acknowledge_by, 0,);
$pdf->Ln();


$labelWidth = $pdf->GetStringWidth('_');
$underlineWidth =  49;
$pdf->Cell($labelWidth);
$pdf->Cell($underlineWidth, -1, '', 'B');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(150, 5, 'Signature over Printed Name', 0, '');
$pdf->Ln();

$pdf->Output();
