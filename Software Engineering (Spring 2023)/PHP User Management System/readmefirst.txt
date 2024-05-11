**NOTE: Written 4/26/2023 for my group to understand the files attached. Their current implementation of a user management system for a website needed to be completely replaced. I made the following PHP code which ended up being successful over the course of 2 days. Was also done with Bootstrap

Rehaul of the user mgmt system - Jeremiah Garcia
Purpose is to provide a solution to troubles with using restful for fetching and displaying information from the database on the website. will also be making sure that proper user information is displayed (the one logged in respectively)
will support adding and deleting users
when testing, remove all html files with the same names as the php files. the php files will ideally be replacements of the html files altogether as theyll have the html code in them 

important notes about the files:
database is configured from the file "/config/config.php" make sure the information is correct when testing

possible issues:
header formatter issues. see inc/header.php
- this can be solved by filling in the header php file with a common header for each page to dynamically allocated rather than be manually done so

only file not overhauled is index.php. will be another beast to add meal information to users but if this user mgmt system works then it should be relatively quick to add those functions. see line 18 of index.php for more information