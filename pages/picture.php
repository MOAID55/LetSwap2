<?php
$pageTitle = "Picture Gallery - Page";
include '../includes/header.php';
?>



<h1 style = "text-align:center;"> Picture Gallery </h1>


<!-- Large Image Display -->
<div class="large_image_sqaure" style="text-align:center;">
    <img id="largeImage" src="./images/book1.png" alt="Large Image" class = "large-image-container"/>
</div>




<div class="square_images">
    <div class="image_items">
        <img src= "../images/book1.png" id="book1"  class="images"   alt="Books Images"/>
        <p class="image_details">Book: The Alchemist <br /><br /> Moaid55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src= "../images/book2.png" id="book2" class="images"  alt="Books Images"/>
        <p class="image_details">Book: The Old Man and the Sea  <br /><br /> Ahmed55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src= "../images/book3.png" id="book3" class="images"  alt="Books Images"/>
        <p class="image_details"> Book: The Magic Mountain <br /><br /> Mohammed55 <br /><br />Location: Jeddah</p>
        
    </div>
    <div class="image_items">
        <img src= "../images/book4.png" id="book4" class="images"  alt="Books Images"/>
        <p class="image_details">Book: The Stranger <br /><br /> Ali123 <br /><br />Location: Jeddah</p>
        
    </div>
</div>




<?php include '../includes/footer.php'; ?>
