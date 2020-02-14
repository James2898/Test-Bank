<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    	<div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home" style="margin:10px;padding: 0px">
	      	<img src="<?php echo base_url() ?>assets/img/logo.png" height="120%" width="auto">
	      </a>
	    </div>
	    <div class="nav navbar-nav">
	    	<h3 style="color:white"> <a style="color:white; text-decoration:none;" href="<?php echo base_url() ?>index.php/home">AMA Computer College - Cavite | Web - Based Test Banking System</a> </h3>
		</div>
	</div>
	<div class="container-fluid">
	    <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>index.php/home">Home</a></li>
        <?php if($_SESSION['authorization'] == '1'): ?>
        <li><a href="<?php echo base_url() ?>index.php/faculty">Faculty</a></li>
        <?php endif ?>
        <li><a href="<?php echo base_url() ?>index.php/subject">Subject</a></li>
      </ul>
	    <ul class="nav navbar-nav navbar-right">
	      	<li><a href="<?php echo base_url() ?>index.php/Login/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	    </ul>
    </div>
</nav>