<?php include_once('vegerne.php');
      ?><center>
<h1>text Decryption by vegerne cipher</h1>
      <br>Enter Password (Use just a-z alphabets with no special characters)<br><form action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
        <input type='text' name='pass'/>
        <p>Enter Data</p>
        <textarea name='data' rows="12" cols="45"></textarea>
        <p><input type="submit" value='Decript'/></p>
<p> 
        <textarea name='encdata' rows="12" cols="45">
<?php 
    if(!empty($_POST))
     {
       $p=vegerne_decipher($_POST['data'],$_POST['pass']);
       echo $p;
     }  
?>
        </textarea>