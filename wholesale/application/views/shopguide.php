<?php 

include 'headcss.php';
include 'header.php';
?>

 <?php include 'navbar.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Guide</li>
            </ol>
        </nav>
    </div>
</div>

<div class="body-content">
	<div class="container">
		<div class="terms-conditions-page mg-bt-3">
			<div class="row">
				<div class="col-md-12 terms-conditions">
	<h2 class="heading-title">Shopping Guide</h2>
	<div>
		<?php echo $message[0]['terms']; ?>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
			</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php include('footer.php'); ?>