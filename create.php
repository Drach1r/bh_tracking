<?php
include 'includes/header.php';
?>



<h3 style = "margin-left: 10px;" class="title"> Add New Record</h3>
               
    <section class="container">
            <div class="row">
                <div class="card-body">
                    <div class="card-title-body">
                    </div>
                    <br>
                    <div class="card card-block  col-lg-12" style=" background-color: #E7E7E7; ">

                        <form style = "align-item: center;" action="insert_data.php" method="post">

                            <br>
                            <div class="row">
                                <div class="form-group col-md-3">

                                    <label for="account_number">Account Number:</label>
                                    <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                                </div>
                                <div class="form-group col-md-3">

                                    <label for="establishment_name">Name of Establishment:</label>
                                    <input type="text" id="establishment_name" name="establishment_name" class="form-control" placeholder="Enter Name of Establishment" required>
                                </div>

                            </div>
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
                                <div class="form-group col-md-5">

                                    <label for="bh_address">Address:</label>
                                    <input type="text" id="bh_address" name="bh_address" class="form-control" placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-3">

                                    <label for="bh_municipality">City/Municipality:</label>
                                    <input type="text" id="bh_municipality" name="bh_municipality" class="form-control" placeholder="Enter City" required>
                                </div>
                                <div class="form-group col-md-3">

                                    <label for="bh_district">District:</label>
                                    <input type="text" id="bh_district" name="bh_district" class="form-control" placeholder="Enter District" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bh_barangay">Barangay:</label>
                                    <input type="text" id="bh_barangay" name="bh_barangay" class="form-control" placeholder="Enter Baranggay" required>

                                </div>
                                <div class="form-group col-md-3">

                                    <label for="bh_province">Province:</label>
                                    <input type="text" id="bh_province" name="bh_province" class="form-control" placeholder="Enter Province" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">


                                    <label for="bh_control_no">BH Control No.:</label>
                                    <input type="text" id="bh_control_no" name="bh_control_no" class="form-control" placeholder="Enter Account Number" required>
                                </div>
                                <div class="form-group col-md-3">


                                    <label for="bh_or_num">OR Number:</label>
                                    <input type="text" id="bh_or_num" name="bh_or_num" class="form-control" placeholder="Enter Name of Establishment" required>
                                </div>

                            </div>



                            <label for="date_issued">Date Issued:</label>
                            <p>Official Receipt</p>
                            <input type="text" id="date_issued" name="date_issued" required><br><br>

                            <label for="amount_paid">Amount Paid:</label>
                            <input type="text" id="amount_paid" name="amount_paid" required><br><br>

                            <label for="bh_bpn">Business Permit Number:</label>
                            <input type="text" id="bh_bpn" name="bh_bpn" required><br><br>

                            <label for="bh_mp">Mode of Payment:</label>
                            <input type="text" id="bh_mp" name="bh_mp" required><br><br>

                            <label for="date_paid">Date Paid:</label>
                            <input type="text" id="date_paid" name="date_paid" required><br><br>

                            <label for="bh_period_cover">Period Covered:</label>
                            <input type="text" id="bh_period_cover" name="bh_period_cover" required><br><br>

                            <label for="bh_complaint">Complaint:</label>
                            <input type="text" id="bh_complaint" name="bh_complaint" required><br><br>


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