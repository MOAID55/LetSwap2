<?php include('../includes/header.php'); ?>

<div class="content">
    <h2>With one account, you can swap your book <br /> with someone else</h2>
    <form class="square_login" action="checklogin.php" method="post" onsubmit="return login()">
        <h2>Login</h2>

        <!-- Username Input -->
        <div>
        <label for="Username" class = "label_f">Username </label>
        <input type="text" id="Username" name ="Username" class="field-input"/>
        </div>

        <p class="forget_login">
            <a href="#" style="color: blue;">Forget Username?</a>
        </p>

        <!-- Password Input -->
        <div>
        <label for="Passwordl" class = "label_f">Password</label>
        <input type="password" name ="Password" class="field-input" id="Passwordl"/>
        </div>

        <p class="forget_login">
            <a href="#" style="color: blue;">Forget Password?</a>
        </p>

        <!-- Login Button -->
         <div style="text-align:center">
        <button type="submit">Login</button>
        </div>

        <!-- Registration Link -->
        <p style="text-align: center;">
            Don't have an account? <a href="register.php" style="color: blue;">Register</a> now.
        </p>
    </form>
</div>






<?php include('../includes/footer.php'); ?>