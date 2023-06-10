<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Incoming Vehicle Details</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/view-vehicle-detail-page.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/popup.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>View Vehicle</h1>
                        <a href="<?php echo url("/incoming/vehicle/list"); ?>">Incoming Vehicle List</a>
                    </div>
                    <div class="view-vehicle">
                        <?php $value = $data[0][0]; ?>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Parking Number</th>
                                    <td><?= $value['parking_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Vehicle Category</th>
                                    <td><?= $value['category_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Vehicle Company Name</th>
                                    <td><?= $value['vehicle_company']; ?></td>
                                </tr>
                                <tr>
                                    <th>Vehicle Registration Number</th>
                                    <td><?= $value['registration_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Owner Name</th>
                                    <td><?= $value['owner_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Owner Contact Number</th>
                                    <td><?= $value['owner_contact']; ?></td>
                                </tr>
                                <tr>
                                    <th>Vehicle In Time</th>
                                    <td><?= date('d / m / Y - h:i A', strtotime($value['vehicle_intime'])); ?></td>
                                </tr>
                                <?php
                                $intime = new DateTime($value['vehicle_intime']);
                                $outtime = new DateTime();
                                $days = date_diff($intime, $outtime)->days;
                                $hours = date_diff($intime, $outtime)->h;
                                $minutes = date_diff($intime, $outtime)->i;
                                $total_hour = ($days * 24) + $hours;
                                $minute_charge = ceil((intval($value['parking_charge']) / 60) * $minutes);
                                $total_charge = ($total_hour * intval($value['parking_charge'])) + $minute_charge;
                                ?>
                                <tr>
                                    <th>Per Hour Charges</th>
                                    <td>&#2547; <?= $value['parking_charge']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total Stay Time</th>
                                    <td> <?= $total_hour . " Hours and " . $minutes . " Minutes." ?></td>
                                </tr>
                                <tr>
                                    <th>Parking Charges</th>
                                    <td>&#2547; <?= $total_charge; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>Vehicle In</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="vehicle-update-btn">
                            <button onclick="popup_open()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup">
        <div class="popup-box">
            <form action="<?= url('/incoming/vehicle/outgoing'); ?>" method="post">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION["CSRF"]; ?>">
                <input type="hidden" name="id" value="<?= $value["id"]; ?>">
                <input type="hidden" name="vehicle_outtime" value="<?= date("Y-m-d h:i A"); ?>">
                <input type="hidden" name="parking_charges" value="<?= $total_charge; ?>">
                <p>
                    <strong>In Time : </strong>
                    <small><?= date('d / m / Y - h:i A',strtotime($value['vehicle_intime'])); ?></small>
                </p>
                <br>
                <p>
                    <strong>Out Time : </strong>
                    <small><?= date('d / m / Y - h:i A'); ?></small>
                </p>
                <br>
                <p>
                    <strong>Charge : </strong>
                    <small>&#2547; <?= $total_charge; ?></small>
                </p>
                <br>
                <p>
                    <strong>Status : </strong>
                    <small>Outgoing Vehicle</small>
                </p>
                <input type="submit" value="Update" class="confirm-btn">
            </form>
            <div class="popup-close" onclick="popup_close()">&times;</div>
        </div>
    </div>
    <?php view("footer"); ?>
    <script src="<?php echo assets("js/popup.js"); ?>"></script>
</body>

</html>