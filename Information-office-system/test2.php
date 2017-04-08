<html>
<head>
    <title></title>
    <style type="text/css">
    .div1{position:absolute;display:none;}
    .div2{position:absolute;display:none;}
    </style>
    <script type="text/javascript">
        function div1Show() {
            var div1 = document.getElementById("div1");
            div1.style.display = "block";
        }
        function div2Show() {
            var div1 = document.getElementById("div1");
            var div2 = document.getElementById("div2");
            div1.style.display = "block";
            div2.style.display = "block";
        }
    </script>
</head>
<body>
    <div id="div1" class="div1">
        
        dsgsgfdg
        
    </div>
    <div id="div2" class="div1">
    <input type="button" value="btn2" id="btn2" onclick="div2Show()" />
    </div>
    <input type="button" value="btn1" id="btn1" onclick="div1Show()"/>
</body>
</html>