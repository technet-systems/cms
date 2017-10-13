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
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blok tekstowy</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nagłówek</th>
                                                <th>Tekst</th>
                                                <th>Zdjęcie</th>
                                                <th>Aktualizacja</th>
                                                <th class="col-lg-2">Operacje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($start as $item) { ?>
                                            <?php if($item->c1_id == 3) { ?>
                                            
                                            <tr>
                                                <td><?php print $item->c1_id; ?></td>
                                                <td><?php print $item->c1_header; ?></td>
                                                <td><?php print $item->c1_text; ?></td>
                                                <td><img src="<?php print base_url('uploads/'.$item->c1_pic); ?>" width="175" class="img-responsive img-thumbnail"></td>
                                                <td><?php print $item->c1_timestamp; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangeText<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-pencil"></span> Zmień</button>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangePic<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-picture"></span> Zmień</button>
                                                    </div>
                                                    
                                                    <!-- Modal change text message -->
                                                    <div class="modal fade" id="myModalChangeText<?php print $item->c1_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Edycja bloku tekstowego</h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c1_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open('admin/content_about/update_article/'.$item->c1_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <label for="header" class="col-sm-2 control-label">Nagłówek</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="header" value="<?php print $item->c1_header; ?>" class="form-control" placeholder="Musisz wpisać jakiś nagłówek!">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="text" class="col-sm-2 control-label">Treść</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea name="text" cols="40" rows="3" class="form-control" placeholder="Musisz wpisać jakiś tekst!" ><?php print $item->c1_text; ?></textarea>
                                                                                <script>
                                                                                    CKEDITOR.replace('text');
                                                                                </script>
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
                                                    
                                                    <!-- Modal change pic message -->
                                                    <div class="modal fade" id="myModalChangePic<?php print $item->c1_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Zmiana zdjęcia</h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c1_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open_multipart('admin/content_about/update_pic/'.$item->c1_id); ?>
                                                                
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
                                                    <!-- /. Modal change pic message -->
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--/.col-xs-12.col-lg-12-->
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ustawienia strony</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="form-horizontal">
                                        <?php print form_open('admin/content_about/update_properties/2'); ?>
                                        <?php foreach($meta_start as $item) { ?>
                                        
                                        <div class="form-group">
                                            <label for="meta_title" class="col-sm-2 control-label">Tytuł</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="meta_title" value="<?php print $item->c2_meta_title; ?>" class="form-control" placeholder="Wpisz tytuł strony, który będzie się wyświetlał w zakładce przeglądarki">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_copyright" class="col-sm-2 control-label">Autor</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="meta_copyright" value="<?php print $item->c2_meta_copyright; ?>" class="form-control" placeholder="Wpisz autora strony">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description" class="col-sm-2 control-label">Opis</label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description" cols="40" rows="3" class="form-control" placeholder="Opisz swoją stronę"><?php print $item->c2_meta_description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords" class="col-sm-2 control-label">Słowa kluczowe <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Wpisane frazy oddzielaj przecinkiem"></span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="meta_keywords" value="<?php print $item->c2_meta_keywords; ?>" class="form-control" placeholder="Wypisz słowa kluczowe związane ze stroną">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_robots" class="col-sm-2 control-label">Indeksowanie</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-primary <?php if($item->c2_meta_robots == 'index,follow') print 'active'; ?>">
                                                        <input type="radio" name="meta_robots" id="option1" value="index,follow" autocomplete="off" <?php if($item->c2_meta_robots == 'index,follow') print 'checked'; ?>> Włącz
                                                    </label>
                                                    <label class="btn btn-primary <?php if($item->c2_meta_robots == 'noindex,nofollow') print 'active'; ?>">
                                                        <input type="radio" name="meta_robots" id="option2" value="noindex,nofollow" autocomplete="off" <?php if($item->c2_meta_robots == 'noindex,nofollow') print 'checked'; ?>> Wyłącz
                                                    </label>
                                                </div>
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