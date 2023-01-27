<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/budget.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/budget.js" defer></script>
    <script type = "text/javascript" src = "/public/js/nav.js" defer></script>

    <title>budget page</title>
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
                <div class = "budgetInfo">
                   <h1>Budget manager</h1>
                    <span>In this place you can store all of your expenses.</span>
                    <div style = "display: flex">

                          <div style = "margin: 1.5em 2em 0em 0em;">Budget left: </div><h2 id = "budLef"><?= $budgetInfo[1] ?></h2>

                    </div>
                </div>
                <section >
                    <div class = "budget">
                        <div class = "bItems" >
                        <?php foreach ($budget as $item): ?>
                            <div class = "budgetItem" id = "<?=$item->getId(); ?>">
                                <div class="name"><?= $item->getName(); ?></div>
                                <div class="cost"><?= $item->getCost(); ?></div>
                                <div class="delete"><i class="fas fa-trash"></i></div>
                            </div>

                        <?php endforeach; ?>
                        </div>
                        <div class = "addBudgetItem">
                            <input id = "bnInput" name = "budgetItemName" type="text" placeholder="Cost name">
                            <input id = "bcInput" name = "budgetItemCost" type="text" placeholder="Cost price">
                            <button id = "baInput" type = "submit">Add cost</button>
                        </div>

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

<template id = "newBudget">
    <div class = "budgetItem" id = "">
        <div class="name"></div>
        <div class="cost"></div>
        <div class="delete"><i class="fas fa-trash"></i></div>
    </div>
</template>