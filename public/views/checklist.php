<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/mainPage.css">
    <link rel="stylesheet" type="text/css" href="/public/css/checklist.css">
    <script src="https://kit.fontawesome.com/299209977e.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "/public/js/checklist.js" defer></script>
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
                <div class = "checklistInfo">

                   <h1>Checklists</h1>
                    <span>This is the place when you can store all your tasks and mark them as completed.</span>
                    <div class = "overview">
                        <div>
                            <div id = "all">All tasks: </div>
                            <h2 id = "allTasks"> <?= $checklistInfo[1]?> </h2>
                        </div>
                        <div>
                            <div id = "completed">Tasks completed: </div>
                                <h2 id = "tasksCompleted"> <?= $checklistInfo[0] ?></h2>
                        </div>
                    </div>

                </div>
                <section >
                    <div class = "checklist">
                        <div class = "chCon">
                        <?php foreach ($checklist as $item): ?>
                            <div class = "task" id = "<?=$item->getId(); ?>">
                                <div class = "checkSquare">
                                    <?php if(!$item->getStatus()):?>
                                        <i class="fas fa-square"></i>
                                    <?php endif;?>
                                    <?php if($item->getStatus()):?>
                                        <i class="fas fa-square-check"></i>
                                    <?php endif;?>
                                </div>
                                <div class = "taskContent">
                                    <?=$item->getContent(); ?>
                                </div>
                                <div class="deleteTask">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <div class = "addTask">

                            <input id = "tcInput" name = "taskContent" type="text" placeholder="Task content">
                            <button id = "taInput" type = "submit">Add task</button>

                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

<template id = "task-template">
    <div class = "task" id = "">
        <div class = "checkSquare">
                <i id = "status" class=""></i>
        </div>
        <div class = "taskContent">
        </div>
        <div class="deleteTask">
            <i class="fas fa-trash"></i>
        </div>
    </div>
</template>