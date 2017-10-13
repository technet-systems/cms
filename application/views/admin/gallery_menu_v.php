        <div class="container-fluid">

            <div class="row row-offcanvas row-offcanvas-left">

                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Moje zdjęcia</div>
                        <div class="panel-body">
                            <p><span class="glyphicon glyphicon-info-sign"></span>
                            <?php 
                            $trick = array();
                            foreach($tips as $item) { 
                            ?>
                            
                            
                            <?php 
                            array_push($trick, $item->d1_name);
                            ?>
                            
                            
                            <?php } 
                            $rand_keys = array_rand($trick, 2);
                            print $trick[$rand_keys[0]] . "\n";
                            ?>
                            
                            </p>
                        </div>
                        <!-- List group -->
                        <a href="<?php print base_url('admin/gallery_pic') ?>" class="list-group-item">Galeria</a>
                        <a href="<?php print base_url('admin/gallery_slider') ?>" class="list-group-item">Slajder</a>
                        <a href="<?php print base_url('admin/gallery_bg') ?>" class="list-group-item">Tło</a>
                        <!-- /. List group -->
                    </div>
                </div><!--/.sidebar-offcanvas-->