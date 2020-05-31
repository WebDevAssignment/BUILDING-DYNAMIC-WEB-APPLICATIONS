<?php
    include 'NavigationBar.php';
    include 'Footer.php'
    //The slideshow functionality is based on: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_slideshow_auto
?>


<DOCTYPE! html>
<html>
<head>
    <meta charset="UTF-8">
      <title>Homepage Slideshow</title>
    <link rel="stylesheet" href="HomePage.css">
</head>


<body>
<div class="SlideshowImages">

    <div class="Images fade">
    <img src="Images\1.png" style="width: 1175px">
    </div>

    <div class="Images fade">
    <img src="Images\5.png" style="width: 1175px">
    </div>

    <div class="Images fade">
    <img src="Images\8.png" style="width: 1175px">
    </div>

    <div class="Images fade">
    <img src="Images\14.png" style="width: 1175px">
    </div>

    <div class="Images fade">
    <img src="Images\19.png" style="width: 1175px">
    </div>

</div>


 <script>
        var slideIndex = 0;
        carousel();

        function carousel()
        {
        var i;
        var x = document.getElementsByClassName("Images");

            for (i = 0; i < x.length; i++)
            {
                 x[i].style.display = "none"; 
            }
            slideIndex++;

        if (slideIndex > x.length) {slideIndex = 1} 
         x[slideIndex-1].style.display = "block"; 
        setTimeout(carousel, 3000); 
        }
</script>
</body>
</html>
