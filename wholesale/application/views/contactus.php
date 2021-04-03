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
                <li class="breadcrumb-item active" aria-current="page">Contact US</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="terms-conditions-page mg-bt-3">
         <!--<div class="row">-->
         <!--   <div class="col-md-12 terms-conditions">-->
         <!--      <h2 class="heading-title">Contact Us</h2>-->
         <!--   </div>-->
         <!--</div>-->
         
         <?php    $contact =$this->db->get_where('contact', array('id' => 1,))->row() ;
                	 ?>
            <div class="row">
				<div class="col-md-6" style="padding: 20px 15px;">
				<h2 class="heading-title">Contact Info</h2>
				
				   <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>
				
				 <?php if($_SESSION['session_id']){
                        $user_id =     $_SESSION['session_id'] ;
                         $user =$this->db->get_where('customerlogin', array('id' => $user_id,))->row() ;
                         
                         $rm_id = $user->Rm_id ;
                         
                          $rm_data =$this->db->get_where('rm', array('id' => $rm_id,))->row() ;
                          $rm_name = $rm_data->rm_name ; 
                          $rm_phone = $rm_data->rm_mobile ; 
                          if($rm_data){
                          
                             ?>
                   <dl>
                          <dt></dt>
                          <dd>Your Account Manager : <?= $rm_name ;?></span></dd>
                          <dd>Phone No : <a href="#"><?= $rm_phone ;?></a><br>&nbsp;&nbsp;</dd>
                        </dl>
                        
                        <?php }  } ?>
				<div class="mapouter">
				   <div class="gmap_canvas">
						<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=ART%20N%20HUB%20GIFT%20GALLERY%20-%20Gift%20Shop%20in%20Indirapuram%2C%20Aditya%20Mega%20City%2C%20Vaibhav%20Khand%2C%20Indirapuram%2C%20Ghaziabad%2C%20Uttar%20PradeshART%20N%20HUB%20GIFT%20GALLERY%20-%20Gift%20Shop%20in%20Indirapuram%2C%20Aditya%20Mega%20City%2C%20Vaibhav%20Khand%2C%20Indirapuram%2C%20Ghaziabad%2C%20Uttar%20Pradesh&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				   </div>
				   <address class="address">
                      <p>
                        <br><?= $contact->address ;?>
                      </p>
                        <dl>
                          <dt></dt>
                          <dd>Phone:<span> +91-<?= $contact->phone ;?></span></dd>
                          <dd>E-mail:&nbsp; <a href="#"><?= $contact->email ;?></a><br>&emsp;&emsp;&emsp;&nbsp;&nbsp;<a href="#"><?= $contact->mailing ;?></a><br>&emsp;&emsp;&emsp;&nbsp;&nbsp;</dd>
                        </dl>
                       
                   </address>
				   <style>
					  .mapouter{text-align:right;height:400px;width:100%;}
					  .gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}
				   </style>
				   
				</div>
				
				</div>
				<div class="col-md-6 cont-form">
					<h2 class="heading-title" style="margin-left: 15px; margin-right: 15px;">Contact Form</h2>
					<div class="col-sm-12" >						
							<form action="<?=  base_url("Artnhub/add_contact") ; ?>" method="post" style="width:100%;">
							<div class="form-group">
								<!--<label class="info-title" for="names">Name <span>*</span></label>-->
								<input type="text" name="name" class="form-control unicase-form-control text-input" id="names" value="" required="" placeholder="*Name">
							</div>
							<div class="form-group">
								 <!--<label class="info-title" for="number">Phone Number <span>*</span></label>-->
								 <input type="text" maxlength="10" name="phone" class="form-control unicase-form-control text-input" id="number" value="" required="" placeholder="*Mobile Number">
							  </div>
							  <div class="form-group">
								 <!--<label class="info-title" for="emails">Email Address <span>*</span></label>-->
								 <input type="email"  name="email" class="form-control unicase-form-control text-input" id="emails" value="" required="" placeholder="*Email">
							  </div>
							  <div class="form-group">
								 <!--<label class="info-title" for="emails">Subject <span>*</span></label>-->
								 <input type="text"  name="subject" class="form-control unicase-form-control text-input" id="" value="" required="" placeholder="*Subject">
							  </div>
							  <div class="form-group">
								 <!--<label class="info-title" for="emails">Message <span>*</span></label>-->
								 <textarea class="form-control"   name="message" required="" placeholder="*Message" style="height:300px !important"></textarea>
							  </div>
							  <div class="form-group text-right">
									<button type="submit" class="btn btn-primary">Submit</button> 	
							  </div>
							  </form>
						</div>					  
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12" style="padding: 20px 15px;">
				  <p><?= $contact->content ;?></p>
				</div>
			</div>	
			
		<?php echo $message[0]['terms']; ?>
      </div>
   </div>
</div>
<!-- /.row -->
</div><!-- /.sigin-in-->
</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php include('footer.php'); ?>