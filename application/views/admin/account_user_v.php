                <div class="col-xs-12 col-sm-9">
                    <p class="pull-left visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Zakładki</button>
                    </p>
                    <?php if(isset($message_change_article)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_article; ?>
                    </div>
                    <?php } else if(isset($error)) { ?>
                    <?php print $this->upload->display_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-remove"></span> ', '</div>'); ?>
                    
                    <?php } else if(isset($message_change_password)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_password; ?>
                    </div>
                    <?php } else if(isset($message_change_properties)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_properties; ?>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-warning-sign"></span> ', '</div>'); ?>
                            
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Zmiana danych</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="form-horizontal">
                                        <?php foreach($result as $item) { ?>
                                        <?php print form_open('admin/account/update_user/'.$item->a1_id); ?>
                                        
<!--                                        <div class="form-group">
                                            <label for="account_new_login" class="col-sm-2 control-label">Login <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Login musi być e-mailem"></span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="account_new_login" value="<?php print $item->a1_email; ?>" class="form-control" placeholder="Wpisz swój adres e-mail, który będzie Twoim nowym loginem">
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="account_new_password" class="col-sm-2 control-label">Nowe hasło</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="account_new_password" value="" class="form-control" placeholder="Wpisz nowe hasło">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="account_new_passconf" class="col-sm-2 control-label">Powtórz nowe hasło</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="account_new_passconf" value="" class="form-control" placeholder="Wpisz ponownie nowe hasło">
                                            </div>
                                        </div>
                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Zapisz</button>
                                        </div>
                                        <?php } ?>
                                        <?php print form_close(); ?>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div><!--/.col-xs-12.col-lg-12-->
                    </div>
                </div><!--/.col-xs-12.col-sm-9-->

            </div><!--/row-->