<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/vendor.js" defer></script>
    <script type = "text/javascript" src = "/public/js/nav.js" defer></script>
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

                    <div class = "vendor">
                        <?php foreach ($vendor as $ven):  ?>
                        <div class = "vendorInf" id = "<?=$ven->getId(); ?>" >
                            <div class = "name"><?= $ven->getName(); ?></div>
                            <div class = "category"><?= $ven->getCategory(); ?></div>
                            <div class = "description"><?= $ven->getDescription(); ?></div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

<template id = "newVendor">
    <div class = "vendorInf" id = "">
        <div class = "name"></div>
        <div class = "category"></div>
        <div class = "description"></div>
    </div>
</template>

<template id = "addressCont">
    <div class = "addressContainer">
        <div class = "address">
            <div class = street></div>
            <div class = "city"></div>
            <div class = "state"></div>
        </div>
        <div class = "contact">
            <div class = "phone"></div>
            <div class = "email"></div>
        </div>
    </div>
</template>