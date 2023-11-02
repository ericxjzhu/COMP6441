# Natas 15

Link: http://natas15.natas.labs.overthewire.org/

![Alt text](../images/natas15/defaultPage.png)

Viewing the page we see that this time there is only a username this time. Playing around with it we determine that natas16 is a valid username.

![Alt text](../images/natas15/sourceCode.png)

Viewing the source code, we see that the code is similar to natas14 except this time there we only see if the user exists or not, so even if we were to get a user, there would be no way of getting the password.

However the same vulnerabilities as natas14 exists, a SQL injection is possible. Except this time, we would need to perform a [blind SQL injection](https://owasp.org/www-community/attacks/Blind_SQL_Injection). This is a type of SQL injection where the attacker asks the database true or false questions and determines the answer based on the response. It is used, if a website is configured to show error messages but hasn't been adequately coded to deal with SQL injections as can be seen in our source code.

Referencing [this](https://www.exploit-db.com/docs/english/17397-blind-sql-injection-with-regular-expressions-attack.pdf) article's section on Exporting a value with Regexp attack (MSSQL) on page 7, we can construct a query that will perform something similar.

The username that we add is `natas16" AND password LIKE BINARY "a%"#` where a is the character that we want to search for in the password. The `LIKE` operator is used in a `WHERE` clause to search for a pattern in a column. The wildcard `%` is used to represent zero, one or multiple characters. The `BINARY` function is necessary to ensure case-sensitive comparison. MySQL performs case-insensitive comparisons on its values by default. Thus the query being run will tell use whether or not a natas16 is a username `AND` if there is a password that starts with the letter a. Intercepting the request we see the following query being exectued.

![Alt text](../images/natas15/debug.png)

This tells us that the first character is not a. By repeating this we eventually can find the the first letter is T. This seems like a very tedious task to do manually. Thus I wrote up a python script that will do it for me. It will match each alphanumeric character until it finds the correct one, adding it to our password and continue to do so until it constructs the whole password.

Running the script takes a while but we eventually get our password below.

Password: TRD7iZrd5gATjj9PkPEuaOlfEjHqj32V