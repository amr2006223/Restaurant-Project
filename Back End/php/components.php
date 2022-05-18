<?php
function component($product_name,$product_price,$product_image,$product_id,$category){
    $element = "
    <div class='each-card'>
    <div class = 'card shadow'>
        <div>
        <img src= $product_image alt='' class = 'img-fluid card-img-top'>
        </div>
        <div class = 'card-body'>
            <h5 class = 'card-title'>$product_name</h5>
            <h6>
                <i class = 'fas fa-star'></i>
                <i class = 'fas fa-star'></i>
                <i class = 'fas fa-star'></i>
                <i class = 'fas fa-star'></i>
                <i class = 'far fa-star'></i>
            </h6>
            <p class = 'card-text'>some stuff to write</p>
            <h5>
                <small><s class = 'text-secondary'>$519</s></small>
                <span class = 'price'>$product_price</span>
            </h5>
            <form action = '' method = 'post'>
            <button type ='submit' class = 'btn btn-warning my-3' name = 'add'> Add to cart <i class = 'fas fa-shopping-cart'></i></button>
            <input type='hidden' name = 'product_id' value = $product_id>
            <input type='hidden' name = 'category' value = $category>
            </form>

        </div>
    </div>
</div>
";
echo $element;
}
?>
