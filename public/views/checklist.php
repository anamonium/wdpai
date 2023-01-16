<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="/public/css/checklist.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <title>budget page</title>
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
                <a href = "a class = button"><i class="fas fa-user"></i></a>
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
                <div class = "checklistInfo">
                   <h1>Checklist</h1>
                </div>
                <section >
                    <div class = "checklist">
                        <?php foreach ($checklist as $item): ?>
                            <div class = "task">
                                <div class = "checkSquare">
                                    <i class="fa-light fa-square"></i>
                                </div>
                                <div class = "taskContent">
                                    <?=$item->getContent(); ?>
                                </div>
                                <div class="deleteTask">
                                    <i class="fas fa-pen"></i><i class="fas fa-trash"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class = "addTask">
                            <form class="addTa" action = "addTask" method="POST">
                            <input id = "tcInput" name = "taskContent" type="text" placeholder="Task content">
                            <button id = "taInput" type = "submit">Add task</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>