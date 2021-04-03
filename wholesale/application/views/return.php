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
                <li class="breadcrumb-item active" aria-current="page">Return Policy</li>
            </ol>
        </nav>
    </div>
</div>

<!--<div id="slider">
<figure>
<div class="page">
<div class="project">
  <div class="col project-img">
    <img src="http://ameyaderm.com/art//assets/product/promo_31102019.jpg">
  </div>
  
</div>
</div>
<div class="page">
<div class="project">
  <div class="col project-img">
    <img src="http://ameyaderm.com/art//assets/product/archies-product-1-1568266123.jpg">
  </div>

</div>
</div>
<div class="page">
<div class="project">
  <div class="col project-img">
    <img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg">
  </div>
  
</div>
</div>
<div class="page">
<div class="project">
  <div class="col project-img">
    <img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg">
  </div>
  
</div>
</div>
<div class="page">
<div class="project">
  <div class="col project-img">
    <img src="http://ameyaderm.com/art//assets/product/archies-product-1-1568266123.jpg">
  </div>

</div>
</div>
</figure>
</div>
<style>
    @keyframes slidy {
0% { left: 0%; }
10% { left: 0%; }
20% { left: -100%; }
30% { left: -100%; }
40% { left: -200%; }
50% { left: -200%; }
60% { left: -300%; }
70% { left: -300%; }
80% { left: -400%; }
90% { left: -400%; }
}



div#slider { overflow: hidden; }

div#slider figure .page { width: 100vw; float: left; }

div#slider figure { 
position: relative;
width: 500vw;
margin: 0;
left: 0;
text-align: left;
font-size: 10;
animation: 30s slidy infinite; 
}

.page {
display: flex; 
justify-content: center; 
}

.project {
display: flex; 
align-items: center; 
}
</style>-->
<div class="body-content">
	<div class="container">
		<div class="terms-conditions-page mg-bt-3">
			<div class="row">
                    <div class="col-md-6 terms-conditions">
                         <?php        $about_img  =$this->db->get('return_policy')->result(); 
             foreach($about_img as $row){  ?>
                    	<div class="col-md-6 about-div">
                    	    <img src="<?= $row->image ; ?>" class="img img-responsive div-img">
                    	</div>
                    		<?php } ?>
                    	<!--<div class="col-md-6 about-div">-->
                    	<!--    <img src="https://dummyimage.com/600x600/000000/0011ff.png" class="img img-responsive">-->
                    	<!--</div>-->
                    	<!--<div class="col-md-6 about-div">-->
                    	<!--    <img src="https://dummyimage.com/600x600/000000/0011ff.png" class="img img-responsive">-->
                    	<!--</div>-->
                    	<!--<div class="col-md-6 about-div">-->
                    	<!--    <img src="https://dummyimage.com/600x600/000000/0011ff.png" class="img img-responsive">-->
                    	<!--</div>-->
                    </div>
                    <div class="col-md-6 terms-conditions">
                    	<h2 class="heading-title">Return Policy</h2>
                    	<div>
                    		<?php echo $message[0]['terms']; ?>
                    	</div>
                    </div>
            </div><!-- /.row -->
		</div><!-- /.sigin-in-->
			</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php include('footer.php'); ?>