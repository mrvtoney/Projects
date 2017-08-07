# Config_File_Parser

In order to read from the config file you will need to use the following command via command line:
   - php Config_File_Parser.php -f "{directory_file_name}" -c "{config_name}"
   
Some considerations:
   - I did not take into consideration comments that are inline with a config setting
   - Boolean values when printed via command line are 1 or ''. I didnt know if you wanted the string "true"/"false"
     so that the result is more explicit
   - Some of the outputs are exceptions that are thown while others are simple text to explain a particular issue that is 
     easily corrected.
