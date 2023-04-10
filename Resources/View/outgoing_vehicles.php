<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outgoing Vehicle List</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-table-page.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>Manage Outgoing Vehicle List</h1>
                    </div>
                    <div class="content-print-search">
                        <button class="print-btn">Print</button>
                        <input type="search" name="search" id="search" class="search-inp" placeholder="Search...">
                    </div>
                    <div class="content-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Parking No</th>
                                    <th>Owner Name</th>
                                    <th>Vehicle Reg Number</th>
                                    <th>Vehicle Out Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sNo = 1;
                                foreach ($data[0] as $value) {
                                ?>
                                    <tr>
                                        <td><?= $sNo; ?></td>
                                        <td><?= $value['parking_number']; ?></td>
                                        <td><?= $value['owner_name']; ?></td>
                                        <td><?= $value['registration_number']; ?></td>
                                        <td><?= date("d / m / Y - h:i A", strtotime($value['vehicle_outtime'])) ?></td>
                                        <td>
                                            <a href="javascript:void(0)" class="inactive-btn oparation-btn">Vehicle Out</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo url("/view/outgoing/vehicle/details/" . $value['id']) ?>" class="edit-btn oparation-btn">
                                                <img src="<?php echo stored_file("image/eye.png"); ?>" alt="edit">
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $sNo++;
                                }
                                ?>
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