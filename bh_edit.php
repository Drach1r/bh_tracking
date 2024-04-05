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

?>

<div class="row">
    <h3 style="margin-left: 290px;" class="title">Update Record

    </h3>
</div>

<section class="container">
    <div class="row">
        <div class="card-body">
            <div class="card-title-body">
            </div>
            <br>
            <div class="card card-block  col-lg-12" style=" background-color: white; ">

                <form action="resources/dr/edit_save.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                    <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">

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
                    <h5>Name of Owner / Manager</h5>

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
                            <input type="text" id="bh_municipality" name="bh_municipality" class="form-control" value="ILOILO CITY" readonly>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_district">District:</label>
                            <select id="bh_district" name="bh_district" class="form-control">
                                <?php

                                $selectedDistricts = isset($row['bh_district']) ? explode(',', $row['bh_district']) : [];

                                try {
                                    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $query = "SELECT id, district_name FROM bh_district";
                                    $stmt = $pdo->query($query);

                                    if ($stmt->rowCount() > 0) {
                                        while ($district = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $selected = in_array($district['id'], $selectedDistricts) ? "selected" : "";
                                            echo "<option value='{$district['id']}' $selected>{$district['district_name']}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No districts found</option>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_barangay">Barangay:</label>
                            <?php

                            $selectedDistrict = isset($row['bh_district']) ? $row['bh_district'] : null;
                            if ($selectedDistrict !== null) {
                                try {
                                    $query = "SELECT id, barangay FROM bh_address WHERE district_id = ?";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindParam(1, $selectedDistrict, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if ($stmt->rowCount() > 0) {
                                        echo "<select id='bh_barangay' name='bh_barangay' class='form-control'>";
                                        foreach ($barangays as $barangay) {
                                            $selected = ($barangay['id'] == $row['bh_barangay']) ? "selected" : "";
                                            echo "<option value='{$barangay['id']}' $selected>{$barangay['barangay']}</option>";
                                        }
                                        echo "</select>";
                                    } else {
                                        echo "<input type='text' id='bh_barangay' name='bh_barangay' class='form-control'>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            } else {
                                echo "<input type='text' id='bh_barangay' name='bh_barangay' class='form-control'>";
                            }
                            ?>
                        </div>

                        <script>
                            document.getElementById('bh_district').addEventListener('change', function() {
                                var selectedDistrictId = this.value;
                                var barangaySelect = document.getElementById('bh_barangay');


                                fetch('fetch_barangays.php?district_id=' + selectedDistrictId)
                                    .then(response => response.json())
                                    .then(data => {

                                        barangaySelect.innerHTML = '';


                                        data.forEach(barangay => {
                                            var option = document.createElement('option');
                                            option.value = barangay.id;
                                            option.text = barangay.barangay;
                                            barangaySelect.appendChild(option);
                                        });
                                    })
                                    .catch(error => console.error('Error fetching barangays:', error));
                            });
                        </script>



                        <div class="form-group col-md-3">
                            <label for="bh_province">Province:</label>
                            <input type="text" id="bh_province" name="bh_province" class="form-control" value="ILOILO" readonly>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">


                            <label for="bh_control_no">BH Control No.:</label>
                            <input type="text" id="bh_control_no" name="bh_control_no" class="form-control" value="<?php echo isset($row['bh_control_no']) ? $row['bh_control_no'] : ''; ?>">
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_or_num">Official Receipt Number:</label>
                            <input type="text" id="bh_or_num" name="bh_or_num" class="form-control" value="<?php echo isset($row['bh_or_num']) ? $row['bh_or_num'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bh_bpn">Business Permit Number:</label>
                            <input type="text" id="bh_bpn" class="form-control" name="bh_bpn" value="<?php echo isset($row['bh_bpn']) ? $row['bh_bpn'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_issued">Date Issued:</label>
                            <input type="date" id="date_issued" class="form-control" name="date_issued" value="<?php echo isset($row['date_issued']) ? $row['date_issued'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="amount_paid">Amount Paid:</label>
                            <input type="number" id="amount_paid" class="form-control" name="amount_paid" value="<?php echo isset($row['amount_paid']) ? $row['amount_paid'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_mp">Mode of Payment:</label>
                            <select id="bh_mp" class="form-control" name="bh_mp">
                                <option value="" disabled> -- Select Mode --</option>
                                <option value="annual" <?php echo isset($row['bh_mp']) && $row['bh_mp'] == 'annual' ? 'selected' : ''; ?>>Annual</option>
                                <option value="semi_annual" <?php echo isset($row['bh_mp']) && $row['bh_mp'] == 'semi_annual' ? 'selected' : ''; ?>>Semi-Annual</option>
                                <option value="monthly" <?php echo isset($row['bh_mp']) && $row['bh_mp'] == 'monthly' ? 'selected' : ''; ?>>Monthly</option>
                                <option value="quarterly" <?php echo isset($row['bh_mp']) && $row['bh_mp'] == 'quarterly' ? 'selected' : ''; ?>>Quarterly</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="date_paid">Date Paid:</label>
                            <input type="date" id="date_paid" class="form-control" name="date_paid" value="<?php echo isset($row['date_paid']) ? $row['date_paid'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label for="bh_period_cover">Period Covered:</label>
                            <input type="text" id="bh_period_cover" class="form-control" name="bh_period_cover" value="<?php echo isset($row['bh_period_cover']) ? $row['bh_period_cover'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_complaint">Compliant:</label>
                            <select id="bh_complaint" class="form-control" name="bh_complaint">
                                <option value="" disabled>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_complaint']) && $row['bh_complaint'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_complaint']) && $row['bh_complaint'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                    </div>


                    <br>
                    <h5>Classification And Rates</h5>

                    <p> Kind Of Construction of the Boarding House:</p>
                    <div style="margin-left: 5px;" class="row">
                        <div class="form-group col-md-3">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind[]" value="a__made_of_strong_materials" <?php echo isset($row['bh_construction_kind']) && in_array('a__made_of_strong_materials', explode(',', $row['bh_construction_kind'])) ? 'checked' : '';  ?>>
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
                            <input type="text" id="bh_specify" name="bh_specify" class="form-control" value=" <?php echo isset($row['bh_specify']) ? $row['bh_specify'] : ''; ?>" disabled>
                        </div>


                    </div>
                    <script>
                        $(document).ready(function() {
                            var SpecifyOtherInput = $('#bh_specify');
                            var OtherCheckbox = $('#otherSpecifyCheckbox');
                            SpecifyOtherInput.prop('disabled', !OtherCheckbox.prop('checked'));
                            $('.bh_construction_kind').click(function() {

                                if ($(this).val() === 'c__other__specify') {
                                    SpecifyOtherInput.prop('disabled', !OtherCheckbox.prop('checked'));
                                    if (!OtherCheckbox.prop('checked')) {
                                        SpecifyOtherInput.val('');
                                    }
                                } else {
                                    SpecifyOtherInput.prop('disabled', true).val('');
                                }
                                $('.bh_construction_kind').not(this).prop('checked', false);
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
                            <input type="number" id="bh_room" class="form-control" name="bh_room" value="<?php echo isset($row['bh_room']) ? $row['bh_room'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_occupants">Num. of Occupants:</label>
                            <input type="number" id="bh_occupants" class="form-control" name="bh_occupants" value="<?php echo isset($row['bh_occupants']) ? $row['bh_occupants'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_overcrowded">Overcrowded:</label>
                            <select id="bh_overcrowded" class="form-control" name="bh_overcrowded">
                                <option value="" disabled>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_overcrowded']) && $row['bh_overcrowded'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                    </div>
                    <div class=" row">
                        <div class="form-group col-md-3">
                            <label for="bh_rates_charge">Rates being Charged:</label>
                            <select id="bh_rates_charge" class="form-control" name="bh_rates_charge">
                                <option value="" disabled>-- Select Rates --</option>
                                <option value="lodging" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'lodging' ? 'selected' : ''; ?>>Lodging</option>
                                <option value="board" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'board' ? 'selected' : ''; ?>>Board</option>
                                <option value="bed_space" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'bed_space' ? 'selected' : ''; ?>>Bed Space</option>
                                <option value="room_rent" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'room_rent' ? 'selected' : ''; ?>>Room Rent</option>
                                <option value="house_rent" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'house_rent' ? 'selected' : ''; ?>>House Rent</option>
                                <option value="rent_per_unit__apartment" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'rent_per_unit__apartment' ? 'selected' : ''; ?>>Rent Per Unit(Apartment)</option>
                                <option value="other" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'other' ? 'selected' : ''; ?>>Others:</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="bh_ratescharge_other">Specify Others:</label>
                            <input type="text" id="bh_ratescharge_other" class="form-control" name="bh_ratescharge_other" value="<?php echo isset($row['bh_ratescharge_other']) ? $row['bh_ratescharge_other'] : ''; ?>" <?php echo isset($row['bh_rates_charge']) && $row['bh_rates_charge'] === 'other' ? '' : 'disabled'; ?>>
                        </div>

                        <script>
                            $(document).ready(function() {
                                var specifyRatesInput = $('#bh_ratescharge_other');
                                var ratesSelect = $('#bh_rates_charge');

                                specifyRatesInput.prop('disabled', ratesSelect.val() !== 'other');

                                ratesSelect.change(function() {
                                    specifyRatesInput.prop('disabled', $(this).val() !== 'other');
                                    specifyRatesInput.val('');
                                });
                            });
                        </script>

                        <div class="form-group col-md-2">
                            <label for="bh_rate">Rates:</label>
                            <input type="number" id="bh_rate" class="form-control" name="bh_rate" value="<?php echo isset($row['bh_rate']) ? $row['bh_rate'] : ''; ?>">
                        </div>

                    </div>
                    <p> Sources of Water Supply:</p>
                    <div style="margin-left: 5px;" class="row">
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input" id="bh_water_source_nawasa" name="bh_water_source[]" value="nawasa" <?php echo isset($row['bh_water_source']) && in_array('nawasa', explode(' ', $row['bh_water_source'])) ? 'checked' : ''; ?>>
                                NAWASA
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input" id="bh_water_source_deepwell" name="bh_water_source[]" value="deep_well" <?php echo isset($row['bh_water_source']) && in_array('deep_well', explode(' ', $row['bh_water_source'])) ? 'checked' : ''; ?>>
                                Deep Well
                            </label>

                        </div>
                    </div>




                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_adequate">Adequate:</label>
                            <select id="bh_adequate" class="form-control" name="bh_adequate">
                                <option value="" disabled>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_adequate']) && $row['bh_adequate'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_portable">Portable:</label>
                            <select id="bh_portable" class="form-control" name="bh_portable">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['bh_portable']) && $row['bh_portable'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="bh_toilet_type">Toilet Facilities Type:</label>
                            <input type="text" id="bh_toilet_type" class="form-control" name="bh_toilet_type" value="<?php echo isset($row['bh_toilet_type']) ? $row['bh_toilet_type'] : ''; ?>">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_toilet_cond">Sanitary Condition:</label>
                            <select id="bh_toilet_cond" class="form-control" name="bh_toilet_cond">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                <option value="fair" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                <option value="poor" <?php echo isset($row['bh_toilet_cond']) && $row['bh_toilet_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_cr_num">Num of CR:</label>
                            <input type="number" id="bh_cr_num" class="form-control" name="bh_cr_num" value="<?php echo isset($row['bh_cr_num']) ? $row['bh_cr_num'] : ''; ?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_bath_type">Bath Facilities Type:</label>
                            <input type="text" id="bh_bath_type" class="form-control" name="bh_bath_type" value="<?php echo isset($row['bh_bath_type']) ? $row['bh_bath_type'] : ''; ?>">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_bath_cond">Sanitary Condition:</label>
                            <select id="bh_bath_cond" class="form-control" name="bh_bath_cond">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                <option value="fair" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                <option value="poor" <?php echo isset($row['bh_bath_cond']) && $row['bh_bath_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="bh_bathroom_num">Num of Bath Room:</label>
                            <input type="number" id="bh_bathroom_num" class="form-control" name="bh_bathroom_num" value="<?php echo isset($row['bh_bathroom_num']) ? $row['bh_bathroom_num'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_premises_cond">Sanitary Condition Of The Premises:</label>
                            <select id="bh_premises_cond" class="form-control" name="bh_premises_cond">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'good' ? 'selected' : ''; ?>>Good</option>
                                <option value="fair" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'fair' ? 'selected' : ''; ?>>Fair</option>
                                <option value="poor" <?php echo isset($row['bh_premises_cond']) && $row['bh_premises_cond'] === 'poor' ? 'selected' : ''; ?>>Poor</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_garbage_disposal">1. Types of Garbage Disposal:</label>
                            <select id="bh_garbage_disposal" class="form-control" name="bh_garbage_disposal">
                                <option value="" disabled <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === '' ? 'selected' : ''; ?>>-- Select Option --</option>
                                <option value="dps" <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                <option value="others" <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === 'others' ? 'selected' : ''; ?>>Others:</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_garbage_other">Specify:</label>
                            <input type="text" id="bh_garbage_other" class="form-control" name="bh_garbage_other" rows="1" value="<?php echo isset($row['bh_garbage_other']) ? $row['bh_garbage_other'] : ''; ?>" <?php echo isset($row['bh_garbage_disposal']) && $row['bh_garbage_disposal'] === 'others' ? '' : 'disabled'; ?>>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            var specifyInput = $('#bh_garbage_other');
                            var disposalSelect = $('#bh_garbage_disposal');


                            specifyInput.prop('disabled', disposalSelect.val() !== 'others');


                            disposalSelect.change(function() {
                                specifyInput.prop('disabled', $(this).val() !== 'others');
                                specifyInput.val('');
                            });
                        });
                    </script>

                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="bh_sewage_disposal">2. Types of Sewage Disposal:</label>
                            <select id="bh_sewage_disposal" class="form-control" name="bh_sewage_disposal" onchange="toggleInput('bh_garbage_disposal', 'bh_garbage_other')">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps" <?php echo isset($row['bh_sewage_disposal']) && $row['bh_sewage_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                <option value="others" <?php echo isset($row['bh_sewage_disposal']) && $row['bh_sewage_disposal'] === 'others' ? 'selected' : ''; ?>>Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_sewage_other">Specify:</label>
                            <input type="text" id="bh_sewage_other" class="form-control" name="bh_sewage_other" rows="1" value="<?php echo isset($row['bh_sewage_other']) ? $row['bh_sewage_other'] : ''; ?>" disabled>
                        </div>

                    </div>
                    <script>
                        $(document).ready(function() {
                            var specifyInput = $('#bh_sewage_other');
                            var disposalSelect = $('#bh_sewage_disposal');


                            specifyInput.prop('disabled', disposalSelect.val() !== 'others');


                            disposalSelect.change(function() {
                                specifyInput.prop('disabled', $(this).val() !== 'others');
                                specifyInput.val('');
                            });
                        });
                    </script>


                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="bh_rodent_disposal">3. Types of Rodent / Vermin Disposal:</label>
                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" onchange="toggleInput('bh_garbage_disposal', 'bh_garbage_other')">
                                <option value=""> </option>
                                <option value="dps" <?php echo isset($row['bh_rodent_disposal']) && $row['bh_rodent_disposal'] === 'dps' ? 'selected' : ''; ?>>DPS</option>
                                <option value="others" <?php echo isset($row['bh_rodent_disposal']) && $row['bh_rodent_disposal'] === 'others' ? 'selected' : ''; ?>>Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_rodent_other">Specify:</label>
                            <input type="text" id="bh_rodent_other" class="form-control" name="bh_rodent_other" rows="1" value="<?php echo isset($row['bh_rodent_other']) ? $row['bh_rodent_other'] : ''; ?>" disabled>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            var specifyInput = $('#bh_rodent_other');
                            var disposalSelect = $('#bh_rodent_disposal');


                            specifyInput.prop('disabled', disposalSelect.val() !== 'others');


                            disposalSelect.change(function() {
                                specifyInput.prop('disabled', $(this).val() !== 'others');
                                specifyInput.val('');
                            });
                        });
                    </script>




                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="light_ventilation">Lightning and Ventilation:</label>
                            <select id="light_ventilation" class="form-control" name="light_ventilation">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="natural" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'natural' ? 'selected' : ''; ?>>Natural</option>
                                <option value="artificial" <?php echo isset($row['light_ventilation']) && $row['light_ventilation'] === 'artificial' ? 'selected' : ''; ?>>Artificial</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="natural_artificial">Natural/Artificial:</label>
                            <select id="natural_artificial" class="form-control" name="natural_artificial">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="satisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'satisfactory' ? 'selected' : ''; ?>>Satisfactory</option>
                                <option value="unsatisfactory" <?php echo isset($row['natural_artificial']) && $row['natural_artificial'] === 'unsatisfactory' ? 'selected' : ''; ?>>Unsatisfactory</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="establishment_extension">Is there any extension or additional construction in the establishment?:</label>
                            <select id="establishment_extension" class="form-control" name="establishment_extension">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['establishment_extension']) && $row['establishment_extension'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="specify_txt">Specify if Yes:</label>
                            <textarea id="specify_txt" class="form-control" name="specify_txt" rows="1" required disabled><?php echo isset($row['specify_txt']) ? $row['specify_txt'] : ''; ?></textarea>

                        </div>
                    </div>
                    <script>
                        function toggleTextArea() {
                            var selectElement = document.getElementById("establishment_extension");
                            var textArea = document.getElementById("specify_txt");

                            if (selectElement.value === "yes") {
                                textArea.disabled = false;
                                textArea.required = true;
                            } else {
                                textArea.disabled = true;
                                textArea.required = false;
                                textArea.value = "";
                            }
                        }

                        document.getElementById("establishment_extension").addEventListener("change", toggleTextArea);
                        toggleTextArea();
                    </script>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="with_permit">With Permit?:</label>
                            <select id="with_permit" class="form-control" name="with_permit">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($row['with_permit']) && $row['with_permit'] === 'no' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="bh_remarks">Remarks & Recommendations:</label>
                            <textarea id="bh_remarks" class="form-control" name="bh_remarks"><?php echo isset($row['bh_remarks']) ? $row['bh_remarks'] : ''; ?> </textarea>
                        </div>

                    </div>

                    <div class="row">
                        <label for="office_required">You are hereby requested to appear before this office:</label>
                        <div class="form-group col-md-3">

                            <?php

                            if (isset($row['office_required']) && !empty($row['office_required'])) {

                                $formatted_date = date('Y-m-d', strtotime($row['office_required']));
                            } else {
                                $formatted_date = '';
                            }
                            ?>
                            <input type="date" id="office_required" class="form-control" name="office_required" value="<?php echo $formatted_date; ?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="inspected_by">Inspected By:</label>
                            <textarea id="inspected_by" class="form-control" name="inspected_by"><?php echo isset($row['inspected_by']) ? $row['inspected_by'] : ''; ?> </textarea>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="acknowledge_by">Acknowledge by:</label>
                            <textarea id="acknowledge_by" class="form-control" name="acknowledge_by"><?php echo isset($row['acknowledge_by']) ? $row['acknowledge_by'] : ''; ?> </textarea>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h5> Get Current Location </h5>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h5> GPS: <button type="button" onclick="getLocation()" class="btn btn-primary btn-sm my-2 buton"><i class="fa-solid fa-location-dot"></i></button></h5>
                            <label for="current_loc">Current Location:</label>
                            <div class="input-group">
                                <textarea id="current_loc" class="form-control" rows="1" name="current_loc"><?php echo isset($row['current_loc']) ? $row['current_loc'] : ''; ?></textarea>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_longitude">Longitude:</label>
                            <input id="bh_longitude" class="form-control" type="text" rows="1" name="bh_longitude" value="<?php echo isset($row['bh_longitude']) ? $row['bh_longitude'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_latitude">Latitude:</label>
                            <input id="bh_latitude" class="form-control" type="text" rows="1" name="bh_latitude" value="<?php echo isset($row['bh_latitude']) ? $row['bh_latitude'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_altitude">Altitude:</label>
                            <input id="bh_altitude" class="form-control" type="text" rows="1" name="bh_altitude" value="<?php echo isset($row['bh_altitude']) ? $row['bh_altitude'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_precision">Precision:</label>
                            <input id="bh_precision" class="form-control" type="text" rows="1" name="bh_precision" value="<?php echo isset($row['bh_precision']) ? $row['bh_precision'] : ''; ?>">
                        </div>
                    </div>

                    <script type="text/javascript">
                        function getLocation() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPosition);
                            } else {
                                document.getElementById("current_loc").innerHTML = "Geolocation is not supported by this browser.";
                            }
                        }

                        function showPosition(position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;
                            var altitude = position.coords.altitude;
                            var accuracy = position.coords.accuracy;

                            // Replace null values with "0"
                            latitude = latitude !== null ? latitude : 0;
                            longitude = longitude !== null ? longitude : 0;
                            altitude = altitude !== null ? altitude : 0;
                            accuracy = accuracy !== null ? accuracy : 0;

                            var currentLocation = longitude + "," + latitude + "," + altitude + "," + accuracy;

                            // Update input fields with new coordinates
                            document.getElementById("bh_longitude").value = longitude;
                            document.getElementById("bh_latitude").value = latitude;
                            document.getElementById("bh_altitude").value = altitude;
                            document.getElementById("bh_precision").value = accuracy;
                            document.getElementById("current_loc").value = currentLocation;

                            // Update map display
                            var output = "";
                            output += '<center><iframe src="https://www.google.com/maps?q=' + latitude + ',' + longitude + '&ie=UTF8&iwloc=&output=embed" width="100%" height="200px"></iframe></center>';
                            document.getElementById('displayMapa').innerHTML = output;
                        }
                    </script>

                    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
                    <style>
                        #map {
                            height: 400px;
                        }
                    </style>
                    <div id="map"></div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

                    <script>
                        $(document).ready(function() {

                            pinLocation();
                        });

                        function pinLocation() {
                            var latitude = parseFloat($('#bh_latitude').val());
                            var longitude = parseFloat($('#bh_longitude').val());
                            var precision = parseFloat($('#bh_precision').val());
                            var altitude = parseFloat($('#bh_altitude').val());

                            var mapCenter = [latitude, longitude];
                            var map = L.map('map').setView(mapCenter, 15);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            var marker = L.marker(mapCenter).addTo(map);
                            marker.bindPopup("<b>Precision:</b> " + precision + "<br><b>Altitude:</b> " + altitude).openPopup();
                        }
                    </script>

                    <br>
                    <h5>Boarding House Picture</h5>
                    <!-- Add form for uploading a new image -->

                    <input type="hidden" name="current_image" value="<?php echo isset($row['bh_image']) ? $row['bh_image'] : ''; ?>">
                    <div class="form-group">
                        <label for="new_image">Upload New Image:</label>
                        <input type="file" name="new_image" id="new_image" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <input type="hidden" name="current_image_id" value="<?php echo $row['id']; ?>">
                    <script>
                        function previewImage(event) {
                            var preview = document.getElementById('previewImage');
                            var file = event.target.files[0];
                            var reader = new FileReader();

                            reader.onloadend = function() {
                                preview.src = reader.result;
                            }

                            if (file) {
                                reader.readAsDataURL(file);
                            } else {
                                preview.src = "";
                            }
                        }
                    </script>

                    <div class="row">
                        <br><br>
                        <div class="imageform" style="height: 100%; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                            <?php
                            if (isset($row['bh_image'])) {
                                $imagePath = "resources/gallery/" . $row['bh_image'];
                                if (file_exists($imagePath)) {
                                    echo "<img id='previewImage' src='{$imagePath}' alt='Uploaded Image' class='mx-auto d-block' style='max-width: 100%; height: auto;'>";
                                } else {
                                    echo "<p>{$imagePath}</p>"; // Display the image path if the file doesn't exist
                                }
                            } else {
                                echo "No image found";
                            }
                            ?>
                        </div>
                    </div>






                    <br>
                    <br>

                    <br><br>

                    <button type="submit" class="btn btn-success btn-sm" name="updateform" style="float: right;">Submit</button>
            </div>
            </form>

        </div>
    </div>
    </div>

</section>

</article>





<?php
include 'includes/footer.php';
?>