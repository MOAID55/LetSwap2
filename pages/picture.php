<?php
$pageTitle = "Picture Gallery - Page";
include('../includes/header.php');
?>



<h1 style = "text-align:center;"> Picture Gallery </h1>


<!-- Large Image Display -->
<div class="large_image_sqaure" style="text-align:center;">
    <img id="largeImage" src="../Images/Book1.png" alt="Large Image" class = "large-image-container"/>
</div>




<div class="square_images">
    <div class="image_items">
        <img src="../Images/Book1.png" id="Book1"  class="images"   alt="Books Images"/>
        <p class="image_details">Book: The Alchemist <br /><br /> Moaid55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src="../Images/Book2.png" id="Book2" class="images"  alt="Books Images"/>
        <p class="image_details">Book: The Old Man and the Sea  <br /><br /> Ahmed55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src="../Images/Book3.png" id="Book3" class="images"  alt="Books Images"/>
        <p class="image_details"> Book: The Magic Mountain <br /><br /> Mohammed55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src="../Images/Book4.png" id="Book4" class="images"  alt="Books Images"/>
        <p class="image_details">Book: The Stranger <br /><br /> Ali123 <br /><br />Location: Jeddah</p>
        
    </div>
</div>




<?php include('../includes/footer.php'); ?>