<?php
include 'headcss.php';
include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<style>
    .clr{
        color:red;
    }

    /*.btnwidth {
        width:50%;
    }
    @media only screen and (max-width: 480px) {
        .btnwidth {
            width:68%;
        }
    }*/
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">
                
                <?php  if($this->session->flashdata('message_name')){ ?>
                        <div class="row alert alert-danger">
                            
                            <p><?php echo $this->session->flashdata('message_name'); ?></p>
                            
                        </div>
                        <?php } ?>
                <div class="xs-customer-form-wraper">
                    <h3>Register</h3>
                    <form method="post"  action="<?php echo base_url('Artnhub/pre_registration'); ?>" enctype="multipart/form-data" class="form-p-text">
                         		<div class="form-group">
                		    <label class="info-title" for="signemail">Name <span>*</span></label>
                		    <input type="text"  name="name" class="form-control unicase-form-control text-input" maxlength="20" value="" required="">
                		</div>
                        <div class="form-group">
                            <label class="info-title" for="signemail">Mobile Number <span>*</span></label>
                            <input type="text" name="Mobile"  maxlength="10" minlength="10" onkeypress="javascript:return isNumber(event)" class="form-control unicase-form-control text-input" value="" required="">
                        </div>
                		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Next</button>
                	</form>	
                </div><!-- .xs-customer-form-wraper END -->
            </div>
        </div>
    </div><!-- .container END -->
</section>


<?php $open='not' ; 
include 'footer.php'; ?>

<script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>
