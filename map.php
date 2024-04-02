<?php include 'includes/header.php'; ?>


<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map {
        height: 600px;
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
<div id="map"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    $(document).ready(function() {
        var map = L.map('map').setView([10.7202, 122.5621], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.ajax({
            url: 'resources/dr/pins.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                data.forEach(function(item) {
                    var latitude = parseFloat(item.bh_latitude);
                    var longitude = parseFloat(item.bh_longitude);
                    var accountNumber = String(item.account_number);
                    var establishmentName = String(item.establishment_name);
                    var firstName = String(item.first_name);
                    var middleName = String(item.middle_name);
                    var lastName = String(item.last_name);
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
                        var marker = L.marker(mapCenter).addTo(map);
                        marker.bindPopup(
                            `<div class="popup-content">
                                <h4>${accountNumber}</h4>
                                <ul>
                                    <li><b>Establishment Name:</b> ${establishmentName}</li>
                                    <li><b>Name:</b> ${firstName} ${middleName} ${lastName}</li>
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
                                    <li><img src="${imagePath}" alt="Boarding house image" style="max-width: 200px;"></li>
                                </ul>
                            </div>`
                        ).openPopup();
                    } else {
                        console.error('Invalid latitude or longitude:', item);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching boarding house locations:", error);
            }
        });
    });
</script>



<?php include 'includes/footer.php'; ?>