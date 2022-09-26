<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rules</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
</head>
<body>
<header>
    <div class="p-5 text-center bg-image" style="background-image: url('../attachments/pod01.jpg'); object-fit: contain; height: 600px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Welcome Mai Police Station</h1>
                    <h4 class="mb-3">So what is it you want to know?</h4>
                    <form method="get">
                        <select class="form-select form-select-lg" onselect="" name="know" aria-label="Default select example">
                            <option value="null" selected disabled>You can choose from here</option>
                            <option value="ua">User Agreement</option>
                            <option value="cpp">Content and Project Policy</option>
                            <option value="pp">Privacy Policy</option>
                            <option value="mcc">Moderator Code of Conduct (for Community's)</option>
                        </select>
                        <button class="btn btn-outline-light mt-2" type="sumbit">Seç!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <?php
        if (isset($_GET['know'])){
            if ($_GET['know'] == "ua")
            { ?>
                <div class="row">
                    <div class="col-md-auto">
                        <div class="alert alert-info mt-3">
                            <h4 class="alert-heading">User Agreement</h4>
                            <p>By using Mai-Development, you agree to the following terms and conditions. If you do not agree to these terms and conditions, you may not use Mai-Development.</p>
                            <hr>
                            <p class="mb-0">Mai-Development is a website that is owned and operated by Mai-Development. Mai-Development reserves the right to change these terms and conditions at any time. Your continued use of Mai-Development after any changes to these terms and conditions will constitute your acceptance of such changes.</p>
                        </div>
                    </div>
                </div>
           <?php }
            if($_GET['know'] == "pp")
            { ?>
                <div class="alert alert-info">
                    <h4 class="alert-heading">Privacy Policy</h4>
                    <p>Mai-Development is committed to protecting your privacy. We use the information we collect about you to process orders and to provide a more personalized shopping experience. Please read on for more details about our privacy policy.</p>
                    <hr>
                    <p class="mb-0">We do not sell, trade, or rent your personal information to others. Mai-Development may provide aggregate statistics about our customers, sales, traffic patterns, and related site information to reputable third-party vendors, but these statistics will include no personally identifying information. Mai-Development may use the information we collect to occasionally notify you about important functionality changes to the Mai-Development website, new services, and special offers we think you'll find valuable. If you would rather not receive this information, please send an email to <a href="tomail:ozkayayasin964@gmail.com">
                </div>
           <?php }
        }
    ?>
</div>
<script src="../js/mdb.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>