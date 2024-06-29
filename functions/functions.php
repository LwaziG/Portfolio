<?php

$db = mysqli_connect("localhost","id22329617_root","The@der24","id22329617_african_threads");

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////


// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}


// items function Ends ///

// total_price function Starts //

function total_price(){

global $db;

$ip_add = getRealUserIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];


$sub_total = $record['p_price']*$pro_qty;

$total += $sub_total;






}

echo "R" . $total;



}



// total_price function Ends //

// getPro function Starts //


function getPro(){

global $db;

$get_products = "select * from products order by 1 DESC LIMIT 0,4";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_img2 = $row_products['product_img2'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];

if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> R$pro_price </del>.00 ";

$product_psp_price = "| R$pro_psp_price.00 ";

}
else{

$product_psp_price = "";

$product_price = "R$pro_price";

}


if($pro_label == ""){


}


else{

$product_label = "

<!-- <a class='label sale' href='#' style='color:black;'> -->

<!-- <div class='thelabel'>$pro_label</div> -->

<!-- <div class='label-background'> </div> -->

<!-- </a> -->

";

}


echo "
<div class='col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals'>
        <div class='product__item'>
        <a href='$pro_url' > 
        <div class='product__item__pic set-bg img-responsive' data-setbg='admin_area/product_images/$pro_img1'>
        </div>
            <div class='product__item__text'>
                <h5>$pro_title</h5>
                <h5>$product_price.00</h5>
            </div>
            </a>
        </div>
    </div>
";




}

}


// getPro function Ends //


// New product label



// getProducts function Starts //

function getProducts() {
    global $db;

    $aWhere = array();
    $sWhere = '';

    // Category Filter
    if (isset($_GET['category']) && $_GET['category'] != '') {
        $category = mysqli_real_escape_string($db, $_GET['category']);
        $aWhere[] = "pc.p_cat_title = '$category'";
    }

    // Sorting Filter
    $orderBy = '';
    if (isset($_GET['sort']) && $_GET['sort'] != '') {
        switch ($_GET['sort']) {
            case 'price_asc':
                $orderBy = 'ORDER BY p.product_price ASC';
                break;
            case 'price_desc':
                $orderBy = 'ORDER BY p.product_price DESC';
                break;
            case 'alpha_asc':
                $orderBy = 'ORDER BY p.product_title ASC';
                break;
            case 'alpha_desc':
                $orderBy = 'ORDER BY p.product_title DESC';
                break;
            default:
                $orderBy = '';
        }
    }

    if (count($aWhere) > 0) {
        $sWhere = 'WHERE ' . implode(' AND ', $aWhere);
    }

    // Updated SQL query to join products and product_categories tables
    $get_products = "
        SELECT 
            p.product_id,
            p.product_title,
            p.product_price,
            p.product_img1,
            p.product_url,
            pc.p_cat_title
        FROM 
            products p
        INNER JOIN 
            product_categories pc
        ON 
            p.p_cat_id = pc.p_cat_id
        $sWhere
        $orderBy
    ";

    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        $pro_url = $row_products['product_url'];
        $pro_cat_title = $row_products['p_cat_title'];

        echo "
        <div class='col-lg-3 col-md-6 col-sm-6 productList'>
            <div class='product__item'>
                <a href='$pro_url'>
                    <div class='product__item__pic set-bg img-responsive' data-setbg='admin_area/product_images/$pro_img1'>
                    </div>
                    <div class='product__item__text'>
                        <h5>$pro_title</h5>
                        <h5>R$pro_price.00</h5>
                    </div>
                </a>
            </div>
        </div>
        ";
    }
}

// getProducts function Ends //

/// getPaginator Function Starts ///

function getPaginator(){

/// getPaginator Function Code Starts ///

$per_page = 6;

global $db;

$aWhere = array();

$aPath = '';

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($db,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li><a href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li><a href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Last Page'."</a></li>";

/// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///



?>
