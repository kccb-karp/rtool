<style type="text/css">
	.main-actions{display:table;vertical-align: middle;width: 50%;text-align: center;margin: 0px auto;}
	.main-action-item{display: table-cell;text-align: center;}
	.main-action-item-con{border: 1px solid #fff;border-radius: 10px;width: 100px;margin: 0px auto;padding: 30px 10px;color: #fff;}
	.main-action-item-con:hover{color: #f8c217;border: 1px solid #f8c217;}
	.main-action-item-con i{font-size: 20px;margin-bottom: 5px;}
	.banner-content{background: rgba(228, 228, 228, 0.6);}
	.content-row{display: table-row;}
	.home-motto{font-style: italic;vertical-align: bottom;}
	.home-motto p{font-size: 10px !important;}
	.bottom-content-row{height: 5%;}
	.connect-action-table{display: table;width: 100%;height: 100%;}
	.connect-action-row{display: table-row;}
	.connect-action-cell{display: table-cell;}
	.connect-action-cell-left{width: 35%;}
	.connect-action-cell-right{width: 65%;background: rgba(255, 255, 255, 0.8);}
	.connect-btn{display: block;text-align: left;padding: 10px 20px;}
	/*.main-action-item a{color: #fff !important;}*/
</style>
<?php include 'header.php'; ?>
	<div class="home-banner" id="homebannercontainer">
		<div class="home-content-wrap">
			<div class="content-wrap">
				<?php include 'nav.php'; ?>
				<div class="banner-content" style="border:1px solid #DADADA;">
					<div class="content-row">
						<div class="banner-content-cell connect-section" style="text-align:center;">
							<div class="connect-action-table">
								<div class="connect-action-row">
									<div class="connect-action-cell connect-action-cell-left">
										<div class="connect-btn">
											<i class="fa fa-power-off" aria-hidden="true"></i> I want to Join
										</div>
										<div class="connect-btn">
											<i class="fa fa-user-plus" aria-hidden="true"></i> Add new Member
										</div>
										<div class="connect-btn">
											<i class="fa fa-handshake-o" aria-hidden="true"></i> Refer Someone
										</div>
									</div>
									<div class="connect-action-cell connect-action-cell-right">
										FORM
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="content-row bottom-content-row">
						<div class='home-motto'>
							<p>CONNECT  .  RELATE  .  GROW  .  GO</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>