<!-- BOOSTRAP CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2.min.css" />

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/custom.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validationEngine-en.js"  charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validationEngine.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/select2.min.js" charset="utf-8"></script>

<script>
    function confirmDelete(url) {
        if(confirm('Are you sure to delete?')){
            window.location.href = url;
        }else{
            return false;
        }
    }

<?php
    if(isset($_SESSION['result'])){
        echo "
            alert('{$_SESSION['result']}');
        ";
        unset($_SESSION['result']);
    }
?>
</script>