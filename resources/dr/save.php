<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addform'])) {
    try {
        include '../../includes/boot.php';




        if (isset($_FILES['bh_image']) && $_FILES['bh_image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../../resources/gallery/';

            if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
                // die("Error: Upload directory is not writable or does not exist.");
                mkdir($uploadDir, 0777);
            }

            $uploadFile = $uploadDir . basename($_FILES['bh_image']['name']);

            if (move_uploaded_file($_FILES['bh_image']['tmp_name'], $uploadFile)) {
                $imagePath = $uploadFile;

                $stmt = $pdo->prepare("SELECT COUNT(*) FROM boarding_house_tracking WHERE bh_image = :bh_image");
                $stmt->bindParam(':bh_image', $imagePath);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                if ($count == 0) {
                    $sql = "INSERT INTO boarding_house_tracking (bh_image) VALUES (:bh_image)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':bh_image', $imagePath);
                }
            }
        }

        // Construct the insertion query
        $sql = "INSERT INTO boarding_house_tracking 
        (account_number, establishment_name, first_name, middle_name, last_name, suffix, bh_address, bh_municipality, bh_district, bh_barangay, bh_province, bh_control_no, bh_or_num, date_issued, amount_paid, bh_bpn, bh_mp, date_paid, bh_period_cover, bh_complaint, bh_construction_kind, bh_specify, bh_class, bh_room, bh_occupants, bh_overcrowded, bh_rates_charge, bh_rate, bh_water_source, bh_nawasa, bh_deepwell, bh_adequate, bh_portable, bh_toilet_type, bh_toilet_cond, bh_bath_type, bh_bath_cond, bh_cr_num, bh_bathroom_num, bh_premises_cond, bh_garbage_disposal, bh_dps, bh_sewage_disposal, bh_sd_dps, bh_rodent_disposal, light_ventilation, natural_artificial, establishment_extension, specify_txt, with_permit, bh_remarks, office_required, inspected_by, acknowledge_by, current_loc, bh_latitude, bh_longitude, bh_altitude, bh_precision, bh_image, bh_permit_control, bh_class_rates, bh_facilities, bh_id, bh_uuid, submission_time, bh_valid_status, bh_notes, bh_status, submitted_by, bh_version, bh_tags)
        VALUES
        (:account_number, :establishment_name, :first_name, :middle_name, :last_name, :suffix, :bh_address, :bh_municipality, :bh_district, :bh_barangay, :bh_province, :bh_control_no, :bh_or_num, :date_issued, :amount_paid, :bh_bpn, :bh_mp, :date_paid, :bh_period_cover, :bh_complaint, :bh_construction_kind, :bh_specify, :bh_class, :bh_room, :bh_occupants, :bh_overcrowded, :bh_rates_charge, :bh_rate, :bh_water_source, :bh_nawasa, :bh_deepwell, :bh_adequate, :bh_portable, :bh_toilet_type, :bh_toilet_cond, :bh_bath_type, :bh_bath_cond, :bh_cr_num, :bh_bathroom_num, :bh_premises_cond, :bh_garbage_disposal, :bh_dps, :bh_sewage_disposal, :bh_sd_dps, :bh_rodent_disposal, :light_ventilation, :natural_artificial, :establishment_extension, :specify_txt, :with_permit, :bh_remarks, :office_required, :inspected_by, :acknowledge_by, :current_loc, :bh_latitude, :bh_longitude, :bh_altitude, :bh_precision, :bh_image, :bh_permit_control, :bh_class_rates, :bh_facilities, :bh_id, :bh_uuid, :submission_time, :bh_valid_status, :bh_notes, :bh_status, :submitted_by, :bh_version, :bh_tags)";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':account_number', $_POST['account_number']);
        $stmt->bindParam(':establishment_name', $_POST['establishment_name']);
        $stmt->bindParam(':first_name', $_POST['first_name']);
        $stmt->bindParam(':middle_name', $_POST['middle_name']);
        $stmt->bindParam(':last_name', $_POST['last_name']);
        $stmt->bindParam(':suffix', $_POST['suffix']);
        $stmt->bindParam(':bh_address', $_POST['bh_address']);
        $stmt->bindParam(':bh_municipality', $_POST['bh_municipality_hidden']);
        $stmt->bindParam(':bh_district', $_POST['bh_district']);
        $stmt->bindParam(':bh_barangay', $_POST['bh_barangay']);
        $stmt->bindParam(':bh_province', $_POST['bh_province_hidden']);
        $stmt->bindParam(':bh_control_no', $_POST['bh_control_no']);
        $stmt->bindParam(':bh_or_num', $_POST['bh_or_num']);
        $stmt->bindParam(':date_issued', $_POST['date_issued']);
        $stmt->bindParam(':amount_paid', $_POST['amount_paid']);
        $stmt->bindParam(':bh_bpn', $_POST['bh_bpn']);
        $stmt->bindParam(':bh_mp', $_POST['bh_mp']);
        $stmt->bindParam(':date_paid', $_POST['date_paid']);
        $stmt->bindParam(':bh_period_cover', $_POST['bh_period_cover']);
        $stmt->bindParam(':bh_complaint', $_POST['bh_complaint']);
        $stmt->bindParam(':bh_construction_kind', $_POST['bh_construction_kind']);
        $stmt->bindParam(':bh_specify', $_POST['bh_specify']);
        $stmt->bindParam(':bh_class', $_POST['bh_class']);
        $stmt->bindParam(':bh_room', $_POST['bh_room']);
        $stmt->bindParam(':bh_occupants', $_POST['bh_occupants']);
        $stmt->bindParam(':bh_overcrowded', $_POST['bh_overcrowded']);
        $stmt->bindParam(':bh_rates_charge', $_POST['bh_rates_charge']);
        $stmt->bindParam(':bh_rate', $_POST['bh_rate']);
        $stmt->bindParam(':bh_water_source', $_POST['bh_water_source']);
        $stmt->bindParam(':bh_nawasa', $_POST['bh_nawasa']);
        $stmt->bindParam(':bh_deepwell', $_POST['bh_deepwell']);
        $stmt->bindParam(':bh_adequate', $_POST['bh_adequate']);
        $stmt->bindParam(':bh_portable', $_POST['bh_portable']);
        $stmt->bindParam(':bh_toilet_type', $_POST['bh_toilet_type']);
        $stmt->bindParam(':bh_toilet_cond', $_POST['bh_toilet_cond']);
        $stmt->bindParam(':bh_bath_type', $_POST['bh_bath_type']);
        $stmt->bindParam(':bh_bath_cond', $_POST['bh_bath_cond']);
        $stmt->bindParam(':bh_cr_num', $_POST['bh_cr_num']);
        $stmt->bindParam(':bh_bathroom_num', $_POST['bh_bathroom_num']);
        $stmt->bindParam(':bh_premises_cond', $_POST['bh_premises_cond']);
        $stmt->bindParam(':bh_garbage_disposal', $_POST['bh_garbage_disposal']);
        $stmt->bindParam(':bh_dps', $_POST['bh_dps']);
        $stmt->bindParam(':bh_sewage_disposal', $_POST['bh_sewage_disposal']);
        $stmt->bindParam(':bh_sd_dps', $_POST['bh_sd_dps']);
        $stmt->bindParam(':bh_rodent_disposal', $_POST['bh_rodent_disposal']);
        $stmt->bindParam(':light_ventilation', $_POST['light_ventilation']);
        $stmt->bindParam(':natural_artificial', $_POST['natural_artificial']);
        $stmt->bindParam(':establishment_extension', $_POST['establishment_extension']);
        $stmt->bindParam(':specify_txt', $_POST['specify_txt']);
        $stmt->bindParam(':with_permit', $_POST['with_permit']);
        $stmt->bindParam(':bh_remarks', $_POST['bh_remarks']);
        $stmt->bindParam(':office_required', $_POST['office_required']);
        $stmt->bindParam(':inspected_by', $_POST['inspected_by']);
        $stmt->bindParam(':acknowledge_by', $_POST['acknowledge_by']);
        $stmt->bindParam(':current_loc', $_POST['current_loc']);
        $stmt->bindParam(':bh_latitude', $_POST['bh_latitude']);
        $stmt->bindParam(':bh_longitude', $_POST['bh_longitude']);
        $stmt->bindParam(':bh_altitude', $_POST['bh_altitude']);
        $stmt->bindParam(':bh_precision', $_POST['bh_precision']);
        $stmt->bindParam(':bh_image', $_POST['bh_image']);
        $stmt->bindParam(':bh_permit_control', $_POST['bh_permit_control']);
        $stmt->bindParam(':bh_class_rates', $_POST['bh_class_rates']);
        $stmt->bindParam(':bh_facilities', $_POST['bh_facilities']);
        $stmt->bindParam(':bh_id', $_POST['bh_id']);
        $stmt->bindParam(':bh_uuid', $_POST['bh_uuid']);
        $stmt->bindParam(':submission_time', $_POST['submission_time']);
        $stmt->bindParam(':bh_valid_status', $_POST['bh_valid_status']);
        $stmt->bindParam(':bh_notes', $_POST['bh_notes']);
        $stmt->bindParam(':bh_status', $_POST['bh_status']);
        $stmt->bindParam(':submitted_by', $_POST['submitted_by']);
        $stmt->bindParam(':bh_version', $_POST['bh_version']);
        $stmt->bindParam(':bh_tags', $_POST['bh_tags']);


        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['success'] = "Record inserted successfully";
            header("Location: ../../create.php");
            exit();
        } else {
            // Handle query execution failure
            $_SESSION['error'] = "Failed to insert record";
            // Optionally, log the error or display a user-friendly message
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
