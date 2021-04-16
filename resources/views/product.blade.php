<?php echo $header;?>

<div id="page-product">
	<div class="container">
		<ul class="breadcrumb">
	    <li><a href="#">Accueil</a></li>
	    <li><a href="#">Femme</a></li>
	    <li><a href="#">Top</a></li>
	    <li><?php echo $product['name']; ?></li>
	  </ul>
	</div>

	<div class="container">
		<div class="row">
			<!-- images -->
			<div class="col-sm-6">
				<div id="page-product-images">
					<a href="javascript:;" id="image-thumb-a">
						<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" id="image-thumb" class="img-responsive">
					</a>
					<div id="image-additionals">
						<a href="javascript:;" class="image-adl-a active">
							<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="image-adl img-responsive">
						</a>
					<?php foreach ($product['images'] as $images): ?>
						<a href="javascript:;" class="image-adl-a">
							<img src="<?php echo $images; ?>" alt="<?php echo $product['name']; ?>" class="image-adl img-responsive">
						</a>
					<?php endforeach ?>
					</div>
				</div>
			</div>

			<!-- informations -->
			<div class="col-sm-6">
				<div id="page_product_caption">
					<h2><?php echo $product['name']; ?></h2>

					<div class="row">
						<div class="col-sm-6">
							Marque: <a href="#"><?php echo $product['mark']; ?></a>
						</div>
						<div class="col-sm-6 text-right">
							<?php if ((float)$product['special']>0) { ?>
								<span class="price has-special"><?php echo $product['price']; ?></span>
								<span class="special"><?php echo $product['special']; ?></span>
							<?php } else { ?>
								<span class="price"><?php echo $product['price']; ?></span>
							<?php } ?>
						</div>
					</div>
					
					<div id="page-product-detail">
	          <ul class="nav nav-tabs">
	            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
	            <li><a href="#tab-livraison" data-toggle="tab">Livraison</a></li>
	            <li><a href="#tab-paiement" data-toggle="tab">Garanties & Paiement</a></li>
	          </ul>
	          <div class="tab-content">
	            <div class="tab-pane active" id="tab-description">
		            <div class="tab-pane-content">
		            	<?php echo $product['description']; ?>
		            </div>
	            </div>

	            <div class="tab-pane" id="tab-livraison">
	            	<div class="tab-pane-content">
									Livraison en magasin<br>
									(Offerte)<br>
									<br>
									Livraison à domicile Colissimo<br>
									3,99€ (Offerte dès 49€)<br>
									<br>
									Livraison en point relais<br>
									2,49€ (Offerte dès 49€)<br>
		            </div>
	            </div>

	            <div class="tab-pane" id="tab-paiement">
	            	<div class="tab-pane-content">
									<b>RETOUR GRATUIT SOUS 90 JOURS</b><br>
									Recevez un bon de retour sans frais, pour retourner le produit à l’usine. Une solution vous sera proposée sous 5 jours une fois le produit reçu par le reconditionneur.<br>
									Payez en <b>4X</b>. 4 échéances, pour les achats de 50€ à 2 000€.<br>
		            </div>
	            </div>
	          </div>
					</div>

					<!-- add to cart -->
					<div id="page-product-add">
						<div class="pull-left page-product-qty-wrap">

							<a href="javascript:;" class="pp-add-qty-a pp-add-min"><i class="fa fa-angle-left"></i></a>

							<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />

							<a href="javascript:;" class="pp-add-qty-a pp-add-pls"><i class="fa fa-angle-right"></i></a>

						</div>

            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

          	<button type="button" id="button-cart" data-loading-text="Ajouter au panier" class="btn btn-primary btn-lg">Ajouter au panier</button>

          	<div class="clear-b"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript"><!--
	
$(document).ready(function(){
	// Change Images
	$(".image-adl-a").click(function() {
		$(".image-adl-a").removeClass("active");
		$(this).addClass("active");
		var newimg = $(this).find(".image-adl").attr("src");
		$("#image-thumb").attr("src", newimg);
	});

	// Change quantity
	$('.pp-add-qty-a').click(function(){
		var qty = $('#input-quantity').val();
		if($(this).hasClass("pp-add-pls")) {
			qty++;
		} else {
			qty--;
		}
		if (qty<1) {qty = 1;}
		$('#input-quantity').val(qty);
	});
});
//--></script>

<script type="text/javascript"><!--
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

// Add to cart
$('#button-cart').on('click', function() {
	$.ajax({
		url: "{{route('add.cart')}}",
		type: 'post',
		data: $("input[name=\'product_id\'], input[name=\'quantity\']"),
		dataType: 'json',
		beforeSend: function() {},
		complete: function() {},
		success: function(json) {
			if(json['error']) {
				console.log(json['error']);
			} else {
				$("#cart").load("{{route('load.cart')}}");
			}
		},
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
	});
});

// Remove a product from cart
$(document).on('click', '.removeCart', function() {
	cart_id = $(this).attr('data-id');
	$.ajax({
		url: "{{route('remove.cart')}}",
		type: 'post',
		data: { "cart_id": cart_id },
		dataType: 'json',
		beforeSend: function() {},
		complete: function() {},
		success: function(json) {
			if(json['error']) {
				console.log(json['error']);
			} else {
				$("#cart").load("{{route('load.cart')}}");
			}
		},
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
	});
});
//--></script>

<?php echo $footer;?>