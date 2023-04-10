<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Outgoing Vehicle Details</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/view-vehicle-detail-page.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>View Outgoing Vehicle</h1>
                        <a href="<?php echo url("/outgoing/vehicle/list"); ?>">Outgoing Vehicle List</a>
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
                                <tr>
                                    <th>Vehicle Out Time</th>
                                    <td><?= date('d / m / Y - h:i A', strtotime($value['vehicle_outtime'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Parking Charges</th>
                                    <td>&#2547; <?= $value['parking_charges']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>Vehicle Out</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php view("footer"); ?>
</body>

</html>