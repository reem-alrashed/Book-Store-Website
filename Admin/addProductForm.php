<?php include("adminnav.html"); ?>
<html>
<head>
<title>Book Store</title>
<link href="../css/formstyle.css" rel="stylesheet">
<style>
body{
text-align:center;
}
</style>
</head>
<body>
  <br/><br/>
<h1>Add Book page</h1>
<form name="AddBookForm" method="POST" action="addproduct.php">
<fieldset>
<legend >Book adding form</legend>
Book id : <input name="bookid" type="text"> <br/><br/>
Book name:
<input name="bookname" type="text"> <br/><br/>
Book price: <input type="text" name="price"><br/><br/><br/><br/>
Book Picture URL : <input type="url" name="pic" id="picurl" width="50%"><br/><br/><br/><br/>
<input type="submit" value="Add Book"><br/><br/>
<input type="reset" value="Reset"><br/><br/>
</fieldset>
</form>
</body>
</html>
