# drz-movie-plugin
site ==> https://reposii.ir/movie/ </br>


**shortcode** : <br/>
path : include/shortcodes.php <br/>
You can use shortcode to display videos <br/>

genre *(optional)* <br/>
--example : *action* <br/>

country *(optional)* <br/>
-- example : *united-states* <br/>

director *(optional)* <br/>
--example : *anshuman-malhotra* <br/>

writer *(optional)* <br/>
--example : *jayamohan* <br/>

actor *(optional)* <br/>
-- example : *diego-luna* <br/>

order *(optional)* <br/>
--*ASC* <br/>
--*DESC* <br/>

oderby *(optional)* <br/>
--*none* <br/>
--*ID* <br/>
--*author* <br/>
--*title* <br/>
--*date* <br/>
--*comment_count* <br/>
*exmaple*<br/>
base :<br/>
[movie] <br/>- show all videos<br/>

[movie orderby="title" order="ASC" genre="action"]  <br/>- show all videos genre *action* , order *ASC* and order by *title*  <br/>





**web service** : <br/>
path : include/rest-api.php <br/>

wp-json/v2/movies <br/>
-*get all videos*  <br/>


wp-json/v2/movies?id=11 <br/>
-*get with id* <br/>

wp-json/v2/movies/?taxonomy=genre&term=action<br/>
-*get with term*  example action genre <br/>






**widget** : <br/>
path : classes/widgetClass.php <br/>

Includes radio buttons that allow the user to see the number of classified videos you want
  
