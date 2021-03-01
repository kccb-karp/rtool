<?php include '../header.php'; ?>
	<div class="filtersection">	
		<div class="filtertable">
			<div class="filterrow">
				<div class="filtercell">
					<div class="reportinghubfilter">
						<span class="filterheading">FILTER LOCATION</span>
						<div class="reportinghubfiltercontentwrap">
							<div class="locationstable">
								<div class="locationsrow">
									<div class="locationscell">
										<div class="facilityfilter">
											<select class="selectpicker" data-live-search="true" >
											  <option data-tokens="All Regions">All Regions</option>
											  <option data-tokens="Homabay">Homabay</option>
											  <option data-tokens="Kisii/Migori">Kisii/Migori</option>
											  <option data-tokens="Kisumu">Kisumu</option>
											  <option data-tokens="Western">Western</option>
											  <option data-tokens="Siaya">Siaya</option>
											</select>
										</div>
									</div>
									<div class="locationscell">
										<div class="facilityfilter">
											<select class="selectpicker" data-live-search="true" >
											  <option data-tokens="All Counties">All Counties</option>
											  <option data-tokens="Bungoma">Bungoma</option>
											  <option data-tokens="Busia">Busia</option>
											  <option data-tokens="HomaBay">Homa Bay</option>
											  <option data-tokens="Kakamega">Kakamega</option>
											  <option data-tokens="Kisii">Kisii</option>
											  <option data-tokens="Kisumu">Kisumu</option>
											  <option data-tokens="Migori">Migori</option>
											  <option data-tokens="Siaya">Siaya</option>
											  <option data-tokens="Vihiga">Vihiga</option>
											</select>
										</div>
									</div>
									<div class="locationscell">
										<div class="facilityfilter">
											<select class="selectpicker" data-live-search="true" >
											  <option data-tokens="All Facilities">All Facilities</option>
											  <option data-tokens="Aluor Mission Health Centre">Aluor Mission Health Centre</option>
											  <option data-tokens="Asumbi Mission Hospital">Asumbi Mission Hospital</option>
											  <option data-tokens="Awasi Mission Health Center">Awasi Mission Health Center</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filtercell">
					<div class="reportinghubfilter">
						<span class="filterheading">FILTER PERIOD</span>
						<div class="reportinghubfiltercontentwrap">
							<div class="periodtable">
								<div class="periodrow">
									<div class="periodcell">
										<div class="facilityfilter">
											<select class="selectpicker" data-live-search="true" >
											  <option data-tokens="2021">Default</option>
											  <option data-tokens="2020">Yearly</option>
											  <option data-tokens="2019">Quarterly</option>
											  <option data-tokens="2018">Monthly</option>
											  <option data-tokens="2017">Weekly</option>
											  <option data-tokens="2016">Daily</option>
											</select>
										</div>
									</div>
									<div class="periodcell">
										<div class="facilityfilter">
											<select class="selectpicker" data-live-search="true" >
											  <option data-tokens="Bungoma">Quarter 1</option>
											  <option data-tokens="Busia">Quarter 2</option>
											  <option data-tokens="HomaBay">Quarter 3</option>
											  <option data-tokens="Kakamega">Quarter 4</option>
											</select>
										</div>
									</div>
									<div class="periodcell">
										<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-bottom:0px !important;width:100%;">
										    <input class="form-control" type="text" readonly />
										    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
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
	<div class="" style="padding-right: 20px;padding-left: 20px;">
		<b>Reporting Period:</b> <span id="reportingperiod"></span>
	</div>
	<div class="allsectionwarp" style="padding: 10px;"> 
		<div class="sectioncontentwrap">
			<div class="dataatglanceheader" style="text-align: center;font-size: 10px;color: #DA251C;font-weight: 700;padding: 10px;">
				TREATMENT <button id="refreshreports" style="margin-top:-15px;font-size: 10px;color:black;"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Refresh Tx Data</button>
			</div>
			<div class="subsectionbody">
				<div class="tablediv">
					<div class="tablerowdiv">
						<div class="tablecelldiv" style="width: 30%" >
							<div class="subsectionitem" style="padding: 20px;background: #EAEAEA;border-bottom-left-radius: 4px;">
								<div class="entitytitle">
									<div class="tablediv">
										<div class="tablerowdiv">
											<div class="tablecelldiv">
												<h4 style="margin-bottom:0px !important;"><i class="fa fa-address-book" aria-hidden="true"></i> TXCURR</h4>
											</div>
											<div class="tablecelldiv" style="text-align: right;">
												<button id="refreshtxcurr" style="margin-top:5px;"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
											</div>
										</div>
									</div>
								</div>
								<div class="txcurrentityvalue"><a href="reportinghub/linelist.php" id="txcurrindicator">0000</a></div>
								<div>
									<div class="tablediv">
										<div class="tablerowdiv txcurrmoredetails">
											<div class="tablecelldiv" style="width: 50%;">
												<div class="txcurrnetnew"><a href=""><span id="netnewindicator"></span> NETNEW: <span id="netnewvalue">1036</span></a></div>
												<div class="txcurrretention"><a href="">COHORT RET 97%</a></div>
												<!--<div class="iq-progress-bar mt-3">
													<span class="bg-green" data-percent="97" style="transition: width 2s ease 0s; width: 97%;"></span>
												</div>-->
											</div>
											<div class="tablecelldiv" style="width: 50%;">
												<div class="txcurrnetnew"><a href="">Valid Vls: 90%</a></div>
												<div class="txcurrretention"><a href="">Suppressed: 96%</a></div>
												<!--<div class="iq-progress-bar mt-3">
													<span class="bg-green" data-percent="97" style="transition: width 2s ease 0s; width: 97%;"></span>
												</div>-->
											</div>
										</div>
									</div>
								</div>
								<div class="textcenter">-----------------------</div>
								<div class="previoustxcurrvalue" style="position: relative;">
									<button class="refreshprevioustxcurrbtn" id="refreshprevioustxcurr"><i class="fa fa-refresh" aria-hidden="true"></i></button>
									<span><a href="" id="previoustxcurrvallink"><b>PREVIOUS TXCURR: <span id="previoustxcurrval">0000</span></b></a></span>
									<div class="dropdown previoustxcurrchange">
										<span>&nbsp;&nbsp;<a><i class="fa fa-cog" aria-hidden="true"></i></a></span>
										<div class="dropdown-content">
											<input type="radio" id="lastweek" name="gender" value="Last Week">
											<label for="lastweek">Last Week</label><br>
											<input type="radio" id="lastmonth" name="gender" value="Last Month">
											<label for="lastmonth">Last Month</label><br>
											<input type="radio" id="lastquarter" name="gender" value="Last Quarter">
											<label for="lastquarter">Last Quarter</label><br>
											<input type="radio" id="lastyearr" name="gender" value="Last Year">
											<label for="lastyear">Last Year</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tablecelldiv">
							<div class="tablediv">
								<div class="tablerowdiv topsubentities">
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshtxnew"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="txnewlinelistlink">
												<div class="entitytitle" style="color: #79EC7D;"><h4><i class="fa fa-plus-circle" aria-hidden="true"></i> NEW</h4></div>
												<div class="entitytitle"><h4><b><span id="txnewindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew gainmoredetails">Lost: <span id="newlost">0</span> Died: <span id="newdied">0</span> TO: <span id="newto">0</span></div>
												<div class="txcurrretention">ACTIVE: <span id="newnet">_</span></div>
											</a>
										</div>
									</div>
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshrtt"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="txrttlinelistlink">
												<div class="entitytitle" style="color: #05BBC9;"><h4><i class="fa fa-retweet" aria-hidden="true"></i> RTT</h4></div>
												<div class="entitytitle"><h4><b><span id="txrttindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew gainmoredetails">Lost: 0  Died: 0 TO: 0</div>
												<div class="txcurrretention">ACTIVE: <span id="rttnet">_</span></div>
											</a>
										</div>
									</div>
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshti"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="tislinelistlink">
												<div class="entitytitle" style="color: #43D396;"><h4><i class="fa fa-share" aria-hidden="true"></i> TRANSFER IN</h4></div>
												<div class="entitytitle"><h4><b><span id="tisindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew gainmoredetails">Lost: 0  Died: 0 TO: 0</div>
												<div class="txcurrretention">ACTIVE: <span id="tisnet">_</span></div>
											</a>
										</div>
									</div>
								</div>
								<div class="tablerowdiv">
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshdeath"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="deathslinelistlink">
												<div class="entitytitle" style="color: #F65959;"><h4><i class="fa fa-hourglass-end" aria-hidden="true"></i> DEATH</h4></div>
												<div class="entitytitle"><h4><b><span id="deathsindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew" style="font-size: 12px;">
													Prev Active <span id="previousactivedeaths" class="lossessmoreanalysisvalue">0</span>  
													Prev TXML <span id="previousltfudeaths" class="lossessmoreanalysisvalue">0</span>
													Not in Tx <span id="notintxdeaths" class="lossessmoreanalysisvalue">0</span>
												</div>
											</a>
										</div>
									</div>
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshltfu"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="ltfulinelistlink">
												<div class="entitytitle" style="color: #FCCCA9;"><h4><i class="fa fa-star-half-o" aria-hidden="true"></i> LTFU</h4></div>
												<div class="entitytitle"><h4><b><span id="ltfuindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew" style="font-size: 12px;">Also Called Drug Interruption</div>
											</a>
										</div>
									</div>
									<div class="tablecelldiv subentittiesdiv">
										<div class="entitycontainer" style="position: relative;">
											<button class="refreshsinglebtn" id="refreshtos"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											<a href="" id="toslinelistlink">
												<div class="entitytitle" style="color: #FE721C;"><h4><i class="fa fa-reply" aria-hidden="true"></i> TRANSFER OUT</h4></div>
												<div class="entitytitle"><h4><b><span id="tosindicator">1005</span></b></h4></div>
												<div class="txcurrnetnew" style="font-size: 12px;">
													Prev Active <span id="previousactivetos" class="lossessmoreanalysisvalue">0</span>  
													Prev TXML <span id="previousltfutos" class="lossessmoreanalysisvalue">0</span>
													Not in Tx <span id="notintxtos" class="lossessmoreanalysisvalue">0</span>
												</div>
											</a>
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