 <center>
 <h2>Encode And Decode</h2>
 <form method="post">
 <br>
 <textarea class='form-control con7' cols='60' rows='10' name="code"></textarea>
 <br><br>
 <select class='form-control con7' size="1" name="ope">
 <center>
 <option value="">Select</option>
 <option value="urlencode">url</option>
 <option value="base64">base64</option>
 <option value="ur">convert_uu</option>
 <option value="json">json</option>
 <option value="gzinflates">gzinflate - base64</option>
 <option value="str2">str_rot13 - base64</option>
 <option value="gzinflate">str_rot13 - gzinflate - base64</option>
 <option value="gzinflater">gzinflate - str_rot13 - base64</option>
 <option value="gzinflatex">gzinflate - str_rot13 - gzinflate - base64</option>
 <option value="gzinflatew">str_rot13-convert_uu-url-gzinflate-str_rot13-base64-convert_uu-gzinflate-url-str_rot13-gzinflate-base64</option>
 <option value="str">str_rot13 - gzinflate - str_rot13 - base64</option>
 <option value="hub">htmlspecialchars - url - base64</option>
 <option value="bgg">gzun - gzun - gzinflate - gzinflate - gzinflate - base64</option>
 <option value="url">base64 - gzinflate - str_rot13 - convert_uu - gzinflate - base64</option>
 </center>
 </select>
 &nbsp;<br><br><input class='kntd' type='submit' name='submit' value='Encode'>
 <input class='kntd' type='submit' name='submits' value='Decode'>
 </form>
 <br>
 <?php

 @ini_set('output_buffering',0); 
 @ini_set('display_errors', 0);
 $text = $_POST['code'];
 $submit = $_POST['submit'];
 if (isset($submit)){
 $op = $_POST["ope"];
 switch ($op) {case 'base64': $codi=base64_encode($text);
 break;case 'str' : $codi=(base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
 break;case 'json' : $codi=json_encode(utf8_encode($text));
 break;case 'gzinflate' : $codi=base64_encode(gzdeflate(str_rot13($text)));
 break;case 'gzinflater' : $codi=base64_encode(str_rot13(gzdeflate($text)));
 break;case 'gzinflatex' : $codi=base64_encode(gzdeflate(str_rot13(gzdeflate($text))));
 break;case 'gzinflatew' : $codi=base64_encode(gzdeflate(str_rot13(rawurlencode(gzdeflate(convert_uuencode(base64_encode(str_rot13(gzdeflate(convert_uuencode(rawurldecode(str_rot13($text))))))))))));
 break;case 'gzinflates' : $codi=base64_encode(gzdeflate($text));
 break;case 'str2' : $codi=base64_encode(str_rot13($text));
 break;case 'urlencode' : $codi=rawurlencode($text);
 break;case 'ur' : $codi=convert_uuencode($text);
 break;case 'url' : $codi=base64_encode(gzdeflate(convert_uuencode(str_rot13(gzdeflate(base64_encode($text))))));
 break;case 'hub' : $codi=htmlspecialchars(rawurlencode(base64_encode($text)));
 break;default:break;}}

 $submit = $_POST['submits'];
 if (isset($submit)){
 $op = $_POST["ope"];
 switch ($op) {case 'base64': $codi=base64_decode($text);
 break;case 'str' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
 break;case 'json' : $codi=utf8_decode(json_decode($text));
 break;case 'gzinflate' : $codi=str_rot13(gzinflate(base64_decode($text)));
 break;case 'gzinflater' : $codi=gzinflate(str_rot13(base64_decode($text)));
 break;case 'gzinflatex' : $codi=gzinflate(str_rot13(gzinflate(base64_decode($text))));
 break;case 'gzinflatew' : $codi=str_rot13(rawurldecode(convert_uudecode(gzinflate(str_rot13(base64_decode(convert_uudecode(gzinflate(rawurldecode(str_rot13(gzinflate(base64_decode($text))))))))))));
 break;case 'gzinflates' : $codi=gzinflate(base64_decode($text));
 break;case 'str2' : $codi=str_rot13(base64_decode($text));
 break;case 'urlencode' : $codi=rawurldecode($text);
 break;case 'ur' : $codi=convert_uudecode($text);
 break;case 'url' : $codi=base64_decode(gzinflate(str_rot13(convert_uudecode(gzinflate(base64_decode(($text)))))));
 break;case 'hub' : $codi=htmlspecialchars_decode(rawurldecode(base64_decode($text)));
 break;default:break;}}
 $html = htmlentities(stripslashes($codi));
 echo "<form><textarea cols=60 rows=10 class='form-control con7' >".$html."</textarea></center></form><br/><br/>";
?>
