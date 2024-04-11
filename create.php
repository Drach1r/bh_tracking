<?php
include 'includes/header.php';
?>



<h3 class="title">New Record</h3>

<section class="container">
    <div class="row">
        <div class="card-body">
            <div class="card-title-body">
            </div>
            <br>
            <div class="card card-block  col-lg-12" style=" background-color: white; ">
                <form action="resources/dr/save.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                    <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">

                    <br>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-3">

                            <label for="account_number">Account Number:</label>
                            <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                        </div>
                        <div class="form-group col-md-5">

                            <label for="establishment_name">Name of Establishment:</label>
                            <input type="text" id="establishment_name" name="establishment_name" class="form-control" placeholder="Enter Name of Establishment" required>
                        </div>

                    </div>
                    <BR>
                    <h2>Name of Owner / Manager</h2>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="middlename">Middle Name:</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter Middle Name">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="suffix">Suffix:</label>
                            <input type="text" name="suffix" id="suffix" class="form-control" placeholder="ex: jr, sr">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">

                            <label for="bh_address">Address:</label>
                            <input type="text" id="bh_address" name="bh_address" class="form-control" placeholder="Enter Address" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="bh_municipality">City/Municipality:</label>
                            <input type="text" id="bh_municipality" name="bh_municipality" class="form-control" value="ILOILO CITY" disabled required>

                            <input type="hidden" name="bh_municipality_hidden" value="ILOILO CITY">
                        </div>



                        <div class="form-group col-md-3">
                            <label for="bh_district">District:</label>
                            <select id="bh_district" name="bh_district" class="form-control" placeholder="Enter City" onchange="populateBarangays()" required>
                                <option value="" disabled selected> -- Select District --</option>
                                <?php
                                try {
                                    $pdo = new PDO('mysql:host=localhost;dbname=bh_tracking', 'root', '');
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $query = "SELECT id, district_name FROM bh_district";
                                    $stmt = $pdo->query($query);

                                    if ($stmt->rowCount() > 0) {
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['district_name'] . "</option>";
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
                            <select id="bh_barangay" name="bh_barangay" class="form-control">
                                <option value="" disabled selected> -- Select Barangay --</option>
                            </select>
                        </div>

                        <script>
                            function populateBarangays() {
                                var districtId = document.getElementById("bh_district").value;
                                var selectBarangay = document.getElementById("bh_barangay");
                                selectBarangay.innerHTML = '<option value="" disabled selected> -- Select Barangay --</option>';

                                if (districtId !== "") {
                                    fetch('fetch_barangays.php?district_id=' + districtId)
                                        .then(response => response.json())
                                        .then(data => {
                                            data.forEach(barangay => {
                                                var option = document.createElement('option');
                                                option.value = barangay.id;
                                                option.textContent = barangay.barangay;
                                                selectBarangay.appendChild(option);
                                            });
                                        })
                                        .catch(error => console.error('Error fetching barangays:', error));
                                }
                            }
                        </script>





                        <div class="form-group col-md-3">
                            <label for="bh_province">Province:</label>
                            <input type="text" id="bh_province" name="bh_province" class="form-control" value="ILOILO" disabled required>

                            <input type="hidden" name="bh_province_hidden" value="ILOILO">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_control_no">BH Control No.:</label>
                            <input type="text" id="bh_control_no" name="bh_control_no" class="form-control" placeholder="Enter Control Number" required>
                        </div>


                    </div>

                    <h4>Official Receipt</h4>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_or_num">Official Receipt Number:</label>
                            <input type="text" id="bh_or_num" name="bh_or_num" class="form-control" placeholder="Enter OR Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bh_bpn">Business Permit Number:</label>
                            <input type="text" id="bh_bpn" class="form-control" name="bh_bpn" placeholder="Enter BP Number" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_issued">Date Issued:</label>
                            <input type="date" id="date_issued" class="form-control" name="date_issued" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="amount_paid">Amount Paid:</label>
                            <input type="number" id="amount_paid" class="form-control" name="amount_paid" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_mp">Mode of Payment:</label>
                            <select id="bh_mp" class="form-control" name="bh_mp" required>
                                <option value="" disabled selected> -- Select Mode --</option>
                                <option value="annual">Annual</option>
                                <option value="semi_annual">Semi-Annual</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="date_paid">Date Paid:</label>
                            <input type="date" id="date_paid" class="form-control" name="date_paid" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_period_cover">Period Covered:</label>
                            <input type="text" id="bh_period_cover" class="form-control" name="bh_period_cover" placeholder="Enter Period Covered" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_complaint">Compliant:</label>

                            <select id="bh_complaint" class="form-control" name="bh_complaint" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>
                            </select>
                        </div>
                    </div>


                    <br>
                    <h2>Classification And Rates</h2>
                    <p> Kind Of Construction of the Boarding House:</p>
                    <div style="margin-left: 5px;" class="row">
                        <div class="form-group col-md-3">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind" value="a__made_of_strong_materials">
                                A. Made of Strong Materials
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind" value="b__made_of_light_materials">
                                B. Made of Light Materials
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" id="otherSpecifyCheckbox" name="bh_construction_kind" value="c__other__specify">
                                C. Other: </label>
                        </div>
                        <div class="form-group col-md-3">

                            <input type="text" id="bh_specify" name="bh_specify" class="form-control" placeholder="Specify other" disabled>


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
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="class_a">
                                Class A
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="class_b">
                                Class B
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="class_c">
                                Class C
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="class_d">
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
                            <input type="number" id="bh_room" class="form-control" name="bh_room" placeholder="No. Rooms" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_occupants">No. of Occupants:</label>
                            <input type="number" id="bh_occupants" class="form-control" name="bh_occupants" placeholder="No. Occupants" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_overcrowded">Overcrowded:</label>

                            <select id="bh_overcrowded" class="form-control" name="bh_overcrowded" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_rates_charge">Rates being Charged:</label>
                            <select id="bh_rates_charge" class="form-control" name="bh_rates_charge" required>
                                <option value="" disabled selected>-- Select Rates --</option>
                                <option value="lodging">Lodging</option>
                                <option value="board">Board</option>
                                <option value="bed_space">Bed Space</option>
                                <option value="room_rent">Room Rent</option>
                                <option value="house_rent">House Rent</option>
                                <option value="rent_per_unit__apartment">Rent Per Unit(Apartment)</option>
                                <option value="other">Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_ratescharge_other">Specify Others:</label>
                            <input type="text" id="bh_ratescharge_other" class="form-control" name="bh_ratescharge_other" placeholder="Enter Rates" disabled required>
                        </div>

                        <script>
                            document.getElementById('bh_rates_charge').addEventListener('change', function() {
                                var specifyRatesInput = document.getElementById('bh_ratescharge_other');
                                if (this.value === 'other') {
                                    specifyRatesInput.disabled = false;
                                    specifyRatesInput.value = '';
                                    specifyRatesInput.focus();
                                } else {
                                    specifyRatesInput.disabled = true;
                                    specifyRatesInput.value = '';
                                }
                            });
                        </script>




                        <div class="form-group col-md-2">
                            <label for="bh_rate">Rates:</label>
                            <input type="number" id="bh_rate" class="form-control" name="bh_rate" placeholder="Enter Rates" required>
                        </div>

                    </div>
                    <p> Sources of Water Supply:</p>
                    <div style="margin-left: 5px;" class="row">
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input" id="bh_water_source_nawasa" name="bh_water_source_nawasa" value="nawasa">
                                NAWASA
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input" id="bh_water_source_deepwell" name="bh_water_source_deepwell" value="deep_well">
                                Deep Well
                            </label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_adequate">Adequate:</label>

                            <select id="bh_adequate" class="form-control" name="bh_adequate" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_portable">Portable:</label>

                            <select id="bh_portable" class="form-control" name="bh_portable" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_toilet_type">Toilet Facilities Type:</label>
                            <input type="text" id="bh_toilet_type" class="form-control" name="bh_toilet_type" placeholder="Enter Toilet Type" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_toilet_cond">Sanitary Condition:</label>

                            <select id="bh_toilet_cond" class="form-control" name="bh_toilet_cond" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good"> Good</option>
                                <option value="fair"> Fair</option>
                                <option value="poor"> Poor</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_cr_num">No. of CR:</label>
                            <input type="number" id="bh_cr_num" class="form-control" name="bh_cr_num" placeholder="Enter no. CR" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_bath_type">Bath Facilities Type:</label>
                            <input type="text" id="bh_bath_type" class="form-control" name="bh_bath_type" placeholder="Enter Toilet Type" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_bath_cond">Sanitary Condition:</label>

                            <select id="bh_bath_cond" class="form-control" name="bh_bath_cond" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good"> Good</option>
                                <option value="fair"> Fair</option>
                                <option value="poor"> Poor</option>

                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_bathroom_num">No. of Bath Rooms:</label>
                            <input type="number" id="bh_bathroom_num" class="form-control" name="bh_bathroom_num" placeholder="Enter no. BR" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_premises_cond">Sanitary Condition Of The Premises:</label>

                            <select id="bh_premises_cond" class="form-control" name="bh_premises_cond" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="good"> Good</option>
                                <option value="fair"> Fair</option>
                                <option value="poor"> Poor</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_garbage_disposal">1. Types of Garbage Disposal:</label>
                            <select id="bh_garbage_disposal" class="form-control" name="bh_garbage_disposal" required onchange="toggleInput('bh_garbage_disposal', 'bh_garbage_other')">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps"> DPS</option>
                                <option value="others"> Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_garbage_other">Specify:</label>
                            <input type="text" id="bh_garbage_other" class="form-control" name="bh_garbage_other" rows="1" placeholder="Specify other" required disabled>
                        </div>
                    </div>


                    <script>
                        document.getElementById('bh_garbage_disposal').addEventListener('change', function() {
                            var specifyRatesInput = document.getElementById('bh_garbage_other');
                            if (this.value === 'others') {
                                specifyRatesInput.disabled = false;
                                specifyRatesInput.value = '';
                                specifyRatesInput.focus();
                            } else {
                                specifyRatesInput.disabled = true;
                                specifyRatesInput.value = '';
                            }
                        });
                    </script>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bh_sewage_disposal">2. Types of Sewage Disposal:</label>
                            <select id="bh_sewage_disposal" class="form-control" name="bh_sewage_disposal" required onchange="toggleInput('bh_sewage_disposal', 'bh_sewage_other')">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps"> DPS</option>
                                <option value="others"> Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_sewage_other">Specify:</label>
                            <input type="text" id="bh_sewage_other" class="form-control" name="bh_sewage_other" rows="1" placeholder="Specify other" required disabled>
                        </div>
                    </div>

                    <script>
                        document.getElementById('bh_sewage_disposal').addEventListener('change', function() {
                            var specifyRatesInput = document.getElementById('bh_sewage_other');
                            if (this.value === 'others') {
                                specifyRatesInput.disabled = false;
                                specifyRatesInput.value = '';
                                specifyRatesInput.focus();
                            } else {
                                specifyRatesInput.disabled = true;
                                specifyRatesInput.value = '';
                            }
                        });
                    </script>
                    <div Class="row">
                        <div class="form-group col-md-4">
                            <label for="bh_rodent_disposal">3. Types of Rodent / Vermin Disposal:</label>
                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" required onchange="toggleInput('bh_rodent_disposal', 'bh_rodent_other')">
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="dps"> DPS</option>
                                <option value="others"> Others:</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bh_rodent_other">Specify:</label>
                            <input type="text" id="bh_rodent_other" class="form-control" name="bh_rodent_other" rows="1" placeholder="Specify other" required disabled>
                        </div>
                    </div>
                    <script>
                        document.getElementById('bh_rodent_disposal').addEventListener('change', function() {
                            var specifyRatesInput = document.getElementById('bh_rodent_other');
                            if (this.value === 'others') {
                                specifyRatesInput.disabled = false;
                                specifyRatesInput.value = '';
                                specifyRatesInput.focus();
                            } else {
                                specifyRatesInput.disabled = true;
                                specifyRatesInput.value = '';
                            }
                        });
                    </script>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="light_ventilation">Lightning and Ventilation:</label>

                            <select id="light_ventilation" class="form-control" name="light_ventilation" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="natural">Natural </option>
                                <option value="artificial"> Artificial</option>


                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="natural_artificial">Natural / Artficial</label>

                            <select id="natural_artificial" class="form-control" name="natural_artificial" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="satisfactory">Satisfactory </option>
                                <option value="unsatisfactory"> Unsatisfactory</option>


                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="establishment_extension">Is there any extension or additional construction in the establishment? :</label>
                            <select id="establishment_extension" class="form-control" name="establishment_extension" required>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="specify_txt">Specify if Yes:</label>
                            <textarea type="text" id="specify_txt" class="form-control" name="specify_txt" rows="1" placeholder="Specify" required disabled></textarea>
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
                    </script>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="with_permit">With Permit?:</label>

                            <select id="with_permit" class="form-control" name="with_permit" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="bh_remarks">Remarks & Recommendations:</label>
                            <textarea type="text" id="bh_remarks" class="form-control" name="bh_remarks" placeholder="Enter Rates" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="office_required">You are hereby requested to appear before this office:</label>
                            <input type="date" id="office_required" class="form-control" name="office_required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="inspected_by">Inspected by:</label>
                            <input type="text" id="inspected_by" class="form-control" name="inspected_by" placeholder="Enter name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="acknowledge_by">Acknowledge by:</label>
                            <input type="text" id="acknowledge_by" class="form-control" name="acknowledge_by" placeholder="Enter name" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h2> Get Current Location </h2>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <h5> GPS: <button type="button" onclick="getLocation()" class="btn btn-primary btn-sm my-2 buton"> <i class="fa-solid fa-location-dot"></i></button></h5>
                            <label for="current_loc">Current Location:</label>
                            <textarea id="current_loc" class="form-control" rows="1" name="current_loc" required readonly> </textarea>

                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_longitude">Longitude:</label>
                            <textarea id="bh_longitude" class="form-control" rows="1" name="bh_longitude" required readonly> </textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_latitude">Latitude:</label>
                            <textarea id="bh_latitude" class="form-control" rows="1" name="bh_latitude" required readonly></textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_altitude">Altitude:</label>
                            <textarea id="bh_altitude" class="form-control" rows="1" name="bh_altitude" required readonly></textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_precision">Precision:</label>
                            <textarea id="bh_precision" class="form-control" rows="1" name="bh_precision" required readonly></textarea>
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


                            latitude = latitude !== null ? latitude : 0;
                            longitude = longitude !== null ? longitude : 0;
                            altitude = altitude !== null ? altitude : 0;
                            accuracy = accuracy !== null ? accuracy : 0;

                            var currentLocation = longitude + "," + latitude + "," + altitude + "," + accuracy;

                            document.getElementById("bh_longitude").innerHTML = longitude;
                            document.getElementById("bh_latitude").innerHTML = latitude;
                            document.getElementById("bh_altitude").innerHTML = altitude;
                            document.getElementById("bh_precision").innerHTML = accuracy;
                            document.getElementById("current_loc").innerHTML = currentLocation;

                            var output = "";
                            output += '<center><iframe src="https://www.google.com/maps?q=' + latitude + ',' + longitude + '&ie=UTF8&iwloc=&output=embed" width="100%" height="200px"></iframe></center>';
                            document.getElementById('displayMapa').innerHTML = output;
                        }
                    </script>


                    <br>
                    <h2>Upload Boarding House Picture</h2>

                    <div class="row">

                        <input type="file" name="bh_image" accept="image/*" capture="camera" id="image-input" onchange="previewImage(this)">
                        <br><br>

                        <div class="imageform" style="height: 100%; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                            <img id="selected-image-preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 100%;">
                        </div>

                    </div>
                    <script>
                        function previewImage(input) {
                            if (input.files && input.files[0]) {

                                if (input.files[0].size <= 5 * 1024 * 1024) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('selected-image-preview').src = e.target.result;
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                } else {
                                    alert("File size exceeds 5MB. Please select a smaller file.");

                                    input.value = "";
                                }
                            }
                        }
                    </script>

                    <br>
                    <br>






                    <button type="submit" class="btn btn-success btn-sm" onclick="uploadImage()" style="float: right;" name="addform">Submit</button>

                </form>
            </div>
        </div>
    </div>

</section>

</article>





<?php
include 'includes/footer.php';
?>