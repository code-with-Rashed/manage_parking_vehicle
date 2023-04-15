<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Report</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-table-page.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/report.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>Vehicle Report</h1>
                    </div>
                    <div class="content-print-search">
                        <button class="print-btn">Print</button>
                    </div>
                    <div class="content-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Parking Number</th>
                                    <th>Owner Name</th>
                                    <th>Owner Contact Number</th>
                                    <th>Vehicle Reg Number</th>
                                    <th>Vehicle Date Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data[0] as $value) {
                                ?>
                                    <tr>
                                        <td><?= $value['parking_number']; ?></td>
                                        <td><?= $value['owner_name']; ?></td>
                                        <td><?= $value['owner_contact']; ?></td>
                                        <td><?= $value['registration_number']; ?></td>
                                        <td>
                                            <span class="dtime"><b>Vehicle In Time : </b> <?= date('d / m / Y - h:i A', strtotime($value['vehicle_intime'])); ?></span>
                                            <br>
                                            <span class="dtime"><b>Vehicle Out Time : </b> <?= date('d / m / Y - h:i A', strtotime($value['vehicle_outtime'])); ?></span>
                                        </td>
                                        <td>
                                            <?php if ($value['vehicle_status']) { ?>
                                                <a href="javascript:void(0)" class="active-btn oparation-btn">Vehicle In</a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0)" class="inactive-btn oparation-btn">Vehicle Out</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="content-pagination">
                        <span>Showing 1 to 2 of 2 entries</span>
                        <span>
                            <a href="" class="pagination-btn">
                                <img src="<?php echo stored_file("image/left-arrow.png"); ?>" alt="<" title="Previous Record">
                            </a>
                            <a href="" class="pagination-btn">
                                <img src="<?php echo stored_file("image/right-arrow.png"); ?>" alt=">" title="Next Record">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php view("footer"); ?>
</body>

</html>