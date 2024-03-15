<?php
include 'includes/header.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables with blank values
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

if (isset($_GET['id'])) {
    $record_id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM boarding_house_tracking WHERE id = $record_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row if it exists

        // Assign values to variables
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
            <td>Account Number: <strong><?php echo $account_number; ?></strong></td>
        </tr>
        <tr>
            <td>Name of Establishment: <strong><?php echo $establishment_name; ?></strong></td>
        </tr>
        <!-- Add other rows similarly for other fields -->
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
            <td colspan="14">District:<br>
                <?php
                $districts = isset($row['bh_district']) ? explode(',', $row['bh_district']) : [];
                $districtsChecked = isset($row['bh_district']) ? explode(',', $row['bh_district']) : [];
                $availableDistricts = ['Arevalo', 'Lapaz', 'Molo', 'City Proper', 'Lapuz', 'Jaro', 'Mandurriao'];
                foreach ($availableDistricts as $district) {
                    $checked = in_array($district, $districtsChecked) ? 'checked disabled' : 'disabled';
                    echo "<label class=\"form-check-label\">
                        <input type=\"checkbox\" class=\"form-check-input\" name=\"bh_district[]\" value=\"$district\" $checked>
                        $district
                    </label>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Barangay: <strong><?php echo isset($row['bh_barangay']) ? $row['bh_barangay'] : ''; ?></strong></td>
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
                    $modes = isset($row['bh_mp']) ? explode(',', $row['bh_mp']) : [];
                    $availableModes = ['Annual', 'Quarterly', 'Semi-Annual'];
                    foreach ($availableModes as $mode) {
                        $checked = in_array($mode, $modes) ? 'checked disabled' : 'disabled';
                        echo "<label class=\"form-check-label\">
                            <input type=\"checkbox\" class=\"form-check-input\" name=\"bh_mp[]\" value=\"$mode\" $checked>
                            $mode
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
            <td>Complaint: <strong>
                    <?php
                    $complaint = isset($row['bh_complaint']) ? explode(',', $row['bh_complaint']) : [];
                    $availableComplaints = ['Yes', 'No'];
                    foreach ($availableComplaints as $item) {
                        $checked = in_array($item, $complaint) ? 'checked disabled' : 'disabled';
                        echo "<label class=\"form-check-label\">
                            <input type=\"checkbox\" class=\"form-check-input\" name=\"bh_complaint[]\" value=\"$item\" $checked>
                            $item
                        </label>";
                    }
                    ?>
                </strong>
            </td>
        </tr>
    </tbody>
</table>


        <br>
        <h4>Classification and Rates</h4>
        <table class="table table-bordered">
    <tbody>
        <tr>
            <td>Kind of Construction of the Boarding House: <strong>
                    <br>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_construction_kind[]"
                            value="A. Made of Strong Materials" <?php echo isset($row['bh_construction_kind']) && in_array('A. Made of Strong Materials', explode(',', $row['bh_construction_kind'])) ? 'checked disabled' : 'disabled'; ?>>
                        A. Made of Strong Materials
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_construction_kind[]"
                            value="B. Made of Light Materials" <?php echo isset($row['bh_construction_kind']) && in_array('B. Made of Light Materials', explode(',', $row['bh_construction_kind'])) ? 'checked disabled' : 'disabled'; ?>>
                        B. Made of Light Materials
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_construction_kind[]"
                            value="C. Other (Specify)" <?php echo isset($row['bh_construction_kind']) && in_array('C. Other (Specify)', explode(',', $row['bh_construction_kind'])) ? 'checked disabled' : 'disabled'; ?>>
                        C. Other (Specify)
                    </label>
                </strong readonly>
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
            <td>Class of the Boarding House: <strong>
                    <br>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_class[]" value="Class A" <?php echo isset($row['bh_class']) && in_array('Class A', explode(',', $row['bh_class'])) ? 'checked disabled' : 'disabled'; ?>>
                        Class A
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_class[]" value="Class B" <?php echo isset($row['bh_class']) && in_array('Class B', explode(',', $row['bh_class'])) ? 'checked disabled' : 'disabled'; ?>>
                        Class B
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_class[]" value="Class C" <?php echo isset($row['bh_class']) && in_array('Class C', explode(',', $row['bh_class'])) ? 'checked disabled' : 'disabled'; ?>>
                        Class C
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_class[]" value="Class D" <?php echo isset($row['bh_class']) && in_array('Class D', explode(',', $row['bh_class'])) ? 'checked disabled' : 'disabled'; ?>>
                        Class D
                    </label>
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
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_overcrowded" value="Yes" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_overcrowded" value="No" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                    </label>
                </strong readonly>
            </td>
        </tr>


        <tr>
            <td>Rates being Charged: <strong>
                    <br>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]" value="Lodging"
                            <?php echo isset($row['bh_rates_charge']) && in_array('Lodging', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        Lodging
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]" value="Board"
                            <?php echo isset($row['bh_rates_charge']) && in_array('Board', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        Board
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]"
                            value="Bed Space" <?php echo isset($row['bh_rates_charge']) && in_array('Bed Space', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        Bed Space
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]"
                            value="Room Rent" <?php echo isset($row['bh_rates_charge']) && in_array('Room Rent', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        Room Rent
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]"
                            value="House Rent" <?php echo isset($row['bh_rates_charge']) && in_array('House Rent', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        House Rent
                    </label>
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bh_rates_charge[]"
                            value="Rent Per Unit(Apartment)" <?php echo isset($row['bh_rates_charge']) && in_array('Rent Per Unit(Apartment)', explode(',', $row['bh_rates_charge'])) ? 'checked disabled' : 'disabled'; ?>>
                        Rent Per Unit(Apartment)
                    </label>
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
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="bh_water_source[]" value="NAWASA"
                                    <?php echo isset($row['bh_water_source']) && in_array('NAWASA', explode(',', $row['bh_water_source'])) ? 'checked disabled' : 'disabled'; ?>>
                                NAWASA
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="bh_water_source[]"
                                    value="Deep Well" <?php echo isset($row['bh_water_source']) && in_array('Deep Well', explode(',', $row['bh_water_source'])) ? 'checked disabled' : 'disabled'; ?>>
                                Deep Well
                            </label>

                    </td>

                </tr>
                <td>Adequate: <strong>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bh_adequate" value="Yes" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bh_adequate" value="No" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                        </label> </strong readonly>
                </td>
                </tr>

                <td>Portable: <strong>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bh_portable" value="Yes" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bh_portable" value="No" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                        </label> </strong readonly>
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
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_toilet_cond[]" value="Good"
                <?php echo isset($row['bh_toilet_cond']) && in_array('Good', explode(',', $row['bh_toilet_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Good
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_toilet_cond[]" value="Fair"
                <?php echo isset($row['bh_toilet_cond']) && in_array('Fair', explode(',', $row['bh_toilet_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Fair
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_toilet_cond[]" value="Poor"
                <?php echo isset($row['bh_toilet_cond']) && in_array('Poor', explode(',', $row['bh_toilet_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Poor
        </label>
    </strong readonly>
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
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_bath_cond[]" value="Good" <?php echo isset($row['bh_bath_cond']) && in_array('Good', explode(',', $row['bh_bath_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Good
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_bath_cond[]" value="Fair" <?php echo isset($row['bh_bath_cond']) && in_array('Fair', explode(',', $row['bh_bath_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Fair
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_bath_cond[]" value="Poor" <?php echo isset($row['bh_bath_cond']) && in_array('Poor', explode(',', $row['bh_bath_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Poor
        </label>
    </strong readonly>
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
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_premises_cond[]" value="Good"
                <?php echo isset($row['bh_premises_cond']) && in_array('Good', explode(',', $row['bh_premises_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Good
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_premises_cond[]" value="Fair"
                <?php echo isset($row['bh_premises_cond']) && in_array('Fair', explode(',', $row['bh_premises_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Fair
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_premises_cond[]" value="Poor"
                <?php echo isset($row['bh_premises_cond']) && in_array('Poor', explode(',', $row['bh_premises_cond'])) ? 'checked disabled' : 'disabled'; ?>>
            Poor
        </label>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>1. Type of Garbage Disposal: <strong>
        <br>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_garbage_disposal[]" value="DPS"
                <?php echo isset($row['bh_garbage_disposal']) && in_array('DPS', explode(',', $row['bh_garbage_disposal'])) ? 'checked disabled' : 'disabled'; ?>>
            DPS
        </label>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>2. Type of Sewage Disposal: <strong>
        <br>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_sewage_disposal[]" value="DPS"
                <?php echo isset($row['bh_sewage_disposal']) && in_array('DPS', explode(',', $row['bh_sewage_disposal'])) ? 'checked disabled' : 'disabled'; ?>>
            DPS
        </label>
    </strong readonly>
    </td>
</tr>
<tr>
    <td>3. Type of Rodent / Vermin Disposal: <strong>
        <br>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="bh_rodent_disposal[]" value="DPS"
                <?php echo isset($row['bh_rodent_disposal']) && in_array('DPS', explode(',', $row['bh_rodent_disposal'])) ? 'checked disabled' : 'disabled'; ?>>
            DPS
        </label>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Lightning and Ventilation: <strong>
        <br>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="light_ventilation[]"
                value="Natural" <?php echo isset($row['light_ventilation']) && in_array('Natural', explode(',', $row['light_ventilation'])) ? 'checked disabled' : 'disabled'; ?>>
            Natural
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="light_ventilation[]"
                value="Artificial" <?php echo isset($row['light_ventilation']) && in_array('Artificial', explode(',', $row['light_ventilation'])) ? 'checked disabled' : 'disabled'; ?>>
            Artificial
        </label>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Natural Artificial: <strong>
        <br>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="natural_artificial[]"
                value="Satisfactory" <?php echo isset($row['natural_artificial']) && in_array('Satisfactory', explode(',', $row['natural_artificial'])) ? 'checked disabled' : 'disabled'; ?>>
            Satisfactory
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="natural_artificial[]"
                value="Unsatisfactory" <?php echo isset($row['natural_artificial']) && in_array('Unsatisfactory', explode(',', $row['natural_artificial'])) ? 'checked disabled' : 'disabled'; ?>>
            Unsatisfactory
        </label>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>Is there any extension or additional construction in the establishment: <strong>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="establishment_extension" value="Yes"
                <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="establishment_extension" value="No"
                <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
        </label>
    </strong readonly>
    </td>
</tr>


<tr>
    <td>Specify If Yes: <strong>
        <?php echo isset($row['specify_ext']) ? $row['specify_ext'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<tr>
    <td>With Permit: <strong>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="with_permit" value="Yes" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="with_permit" value="No" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
        </label>
    </strong readonly>
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
        <?php echo isset($row['bh_accuracy']) ? $row['bh_accuracy'] : ''; ?>
    </strong readonly>
    </td>
</tr>

<td>Boarding House Picture:</td>

            </tbody>
        </table>

    </form>
</div>
<?php include 'includes/footer.php'; ?>