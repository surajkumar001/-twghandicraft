   <style>
     .lipadd   {
        padding: 0px !important;
        }
        .sticky + .content {
  padding-top: 2px;
}
   </style>
            <div class="header-nav animate-dropdown content" style="    margin-top: -31px;">
            <div class="container-fluid">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                           <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed open_left_menu tglsm" type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <a class="close_menu">&#215;</a>
                        <div class="nav-bg-class slide_left">
                    <nav class="nav navbar-nav navbar-nav01" id="">
                            <ul class="nav-menu">
                            
                                <?php
                                        $this->db->select('*');
            	                	    $this->db->from('parent_category');
            	                	      $this->db->where('status' ,1 );
                        	        	$this->db->order_by("Position","ASC");
            	                    	$query = $this->db->get();
            	                    	
            	                    	
            	                    	$parent= $query->result_array(); 
                                        
                                        foreach ($parent as $value) 
                                            {   
                                                $name=$value['name'];
                                                $title=str_replace(" ","_", $name);
                                            ?>
                                    
                                        <li class="yamm mega-menu lipadd">
                                         
                                               <a href="<?php echo base_url('pcat/'.$title); ?>" data-hover="dropdown" class="dropdown-toggle"><?php echo $value['name']; ?></a>
                                            <a data-toggle="dropdown" class="down-arrow"><i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu container">
                                                <li>
                                                    <div class="yamm-content ">
                                                        <div class="row">
                                                             <?php
                                                                    $id=$value['id'];
                                                                    
                                                                    $this->db->select('*');
                                                                    $this->db->where('parent_id' , $id);
                                        	                	   $this->db->where('status' ,1 );
                                        	                	    $this->db->from('category');
                                                    	        	$this->db->order_by("Position","ASC");
                                        	                    	$query = $this->db->get();
                                        	                    	
                                        	                    	
                                        	                    	$category= $query->result_array(); 

                                                                    foreach ($category as  $cat) {
                                                                        $names=$cat['name'];
                                                $titles=str_replace(" ","_", $names);
                                                          $id=$cat['id'];
                                                                                $where='cat_id';
                                                                                $table='sub_category';
                                                                                $sub_category=$this->Model->select_common_where($table,$where,$id);
                                                                             // pr($sub_category);
                                                                    ?>
                                                                    <?php if(!empty($sub_category)){ ?>  <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                                                               
                                                             <a href="<?php echo base_url('subcat/'.$titles); ?>"><?php echo $cat['name']; ?></a>
                                                                </div>
                                                                    <?php } else{ ?>
                                                            <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                                                                  
                                                                <a href="<?php echo base_url(''.$titles); ?>/cat"><?php echo $cat['name']; ?></a>
                                                              

                                                         <!--        <ul class="links">
                                                                         <?php
                                                                            $id=$cat['id'];
                                                                                $where='cat_id';
                                                                                $table='sub_category';
                                                                                $sub_category=$this->Model->select_common_where($table,$where,$id); 

                                                                                foreach ($sub_category as  $subcat) {
                                                                                $view1=$subcat['subcategory_name'];
                                                                                    $view= str_replace(" ","_",$view1);
                                                                                ?>
                                                                            <li><a href="<?php echo base_url('viewss/'.$view); ?>"><?php echo  $subcat['subcategory_name']; ?></a></li>
                                                                    <?php } ?>
                                                                </ul> -->
                                                            </div>
                                                        <?php } }?>
                                                            <!-- /.col -->

                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>

                                        </li>                                 
                                    
                                <?php } ?>
                            
              <li class="yamm mega-menu lipadd">
                      <a href="<?php echo base_url('New_Arrival'); ?>" data-hover="dropdown" class="dropdown-toggle">New Arrival</a>
                  
              </li>
                        
                </div>
                </div>
            </div>
            </div>
            </div>
<style>
.slide_left{
    display: block;
    min-height: 40px;
    text-align: center;
}
.slide_left .navbar-nav {
    float: none;
}
</style>

<!-- ============================================== NAVBAR : END ============================================== -->
</header>