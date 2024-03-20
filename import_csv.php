<?php
include 'includes/boot.php';

function importCSV($filename, $pdo)
{
    $file = fopen($filename, "r");

    fgetcsv($file);

    $stmt = $pdo->prepare("INSERT INTO boarding_house_tracking (`bh_start`, `bh_end`, `bh_today`, `bh_device_id`, `bh_audit`, `account_number`, `establishment_name`, `first_name`, `middle_name`, `last_name`, `suffix`, `bh_address`, `bh_municipality`, `bh_district`, `bh_barangay`, `bh_province`, `bh_control_no`, `bh_or_num`, `date_issued`, `amount_paid`, `bh_bpn`, `bh_mp`, `date_paid`, `bh_period_cover`, `bh_complaint`, `bh_construction_kind`, `bh_specify`, `bh_class`, `bh_room`, `bh_occupants`, `bh_overcrowded`, `bh_rates_charge`, `bh_rate`, `bh_water_source`, `bh_nawasa`, `bh_deepwell`, `bh_adequate`, `bh_portable`, `bh_toilet_type`, `bh_toilet_cond`, `bh_bath_type`, `bh_bath_cond`, `bh_cr_num`, `bh_bathroom_num`, `bh_premises_cond`, `bh_garbage_disposal`, `bh_dps`, `bh_sewage_disposal`, `bh_sd_dps`, `bh_rodent_disposal`, `light_ventilation`, `natural_artificial`, `establishment_extension`, `specify_txt`, `with_permit`, `bh_remarks`, `office_required`, `inspected_by`, `acknowledge_by`, `current_loc`, `bh_latitude`, `bh_longitude`, `bh_altitude`, `bh_precision`, `bh_image`, `bh_permit_control`, `bh_class_rates`, `bh_facilities`, `bh_id`, `bh_uuid`, `submission_time`, `bh_valid_status`, `bh_notes`, `bh_status`, `submitted_by`, `bh_version`, `bh_tags`, `id`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    while (($data = fgetcsv($file)) !== FALSE) {

        $stmt->execute($data);
        echo "New record created successfully<br>";
    }

    fclose($file);
}

if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $file_name = $_FILES["file"]["tmp_name"];
    importCSV($file_name, $pdo);
    echo "Import successful!";
    header("Location: records.php"); // Redirect to records.php after successful import
    exit(); // Ensure that no other output is sent
} else {
    echo "Error: Please select a file to import.";
}
