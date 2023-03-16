<!DOCTYPE html>

<html lang = "en" xmlns = "http://www.w3.org/1999/xhtml">
<head>
<meta charset = "utf-8" />
<title>Hackathon </title>

<link rel = "stylesheet" href = "index.css">
<link rel= "stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class = "header">
<h2>The database with 1000s of Cocktails for you to discover!</h2>
<p>Created By: Liam Rea and Nathan Perez</p>
</div>


<div class = "mainContainer">

<div class = "bodyContainer">
<?php
    function GetVar($value, $default){
        if (isset($_POST[$value])){
            return $_POST[$value];
        }
        else{
            return $default;
        }
    }

    $name = GetVar("Name", "");
    $ID = GetVar("ID", "");
    //echo $_POST["Name"];

    echo "<form action=\"Main.php\" method = \"post\">";
        echo "<label for=\"Name\">Name Of Drink</label>";
        echo "<input type = \"text\" id =\"Name\" name = \"Name\"> ";
        echo "<br>";
        echo "<label for=\"ID\">ID Of Drink</label>";
        echo "<input type = \"text\" id =\"ID\" name = \"ID\"> ";
        echo "<br>";
        echo "<input type=\"submit\" value=\"Submit\">";
    echo "</form>"; 

    function SearchByName($name){
        $html = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=".$name."");
        $decoded = json_decode($html, false);
        echo "By Name\n";
        echo "".$decoded->drinks[0]->strDrink."<br>";
        echo "".$decoded->drinks[0]->strCategory."<br>";
        echo "".$decoded->drinks[0]->strInstructions."<br>";
    }


    function RandomSearch(){
        $html = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/random.php");
        $decoded = json_decode($html, false);
        echo "Random Drink\n";
        echo "".$decoded->drinks[0]->strDrink."<br>";
        echo "".$decoded->drinks[0]->strCategory."<br>";
        echo "".$decoded->drinks[0]->strInstructions."<br>";
    }

    function SearchByID($ID){
        $html = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=".$ID."");
        $decoded = json_decode($html, false);
        echo "By ID\n";
        echo "".$decoded->drinks[0]->strDrink."<br>";
        echo "".$decoded->drinks[0]->strCategory."<br>";
        echo "".$decoded->drinks[0]->strInstructions."<br>";
    }
    if (strcmp($name, "") != 0){
        SearchByName("$name");
        echo "<br>";
    }
    RandomSearch();
    echo "<br>";
    if (strcmp($ID, "") != 0){
        SearchByID("$ID");
    }
    

?>


</div>
</div>
</body>
</html>