<?php
include 'includes/boot.php';

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




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="resources/css/style.css">

<style>
  body {
    background-image: url('resources/img/cityhall.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    margin: 0;
    padding: 0;
  }

  .container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .card {
    width: 500px;
    backdrop-filter: blur(10px);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    border: none;
  }
</style>

<div class="container">
  <div class="card">
    <div class="card-body">
      <h1 class="text-center" style="margin-top:30px; color: red;">Login Page</h1>
      <hr>

      <?php
      if (isset($_SESSION['error'])) {
        echo "
                    <div class='alert alert-danger text-center'>
                        <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                    </div>
                ";
        unset($_SESSION['error']);
      }

      if (isset($_SESSION['success'])) {
        echo "
                    <div class='alert alert-success text-center'>
                        <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                    </div>
                ";
        unset($_SESSION['success']);
      }
      ?>

      <form method="POST" action="resources/dr/logcode.php">
        <div class="mb-3">
          <label for="email">Email</label>
          <input class="form-control" type="email" id="email" name="email" placeholder="Enter email" required>
        </div>
        <br>
        <div class="mb-3">
          <label for="password">Password</label>
          <input class="form-control" type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <hr>
        <div>
          <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
          <a href="signin.php">Register a new account</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
?>