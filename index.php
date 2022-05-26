<!doctype html>
<html>
  <head>
  </head>
  <style>
  body {
    max-width: 60vw;
    margin: 0 auto;
    background-color: #1c2c33;
  }

  .form-div {
      background-color: #bfebfa;
      padding: 15px;
      border-right: 5px #7b5d79 solid;
      border-left: 5px #7b5d79 solid;

  }
  form {
    padding: 5px;
  }

  input, textarea {
    padding: 3px;
    margin: 5px;

  }

  hr {
    color: grey;
  }
  .personal, .character {
    background-color: skyblue;
    border: 2px #7b5d79 solid;
    border-radius: 25px;
    padding: 10px;
    margin: 0 10px;
  }

  .title {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  .error {
    color: red;
  }

  .inform {
    font-size: 10px;
    color: grey;
  }

  fieldset {
    border: 1px white dashed;
  }

  .sign-up {
  display: flex;
  justify-content: center;
  }

  .signup_btn {
    padding: 10px;
    font-size: 20px;
    border-radius: 25px;
    background-color: #7b5d79;
    color: #bfebfa;


  }
  </style>
  <body>


    <?php
// define variables and set to empty values
$nameErr = $emailErr = $ageErr = $char_classErr = $passwordErr = $password_againErr = "";
$name = $email = $age = $char_class = $password = $password_again = "";
$char_nameErr = $char_classErr = $pet_typeErr = $char_skillsErr = "";
$char_name = $char_class = $pet_type = $char_skills = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //Account Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  //email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  //Age Verification
    if (empty($_POST["age"])) {
      $ageErr = "Age is required";
    } else {
      $age = test_input($_POST["age"]);
      if ($age <= 12) {
      $ageErr = "Users must be 13 or older to register.";
  }
}

  //Character class
  if (empty($_POST["char_class"])) {
    $char_classErr = "You must choose a class for your character";
  } else {
    $char_class = test_input($_POST["char_class"]);
  }

  //Password
    if (empty($_POST["password"])) {
      $passwordErr = "Please Enter a Password";
    } else {
    $password = test_input($_POST["password"]);
  }

  //Password Confirmation
  if (empty($_POST["password_again"])) {
    $password_againErr = "Please re-enter your Password";
  } else {
  $password_again = test_input($_POST["password_again"]);
    if ($password_again !== $password) {
    $password_againErr = "Passwords do not match";
  }
}

  //Character name
  if (empty($_POST["char_name"])) {
    $char_nameErr = "Please Name your Character";
  } else {
    $char_name = test_input($_POST["char_name"]);
  }

  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="form-div">
<div class="title">
  <img src="title.png" alt="Space Game. Sign Up For Free"><br>
  <h3>Set up a free account and start your journey through the galaxy</h3>
</div>




    <div class="personal">
    <h2>Personal Details</h2>
    <p><span class="error">* - required field</span></p>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name: <input type="text" name="name" value="<?php echo  $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo   $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Age:<input type="number" name="age" value="<?php echo $age;?>">
      <span class="error">* <?php echo $ageErr;?></span>
      <br>
      Password:<input type="password" name="password" value="<?php  echo $password;?>">
      <span class="error">* <?php echo $passwordErr;?></span>
      <br>
      Confirm Password:<input type="password" name="password_again">
      <span class="error">* <?php echo $password_againErr;?></span>
      <br>
      <span class="inform">Password must be 8 characters long and  contain at least 1 number and 1 letter.<br>
      Special characters (!, #, $, <) are not allowed.</span>
  </div>
      <br>
      <br>

    <div class="character">

        <h2>Build Your Character</h2>
        Character Name:<input type="text" placeholder="Character name" name="char_name">
        <span class="error">* <?php echo $char_nameErr;?></span><br>
        Character Age:<input type="number" min="18" max="100" value="20" name="char_age"><br>
        <fieldset name="class_choice">
          <legend>Character Class:</legend>
          <span class="error">* <?php echo $char_classErr;?></span>
          <input type="radio" name="char_class" <?php if  (isset($char_class) && $char_class=="gunner") echo  "checked";?> value="gunner">
          <label for="gunner">Gunner</label>
          <input type="radio" name="char_class" <?php if  (isset($char_class) && $char_class=="hunter") echo  "checked";?> value="hunter">
          <label for="hunter">Hunter</label>
          <input type="radio" name="char_class" <?php if  (isset($char_class) && $char_class=="brawler") echo   "checked";?> value="brawler">
          <label for="brawler">Brawler</label>
          <input type="radio" name="char_class" <?php if  (isset($char_class) && $char_class == "explorer") echo  "checked";?> value="explorer">
          <label  for="explorer">Explorer</label>
        </fieldset>
        <br>
        <label for="pet_type">Choose Pet Type:</label>
        <select name="pet_type">
          <option value="" disabled selected>--Choose Below--</option>
          <option value="wolf">Cyber Wolf</option>
          <option value="panther">Robo-Panther</option>
          <option value="penguin">Mecha-Penguin</option>
        </select>
        <label for="pet_colour">Pet Colour:</label>
        <input name="pet_colour" type="color" value="#C0FFEE"><br>
        <br>
        <fieldset class="skills" name="char_skills">
          <legend>Select 3 Skills:</legend>

          <label for="hacking">Hacking</label>
          <input type="checkbox" id="hacking" name="hacking">
          <label for="security">Security</label>
          <input type="checkbox" id="security" name="security">
          <label for="sneaking">Sneaking</label>
          <input type="checkbox" id="sneaking" name="sneaking"><br>
          <label for="charisma">Charisma</label>
          <input type="checkbox" id="charisma" name="charisma">
          <label for="combat">Combat</label>
          <input type="checkbox" id="combat" name="combat">
          <label for="perception">Perception</label>
          <input type="checkbox" id="perception" name="perception"><br>
          <label for="medical">Medical</label>
          <input type="checkbox" id="medical" name="medical">
          <label for="repair">Repair</label>
          <input type="checkbox" id="repair" name="repair">
          <label for="foraging">Foraging</label>
          <input type="checkbox" id="foraging" name="foraging"><br>
          <label for="lweapons">Light Weapons</label>
          <input type="checkbox" id="lweapons" name="lweapons">
          <label for="hweapons">Heavy Weapons</label>
          <input type="checkbox" id="hweapons" name="hweapons"><br>
          <label for="survival">Survival</label>
          <input type="checkbox" id="survival" name="survival">
        </fieldset>
        <label for="bio">Character Background</label><br>
        <textarea name="bio" cols="40" rows="10" placeholder="Feel free to add some personal details about your character."></textarea>
        <br><br>
        <div class="sign-up">
        <input class="signup_btn" type="submit" name="submit" value="Start Your Journey">
      </div>

      </form>
    </div>
  </div>

  </body>
</html>
