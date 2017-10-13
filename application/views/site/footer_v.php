<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<ul class="list-inline">
						<li><h2>Znajdź nas na</h2></li>
						<li><a href="https://www.facebook.com/dm.auto.zabrze" target="_blank"><i class="fa fa-facebook-official fa-3x"></i></a></li>
                                                
					</ul>
                    <ul class="list-inline">
                        <li>Wykonanie: <a href="http://technet.systems" target="_blank"><img src="<?php echo base_url() . 'uploads/technet-logo.png'; ?>" alt="technet.systems logo" width="120" /></a></li>
                    </ul>
                </div>
			</div>
		</div>
        </div>
    </footer>
	
	<!-- Modal Message Box -->
	<div class="modal fade" tabindex="-1" role="dialog" id="message_box">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Uwaga!</h4>
				</div>
				<div class="modal-body">
					<p>Do dnia 09.10.2016 nieczynne z powodu urlopu.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /Modal Message Box -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php print base_url('assets/js/bootstrap.min.js'); ?>"></script>
    
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	<script>
		$(window).load(function(){
			$('#message_box').modal('show');
		};
	</script>
    
</body>

</html>