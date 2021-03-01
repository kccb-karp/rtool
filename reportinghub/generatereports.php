<style type="text/css">
	.main-actions{display:table;vertical-align: middle;width: 50%;text-align: center;margin: 0px auto;}
	.main-action-item{display: table-cell;text-align: center;}
	.main-action-item-con{border: 1px solid #fff;border-radius: 10px;width: 100px;margin: 0px auto;padding: 30px 10px;color: #fff;}
	.main-action-item-con:hover{color: #f8c217;border: 1px solid #f8c217;}
	.main-action-item-con i{font-size: 20px;margin-bottom: 5px;}
	.home-motto{margin-top: 100px;font-style: italic;}

	.facilitysearch{background:#fff;position: absolute;margin-top: 10px;margin-left: 10px;}
	.homenotification{position: absolute;right: 0px;margin-right: 10px;padding: 5px;margin-top: 10px;
		box-shadow:0 4px 5px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;}
	.homenotificationcontentwrap{border: 1px solid #000;padding-right: 5px;padding-left: 5px;}
	.notification-error{color: #F68080;}
	.notification-success{color: #4DC274;}
	/*.main-action-item a{color: #fff !important;}*/
</style>
<?php include '../header.php'; ?>
	<div class="reportingdashboardbody" style="padding-bottom: 30px;min-height: 83.9%;">
		<div class="dataatglancebody generatereportbody" style="width: 60%;margin: 0px auto;">
			<div class="tablediv" style="height: 78%">
				<div class="tablerowdiv">
					<div class="tablecelldiv" style="vertical-align: middle;">
						<div class="dataatglance">
							<div class="dataatglanceheader" style="background: #DA251C;color: #fff;">
								GENERATE REPORTS
							</div>
							<div class="dataatglancebody">
								<div class="tablediv">
									<div class="tablerowdiv">
										<div class="tablecelldiv">
										</div>
										<div class="tablecelldiv" style="text-align: left;">
											<div class="">
												SELECT REPORT TYPE
											</div>
											<div class="">
												<select name="reporttype" id="reporttype" style="width: 100%">
													<option value="Quarterly">Quarterly</option>
													<option value="Monthly">Monthly</option>
													<option value="LEAP">LEAP</option>
													<option value="Daily">Daily</option>
												</select>
											</div>
											<div class="">
												SELECT REPORTING DATE
											</div>
											<div class="">
												<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-bottom:0px !important;width:100%;">
												    <input class="form-control" type="text" readonly />
												    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
												</div>
											</div>
										</div>
										<div class="tablecelldiv">
										</div>
									</div>
								</div>
							</div>
							<div class="homerefreshdate" style="margin-bottom: 20px;">
								<span>Last Data Refresh Date: <span id="refreshdate"></span></span>
							</div>
							<div class="dashboardlink">
								<div class="tablediv">
									<div class="tablerowdiv">
										<div class="tablecelldiv" style="text-align: right;padding-right: 5px;">
											<a href="reportinghub"><i class="fa fa-th" aria-hidden="true"></i> GO TO DASHBOARD</a>
										</div>
										<div class="tablecelldiv" style="text-align: left;padding-left: 5px;">
											<a href="reportinghub/graphicaltrend.php"><i class="fa fa-line-chart" aria-hidden="true"></i> GRAPHICAL TREND</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include '../footer.php'; ?>