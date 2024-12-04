
<?php include '../includes/header.php';
$pageTitle = " Contact - Page"; 
?>

        
<fieldset>
    <legend>Contact Information</legend> <!-- Use lowercase for HTML5 compliance -->

    <div class="text_center">
        <label for="name" class="m">Name:</label>
        <input readonly="readonly" value="Moaid Ali Alshamrani" name="name" id="name" />
    </div>  

    <br />

    <div class="text_center">
        <label for="phone" class="m">Phone Number:</label>
        <input readonly="readonly" value="0532175299" name="phone" id="phone" />
    </div>

    <br />

    <div class="text_center">
        <label for="email" class="m">Email:</label>
        <input readonly="readonly" value="m45job@outlook.com" name="email" id="email" />
    </div>

    <br />
    <div class="text_center">
        <a href="mailto:m45job@outlook.com?subject=Inquiry" style="color:blue; font-size: 20px;">Email me</a>
    </div>

    <br />
    <br />
</fieldset>

<!-- Wrap the blockquote content in a block element -->
<div>
    <blockquote>
        <p><strong>Our mission is to provide our customers with an exceptional and highly flexible experience, ensuring that your needs are always our top priority.</strong></p>
    </blockquote>
</div>

<!-- Address should be part of a block element -->
<div>
    <address>
        <strong>432 Road King Abdulaziz Street, Jeddah 1234 Saudi Arabia</strong>
    </address>
</div>

<?php include '../includes/footer.php'; ?>
