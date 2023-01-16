<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="public/css/guestList.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
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
                <h1>Guest list</h1>
                <div class = "guestListInfo">
                    <div>Invited: 132</div>
                    <div>Confirmed: 67</div>
                    <div>Declined: 29</div>
                    <div>Awaiting: 36</div>
                </div>
                <section >
                    <div class = "addGuest">
                        <button><i class="fas fa-circle-plus"></i>  Add guest</button>
                    </div>
                    <div class = "guestList">
                        <table>
                            <thead>
                                <th>Name</th>
                                <th>Plus one</th>
                                <th>Status</th>
                                <th>Phone</th>
                            </thead>
                            <tbody>
                            <?php foreach($guestList as $guest): ?>
                            <tr>
                                <td><?=$guest->getName()." ".$guest->getSurname(); ?></td>
                               <td><i class="fa-light fa-square"></i></td>
                                <td><select name = "status">
                                    <option>Declined</option>
                                    <option>Invited</option>
                                    <option>Confirmed</option>
                                    <option>Invitation to be send</option>
                                </select></td>
                                <td><?= $guest->getPhone();?></td>

                            </tr>

                            <?php endforeach; ?>
                            </tbody>
                            </table>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>