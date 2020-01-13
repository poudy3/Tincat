<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/loginAction.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="register">
        </form>
    </div>
    <a href="register.php"> Pas encore de compte ?</a>
    <div class="message">
        <?php
        if (isset($_GET["message"])){
            echo $_GET["message"];
        }
        ?>
    </div>
</body>
</html>