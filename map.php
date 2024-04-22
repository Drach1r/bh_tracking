<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>


<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="resources/css/map_style.css">


<div id="map-container">
    <div class="burger-icon" style="top: -80px; left: 10px;">
        <span class="fas fa-bars" id="burger-icon"></span>
        Filter Map
    </div>

    <div class="filter-form-container" style="position: relative; right: 100px; width: 25%;">
        <div class="filter-form">
            <label for="establishment-name"><strong>Search by type:</strong></label>
            <input type="text" id="establishment-name" class="form-control">

            <br>
            <label for="district"><strong>District:</strong></label>
            <select id="district" name="district" class="form-control" onchange="populateBarangays()">
                <option value="">-- Select District --</option>
                <?php
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=bh_tracking', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "SELECT id, district_name FROM bh_district";
                    $stmt = $pdo->query($query);

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                            $selected = '';
                            if ($row['id'] == $selectedDistrictId) {
                                $selected = 'selected';
                            }

                            echo "<option value='" . $row['id'] . "' $selected>" . $row['district_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No districts found</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </select>

            <label for="barangay"><strong>Barangay:</strong></label>
            <select id="barangay" name="barangay" class="form-control">
                <option value="">-- Select Barangay --</option>
            </select>
            <script>
                function populateBarangays() {
                    var districtId = document.getElementById("district").value;
                    var selectBarangay = document.getElementById("barangay");
                    selectBarangay.innerHTML = '<option value=""  selected> -- Select Barangay --</option>';

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



            <br>

            <div class="row">
                <label for="bh_mp"><strong>Mode of Payment:</strong></label>
                <div class="checkbox-group">

                    <label><input type="checkbox" class="bh_mp mp-checkbox-group" value="annual"> Annual</label>
                    <label><input type="checkbox" class="bh_mp mp-checkbox-group" value="quarterly"> Quarterly</label>

                </div>
                <div class="checkbox-group">
                    <label><input type="checkbox" class="bh_mp mp-checkbox-group" value="monthly">Monthly</label>
                    <label><input type="checkbox" class="bh_mp mp-checkbox-group" value="semi-annual"> Semi-Annual</label>


                    <script>
                        $(document).ready(function() {
                            $('.mp-checkbox-group').click(function() {

                                $('.mp-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>


                </div>
            </div>

            <div class="row">
                <div class="checkbox-group">
                    <label for="construction-kind"><strong>Kind of Construction:</strong></label>
                    <label><input type="checkbox" class="bh_construction_kind kind-checkbox-group" value="made_of_strong_materials"> A. Made
                        of Strong Materials</label>
                    <label><input type="checkbox" class="bh_construction_kind kind-checkbox-group" value="made_of_light_materials"> B. Made
                        of Light Materials</label>
                    <label><input type="checkbox" class="bh_construction_kind kind-checkbox-group" value="other_specify"> C. Other:</label>
                    <input type="text" id="bh_specify" name="bh_specify" placeholder="Specify" style="display: none;">

                    <script>
                        $(document).ready(function() {
                            $('.kind-checkbox-group').click(function() {

                                $('.kind-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>
                </div>

                <div class="checkbox-group">
                    <label for="class"><strong>Class of Boarding House:</strong></label>
                    <label><input type="checkbox" class="bh_class bh-checkbox-group" value="class_a"> Class A</label>
                    <label><input type="checkbox" class="bh_class bh-checkbox-group" value="class_b"> Class B</label>
                    <label><input type="checkbox" class="bh_class bh-checkbox-group" value="class_c"> Class C</label>
                    <label><input type="checkbox" class="bh_class bh-checkbox-group" value="class_d"> Class D</label>

                    <script>
                        $(document).ready(function() {
                            $('.bh-checkbox-group').click(function() {

                                $('.bh-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>
                </div>
            </div>

            <div class="row">
                <div class="checkbox-group">
                    <label for="rates"><strong>Rates being Charged:</strong></label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="lodging">
                        Lodging</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="board">
                        Board</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="bed_space"> Bed
                        Space</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="room_rent"> Room
                        Rent</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="house_rent"> House
                        Rent</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="rent_per_unit__apartment"> Rent Per Unit(Apartment)</label>
                    <label><input type="checkbox" class="bh_rates_charge rate-checkbox-group" value="other">
                        Others</label>
                    <input type="text" id="other-rates" name="bh_ratescharge_other" placeholder="Specify Rates" style="display: none;">

                    <script>
                        $(document).ready(function() {
                            $('.rate-checkbox-group').click(function() {

                                $('.rate-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>
                </div>

                <div class="checkbox-group">
                    <label for="water-source"><strong>Sources of Water Supply:</strong></label>
                    <label><input type="checkbox" class="bh_water_source" value="nawasa"> Nawasa</label>
                    <label><input type="checkbox" class="bh_water_source" value="deep_well"> Deep Well</label>

                    <label for="bh_premises_cond"><strong>Sanitary Condition of the Premises:</strong></label>
                    <label><input type="checkbox" class="bh_premises_cond premises-checkbox-group" value="good"> Good </label>
                    <label><input type="checkbox" class="bh_premises_cond premises-checkbox-group" value="fair"> Fair</label>
                    <label><input type="checkbox" class="bh_premises_cond premises-checkbox-group" value="poor"> Poor</label>

                </div>
                <script>
                    $(document).ready(function() {
                        $('.premises-checkbox-group').click(function() {

                            $('.premises-checkbox-group').not(this).prop('checked', false);
                        });
                    });
                </script>

            </div>

            <div class="row">
                <div class="checkbox-group">
                    <label for="lighting-ventilation"><strong>Lightning and Ventilation:</strong></label>
                    <label><input type="checkbox" class="light_ventilation light-checkbox-group" value="natural">
                        Natural</label>
                    <label><input type="checkbox" class="light_ventilation light-checkbox-group" value="artificial">
                        Artificial</label>

                    <script>
                        $(document).ready(function() {
                            $('.light-checkbox-group').click(function() {

                                $('.light-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>
                </div>

                <div class="checkbox-group">
                    <label for="with-permit"><strong>With Permit:</strong></label>
                    <label><input type="checkbox" class="with_permit permit-checkbox-group" value="yes"> Yes</label>
                    <label><input type="checkbox" class="with_permit permit-checkbox-group" value="no"> No</label>
                    <script>
                        $(document).ready(function() {
                            $('.permit-checkbox-group').click(function() {

                                $('.permit-checkbox-group').not(this).prop('checked', false);
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>

    <div id="map" style="right: 80px;"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    $(document).ready(function() {

        function toggleFilterForm() {
            $('.filter-form-container').toggleClass('hidden');
            $('#map').toggleClass('expanded');
            map.invalidateSize();
        }

        $('#burger-icon').click(function() {
            toggleFilterForm();
        });

        var map = L.map('map').setView([10.7202, 122.5621], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = [];

        $.ajax({
            url: 'resources/dr/pins.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                data.forEach(function(item) {
                    var latitude = parseFloat(item.bh_latitude);
                    var longitude = parseFloat(item.bh_longitude);
                    var districtId = parseInt(item.bh_district_id);
                    var barangayId = parseInt(item.barangay_id);
                    var establishmentName = String(item.establishment_name);
                    var accountnum = String(item.account_number);
                    var firstname = String(item.first_name);
                    var middlename = String(item.middle_name);
                    var lastname = String(item.last_name);
                    var address = String(item.bh_address);
                    var municipality = String(item.bh_municipality);
                    var district = String(item.district_name);
                    var barangay = String(item.barangay_name);
                    var province = String(item.bh_province);
                    var controlNumber = String(item.bh_control_no);
                    var orNumber = String(item.bh_or_num);
                    var dateIssued = String(item.date_issued);
                    var amountPaid = parseFloat(item.amount_paid);
                    var bpn = String(item.bh_bpn);
                    var mp = String(item.bh_mp);
                    var datePaid = String(item.date_paid);
                    var periodCover = String(item.bh_period_cover);
                    var complaint = String(item.bh_complaint);
                    var constructionKind = String(item.bh_construction_kind);
                    var specify = String(item.bh_specify);
                    var bhClass = String(item.bh_class);
                    var bhRoom = String(item.bh_room);
                    var occupants = parseInt(item.bh_occupants) || 0;
                    var overcrowded = parseInt(item.bh_overcrowded) || 0;
                    var ratesCharge = item.bh_rates_charge ? String(item.bh_rates_charge) : '';
                    var ratesChargeOther = item.bh_ratescharge_other ? String(item.bh_ratescharge_other) : '';
                    var rate = parseFloat(item.bh_rate) || 0.0;
                    var waterSource = String(item.bh_water_source);
                    var adequate = String(item.bh_adequate);
                    var portable = String(item.bh_portable);
                    var toilettype = String(item.bh_toilet_type);
                    var toiletcond = String(item.bh_toilet_cond);
                    var bathtype = String(item.bh_bath_type);
                    var bathcond = String(item.bh_bath_cond);
                    var crnum = String(item.bh_cr_num);
                    var bathroomnum = String(item.bh_bathroom_num);
                    var premisescond = String(item.bh_premises_cond);
                    var garbagedisposal = String(item.bh_garbage_disposal);
                    var garbageother = String(item.bh_garbage_other);
                    var dps = String(item.bh_dps);
                    var sewagedisposal = String(item.bh_sewage_disposal);
                    var sewageother = String(item.bh_sewage_other);
                    var sddps = String(item.bh_sd_dps);
                    var rodentdisposal = String(item.bh_rodent_disposal);
                    var rodentother = String(item.bh_rodent_other);
                    var ventilation = String(item.light_ventilation);
                    var artificial = String(item.natural_artificial);
                    var extension = String(item.establishment_extension);
                    var txt = String(item.specify_txt);
                    var with_permit = String(item.with_permit);
                    var remarks = String(item.bh_remarks);
                    var required = String(item.office_required);
                    var inspect = String(item.inspected_by);
                    var acknowledge = String(item.acknowledge_by);
                    var imageName = String(item.bh_image);
                    var imagePath = `resources/gallery/${imageName}`;

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        var mapCenter = [latitude, longitude];

                        var redDotIcon = L.divIcon({
                            className: 'custom-icon',
                            iconSize: [12, 12],
                            html: '<div style="width: 12px; height: 12px; background-color: red; border-radius: 50%;"></div>'
                        });

                        var marker = L.marker(mapCenter, {
                            icon: redDotIcon,
                            districtId: districtId,
                            barangayId: barangayId
                        }).addTo(map);
                        marker.bindPopup(
                            `<div class="popup-content">
                            <h4>${establishmentName}</h4>
                            <br>
                            <ul>
                            <li><b>Account No.:</b> ${accountnum}</li>
                            <li><b>First Name:</b> ${firstname}</li>
                            <li><b>Middle Name:</b> ${middlename}</li>
                                <li><b>Last Name:</b> ${lastname}</li>
                                <li><b>Municipality:</b> ${municipality}</li>
                                <li><b>District:</b> ${district}</li>
                                <li><b>Barangay:</b> ${barangay}</li>
                                <li><b>Province:</b> ${province}</li>
                                <li><b>Control Number:</b> ${controlNumber}</li>
                                <li><b>OR Number:</b> ${orNumber}</li>
                                <li><b>Date Issued:</b> ${dateIssued}</li>
                                <li><b>Amount Paid:</b> ${amountPaid}</li>
                                <li><b>Business Permit Number:</b> ${bpn}</li>
                                <li><b>Mode of Payment:</b> ${mp}</li>
                                <li><b>Date Paid:</b> ${datePaid}</li>
                                <li><b>Period Cover:</b> ${periodCover}</li>
                                <li><b>Complaint:</b> ${complaint}</li>
                                <li><b>Construction Kind:</b> ${constructionKind}</li>
                                <li><b>Specify:</b> ${specify}</li>
                                <li><b>Class:</b> ${bhClass}</li>
                                <li><b>Room:</b> ${bhRoom}</li>
                                <li><b>Occupants:</b> ${occupants}</li>
                                <li><b>Overcrowded:</b> ${overcrowded}</li>
                                <li><b>Rates being Charged:</b> ${ratesCharge}</li>
                                <li><b>Rates being Charged (Others):</b> ${ratesChargeOther}</li>
                                <li><b>Rate:</b> ${rate}</li>
                                <li><b>Water Source:</b> ${waterSource}</li>
                                <li><b>Adequate:</b> ${adequate}</li>
                                <li><b>Portable:</b> ${portable}</li>
                                <li><b>Toilet Type:</b> ${toilettype}</li>
                                <li><b>Toilet Condition:</b> ${toiletcond}</li>
                                <li><b>Bath Type:</b> ${bathtype}</li>
                                <li><b>Bath Condition:</b> ${bathcond}</li>
                                <li><b>CR Number:</b> ${crnum}</li>
                                <li><b>Bathroom Number:</b> ${bathroomnum}</li>
                                <li><b>Premise Condition:</b> ${premisescond}</li>
                                <li><b>Type of Garbage Disposal:</b> ${garbagedisposal}</li>
                                <li><b>Type of Garbage Disposal (Others):</b> ${garbageother}</li>
                                <li><b>Type of Sewage Disposal:</b> ${sewagedisposal} ${sewageother}</li>
                                <li><b>Type of Rodent Disposal:</b> ${rodentdisposal} ${rodentother}</li>
                                <li><b>Light and ventilation:</b> ${ventilation}</li>
                                <li><b>Natural or Artificial:</b> ${artificial}</li>
                                <li><b>Establishment Extension:</b> ${extension}</li>
                                <li><b>Specify Extension:</b> ${txt}</li>
                                <li><b>With Permit:</b> ${with_permit}</li>
                                <li><b>Remarks and Recommendation:</b> ${remarks}</li>
                                <li><b>Office Required:</b> ${required}</li>
                                <li><b>Inspected by:</b> ${inspect}</li>
                                <li><b>Acknowledge by:</b> ${acknowledge}</li>
                                <li><b>Boarding house image:</b></li>
                                <li><img src="${imagePath}" alt="Boarding house image" style="max-width: 200px;"></li>
                            </ul>
                        </div>`
                        );

                        markers.push(marker);
                    } else {
                        console.error('Invalid latitude or longitude:', item);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching boarding house locations:", error);
            }
        });

        $('#establishment-name, #district, #barangay, .bh_construction_kind, .bh_class, .bh_rates_charge, .bh_mp, .bh_water_source, .bh_premises_cond, .light_ventilation, .with_permit').on('input change', function() {
            var establishmentName = $('#establishment-name').val().toLowerCase();
            var district = $('#district').val();
            var barangay = $('#barangay').val();
            var constructionKind = $('.bh_construction_kind:checked').map(function() {
                return this.value;
            }).get().join(",");
            var bhClass = $('.bh_class:checked').map(function() {
                return this.value;
            }).get().join(",");
            var mp = $('.bh_mp:checked').map(function() {
                return this.value;
            }).get().join(",");
            var rates = $('.bh_rates_charge:checked').map(function() {
                return this.value;
            }).get().join(",");
            var waterSource = $('.bh_water_source:checked').map(function() {
                return this.value;
            }).get().join(",");
            var ventilation = $('.light_ventilation:checked').map(function() {
                return this.value;
            }).get().join(",");
            var with_permit = $('.with_permit:checked').map(function() {
                return this.value;
            }).get().join(",");
            var premisescond = $('.bh_premises_cond:checked').map(function() {
                return this.value;
            }).get().join(",");

            markers.forEach(function(marker) {
                var popupContent = marker.getPopup().getContent().toLowerCase();
                var markerDistrict = marker.options.districtId;
                var markerBarangay = marker.options.barangayId;

                var showMarker =
                    (establishmentName === '' || popupContent.includes(establishmentName)) &&
                    (constructionKind === '' || popupContent.includes(constructionKind)) &&
                    (bhClass === '' || popupContent.includes(bhClass)) &&
                    (mp === '' || popupContent.includes(mp)) &&
                    (rates === '' || popupContent.includes(rates)) &&
                    (waterSource === '' || waterSource.split(',').every(val => popupContent.includes(val.trim()))) &&
                    (ventilation === '' || popupContent.includes(ventilation)) &&
                    (with_permit === '' || popupContent.includes(with_permit)) &&
                    (premisescond === '' || popupContent.includes(premisescond)) &&
                    (district === '' || markerDistrict === parseInt(district)) &&
                    (barangay === '' || markerBarangay === parseInt(barangay));
                if (showMarker) {
                    marker.addTo(map);
                } else {
                    map.removeLayer(marker);
                }
            });
        });


        $('#district').on('change', function() {
            var selectedDistrictId = $(this).val();

            markers.forEach(function(marker) {
                var districtIdFromMarker = marker.options.districtId;


                var showMarker = selectedDistrictId === '' || districtIdFromMarker === parseInt(selectedDistrictId);

                if (showMarker) {

                    marker.addTo(map);
                } else {

                    map.removeLayer(marker);
                }
            });
        });
        $('#barangay').on('change', function() {
            var selectedBarangayId = $(this).val();

            markers.forEach(function(marker) {
                var barangayIdFromMarker = marker.options.barangayId;


                var showMarker = selectedBarangayId === '' || barangayIdFromMarker === parseInt(selectedBarangayId);

                if (showMarker) {

                    marker.addTo(map);
                } else {

                    map.removeLayer(marker);
                }
            });
        });




    });
</script>


<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>