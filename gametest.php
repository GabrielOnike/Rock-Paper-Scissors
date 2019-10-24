<?php
  //Demand GET parameters
  if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
  }

  //Redirict USer back to index.php
  if  ( isset($_POST ['logout']) ) {
    header('Location: index.php');
    return;
  }

//Setup game value arrays
// 0 is rock, 1 is paper, 2 is Scissors
//computer i.e. Gabriel;is set to random
  $names= array ('Rock','Paper','Scissors');
  $human= isset ($_POST["human"]) ? $_POST['human']+0 : -1 ;

  $gabriel= rand(0,1,2);

//Function below takes as its input Gabriel and human plays
//it returns "Tie" , "You lose", "You Win" depending on plays
//"You" is the human guest being addressed by Gabriel(computer)

function check($gabriel, $human) {
  if ($gabriel == 0 ) {
  if ( $human == 0 ) {
      return "Tie";
  } else if ( $human == 1 ) {
      return "You Win";
  } else if ( $human == 2 ) {
      return "You Lose";
  }
  return false;
}
if ($gabriel == 1 ) {
if ( $human == 1 ) {
    return "Tie";
} else if ( $human == 2 ) {
    return "You Win";
} else if ( $human == 0 ) {
    return "You Lose";
}
return false;
}
if ($gabriel == 2 ) {
if ( $human == 2 ) {
    return "Tie";
} else if ( $human == 0 ) {
    return "You Win";
} else if ( $human == 1 ) {
    return "You Lose";
}
return false;
}

}



  //Check to see how the play happened
  $result = check($computer,$human);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <title> Gabriel's Rock, Paper , Scissors Game </title>
 <?php require_once "bootstrap.php" ; ?>
 </head>
 <body>
 <div class = "container" >
 <h1> Rock Paper Scissors  </h1>
   <?php
   if (isset ($_REQUEST["name"]) ) {
     echo "<p>Welcome: ";
     echo htmlentities ($_REQUEST["name"] );
     echo "</p> \n";
   }
   ?>

  <form     method="post"  >
    <select name  ="human" >
    <option value ="-1"    >Please Select  </option>
    <option value ="0"     >Rock           </option>
    <option value ="1"     >Paper          </option>
    <option value ="2"     >Scissors       </option>
    <option value ="3"     >Test           </Option>
    </select>
    <input type="submit" value="Play" >
    <input type="submit" name="logout" value="Logout" >
 </form>

 <pre>
  <?php
       //below is the form choice logic
       if ( $human == -1 ) {
         print " Please choose a strategy and Play.\n";
       } else if ($human == 3) {
           for ($g=0; $g<3;$g++){
             for ($h=0; $h<3;$h++){
                 $r= check($g,$h);
                 print "Human=$names[$h] Gabriel=$names[$g] Result=$r\n";
               }
             }
       } else {
               print "Your Play=$names[$human] Gabriel Plays=$names[$gabriel] Result=$result\n";
            }
  ?>
 </pre>
 </div>
 </body>
 </html>
