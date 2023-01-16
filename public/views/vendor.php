<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <title>vendors</title>
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
                <a href = "a class = button"><i class="fas fa-user"></i></a>
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
                    <div class = "search">
                        <div class = "serarchName">

                        </div>
                        <div class = "searchState">

                        </div>
                        <div class = "searchCity">

                        </div>
                        <div class = "searchCategory">

                        </div>
                    </div>
                    <div class = "vendor">
                        <?php foreach ($vendor as $ven):  ?>
                        <div class = "vendorInf">
                            <div class = "name"><?= $ven->getName(); ?></div>
                            <div class = "category"><?= $ven->getCategory(); ?></div>
                            <div class = "description"><?= $ven->getDescription(); ?></div>
                            <?php foreach($ven->getAddresses() as $add): ?>
                            <div class = "addressContainer">
                                <div class = "address">
                                    <div class = street><?=$add->getAddress()->getStreet()." ".$add->getAddress()->getBuildingNumber(); ?></div>
                                    <div class = "city"><?= $add->getAddress()->getPostalCode().", ".$add->getAddress()->getCity();?></div>
                                    <div class = "state"><?=$add->getAddress()->getState().", ".$add->getAddress()->getCountry();?></div>
                                </div>
                                <div class = "contact">
                                    <div class = "phone"><?=$add->getPhone();?></div>
                                    <div class = "email"><?=$add->getEmail();?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>