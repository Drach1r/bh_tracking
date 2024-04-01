<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bh_tracking";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT bh_longitude, bh_latitude, bh_altitude, bh_precision, account_number, establishment_name,
    first_name, middle_name, last_name, suffix, bh_address, bh_municipality, bh_district, bh_barangay, bh_province, bh_control_no, 
    bh_or_num, date_issued, amount_paid,  bh_bpn, bh_mp, date_paid, bh_period_cover, bh_complaint, bh_construction_kind, bh_specify,
    bh_class, bh_room, bh_occupants, bh_overcrowded, bh_rates_charge, bh_ratescharge_other, bh_rate, bh_water_source, bh_adequate, bh_portable,
    bh_toilet_type, bh_toilet_cond, bh_bath_type, bh_bath_cond, bh_cr_num, bh_bathroom_num, bh_premises_cond, bh_garbage_disposal, bh_garbage_other, bh_sewage_disposal, 
    bh_sewage_other, bh_rodent_disposal, bh_rodent_other, light_ventilation, natural_artificial, establishment_extension, specify_txt, with_permit, bh_remarks, office_required, inspected_by, 
    acknowledge_by, bh_image FROM boarding_house_tracking";
    $stmt = $pdo->query($sql);
    
    $locations = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $locations[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($locations);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
