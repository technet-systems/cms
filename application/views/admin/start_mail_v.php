                <div class="col-xs-12 col-sm-9">
                    <p class="pull-left visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>

                    <?php if(isset($message_delete_mail)) { ?>
                    
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Uwaga!</strong> <?php print $message_delete_mail; ?>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Otrzymane maile</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Imię</th>
                                                <th>E-mail</th>
                                                <th>Data i czas</th>
                                                <th>Operacje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($mails as $mail) { ?>

                                            <tr>
                                                <td><?php print $mail->b1_id; ?></td>
                                                <td><?php print $mail->b1_fname; ?></td>
                                                <td><?php print $mail->b1_email; ?></td>
                                                <td><?php print $mail->b1_timestamp; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalRead<?php print $mail->b1_id; ?>"><span class="glyphicon glyphicon-comment"></span> Czytaj</button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete<?php print $mail->b1_id; ?>"><span class="glyphicon glyphicon-trash"></span> Usuń</button>
                                                    </div>
                                                    
                                                    <!-- Modal read message -->
                                                    <div class="modal fade" id="myModalRead<?php print $mail->b1_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Szczegóły wiadomości od: <b><?php print $mail->b1_fname; ?></b>, telefon: <b><?php print $mail->b1_phone; ?></b></h4>
                                                                    <small>(<?php print $mail->b1_timestamp; ?>)</small>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php print $mail->b1_message; ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="btn-group" role="group" aria-label="...">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. Modal read message -->
                                                                                                        
                                                    <!-- Modal delete message -->
                                                    <div class="modal fade" id="myModalDelete<?php print $mail->b1_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <?php print form_open('admin/start_mail/fake_delete_mail/'.$mail->b1_id); ?>
                                                                
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Usuwanie wiadomości od: <b><?php print $mail->b1_fname; ?></b>, telefon: <b><?php print $mail->b1_phone; ?></b></h4>
                                                                    <small>(<?php print $mail->b1_timestamp; ?>)</small>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Czy na pewno usunąć wiadomość?
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
                                                    <!-- /. Modal delete message -->
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- /row -->
                    
                </div><!--/.col-xs-12.col-sm-9-->

            </div><!--/row-->