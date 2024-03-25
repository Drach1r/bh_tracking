<?php
include 'includes/header.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";



try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($row); // Output the fetched row to see its structure and content
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if 'id' parameter is set in the POST data
        if (isset($_POST['id'])) {

            // Collect updated data from the form
            // Update each field in the database
            $id = $_POST['id'];
            // Collect updated data from the form
            $account_number = $_POST['account_number'] ?? '';
            $establishment_name = $_POST['establishment_name'] ?? '';
            $first_name = $_POST['first_name'] ?? '';
            $middle_name = $_POST['middle_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';
            $suffix = $_POST['suffix'] ?? '';
            $bh_address = $_POST['bh_address'] ?? '';
            $bh_municipality = $_POST['bh_municipality'] ?? '';
            $bh_district = $_POST['bh_district'] ?? '';
            $bh_barangay = $_POST['bh_barangay'] ?? '';
            $bh_province = $_POST['bh_province'] ?? '';
            $bh_control_no = $_POST['bh_control_no'] ?? '';
            $bh_or_num = $_POST['bh_or_num'] ?? '';
            $date_issued = $_POST['date_issued'] ?? '';
            $amount_paid = $_POST['amount_paid'] ?? '';
            $bh_bpn = $_POST['bh_bpn'] ?? '';
            $bh_mp = $_POST['bh_mp'] ?? '';
            $date_paid = $_POST['date_paid'] ?? '';
            $bh_period_cover = $_POST['bh_period_cover'] ?? '';
            $bh_complaint = $_POST['bh_complaint'] ?? '';
            $bh_construction_kind = $_POST['bh_construction_kind'] ?? '';
            $bh_specify = $_POST['bh_specify'] ?? '';
            $bh_class = $_POST['bh_class'] ?? '';
            $bh_room = $_POST['bh_room'] ?? '';
            $bh_occupants = $_POST['bh_occupants'] ?? '';
            $bh_overcrowded = $_POST['bh_overcrowded'] ?? '';
            $bh_rates_charge = $_POST['bh_rates_charge'] ?? '';
            $bh_rate = $_POST['bh_rate'] ?? '';
            $bh_water_source = $_POST['bh_water_source'] ?? '';
            $bh_nawasa = $_POST['bh_nawasa'] ?? '';
            $bh_deepwell = $_POST['bh_deepwell'] ?? '';
            $bh_adequate = $_POST['bh_adequate'] ?? '';
            $bh_portable = $_POST['bh_portable'] ?? '';
            $bh_toilet_type = $_POST['bh_toilet_type'] ?? '';
            $bh_toilet_cond = $_POST['bh_toilet_cond'] ?? '';
            $bh_bath_type = $_POST['bh_bath_type'] ?? '';
            $bh_bath_cond = $_POST['bh_bath_cond'] ?? '';
            $bh_cr_num = $_POST['bh_cr_num'] ?? '';
            $bh_bathroom_num = $_POST['bh_bathroom_num'] ?? '';
            $bh_premises_cond = $_POST['bh_premises_cond'] ?? '';
            $bh_garbage_disposal = $_POST['bh_garbage_disposal'] ?? '';
            $bh_dps = $_POST['bh_dps'] ?? '';
            $bh_sewage_disposal = $_POST['bh_sewage_disposal'] ?? '';
            $bh_sd_dps = $_POST['bh_sd_dps'] ?? '';
            $bh_rodent_disposal = $_POST['bh_rodent_disposal'] ?? '';
            $light_ventilation = $_POST['light_ventilation'] ?? '';
            $natural_artificial = $_POST['natural_artificial'] ?? '';
            $establishment_extension = $_POST['establishment_extension'] ?? '';
            $specify_txt = $_POST['specify_txt'] ?? '';
            $with_permit = $_POST['with_permit'] ?? '';
            $bh_remarks = $_POST['bh_remarks'] ?? '';
            $office_required = $_POST['office_required'] ?? '';
            $inspected_by = $_POST['inspected_by'] ?? '';
            $acknowledge_by = $_POST['acknowledge_by'] ?? '';
            $current_loc = $_POST['current_loc'] ?? '';
            $bh_latitude = $_POST['bh_latitude'] ?? '';
            $bh_longitude = $_POST['bh_longitude'] ?? '';
            $bh_altitude = $_POST['bh_altitude'] ?? '';
            $bh_precision = $_POST['bh_precision'] ?? '';
            $bh_image = $_POST['bh_image'] ?? '';
            $bh_permit_control = $_POST['bh_permit_control'] ?? '';
            $bh_class_rates = $_POST['bh_class_rates'] ?? '';
            $bh_facilities = $_POST['bh_facilities'] ?? '';
            $bh_id = $_POST['bh_id'] ?? '';
            $bh_uuid = $_POST['bh_uuid'] ?? '';
            $submission_time = $_POST['submission_time'] ?? '';
            $bh_valid_status = $_POST['bh_valid_status'] ?? '';
            $bh_notes = $_POST['bh_notes'] ?? '';
            $bh_status = $_POST['bh_status'] ?? '';
            $submitted_by = $_POST['submitted_by'] ?? '';
            $bh_version = $_POST['bh_version'] ?? '';
            $bh_tags = $_POST['bh_tags'] ?? '';



            $updateStmt = $pdo->prepare("UPDATE boarding_house_tracking SET 
                account_number = :account_number, 
                establishment_name = :establishment_name, 
                first_name = :first_name, 
                middle_name = :middle_name, 
                last_name = :last_name, 
                suffix = :suffix, 
                bh_address = :bh_address, 
                bh_municipality = :bh_municipality, 
                bh_district = :bh_district, 
                bh_barangay = :bh_barangay, 
                bh_province = :bh_province, 
                bh_control_no = :bh_control_no, 
                bh_or_num = :bh_or_num, 
                date_issued = :date_issued, 
                amount_paid = :amount_paid, 
                bh_bpn = :bh_bpn, 
                bh_mp = :bh_mp, 
                date_paid = :date_paid, 
                bh_period_cover = :bh_period_cover, 
                bh_complaint = :bh_complaint, 
                bh_construction_kind = :bh_construction_kind, 
                bh_specify = :bh_specify, 
                bh_class = :bh_class, 
                bh_room = :bh_room, 
                bh_occupants = :bh_occupants, 
                bh_overcrowded = :bh_overcrowded, 
                bh_rates_charge = :bh_rates_charge, 
                bh_rate = :bh_rate, 
                bh_water_source = :bh_water_source, 
                bh_nawasa = :bh_nawasa, 
                bh_deepwell = :bh_deepwell, 
                bh_adequate = :bh_adequate, 
                bh_portable = :bh_portable, 
                bh_toilet_type = :bh_toilet_type, 
                bh_toilet_cond = :bh_toilet_cond, 
                bh_bath_type = :bh_bath_type, 
                bh_bath_cond = :bh_bath_cond, 
                bh_cr_num = :bh_cr_num, 
                bh_bathroom_num = :bh_bathroom_num, 
                bh_premises_cond = :bh_premises_cond, 
                bh_garbage_disposal = :bh_garbage_disposal, 
                bh_dps = :bh_dps, 
                bh_sewage_disposal = :bh_sewage_disposal, 
                bh_sd_dps = :bh_sd_dps, 
                bh_rodent_disposal = :bh_rodent_disposal, 
                light_ventilation = :light_ventilation, 
                natural_artificial = :natural_artificial, 
                establishment_extension = :establishment_extension, 
                specify_txt = :specify_txt, 
                with_permit = :with_permit, 
                bh_remarks = :bh_remarks, 
                office_required = :office_required, 
                inspected_by = :inspected_by, 
                acknowledge_by = :acknowledge_by, 
                current_loc = :current_loc, 
                bh_latitude = :bh_latitude, 
                bh_longitude = :bh_longitude, 
                bh_altitude = :bh_altitude, 
                bh_precision = :bh_precision, 
                bh_image = :bh_image, 
                bh_permit_control = :bh_permit_control, 
                bh_class_rates = :bh_class_rates, 
                bh_facilities = :bh_facilities, 
                bh_id = :bh_id, 
                bh_uuid = :bh_uuid, 
                submission_time = :submission_time, 
                bh_valid_status = :bh_valid_status, 
                bh_notes = :bh_notes, 
                bh_status = :bh_status, 
                submitted_by = :submitted_by
                WHERE id = :id");
            // Bind parameters to the statement
            $updateStmt->bindParam(':account_number', $account_number);
            $updateStmt->bindParam(':establishment_name', $establishment_name);
            $updateStmt->bindParam(':first_name', $first_name);
            $updateStmt->bindParam(':middle_name', $middle_name);
            $updateStmt->bindParam(':last_name', $last_name);
            $updateStmt->bindParam(':suffix', $suffix);
            $updateStmt->bindParam(':bh_address', $bh_address);
            $updateStmt->bindParam(':bh_municipality', $bh_municipality);
            $updateStmt->bindParam(':bh_district', $bh_district);
            $updateStmt->bindParam(':bh_barangay', $bh_barangay);
            $updateStmt->bindParam(':bh_province', $bh_province);
            $updateStmt->bindParam(':bh_control_no', $bh_control_no);
            $updateStmt->bindParam(':bh_or_num', $bh_or_num);
            $updateStmt->bindParam(':date_issued', $date_issued);
            $updateStmt->bindParam(':amount_paid', $amount_paid);
            $updateStmt->bindParam(':bh_bpn', $bh_bpn);
            $updateStmt->bindParam(':bh_mp', $bh_mp);
            $updateStmt->bindParam(':date_paid', $date_paid);
            $updateStmt->bindParam(':bh_period_cover', $bh_period_cover);
            $updateStmt->bindParam(':bh_complaint', $bh_complaint);

            $updateStmt->bindParam(':bh_room', $bh_room);
            $updateStmt->bindParam(':bh_occupants', $bh_occupants);
            $updateStmt->bindParam(':bh_overcrowded', $bh_overcrowded);
            $updateStmt->bindParam(':bh_rates_charge', $bh_rates_charge);
            $updateStmt->bindParam(':bh_rate', $bh_rate);
            $updateStmt->bindParam(':bh_water_source', $bh_water_source);
            $updateStmt->bindParam(':bh_nawasa', $bh_nawasa);
            $updateStmt->bindParam(':bh_deepwell', $bh_deepwell);
            $updateStmt->bindParam(':bh_adequate', $bh_adequate);
            $updateStmt->bindParam(':bh_portable', $bh_portable);
            $updateStmt->bindParam(':bh_toilet_type', $bh_toilet_type);
            $updateStmt->bindParam(':bh_toilet_cond', $bh_toilet_cond);
            $updateStmt->bindParam(':bh_bath_type', $bh_bath_type);
            $updateStmt->bindParam(':bh_bath_cond', $bh_bath_cond);
            $updateStmt->bindParam(':bh_cr_num', $bh_cr_num);
            $updateStmt->bindParam(':bh_bathroom_num', $bh_bathroom_num);
            $updateStmt->bindParam(':bh_premises_cond', $bh_premises_cond);
            $updateStmt->bindParam(':bh_garbage_disposal', $bh_garbage_disposal);
            $updateStmt->bindParam(':bh_dps', $bh_dps);
            $updateStmt->bindParam(':bh_sewage_disposal', $bh_sewage_disposal);
            $updateStmt->bindParam(':bh_sd_dps', $bh_sd_dps);
            $updateStmt->bindParam(':bh_rodent_disposal', $bh_rodent_disposal);
            $updateStmt->bindParam(':light_ventilation', $light_ventilation);
            $updateStmt->bindParam(':natural_artificial', $natural_artificial);
            $updateStmt->bindParam(':establishment_extension', $establishment_extension);
            $updateStmt->bindParam(':specify_txt', $specify_txt);
            $updateStmt->bindParam(':with_permit', $with_permit);
            $updateStmt->bindParam(':bh_remarks', $bh_remarks);
            $updateStmt->bindParam(':office_required', $office_required);
            $updateStmt->bindParam(':inspected_by', $inspected_by);
            $updateStmt->bindParam(':acknowledge_by', $acknowledge_by);
            $updateStmt->bindParam(':current_loc', $current_loc);
            $updateStmt->bindParam(':bh_latitude', $bh_latitude);
            $updateStmt->bindParam(':bh_longitude', $bh_longitude);
            $updateStmt->bindParam(':bh_altitude', $bh_altitude);
            $updateStmt->bindParam(':bh_precision', $bh_precision);
            $updateStmt->bindParam(':bh_image', $bh_image);
            $updateStmt->bindParam(':bh_permit_control', $bh_permit_control);
            $updateStmt->bindParam(':bh_class_rates', $bh_class_rates);
            $updateStmt->bindParam(':bh_facilities', $bh_facilities);
            $updateStmt->bindParam(':bh_id', $bh_id);
            $updateStmt->bindParam(':bh_uuid', $bh_uuid);
            $updateStmt->bindParam(':submission_time', $submission_time);
            $updateStmt->bindParam(':bh_valid_status', $bh_valid_status);
            $updateStmt->bindParam(':bh_notes', $bh_notes);
            $updateStmt->bindParam(':bh_status', $bh_status);
            $updateStmt->bindParam(':submitted_by', $submitted_by);

            if (isset($_POST['bh_construction_kind']) && is_array($_POST['bh_construction_kind'])) {
                $bh_construction_kind = implode(',', $_POST['bh_construction_kind']);
                $stmt->bindParam(':bh_construction_kind', $bh_construction_kind);
            } else {
            }


            if (isset($_POST['bh_specify']) && is_string($_POST['bh_specify'])) {
                $stmt->bindParam(':bh_specify', $_POST['bh_specify']);
            } else {
            }

            // Check and bind bh_class parameter
            if (isset($_POST['bh_class']) && is_array($_POST['bh_class'])) {
                // Convert the array to a string
                $bh_class = implode(',', $_POST['bh_class']);
                $stmt->bindParam(':bh_class', $bh_class);
            } else {
                // Handle the case where $_POST['bh_class'] is not an array or not set
            }

            $updateStmt->bindParam(':id', $id);

            $updateStmt->execute();

            // Redirect after updating
            header("Location: ../../bh_edit.php?id=$id");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
