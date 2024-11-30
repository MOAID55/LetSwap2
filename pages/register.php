<?php
$pageTitle = "Sign Up - LitSwap";
include('../includes/header.php');
?>

<div class="content">
    <h2>With one account, you can swap your book <br /> with someone else</h2>
    <form class="square_r" action="checkregister.php" method="post" onsubmit="return register()">
        <h2>Sign up</h2>

        <!-- Name Input -->
        <div>
        <label for="Name" class = "label_f" >Name<span>*</span></label>
        <input type="text" id="Name" name="name" class="field-input_r" />
        <p class="forget_r">At least 4 characters</p>
        </div>


        <!-- Username Input -->

        <div>
        <label for="Username" class = "label_f">Username<span>*</span></label>
        <input type="text" id="Username" name="username" class="field-input_r"/>
        <p class="forget_r">At least 4 characters</p>
        </div>


        <!-- Email Input -->

        <div>
        <label for="Email" class = "label_f">Email<span>*</span></label>
        <input type="text" id="Email" name = "email" class="field-input_r" />
        <p class="forget_r">At least 6 characters</p>
        </div>

        <!-- Location Input -->
        <div>
        <label for="Location" class = "label_f">Location<span>*</span></label>
        <input type="text" id="Location" name="location" class="field-input_r" />
        <p class="forget_r">At least 6 characters</p>
        </div>
        <!-- Password Input -->
        <div>
        <label for="Password" class = "label_f">Password<span>*</span></label>
        <input type="password" id="Password" name="password" class="field-input_r"  />
        <p class="forget_r">At least 6 characters</p>
        </div>
        <!-- Sign Up Button -->
        <div style="text-align:center">
        <button type="submit">Sign up</button>
        </div>
        <!-- Login Link -->
        <p style="text-align: center;">
            Have an account? <a href="Login.php" style="color: blue;">Log in</a>
        </p>
    </form>
</div>



<?php include('../includes/footer.php'); ?>
