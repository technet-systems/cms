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
                <div class="col-lg-12 pad-bottom-25">
                    <div id="filters" class="button-group">  
                        <button class="button is-checked" data-filter="all">Wszystko</button>
                        <?php $current_model = NULL; ?>
                        <?php foreach($pics as $item) { ?>
                        <?php $car = explode('|', $item->c11_title); ?>
                        <?php $model = explode(' ', $car[0]); ?>
                        <?php if($model[1] != $current_model) { ?>
                            <button class="button is-checked" data-filter=".<?php print $model[1]; ?>"><?php print $model[1] . ' ' . $model[2] . ' ' . $model[3]; ?></button>
                        <?php } ?>
                        <?php $current_model = $model[1]; ?>
                        <?php } ?>
                        
                    </div>
                </div>
                
                <div class="grid">
		<?php $i = 0; ?>
                <?php foreach($pics as $item) { ?>
                <?php $car = explode('|', $item->c11_title); ?>
                <?php $model = explode(' ', $car[0]); ?>

                <div class="grid-item col-sm-2 text-center <?php print $model[1]; ?>">
                    <a class="fancybox hidden-xs hidden-sm visible-md visible-lg" data-fancybox-group="gallery" href="<?php print base_url('uploads/'.$item->c11_pic); ?>" title="<?php print $item->c11_title; ?>"><img class="img-responsive thumbnail text-center" src="<?php print base_url('uploads/'.$item->c11_pic); ?>" alt="<?php echo $item->c11_title; ?>"></a>
                    <img class="img-responsive thumbnail text-center visible-xs visible-sm hidden-md hidden-lg" src="<?php print base_url('uploads/'.$item->c11_pic); ?>" alt="<?php print $item->c11_title; ?>">
                    <h6 class="visible-xs"><?php print $item->c11_title; ?></h6>
                </div>
                
                <?php 
                $i++;
                if($i == 6) {
                        echo '<div class="clearfix"></div>';
                        $i = 0;
                }
                ?>
                <?php } ?>
                
                <div class="clearfix"></div>
                </div>
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