<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Vehicle Report</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-form-page.css"); ?>">
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
                        <h1>Reports</h1>
                    </div>
                    <div class="vehicle-form">
                        <form action="<?= url('/search/report'); ?>" method="post">
                            <input type="hidden" name="csrf_token" value="<?= $data[0]['CSRF']; ?>">
                            <div class="form-box">
                                <label for="from-date">From Date</label>
                                <input type="datetime-local" name="from_date" id="from-date" required>
                            </div>
                            <div class="form-box">
                                <label for="to-date">To Date</label>
                                <input type="datetime-local" name="to_date" id="to-date" required>
                            </div>
                            <div class="form-box">
                                <label for="type">Type</label>
                                <select name="search_option" id="type" onchange="searchOption(this.value)">
                                    <option value="all">All Records</option>
                                    <option value="incoming">Incoming Vehicle</option>
                                    <option value="outgoing">Outgoing Vehicle</option>
                                    <option value="registration_number">Search Vehicle Registration Number</option>
                                    <option value="owner_name">Search Owner Name</option>
                                    <option value="owner_contact">Search Owner Phone Number</option>
                                </select>
                            </div>
                            <div class="form-box" id="registration_number_box">
                                <label for="vehicle_number">Vehicle Registration Number</label>
                                <input type="text" name="registration_number" id="registration_number_input" maxlength="50" placeholder="Enter Vehicle Registration Number">
                            </div>
                            <div class="form-box" id="owner_name_box">
                                <label for="owner_name">Owner Name</label>
                                <input type="text" name="owner_name" id="owner_name_input" maxlength="50" placeholder="Enter Owner Name">
                            </div>
                            <div class="form-box" id="owner_contact_number_box">
                                <label for="owner_phone_number">Owner Phone Number</label>
                                <input type="number" name="owner_contact" id="owner_contact_number_input" maxlength="12" placeholder="Enter Owner Phone Number">
                            </div>
                            <div class="form-submit-box">
                                <input type="submit" value="Submit" name="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php view("footer"); ?>
    <script src="<?php echo assets("js/report.js"); ?>"></script>
</body>

</html>