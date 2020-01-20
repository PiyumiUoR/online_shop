<?php include('include/home/header.php'); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>

                        <?php
                        
                        $cart=mysqli_query($conn,"SELECT * FROM cart");
                        while($cart_row = mysqli_fetch_array($cart))
								{
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['ID'].'</td>';
									echo '<td><a rel="facebox" href="editproductimage.php?id='.$row['ID'].'"><img src="reservation/img/products/'.$row['imgUrl'].'" width="80" height="50"></a></td>';
									echo '<td><div align="right">'.$row['Product'].'</div></td>';
									echo '<td><div align="right">'.$row['Description'].'</div></td>';
									echo '<td><div align="right">'.$row['Price'].'</div></td>';
									echo '<td><div align="right">'.$row['Category'].'</div></td>';
									echo '<td><div align="center"><a rel="facebox" href="editproductdetails.php?id='.$row['ID'].'"><i class="fa fa-edit fa-lg text-success"></i></a> | <a href="#" id="'.$row['ID'].'" class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>';
									echo '</tr>';
								}
                        ?>

                        <?php if(isset($_SESSION['cart'])){ ?>
                            <?php foreach($_SESSION['cart'] as $row): ?>
                                <?php if($row['qty'] != 0): ?>
                                <tr>
                                    <td class="text-center"><strong><?php echo $row['product'];?></strong></td>
                                    <td class="text-center"><?php echo $row['price'];?></td>
                                    <td class="text-center">
                                        <form action="cart/data.php?q=updatecart&id=<?php echo $row['proID'];?>" method="POST">
                                        <input type="number" name="qty" value="<?php echo $row['qty'];?>" min="0" style="width:50px;"/>
                                        <button type="submit" class="btn btn-info">Update</button>
                                        </form>
                                    </td>
                                    <?php $itotal = $row['price'] * $row['qty']; ?>
                                    <td class="text-center"><font class="itotal"><?php echo $itotal; ?></font></td>
                                    <td class="text-center"><a href="cart/data.php?q=removefromcart&id=<?php echo $row['proID'];?>"><i class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
                                </tr>
                                
                                <?php $total = $total + $itotal;?>  
                                <?php endif;?>
                            <?php endforeach; ?> 
                                <?php $_SESSION['totalprice'] = isset($_SESSION['totalprice']) ? $_SESSION['totalprice'] : $total; ?>
                                <?php $vat = $total * 0.12; ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub Total</strong></td>
                                    <td colspan="2" class="text-primary"><?php echo number_format($total - $vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>VAT (12%)</strong></td>
                                    <td colspan="2" class="text-danger"><?php echo number_format($vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td colspan="2" class="text-danger"><strong><?php echo number_format($total,2) ?></strong></td>
                                </tr>
                                                   
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <a href="cart/data.php?q=emptycart" class="btn btn-danger btn-lg">Empty Cart!!!</a>
                        <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                    </div>
                    <?php }else{ ?>
                            <tr><td colspan="5" class="text-center alert alert-danger"><strong>*** Your Cart is Empty ***</strong></td></tr>
                            </tbody>
                        </table>
                    <?php } ?>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
   
    
<?php include('include/home/modal.php'); ?>
<?php include('include/home/footer.php'); ?>
