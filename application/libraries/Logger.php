<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  Class Logger {
        function user_log($user, $message) {
          $this->load->model('Model_logger', 'log');
          
          $Date = date("Y/m/d");

          $Filepath =  './application/logs/log-'. $Date .'.php';

          if(! file_exists($Filepath)) {
            // Write file name to database
            $this->log->Insert($Filepath);

            // File doesn't exists so we need to first write it.
            $Fileheader = "<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>\n\n";
            $LogMessage = '['. date("h:i:sa"). ']: '. $user .' --> '. $message ."\n";

            // Open the log file
            $Logfile = fopen($Filepath, "a");

            // Write to the file.
            fwrite($Logfile, $Fileheader);
            fwrite($Logfile, $LogMessage);
            // Close file
            fclose($Logfile);

            return TRUE;
          } else {
            // The file exists sp we are write te log message only.
            $LogMessage = '['. date("h:i:sa"). ']: '. $user .' --> '. $message ."\n";

            // Open the log file
            $Logfile = fopen($Filepath, "a");

            // Write to the file.
            fwrite($Logfile, $LogMessage);
            // Close file
            fclose($Logfile);
          }
       }
    }
