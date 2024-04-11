<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateform'])) {
    try {
        include '../../includes/boot.php';

        // Define variables
        $id = $_POST['id'];
        $stmt = null;

        // Check if new image is uploaded
        $newImageUploaded = isset($_FILES['bh_image']) && $_FILES['bh_image']['error'] === UPLOAD_ERR_OK;

        if ($newImageUploaded) {
            // Handle image upload
            $currentImageId = $_POST['id']; // Fix this line
            $uploadDir = '../../resources/gallery/';
            $newImageName = uniqid() . '_' . $_FILES['bh_image']['name'];
            $targetFile = $uploadDir . $newImageName;

            // Prepare statement to fetch previous image
            $stmt = $pdo->prepare("SELECT bh_image FROM boarding_house_tracking WHERE id = :id");
            $stmt->bindParam(':id', $currentImageId, PDO::PARAM_INT);
            $stmt->execute();
            $previousImage = $stmt->fetchColumn();

            // Delete previous image if exists
            if ($previousImage && file_exists($uploadDir . $previousImage)) {
                unlink($uploadDir . $previousImage);
            }

            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES['bh_image']['tmp_name'], $targetFile)) {
                // Image uploaded successfully
            } else {
                echo "Failed to move uploaded image.";
            }
        }

        // Prepare SQL statement for updating data
        $sql = "UPDATE boarding_house_tracking SET
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
        bh_ratescharge_other = :bh_ratescharge_other,
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
        bh_garbage_other = :bh_garbage_other,
        bh_dps = :bh_dps,
        bh_sewage_disposal = :bh_sewage_disposal,
        bh_sewage_other = :bh_sewage_other,
        bh_sd_dps = :bh_sd_dps,
        bh_rodent_disposal = :bh_rodent_disposal,
        bh_rodent_other = :bh_rodent_other,
        light_ventilation = :light_ventilation,
        natural_artificial = :natural_artificial,
        establishment_extension = :establishment_extension,
        specify_txt = :specify_txt,
        with_permit  = :with_permit,
        bh_remarks = :bh_remarks,
        office_required = :office_required,
        inspected_by = :inspected_by,
        acknowledge_by = :acknowledge_by,
        current_loc = :current_loc,
        bh_latitude = :bh_latitude,
        bh_longitude = :bh_longitude,
        bh_altitude = :bh_altitude,
        bh_precision = :bh_precision,
        bh_image = :bh_image
        WHERE id = :id";


        // Prepare statement
        $stmt = $pdo->prepare($sql);

       
$stmt->bindParam(':account_number', $_POST['account_number']);
$stmt->bindParam(':establishment_name', $_POST['establishment_name']);
$stmt->bindParam(':first_name', $_POST['first_name']);
$stmt->bindParam(':middle_name', $_POST['middle_name']);
$stmt->bindParam(':last_name', $_POST['last_name']);
$stmt->bindParam(':suffix', $_POST['suffix']);
$stmt->bindParam(':bh_address', $_POST['bh_address']);
$stmt->bindParam(':bh_municipality', $_POST['bh_municipality']);
$stmt->bindParam(':bh_district', $_POST['bh_district']);
$stmt->bindParam(':bh_barangay', $_POST['bh_barangay']);
$stmt->bindParam(':bh_province', $_POST['bh_province']);
$stmt->bindParam(':bh_control_no', $_POST['bh_control_no']);
$stmt->bindParam(':bh_or_num', $_POST['bh_or_num']);
$stmt->bindParam(':date_issued', $_POST['date_issued']);
$stmt->bindParam(':amount_paid', $_POST['amount_paid']);
$stmt->bindParam(':bh_bpn', $_POST['bh_bpn']);
$stmt->bindParam(':bh_mp', $_POST['bh_mp']);
$stmt->bindParam(':date_paid', $_POST['date_paid']);
$stmt->bindParam(':bh_period_cover', $_POST['bh_period_cover']);
$stmt->bindParam(':bh_complaint', $_POST['bh_complaint']);
$bh_construction_kind = isset($_POST['bh_construction_kind']) ? $_POST['bh_construction_kind'] : array();
$constructionKind = implode(',', $bh_construction_kind);
$stmt->bindParam(':bh_construction_kind', $constructionKind);

$stmt->bindParam(':bh_specify', $bh_specify, PDO::PARAM_STR);
$bh_class = isset($_POST['bh_class']) ? $_POST['bh_class'] : array();
$bhClass = implode(',', $bh_class);
$stmt->bindParam(':bh_class', $bhClass);

$stmt->bindParam(':bh_room', $_POST['bh_room']);
$stmt->bindParam(':bh_occupants', $_POST['bh_occupants']);
$stmt->bindParam(':bh_overcrowded', $_POST['bh_overcrowded']);
$stmt->bindParam(':bh_rates_charge', $_POST['bh_rates_charge']);
$stmt->bindParam(':bh_ratescharge_other', $_POST['bh_ratescharge_other']);
$stmt->bindParam(':bh_rate', $_POST['bh_rate']);
$stmt->bindParam(':bh_water_source', $bh_water_source);
$stmt->bindParam(':bh_nawasa', $bh_nawasa, PDO::PARAM_INT);
$stmt->bindParam(':bh_deepwell', $bh_deepwell, PDO::PARAM_INT);
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
$stmt->bindParam(':bh_garbage_other', $_POST['bh_garbage_other']);
$stmt->bindParam(':bh_dps', $_POST['bh_dps']);
$stmt->bindParam(':bh_sewage_disposal', $_POST['bh_sewage_disposal']);
$stmt->bindParam(':bh_sewage_other', $_POST['bh_sewage_other']);
$stmt->bindParam(':bh_sd_dps', $_POST['bh_sd_dps']);
$stmt->bindParam(':bh_rodent_disposal', $_POST['bh_rodent_disposal']);
$stmt->bindParam(':bh_rodent_other', $_POST['bh_rodent_other']);
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
        $stmt->bindParam(':bh_image', $newImageName);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Record updated successfully";
            header("Location: ../../bh_edit.php?id=" . $id);
            exit();
        } else {
            $_SESSION['error'] = "Failed to update record";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
