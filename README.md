# phpfirewall
Firewall build in php to protect from some common attacks like SQL injection 
it will help to protect from SQL injections which generally executes queries to get into the databases,associated with the web application.
common sql attacks are like:
*by giving invalid or unwanted input in the text areas
1. ' 1 or '1=1' select * from * order by 1
2. ' 1 or '1=1' UNION select * from information_schema tables#
3. ' 1 or '1=1' UNION select null, column_name from information_schema.columns where table_name = "users"#  
and so many.
