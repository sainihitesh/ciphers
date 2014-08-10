<?php 
//function vegerne cipher or multi shift cipher
function vegerne_cipher($str,$str_passwd)
{  
  
  if(preg_match("/[^a-zA-Z]/", $str_passwd))
  {
    return null;
  }
  else
  {
  $str_password=strtolower($str_passwd);
  $pass_arr=array();
  $pass_arr_num=array();
  $alpha=array('a'=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5','f'=>'6','g'=>'7','h'=>'8','i'=>'9','j'=>'10','k'=>'11','l'=>'12','m'=>'13','n'=>'14','o'=>'15','p'=>'16','q'=>'17','r'=>'18','s'=>'19','t'=>'20','u'=>'21','v'=>'22','w'=>'23','x'=>'24','y'=>'25','z'=>'26');
  $one_str_pass=strlen($str_password)-1;
  $one_str=strlen($str)-1;
  $alpha_num=array_keys($alpha);
  $match_num=array(); 
  $nums=array_flip($alpha);     
  $encoded=array();
  $string=strtolower($str);
  if(is_array($string)==true)
     {
      throw new Exception("Can't use array as string");     
     }
  if(strlen($str_password)>0)
     {
      for ($b=0; $b <strlen($str) ; $b++) 
      { 
      	 $p=$b;
      	if($p>$str_password)
      	{
           $p=$b%strlen($str_password);
           
        }

       $pass_arr[$b]=$str_password[$p];	
       $pass_arr_num[$b]=$alpha[$pass_arr[$b]];
      }
      
     for ($i=0; $i <count($pass_arr_num) ; $i++)
     { 
        for ($j=0; $j <26 ; $j++)
            {
             $match=preg_match("/".$alpha_num[$j]."/",$string[$i]);
             if($match==1)
               {
              
              $match_num[$i]=$alpha[$alpha_num[$j]];
              $match_num[$i]+=$pass_arr_num[$i];
                     if($match_num[$i]>26)
                     {
                      $match_num[$i]=$match_num[$i]-26;
                     }
              $encoded[$i]=$nums[$match_num[$i]];

               }
              
             

             } 
        $matchtwo=preg_match('/[^a-z]/',$string[$i]);
       if($matchtwo==1)
       {
        
        $encoded[$i]=$string[$i];
       }

  }  
     
     }
    $enc=implode("",$encoded);
    return $enc;
  } 
}
//function for vegerne decipher
function vegerne_decipher($str,$str_passwd)
{
  if(preg_match("/[^a-zA-Z]/", $str_passwd))
  {
    return null;
  }
  else
  {
  $str_password=strtolower($str_passwd);
  $pass_arr=array();
  $pass_arr_num=array();
  $alpha=array('a'=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5','f'=>'6','g'=>'7','h'=>'8','i'=>'9','j'=>'10','k'=>'11','l'=>'12','m'=>'13','n'=>'14','o'=>'15','p'=>'16','q'=>'17','r'=>'18','s'=>'19','t'=>'20','u'=>'21','v'=>'22','w'=>'23','x'=>'24','y'=>'25','z'=>'26');
  $one_str_pass=strlen($str_password)-1;
  $one_str=strlen($str)-1;
  $alpha_num=array_keys($alpha);
  $match_num=array(); 
  $nums=array_flip($alpha);     
  $encoded=array();
  $string=strtolower($str);
  if(is_array($string)==true)
     {
      throw new Exception("Can't use array as string");     
     }
  if(strlen($str_password)>0)
     {
      for ($b=0; $b <strlen($str) ; $b++) 
      { 
      	 $p=$b;
      	if($p>$str_password)
      	{
           $p=$b%strlen($str_password);
           
        }

       $pass_arr[$b]=$str_password[$p];	
       $pass_arr_num[$b]=$alpha[$pass_arr[$b]];
      }
      
     for ($i=0; $i <count($pass_arr_num) ; $i++)
     { 
        for ($j=0; $j <26 ; $j++)
            {
             $match=preg_match("/".$alpha_num[$j]."/",$string[$i]);
             if($match==1)
               {
              
              $match_num[$i]=$alpha[$alpha_num[$j]];
              $match_num[$i]-=$pass_arr_num[$i];
                     if($match_num[$i]<1)
                     {
                      $match_num[$i]=26+$match_num[$i];
                     }
              $encoded[$i]=$nums[$match_num[$i]];
             
               }
              
             

             } 
        $matchtwo=preg_match('/[^a-z]/',$string[$i]);
       if($matchtwo==1)
       {
        
        $encoded[$i]=$string[$i];
       }

  }  
     
     }
    $enc=implode("",$encoded);
    return $enc;
  }  
}
