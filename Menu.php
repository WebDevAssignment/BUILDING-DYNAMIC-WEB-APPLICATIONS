<?php
    require_once __DIR__.'/twigLaunch.php';
    include 'NavigationBar.php';

        $items = array();
        $categories = array();
            
        $catData = mysqli_query($mydb, "SELECT DISTINCT CategoryName, CategoryID FROM categories ORDER BY CategoryID ASC;");
        $catLength = mysqli_num_rows($catData);
        if(mysqli_num_rows($catData) > 0){
            for($i = 0; $i < mysqli_num_rows($catData); $i++):
                $catRow = mysqli_fetch_assoc($catData);
                $categories[$i]['name'] = $catRow['CategoryName'];
                $categories[$i]['id'] = $catRow['CategoryID'];
            endfor;
        }

        $menuData = mysqli_query($mydb, "SELECT * FROM menu;");

        if(mysqli_num_rows($menuData) > 0){
            for($k = 0; $k < mysqli_num_rows($menuData); $k++): 
                $menuRow = mysqli_fetch_assoc($menuData);
                $items[$k]['name'] = $menuRow['name'];
                $items[$k]['price'] = $menuRow['price'];
                $items[$k]['DishID'] = $menuRow['DishID'];
                $items[$k]['image'] = $menuRow['image'];
                $items[$k]['CategoryID'] = $menuRow['categoryID'];      
            endfor;
        }
        
        if(isset($_SESSION['customerID'])){
            echo $twig->render('Menu.html', 
                ['items' => $items, 'categories' => $categories, 'catLength' => $catLength, 'customerID' => $_SESSION['customerID']]
            );
        }
        else{
            echo $twig->render('Menu.html', 
                ['items' => $items, 'catLength' => $catLength, 'categories' => $categories]
            );
        }
?>