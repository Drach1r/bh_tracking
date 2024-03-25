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
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if 'id' parameter is set in the POST data
        if (isset($_POST['id'])) {

            // Collect updated data from the form
            // Update each field in the database
            $id = htmlspecialchars($_POST['id']);


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
            $updateStmt->bindParam(':account_number', $_POST['account_number']);
            $updateStmt->bindParam(':establishment_name', $_POST['establishment_name']);
            $updateStmt->bindParam(':first_name', $_POST['first_name']);
            $updateStmt->bindParam(':middle_name', $_POST['middle_name']);
            $updateStmt->bindParam(':last_name', $_POST['last_name']);
            $updateStmt->bindParam(':suffix', $_POST['suffix']);
            $updateStmt->bindParam(':bh_address', $_POST['bh_address']);
            $updateStmt->bindParam(':bh_municipality', $_POST['bh_municipality']);
            $updateStmt->bindParam(':bh_district', $_POST['bh_district']);
            $updateStmt->bindParam(':bh_barangay', $_POST['bh_barangay']);
            $updateStmt->bindParam(':bh_province', $_POST['bh_province']);
            $updateStmt->bindParam(':bh_control_no', $_POST['bh_control_no']);
            $updateStmt->bindParam(':bh_or_num', $_POST['bh_or_num']);
            $updateStmt->bindParam(':date_issued', $_POST['date_issued']);
            $updateStmt->bindParam(':amount_paid', $_POST['amount_paid']);
            $updateStmt->bindParam(':bh_bpn', $_POST['bh_bpn']);
            $updateStmt->bindParam(':bh_mp', $_POST['bh_mp']);
            $updateStmt->bindParam(':date_paid', $_POST['date_paid']);
            $updateStmt->bindParam(':bh_period_cover', $_POST['bh_period_cover']);
            $updateStmt->bindParam(':bh_complaint', $_POST['bh_complaint']);
            $updateStmt->bindParam(':bh_room', $_POST['bh_room']);
            $updateStmt->bindParam(':bh_occupants', $_POST['bh_occupants']);
            $updateStmt->bindParam(':bh_overcrowded', $_POST['bh_overcrowded']);
            $updateStmt->bindParam(':bh_rates_charge', $_POST['bh_rates_charge']);
            $updateStmt->bindParam(':bh_rate', $_POST['bh_rate']);
            $updateStmt->bindParam(':bh_water_source', $_POST['bh_water_source']);
            $updateStmt->bindParam(':bh_nawasa', $_POST['bh_nawasa']);
            $updateStmt->bindParam(':bh_deepwell', $_POST['bh_deepwell']);
            $updateStmt->bindParam(':bh_adequate', $_POST['bh_adequate']);
            $updateStmt->bindParam(':bh_portable', $_POST['bh_portable']);
            $updateStmt->bindParam(':bh_toilet_type', $_POST['bh_toilet_type']);
            $updateStmt->bindParam(':bh_toilet_cond', $_POST['bh_toilet_cond']);
            $updateStmt->bindParam(':bh_bath_type', $_POST['bh_bath_type']);
            $updateStmt->bindParam(':bh_bath_cond', $_POST['bh_bath_cond']);
            $updateStmt->bindParam(':bh_cr_num', $_POST['bh_cr_num']);
            $updateStmt->bindParam(':bh_bathroom_num', $_POST['bh_bathroom_num']);
            $updateStmt->bindParam(':bh_premises_cond', $_POST['bh_premises_cond']);
            $updateStmt->bindParam(':bh_garbage_disposal', $_POST['bh_garbage_disposal']);
            $updateStmt->bindParam(':bh_dps', $_POST['bh_dps']);
            $updateStmt->bindParam(':bh_sewage_disposal', $_POST['bh_sewage_disposal']);
            $updateStmt->bindParam(':bh_sd_dps', $_POST['bh_sd_dps']);
            $updateStmt->bindParam(':bh_rodent_disposal', $_POST['bh_rodent_disposal']);
            $updateStmt->bindParam(':light_ventilation', $_POST['light_ventilation']);
            $updateStmt->bindParam(':natural_artificial', $_POST['natural_artificial']);
            $updateStmt->bindParam(':establishment_extension', $_POST['establishment_extension']);
            $updateStmt->bindParam(':specify_txt', $_POST['specify_txt']);
            $updateStmt->bindParam(':with_permit', $_POST['with_permit']);
            $updateStmt->bindParam(':bh_remarks', $_POST['bh_remarks']);
            $updateStmt->bindParam(':office_required', $_POST['office_required']);
            $updateStmt->bindParam(':inspected_by', $_POST['inspected_by']);
            $updateStmt->bindParam(':acknowledge_by', $_POST['acknowledge_by']);
            $updateStmt->bindParam(':current_loc', $_POST['current_loc']);
            $updateStmt->bindParam(':bh_latitude', $_POST['bh_latitude']);
            $updateStmt->bindParam(':bh_longitude', $_POST['bh_longitude']);
            $updateStmt->bindParam(':bh_altitude', $_POST['bh_altitude']);
            $updateStmt->bindParam(':bh_precision', $_POST['bh_precision']);
            $updateStmt->bindParam(':bh_image', $_POST['bh_image']);
            $updateStmt->bindParam(':bh_permit_control', $_POST['bh_permit_control']);
            $updateStmt->bindParam(':bh_class_rates', $_POST['bh_class_rates']);
            $updateStmt->bindParam(':bh_facilities', $_POST['bh_facilities']);
            $updateStmt->bindParam(':bh_id', $_POST['bh_id']);
            $updateStmt->bindParam(':bh_uuid', $_POST['bh_uuid']);
            $updateStmt->bindParam(':submission_time', $_POST['submission_time']);
            $updateStmt->bindParam(':bh_valid_status', $_POST['bh_valid_status']);
            $updateStmt->bindParam(':bh_notes', $_POST['bh_notes']);
            $updateStmt->bindParam(':bh_status', $_POST['bh_status']);
            $updateStmt->bindParam(':submitted_by', $_POST['submitted_by']);

            if (isset($_POST['bh_construction_kind']) && is_array($_POST['bh_construction_kind'])) {
                $bh_construction_kind = implode(',', $_POST['bh_construction_kind']);
                $updateStmt->bindParam(':bh_construction_kind', $bh_construction_kind);
            } else {
                // Handle the case where 'bh_construction_kind' is not an array or not set
                // You might want to provide a default value or handle the absence of this data according to your application logic
            }

            if (isset($_POST['bh_specify']) && is_string($_POST['bh_specify'])) {
                $updateStmt->bindParam(':bh_specify', $_POST['bh_specify']);
            } else {
                // Handle the case where 'bh_specify' is not a string or not set
            }

            if (isset($_POST['bh_class']) && is_array($_POST['bh_class'])) {
                // Convert the array to a string
                $bh_class = implode(',', $_POST['bh_class']);
                $updateStmt->bindParam(':bh_class', $bh_class);
            } else {
                // Handle the case where 'bh_class' is not an array or not set
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

?>

<h3 style="margin-left: 135px;" class="title">Edit Record</h3>

<section class="container">
    <div class="row">
        <div class="card-body">
            <div class="card-title-body">
            </div>
            <br>
            <div class="card card-block  col-lg-12" style=" background-color: white; ">
                <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">




                    <br>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-3">

                            <label for="account_number">Account Number:</label>
                            <input type="text" id="account_number" name="account_number" class="form-control" value="<?php echo isset($row['account_number']) ? $row['account_number'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-5">

                            <label for="establishment_name">Name of Establishment:</label>
                            <input type="text" id="establishment_name" name="establishment_name" class="form-control" value="<?php echo isset($row['establishment_name']) ? $row['establishment_name'] : ''; ?>">
                        </div>

                    </div>
                    <BR>
                    <h2>Name of Owner / Manager</h2>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="middlename">Middle Name:</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control" value="<?php echo isset($row['middle_name']) ? $row['middle_name'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="suffix">Suffix:</label>
                            <input type="text" name="suffix" id="suffix" class="form-control" value="<?php echo isset($row['suffix']) ? $row['suffix'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">

                            <label for="bh_address">Address:</label>
                            <input type="text" id="bh_address" name="bh_address" class="form-control" value="<?php echo isset($row['bh_address']) ? $row['bh_address'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="bh_municipality">City/Municipality:</label>
                            <input type="text" id="bh_municipality" name="bh_municipality" class="form-control" value="<?php echo isset($row['bh_municipality']) ? $row['bh_municipality'] : ''; ?>">
                            <!-- Hidden input field to store the value -->
                            <input type="hidden" name="bh_municipality_hidden" value="ILOILO CITY">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_district">District:</label>
                            <select id="bh_district" name="bh_district" class="form-control" onchange="populateBarangays()" required>
                                <option value="" disabled selected> -- Select District --</option>
                                <?php
                                $districts = array(
                                    "Arevalo" => 1,
                                    "City Proper" => 2,
                                    "Jaro" => 3,
                                    "Lapaz" => 4,
                                    "Lapuz" => 5,
                                    "Mandurriao" => 6,
                                    "Molo" => 7
                                );

                                foreach ($districts as $district_label => $numeric_value) {
                                    echo "<option value='" . $numeric_value . "'>" . $district_label . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_barangay">Barangay:</label>
                            <select id="bh_barangay" name="bh_barangay" class="form-control">
                                <option value="" disabled selected> -- Select Barangay --</option>
                            </select>
                        </div>

                        <script>
                            function populateBarangays() {
                                var districtId = document.getElementById("bh_district").value;
                                var districtName = getDistrictName(districtId);

                                if (districtName !== "") {
                                    document.getElementById("bh_barangay").innerHTML = "<option value='' disabled selected> -- Select Barangay --</option>";

                                    fetch('get_barangays.php?district=' + districtName)
                                        .then(response => response.json())
                                        .then(data => {
                                            data.forEach(barangay => {
                                                var option = document.createElement("option");
                                                option.text = barangay.barangay;
                                                option.value = barangay.id;
                                                document.getElementById("bh_barangay").add(option);
                                            });
                                        })
                                        .catch(error => console.error('Error fetching barangays:', error));
                                }
                            }

                            // Function to get district name based on its ID
                            function getDistrictName(districtId) {
                                switch (districtId) {
                                    case '1':
                                        return "Arevalo";
                                    case '2':
                                        return "City Proper";
                                    case '3':
                                        return "Jaro";
                                    case '4':
                                        return "Lapaz";
                                    case '5':
                                        return "Lapuz";
                                    case '6':
                                        return "Mandurriao";
                                    case '7':
                                        return "Molo";
                                    default:
                                        return "";
                                }
                            }
                        </script>



                        <div class="form-group col-md-3">
                            <label for="bh_province">Province:</label>
                            <input type="text" id="bh_province" name="bh_province" class="form-control" value="<?php echo isset($row['bh_province']) ? $row['bh_province'] : ''; ?>" required>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">


                                <label for="bh_control_no">BH Control No.:</label>
                                <input type="text" id="bh_control_no" name="bh_control_no" class="form-control" value="<?php echo isset($row['bh_control_no']) ? $row['bh_control_no'] : ''; ?>" required>
                            </div>


                        </div>

                        <h4>Official Receipt</h4>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="bh_or_num">Official Receipt Number:</label>
                                <input type="text" id="bh_or_num" name="bh_or_num" class="form-control" value="<?php echo isset($row['bh_or_num']) ? $row['bh_or_num'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bh_bpn">Business Permit Number:</label>
                                <input type="text" id="bh_bpn" class="form-control" name="bh_bpn" value="<?php echo isset($row['bh_bpn']) ? $row['bh_bpn'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="date_issued">Date Issued:</label>
                                <input type="date" id="date_issued" class="form-control" name="date_issued" value="<?php echo isset($row['date_issued']) ? $row['date_issued'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="amount_paid">Amount Paid:</label>
                                <input type="number" id="amount_paid" class="form-control" name="amount_paid" value="<?php echo isset($row['amount_paid']) ? $row['amount_paid'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bh_mp">Mode of Payment:</label>
                                <input type="text" id="bh_mp" class="form-control" name="bh_mp" value="<?php echo isset($row['bh_mp']) ? $row['bh_mp'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="date_paid">Date Paid:</label>
                                <input type="date" id="date_paid" class="form-control" name="date_paid" value="<?php echo isset($row['date_paid']) ? $row['date_paid'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="row">


                            <div class="form-group col-md-4">
                                <label for="bh_period_cover">Period Covered:</label>
                                <input type="text" id="bh_period_cover" class="form-control" name="bh_period_cover" value="<?php echo isset($row['bh_period_cover']) ? $row['bh_period_cover'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bh_complaint">Compliant:</label>
                                <select id="bh_complaint" class="form-control" name="bh_complaint" required>
                                    <option value="" disabled>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['bh_complaint']) && $row['bh_complaint'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['bh_complaint']) && $row['bh_complaint'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                        </div>


                        <br>
                        <h2>Classification And Rates</h2>

                        <p> Kind Of Construction of the Boarding House:</p>
                        <div style="margin-left: 5px;" class="row">
                            <div class="form-group col-md-3">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind[]" value="a__made_of_strong_materials" <?php echo isset($row['bh_construction_kind']) && in_array('a__made_of_strong_materials', explode(',', $row['bh_construction_kind'])) ? 'checked' : ''; ?>>
                                    A. Made of Strong Materials
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind[]" value="b__made_of_light_materials" <?php echo isset($row['bh_construction_kind']) && in_array('b__made_of_light_materials', explode(',', $row['bh_construction_kind'])) ? 'checked' : ''; ?>>
                                    B. Made of Light Materials
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_construction_kind" id="otherSpecifyCheckbox" name="bh_construction_kind[]" value="c__other__specify" <?php echo isset($row['bh_construction_kind']) && in_array('c__other__specify', explode(',', $row['bh_construction_kind'])) ? 'checked' : ''; ?>>
                                    C. Other:
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" id="bh_specify" name="bh_specify" class="form-control" value=" <?php echo isset($row['bh_specify']) ? $row['bh_specify'] : ''; ?>">
                            </div>



                        </div>


                        <script>
                            document.getElementById('otherSpecifyCheckbox').addEventListener('change', function() {
                                var SpecifyOtherInput = document.getElementById('bh_specify');
                                SpecifyOtherInput.disabled = !this.checked;
                                if (!this.checked) {
                                    SpecifyOtherInput.value = '';
                                }
                            });

                            $(document).ready(function() {
                                $('.bh_construction_kind').click(function() {
                                    $('.bh_construction_kind').not(this).prop('checked', false);
                                    if ($(this).val() !== 'C') {
                                        $('#bh_specify').prop('disabled', true).val('');
                                    }
                                });
                            });
                        </script>
                        <p> Class of the Boarding House:</p>
                        <div style="margin-left: 5px;" class="row">
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_class" id="bh_class_a" name="bh_class[]" value="class_a" <?php echo isset($row['bh_class']) && in_array('class_a', explode(',', $row['bh_class'])) ? 'checked' : ''; ?>>
                                    Class A
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_class" id="bh_class_b" name="bh_class[]" value="class_b" <?php echo isset($row['bh_class']) && in_array('class_b', explode(',', $row['bh_class'])) ? 'checked' : ''; ?>>
                                    Class B
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_class" id="bh_class_c" name="bh_class[]" value="class_c" <?php echo isset($row['bh_class']) && in_array('class_c', explode(',', $row['bh_class'])) ? 'checked' : ''; ?>>
                                    Class C
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input bh_class" id="bh_class_d" name="bh_class[]" value="class_d" <?php echo isset($row['bh_class']) && in_array('class_d', explode(',', $row['bh_class'])) ? 'checked' : ''; ?>>
                                    Class D
                                </label>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('.bh_class').click(function() {
                                    $('.bh_class').not(this).prop('checked', false);

                                });
                            });
                        </script>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="bh_room">Number Of Rooms:</label>
                                <input type="number" id="bh_room" class="form-control" name="bh_room" value="<?php echo isset($row['bh_room']) ? $row['bh_room'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bh_occupants">Num. of Occupants:</label>
                                <input type="number" id="bh_occupants" class="form-control" name="bh_occupants" value="<?php echo isset($row['bh_occupants']) ? $row['bh_occupants'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bh_overcrowded">Overcrowded:</label>
                                <select id="bh_overcrowded" class="form-control" name="bh_overcrowded" required>
                                    <option value="" disabled>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                        </div>
                        <div class=" row">
                            <div class="form-group col-md-3">
                                <label for="bh_rates_charge">Rates being Charged:</label>
                                <select id="bh_rates_charge" class="form-control" name="bh_rates_charge" required>
                                    <option value="" disabled>-- Select Rates --</option>
                                    <option value="lodging" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'lodging' ? 'selected' : ''; ?>>Lodging</option>
                                    <option value="board" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'board' ? 'selected' : ''; ?>>Board</option>
                                    <option value="bed_space" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'bed_space' ? 'selected' : ''; ?>>Bed Space</option>
                                    <option value="room_rent" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'room_rent' ? 'selected' : ''; ?>>Room Rent</option>
                                    <option value="house_rent" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'house_rent' ? 'selected' : ''; ?>>House Rent</option>
                                    <option value="rent_per_unit__apartment" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'rent_per_unit__apartment' ? 'selected' : ''; ?>>Rent Per Unit(Apartment)</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_rate">Rates:</label>
                                <input type="number" id="bh_rate" class="form-control" name="bh_rate" value="<?php echo isset($row['bh_rate']) ? $row['bh_rate'] : ''; ?>" required>
                            </div>

                        </div>
                        <p> Sources of Water Supply:</p>
                        <div style="margin-left: 5px;" class="row">
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input" id="bh_water_source_nawasa" name="bh_water_source[]" value="nawasa" <?php echo isset($row['bh_water_source']) && in_array('nawasa', explode(',', $row['bh_water_source'])) ? 'checked' : ''; ?>>
                                    NAWASA
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>
                                    <input type="checkbox" class="form-check-input" id="bh_water_source_deepwell" name="bh_water_source[]" value="deep_well" <?php echo isset($row['bh_water_source']) && in_array('deep_well', explode(',', $row['bh_water_source'])) ? 'checked' : ''; ?>>
                                    Deep Well
                                </label>
                            </div>
                        </div>




                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="bh_adequate">Adequate:</label>
                                <select id="bh_adequate" class="form-control" name="bh_adequate" required>
                                    <option value="" disabled>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_portable">Portable:</label>
                                <select id="bh_portable" class="form-control" name="bh_portable" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="bh_toilet_type">Toilet Facilities Type:</label>
                                <input type="text" id="bh_toilet_type" class="form-control" name="bh_toilet_type" value="<?php echo isset($row['bh_toilet_type']) ? $row['bh_toilet_type'] : ''; ?>" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_toilet_cond">Sanitary Condition:</label>
                                <select id="bh_toilet_cond" class="form-control" name="bh_toilet_cond" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="good" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                    <option value="fair" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                    <option value="poor" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="bh_bath_type">Bath Facilities Type:</label>
                                <input type="text" id="bh_bath_type" class="form-control" name="bh_bath_type" value="<?php echo isset($row['bh_bath_type']) ? $row['bh_bath_type'] : ''; ?>" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_bath_cond">Sanitary Condition:</label>
                                <select id="bh_bath_cond" class="form-control" name="bh_bath_cond" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="good" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                    <option value="fair" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                    <option value="poor" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_cr_num">Num of CR:</label>
                                <input type="number" id="bh_cr_num" class="form-control" name="bh_cr_num" value="<?php echo isset($row['bh_cr_num']) ? $row['bh_cr_num'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bh_bathroom_num">Num of Bath Room:</label>
                                <input type="number" id="bh_bathroom_num" class="form-control" name="bh_bathroom_num" value="<?php echo isset($row['bh_bathroom_num']) ? $row['bh_bathroom_num'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="bh_premises_cond">Sanitary Condition Of The Premises:</label>
                                <select id="bh_premises_cond" class="form-control" name="bh_premises_cond" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="good" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                    <option value="fair" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                    <option value="poor" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_garbage_disposal">1. Types of Garbage Disposal:</label>
                                <select id="bh_garbage_disposal" class="form-control" name="bh_garbage_disposal" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value=""> </option>
                                    <option value="dps" <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_sewage_disposal">2. Types of Sewage Disposal:</label>
                                <select id="bh_sewage_disposal" class="form-control" name="bh_sewage_disposal" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value=""> </option>
                                    <option value="dps" <?php echo isset($row['bh_sewage_disposal']) && $row['bh_sewage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="bh_rodent_disposal">3. Types of Rodent / Vermin Disposal:</label>
                                <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value=""> </option>
                                    <option value="dps" <?php echo isset($row['bh_rodent_disposal']) && $row['bh_rodent_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                </select>
                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="light_ventilation">Lightning and Ventilation:</label>
                                <select id="light_ventilation" class="form-control" name="light_ventilation" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="natural" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'natural' ? 'selected' : ''; ?>>Natural</option>
                                    <option value="artificial" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'artificial' ? 'selected' : ''; ?>>Artificial</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="natural_artificial">Natural/Artificial:</label>
                                <select id="natural_artificial" class="form-control" name="natural_artificial" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="satisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'satisfactory' ? 'selected' : ''; ?>>Satisfactory</option>
                                    <option value="unsatisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'unsatisfactory' ? 'selected' : ''; ?>>Unsatisfactory</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="establishment_extension">Is there any extension or additional construction in the establishment?:</label>
                                <select id="establishment_extension" class="form-control" name="establishment_extension" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="specify_txt">Specify if Yes:</label>
                                <textarea id="specify_txt" class="form-control" name="specify_txt" rows="1" required><?php echo isset($row['specify_txt']) ? $row['specify_txt'] : ''; ?></textarea>
                            </div>

                        </div>
                        <script>
                            function toggleTextArea() {
                                var selectElement = document.getElementById("establishment_extension");
                                var textArea = document.getElementById("specify_txt");

                                if (selectElement.value === "yes") {
                                    textArea.disabled = false; // Enable textarea if "yes" is selected
                                    textArea.required = true; // Make textarea required if enabled
                                } else {
                                    textArea.disabled = true; // Disable textarea if "no" is selected
                                    textArea.required = false; // Make textarea not required if disabled
                                    textArea.value = ""; // Clear textarea value if disabled
                                }
                            }
                            // Call toggleTextArea function on select change
                            document.getElementById("establishment_extension").addEventListener("change", toggleTextArea);
                        </script>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="with_permit">With Permit?:</label>
                                <select id="with_permit" class="form-control" name="with_permit" required>
                                    <option value="" disabled selected>-- Select Option --</option>
                                    <option value="yes" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'no' ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="bh_remarks">Remarks & Recommendations:</label>
                                <textarea id="bh_remarks" class="form-control" name="bh_remarks" required><?php echo isset($row['bh_remarks']) ? $row['bh_remarks'] : ''; ?></textarea>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="office_required">You are hereby requested to appear before this office:</label>
                                <?php
                                // Check if office_required date is set and not empty
                                if (isset($row['office_required']) && !empty($row['office_required'])) {
                                    // Parse the date string and format it as YYYY-MM-DD
                                    $formatted_date = date('Y-m-d', strtotime($row['office_required']));
                                } else {
                                    $formatted_date = '';
                                }
                                ?>
                                <input type="date" id="office_required" class="form-control" name="office_required" value="<?php echo $formatted_date; ?>" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="inspected_by">Inspected by:</label>
                                <input type="text" id="inspected_by" class="form-control" name="inspected_by" value="  <?php echo isset($row['inspected_by']) ? $row['inspected_by'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="acknowledge_by">Acknowledge by:</label>
                                <input type="text" id="acknowledge_by" class="form-control" name="acknowledge_by" value="  <?php echo isset($row['acknowledge_by']) ? $row['acknowledge_by'] : ''; ?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <h2> Get Current Location </h2>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5>GPS: <button type="button" class="btn btn-primary btn-sm my-2 buton"><i class="fa-solid fa-location-dot"></i></button></h5>
                                <label for="current_loc">Current Location:</label>
                                <div class="input-group">
                                    <textarea id="current_loc" class="form-control" rows="1" name="current_loc" required readonly><?php echo isset($row['current_loc']) ? $row['current_loc'] : ''; ?></textarea>
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="bh_longitude">Longitude:</label>
                                <input id="bh_longitude" class="form-control" type="text" name="bh_longitude" value="<?php echo isset($row['bh_longitude']) ? $row['bh_longitude'] : ''; ?>" required readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bh_latitude">Latitude:</label>
                                <input id="bh_latitude" class="form-control" type="text" name="bh_latitude" value="<?php echo isset($row['bh_latitude']) ? $row['bh_latitude'] : ''; ?>" required readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bh_altitude">Altitude:</label>
                                <input id="bh_altitude" class="form-control" type="text" name="bh_altitude" value="<?php echo isset($row['bh_altitude']) ? $row['bh_altitude'] : ''; ?>" required readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bh_precision">Precision:</label>
                                <input id="bh_precision" class="form-control" type="text" name="bh_precision" value="<?php echo isset($row['bh_precision']) ? $row['bh_precision'] : ''; ?>" required readonly>
                            </div>
                        </div>




                        <br>
                        <h2>Upload Boarding House Picture</h2>

                        <div class="row">
                            <br><br>
                            <input type="file" name="bh_image" accept="image/*" capture="camera" id="image-input" onchange="previewImage(this)">


                            <div class="imageform" style="height: 100%; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                                <?php
                                if (isset($row['bh_image'])) {
                                    $imagePath = "resources/gallery/" . $row['bh_image'];
                                    if (file_exists($imagePath)) {
                                        echo "<img src='{$imagePath}' alt='Uploaded Image' class='mx-auto d-block' style='max-width: 100%; height: auto;'>";
                                    } else {
                                        echo "<p>{$imagePath}</p>"; // Display the image path if the file doesn't exist
                                    }
                                } else {
                                    echo "No image found";
                                }
                                ?>
                            </div>


                        </div>

                        <script>
                            function previewImage(input) {
                                if (input.files && input.files[0]) {

                                    if (input.files[0].size <= 5 * 1024 * 1024) { // Limit to 5MB
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById('selected-image-preview').src = e.target.result;
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    } else {
                                        alert("File size exceeds 5MB. Please select a smaller file.");

                                        input.value = ""; // Reset input field
                                    }
                                }
                            }
                        </script>

                        <br>
                        <br>






                        <button type="submit" class="btn btn-success btn-sm" style="float: right;">Submit</button>

                </form>
            </div>
        </div>
    </div>

</section>

</article>





<?php
include 'includes/footer.php';
?>