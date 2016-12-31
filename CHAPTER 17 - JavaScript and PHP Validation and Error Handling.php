<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 17 - JavaScript and PHP Validation and Error Handling</title>
<style>
      .signup {
        border:1px solid #999999;
        font:  normal 14px helvetica;
        color: #444444;
      }
    </style>

    <script>
      function validate(form)
      {
        fail  = validateForename(form.forename.value)
        fail += validateSurname(form.surname.value)
        fail += validateUsername(form.username.value)
        fail += validatePassword(form.password.value)
        fail += validateAge(form.age.value)
        fail += validateEmail(form.email.value)

        if   (fail == "")   return true
        else { alert(fail); return false }
      }

      function validateForename(field)
      {
        return (field == "") ? "No Forename was entered.\n" : ""
      }
      
      function validateSurname(field)
      {
        return (field == "") ? "No Surname was entered.\n" : ""
      }

      function validateUsername(field)
      {	  
        /*if (field == "") return "No Username was entered.\n"
        else if (field.length < 5)
          return "Usernames must be at least 5 characters.\n"
        else if (/[^a-zA-Z0-9_-]/.test(field))
          return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"*/
        return ""
      }

      function validatePassword(field)
      {
        if (field == "") return "No Password was entered.\n"
        else if (field.length < 6)
          return "Passwords must be at least 6 characters.\n"
        else if (! /[a-z]/.test(field) ||
                 ! /[A-Z]/.test(field) ||
                 ! /[0-9]/.test(field))
          return "Passwords require one each of a-z, A-Z and 0-9.\n"
        return ""
      }

      function validateAge(field)
      {
        if (isNaN(field)) return "No Age was entered.\n"
        else if (field < 18 || field > 110)
          return "Age must be between 18 and 110.\n"
        return ""
      }

      function validateEmail(field)
      {
        if (field == "") return "No Email was entered.\n"
          else if (!((field.indexOf(".") > 0) &&
                     (field.indexOf("@") > 0)) ||
                     /[^a-zA-Z0-9.@_-]/.test(field))
            return "The Email address is invalid.\n"
        return ""
      }
    </script>
</head>

<body>

<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 17 - JavaScript and PHP Validation and Error Handling</b><br><br>
  
  <b>Example 17-1:</b><br>
  <!--A form with JavaScript validation (part one)-->
  
    <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
      <th colspan="2" align="center">Signup Form</th>
      <form method="post" action="CHAPTER 17 - JavaScript and PHP Validation and Error Handling (adduser).php" onsubmit="return validate(this)">
        <tr><td>Forename</td>
          <td><input type="text" maxlength="32" name="forename"></td></tr>
        <tr><td>Surname</td>
          <td><input type="text" maxlength="32" name="surname"></td></tr> Enter wrong Username
        <tr><td>Username</td>
          <td><input type="text" maxlength="16" name="username"></td></tr>
        <tr><td>Password</td>
          <td><input type="text" maxlength="12" name="password"></td></tr>
        <tr><td>Age</td>
          <td><input type="text" maxlength="3"  name="age"></td></tr>
        <tr><td>Email</td>
          <td><input type="text" maxlength="64" name="email"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Signup"></td></tr>
      </form>
    </table>
    
 <script>
//  Using Regular Expressions in JavaScript
document.write("<br>")
document.write(/cats/i.test("Cats are funny. I like cats.")+"<br>")
document.write("Cats are friendly. I like cats.".replace(/cats/gi,"dogs")+"<br><br>")
</script>

<?php
$n = preg_match("/cats/i", "Cats are crazy. I like cats.");
echo $n."<br>";

$n = preg_match("/cats/i", "Cats are curious. I like cats.", $match);
echo "$n Matches: $match[0]<br>";

$n = preg_match_all("/cats/i", "Cats are strange. I like cats.", $match);
echo "$n Matches: ";
for ($j=0 ; $j < $n ; ++$j) echo $match[0][$j]." ";
echo $n."<br>";

echo preg_replace("/cats/i", "dogs", "Cats are furry. I like cats.");




?>


  
</body>
</html>

