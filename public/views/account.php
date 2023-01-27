<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/account.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/account.js" defer></script>
    <script type = "text/javascript" src = "/public/js/nav.js" defer></script>
    <title>account</title>
</head>
<body>
    <div class = "containerMain">
        <div class = "pasek">
            <div class = "menuIcon">
                <i class="fas fa-bars"></i>
            </div>
            <div class = "logo">
                <img id = "logo" src = "/public/img/logo.svg">
            </div>
            <div class = "account">
                <a href = "account"><i class="fas fa-user"></i></a>
            </div>
        </div>
        <main>
            <nav class = "menuBar">
                <img id = "flowers" src = "/public/img/images/login-flowers-kopia.png">
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
                    <div class = "accou" id = "acc">
                        <div class = "userDetail"s>
                            <i class="fas fa-user" id = "usr"></i>
                            <?= $account[0]->getName()." ".$account[0]->getSurname();?>
                        </div>
                        <div class = "budgetChanger">
                            Beginning budget:
                            <span id = "budgetText"><?= $account[1]?></span>

                            <i class="fas fa-pencil"></i>
                        </div>
                        <div class = "weddingDateChanger">
                            Wedding date:
                            <span id = "weddingText">
                                <?php if(!$account[2]):?>
                                Not set yet
                                <?php else: ?>
                                <?= $account[2]?>
                                <?php endif; ?>
                            </span>
                            <i class="fas fa-pencil"></i>
                        </div>
                        <div class = "logOut">
                            <button id = "logOutButton" type = "submit">Log out</button>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>