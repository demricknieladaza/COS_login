<?php

header('Access-Control-Allow-Origin: *');

   // Define database connection parameters
   $hn      = 'localhost';
   $un      = 'root';
   $pwd     = '';
   $db      = 'cos_login_db';
   $cs      = 'utf8';

   // Set up the PDO parameters
   $dsn  = "mysql:host=" . $hn . ";port=3306;dbname=" . $db . ";charset=" . $cs;
   $opt  = array(
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                       );
   // Create a PDO instance (connect to the database)
   $pdo  = new PDO($dsn, $un, $pwd, $opt);

   // Retrieve specific parameter from supplied URL
   $key  = strip_tags($_REQUEST['key']);
   $data    = array();


   // Determine which mode is being requested
   switch($key)
   {

      // Add a new record to the technologies table
      case "send":

         // Sanitise URL supplied values
         $uname       = filter_var($_REQUEST['uname'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $msg       = filter_var($_REQUEST['msg'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

         // Attempt to run PDO prepared statement
         try {
            $sql  = "INSERT INTO chat(username, msg) VALUES(:uname, :msg)";
            $stmt    = $pdo->prepare($sql);
            $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
            $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
            $stmt->execute();

            $stmt    = $pdo->prepare("SELECT * FROM chat");
            $stmt->execute();
            while($row  = $stmt->fetch(\PDO::FETCH_ASSOC))
               {
                  echo "<span>" . $row['username'] . "</span>: <span>" . $row['msg'] . "</span><br />";
               }
         }
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;
  }