<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mai Social</title>
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f4f4f4;">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="github-callback.php">
                            <div class="btn btn-dark text-center"><i class="fs-5 bi bi-github"></i> &nbsp; GitHub ile giriş yap</div>
                        </a>
                    </div>
                </div>
                <div class="mb-2"></div>
            </div>
            <div class="col-md-6">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <div class="fs-5">
                                Welcome Mai Social!
                            </div>
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                            <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default,
                            until the collapse plugin adds the appropriate classes that we use to style each
                            element. These classes control the overall appearance, as well as the showing and
                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                            our default variables. It's also worth noting that just about any HTML can go within
                            the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            <div class=" fs-5">
                                What is Mai Social ?
                            </div>
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default,
                            until the collapse plugin adds the appropriate classes that we use to style each
                            element. These classes control the overall appearance, as well as the showing and
                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                            our default variables. It's also worth noting that just about any HTML can go within
                            the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            <div class=" fs-5">
                                What is Open Source?
                            </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                            <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default,
                            until the collapse plugin adds the appropriate classes that we use to style each
                            element. These classes control the overall appearance, as well as the showing and
                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                            our default variables. It's also worth noting that just about any HTML can go within
                            the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card alert-secondary rounded-widget mt-3 mb-1">
                            <div class="card-header text-center">
                                Join our Community!
                            </div>
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eveniet fugit hic laborum molestias temporibus totam. Ea mollitia nam repellat!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card alert-primary rounded-widget mt-3 mb-1">
                            <div class="card-header text-center">
                                View in GitHub!
                            </div>
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eveniet fugit hic laborum molestias temporibus totam. Ea mollitia nam repellat!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 order-sm-2 order-lg-2 order-md-2"></div>
        </div>
    </div>
    <script src="js/mdb.min.js"></script>
</body>
</html>