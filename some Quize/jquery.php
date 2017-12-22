<?php
/**
 * Created by PhpStorm.
 * User: minaamir
 * Date: 20/12/17
 * Time: 09:18 م
 */

// singleton allow only one instance
//used to get
//    only one database connection
//    only one front

?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<body>

    <div  id="divTemplate" style="display: none"><label>name :</label><input id="increment"><br></div>
    <label>name :</label><input id="increment">
    <div id="newDivs">

    </div>
    <button onclick="dublicate()" value="">dublicate</button>

    <hr>
    <input> <input type="radio" onclick="appearInput(1)" name="viewInput"> yes <input  name="viewInput" type="radio" onclick="appearInput(0)">no<br>
    <input id="viewInput">

    <hr>

    <div id="newDivs1">
        <div id="myTemp">
            <label>name :</label><input id="increment">
        </div>

    </div>
    <button onclick="dublicate1()" value="">dublicate</button>

    <script>
       function dublicate(){
        var div = $("#divTemplate").html()
           $("#newDivs").append(div)
       }

       function appearInput(appear){
           if(appear == 1 ){
                $("#viewInput").attr("style","display:none;")
           }else{
                $("#viewInput").attr("style","display:block;")
           }
       }

        function dublicate1(){
            $("#myTemp").clone().appendTo("#newDivs1");
        }
    </script>

</body>
</html>

