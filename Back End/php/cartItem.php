<?php 
function cart_item($tablename,$id,$conn,$quantity)
{
   $sql = "select * from $tablename where id = '$id'";
   $result = mysqli_query($conn,$sql);
   if($result){
       if($row = mysqli_fetch_array($result)){
           $productimg = $row['image'];
           $productname = $row['name'];
           $productprice = $row['price'];

           $element = "
            <form action='' method='post' class='cart-items'>
           <div class='border rounded col-md-12' id ='item'>
                        <div class='row bg-white'>
                            <div class='col-md-4 pl-0'>
                                <img src= '$productimg' alt='Image1' class='img-fluid'>
                            </div>
                            <div class='col-md-4'>
                                <h5 class='pt-2'>$productname</h5>
                                <small class='text-secondary'>Seller: dailytuition</small>
                                <h5 class='pt-2'> $productprice</h5>
                                <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
                            </div>
                            <div class='col-md-4 py-5 px-3'>
                                <div> 
                                    <button type='submit' name = 'minus' class='btn bg-light border rounded-circle' id = 'plus' onclick = 'sub($id)'><i class='fas fa-minus'></i></button>
                                    <input type='text' value= '$quantity' class='form-control w-10 d-inline' id = '$id' name = 'quantity'>
                                    <button type='submit' name = 'plus' class='btn bg-light border rounded-circle' id = 'minus' onclick = 'add($id)''><i class='fas fa-plus'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
       
                echo $element;
        }  
   }
   else
   {
       die('error in sql syntax');
   }
}
  


?>