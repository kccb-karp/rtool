<?php include '../header.php'; ?>
	<div class="filtersection" style="width: 100%;">	
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
	<div id="displaylinelisterror" class="linelisterrorsection">
		<b>Sorry, No Data Available for <?php echo $_GET["reportingtbl"]; ?>.</b>
		<br> 
		Please contact the developer for further explanation. Thank you.
		<br>
		<br>
		<a href="reportinghub">GO BACK TO DASHBOARD</a>
	</div>
	<div class="linelistactioncontainer">
		<div class="linelistactionbar">
			<div class="linelistactionbarcontentwrap">
				<div class="tablediv">
					<div class="tablerowdiv">
						<div class="tablecelldiv">
							<a href="reportinghub"><span class="notification-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back To Dashboard</span></a>
						</div>
						<div class="tablecelldiv">
							<a href="reportinghub/charts.php"><span class="notification-success"><i class="fa fa-bars" aria-hidden="true"></i> LineList</span></a>
						</div>
						<div class="tablecelldiv">
							<a href=""><span class="notification-success"><i class="fa fa-users" aria-hidden="true"></i> Age sex Distribution</span></a>
						</div>
						<div class="tablecelldiv">
							<a href=""><span class="notification-success"><i class="fa fa-columns" aria-hidden="true"></i> Compare</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="reportingdashboardbody linelistcontainer" id="displaylinelist" style="background: #fff;">
		<div class="txcurrsection">
			<div class="tablediv" style="width: 100%;">
				<div class="tablerowdiv">
					<div class="tablecelldiv">
						<div class="tablediv" style="width: 100%;">
							<div class="tablerowdiv">
								<div class="tablecelldiv">
									<div class="linelistsection" style="margin-bottom: 50px;overflow-x: scroll;position: relative">
										<div class="exporttoexcellwrap" style="position: absolute;z-index: 999;left: 40%;">
											<form action='getdata/datatoexcel.php' method='post'>
												<input type="hidden" name="tablename" value="<?php echo $_GET['reportingtbl']?>">
												<button name="submit" style="background: #016F36;color: #fff;border: 1px solid #016F36;border-radius: 2px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Linelist to Excel</button>
											</form>
										</div>
										<table id="table_id" class="display loaddata">
										    <thead>
								                <tr>
								                    <th>FacilityName</th>
								                    <th>CCCNumber</th>
								                    <th>gender</th>
								                    <th>birhdate</th>
								                    <th>AgeAtLastVisit</th>
								                    <th>patienttype</th>
								                    <th>HIVEnrollmentDate</th>
								                </tr>
								            </thead> 
								            <tfoot>
								                <tr>
								                    <th>FacilityName</th>
								                    <th>CCCNumber</th>
								                    <th>gender</th>
								                    <th>birhdate</th>
								                    <th>AgeAtLastVisit</th>
								                    <th>patienttype</th>
								                    <th>HIVEnrollmentDate</th>
								                </tr>
								            </tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="chartcontainer linelistcontainer" style="min-height: 400px;text-align: center;margin-bottom: 20px;background: #fff;">
		<div class="conteinerheader">
			<h4>Age Group Sex Distribution</h4>
		</div>
	    <div id="pyramid">
	    </div>
	</div>
<?php include '../footer.php'; ?>
<script src="https://d3js.org/d3.v4.min.js"></script> 
<script src="theme/js/popPyramid.min.js"></script>
<script>
var reportingtbl = getUrlVars()["reportingtbl"];
$.ajax({
 	type: "POST",
	url: 'getdata/agegender.php',
	data: {tblname: reportingtbl},
	success: function(data){
		var result = jQuery.parseJSON(data);
		var convertdata = [];
	 	$.each( result, function( key, value ) {
	 		convertdata.push({ age: ''+value['age']+'', male: parseInt(value['male']), female: parseInt(value['female']) });
	     });

		var options = {
		  height: 400,
		  width: 800,
		  style: {
		    leftBarColor: "#016F36",
		    rightBarColor: "#ED7599"
		  }
		}
		pyramidBuilder(convertdata, '#pyramid', options);
	}
});

</script>