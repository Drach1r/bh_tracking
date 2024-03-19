<?php
include 'includes/header.php';
?>



<h3 style="margin-left: 205px;" class="title">New Record</h3>

<section class="container">
    <div class="row">
        <div class="card-body">
            <div class="card-title-body">
            </div>
            <br>
            <div class="card card-block  col-lg-12" style=" background-color: white; ">

                <form style="align-item: center;" action="insert_data.php" method="post">

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
                            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter Middle Name" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="suffix">Suffix:</label>
                            <input type="text" name="suffix" id="suffix" class="form-control" placeholder="ex: jr, sr" required>
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
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bh_district">District:</label>
                            <select id="bh_district" name="bh_district" class="form-control" placeholder="Enter City" onchange="populateBarangays()" required>
                                <option value="" disabled selected> -- Select District --</option>

                                <?php

                                $stmt = $pdo->query("SELECT DISTINCT district FROM bh_address");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bh_barangay">Barangay:</label>
                            <select id="bh_barangay" name="bh_barangay" class="form-control" required>
                                <option value="" disabled selected> -- Select Barangay --</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">

                            <label for="bh_province">Province:</label>
                            <input type="text" id="bh_province" name="bh_province" class="form-control" value="ILOILO" disabled required>

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
                            <input type="text" id="bh_mp" class="form-control" name="bh_mp" placeholder="Enter Mode" required>
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
                                <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind" value="A" required>
                                A. Made of Strong Materials
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" name="bh_construction_kind" value="B" required>
                                B. Made of Light Materials
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_construction_kind" id="otherSpecifyCheckbox" name="bh_construction_kind" value="C" required>
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
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="A" required>
                                Class A
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="B" required>
                                Class B
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="C" required>
                                Class C
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input bh_class" id="bh_class" name="bh_class" value="D" required>
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
                            <label for="bh_occupants">Num. of Occupants:</label>
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

                            <select id="bh_rates_charge" class="form-control" name="bh_rates_charge" required>>
                                <option value="" disabled selected>-- Select Rates --</option>
                                <option value="yes">Lodging</option>
                                <option value="">Board</option>
                                <option value="">Bed Space</option>
                                <option value="">Room Rent</option>
                                <option value="">House Rent </option>
                                <option value="">Rent Per Unit(Apartment)</option>

                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_rate">Rates:</label>
                            <input type="number" id="bh_rate" class="form-control" name="bh_rate" placeholder="Enter Rates" required>
                        </div>

                    </div>
                    <p> Sources of Water Supply:</p>
                    <div style="margin-left: 5px;" class="row">
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input " id="bh_water_source" name="bh_water_source" value="NAWASA" required>
                                NAWASA
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" class="form-check-input " id="bh_water_source" name="bh_water_source" value="Deep Well" required>
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
                        <div class="form-group col-md-4">
                            <label for="bh_toilet_type">Toilet Facilities Type:</label>
                            <input type="text" id="bh_toilet_type" class="form-control" name="bh_toilet_type" placeholder="Enter Toilet Type" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="bh_toilet_cond">Sanitary Condition:</label>

                            <select id="bh_toilet_cond" class="form-control" name="bh_toilet_cond" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="Good"> Good</option>
                                <option value="Fair"> Fair</option>
                                <option value="Poor"> Poor</option>

                            </select>
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
                                <option value="Good"> Good</option>
                                <option value="Fair"> Fair</option>
                                <option value="Poor"> Poor</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_cr_num">Num of CR:</label>
                            <input type="number" id="bh_cr_num" class="form-control" name="bh_cr_num" placeholder="Enter no. CR" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_bathroom_num">Num of Bath Room:</label>
                            <input type="number" id="bh_bathroom_num" class="form-control" name="bh_bathroom_num" placeholder="Enter no. BR" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_premises_cond">Sanitary Condition Of The Premises:</label>

                            <select id="bh_premises_cond" class="form-control" name="bh_premises_cond" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="Good"> Good</option>
                                <option value="Fair"> Fair</option>
                                <option value="Poor"> Poor</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_garbage_disposal">1. Types of Garbage Disposal</label>

                            <select id="bh_garbage_disposal" class="form-control" name="bh_garbage_disposal" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="DPS"> DPS</option>


                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_sewage_disposal">2. Types of Sewage Disposal</label>

                            <select id="bh_sewage_disposal" class="form-control" name="bh_sewage_disposal" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="DPS"> DPS</option>


                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_rodent_disposal">3. Types of Rodent / Vermin Disposal</label>

                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value=""> </option>
                                <option value="DPS"> DPS</option>


                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_rodent_disposal">Lightning and Ventilation</label>

                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="Natural">Natural </option>
                                <option value="Artificial"> Artificial</option>


                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_rodent_disposal">Natural / Artficial</label>

                            <select id="bh_rodent_disposal" class="form-control" name="bh_rodent_disposal" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="Satisfactory">Satisfactory </option>
                                <option value="Unsatisfactory"> Unsatisfactory</option>


                            </select>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="bh_portable">Is there anyextension or additional construction in the establishment? :</label>

                            <select id="bh_portable" class="form-control" name="bh_portable" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="bh_portable">With Permit:</label>

                            <select id="bh_portable" class="form-control" name="bh_portable" required>>
                                <option value="" disabled selected>-- Select Option --</option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="bh_rate">Remarks & Recommendations:</label>
                            <input type="text" id="bh_rate" class="form-control" name="bh_rate" placeholder="Enter Rates" required>
                        </div>
                    </div>


                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

</article>



<?php
include 'includes/footer.php';
?>