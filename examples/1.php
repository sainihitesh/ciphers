<?php include_once('vegerne.php');
      ?><center>
<h1>text encryption by vegerne cipher</h1>
      <br>Enter Password (Use just a-z alphabets with no special characters)<br><form action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
        <input type='text' name='pass'/>
        <p>Enter Data</p>
        <textarea name='data' rows="12" cols="45"></textarea>
        <p><input type="submit" value='Encript'/></p>
<p> 
        <textarea name='encdata' rows="12" cols="45">
<?php 
    if(!empty($_POST))
     {
       $p=vegerne_cipher($_POST['data'],$_POST['pass']);
       echo $p;
     }	
?>
        </textarea>