<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type = "text/javascript" src = "/public/js/srcipt.js" defer></script>
    <title>sign</title>
</head>
<body>
    <div class = "container">
        <div class="flowers">
            <img src = "public/img/images/login-flowers.jpg">
        </div>
        <div class = "loginContainer">
            <div class = "loginPhoto">
                <img src = "public/img/logo.svg">
            </div>
            <div class="login-container">
                <form id = "signinForm" action = "sign" method = "POST">
                    <div class = "messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                            }
                        }
                        ?>
                    </div>
                    Sign in
                    <input name = "name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name = "email" type="text" placeholder="e-mail">
                    <input name = "password" type="password" placeholder="password">
                    <input name = "passwordconfirm" type="password" placeholder="repeat password">
                    <button type = "submit" >Sign in</button>
                </form>
            </div>
            <button id = "signIn">Already have an account? Log in.</button>
        </div>
    </div>
</body>