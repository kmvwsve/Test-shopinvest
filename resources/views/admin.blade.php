<?php echo $header;?>

<div id="page-products">
  <div class="container-fluid">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> List Products</h3>
      </div>
      <div class="panel-body">
      	<div class="well">
      		<div class="row">
      			<div class="col-sm-12">
      				<a href="{{route('add.product')}}" class="btn btn-success">Add +</a>
      			</div>
      		</div>
      	</div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center">Image</td>
                  <td class="text-left">Name</td>
                  <td class="text-left">Marque</td>
                  <td class="text-right">Price</td>
                  <td class="text-right">Quantity</td>
                  <td class="text-right">Link</td>
                  <td class="text-right"></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
                <tr>
                  <td class="text-center">
                  	<?php if ($product['image']) { ?>
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-thumbnail" />
                    <?php } else { ?>
                    <span class="img-thumbnail list"><i class="fa fa-camera fa-2x"></i></span>
                    <?php } ?></td>
                  <td class="text-left"><?php echo $product['name']; ?></td>
                  <td class="text-left"><?php echo $product['mark']; ?></td>

                  <td class="text-right">
                  	<?php if ((float)$product['special']>0) { ?>
                    <span style="text-decoration: line-through;"><?php echo $product['price']; ?></span><br/>
                    <div class="text-danger"><?php echo $product['special']; ?></div>
                    <?php } else { ?>
                    <?php echo $product['price']; ?>
                    <?php } ?>
                  </td>
                  <td class="text-right">
                  	<?php if ($product['quantity'] <= 0) { ?>
                    <span class="label label-warning"><?php echo $product['quantity']; ?></span>
                    <?php } elseif ($product['quantity'] <= 5) { ?>
                    <span class="label label-danger"><?php echo $product['quantity']; ?></span>
                    <?php } else { ?>
                    <span class="label label-success"><?php echo $product['quantity']; ?></span>
                    <?php } ?>
                  </td>
                  <td class="text-right">
                  	<a href="<?php echo $product['view']; ?>" target="_blank">View</a>
                  </td>
         
                  <td class="text-right">
                  	<a href="<?php echo $product['edit']; ?>" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                  	<a href="<?php echo $product['remove']; ?>" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="5">No product</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php echo $footer;?>