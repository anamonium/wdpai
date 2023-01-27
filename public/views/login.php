<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>
<body>
    <div class = "container">
        <div class="flowers">
            <img src = "public/img/images/login-flowers.jpg">
        </div>
        <div class = "loginContainer">
            <div class = "loginPhoto">
                <a href = "welcomePage"><img src = "public/img/logo.svg"></a>
            </div>
            <form action = "login" method = "POST">
            <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                Log in
                <input name = "email" type="text" placeholder="e-mail">
                <input name = "password" type="password" placeholder="password">
                <button type = "submit" >Log in</button>
            </form>
            <a href = "sign"><button id = "signIn">Don't have an account? Sign in.</button></a>
        </div>
    </div>
</body>