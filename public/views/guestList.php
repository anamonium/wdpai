<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/guestList.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/guestlist.js" defer></script>
    <script type = "text/javascript" src = "/public/js/nav.js" defer></script>
    <title>guest list</title>
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
                <h1>Guest list</h1>
                <span>Here you can store the information about your guests.</span>
                <div class = "guestListInfo">
                    <div >
                        <div id = "invited">Invited: </div>
                        <h2 id = "invInf"><?= $guestListInfo[0]?></h2>
                    </div>

                    <div>
                        <div id = "confirmed">Confirmed:</div>
                        <h2 id = "confInf"> <?= $guestListInfo[1]?></h2>
                    </div>
                </div>
                <section >

                    <div class = "guestList">
                        <table>
                            <thead>
                                <th class = "gName">Name</th>
                                <th class = "gPlusOne">Plus one</th>
                                <th class = "gStatus">Status</th>
                                <th class = "gPhone">Phone</th>
                                <th class = "removeGuest"></th>
                            </thead>
                            <tbody>
                            <?php foreach($guestList as $guest): ?>
                            <tr id = "<?=$guest->getId(); ?>" >
                                <td class = "gName"><?=$guest->getName()." ".$guest->getSurname(); ?></td>
                                <td class = "gPlusOne">
                                    <?php if(!$guest->getPlusOne()):?>
                                        <i class="fas fa-square"></i>
                                    <?php endif;?>
                                    <?php if($guest->getPlusOne()):?>
                                        <i class="fas fa-square-check"></i>
                                    <?php endif;?>
                                </td>
                                <td class = "gStatus">
                                    <?php if(!$guest->getStatus()):?>
                                        <i class="fas fa-square"></i>
                                    <?php endif;?>
                                    <?php if($guest->getStatus()):?>
                                        <i class="fas fa-square-check"></i>
                                    <?php endif;?>
                                </td>
                                <td class = "gPhone"><?= $guest->getPhone();?></td>
                                <td class = "removeGuest"><i class="fas fa-trash"></i></td>

                            </tr>

                            <?php endforeach; ?>
                            </tbody>
                            </table>
                    </div>

                    <div class = "addGuest">
                        <input id = "guestName" name = "guestNameContent" type="text" placeholder="Guest's name">
                        <input id = "guestSurname" name = "guestSurnameContent" type="text" placeholder="Guest's surname">
                        <input id = "guestPhone" name = "guestPhoneContent" type="text" placeholder="Guest's phone">
                        <button id = "addGuest" type = "submit">Add guest</button>

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

<template id = "newGuest">
    <tr id = "" >
        <td class = "gName"></td>
        <td class = "gPlusOne">
            <i class="fas fa-square"></i>
        </td>
        <td class = "gStatus">
            <i class="fas fa-square"></i>
        </td>
        <td class = "gPhone"></td>
        <td class = "removeGuest"><i class="fas fa-trash"></i></td>
    </tr>
</template>