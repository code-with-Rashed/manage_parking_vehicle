<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vehicle Category</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-form-page.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>Update Vehicle Category</h1>
                        <a href="<?php echo url("/category"); ?>">Vehicle Category List</a>
                    </div>
                    <div class="vehicle-form">
                        <?php $value = array_merge(...$data); ?>
                        <form action="<?= url("/update/category/" . $value['id']); ?>" method="post">
                            <input type="hidden" name="csrf_token" value="<?= $value['CSRF']; ?>">
                            <div class="form-box">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" required maxlength="50" value="<?= $value['category_name']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="charge">Parking Charges Per Hour</label>
                                <input type="number" name="charge" id="charge" placeholder="Parking Charges Per Hour" required maxlength="10" value="<?= $value['parking_charge']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                    $active_selected = "";
                                    $inactive_selected = "";
                                    if ($value['category_status']) {
                                        $active_selected = "selected";
                                    } else {
                                        $inactive_selected = "selected";
                                    }
                                    ?>
                                    <option value="1" <?= $active_selected; ?>>Active</option>
                                    <option value="0" <?= $inactive_selected; ?>>Inactive</option>
                                </select>
                            </div>
                            <div class="form-submit-box">
                                <input type="submit" value="Update" name="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php view("footer"); ?>
</body>

</html>