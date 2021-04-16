<?php echo $header;?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-mark" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="{{route('list.product')}}" data-toggle="tooltip" title="cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Product detail</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-mark" class="form-horizontal">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

        	<!-- Name -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-name">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $product['name'] ?>" placeholder="" id="input-name" class="form-control" />
              <?php if (isset($error["name"])) { ?>
	            	<div class="text-danger"><b><?php echo $error["name"]; ?></b></div>
	            <?php } ?>
            </div>

          </div>

        	<!-- Description -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-description">Description</label>
            <div class="col-sm-10">
              <textarea type="text" name="description" value="<?php echo $product['description'] ?>" placeholder="" id="input-description" class="form-control"><?php echo $product['description'] ?></textarea>
            </div>
          </div>

        	<!-- Mark -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-mark">Mark</label>
            <div class="col-sm-10">
            	<select name="mark_id" id="input-type" class="form-control">
            	<?php foreach ($marks as $mark): ?>
            		<?php if ($product && $mark["mark_id"] == $product["mark_id"]) { ?>
                	<option value="<?php echo $mark["mark_id"]; ?>" selected="selected"><?php echo $mark["name"]; ?></option>
                <?php } else { ?>
                	<option value="<?php echo $mark["mark_id"]; ?>"><?php echo $mark["name"]; ?></option>
                <?php } ?>            		
            	<?php endforeach ?>
            	</select>
            </div>
          </div>

        	<!-- Price -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-price">Price</label>
            <div class="col-sm-10">
              <input type="text" name="price" value="<?php echo $product['price'] ?>" placeholder="ex:19.99  0 - 10000" id="input-price" class="form-control" />
              <?php if (isset($error["price"])) { ?>
	            	<div class="text-danger"><b><?php echo $error["price"]; ?></b></div>
	            <?php } ?>
            </div>
          </div>

        	<!-- Promotion -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-special">special</label>
            <div class="col-sm-10">
              <input type="text" name="special" value="<?php echo $product['special'] ?>" placeholder="ex:19.99  0 - 10000" id="input-special" class="form-control" />
              <?php if (isset($error["special"])) { ?>
	            	<div class="text-danger"><b><?php echo $error["special"]; ?></b></div>
	            <?php } ?>
            </div>
          </div>

        	<!-- Quantity -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
            <div class="col-sm-10">
              <input type="number" name="quantity" value="<?php echo $product['quantity'] ?>" placeholder="0 - 10000" id="input-quantity" class="form-control" />
              <?php if (isset($error["quantity"])) { ?>
	            	<div class="text-danger"><b><?php echo $error["quantity"]; ?></b></div>
	            <?php } ?>
            </div>
          </div>

        	<!-- Image -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Image</label>
            <div class="col-sm-10">
              <input type="text" name="image" value="<?php echo $product['image'] ?>" placeholder="ex: 1.jpg" id="input-image" class="form-control" />
            </div>
          </div>

        	<!-- Image additional -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image-additional">Image additional</label>
            <div class="col-sm-10">
              <input type="text" name="image_additional" value="<?php echo $product['image_additional'] ?>" placeholder="ex: 10.jpg,11.jpg,12.jpg" id="input-image-additional" class="form-control" />
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order">Sort</label>
            <div class="col-sm-10">
              <input type="number" name="sort_order" value="<?php echo $product['sort_order'] ?>" placeholder="0" id="input-sort-order" class="form-control" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer;?>