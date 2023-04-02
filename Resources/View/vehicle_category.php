<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Category</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-table-page.css"); ?>">
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
                        <h1>Vehicle Category List</h1>
                        <a href="<?php echo url("/add/category"); ?>">Add New Category</a>
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
                                    <th>Category Name</th>
                                    <th>Parking Charges</th>
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
                                        <td><?= $value['category_name']; ?></td>
                                        <td>&#2547;&nbsp;<?= $value['parking_charge']; ?></td>
                                        <td>
                                            <?php
                                            if ($value['category_status']) {
                                                $status = "active";
                                            } else {
                                                $status = "inactive";
                                            }
                                            ?>
                                            <a href="javascript:void(0)" class="<?= $status; ?>-btn oparation-btn"><?= ucfirst($status); ?></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo url("/edit/category/" . $value['id']); ?>" class="edit-btn oparation-btn">
                                                <img src="<?php echo stored_file("image/edit.png"); ?>" alt="edit">
                                            </a>

                                            <?php $delete_vehicle_category_link = url("/delete/category/" . $value['id']); ?>
                                            <a href="javascript:void(0)" class="delete-btn oparation-btn" onclick="confirm_delete('<?= $delete_vehicle_category_link; ?>')">
                                                <img src="<?php echo stored_file("image/delete.png"); ?>" alt="delete">
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
                            <a href="#" class="pagination-btn">
                                <img src="<?php echo stored_file("image/right-arrow.png"); ?>" alt=">" title="Next Record">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup">
        <div class="popup-box">
            <p class="warning-message">Are you sure want to delete this vehicle category.</p>
            <div class="popup-close" onclick="popup_close()">&times;</div>
            <a href="#" class="confirm-btn">Confirm</a>
        </div>
    </div>
    <?php view("footer"); ?>
    <script src="<?php echo assets("js/popup.js"); ?>"></script>
</body>

</html>