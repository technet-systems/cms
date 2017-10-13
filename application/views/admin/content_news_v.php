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
                    <?php } else if(isset($message_change_status)) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-ok"></span> <?php print $message_change_status; ?>
                    </div>
                    <?php } else if(isset($message_add_article)) {?>
                    
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Uwaga!</strong> <?php print $message_add_article; ?>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista artykułów</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tytuł</th>
                                                <th>Podtytuł</th>
                                                <th>Tekst</th>
                                                <th>Zdjęcie</th>
                                                <th>Aktualizacja</th>
                                                <th class="col-lg-2">Operacje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($start as $item) { ?>
                                            
                                            <tr class="<?php if($item->c1_status == 0) print 'text-muted'; ?>">
                                                <td><?php print $item->c1_id; ?></td>
                                                <td><?php print $item->c1_title; ?></td>
                                                <td><?php print word_limiter($item->c1_subtitle, 4); ?></td>
                                                <td><?php print word_limiter($item->c1_text, 8); ?></td>
                                                <td><img src="<?php if(!empty($item->c1_pic)) { print base_url('uploads/'.$item->c1_pic); } else { print 'http://placehold.it/100&text=Fota'; } ?>" width="100" class="img-responsive img-thumbnail"></td>
                                                <td><?php print $item->c1_timestamp; ?></td>
                                                <td>
                                                    <div class="btn-group-vertical btn-group-xs" role="group" aria-label="...">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangeText<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-pencil"></span> Tekst</button>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangePic<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-picture"></span> Obrazek</button>
                                                        <?php if($item->c1_status == 0) { ?>
                                                        
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalChangeStatus<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-eye-close"></span> Status</button>
                                                        <?php } else { ?>
                                                        
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalChangeStatus<?php print $item->c1_id; ?>"><span class="glyphicon glyphicon-eye-open"></span> Status</button>
                                                        <?php } ?>
                                                        
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
                                                                <?php print form_open('admin/content_news/update_article/'.$item->c1_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <label for="title" class="col-sm-2 control-label">Nagłówek</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="title" value="<?php print $item->c1_title; ?>" class="form-control" placeholder="Musisz wpisać jakiś tytuł!">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="subtitle" class="col-sm-2 control-label">Nagłówek</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="subtitle" value="<?php print $item->c1_subtitle; ?>" class="form-control" placeholder="Musisz wpisać jakiś podtytuł!">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="text" class="col-sm-2 control-label">Treść</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea name="text" id="text<?php print $item->c1_id; ?>" cols="40" rows="3" class="form-control" placeholder="Musisz wpisać jakiś tekst!" ><?php print $item->c1_text; ?></textarea>
                                                                                <script>
                                                                                    CKEDITOR.replace('text<?php print $item->c1_id; ?>');
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
                                                                <?php print form_open_multipart('admin/content_news/update_pic/'.$item->c1_id); ?>
                                                                
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
                                                    
                                                    <!-- Modal change status message -->
                                                    <div class="modal fade" id="myModalChangeStatus<?php print $item->c1_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Zmiana statusu podstrony: <b><?php print $item->c1_title; ?></b></h4>
                                                                    <small>Ostatnie zmiany: <?php print $item->c1_timestamp; ?></small>
                                                                </div>
                                                                <?php print form_open('admin/content_news/update_status/'.$item->c1_id); ?>
                                                                
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <label for="header" class="col-sm-2 control-label">Wybierz opcję</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="btn-group" data-toggle="buttons">
                                                                                    <label class="btn btn-primary <?php if($item->c1_status == 1) print 'active'; ?>">
                                                                                        <input type="radio" name="status" id="option1" value="1" autocomplete="off" checked> Widoczny
                                                                                    </label>
                                                                                    <label class="btn btn-primary <?php if($item->c1_status == 0) print 'active'; ?>">
                                                                                        <input type="radio" name="status" id="option2" value="0" autocomplete="off"> Niewidoczny
                                                                                    </label>
                                                                                </div>
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
                                                    <!-- /. Modal change status message -->
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>

                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddArticle"><span class="glyphicon glyphicon-plus"></span> Dodaj artykuł</button>
                                    </div>
                                    
                                    <!-- Modal add article -->
                                    <div class="modal fade" id="myModalAddArticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Dodaj nowy artykuł</h4>
                                                </div>
                                                <?php print form_open('admin/content_news/add_article/3'); ?>

                                                <div class="modal-body">

                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="title" class="col-sm-2 control-label">Tytuł</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="title" value="" class="form-control" placeholder="Musisz wpisać jakiś tytuł :)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="subtitle" class="col-sm-2 control-label">Podtytuł</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="subtitle" value="" class="form-control" placeholder="Musisz wpisać jakiś podtytuł :)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="text" class="col-sm-2 control-label">Tekst</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="text" id="addArticle" cols="40" rows="3" class="form-control" placeholder="Musisz wpisać jakiś tekst!" ></textarea>
                                                                <script>
                                                                    CKEDITOR.replace('addArticle');
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
                                    <!-- /. Modal add article -->
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
                                        <?php print form_open('admin/content_news/update_properties/3'); ?>
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