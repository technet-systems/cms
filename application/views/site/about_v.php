    <div class="container">
	
        <div class="row">
            <div class="box text-justify">
                <?php foreach($content as $item) { ?>
                
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php print $item->c1_header; ?></h2>
                    <hr>
                </div>
                <img class="img-responsive img-border-left img-left thumbnail" src="<?php print base_url('uploads/'.$item->c1_pic); ?>" alt="" width="450">
                <hr class="visible-xs">
                <p><?php print $item->c1_text; ?></p>
                <?php } ?>
                
            </div> 
        </div>
        
    </div>

    <!-- /.container -->