<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map-container {
        display: flex;
        align-items: flex-start;
    }

    #map {
        height: 880px;
        flex: 1;
    }

    .filter-form-container {
        width: 25%;
        background-color: #f2f2f2;
        padding: 15px;
        border-radius: 5px;
        margin-right: 10px;
    }



    .row {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }

    .checkbox-group {
        width: 45%;
    }

    .checkbox-group label {
        display: block;
    }

    .popup-content {
        max-height: 300px;
        max-width: 300px;
        overflow-y: auto;
        padding: 10px;
        font-size: 14px;
        list-style: none;
        padding-left: 0;
    }

    .popup-content h4 {
        margin-bottom: 0px;
        font-weight: bold;
    }

    .popup-content li {
        margin-bottom: 5px;
        list-style: none;
    }
</style>

<div id="map-container">
    <div class="filter-form-container">
        <div class="filter-form">
            <h4>Filter Map</h4>
            <label for="establishment-name"><strong>Establishment Name:</strong></label>
            <input type="text" id="establishment-name">

            <br>
            <label for="district"><strong>District:</strong></label>
            <div id="district-checkboxes">
                <label><input type="checkbox" class="bh_district" value="1"> Arevalo</label>
                <label><input type="checkbox" class="bh_district" value="2"> City Proper</label>
                <label><input type="checkbox" class="bh_district" value="3"> Jaro</label>
                <label><input type="checkbox" class="bh_district" value="4"> Lapaz</label>
                <label><input type="checkbox" class="bh_district" value="5"> Lapuz</label>
                <label><input type="checkbox" class="bh_district" value="6"> Mandurriao</label>
                <label><input type="checkbox" class="bh_district" value="7"> Molo</label>
            </div>

            <label for="barangay"><strong>Barangay:</strong></label>
            <select id="barangay" class="form-control">
                <option value="">-- Select Barangay --</option>

            </select>
            <br>

            <div class="row">
                <div class="checkbox-group">
                    <label for="construction-kind"><strong>Kind of Construction:</strong></label>
                    <label><input type="checkbox" class="bh_construction_kind" value="made_of_strong_materials"> A. Made
                            of Strong Materials</label>
                    <label><input type="checkbox" class="bh_construction_kind" value="made_of_light_materials"> B. Made
                            of Light Materials</label>
                    <label><input type="checkbox" class="bh_construction_kind" value="other_specify"> C. Other:</label>
                    <input type="text" id="bh_specify" name="bh_specify" placeholder="Specify" style="display: none;">
                </div>

                <div class="checkbox-group">
                    <label for="class"><strong>Class of Boarding House:</strong></label>
                    <label><input type="checkbox" class="bh_class" value="class_a"> Class A</label>
                    <label><input type="checkbox" class="bh_class" value="class_b"> Class B</label>
                    <label><input type="checkbox" class="bh_class" value="class_c"> Class C</label>
                    <label><input type="checkbox" class="bh_class" value="class_d"> Class D</label>
                </div>
            </div>

            <div class="row">
                <div class="checkbox-group">
                    <label for="rates"><strong>Rates being Charged:</strong></label>
                    <label><input type="checkbox" class="bh_rates_charge" value="lodging"> Lodging</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="board"> Board</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="bed_space"> Bed Space</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="room_rent"> Room Rent</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="house_rent"> House Rent</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="rent_per_unit__apartment"> Rent Per
                            Unit(Apartment)</label>
                    <label><input type="checkbox" class="bh_rates_charge" value="other"> Others</label>
                    <input type="text" id="other-rates" name="bh_ratescharge_other" placeholder="Specify Rates"
                            style="display: none;">
                </div>

                <div class="checkbox-group">
                    <label for="water-source"><strong>Sources of Water Supply:</strong></label>
                    <label><input type="checkbox" class="bh_water_source" value="nawasa"> Nawasa</label>
                    <label><input type="checkbox" class="bh_water_source" value="deep_well"> Deep Well</label>
                </div>
            </div>

            <div class="row">
                <div class="checkbox-group">
                    <label for="lighting-ventilation"><strong>Lightning and Ventilation:</strong></label>
                    <label><input type="checkbox" class="light_ventilation" value="natural"> Natural</label>
                    <label><input type="checkbox" class="light_ventilation" value="artificial"> Artificial</label>
                </div>

                <div class="checkbox-group">
                    <label for="with-permit"><strong>With Permit:</strong></label>
                    <label><input type="checkbox" class="with_permit" value="yes"> Yes</label>
                    <label><input type="checkbox" class="with_permit" value="no"> No</label>
                </div>
            </div>
        </div>
    </div>

    <div id="map"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    $(document).ready(function () {
        var map = L.map('map').setView([10.7202, 122.5621], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = [];

        $.ajax({
            url: 'resources/dr/pins.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                data.forEach(function (item) {
                    var latitude = parseFloat(item.bh_latitude);
                    var longitude = parseFloat(item.bh_longitude);
                    var establishmentName = String(item.establishment_name);
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
                    var occupants = parseInt(item.bh_occupants) || 0; // Default to 0 if value is missing or invalid
                    var overcrowded = parseInt(item.bh_overcrowded) || 0;
                    var ratesCharge = item.bh_rates_charge ? String(item.bh_rates_charge) : '';
                    var ratesChargeOther = item.bh_ratescharge_other ? String(item.bh_ratescharge_other) : '';
                    var rate = parseFloat(item.bh_rate) || 0.0; // Default to 0.0 if value is missing or invalid
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
                    var permit = String(item.with_permit);
                    var remarks = String(item.bh_remarks);
                    var required = String(item.office_required);
                    var inspect = String(item.inspected_by);
                    var acknowledge = String(item.acknowledge_by);
                    var imageName = String(item.bh_image);
                    var imagePath = `resources/gallery/${imageName}`;


                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        var mapCenter = [latitude, longitude];



                        // Create a red dot icon
                        var redDotIcon = L.divIcon({
                            className: 'custom-icon',
                            iconSize: [12, 12],
                            html: '<div style="width: 12px; height: 12px; background-color: red; border-radius: 50%;"></div>'
                        });

                        var marker = L.marker(mapCenter, { icon: redDotIcon }).addTo(map);
                        marker.bindPopup(
                            `<div class="popup-content">
                                <h4>${establishmentName}</h4>
                                <ul>
                                <li><b>Address:</b> ${address}</li>
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
                                    <li><b>With Permit:</b> ${permit}</li>
                                    <li><b>Remarks and Recommendation:</b> ${remarks}</li>
                                    <li><b>Office Required:</b> ${required}</li>
                                    <li><b>Inspected by:</b> ${inspect}</li>
                                    <li><b>Acknowledge by:</b> ${acknowledge}</li>
                                    <li><b>Boarding house image:</b></li>
                                    <li><img src="${imagePath}" alt="Boarding house image" style="max-width: 200px;"></li>                                </ul>
                            </div>`
                        );

                        markers.push(marker);
                    } else {
                        console.error('Invalid latitude or longitude:', item);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching boarding house locations:", error);
            }
        });

        $('#establishment-name, .bh_district, #barangay, .bh_construction_kind, .bh_class, .bh_rates_charge, .bh_water_source, .light_ventilation, .with_permit').on('input', function () {
            var establishmentName = $('#establishment-name').val().toLowerCase();
            var selectedDistricts = $('.bh_district:checked').map(function () { return this.value; }).get(); // Get selected districts
            var barangay = $('#barangay').val().toLowerCase();
            var constructionKind = $('.bh_construction_kind:checked').map(function () { return this.value; }).get().join(",");
            var bhClass = $('.bh_class:checked').map(function () { return this.value; }).get().join(",");
            var rates = $('.bh_rates_charge:checked').map(function () { return this.value; }).get().join(",");
            var waterSource = $('.bh_water_source:checked').map(function () { return this.value; }).get().join(",");
            var lightingVentilation = $('.light_ventilation:checked').map(function () { return this.value; }).get().join(",");
            var withPermit = $('.with_permit:checked').map(function () { return this.value; }).get().join(",");

            markers.forEach(function (marker) {
                // Extract marker data and check against filters
                var popupContent = marker.getPopup().getContent().toLowerCase();
                var markerDistrict = getDistrictFromPopupContent(popupContent); // Get district from popup content
                var showMarker =
                    (establishmentName === '' || popupContent.includes(establishmentName)) &&
                    (selectedDistricts.length === 0 || selectedDistricts.includes(markerDistrict)) && // Check if the marker's district is included in selected districts
                    (barangay === '' || popupContent.includes(barangay)) &&
                    (constructionKind === '' || popupContent.includes(constructionKind)) &&
                    (bhClass === '' || popupContent.includes(bhClass)) &&
                    (rates === '' || popupContent.includes(rates)) &&
                    (waterSource === '' || popupContent.includes(waterSource)) &&
                    (lightingVentilation === '' || popupContent.includes(lightingVentilation)) &&
                    (withPermit === '' || popupContent.includes(withPermit));

                // Show or hide marker based on filter results
                if (showMarker) {
                    marker.addTo(map);
                } else {
                    map.removeLayer(marker);
                }
            });
        });

        // Function to extract district from popup content
        function getDistrictFromPopupContent(content) {
            var match = content.match(/<b>district:<\/b>\s*(.*?)</);
            return match ? match[1] : ""; // Return district value
        }
    });
</script>

<?php include 'includes/footer.php'; ?>
