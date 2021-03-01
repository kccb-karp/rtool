<?php include 'header.php'; ?>
	<div class="introductionpage" id="introbody">
		<div class="welcomecontent" style="height: 100%;">
			<div class="tablediv" style="width: 50%;margin: 0px auto;height: 100%;">
				<div class="tablerowdiv">
					<div class="tablecelldiv" style="height: 100%;vertical-align: middle;">
						<div class="welcometext homewelcometext" style="text-align: center;">
							WELCOME TO <span class="rtooltext">R-TOOL</span>
						</div>
						<div class="">
							For DATA Reporting and Analysis
						</div>
						<div class="dataatglance" style="">
							<div class="dataatglanceheader">
								DATA AT A GLANCE 
							</div>
							<div class="dataatglancebody">
								<div class="tablediv">
									<div class="tablerowdiv">
										<div class="tablecelldiv">
											<div class="dataheader">
												<i class="fa fa-stethoscope" aria-hidden="true"></i> HTS_TST
											</div>
											<div class="datavalue">
												<span id="htststindicator">0</span>
											</div>
										</div>
										<div class="tablecelldiv">
											<div class="dataheader">
												<i class="fa fa-plus-square-o" aria-hidden="true"></i> TX_NEW
											</div>
											<div class="datavalue">
												<span id="txnewindicator">0</span>
											</div>
										</div>
										<div class="tablecelldiv">
											<div class="dataheader">
												<i class="fa fa-check-square-o" aria-hidden="true"></i> TX_CURR
											</div>
											<div class="datavalue">
												<span id="txcurrindicator">0</span>
											</div>
										</div>
										<div class="tablecelldiv">
											<div class="dataheader">
												<i class="fa fa-venus" aria-hidden="true"></i> PMTCT_ART
											</div>
											<div class="datavalue">
												<span id="pmtctartindicator">0</span>
											</div>
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
	<!-- <div class="facilitysearch">
		<select class="selectpicker" data-live-search="true">
		  <option data-tokens="All Facilities">All Facilities</option>
		  <option data-tokens="Aluor Mission Health Centre">Aluor Mission Health Centre</option>
		  <option data-tokens="Asumbi Mission Hospital">Asumbi Mission Hospital</option>
		  <option data-tokens="Awasi Mission Health Center">Awasi Mission Health Center</option>
		</select>
	</div>
	<div class="homenotification" style="z-index: 1000;">
		<div class="homenotificationcontentwrap">
			<span class="notification-error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 5 Databases</span>&nbsp;
			<span class="notification-success"><i class="fa fa-info-circle" aria-hidden="true"></i> 52 Databases</span>
		</div>
	</div>
	<div style="position:relative;width:100%;height: 500px !important;">
        <canvas id="canvas"></canvas>
    </div> -->
	<!-- <div class="home-banner" id="homebannercontainer">
		<div class="home-content-wrap">
			<div class="content-wrap">
				<?php //include 'nav.php'; ?>
				<div class="banner-content">
					<div class="banner-content-cell" style="text-align:center;">
						<div class="main-actions">
							<a href="connect.php" class="main-action-item">
								<div class="main-action-item-con">
									<i class="fa fa-power-off" aria-hidden="true"></i><br>
									REPORTS
								</div>
							</a>
							<a href="databases.php" class="main-action-item">
								<div class="main-action-item-con">
									<i class="fa fa-users" aria-hidden="true"></i><br>
									DATABASES
								</div>
							</a>
						</div>
						<div class='home-motto'>
							<p>Kenya AIDS Response Program</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<?php include 'footer.php'; ?>