   
			<div class="header-nav animate-dropdown">
			<div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                           <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed open_left_menu" type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <a class="close_menu">&#215;</a>
                        <div class="nav-bg-class slide_left">
					<nav class="nav navbar-nav navbar-nav01" id="">
							<ul class="nav-menu">
							
								<?php
											$table='parent_category';

										$parent=$this->Adminmodel->select_com($table);
										foreach ($parent as $value) 
											{	
												$name=$value['name'];
												$title=str_replace(" ","_", $name);
											?>
                                    
                                        <li class="yamm mega-menu">
                                            <a href="<?php echo base_url('Artnhub/pcat/'.$title); ?>" data-hover="dropdown" class="dropdown-toggle"><?php echo $value['name']; ?></a>
                                            <a data-toggle="dropdown" class="down-arrow"><i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu container">
                                                <li>
                                                    <div class="yamm-content ">
                                                        <div class="row">
                                                             <?php
																echo 	$id=$value['id'];
																	$where='parent_id';
																	$table='category';
																	$category=$this->Model->select_common_where($table,$where,$id); 

																	foreach ($category as  $cat) {
																		$names=$cat['name'];
												$titles=str_replace(" ","_", $names);
																	
																	?>
                                                            <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                                                                <a href="<?php echo base_url('Artnhub/'.$titles.'/cat'); ?>"><?php echo $cat['name']; ?></a>
                                                                                                                    </div>
                                                        <?php } ?>
                                                         
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>

                                        </li>                                 
                                    
                                <?php } ?>
			
							</ul>
						</div><!-- .nav-menus-wrapper END -->
				</div>
				</div>
			</div>
			</div>
			</div>
<style>

</style>
<!-- ============================================== NAVBAR : END ============================================== -->
</header>