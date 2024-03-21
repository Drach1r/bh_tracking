<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET['id'])) {
        $record_id = $_GET['id']; // Retrieve the ID from the URL


        // Prepare SQL statement to select record based on the provided ID
        $stmt = $pdo->prepare("SELECT * FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $record_id, PDO::PARAM_INT);


        $stmt->execute();

        // Check if the record exists
        if ($stmt->rowCount() > 0) {
            // Fetch the record
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Loop through each key-value pair in $row
            foreach ($row as $key => $value) {
                // For fields with multiple values like checkboxes or inputs in loops
                if (is_array($value)) {
                    // Check if the key is set in $_POST and assign it to the variable
                    $$key = isset($_POST[$key]) ? $_POST[$key] : [];
                } else {
                    // For regular fields, assign the value directly
                    $$key = $value;
                }
            }
            // Execute the query after processing the fetched row
            $sql = "UPDATE boarding_house_tracking SET 
                account_number = :account_number,
    establishment_name = :establishment_name,
    first_name = :first_name,
    middle_name = :middle_name,
    last_name = :last_name,
    suffix = :suffix,
    bh_address = :bh_address,
    bh_municipality = :bh_municipality_hidden,
    bh_district = :bh_district,
    bh_barangay = :bh_barangay,
    bh_province = :bh_province_hidden,
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
    bh_precision = :bh_precision
               
                WHERE id = :record_id";

            $stmt = $pdo->prepare($sql);


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
            $stmt->bindParam(':bh_room', $_POST['bh_room']);
            $stmt->bindParam(':bh_occupants', $_POST['bh_occupants']);
            $stmt->bindParam(':bh_overcrowded', $_POST['bh_overcrowded']);
            $stmt->bindParam(':bh_rates_charge', $_POST['bh_rates_charge']);
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

            $stmt->bindParam(':record_id', $record_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Record updated successfully";
                header("Location: ../../bh_edit.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to update record";
            }
        } else {
            echo "No record found";
        }
    } else {
        echo "ID parameter is missing";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
