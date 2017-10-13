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
                    
                    <?php } else if(isset($message_change_pic)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_pic; ?>
                    </div>
                    <?php } else if(isset($message_change_properties)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_properties; ?>
                    </div>
                    <?php } else if(isset($message_delete_gallery)) { ?>
                    
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Uwaga!</strong> <?php print $message_delete_gallery; ?>
                    </div>
                    <?php } else if(isset($message_add_gallery)) {?>
                    
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Uwaga!</strong> <?php print $message_add_gallery; ?>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Slider</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tytuł</th>
                                                <th>Zdjęcie</th>
                                                <th class="col-lg-1">Aktualizacja</th>
                                                <th class="col-lg-1">Operacje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pics as $item) { ?>
                                            <?php if($item->c11_c1_id == 2) { ?>
                                            
                                            <tr>
                                                <td><?php print $item->c11_id; ?></td>
                                                <td><?php print $item->c11_title; ?></td>
                                                <td><img src="<?php if(!empty($item->c11_pic)) { print base_url('uploads/'.$item->c11_pic); } else { print 'http://placehold.it/100&text=Fota'; } ?>" width="100" class="img-responsive img-thumbnail"></td>
                                                <td><?php print $item->c11_timestamp; ?></td>
                                                <td>
                                                    <div class="btn-group-vertical btn-group btn-group-xs" role="group" aria-label="...">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangeText<?php print $item->c11_id; ?>"><span class="glyphicon glyphicon-pencil"></span> Zmień</button>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangePic<?php print $item->c11_id; ?>"><span class="glyphicon glyphicon-picture"></span> Zmień</button>
                                                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete<?php print $item->c11_id; ?>"><span class="glyphicon glyphicon-trash"></span> Usuń</button> -->
                                                    </div>
                                                    
                                                    <!-- Modal change text message -->
                                                    <div class="modal fade" id="myModalChangeText<?php print $item->c11_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Edycja podpisu zdjęcia</h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c11_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open('admin/gallery_bg/update_slide_title/'.$item->c11_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <label for="title" class="col-sm-2 control-label">Tytuł</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="title" value="<?php print $item->c11_title; ?>" class="form-control" placeholder="Musisz wpisać jakiś link :)">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="btn-group" role="group" aria-label="...">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                                                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Zapisz</button>
                                                                    </div>
                                                                </div>
                                                                <?php print form_close(); ?>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. Modal change text message -->
                                                    
                                                    <!-- Modal change slide message -->
                                                    <div class="modal fade" id="myModalChangePic<?php print $item->c11_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Zmiana zdjęcia</h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c11_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open_multipart('admin/gallery_bg/update_slide/'.$item->c11_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <label for="header" class="col-sm-2 control-label">Wybierz zdjęcie</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="file" name="userfile" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="btn-group" role="group" aria-label="...">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                                                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Zapisz</button>
                                                                    </div>
                                                                </div>
                                                                <?php print form_close(); ?>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. Modal change slide message -->
                                                    
                                                    <!-- Modal delete slide message -->
                                                    <div class="modal fade" id="myModalDelete<?php print $item->c11_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Usunięcie zdjęcie</h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c11_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open('admin/gallery_bg/fake_delete_slide/'.$item->c11_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    Czy na pewno usunąć zdjęcie?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="btn-group" role="group" aria-label="...">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                                                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Usuń</button>
                                                                    </div>
                                                                </div>
                                                                <?php print form_close(); ?>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. Modal delete slide message -->
                                                
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                    <!-- <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddSlide"><span class="glyphicon glyphicon-plus"></span> Dodaj slajd</button>
                                    </div> -->
                                    
                                    <!-- Modal add slide -->
                                    <div class="modal fade" id="myModalAddSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Dodaj nowe zdjęcie</h4>
                                                </div>
                                                <?php print form_open('admin/gallery_bg/add_slide/1'); ?>

                                                <div class="modal-body">

                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="title" class="col-sm-2 control-label">Tytuł</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="title" value="" class="form-control" placeholder="Musisz wpisać jakiś tytuł :)">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="btn-group" role="group" aria-label="...">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Zapisz</button>
                                                    </div>
                                                </div>
                                                <?php print form_close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Modal pic slide -->
                                    
                                </div>
                            </div>
                        </div><!--/.col-xs-12.col-lg-12-->
                    </div>
                    
                </div><!--/.col-xs-12.col-sm-9-->

            </div><!--/row-->