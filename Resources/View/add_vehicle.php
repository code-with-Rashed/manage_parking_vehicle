<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Vehicle</title>
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
                        <h1>Add New Vehicle</h1>
                        <a href="<?php echo url("/incoming/vehicle/list"); ?>">Incoming Vehicle List</a>
                    </div>
                    <div class="vehicle-form">
                        <form action="<?= url("/add/new/vehicle"); ?>" method="post">
                            <input type="hidden" name="csrf_token" value="<?= $data[1]['CSRF']; ?>">
                            <div class="form-box">
                                <label for="vehicle-category">
                                    Vehicle Category
                                    <?php
                                    if (empty($data[0])) {
                                        echo "&nbsp;&nbsp;<small>( First Add Vehicle Category )</small>";
                                    }
                                    ?>
                                </label>
                                <select name="vehicle_category" id="vehicle-category" required>
                                    <option selected disabled value="">Select Vehicle Category</option>
                                    <?php
                                    foreach ($data[0] as $value) {
                                        if($value['category_status']){
                                            echo "<option value='{$value['id']}'>{$value['category_name']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-box">
                                <label for="vehicle-company">Vehicle Company</label>
                                <input type="text" name="vehicle_company" id="vehicle-company" placeholder="Vehicle Company" required maxlength="200">
                            </div>
                            <div class="form-box">
                                <label for="registration-number">Registration Number</label>
                                <input type="text" name="registration_number" id="registration-number" placeholder="Registration Number" required maxlength="100">
                            </div>
                            <div class="form-box">
                                <label for="owner-name">Owner Name</label>
                                <input type="text" name="owner_name" id="owner-name" placeholder="Owner Name" required maxlength="60">
                            </div>
                            <div class="form-box">
                                <label for="owner-number">Owner Contact Number</label>
                                <input type="number" name="owner_contact" id="owner-number" placeholder="Owner Number" required maxlength="15">
                            </div>
                            <div class="form-box">
                                <label for="vehicle-in-time">Vehicle In Time</label>
                                <input type="datetime-local" name="vehicle_intime" id="vehicle-in-time" required>
                            </div>
                            <div class="form-submit-box">
                                <input type="submit" value="Save" name="save">
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