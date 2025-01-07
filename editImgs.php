<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="shortcut icon" href="logo/logoShortcut.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>The Cake Boutique</title>
  </head>
  <?php 
    if (isset($_SESSION['valid']) && $_SESSION['valid'] == true && $_SESSION['username'] == 'userCakeBoutique') {}else {
      header("Location: login");
      echo "<script>window.location.href='login';</script>";
      exit;
    }
    include "imgs.php";
  ?>
  <body>
    <form id="form" action="checkEditImgs" method="post" enctype="multipart/form-data">
      <div id="mainLogo" class="flex">
        <img class="m-auto" src="logo/logoMain.svg" alt="cake-logo" />
      </div>
      <button id="refreshButton" onclick="document.getElementById('refreshPopUp').classList.remove('display-none')" type="button" class="button lightPink flex position-fixed">
        <svg style="height: 100%; padding: 7px; fill: #56423D;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/></svg>
        <div class="m-auto">Pagina vernieuwen</div>
      </button>
      <div id="navContainer" onclick="openHamburger()">
        <nav id="navMenu">
          <div id="hamburger">
            <span class="hamburgerBar"></span>
            <span class="hamburgerBar"></span>
            <span class="hamburgerBar"></span>
          </div>
          <ul class="p-0 m-0">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#taarten" class="nav-link">Taarten</a>
            </li>
            <li class="nav-item">
              <a href="#cupcakesCakepops" class="nav-link">Cupcakes</a>
            </li>
            <li class="nav-item">
              <a href="#overMij" class="nav-link">Over mij</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
      <div id="navMenuMT" onclick="closeHamburger()">
        <div id="navMenuMTULContainer">
          <ul onclick="event.stopPropagation();">
            <li class="nav-item">
              <a href="#" onclick="closeHamburger()" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#taarten" onclick="closeHamburger()" class="nav-link">Taarten</a>
            </li>
            <li class="nav-item">
              <a href="#cupcakesCakepops" onclick="closeHamburger()" class="nav-link">Cupcakes</a>
            </li>
            <li class="nav-item">
              <a href="#overMij" onclick="closeHamburger()" class="nav-link">Over mij</a>
            </li>
            <li class="nav-item">
              <a href="#contact" onclick="closeHamburger()" class="nav-link">Contact</a>
            </li>
          </ul>
        </div>
      </div>

      <div id="intro" class="h-screen-nav p-sideDT">
        <div id="introImg" class="position-relative">
          <img id="imgFold" class="me-auto" src="photos/<?php echo $fold; ?>" alt="taart chocola" />
          <label for="inputFold"> 
            <div id="containerEditButtonFold" class="containerEditButton bottom-0">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputFold" type="file" name="fold" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="introText" class="p-sideM">
          <h3>Uniek en handgemaakt</h3>
          <h1><span>Welkom bij</span> The Cake Boutique!</h1>
          <p>
            Welkom bij The Cake Boutique! Hét adres voor mooie en lekkere taarten, cijfertaarten,
            cupcakes en cakepops! Verjaardagen, kinderfeestjes, babyshowers of bruiloften, ik maak met veel
            liefde en aandacht iets moois en lekkers voor je!
            <br /><br />
            Kijk rustig rond op de pagina voor inspiratie en ideeën, en ontdek wat de mogelijkheden zijn.
            Vragen of specifieke wensen? Ik hoor het graag van je!
            <br /><br />
            Bij <a class="nav-link pointer underlineM underlineHover d-inline" href="#taarten">‘taarten’</a> en <a class="nav-link pointer underlineM underlineHover d-inline" href="#cupcakesCakepops">‘cupcakes’</a> vindt je een aantal eerder gemaakte projecten.
            Voor een completer portfolio kunt je een kijkje nemen op mijn <a class="nav-link pointer underlineM underlineHover d-inline" href="https://www.facebook.com/CupcakesandmorebyAtalia/">Facebook</a> of <a class="nav-link pointer underlineM underlineHover d-inline" href="https://www.instagram.com/thecakeboutiquebyatalia/">Instagrampagina</a>.

          </p>
        </div>
      </div>

      <div id="smaak" class="bgLight flex column position-relative z-3">
        <div id="smaakText" class="p-sideM m-auto h-fit">
          <h3>Met zorg gemaakt</h3>
          <h1 class="pb-3">Smaakvol en Uitnodigend</h1>
          <p>The Cake Boutique maakt taarten en cupcakes in verschillende soorten, smaken en voor vele gelegenheden. Hierbij gebruik ik met zorg uitgezochte ingrediënten en staat kwaliteit voorop. </p>
          <p class="pb-3">Deze ingrediënten, in combinatie met passie en precisie, vormen de basis van mijn handgemaakte lekkernijen! Overigens kun je ook bij terecht als je op zoek bent naar een gluten- of lactosevrije taart of cupcakes. Er is veel mogelijk en ik help u graag met het bedenken en realiseren van uw taart of cupcakes. Heeft u een voorbeeld? Dan kunt u deze altijd naar mij toesturen! </p>
          <button type="button" class="button darkPink">Bestel nu</button>
        </div>
        <div id="smaakImg" class="p-0 m-auto position-relative">
          <img id="imgSmaak" src="photos/<?php echo $smaak; ?>" alt="Baking" />
          <label for="inputSmaak">
            <div class="containerEditButton bottom-0 end-0">
              <?php include "editButton.html"; ?>
            </div>
          </label>
          <input id="inputSmaak" type="file" name="smaak" onchange="readURL(this)" class="display-none" accept="image/*"/>
        </div>
      </div>

      <div id="taarten" class="p-side baksels z-2">
        <div id="taartL1" class="ps-0 position-relative">
          <img id="imgTaartL1" style="aspect-ratio: 9/10;" src="photos/<?php echo $taartL1; ?>" alt="taart" />
          <label for="inputTaartL1">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL1" type="file" name="taart[L1]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartTest" class="pe-0">
          <div id="taartText">
            <h3 class="papyrus">Wat ik maak</h3>
            <h1 class="pb-3">Taarten & Cijfertaarten</h1>
            <p class="pb-3"> Heb je binnenkort iets te vieren? Dan kun je speciaal voor die gelegenheid een thema taart bestellen. Maar ook voor bij de koffie of als traktatie kun je wat lekkers bestellen. Want een lekker taartje is altijd een goed idee!</p>
            <button type="button" class="button darkPink">Bestel nu</button>
          </div>
          <div id="taartR1" class="position-relative">
            <img id="imgTaartR1" class="aR-1-1" src="photos/<?php echo $taartR1; ?>" alt="taart" />
            <label for="inputTaartR1">
              <div class="containerEditButton bottom-0 end-0">
                <?php include "editButton.html"; ?>
              </div>
              <input id="inputTaartR1" type="file" name="taart[R1]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
            </label>
          </div>
        </div>
        <div id="taartL2" class="ps-0 position-relative"> 
          <img id="imgTaartL2" style="aspect-ratio: 9/10;" src="photos/<?php echo $taartL2; ?>" alt="taart" />
          <label for="inputTaartL2">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL2" type="file" name="taart[L2]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR2" class="pe-0 mb--100 position-relative">
          <img id="imgTaartR2" style="aspect-ratio: 10/7;" src="photos/<?php echo $taartR2; ?>" alt="taart" />
          <label for="inputTaartR2">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR2" type="file" name="taart[R2]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL3" class="ps-0 position-relative">
          <img id="imgTaartL3" class="aR-1-1" src="photos/<?php echo $taartL3; ?>" alt="taart" />
          <label for="inputTaartL3">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL3" type="file" name="taart[L3]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR3" class="pe-0 mb--100 mt-100 position-relative">
          <img id="imgTaartR3" class="aR-3-2" src="photos/<?php echo $taartR3; ?>" alt="taart" />
          <label for="inputTaartR3">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR3" type="file" name="taart[R3]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>

        <div id="taartL4" class="ps-0 position-relative">
          <img id="imgTaartL4" class="aR-4-3" src="photos/<?php echo $taartL4; ?>" alt="taart" />
          <label for="inputTaartL4">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL4" type="file" name="taart[L4]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR4" class="pe-0 mt-100 mb-100 span-2 position-relative">
          <img id="imgTaartR4" src="photos/<?php echo $taartR4; ?>" alt="taart" />
          <label for="inputTaartR4">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR4" type="file" name="taart[R4]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL5" class="ps-0 position-relative">
          <img id="imgTaartL5" class="aR-4-3" src="photos/<?php echo $taartL5; ?>" alt="taart" />
          <label for="inputTaartL5">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL5" type="file" name="taart[L5]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL6" class="ps-0 mb--100 position-relative">
          <img id="imgTaartL6" class="aR-4-3" src="photos/<?php echo $taartL6; ?>" alt="taart" />
          <label for="inputTaartL6">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL6" type="file" name="taart[L6]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR5" class="pe-0 mt--100 position-relative">
          <img id="imgTaartR5" class="aR-4-3" src="photos/<?php echo $taartR5; ?>" alt="taart" />
          <label for="inputTaartR5">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR5" type="file" name="taart[R5]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL7" class="ps-0 span-2 mt-100 mb-100 position-relative">
          <img id="imgTaartL7" src="photos/<?php echo $taartL7; ?>" alt="taart" />
          <label for="inputTaartL7">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL7" type="file" name="taart[L7]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR6" class="pe-0 position-relative">
          <img id="imgTaartR6" class="aR-4-3" src="photos/<?php echo $taartR6; ?>" alt="taart" />
          <label for="inputTaartR6">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR6" type="file" name="taart[R6]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR7" class="pe-0 position-relative">
          <img id="imgTaartR7" class="aR-4-3" src="photos/<?php echo $taartR7; ?>" alt="taart" />
          <label for="inputTaartR7">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR7" type="file" name="taart[R7]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL8" class="ps-0 mt--100 position-relative">
          <img id="imgTaartL8" class="aR-4-3" src="photos/<?php echo $taartL8; ?>" alt="taart" />
          <label for="inputTaartL8">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL8" type="file" name="taart[L8]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR8" class="pe-0 mb--100 position-relative">
          <img id="imgTaartR8" class="aR-4-3" src="photos/<?php echo $taartR8; ?>" alt="taart" />
          <label for="inputTaartR8">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR8" type="file" name="taart[R8]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL9" class="ps-0 position-relative">
          <img id="imgTaartL9" class="aR-4-3" src="photos/<?php echo $taartL9; ?>" alt="taart" />
          <label for="inputTaartL9">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL9" type="file" name="taart[L9]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR9" class="pe-0 span-2 mt-100 mb-100 position-relative">
          <img id="imgTaartR9" src="photos/<?php echo $taartR9; ?>" alt="taart" />
          <label for="inputTaartR9">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR9" type="file" name="taart[R9]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL10" class="ps-0 position-relative">
          <img id="imgTaartL10" class="aR-4-3" src="photos/<?php echo $taartL10; ?>" alt="taart" />
          <label for="inputTaartL10">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL10" type="file" name="taart[L10]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL11" class="ps-0 mb--100 position-relative">
          <img id="imgTaartL11" class="aR-4-3" src="photos/<?php echo $taartL11; ?>" alt="taart" />
          <label for="inputTaartL11">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL11" type="file" name="taart[L11]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR10" class="pe-0 mt--100 position-relative">
          <img id="imgTaartR10" class="aR-4-3" src="photos/<?php echo $taartR10; ?>" alt="taart" />
          <label for="inputTaartR10">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR10" type="file" name="taart[R10]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartL12" class="ps-0 span-2 mt-100 position-relative">
          <img id="imgTaartL12" src="photos/<?php echo $taartL12; ?>" alt="taart" />
          <label for="inputTaartL12">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartL12" type="file" name="taart[L12]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR11" class="pe-0 position-relative">
          <img id="imgTaartR11" class="aR-4-3" src="photos/<?php echo $taartR11; ?>" alt="taart" />
          <label for="inputTaartR11">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR11" type="file" name="taart[R11]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="taartR12" class="pe-0 position-relative">
          <img id="imgTaartR12" class="aR-4-3" src="photos/<?php echo $taartR12; ?>" alt="taart" />
          <label for="inputTaartR12">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputTaartR12" type="file" name="taart[R12]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
      </div>

      <div id="cupcakesCakepops" class="p-side baksels">
        <div id="cupcakesTest" class="ps-0">
          <div id="cupcakesText">
            <h3 class="papyrus">Wat ik maak</h3>
            <h1 class="pb-3">Cupcakes & Cakepops</h1>
            <p class="pb-3">Heerlijk voor bij een kop koffie of thee en erg leuk om te presenteren op een schaal of plateau. De cupcakes kunnen in verschillende smaken gemaakt worden en worden voorzien van een lekkere luchtige toef en decoratie naar keuze.</p>
            <button type="button" class="button darkPink">Bestel nu</button>
          </div>
          <div id="cupcakesL1" class="position-relative">
            <img id="imgCupcakesL1" class="aR-3-2" src="photos/<?php echo $cupcakesL1; ?>" alt="cupcakes" />
            <label for="inputCupcakesL1"> 
              <div class="containerEditButton bottom-0 end-0">
                <?php include "editButton.html"; ?>
              </div>
              <input id="inputCupcakesL1" type="file" name="cupcakes[L1]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
            </label>
          </div>
        </div>
        <div id="cupcakesR1" class="pe-0 position-relative">
          <img id="imgCupcakesR1" class="aR-1-1" src="photos/<?php echo $cupcakesR1; ?>" alt="cupcakes" />
          <label for="inputCupcakesR1"> 
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR1" type="file" name="cupcakes[R1]" onchange="readURL(this)" class="display-none" accept="image/*"/> 
          </label>
        </div>
        <div id="cupcakesR2" class="pe-0 position-relative">
          <img id="imgCupcakesR2" src="photos/<?php echo $cupcakesR2; ?>" alt="cakepops" />
          <label for="inputCupcakesR2"> 
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR2" type="file" name="cupcakes[R2]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL2" class="ps-0 mb--100 position-relative">
          <img id="imgCupcakesL2" src="photos/<?php echo $cupcakesL2; ?>" alt="cupcake" />
          <label for="inputCupcakesL2"> 
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL2" type="file" name="cupcakes[L2]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL3" class="ps-0 mt-100 mb-100 position-relative">
          <img id="imgCupcakesL3" class="aR-1-1" src="photos/<?php echo $cupcakesL3; ?>" alt="cupcakes" />
          <label for="inputCupcakesL3"> 
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL3" type="file" name="cupcakes[L3]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR3" class="pe-0 position-relative">
          <img id="imgCupcakesR3" class="aR-3-2" src="photos/<?php echo $cupcakesR3; ?>" alt="cupcakes" />
          <label for="inputCupcakesR3"> 
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR3" type="file" name="cupcakes[R3]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>

        <div id="cupcakesL4" class="ps-0 mt--100 position-relative">
          <img id="imgCupcakesL4" class="aR-1-1" src="photos/<?php echo $cupcakesL4; ?>" alt="cupcakes" />
          <label for="inputCupcakesL4"> 
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL4" type="file" name="cupcakes[L4]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR4" class="pe-0 mb--100 position-relative">
          <img id="imgCupcakesR4" class="aR-4-3" src="photos/<?php echo $cupcakesR4; ?>" alt="cupcakes" />
          <label for="inputCupcakesR4"> 
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR4" type="file" name="cupcakes[R4]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL5" class="ps-0 position-relative">
          <img id="imgCupcakesL5" class="aR-4-3" src="photos/<?php echo $cupcakesL5; ?>" alt="cupcakes" />
          <label for="inputCupcakesL5"> 
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL5" type="file" name="cupcakes[L5]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR5" class="pe-0 mt-100 mb-100 position-relative">
          <img id="imgCupcakesR5" class="aR-4-3" src="photos/<?php echo $cupcakesR5; ?>" alt="cupcakes" />
          <label for="inputCupcakesR5"> 
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR5" type="file" name="cupcakes[R5]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL6" class="ps-0 mb--100 position-relative">
          <img id="imgCupcakesL6" class="aR-1-1" src="photos/<?php echo $cupcakesL6; ?>" alt="cupcakes" />
          <label for="inputCupcakesL6"> 
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL6" type="file" name="cupcakes[L6]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR6" class="pe-0 mt--100 position-relative">
          <img id="imgCupcakesR6" class="aR-1-1" src="photos/<?php echo $cupcakesR6; ?>" alt="cupcakes" />
          <label for="inputCupcakesR6">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR6" type="file" name="cupcakes[R6]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL7" class="ps-0 mt-100 position-relative">
          <img id="imgCupcakesL7" class="aR-4-3" src="photos/<?php echo $cupcakesL7; ?>" alt="cupcakes" />
          <label for="inputCupcakesL7">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL7" type="file" name="cupcakes[L7]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR7" class="pe-0 mb--100 position-relative">
          <img id="imgCupcakesR7" class="aR-1-1" src="photos/<?php echo $cupcakesR7; ?>" alt="cupcakes" />
          <label for="inputCupcakesR7">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR7" type="file" name="cupcakes[R7]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL8" class="ps-0 position-relative">
          <img id="imgCupcakesL8" class="aR-1-1" src="photos/<?php echo $cupcakesL8; ?>" alt="cupcakes" />
          <label for="inputCupcakesL8">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesL8" type="file" name="cupcakes[L8]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesR8" class="pe-0 mb--100 mt-100 position-relative">
          <img id="imgCupcakesR8" class="aR-1-1" src="photos/<?php echo $cupcakesR8; ?>" alt="cupcakes" />
          <label for="inputCupcakesR8">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR8" type="file" name="cupcakes[R8]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>
        <div id="cupcakesL9" class="ps-0 position-relative">
          <img id="imgCupcakesL9" class="aR-4-3" src="photos/<?php echo $cupcakesL9; ?>" alt="cupcakes" />
          <label for="inputCupcakesL9">
            <div class="containerEditButton b-35px r-35px">
              <?php include "editButton.html"; ?>
            </div>
          </label>
          <input id="inputCupcakesL9" type="file" name="cupcakes[L9]" onchange="readURL(this)" class="display-none" accept="image/*"/>
        </div>
        <div id="cupcakesR9" class="pe-0 mt-100 position-relative">
          <img id="imgCupcakesR9" class="aR-1-1" src="photos/<?php echo $cupcakesR9; ?>" alt="cupcakes" />
          <label for="inputCupcakesR9">
            <div class="containerEditButton end-0 b-35px">
              <?php include "editButton.html"; ?>
            </div>
            <input id="inputCupcakesR9" type="file" name="cupcakes[R9]" onchange="readURL(this)" class="display-none" accept="image/*"/>
          </label>
        </div>

      </div>

      <div id="overMij" class="bgLight">
        <div id="overMijTitel">
          <h3>Even Voorstellen</h3>
          <h1>De Passie achter de Taarten</h1>
          <div></div>
        </div>
        <div id="overMijCard" class="position-relative">
          <div id="overMijText" class="p-sideM">
            <p>
              The Cake Boutique is het resultaat van een veel te leuke hobby die uit de hand is gelopen. In 2020 is het bakken begonnen. Eerst alleen voor familie en vrienden, maar na verloop van tijd kwamen er meer mensen om te bestellen. Het aantal bestellingen bleef met de tijd maar groeien waardoor ik uiteindelijk de stap heb genomen om er een klein eigen bedrijfje van te maken. Mijn taarten en cupcakes maak ik met veel liefde en aandacht en met oog voor detail. Creatief bezig zijn zit in mijn genen en is voor mij een manier van ontspannen.
            </p>
            <div id="overMijTextPart2">
              <p>Ik maak mensen graag blij met mijn creaties en vindt het bijzonder om hiervoor het vertrouwen te krijgen. Ik denk graag mee met het bedenken en creëren van de perfecte taart of cupcakes en leg hierbij graag alle mogelijkheden uit. Heb je vragen of wensen die je graag wilt bespreken? Neem gerust contact op!</p>
              <p>Mijn doel is om de kers op de taart te zijn van jouw feestje of gelegenheid!</p>
              <div id="overMijImgD" style="max-width: 100%;">
                <img id="imgOverMij" class="overMijImg" src="photos/<?php echo $overMij; ?>"/>
                <label class="position-absolute bottom-0 end-0" for="inputOverMij">
                  <div class="pointer">
                    <?php include "editButton.html"; ?>
                  </div>
                </label>
              </div>
            </div>
          </div>
          <div id="overMijImgMTContainer" class="position-relative">
            <img id="overMijImgMT" class="overMijImg" src="photos/<?php echo $overMij; ?>"/>
            <label class="position-absolute bottom-0 end-0" style="z-index: 4;" for="inputOverMij">
              <div id="overEditKnop" class="pointer">
                <?php include "editButton.html"; ?>
              </div>
            </label>
          </div>
          <input id="inputOverMij" type="file" name="overMij" onchange="readURL(this)" class="display-none" accept="image/*"/>
        </div>
      </div>

      <footer id="contact" class="position-relative">
        <div id="shapeSocials" class="position-absolute">
          <h1 class="ms-auto w-fit">Volg mij op de socials</h1>
          <div id="contactSocialGrid" class="contactGrid"> 
            <a style="line-height: 199%;" target="_blank" class="nav-link pointer" href="facebook"> Facebook</a>
            <a class="nav-link pointer" target="_blank" href="facebook">
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="31" viewBox="0 0 33 31" fill="#56423D">
                <path d="M33 15.5943C33 6.97972 25.6149 0 16.5 0C7.38508 0 0 6.97972 0 15.5943C0 23.3776 6.03381 29.8292 13.9219 31V20.1022H9.73034V15.5943H13.9219V12.1585C13.9219 8.25053 16.3836 6.09185 20.154 6.09185C21.9596 6.09185 23.8478 6.39619 23.8478 6.39619V10.2319H21.7667C19.7175 10.2319 19.0781 11.4342 19.0781 12.6672V15.5943H23.6542L22.9224 20.1022H19.0781V31C26.9662 29.8292 33 23.3776 33 15.5943Z"/>
              </svg>
            </a>
            <a style="line-height: 199%;" class="nav-link pointer" target="_blank" href="instagram"> Instagram </a>
            <a class="nav-link pointer" target="_blank" href="instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 30 32" fill="#56423D">
                <path d="M15.0033 7.7956C10.7468 7.7956 7.31344 11.4587 7.31344 16C7.31344 20.5413 10.7468 24.2044 15.0033 24.2044C19.2599 24.2044 22.6933 20.5413 22.6933 16C22.6933 11.4587 19.2599 7.7956 15.0033 7.7956ZM15.0033 21.3339C12.2527 21.3339 10.0039 18.9419 10.0039 16C10.0039 13.0581 12.246 10.6661 15.0033 10.6661C17.7607 10.6661 20.0028 13.0581 20.0028 16C20.0028 18.9419 17.754 21.3339 15.0033 21.3339ZM24.8015 7.46C24.8015 8.52393 23.9983 9.37365 23.0078 9.37365C22.0106 9.37365 21.2142 8.51679 21.2142 7.46C21.2142 6.40321 22.0173 5.54636 23.0078 5.54636C23.9983 5.54636 24.8015 6.40321 24.8015 7.46ZM29.8946 9.40221C29.7808 6.83878 29.232 4.56811 27.4718 2.69731C25.7184 0.826509 23.5901 0.240991 21.1874 0.112462C18.7111 -0.0374874 11.2889 -0.0374874 8.8126 0.112462C6.41662 0.23385 4.28834 0.819368 2.52817 2.69017C0.767987 4.56097 0.225878 6.83164 0.10541 9.39507C-0.0351366 12.037 -0.0351366 19.9558 0.10541 22.5978C0.219186 25.1612 0.767987 27.4319 2.52817 29.3027C4.28834 31.1735 6.40993 31.759 8.8126 31.8875C11.2889 32.0375 18.7111 32.0375 21.1874 31.8875C23.5901 31.7661 25.7184 31.1806 27.4718 29.3027C29.2253 27.4319 29.7741 25.1612 29.8946 22.5978C30.0351 19.9558 30.0351 12.0442 29.8946 9.40221ZM26.6955 25.4326C26.1735 26.8321 25.1629 27.9103 23.8444 28.4744C21.8701 29.3098 17.1852 29.117 15.0033 29.117C12.8215 29.117 8.12995 29.3027 6.1623 28.4744C4.85053 27.9174 3.83993 26.8392 3.31121 25.4326C2.52817 23.3261 2.70887 18.3278 2.70887 16C2.70887 13.6722 2.53486 8.66674 3.31121 6.56744C3.83324 5.16791 4.84384 4.0897 6.1623 3.52561C8.13664 2.69017 12.8215 2.88296 15.0033 2.88296C17.1852 2.88296 21.8767 2.69731 23.8444 3.52561C25.1562 4.08256 26.1668 5.16077 26.6955 6.56744C27.4785 8.67388 27.2978 13.6722 27.2978 16C27.2978 18.3278 27.4785 23.3333 26.6955 25.4326Z"/>
              </svg>
            </a>
          </div>
        </div>
        <div id="shapeContact" class="position-absolute">
          <div id="contactInfoGrid" class="contactGrid">
            <svg xmlns="http://www.w3.org/2000/svg" width="79" height="81" viewBox="0 0 79 81" fill="#56423D" >
              <mask id="mask0_130_48" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="79" height="81" >
                <rect width="79" height="81" fill="#D9D9D9" />
              </mask>
              <g mask="url(#mask0_130_48)">
                <path d="M39.0417 61.8531C44.4729 57.3531 48.5738 53.0219 51.3443 48.8594C54.1148 44.6969 55.5 40.7875 55.5 37.1313C55.5 33.9813 54.9377 31.2953 53.813 29.0734C52.6884 26.8516 51.3031 25.0516 49.6573 23.6734C48.0115 22.2953 46.2285 21.2969 44.3083 20.6781C42.3882 20.0594 40.6326 19.75 39.0417 19.75C37.4507 19.75 35.6951 20.0594 33.775 20.6781C31.8549 21.2969 30.0719 22.2953 28.426 23.6734C26.7802 25.0516 25.395 26.8516 24.2703 29.0734C23.1457 31.2953 22.5833 33.9813 22.5833 37.1313C22.5833 40.7875 23.9686 44.6969 26.7391 48.8594C29.5095 53.0219 33.6104 57.3531 39.0417 61.8531ZM39.0417 70.375C31.3062 64.525 25.5321 58.8438 21.7193 53.3313C17.9064 47.8188 16 42.4188 16 37.1313C16 33.1375 16.6995 29.6359 18.0984 26.6266C19.4974 23.6172 21.2941 21.1 23.4885 19.075C25.683 17.05 28.1517 15.5313 30.8948 14.5188C33.6378 13.5063 36.3535 13 39.0417 13C41.7299 13 44.4455 13.5063 47.1885 14.5188C49.9316 15.5313 52.4003 17.05 54.5948 19.075C56.7892 21.1 58.5859 23.6172 59.9849 26.6266C61.3839 29.6359 62.0833 33.1375 62.0833 37.1313C62.0833 42.4188 60.1769 47.8188 56.3641 53.3313C52.5512 58.8438 46.7771 64.525 39.0417 70.375ZM39.0417 43.375C40.8521 43.375 42.4019 42.7141 43.6911 41.3922C44.9804 40.0703 45.625 38.4813 45.625 36.625C45.625 34.7688 44.9804 33.1797 43.6911 31.8578C42.4019 30.5359 40.8521 29.875 39.0417 29.875C37.2312 29.875 35.6814 30.5359 34.3922 31.8578C33.103 33.1797 32.4583 34.7688 32.4583 36.625C32.4583 38.4813 33.103 40.0703 34.3922 41.3922C35.6814 42.7141 37.2312 43.375 39.0417 43.375ZM16 80.5V73.75H62.0833V80.5H16Z"  /> <!-- fill="#1C1B1F" -->
              </g>
            </svg>
            <div>
              Plaats
            </div>
            <a style="max-width: none !important;" href="mailto:mail@mail.mail">
              <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="#56423D" >
                <mask id="mask0_130_54" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="80" height="80" >
                  <rect width="80" height="80" fill="#D9D9D9" />
                </mask>
                <g mask="url(#mask0_130_54)">
                  <path d="M13.3334 66.6668C11.5001 66.6668 9.93064 66.0141 8.62508 64.7085C7.31953 63.4029 6.66675 61.8335 6.66675 60.0002V20.0002C6.66675 18.1668 7.31953 16.5974 8.62508 15.2918C9.93064 13.9863 11.5001 13.3335 13.3334 13.3335H66.6667C68.5001 13.3335 70.0695 13.9863 71.3751 15.2918C72.6806 16.5974 73.3334 18.1668 73.3334 20.0002V60.0002C73.3334 61.8335 72.6806 63.4029 71.3751 64.7085C70.0695 66.0141 68.5001 66.6668 66.6667 66.6668H13.3334ZM40.0001 43.3335L13.3334 26.6668V60.0002H66.6667V26.6668L40.0001 43.3335ZM40.0001 36.6668L66.6667 20.0002H13.3334L40.0001 36.6668ZM13.3334 26.6668V20.0002V60.0002V26.6668Z" />
                </g>
              </svg>
            </a>
            <a class="nav-link h-fit m-auto" href="mailto:mail@mail.mail">mail<br id="contactMailBr">@mail.mail</a>
          </div>
        </div>
        <img id="contactLogo" src="logo/logoMain.svg" alt="cake-logo" />
        <div id="contactForm" class="p-sideTM">
          <div>
            <h1>Contact</h1>
            <div style="color: #85726a;" class="pb-2">Wil je een bestelling plaatsen? Plaats deze dan minimaal 2 weken van te voren. Helaas kan het ook dan nog voorkomen dat de agenda vol zit. Heb je de bestelling toch eerder nodig? Vragen mag altijd, wellicht is er nog ruimte voor.</div>
          </div>
          <div class="">
            <div>Naam</div>
            <input type="text" class="form-control" />
            <div>Email</div>
            <input type="email" class="form-control" />
            <div>Bericht</div>
            <textarea class="form-control"></textarea>
          </div>
          <button type="button" class="button darkPink">Verstuur</button>
        </div>
      </footer>

      <button type="button" onclick="document.getElementById('removePopUp').classList.remove('display-none')" class="button lightPink position-fixed flex" style="bottom:130px; right: 20px; z-index: 5;">
        <svg style="height: 100%; padding: 7px; fill: #56423D;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/></svg>
        <div class="m-auto">Foto's resetten</div>
      </button>
      <button type="submit" class="button lightPink position-fixed flex" style="bottom:20px; right: 20px; z-index: 5; height: 100px !important; width: 250px !important;">
        <svg class="m-auto" style="height: 50%; fill: #56423D;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-242.7c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32L64 32zm0 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32L96 224c-17.7 0-32-14.3-32-32l0-64zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
        <div class="m-auto">Wijzigingen opslaan</div>
      </button>

      <div id="refreshPopUp" class="display-none position-fixed top-0 start-0 " style="z-index: 7;">
        <div class="h-screen w-screen opacity-50" style="background: gray;" onclick="this.parentElement.classList.add('display-none')"></div>
        <div class="position-fixed p-5 m-auto top-0 bottom-0 start-0 end-0 h-fit w-fit" style="background-color: #DCCCBF; border-radius: 50px;">
          <h2 class="raleway textDark">Weet je zeker dat je opnieuw wil beginnen?</h2>
          <p>De aanpassing die nu zijn gedaan worden verworpen</p>
          <div class="flex flex-col-Mb">
            <button onclick="window.location.reload();" type="button" class="button lightPink">Ja</button>
            <button onclick="document.getElementById('refreshPopUp').classList.add('display-none')" type="button" class="button lightPink">Nee</button>
          </div>
        </div>
      </div>

      <div id="removePopUp" class="display-none position-fixed top-0 start-0 " style="z-index: 7;">
        <div class="h-screen w-screen opacity-50" style="background: gray;" onclick="this.parentElement.classList.add('display-none')"></div>
        <div class="position-fixed p-5 m-auto top-0 bottom-0 start-0 end-0 h-fit w-fit" style="background-color: #DCCCBF; border-radius: 50px;">
          <h2 class="raleway textDark">Weet je zeker dat je alle foto's wil resetten?</h2>
          <p>De foto's worden overschreven met de backup en alle aanpassingen worden verworpen</p>
          <div class="flex flex-col-Mb">
            <button onclick="window.location.href='resetPhotos';" type="button" class="button lightPink">Ja</button>
            <button onclick="document.getElementById('removePopUp').classList.add('display-none')" type="button" class="button lightPink">Nee</button>
          </div>
        </div>
      </div>
    </form>
  </body>
  <script src="bootstrap/bootstrap.bundle.min.js"></script>
  <style>
    .baksels:after {
      display: none;
    }
    .containerEditButton {
      position: absolute;
      cursor: pointer;
    }
    label:has(.containerEditButton) {
      display: block;
    }
    #containerEditButtonFold {
      right: 10%;
    }
    .b-35px {
      bottom: 35px;
    }
    .r-35px {
      right: 35px;
    }
    #refreshButton{
      top: 20px; 
      left: 20px; 
      z-index: 5;
    }
    @media screen and (max-width: 1333px){
      #refreshButton{
        top: 115px;
      }
    }
    @media screen and (min-width: 769px) {
      #overEditKnop {
        display: none;
      }
    }
    @media screen and (max-width: 768px) {
      .b-35px {
        bottom: 15px;
      }
      .r-35px {
        right: 15px;
      }
    }
    @media screen and (max-width: 576px) {
      #containerEditButtonFold {
        right: 0px;
      }
      .b-35px {
        bottom: 0px;
      }
      .r-35px {
        right: 0px;
      }
      .flex-col-Mb {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    function readURL(input) {
      const [file] = input.files
      var img = document.getElementById(input.id.replace('input','img'))
      if (file) {
        if(file.size > 700000){
          alert("Bestand te groot. Bestand mag niet groter zijn dan 700kB")
        }else{
          img.src = URL.createObjectURL(file)
          if(input.name == "overMij"){
            document.getElementById("overMijImgMT").src = URL.createObjectURL(file);
          }
        }
      }
    }
    const hamburger = document.getElementById('hamburger');
    const hamburgerBars = hamburger.querySelectorAll('.hamburgerBar')
    const navMenu = document.getElementById('navMenuMT')
    function openHamburger(){
      if(window.innerWidth > 1000){
        return
      }
      navMenu.classList.add('active');
      hamburgerBars.forEach(bar => {
        bar.classList.add('change');
      });
    }
    function closeHamburger(){
      navMenu.classList.remove('active');
      hamburgerBars.forEach(bar => {
          bar.classList.remove('change');
      });
    }
  </script>
</html>
