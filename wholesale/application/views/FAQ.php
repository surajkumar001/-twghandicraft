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
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
	<div class="container">
		<div class="checkout-box faq-page mg-bt-3">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Frequently Asked Questions</h2>
                        <span class="title-tag">Last Updated on November 02, 2014</span>
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <?php $i=1; foreach ($message as $value) {
                                 ?>
                                <div class="panel panel-default checkout-step-01">

                                                 <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne_<?php echo $value['id']; ?>">
                                            <span><?php echo $i++; ?></span><?php echo $value['ques']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- panel-heading -->

                                      <div id="collapseOne_<?php echo $value['id']; ?>" class="panel-collapse collapse">

                                                                         <!-- panel-body  -->
                                                                  <div class="panel-body">
                                           <?php echo $value['answer']; ?>         
                                        </div>
                                        <!-- panel-body  -->

                                        </div><!-- row -->
                                </div>

                                <?php } ?>
                        <!-- checkout-step-09  -->
                        
                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div>
			</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

    <?php 
include 'footer.php';
      ?>