<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/nav.js" defer></script>
    <title>Overview</title>
</head>
<body>
    <div class = "containerMain">
        <div class = "pasek">
            <div class = "menuIcon">
                <i class="fas fa-bars"></i>
            </div>
            <div class = "logo">
                <img id = "logo" src = "public/img/logo.svg">
            </div>
            <div class = "account">
                <a href = "account"><i class="fas fa-user"></i></a>
            </div>
        </div>
        <main>
            <nav class = "menuBar">
                <img id = "flowers" src = "public/img/images/login-flowers-kopia.png">
                <ul>
                    <li>
                        <i class="fas fa-magnifying-glass"></i>
                        <a href="overview" class = "button">Overview</a>
                    </li>
                    <li>
                        <i class="fas fa-sack-dollar"></i>
                        <a href="budget" class = "button">Budget</a>
                    </li>
                    <li>
                        <i class="fas fa-users"></i>
                        <a href="guestList" class = "button">Guestlist</a>
                    </li>
                    <li>
                        <i class="fas fa-list-check"></i>
                        <a href="checklist" class = "button">Checklist</a>
                    </li>
                    <li>
                        <i class="fas fa-church"></i>
                        <a href="vendor" class = "button">Vendors</a>
                    </li>
                </ul>
    
            </nav>
            
            <div class = "siter">
                <section >
                    <h1>Overview</h1>
                    <span>In this section you will see all important details about your wedding.</span>

                    <div class = "overview">
                        <div class = "weddingDate">
                            <?php $overview; ?>
                            <div class="overLabel">Wedding date:</div>
                            <?php if($overview -> getWeddingDate()):?>
                            <div class="overInfo"><?= $overview -> getWeddingDate()?></div>
                            <?php else: ?>
                            <div class="overInfo">Your wedding date is not set yet.</div>
                            <?php endif;?>
                        </div>
                        <hr>
                        <div class = "budget">
                            <div class="overLabel">Budget left:</div>
                            <div class="overInfo">
                                <?= $overview -> getBudgetLeft();?> /
                                <?= $overview -> getAllBudget();?>
                            </div>
                        </div>
                        <hr>
                        <div class = "guests">
                            <div class="overLabel">Confirmed guests:</div>
                            <div class="overInfo">
                                <?= $overview -> getGuestAccepted();?> /
                                <?= $overview -> getGuestNumber();?>
                            </div>
                        </div>
                        <hr>
                        <div class = "tasks">
                            <div class="overLabel">Tasks completed:</div>
                            <div class="overInfo">
                                <?= $overview -> getTasksDone();?> /
                                <?= $overview -> getAllTasks();?>
                            </div>
                        </div>
<!--                        <hr>-->
<!--                        <div class = "vendors">-->
<!--                            <div class="overLabel">Your vendors information</div>-->
<!--                            --><?php //if($overview -> getUsersVendors()):?>
<!--                                --><?php //foreach ($overview -> getUsersVendors() as $vendor): ?>
<!--                                    Name: --><?//= $vendor->getName() ?>
<!--                                    Phone: --><?//= $vendor->getPhone() ?>
<!--                                    Email: --><?//= $vendor->getEmail() ?>
<!--                                --><?php //endforeach; ?>
<!--                            --><?php //else: ?>
<!--                                You have no vendors specified.-->
<!--                            --><?php //endif;?>
<!---->
<!--                            <div class = "addUsersVendor">-->
<!--                                <input id = "nameVendor" name = "nameVendor" type="text" placeholder="Vendor's name">-->
<!--                                <input id = "phoneVendor" name = "phoneVendor" type="text" placeholder="Vendor's phone">-->
<!--                                <input id = "emailVendor" name = "emailVendor" type="text" placeholder="Vendor's email">-->
<!--                                <button id = "vendorConfirm" type = "submit">Add vendor</button>-->
<!--                            </div>-->
<!--                        </div>-->

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>