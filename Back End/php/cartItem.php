<?php 
function cart_item($id,$conn,$quantity,$count)
{
   $sql = "select * from item where id = '$id'";
   $result = mysqli_query($conn,$sql);
   if($result){
       if($row = mysqli_fetch_array($result)){
           $productimg = $row['image'];
           $productname = $row['name'];
           $productprice = $row['price'];

           $element = "
            <form action='' method='post' class='cart-items'>
           <div class='border rounded col-md-12 py-2' id ='item'>
                        <div class='row bg-white'>
                            <div class='col-md-4 pl-0'>
                                <img src= '../../Resources/Imgs/1.jpg' alt='Image1' class='img-fluid' width = 400px height = 350px>
                            </div>
                            <div class='col-md-4'>
                                <h5 class='pt-2'>Name: $productname</h5>
                                <small class='text-secondary'>pickles pasta end egg</small>
                                <h5 class='pt-2'>Price: $productprice $</h5>
                                <br>
                                <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
                                <input type = 'hidden' value = $count name = 'remove_1'>

                            </div>
                            <div class='col-md-4 py-5 px-3'>
                                <div> 
                                    <div>
                                    <button type='button' name = 'minus' style = 'float:left;' class='btn bg-light border rounded-circle' id = 'minus' onclick = 'sub($id)'><i class='fas fa-minus'></i></button>
                                    <input type='text' value= '$quantity' class='form-control d-inline' style='width:20% ;float:left;pointer-events:none;' id = '$id' name = 'quantity'>
                                    <button type='button' name = 'plus' ;' style='float:left;' class='btn bg-light border rounded-circle' id = 'plus' onclick = 'add($id)'><i class='fas fa-plus'></i></button>
                                    </div>
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