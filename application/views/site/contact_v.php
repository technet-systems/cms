    <div class="container">

        <div class="row">
            <div class="box">
                <?php foreach($content as $item) { ?>
                <?php if($item->c1_id == 7) { ?>
                
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php print $item->c1_header; ?></h2>
                    <hr>
                </div>
                <div class="col-md-8" id="map">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                    <?php print $item->c1_pic; ?>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                                                        
                            <p>Telefon:</p>
                            
                                                        
                            <p>E-mail:</p>
                            
                                                        
                            <p>Adres:</p>
                            
                            
                            <p>Czynne:</p>
                            
                                                        
                        </div>
                        
                        <div class="col-xs-9 col-sm-9 col-md-9">
                                                        
                            <p><strong><a href="tel:+48505660091" id="tel-click2"><?php print $item->c1_title; ?></a> </strong></p>
                            
                                                        
                            <p><strong><a href="mailto:<?php print $item->c1_subtitle; ?>?subject=Zapytanie mailowe"><?php print $item->c1_subtitle; ?></a></strong></p>
                            
                                                        
                            <p><strong><?php print $item->c1_text; ?></strong></p>
                            
                            
                            <p><strong>9-17, sob. 9-14</strong></p>
                                                        
                        </div>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
                <?php } ?>
                <?php } ?>
                
            </div>
        </div>

        <div class="row">
            <div class="box">
                <?php foreach($content as $item) { ?>
                <?php if($item->c1_id == 8) { ?>
                
                <div class="col-lg-12 text-justify">
                    <hr>
                    <h2 class="intro-text text-center"><?php print $item->c1_header; ?></h2>
                    <hr>
                    <p><?php print $item->c1_text; ?></p>
                    <?php 
                    if(isset($message_send)) { ?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-info-sign"></span> <?php print $message_send; ?>
                        </div>
                    <?php } ?>
                    
                    <?php 
                    $attr = array(
						'id' => 'contact_form',
                        'role' => 'form'
                        
                        );
                    print form_open('', $attr); ?>
                    
                        <div class="row">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-warning-sign"></span> ', '</div>'); ?>
                            
                            <div class="form-group col-lg-3">
                                <label>Imię</label>
                                <input name="fname" type="text" class="form-control" placeholder="Twoje imię">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Twój adres e-mail">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Telefon</label>
                                <input name="phone" type="tel" class="form-control" placeholder="Twój telefon (same cyfry, bez spacji)">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Marka/model/rok prod.</label>
                                <input name="model" type="text" class="form-control" placeholder="Ogólne dane Twojego pojazdu">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Wiadomość</label>
                                <textarea name="message" class="form-control" rows="6" placeholder="Twoja wiadomość"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- <input type="hidden" name="save" value="contact"> -->
                                <button type="submit" class="btn btn-default">Wyślij</button>
                            </div>
                            
                        </div>
                    <?php print form_close(); ?>
                </div>
                <?php } ?>
                <?php } ?>
                
            </div>
        </div>

    </div>
    <!-- /.container -->