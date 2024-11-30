<?php include('../includes/header.php'); ?>

<h1 style="margin-left: 240px;"> Feedback Form </h1>



<div class="square_f">
    <form id="feedbackForm" action="checkform.php" method="post" onsubmit="return validateForm()">
        <fieldset>
            <legend> Personal Information</legend>
            <div>
            <label for="name"> Name: </label>
            <input type="text" class="field-input_f" id="name" name="name" />
            <span id="nameError" style = "margin-top: 10px;"></span>
            </div>

            <div>
            <label for="email"> Email: </label>
            <input type="text" class="field-input_f" id="email" name="email" />
            <span id="emailError"></span>
            </div>

            <div>
            <label for="phone"> Phone: </label>
            <input type="text" class="field-input_f" id="phone" name="phone" />
            <span id="phoneError"></span>
            </div>

            <label for="age"> Age:</label>
            <input type="text" class="field-input_f" id="age" name="age" />
            <span id="ageError"></span>
        </fieldset>

        <fieldset>
            <legend> Your Feedback</legend>
            <div>
            <label for="rate"> Rate our Service: </label>
            <select name="rate" class="field-input_f" id="rate">
                <option value="">Select</option>
                <option value="Excellent"> Excellent</option>
                <option value="Good"> Good</option>
                <option value="Bad"> Bad</option>
            </select>
            <span id="rateError"></span>
            </div>

            <div>
            <p style = "display: inline-block;" >Recommend us to Others?</p>
            
            <label for="yes"> Yes</label>
            <input type="radio" name="radiobox" id="yes" value="Yes" />
            <label for="no"> No </label>
            <input type="radio" name="radiobox" id="no" value="No" />
            <span id="radioError"></span>
            </div>
            
            
            <p >What are your favorite book genres?</p>
            <div>
                <label class = "s1">
                    Action:<input type="checkbox" name="genres[]" value="Action"/>
                </label>
                <label class = "s1">
                    Romance:<input type="checkbox" name="genres[]" value="Romance"/>
                </label>
                <label class = "s1">
                    Historical:<input type="checkbox" name="genres[]" value="Historical"/>
                </label>
                <label class = "s1">
                    Fantasy: <input type="checkbox" name="genres[]" value="Fantasy"/>
                </label>
            </div>
            <span id="genresError"></span>
            <br />

            <div>
            <label for="textare"> Additional Feedback:</label>
            <textarea name="textare" class="field-input_f" id="textare" rows ="4" cols ="6"></textarea>
            </div>

            <button class="b1" type="submit"> Submit </button>
        </fieldset>
    </form>
</div>



<?php include('../includes/footer.php'); ?>
