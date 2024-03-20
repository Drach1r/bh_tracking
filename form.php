<?php
include 'includes/header.php';


$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$account_number = '';
$establishment_name = '';
$first_name = '';
$middle_name = '';
$last_name = '';
$suffix = '';
$bh_address = '';
$bh_municipality = '';
$bh_district = '';
$bh_barangay = '';
$bh_province = '';
$bh_control_no = '';
$bh_or_num = '';
$date_issued = '';
$amount_paid = '';
$bh_bpn = '';
$bh_mp = '';
$date_paid = '';
$bh_period_cover = '';
$bh_complaint = '';
$bh_construction_kind = '';
$bh_specify = '';
$bh_class = '';
$bh_room = '';
$bh_occupants = '';
$bh_overcrowded = '';
$bh_rates_charge = '';
$bh_rate = '';
$bh_water_source = '';
$bh_nawasa = '';
$bh_deepwell = '';
$bh_adequate = '';
$bh_portable = '';
$bh_toilet_type = '';
$bh_toilet_cond = '';
$bh_bath_type = '';
$bh_bath_cond = '';
$bh_cr_num = '';
$bh_bathroom_num = '';
$bh_premises_cond = '';
$bh_garbage_disposal = '';
$bh_dps = '';
$bh_sewage_disposal = '';
$bh_sd_dps = '';
$bh_rodent_disposal = '';
$light_ventilation = '';
$natural_artificial = '';
$establishment_extension = '';
$specify_ext = '';
$with_permit = '';
$bh_remarks = '';
$office_required = '';
$inspected_by = '';
$acknowledge_by = '';
$current_loc = '';
$bh_latitude = '';
$bh_longitude = '';
$bh_altitude = '';
$bh_precision = '';
$bh_image = '';
$bh_permit_control = '';
$bh_class_rates = '';
$bh_facilities = '';
$bh_id = '';
$bh_uuid = '';
$submission_time = '';
$bh_valid_status = '';
$bh_notes = '';
$bh_status = '';
$submitted_by = '';
$bh_version = '';
$bh_tags = '';


if (isset($_FILES['bh_image']) && $_FILES['bh_image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'resources/gallery/';

    if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
        mkdir($uploadDir, 0777);
    }

    $uploadFile = $uploadDir . basename($_FILES['bh_image']['name']);

    if (move_uploaded_file($_FILES['bh_image']['tmp_name'], $uploadFile)) {
        $imagePath = $uploadFile;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM boarding_house_tracking WHERE bh_image = :imagePath");
        $stmt->bindParam(':imagePath', $imagePath);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $sql = "INSERT INTO boarding_house_tracking (bh_image) VALUES (:imagePath)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':imagePath', $imagePath);
        }
    }
}

if (isset($_GET['id'])) {
    $record_id = $_GET['id']; 
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM boarding_house_tracking WHERE id = :record_id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':record_id', $record_id, PDO::PARAM_INT);
        
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "No record found";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    
        $account_number = $row['account_number'] ?? '';
        $establishment_name = $row['establishment_name'] ?? '';
        $first_name = $row['first_name'] ?? '';
        $middle_name = $row['middle_name'] ?? '';
        $last_name = $row['last_name'] ?? '';
        $suffix = $row['suffix'] ?? '';
        $bh_address = $row['bh_address'] ?? '';
        $bh_municipality = $row['bh_municipality'] ?? '';
        $bh_district = $row['bh_district'] ?? '';
        $bh_barangay = $row['bh_barangay'] ?? '';
        $bh_province = $row['bh_province'] ?? '';
        $bh_control_no = $row['bh_control_no'] ?? '';
        $bh_or_num = $row['bh_or_num'] ?? '';
        $date_issued = $row['date_issued'] ?? '';
        $amount_paid = $row['amount_paid'] ?? '';
        $bh_bpn = $row['bh_bpn'] ?? '';
        $bh_mp = $row['bh_mp'] ?? '';
        $date_paid = $row['date_paid'] ?? '';
        $bh_period_cover = $row['bh_period_cover'] ?? '';
        $bh_complaint = $row['bh_complaint'] ?? '';
        $bh_construction_kind = $row['bh_construction_kind'] ?? '';
        $bh_specify = $row['bh_specify'] ?? '';
        $bh_class = $row['bh_class'] ?? '';
        $bh_room = $row['bh_room'] ?? '';
        $bh_occupants = $row['bh_occupants'] ?? '';
        $bh_overcrowded = $row['bh_overcrowded'] ?? '';
        $bh_rates_charge = $row['bh_rates_charge'] ?? '';
        $bh_rate = $row['bh_rate'] ?? '';
        $bh_water_source = $row['bh_water_source'] ?? '';
        $bh_nawasa = $row['bh_nawasa'] ?? '';
        $bh_deepwell = $row['bh_deepwell'] ?? '';
        $bh_adequate = $row['bh_adequate'] ?? '';
        $bh_portable = $row['bh_portable'] ?? '';
        $bh_toilet_type = $row['bh_toilet_type'] ?? '';
        $bh_toilet_cond = $row['bh_toilet_cond'] ?? '';
        $bh_bath_type = $row['bh_bath_type'] ?? '';
        $bh_bath_cond = $row['bh_bath_cond'] ?? '';
        $bh_cr_num = $row['bh_cr_num'] ?? '';
        $bh_bathroom_num = $row['bh_bathroom_num'] ?? '';
        $bh_premises_cond = $row['bh_premises_cond'] ?? '';
        $bh_garbage_disposal = $row['bh_garbage_disposal'] ?? '';
        $bh_dps = $row['bh_dps'] ?? '';
        $bh_sewage_disposal = $row['bh_sewage_disposal'] ?? '';
        $bh_sd_dps = $row['bh_sd_dps'] ?? '';
        $bh_rodent_disposal = $row['bh_rodent_disposal'] ?? '';
        $light_ventilation = $row['light_ventilation'] ?? '';
        $natural_artificial = $row['natural_artificial'] ?? '';
        $establishment_extension = $row['establishment_extension'] ?? '';
        $specify_ext = $row['specify_ext'] ?? '';
        $with_permit = $row['with_permit'] ?? '';
        $bh_remarks = $row['bh_remarks'] ?? '';
        $office_required = $row['office_required'] ?? '';
        $inspected_by = $row['inspected_by'] ?? '';
        $acknowledge_by = $row['acknowledge_by'] ?? '';
        $current_loc = $row['current_loc'] ?? '';
        $bh_latitude = $row['bh_latitude'] ?? '';
        $bh_longitude = $row['bh_longitude'] ?? '';
        $bh_altitude = $row['bh_altitude'] ?? '';
        $bh_precision = $row['bh_precision'] ?? '';
        $bh_image = $row['bh_image'] ?? '';
        $bh_permit_control = $row['bh_permit_control'] ?? '';
        $bh_class_rates = $row['bh_class_rates'] ?? '';
        $bh_facilities = $row['bh_facilities'] ?? '';
        $bh_id = $row['bh_id'] ?? '';
        $bh_uuid = $row['bh_uuid'] ?? '';
        $submission_time = $row['submission_time'] ?? '';
        $bh_valid_status = $row['bh_valid_status'] ?? '';
        $bh_notes = $row['bh_notes'] ?? '';
        $bh_status = $row['bh_status'] ?? '';
        $submitted_by = $row['submitted_by'] ?? '';
        $bh_version = $row['bh_version'] ?? '';
        $bh_tags = $row['bh_tags'] ?? '';
    }
}
?>



<div class="container">





    <br>
    <form action="" method="POST">
        <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
        <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">

        <h4>Boarding House Tracking Information Management Application</h4>
        <br>

        <table class="table table-bordered">
    <tbody>
        <tr>
            <td>Account Number: <strong><?php echo isset($row['account_number']) ? $row['account_number'] : ''; ?></strong></td></strong></td>
        </tr>
        <tr>
            <td>Name of Establishment: <strong><?php echo isset($row['establishment_name']) ? $row['establishment_name'] : ''; ?></strong></td></strong></td>
        </tr>
    </tbody>
</table>


        <br>
        <h4>Name of Owner/Manager</h4>

        <table class="table table-bordered">
    <tbody>
        <tr>
            <td>First Name: <strong><?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Middle Name: <strong><?php echo isset($row['middle_name']) ? $row['middle_name'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Last Name: <strong><?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Suffix: <strong><?php echo isset($row['suffix']) ? $row['suffix'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Address: <strong><?php echo isset($row['bh_address']) ? $row['bh_address'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>City/Municipality: <strong><?php echo isset($row['bh_municipality']) ? $row['bh_municipality'] : ''; ?></strong></td>
        </tr>
        <tr>
    <td colspan="14">
        <div style="display: flex; flex-wrap: wrap;">
            <span style="margin-right: 10px;">District:</span><br>
            <?php
            $districts = isset($row['bh_district']) ? explode(',', $row['bh_district']) : []; // Extract district numbers from $row['bh_district'] or initialize an empty array
            $availableDistricts = [
                1 => 'Arevalo',
                2 => 'Lapaz',
                3 => 'Molo',
                4 => 'City Proper',
                5 => 'Lapuz',
                6 => 'Jaro',
                7 => 'Mandurriao'
            ]; 

            foreach ($availableDistricts as $districtNumber => $districtName) {
                $checked = in_array($districtNumber, $districts) ? 'checked disabled' : '';

                echo "<label style=\"margin-right: 15px;\">
                        <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_district[]\" value=\"$districtNumber\" $checked>
                        $districtName
                      </label>";
            }
            ?>
        </div>
    </td>
</tr>
<tr>
    <td>Barangay: 
        <strong>
            <?php
            $selectedBarangay = isset($row['bh_barangay']) ? $row['bh_barangay'] : null;
            if ($selectedBarangay !== null) {
                try {
                    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "SELECT barangay FROM bh_address WHERE id = ?";
                    $statement = $pdo->prepare($query);
                    $statement->bindParam(1, $selectedBarangay, PDO::PARAM_INT);
                    $statement->execute();
                    $barangay = $statement->fetchColumn();

                    echo $barangay !== false ? $barangay : "";
                } catch (PDOException $e) {
                    die("Error in executing query: " . $e->getMessage());
                }
            } else {
                echo "";
            }
            ?>
        </strong>
    </td>
</tr>



        <tr>
            <td>Province: <strong><?php echo isset($row['bh_province']) ? $row['bh_province'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>BH Control No.: <strong><?php echo isset($row['bh_control_no']) ? $row['bh_control_no'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>OR Number: <strong><?php echo isset($row['bh_or_num']) ? $row['bh_or_num'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Date Issued: <strong><?php echo isset($row['date_issued']) ? $row['date_issued'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Amount Paid: <strong><?php echo isset($row['amount_paid']) ? $row['amount_paid'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Business Permit Number: <strong><?php echo isset($row['bh_bpn']) ? $row['bh_bpn'] : ''; ?></strong></td>
        </tr>
        <tr>
    <td>Mode of Payment: <strong>
    <?php
            $payments = isset($row['bh_mp']) ? explode(',', $row['bh_mp']) : [];
            $available_payment = ['Annual', 'Quarterly', 'Semi-Annual'];
            foreach ($available_payment as $payment) {
                $checked = in_array(strtolower($payment), $payments) ? 'checked disabled' : 'disabled';
                echo "<label style=\"margin-right: 15px;\">
                    <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_mp[]\" value=\"$payment\" $checked>
                    $payment
                </label>";
            }
            ?>
    </strong>
    </td>
</tr>


        <tr>
            <td>Date Paid: <strong><?php echo isset($row['date_paid']) ? $row['date_paid'] : ''; ?></strong></td>
        </tr>
        <tr>
            <td>Period Covered: <strong><?php echo isset($row['bh_period_cover']) ? $row['bh_period_cover'] : ''; ?></strong></td>
        </tr>
        <tr>
    <td>Compliant: <strong>
            <?php
            $compliant = isset($row['bh_complaint']) ? explode(',', $row['bh_complaint']) : [];
            $availableComplaints = ['Yes', 'No'];
            foreach ($availableComplaints as $item) {
                $checked = in_array(strtolower($item), $compliant) ? 'checked disabled' : 'disabled';
                echo "<label style=\"margin-right: 15px;\">
                    <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_complaint[]\" value=\"$item\" $checked>
                    $item
                </label>";
            }
            ?>
        </strong>
    </td>
</tr>

    </tbody>
</table>

<tr>
    <td colspan="2">
        <h4>Classification and Rates</h4>
        <table class="table table-bordered">
            <tbody>
            <tr>
    <td>Kind of Construction of the Boarding House: <strong>
        <br>
        <?php
        $construction_kinds = isset($row['bh_construction_kind']) ? explode(',', $row['bh_construction_kind']) : [];
        $available_construction_kinds = ['A Made of Strong Materials', 'B Made of Light Materials', 'C Other (Specify)'];
        foreach ($available_construction_kinds as $construction_kind) {
            $cleaned_construction_kind = strtolower(str_replace(' ', '_', $construction_kind));
            $alternative_construction_kind = strtolower(str_replace('_', ' ', $construction_kind));
            $checked = in_array($cleaned_construction_kind, array_map('strtolower', $construction_kinds)) ||
                       in_array($alternative_construction_kind, array_map('strtolower', $construction_kinds)) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_construction_kind[]\" value=\"$cleaned_construction_kind\" $checked>
                $construction_kind
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>





        <tr>
            <td>Specify: <strong>
                    <p>Kind of construction of the boarding house</p>
                    <?php echo isset($row['bh_specify']) ? $row['bh_specify'] : ''; ?>
                </strong readonly>
            </td>
        </tr>

        <tr>
    <td style="margin-right:">
        Class of the Boarding House: <strong>
        <br>
        <?php
        $classes = isset($row['bh_class']) ? explode(',', str_replace([' ', '_'], '', $row['bh_class'])) : [];
        $availableClasses = ['Class A', 'Class B', 'Class C', 'Class D'];
        foreach ($availableClasses as $class) {
            $cleaned_class = str_replace([' ', '_'], '', $class);
            $checked = in_array(strtolower($cleaned_class), array_map('strtolower', $classes)) ? 'checked' : '';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_class[]\" value=\"$class\" $checked disabled>
                $class
            </label>";
        }
        ?>
        </strong>
    </td>
</tr>





<tr>
    <td>No. of Rooms: <strong><?php echo isset($row['bh_room']) ? $row['bh_room'] : ''; ?></strong readonly></td>
</tr>

<tr>
    <td>No. of Occupants: <strong><?php echo isset($row['bh_occupants']) ? $row['bh_occupants'] : ''; ?></strong readonly></td>
</tr>

<tr>
    <td>Overcrowded: <strong>
    <?php
            $overcrowded = isset($row['bh_overcrowded']) ? explode(',', $row['bh_overcrowded']) : [];
            $availableOvercroded = ['Yes', 'No'];
            foreach ($availableOvercroded as $item) {
                $checked = in_array(strtolower($item), $overcrowded) ? 'checked disabled' : 'disabled';
                echo "<label style=\"margin-right: 15px;\">
                    <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_overcrowded[]\" value=\"$item\" $checked>
                    $item
                </label>";
            }
            ?>
        </strong>
    </td>
</tr>



<tr>
    <td>Rates being Charged: <strong>
        <br>
        <?php
        $rates = isset($row['bh_rates_charge']) ? explode(',', $row['bh_rates_charge']) : [];
        $availableRates = ['Lodging', 'Board', 'Bed Space', 'Room Rent', 'House Rent', 'Rent Per Unit(Apartment)'];
        foreach ($availableRates as $rate) {
            $cleaned_rate = strtolower(str_replace(' ', '_', trim($rate)));
            $checked = in_array($cleaned_rate, array_map('strtolower', array_map('trim', $rates))) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_rates_charge[]\" value=\"$rate\" $checked>
                $rate
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>



<tr>
    <td>Rate: <strong><?php echo isset($row['bh_rate']) ? $row['bh_rate'] : ''; ?></strong readonly></td>
</tr>

    </tbody>
</table>





        <h4>Facilities and Sanitary</h4>

        <table class="table table-bordered">
            <tbody>
            <tr>
    <td>Source of Water Supply: <strong>
        <br>
        <?php
        $sources = isset($row['bh_water_source']) ? explode(',', str_replace([' ', '_'], '', $row['bh_water_source'])) : [];
        $available_source = ['NAWASA', 'Deep Well'];
        foreach ($available_source as $source) {
            $cleaned_source = str_replace([' ', '_'], '', $source);
            $checked = in_array(strtolower($cleaned_source), array_map('strtolower', $sources)) ? 'checked' : '';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_water_source[]\" value=\"$source\" $checked disabled>
                $source
            </label>";
        }
        ?>
    </td>
</tr>

<tr>
    <td>Adequate: <strong>
            <div style="display: flex;">
                <?php
                $adequate_status = isset($row['bh_adequate']) ? explode(',', $row['bh_adequate']) : [];
                $available_adequate = ['Yes', 'No'];
                foreach ($available_adequate as $status) {
                    $checked = in_array(strtolower($status), $adequate_status) ? 'checked disabled' : 'disabled';
                    echo "<label style=\"margin-right: 15px;\">
                        <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_adequate[]\" value=\"$status\" $checked>
                        $status
                    </label>";
                }
                ?>
            </div>
    </td>
</tr>

<tr>
    <td>Portable: <strong>
            <div style="display: flex;">
                <?php
                $portable_status = isset($row['bh_portable']) ? explode(',', $row['bh_portable']) : [];
                $available_portable = ['Yes', 'No'];
                foreach ($available_portable as $status) {
                    $checked = in_array(strtolower($status), $portable_status) ? 'checked disabled' : 'disabled';
                    echo "<label style=\"margin-right: 15px;\">
                        <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_portable[]\" value=\"$status\" $checked>
                        $status
                    </label>";
                }
                ?>
            </div>
    </td>
</tr>

                <tr>
    <td>Toilet Facilities Type: <strong>
        <?php echo isset($row['bh_toilet_type']) ? $row['bh_toilet_type'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
            <td>Sanitary Condition: <strong>
                    <br>
                    <?php
                    $toilet_conditions = isset($row['bh_toilet_cond']) ? explode(',', $row['bh_toilet_cond']) : [];
                    $available_conditions = ['Good', 'Fair', 'Poor'];
                    foreach ($available_conditions as $condition) {
                        $checked = in_array(strtolower($condition), $toilet_conditions) ? 'checked disabled' : 'disabled';
                        echo "<label style=\"margin-right: 15px;\">
                            <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_toilet_cond[]\" value=\"$condition\" $checked>
                            $condition
                        </label>";
                    }
                    ?>
            </td>
        </tr>

<tr>
    <td>Bath Facilities Type: <strong>
        <?php echo isset($row['bh_bath_type']) ? $row['bh_bath_type'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
            <td>Sanitary Condition: <strong>
                    <br>
                    <?php
                    $bath_conditions = isset($row['bh_bath_cond']) ? explode(',', $row['bh_bath_cond']) : [];
                    $available1_conditions = ['Good', 'Fair', 'Poor'];
                    foreach ($available1_conditions as $condition) {
                        $checked = in_array(strtolower($condition), $bath_conditions) ? 'checked disabled' : 'disabled';
                        echo "<label style=\"margin-right: 15px;\">
                            <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_bath_cond[]\" value=\"$condition\" $checked>
                            $condition
                        </label>";
                    }
                    ?>
            </td>
        </tr>


<tr>
    <td>Total Number of Comfort Room: <strong>
        <?php echo isset($row['bh_cr_num']) ? $row['bh_cr_num'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Total Number of Bathroom: <strong>
        <?php echo isset($row['bh_bathroom_num']) ? $row['bh_bathroom_num'] : ''; ?>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>Sanitary Condition: <strong>
        <br>
        <?php
                    $premises_conditions = isset($row['bh_premises_cond']) ? explode(',', $row['bh_premises_cond']) : [];
                    $available2_conditions = ['Good', 'Fair', 'Poor'];
                    foreach ($available2_conditions as $condition) {
                        $checked = in_array(strtolower($condition), $premises_conditions) ? 'checked disabled' : 'disabled';
                        echo "<label style=\"margin-right: 15px;\">
                            <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_premises_cond[]\" value=\"$condition\" $checked>
                            $condition
                        </label>";
                    }
                    ?>
    </strong>
    </td>
</tr>

<tr>
    <td>1. Type of Garbage Disposal: <strong>
        <br>
        <?php
        $garbage_disposal = isset($row['bh_garbage_disposal']) ? explode(',', $row['bh_garbage_disposal']) : [];
        $available_disposal_types = ['DPS'];
        foreach ($available_disposal_types as $type) {
            $checked = in_array(strtolower($type), $garbage_disposal) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_garbage_disposal[]\" value=\"" . strtolower($type) . "\" $checked>
                $type
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>

<tr>
    <td>2. Type of Sewage Disposal: <strong>
        <br>
        <?php
        $sewage_disposal = isset($row['bh_sewage_disposal']) ? explode(',', $row['bh_sewage_disposal']) : [];
        foreach ($available_disposal_types as $type) {
            $checked = in_array(strtolower($type), $sewage_disposal) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_sewage_disposal[]\" value=\"" . strtolower($type) . "\" $checked>
                $type
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>


<tr>
    <td>3. Type of Rodent / Vermin Disposal: <strong>
        <br>
        <?php
        $rodent_disposal = isset($row['bh_rodent_disposal']) ? explode(',', $row['bh_rodent_disposal']) : [];
        foreach ($available_disposal_types as $type) {
            $checked = in_array(strtolower($type), $rodent_disposal) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"bh_rodent_disposal[]\" value=\"$type\" $checked>
                $type
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>

<tr>
    <td>Lightning and Ventilation: <strong>
        <br>
        <?php
        $light_ventilation = isset($row['light_ventilation']) ? explode(',', $row['light_ventilation']) : [];
        $available_ventilation_types = ['Natural', 'Artificial'];
        foreach ($available_ventilation_types as $type) {
            $checked = in_array(strtolower($type), $light_ventilation) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"light_ventilation[]\" value=\"$type\" $checked>
                $type
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>

<tr>
    <td>Natural Artificial: <strong>
        <br>
        <?php
        $natural_artificial = isset($row['natural_artificial']) ? explode(',', $row['natural_artificial']) : [];
        $available_natural_artificial = ['Satisfactory', 'Unsatisfactory'];
        foreach ($available_natural_artificial as $type) {
            $checked = in_array(strtolower($type), $natural_artificial) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"natural_artificial[]\" value=\"$type\" $checked>
                $type
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>
<tr>
    <td>Is there any extension or additional construction in the establishment: <strong>
        <br>
        <?php
        $extension_options = isset($row['with_permit']) ? explode(',', $row['with_permit']) : [];
        $available_extension = ['Yes', 'No'];
        foreach ($available_extension as $extension) {
            $checked = in_array(strtolower($extension), $extension_options) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"with_permit[]\" value=\"" . strtolower($extension) . "\" $checked>
                $extension
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>


<tr>
    <td>Specify If Yes: <strong>
        <?php echo isset($row['specify_ext']) ? $row['specify_ext'] : ''; ?>
    </strong>
    </td>
</tr>

<tr>
<tr>
    <td>With Permit: <strong>
        <br>
        <?php
        $permit_options = isset($row['with_permit']) ? explode(',', $row['with_permit']) : [];
        $available_permits = ['Yes', 'No'];
        foreach ($available_permits as $permit) {
            $checked = in_array(strtolower($permit), $permit_options) ? 'checked disabled' : 'disabled';
            echo "<label style=\"margin-right: 15px;\">
                <input type=\"checkbox\" style=\"margin-right: 5px;\" name=\"with_permit[]\" value=\"" . strtolower($permit) . "\" $checked>
                $permit
            </label>";
        }
        ?>
    </strong>
    </td>
</tr>

    </strong>
    </td>
</tr>

<tr>
    <td>Remarks and Recommendations: <strong>
        <?php echo isset($row['bh_remarks']) ? $row['bh_remarks'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>You are hereby requested to appear before this office: <strong>
        <p>Failure to do so will compel this commission to file necessary action against your
            business establishment.</p>
        <?php echo isset($row['office_required']) ? $row['office_required'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Inspected by: <strong>
        <?php echo isset($row['inspected_by']) ? $row['inspected_by'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Acknowledge by: <strong>
        <?php echo isset($row['acknowledge_by']) ? $row['acknowledge_by'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Get Current Location: <strong>
        <?php echo isset($row['current_loc']) ? $row['current_loc'] : ''; ?>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>Latitude (x.y): <strong>
        <?php echo isset($row['bh_latitude']) ? $row['bh_latitude'] : ''; ?>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>Longitude (x.y): <strong>
        <?php echo isset($row['bh_longitude']) ? $row['bh_longitude'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Altitude (m): <strong>
        <?php echo isset($row['bh_altitude']) ? $row['bh_altitude'] : ''; ?>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>Accuracy (m): <strong>
        <?php echo isset($row['bh_precision']) ? $row['bh_precision'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>  
    <td>Boarding House Picture:
    <?php
        if (isset($row['bh_image'])) {
            $imagePath = "resources/gallery/" . $row['bh_image'];
            if (file_exists($imagePath)) {
                echo "<img src='{$imagePath}' alt='Uploaded Image' class='mx-auto d-block' style='max-width: 100%; height: auto;'>";
            } else {
                echo $row['bh_image'];
            }
        } else {
            echo "No image found";
        }
        ?>
    </td>
</tr>


            </tbody>
        </table>

    </form>
</div>
<?php include 'includes/footer.php'; ?>