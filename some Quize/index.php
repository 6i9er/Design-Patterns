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
    <style>
        ul{
            display: block;
        }
        li{
            float: left;

            list-style: none;
        }
        a{
            display: block;
            margin: 10px;
            padding:10px;
            border:1px solid #000;
        }
        .box{
            float: left;
            border: 1px solid #000000;
            width: 100px;
            height: 100px;
            margin: 10px;
            background: red;
            /*opacity: 0.5;*/
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<body>
<div style="display: block">
    <ul>
        <li ><a name="box"  onclick="color('box')" href="javascript:void(0)">all</a></li>
        <li><a name="class1"  onclick="color('class1')" href="javascript:void(0)">class1</a></li>
        <li><a name="class2"  onclick="color('class2')" href="javascript:void(0)">class2</a></li>
        <li><a name="class3" onclick="color('class3')" href="javascript:void(0)">class3</a></li>
    </ul>
</div>
<hr>
<div style="display: block">
    <div class="box class1"></div>
    <div class="box class2"></div>
    <div class="box class1"></div>
    <div class="box class3"></div>
    <div class="box class3"></div>
    <div class="box class2"></div>

</div>

    <script>
        function color(className){
            $(".box").css("opacity" , "1");
            $("."+className).css("opacity" , "0.5");
            $("li a").attr("style","");
            $("a[name="+className+"]").attr("style","background:#000;color:#FFF");
        }
    </script>

</body>
</html>

