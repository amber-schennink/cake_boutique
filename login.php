<?php
   session_start();
?>

<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #DCCCBF;
         }
         .formSignin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: black;
         }
         .formSigninHeading{
            margin-bottom: 10px;
         }
         .formControl {
            position: relative;
            height: auto;
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
            outline: none;
            background: #DCCCBF;
            color: black;
         }
         .formControl::placeholder{
            color: gray;
         }
         .formControl:focus {
            z-index: 2;
            border: solid 4px;
         }
         .formSignin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:black;
         }
         .formSignin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:black;
         }
         .btn{
            border-radius: 0.375rem;
            padding: 1rem;
            font-weight: 700;
            color: black;
            background-color: #DCCCBF;
            border-width: 2px;
            border-color: black

         }
         .btn:hover{
            cursor: pointer;
            color: black;
            background: #DCCCBF;
         }
         #btnContainer{
            display: flex;
            justify-content: space-between;
            width: 330px;
            margin: 0 auto;
         }
         #goToPageBtn{
            display: none;
         }
         h2{
            text-align: center;
            color: black;
         }
         #passwordContainer{
            margin-bottom: 10px;
            position: relative;
         }
         #viewPassword{
            position: absolute;
            right: 10;
            top: calc(50% - 10px);
            z-index: 3;
         }
         #viewPassword > svg{
            fill: black;
         }
         #eyeSlash{
            display: none;
         }
         
      </style>
   </head>
   <body>
      <h2>Vul Gebruikersnaam en Wachtwoord in</h2> 
      <div class="container formSignin">
         <?php
            $msg = '';
            
            if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
               if($_POST['username'] == 'username' && $_POST['password'] == 'password') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'userCakeBoutique';
                  header("Location: editImgs"); 
                  echo "<script>window.location.href='editImgs';</script>";
               }else{
                  $msg = 'Verkeerde gebruikersnaam of wachtwoord';
               }
            }
            if(!empty($_GET['message'])){
               $message = $_GET['message'];
               $msg = "Uitgelogged";
            }
            if(isset($_SESSION['valid'])){
               if($_SESSION['valid'] == true && $_SESSION['username'] == 'userCakeBoutique'){
                  echo '<style type="text/css">
                     #loginBtn {
                        display: none;
                     }
                     #goToPageBtn{
                        display: block;
                     }
                  </style>';
                  $msg = 'Je bent ingelogged';
               }else{
                  echo '<style type="text/css">
                     #logoutBtn {
                        display: none;
                     }
                  </style>';
               }
            }else{
               echo '<style type="text/css">
                  #logoutBtn {
                     display: none;
                  }
               </style>';
            }
         ?>
      </div>
      <div class="container">
         <form class="formSignin" role="form"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <h4 class="formSigninHeading"><?php echo $msg; ?></h4>
            <input type="text" class="formControl" name="username" placeholder="Gebruikersnaam" required autofocus></br>
            <div id="passwordContainer">
               <input id="password" type="password" class="formControl" name="password" placeholder="Wachtwoord" required>
               <div id="viewPassword" onclick="showPassword();">
                  <svg id="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                  <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
               </div>
            </div>
            </br>
            <button id="loginBtn" class="btn" type="submit" name="login">Log in</button>
         </form>
         <div id="btnContainer">
            <button id="goToPageBtn" class="btn" onClick="document.location.href='editImgs'">Ga naar pagina</button>
            <button id="logoutBtn" class="btn" onClick="document.location.href='logout.php'">Log out</button>
         </div> 
      </div> 
   </body>
</html>
<script type="text/javascript">
   function showPassword(){
      var eye = document.getElementById('eye').style;
      var eyeSlash = document.getElementById('eyeSlash').style;
      var password = document.getElementById('password');
      if(password.type == "password"){
         password.type = "text";
         eye.display = "none";
         eyeSlash.display = "block";
      }else{
         password.type = "password";
         eye.display = "block";
         eyeSlash.display = "none";
      }
   }
</script>