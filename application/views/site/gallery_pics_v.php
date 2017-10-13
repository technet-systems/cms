    <div class="container">

        <div class="row">
            <div class="box">
                
                <div class="col-lg-12">
                    <?php foreach($content as $item) { ?>
                                        
                    <hr>
                    <h2 class="intro-text text-center"><?php print $item->c1_title; ?></h2>
                    <hr>
                    <?php } ?>
                                        
                </div>
               
                <?php $model = array(); ?>
                <?php $i = 0; ?>
                <?php foreach($pics as $item) { ?>
                    <?php if(!in_array($item->c11_model, $model)) { ?>
                    <?php array_push($model, $item->c11_model); ?>
                    <div class="col-xs-6 col-sm-4 text-center test">
                        <a href="<?php print base_url('realizacje/model/' . $item->c11_model . '/' . $item->c11_c1_id); ?>"><img style="width: 100%;" class="img-responsive img-thumbnail" src="<?php print base_url('uploads/'.$item->c11_pic); ?>" alt="<?php print $item->c11_title; ?>">
                    <h3><i class="fa fa-plus-square"></i> <?php print $item->c11_model; ?></h3></a> 
                    </div>
                    <?php 
                    $i++;
                    if($i == 3) {
                        echo '<div class="clearfix"></div>';
                        $i = 0;
                    }
                    ?>
                
                    <?php } ?>
                <?php } ?>
                
            </div>
        </div>

    </div>

    <!-- /.container -->
    <script>
        $(document).ready(function() {
            // filter items on button click
            $('.button').on( 'click', function() {
              var filterValue = $(this).attr('data-filter');
              $('.grid-item').fadeOut().hide();
              if(filterValue === 'all') {
                  $('.grid-item').fadeIn().show();
              } else {
                  $(filterValue).fadeIn().show();
              }
            });

        });
    </script>