md5forced 0.1b
31 Janvier 2006
par Vincent A. Menard

You should first create your mysql tables: 6 tables (t1, t2, t3, t4, t6). Each table must have 2 fields name 'str' and 'hash' and should be varchar(255) type. The script will use different tables to place hashes from different string lenght. For example, 'ostie' will be inserted in the in t5 because of lenght of 5 chars. 

You should then change the mysql db_name, user and passwd in the file sql_class.php

To start the script simply type: 'php md5forced.php'
You must have php installed as well a mysql running somewhere. If you dont know how to create a table on mysql, look on mysql.com or dont run this script.

Feel free to modify or distributed.
cheers,

thabob - gmail.com