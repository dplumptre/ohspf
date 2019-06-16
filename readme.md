# OH PHP SIMPLE FRAMEWORK

OH will solve your problem of connection to database and running queries in php.

You need to be familiar with php PDO

## Features

- Very flexibe
- Very light

## Installation

- Simple download and add into your site folder
-

## Contribute

- Issue Tracker: github.com/$project/$project/issues
- Source Code: github.com/$project/$project

## Support

If you are having issues, please let us know at: info@overallheuristic.com

## License

## Sample Code

## To connect to database

- check api/constant and edit

   - define("LOCALITY","localhost");
   - define("TAPROOT","root");
   - define("PASSMEURLUV","mypassword");
   - define("MTVBASE","mysite");

- update api/config

   - define("SITE_NAME",""); ----> name of site
   - define("SITE_EMAIL",""); ----> email of the site eg info@mysite.com
   - define("ADMIN_EMAIL",""); -----> the email to receive alert
   - define("BASE_PATH","http://localhost/fr/"); ----> base url would be changed to https/domain.org depending on the site you are working on

- Add the following below at the top of the page you want to do any interaction with database

   - include("api/config.php");  
   - require("api/class.phpmailer.php");
   - require("api/redirecting.php"); // for redirection
   - include("api/portal.php"); // connecions happens here

## REDIRECT

**check redirection class
\$redirect = new redirecting;

*Eg
**$redirect->confirmed_logged_in($\_SESSION['user_id'],BASE_PATH); \* to redirect to login
\$redirect->redirect('contact'); // this will redirect me to contact page

## PDO STATEMENTS

THE QUERIES ARE NORMAL SQL STATEMENTS JUST MAKE SURE YOU USE

$conn->prepare  OR $conn-> However, this can be changed in portal.php

##SELECT

\$url_id = 3;

**$query = $conn->prepare("SELECT \* FROM users where id = $url_id LIMIT 1");
 $query->execute();
$sql = $query->fetch(PDO::FETCH_ASSOC);

view like this

 <?php echo $sql['username'];?>

## DELETE

**$del =  $\_GET['dels'] ; ---> the delete id
$query1 = $conn->prepare("DELETE FROM transactions WHERE users_id = :regid "); <----> transactions is the table name here
$query1->bindValue(':regid',$del); <---> delele id comes here
\$query1->execute();

check out PDO SCRIPTS FOR UPDATE AND INSERT

https://www.php.net/manual/en/class.pdostatement.php

https://phpdelusions.net/pdo

https://websitebeaver.com/php-pdo-prepared-statements-to-prevent-sql-injection`
