<?php
  #intestazione corse cross orgin resource sharing
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  require ('../config/database.php');
  require('../class/contatto.php');
  $database = new Database();
  $db = $database->getConnection();
  $dbase = new Utente($db);
  if(!isset($_GET['action'])) $_GET['action']="";
  switch ($_GET['action']) {
    case 'getUtenti':
      echo (json_encode($dbase->getUtenti()));
      break;
    case 'getUtente':
      echo(json_encode($dbase->getUtente($_GET['id'])));
      break;
    case 'deleteUtente':
      $dbase->deleteUtente($_GET['id']);
      break;
    case 'createUtente':
      $dbase->createUtente("Diego", "Mago", "3336669991");
      break;
    case 'updateUtente':
      $dbase->updateUtente(3, "Federico", "Ferrulli", "3336669991");
      break;
    default:
      echo "Metodo non riconosciuto";
      break;
  }
