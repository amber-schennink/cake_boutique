<?php 
session_start();
if (isset($_SESSION['valid']) && $_SESSION['valid'] == true && $_SESSION['username'] == 'userCakeBoutique') {}else {
  header("Location: login");
  echo "<script>window.location.href='login';</script>";
  exit;
}

include "loading.html";

//maak backup van images en lijst imgs.php
if(is_file('imgs.php')){
  if(is_file('backup/imgs.php')){
    unlink('backup/imgs.php');
  }
  rename('imgs.php', 'backup/imgs.php');
}
if(is_dir('photos')){
  if(is_file('backup/photos')){
    unlink('backup/photos');
  }else if(is_dir('backup/photos')){
    $files = scandir('backup/photos');
    foreach ($files as $file) {
      if ($file === '.' || $file === '..') {
        continue;
      }
      unlink('backup/photos/'. $file);
    }
    rmdir('backup/photos');
  } 
  rename('photos', 'backup/photos');
}

//copy orgineel en als succesvol verwijder de backups
try {
  if(copy('imgs-backup.php', 'imgs.php')){
    if(is_file('backup/imgs.php')){
      unlink('backup/imgs.php');
    }
  }
  if(is_dir('photos-backup')){
    mkdir('photos');

    $files = scandir('photos-backup');
    foreach ($files as $file) {
      if ($file === '.' || $file === '..') {
        continue;
      }
      copy('photos-backup/'. $file,'photos/'. $file);
    }
    if(is_file('backup/photos')){
      unlink('backup/photos');
    }else if(is_dir('backup/photos')){
      $files = scandir('backup/photos');
      foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
          continue;
        }
        unlink('backup/photos/'. $file);
      }
      rmdir('backup/photos');
    } 
  }
} catch (\Throwable $th) {
  echo 'ERROR';
}
  

header('Location: /');
echo "<script>window.location.href='/';</script>";

?>