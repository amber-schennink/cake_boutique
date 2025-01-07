<?php 
session_start();
if (isset($_SESSION['valid']) && $_SESSION['valid'] == true && $_SESSION['username'] == 'userCakeBoutique') {}else {
  header("Location: login");
  echo "<script>window.location.href='login';</script>";
  exit;
}

include "loading.html";


$changedImgs = [];

//check of de bestanden zijn overgekomen
if(!isset($_FILES) || count($_FILES) == 0){
  echo "<script>
  alert('Error: Te veel/te grote bestanden. Probeer het opnieuw.');
  window.location.href='editImgs.php';
  </script>";
  die();
};

//check de bestanden en zet ze is $changedImgs
foreach ($_FILES as $type => $file) {
  if(!is_array($file['name'])){
    if($file['name'] != ''){
      $newName = checkImg($file);
      if($newName !== false){
        if(isset($newName) && !$newName == ''){
          $file['name'] = $newName;
        };
        $newName = '';
        $changedImgs[$type] = $file;
      }
    }
  }else{
    foreach ($file['name'] as $key => $value) {
      $newFile = [
        'name' => $file['name'][$key], 
        'full_path' => $file['full_path'][$key], 
        'type' => $file['type'][$key],
        'tmp_name' => $file['tmp_name'][$key],
        'error' => $file['error'][$key],
        'size' => $file['size'][$key]
      ];
      if($newFile['error'] != 4){
        $newName = checkImg($newFile);
        if($newName !== false){
          if(isset($newName) && !$newName == ''){
            $newFile['name'] = $newName;
          };
          $newName = '';
          $changedImgs[$type . $key] = $newFile;
        }
      }
    }
  }
}

//function om de bestanden te checken en uploaden
function checkImg($file){
  $name = $file['name'];
  $target_dir = "photos/";
  $target_file = $target_dir . basename($name);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check of het bestand een foto is
  $check = getimagesize($file["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
  // Check bestands grote
  if ($file["size"] > 700000) {
    $uploadOk = 0;
  }
  // Check of het bestand bestaat en zo ja voeg een random nummer aan de bestandsnaam toe
  if(file_exists($target_file)){
    $newName = pathinfo($target_file)['filename'] . '(' . rand(0, 100) . ').' . pathinfo($target_file)['extension'] ;
    $target_file = $target_dir . '/'  . $newName;
  }
  // Check of er een error is
  if ($uploadOk == 0) {
    return false;
  // als alles klopt probeer bestand te uploaden
  } else {
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
      echo "<script>console.log('Het bestand ". htmlspecialchars( pathinfo($target_file)['basename']). " is geüploaded.' );</script>";
    } else {
      return false;
    }
  }
  if(isset($newName)){
    return $newName;
  }
}

//haal imgs.php op
$imgsFile = "imgs.php";
$lines = file($imgsFile);

//vervang lijnen van imgs.php met namen van nieuwe fotos en de oude fotos verwijderen
foreach ($lines as $key => $line) {
  if(str_contains($line, "<?php") == false && str_contains($line, "?>") == false){
    $lineParts = explode(' ', trim($line ));
    $value = ltrim($lineParts[0], '$');
    $oGImgName = trim(array_pop($lineParts), '";');
    if(array_key_exists($value, $changedImgs)){
      $line = '  $' . $value . ' = "' . $changedImgs[$value]['name'] . '";
';
      $lines[$key] = $line;

      if (file_exists('photos/' . $oGImgName)) {
        unlink('photos/' . $oGImgName);
      }

    }
  }
}
//verwijder overige fotos
$imgs = scandir('photos/');
if(count($imgs) > 47){
  foreach ($imgs as $image) {
    $partOfArray = false;
    if($image == "." || $image == ".."){
      continue;
    }
    foreach ($lines as $line) {
      if(strpos($line, $image) !== FALSE){
        $partOfArray = true;
        break;
      }
    }
    if($partOfArray == false && file_exists('photos/' . $image)){
      unlink('photos/' . $image);
    }
  }
}
//aangepaste lijnen in img.php zetten
file_put_contents('imgs.php', $lines);

header('Location: /');
echo "<script>window.location.href='/';</script>";
?>