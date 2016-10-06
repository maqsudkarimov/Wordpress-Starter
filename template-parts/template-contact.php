		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
				<br>
					<div class="panel panel-default">
						<div class="panel-body">

							<form id="ContactForm" name="ContactForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="Name">Name</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="Name" placeholder="Name" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="Email">Email</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="Email" placeholder="Email" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="Message">Message</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="3" name="Message" placeholder="Message"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="Image">Image</label>
									<div class="col-sm-5">
										<input type="file" class="form-control" name="Image">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-9 col-sm-offset-4">
										<button type="submit" class="btn btn-primary" id="submit" value="Submit">Submit</button>
									</div>
								</div>

							</form>
							
						</div>	
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
		    	<div class="modal-content">
			      	<div class="modal-body">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        		<span aria-hidden="true">&times;</span>
			        	</button>
			        	Message Sent
			      	</div>
		    	</div>
		  	</div>
		</div>
