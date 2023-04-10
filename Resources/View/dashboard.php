<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/dashboard.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <?php $summary = array_merge(...$data); ?>
            <div class="content-box">
                <div class="content-wrap">
                    <div class="overview-box">
                        <div class="overview-card c1">
                            <h5>Today Incoming Vehicle Entries</h5>
                            <p><?= $summary[0]['today_incoming_vehicles']; ?></p>
                        </div>
                        <div class="overview-card c2">
                            <h5>Today Outgoing Vehicle Entries</h5>
                            <p><?= $summary[1]['today_outgoing_vehicles']; ?></p>
                        </div>
                        <div class="overview-card c3">
                            <h5>Vehicle Category</h5>
                            <p><?= $summary[2]['total_vehicle_category']; ?></p>
                        </div>
                        <div class="overview-card c4">
                            <h5>Total Incoming Vehicle</h5>
                            <p><?= $summary[3]['total_incoming_vehicle']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php view("footer"); ?>
</body>

</html>