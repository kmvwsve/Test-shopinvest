<?php echo $header; ?>
<div id="content">
  <div class="container-fluid"><br />
    <br />
    <div class="row">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title"><i class="fa fa-lock"></i> Login</h1>
          </div>
          <div class="panel-body">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="input-username">Identifiant:</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="username" value="" placeholder="" id="input-username" class="form-control" />
                </div>
              	<?php if (isset($error["username"])) { ?>
		            	<div class="text-danger"><b><?php echo $error["username"]; ?></b></div>
		            <?php } ?>
              </div>
              <div class="form-group">
                <label for="input-password">Mot de passe:</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" name="password" value="" placeholder="" id="input-password" class="form-control" />
                </div>
                <?php if (isset($error["password"])) { ?>
		            	<div class="text-danger"><b><?php echo $error["password"]; ?></b></div>
		            <?php } ?>
                <span class="help-block"><a href="javascript:;">J’ai oubli&eacute; mon mot de passe</a></span>
                
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Se connecter</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>