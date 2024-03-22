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
$specify_txt = '';
$with_permit = '';
$bh_remarks = '';
$office_ = '';
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
        $specify_txt = $row['specify_txt'] ?? '';
        $with_permit = $row['with_permit'] ?? '';
        $bh_remarks = $row['bh_remarks'] ?? '';
        $office_ = $row['office_'] ?? '';
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

                <form action="resources/dr/update_code.php" method="POST" enctype="multipart/form-data">


                    <br>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-3">

                            <label for="account_number">Account Number:</label>
                            <input type="text" id="account_number" name="account_number" class="form-control" value="<?php echo isset($row['account_number']) ? $row['account_number'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-5">

                            <label for="establishment_name">Name of Establishment:</label>
                            <input type="text" id="establishment_name" name="establishment_name" class="form-control" value="<?php echo isset($row['establishment_name']) ? $row['establishment_name'] : ''; ?>" >
                        </div>

                    </div>
                    <BR>
                    <h2>Name of Owner / Manager</h2>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="middlename">Middle Name:</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control" value="<?php echo isset($row['middle_name']) ? $row['middle_name'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-1">
                            <label for="suffix">Suffix:</label>
                            <input type="text" name="suffix" id="suffix" class="form-control" value="<?php echo isset($row['suffix']) ? $row['suffix'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">

                            <label for="bh_address">Address:</label>
                            <input type="text" id="bh_address" name="bh_address" class="form-control" value="<?php echo isset($row['bh_address']) ? $row['bh_address'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="bh_municipality">City/Municipality:</label>
                            <input type="text" id="bh_municipality" name="bh_municipality" class="form-control" value="<?php echo isset($row['bh_municipality']) ? $row['bh_municipality'] : ''; ?>" >
                            <!-- Hidden input field to store the value -->
                            <input type="hidden" name="bh_municipality_hidden" value="ILOILO CITY">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_district">District:</label>
                            <?php
                            $selectedDistricts = isset($row['bh_district']) ? explode(',', $row['bh_district']) : []; // Extract selected district numbers from $row['bh_district'] or initialize an empty array

                            $availableDistricts = [
                                1 => 'Arevalo',
                                2 => 'Lapaz',
                                3 => 'Molo',
                                4 => 'City Proper',
                                5 => 'Lapuz',
                                6 => 'Jaro',
                                7 => 'Mandurriao'
                            ];

                            $selectedDistrictNames = [];
                            foreach ($selectedDistricts as $districtNumber) {
                                if (isset($availableDistricts[$districtNumber])) {
                                    $selectedDistrictNames[] = $availableDistricts[$districtNumber];
                                }
                            }
                            $selectedDistrictNames = implode(', ', $selectedDistrictNames);
                            ?>
                            <input type="text" id="bh_district" name="bh_district" class="form-control" value="<?php echo $selectedDistrictNames; ?>" readonly>
                            <input type="hidden" name="bh_district_hidden" value="<?php echo implode(',', $selectedDistricts); ?>">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="bh_barangay">Barangay:</label>
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

                                    $barangayName = $barangay !== false ? $barangay : "";
                                } catch (PDOException $e) {
                                    die("Error in executing query: " . $e->getMessage());
                                }
                            } else {
                                $barangayName = "";
                            }
                            ?>
                            <input type="text" id="bh_barangay" name="bh_barangay" class="form-control" value="<?php echo $barangayName; ?>" readonly>
                            <input type="hidden" name="bh_barangay_hidden" value="<?php echo $selectedBarangay; ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_province">Province:</label>
                            <input type="text" id="bh_province" name="bh_province" class="form-control" value="<?php echo isset($row['bh_province']) ? $row['bh_province'] : ''; ?>" disabled >

                        </div>

                    </div>
                    <script>
                        function populateBarangays() {
                            var districtSelect = document.getElementById("bh_district");
                            var barangaySelect = document.getElementById("bh_barangay");
                            var district = districtSelect.value;


                            barangaySelect.innerHTML = '  <option value="" disabled selected> -- Select Barangay --</option>';


                            if (district !== "") {
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "get_barangays.php?district=" + district, true);
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        var barangays = JSON.parse(xhr.responseText);
                                        barangays.forEach(function(barangay) {
                                            var option = document.createElement("option");
                                            option.text = barangay;
                                            option.value = barangay;
                                            barangaySelect.add(option);
                                        });
                                    }
                                };
                                xhr.send();
                            }
                        }
                    </script>
                    <div class="row">
                        <div class="form-group col-md-4">


                            <label for="bh_control_no">BH Control No.:</label>
                            <input type="text" id="bh_control_no" name="bh_control_no" class="form-control" value="<?php echo isset($row['bh_control_no']) ? $row['bh_control_no'] : ''; ?>" >
                        </div>


                    </div>

                    <h4>Official Receipt</h4>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_or_num">Official Receipt Number:</label>
                            <input type="text" id="bh_or_num" name="bh_or_num" class="form-control" value="<?php echo isset($row['bh_or_num']) ? $row['bh_or_num'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bh_bpn">Business Permit Number:</label>
                            <input type="text" id="bh_bpn" class="form-control" name="bh_bpn" value="<?php echo isset($row['bh_bpn']) ? $row['bh_bpn'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_issued">Date Issued:</label>
                            <input type="date" id="date_issued" class="form-control" name="date_issued" value="<?php echo isset($row['date_issued']) ? $row['date_issued'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="amount_paid">Amount Paid:</label>
                            <input type="number" id="amount_paid" class="form-control" name="amount_paid" value="<?php echo isset($row['amount_paid']) ? $row['amount_paid'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_mp">Mode of Payment:</label>
                            <input type="text" id="bh_mp" class="form-control" name="bh_mp" value="<?php echo isset($row['bh_mp']) ? $row['bh_mp'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_paid">Date Paid:</label>
                            <input type="date" id="date_paid" class="form-control" name="date_paid" value="<?php echo isset($row['date_paid']) ? $row['date_paid'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label for="bh_period_cover">Period Covered:</label>
                            <input type="text" id="bh_period_cover" class="form-control" name="bh_period_cover" value="<?php echo isset($row['bh_period_cover']) ? $row['bh_period_cover'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_complaint">Compliant:</label>
                            <select id="bh_complaint" class="form-control" name="bh_complaint" >
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
                            <input type="number" id="bh_room" class="form-control" name="bh_room" value="<?php echo isset($row['bh_room']) ? $row['bh_room'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_occupants">Num. of Occupants:</label>
                            <input type="number" id="bh_occupants" class="form-control" name="bh_occupants" value="<?php echo isset($row['bh_occupants']) ? $row['bh_occupants'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_overcrowded">Overcrowded:</label>
                            <select id="bh_overcrowded" class="form-control" name="bh_overcrowded" >
                                <option value="" disabled>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                    </div>
                    <div class=" row">
                        <div class="form-group col-md-3">
                            <label for="bh_rates_charge">Rates being Charged:</label>
                            <select id="bh_rates_charge" class="form-control" name="bh_rates_charge" >
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
                            <input type="number" id="bh_rate" class="form-control" name="bh_rate" value="<?php echo isset($row['bh_rate']) ? $row['bh_rate'] : ''; ?>" >
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
                            <select id="bh_adequate" class="form-control" name="bh_adequate" >
                                <option value="" disabled>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_portable">Portable:</label>
                            <select id="bh_portable" class="form-control" name="bh_portable" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bh_toilet_type">Toilet Facilities Type:</label>
                            <input type="text" id="bh_toilet_type" class="form-control" name="bh_toilet_type" value="<?php echo isset($row['bh_toilet_type']) ? $row['bh_toilet_type'] : ''; ?>" >
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_toilet_cond">Sanitary Condition:</label>
                            <select id="bh_toilet_cond" class="form-control" name="bh_toilet_cond" >
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
                            <input type="text" id="bh_bath_type" class="form-control" name="bh_bath_type" value="<?php echo isset($row['bh_bath_type']) ? $row['bh_bath_type'] : ''; ?>" >
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_bath_cond">Sanitary Condition:</label>
                            <select id="bh_bath_cond" class="form-control" name="bh_bath_cond" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                <option value="fair" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                <option value="poor" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_cr_num">Num of CR:</label>
                            <input type="number" id="bh_cr_num" class="form-control" name="bh_cr_num" value="<?php echo isset($row['bh_cr_num']) ? $row['bh_cr_num'] : ''; ?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_bathroom_num">Num of Bath Room:</label>
                            <input type="number" id="bh_bathroom_num" class="form-control" name="bh_bathroom_num" value="<?php echo isset($row['bh_bathroom_num']) ? $row['bh_bathroom_num'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_premises_cond">Sanitary Condition Of The Premises:</label>
                            <select id="bh_premises_cond" class="form-control" name="bh_premises_cond" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                <option value="fair" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                <option value="poor" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_garbage_disposal">1. Types of Garbage Disposal:</label>
                            <select id="bh_garbage_disposal" class="form-control" name="bh_garbage_disposal" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps" <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_sewage_disposal">2. Types of Sewage Disposal:</label>
                            <select id="bh_sewage_disposal" class="form-control" name="bh_sewage_disposal" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps" <?php echo isset($row['bh_sewage_disposal']) && $row['bh_sewage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_rodent_disposal">3. Types of Rodent / Vermin Disposal:</label>
                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps" <?php echo isset($row['bh_rodent_disposal']) && $row['bh_rodent_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="light_ventilation">Lightning and Ventilation:</label>
                            <select id="light_ventilation" class="form-control" name="light_ventilation" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="natural" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'natural' ? 'selected' : ''; ?>>Natural</option>
                                <option value="artificial" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'artificial' ? 'selected' : ''; ?>>Artificial</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="natural_artificial">Natural/Artificial:</label>
                            <select id="natural_artificial" class="form-control" name="natural_artificial" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="satisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'satisfactory' ? 'selected' : ''; ?>>Satisfactory</option>
                                <option value="unsatisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'unsatisfactory' ? 'selected' : ''; ?>>Unsatisfactory</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="establishment_extension">Is there any extension or additional construction in the establishment?:</label>
                            <select id="establishment_extension" class="form-control" name="establishment_extension" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="specify_txt">Specify if Yes:</label>
                            <textarea id="specify_txt" class="form-control" name="specify_txt" rows="1" ><?php echo isset($row['specify_txt']) ? $row['specify_txt'] : ''; ?></textarea>
                        </div>

                    </div>
                    <script>
                        function toggleTextArea() {
                            var selectElement = document.getElementById("establishment_extension");
                            var textArea = document.getElementById("specify_txt");

                            if (selectElement.value === "yes") {
                                textArea.disabled = false; // Enable textarea if "yes" is selected
                                textArea. = true; // Make textarea  if enabled
                            } else {
                                textArea.disabled = true; // Disable textarea if "no" is selected
                                textArea. = false; // Make textarea not  if disabled
                                textArea.value = ""; // Clear textarea value if disabled
                            }
                        }
                        // Call toggleTextArea function on select change
                        document.getElementById("establishment_extension").addEventListener("change", toggleTextArea);
                    </script>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="with_permit">With Permit?:</label>
                            <select id="with_permit" class="form-control" name="with_permit" >
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="bh_remarks">Remarks & Recommendations:</label>
                            <textarea id="bh_remarks" class="form-control" name="bh_remarks" ><?php echo isset($row['bh_remarks']) ? $row['bh_remarks'] : ''; ?></textarea>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="office_">You are hereby requested to appear before this office:</label>
                            <?php
                            // Check if office_ date is set and not empty
                            if (isset($row['office_']) && !empty($row['office_'])) {
                                // Parse the date string and format it as YYYY-MM-DD
                                $formatted_date = date('Y-m-d', strtotime($row['office_']));
                            } else {
                                $formatted_date = '';
                            }
                            ?>
                            <input type="date" id="office_" class="form-control" name="office_" value="<?php echo $formatted_date; ?>" >
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="inspected_by">Inspected by:</label>
                            <input type="text" id="inspected_by" class="form-control" name="inspected_by" value="  <?php echo isset($row['inspected_by']) ? $row['inspected_by'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="acknowledge_by">Acknowledge by:</label>
                            <input type="text" id="acknowledge_by" class="form-control" name="acknowledge_by" value="  <?php echo isset($row['acknowledge_by']) ? $row['acknowledge_by'] : ''; ?>" >
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
                                <textarea id="current_loc" class="form-control" rows="1" name="current_loc"  readonly><?php echo isset($row['current_loc']) ? $row['current_loc'] : ''; ?></textarea>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_longitude">Longitude:</label>
                            <input id="bh_longitude" class="form-control" type="text" name="bh_longitude" value="<?php echo isset($row['bh_longitude']) ? $row['bh_longitude'] : ''; ?>"  readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_latitude">Latitude:</label>
                            <input id="bh_latitude" class="form-control" type="text" name="bh_latitude" value="<?php echo isset($row['bh_latitude']) ? $row['bh_latitude'] : ''; ?>"  readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_altitude">Altitude:</label>
                            <input id="bh_altitude" class="form-control" type="text" name="bh_altitude" value="<?php echo isset($row['bh_altitude']) ? $row['bh_altitude'] : ''; ?>"  readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_precision">Precision:</label>
                            <input id="bh_precision" class="form-control" type="text" name="bh_precision" value="<?php echo isset($row['bh_precision']) ? $row['bh_precision'] : ''; ?>"  readonly>
                        </div>
                    </div>




                    <br>
                    <h2>Upload Boarding House Picture</h2>

                    <div class="row">
                        <input type="file" name="bh_image" accept="image/*" capture="camera" id="image-input" onchange="previewImage(this)">
                        <br><br>

                        <div class="imageform" style="height: 100%; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                            <img id="selected-image-preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 100%;">
                        </div>

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






                    <button type="submit" class="btn btn-success btn-sm" onclick="uploadImage()" style="float: right;" name="updateform">Submit</button>

                </form>
            </div>
        </div>
    </div>

</section>

</article>





<?php
include 'includes/footer.php';
?>