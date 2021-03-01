<?php include '../header.php'; ?>
<?php
	//echo $_GET['reportingtbl']; 
?>
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
	<div class="chartcontainer" style="min-height: 400px;border: 1px solid blue;">
        <div class="col-md-12" style="text-align: center;border: 1px solid red;">
            <div id="pyramid">
            </div>
        </div>
	</div>
<?php include '../footer.php'; ?>

<script>
// data must be in a format with age, male, and female in each object
var exampleData = [{ age: '0-9', male: 10, female: 12 }, { age: '10-19', male: 14, female: 15 }, { age: '20-29', male: 15, female: 18 }, { age: '30-39', male: 18, female: 18 }, { age: '40-49', male: 21, female: 22 }, {age: '50-59', male: 19, female: 24 }, { age: '60-69', male: 15, female: 14 }, {age: '70-79', male: 8, female: 10 }, { age: '80-89', male: 4, female: 5 }, {age: '90+', male: 2, female: 3 }];

var options = {
  height: 400,
  width: 600,
  style: {
    leftBarColor: "#229922",
    rightBarColor: "#992222"
  }
}
pyramidBuilder(exampleData, '#pyramid', options);
</script>