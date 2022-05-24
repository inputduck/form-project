
<!doctype html>
<html>
<head>
</head>

<style>
body {
  max-width: 80vw;
  margin: 0 auto;
  background-color: silver;
}

hr {
  color: grey;
}
.personal, .char-form {
  background-color: skyblue;
  border: 2px gold solid;
  border-radius: 25px;
  padding: 10px;
}
</style>
<body>
  <h1>Sign up for free</h1>
  <p>Set up a free account and start your journey through the galaxy</p>
    <?php
    // Variables are defined and assigned as empty
    $name = $email = $dob = $password = "";



    //checks if the method used by the form is POST
    if ($_SERVER["REQUEST_METHOD"]= "POST") {

      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
      $name = test_input($_POST["name"]);
    }
      if (empty($_POST["email"])) {
        $emailErr = "E-mail address is required";
      } else {
        $email = test_input($_POST["email"]);
      }
      if (empty($_POST["dob"])) {
        $dobErr = "Age is required";
      } elseif ($_POST["dob"] < 13) {
        $dobErr = "Users must be 13 or older to register.";
      }else{
      $dob = test_input($_POST["dob"]);
    }
      if (empty($_POST["password"])) {
        $passwordErr = "Please Enter a Password";
      } else {
      $password = test_input($_POST["password"]);
    }

    }

    //test_input function
    function test_input($data) {
      $data = trim($data ?? " ");
      $data = stripslashes($data ?? " ");
      $data = htmlspecialchars($data ?? " ");
      return $data;
    }


    //if it is, check whether the field is empty

    //if it contains text, set the $name variable to the input value
      /*Example,
      if (empty($_POST["website"])) {
        $website = "";
      } else {
        $website = test_input($_POST["website"]);
      }*/

    /*formats the assigned values to be only useful characters
    also stops potential hacking attempts with the removal of
    special characters*/
    ?>
    <!--This is the form section. It will be made up of two sections. One for account creation and one for character creation.-->
  <h2>Personal Details</h2>
  <div class="form-div">
    <div class="personal">
      <form class="account" name="account" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!--Name, email, dath of birth, phone number with area codes, Password and confirm password. -->
        Name:<input type="text" name="name" placeholder="Please enter your full name"><span class="error">* <?php echo $nameErr;?></span><br>
        Email:<input type="email" name="email" placeholder="Please enter a valid E-mail address"><span class="error">* <?php echo $emailErr;?><br>
        Age:<input name="dob" type="number"><span class="error">* <?php echo $dobErr;?><br>
        Password:<input type="password" placeholder="Please enter a valid password"><br>
        Confirm Password:<input type="password" placeholder="Re-enter your password"><br>
        Password must be 8 characters long and contain at least 1 number and 1 letter. Special characters (!, #, $, <) are not allowed.
      </form>
    </div>
    <div class="character">

      <br>
      <hr>
      <br>
      <h2>Your Character</h2>
      <form class="char-form" name="char-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--Character name, race(Human, Android, AI), class(Weapons specialist, Hacker, Electronics, Brawler), age, Pet type (None, Wolf, Panther, Eagle) (if pet type is none, the others stay greyed out,), pet colour, pet name, 3 skills checkbox from 10, Optional Bio. -->
      Here you can create your character.<br>
      Character Name:<input type="text" placeholder="Character name"><br>
      Character Age:<input type="number" min="1" max="100"><br>
      Choose your class:<input type="radio" id="weapons" name="char_class" value="WeaponSpecialist">
        <label for="weapons">Weapons Specialist</label>
        <input type="radio" id="hacker" name="char_class" value="Hacker">
        <label for="hacker">Hacker</label>
        <input type="radio" id="electronics" name="char_class" value="Electronics">
        <label for="electronics">Electronics Specialist</label>
        <input type="radio" id="brawler" name="char_class" value="Brawler">
        <label for="brawler">Brawler</label><br>
      Choose Your Pet:<select name="pet-type">
        <option value="none">No Pet</option>
        <option value="wolf">Cyber-Wolf</option>
        <option value="panther">Robo-Panther</option>
        <option value="penguin">Mecha-Penguin</option>
      </select>
      Pet Name:<input type="text" placeholder="Name your Pet">
      Pet Colour:<input type="color" value="#C0FFEE"><br>
      Select Race:<select name="race">
        <option value="human">Human</option>
        <option value="android">Android</option>
        <option value="cyborg">Cyborg</option>
        <option value="ai">Artificial Intelligence</option>
      </select>

      <fieldset class="powers">
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

      <input type="submit" value="Get Started"></input>
      </form>
    </div>
  </div>
</body>
</html>
