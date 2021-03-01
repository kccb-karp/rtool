$(window).on('load', function() {
	//$('#txcurrindicator').html('82500');
	//gettxcurrvalue();
	getcurrenttxcurrentcount();
});


function gettxcurrvalue(){
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurrdec'},
		success: function(data){
			//alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {  
		   		$('#txcurrindicator').html(value['Total']);
				getprevioustxcurrvalue();
	        });
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getprevioustxcurrvalue(){
	$.ajax({
	 	type: "POST",
		url: 'getdata/getprevioustxcurr.php',
		data: {indicator: 'txcurrdec'},
		success: function(data){
			//alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {  
		   		$('#previoustxcurrval').html(value['Total']);
				getprevioustxcurrvalue();
	        });
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

$(document).ready(function() {
	var pathname = window.location.pathname;

	if(pathname === '/rtooli/reportinghub/linelist.php'){
		var txcurrlinelist = getLinelists();
	}
	
	function getLinelists() {
	    //alert("lessons");
	    var reportingtbl = getUrlVars()["reportingtbl"];
	    $.ajax({
	        type: "POST",
	        url: "getdata/getxcurrlinelist.php",
	        data: {reportingtbl:reportingtbl},
	        success: function (response) {
	        	if(response == '"No Data"'){
	        		$('#displaylinelisterror').show();
	        		$('#displaylinelist').hide();
	        	}
	        	else{
	        		$('#displaylinelisterror').hide();
	        		$('#displaylinelist').show();
	        		var responsed = jQuery.parseJSON(response);
		            $('#table_id').dataTable({
					   "data": responsed,
					   "destroy": true,
					   "deferRender": true,
					   "columns": [
					      { "data": "FacilityName" },
					      { "data": "CCCNumber" }, 
					      { "data": "gender" },
					      { "data": "birthdate" },
					      { "data": "AgeAtLastVisit" },
					      { "data": "patienttype" },
					      { "data": "HIVEnrollmentDate" }
					    ]
					});
	        	}
	        }
	    });
	}

	function advancedDataTable(data, table) {
	    alert("table");
	    alert(data);
	    $('#' + table).DataTable({
	        data: data,
	        destroy: true,
	        paging: true,
	        searching: true,
	        info: false,
	        ordering: true,
	        columnDefs: [
	            {
	                "targets": [0],
	                "visible": false,
	                "searchable": false
	            }
	        ]
	    });
	}

});

var reportingperiod= getreportingperiod();

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getreportingperiod(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var lastreportingperiod = new Date(date);
	lastreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var nd = new Date(lastreportingperiod);
	var dd = String(nd.getDate()).padStart(2, '0');
	var mm = String(nd.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = nd.getFullYear();
	lastReportingPeriod = yyyy + '-' + mm + '-' + dd;
	return lastReportingPeriod;
}

function getreportingperiod(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var lastreportingperiod = new Date(date);
	lastreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var nd = new Date(lastreportingperiod);
	var dd = String(nd.getDate()).padStart(2, '0');
	var mm = String(nd.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = nd.getFullYear();
	lastReportingPeriod = yyyy + '-' + mm + '-' + dd;
	return lastReportingPeriod;
}

function getnewmonth(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var dd = String(firstDay.getDate()).padStart(2, '0');
	var mm = String(firstDay.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = firstDay.getFullYear();
	var newmonth = yyyy + '-' + mm + '-' + dd;
	return newmonth;
}

function getreportingmonth(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var lastreportingperiod = new Date(date);
	lastreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var nd = new Date(lastreportingperiod);
	var dd = String(nd.getDate()).padStart(2, '0');
	var mm = String(nd.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = nd.getFullYear();
	lastReportingPeriod = yyyy + '-' + mm + '-' + dd;
	const monthNames = ["January", "February", "March", "April", "May", "June",
	  "July", "August", "September", "October", "November", "December"
	];
	var monthname = monthNames[nd.getMonth()]
	return monthname;
}


function getpreviousreportingmonth(){
	var today = new Date();
	var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	var currentreportingperiod = new Date(today);
	currentreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var crenddate = new Date(currentreportingperiod);
	var firstDayofcrp = new Date(crenddate.getFullYear(), crenddate.getMonth(), 1);
	var lstdateinit = new Date();
	var ldate = firstDayofcrp.setDate(firstDayofcrp.getDate()-1);
	var lastrpenddate = new Date(ldate);
	const monthNames = ["January", "February", "March", "April", "May", "June",
	  "July", "August", "September", "October", "November", "December"
	];
	var monthname = monthNames[lastrpenddate.getMonth()];
	return monthname;
}

function getpreviousreportingyear(){
	var today = new Date();
	var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	var currentreportingperiod = new Date(today);
	currentreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var crenddate = new Date(currentreportingperiod);
	var firstDayofcrp = new Date(crenddate.getFullYear(), crenddate.getMonth(), 1);
	var lstdateinit = new Date();
	var ldate = firstDayofcrp.setDate(firstDayofcrp.getDate()-1);
	var lastrpenddate = new Date(ldate);
	var yyyy = lastrpenddate.getFullYear();
	return yyyy;
}

function getreportingyear(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var lastreportingperiod = new Date(date);
	lastreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var nd = new Date(lastreportingperiod);
	var dd = String(nd.getDate()).padStart(2, '0');
	var mm = String(nd.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = nd.getFullYear();
	return yyyy;
}


function getrpstartdate(){
	var today = new Date();
	var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	var currentreportingperiod = new Date(today);
	currentreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var crenddate = new Date(currentreportingperiod);
	var firstDayofcrp = new Date(crenddate.getFullYear(), crenddate.getMonth(), 1);
	var dd = String(firstDayofcrp.getDate()).padStart(2, '0');
	var mm = String(firstDayofcrp.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = firstDayofcrp.getFullYear();
	currentrpstartdate = yyyy + '-' + mm + '-' + dd;
	return currentrpstartdate;
	//return lastReportingPeriod;
}


function getrpenddate(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var lastreportingperiod = new Date(date);
	lastreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var nd = new Date(lastreportingperiod);
	var dd = String(nd.getDate()).padStart(2, '0');
	var mm = String(nd.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = nd.getFullYear();
	lastReportingPeriod = yyyy + '-' + mm + '-' + dd;
	return lastReportingPeriod;
}

function getlastrpstartdate(){
	var today = new Date();
	var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	var currentreportingperiod = new Date(today);
	currentreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var crenddate = new Date(currentreportingperiod);
	var firstDayofcrp = new Date(crenddate.getFullYear(), crenddate.getMonth(), 1);
	var lstdateinit = new Date();
	var ldate = firstDayofcrp.setDate(firstDayofcrp.getDate()-1);
	var lastrpenddate = new Date(ldate);
	var firstDayoflrp = new Date(lastrpenddate.getFullYear(), lastrpenddate.getMonth(), 1);
	var dd = String(firstDayoflrp.getDate()).padStart(2, '0');
	var mm = String(firstDayoflrp.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = firstDayoflrp.getFullYear();
	lastrpstartdate = yyyy + '-' + mm + '-' + dd;
	alert(lastrpstartdate);
	//return lastrpenddate;
}

function getlastrpenddate(){
	var today = new Date();
	var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	var currentreportingperiod = new Date(today);
	currentreportingperiod.setDate(firstDay.getDate() - 1); // minus the date
	var crenddate = new Date(currentreportingperiod);
	var firstDayofcrp = new Date(crenddate.getFullYear(), crenddate.getMonth(), 1);
	var lstdateinit = new Date();
	var ldate = firstDayofcrp.setDate(firstDayofcrp.getDate()-1);
	var lastrpenddate = new Date(ldate);
	var dd = String(lastrpenddate.getDate()).padStart(2, '0');
	var mm = String(lastrpenddate.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = lastrpenddate.getFullYear();
	lastrpenddate = yyyy + '-' + mm + '-' + dd;
	return lastrpenddate;
}


function getnextrpstartdate(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var dd = String(firstDay.getDate()).padStart(2, '0');
	var mm = String(firstDay.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = firstDay.getFullYear();
	var nextrpstartdate = yyyy + '-' + mm + '-' + dd;
	return nextrpstartdate;
}

function getnextrpenddate(){
	var date = new Date();
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
	var dd = String(lastDay.getDate()).padStart(2, '0');
	var mm = String(lastDay.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = lastDay.getFullYear();
	var nextrpenddate = yyyy + '-' + mm + '-' + dd;
	return nextrpenddate;
}

$('#reportingperiod').html(getreportingperiod());
$('#refreshdate').html(getreportingperiod());


$( "#refreshreports" ).click(function() {
	var refreshtype = "";
	refreshtxcurr();
	//refreshtxnew();
	//refreshtxrtt();
	//refreshtis();
	//refreshdeaths();
	//refreshtos();
	//refreshltfu();
});

$( "#refreshtxcurr" ).click(function() {
	var refreshtype = "single";
	refreshtxcurr(refreshtype);
});

$( "#refreshtxnew" ).click(function() {
	var refreshtype = "single";
	refreshtxnew(refreshtype);
});

$( "#refreshrtt" ).click(function() {
	var refreshtype = "single";
	refreshtxrtt(refreshtype);
});

$( "#refreshti" ).click(function() {
	var refreshtype = "single";
	refreshtis(refreshtype);
});

$( "#refreshdeath" ).click(function() {
	var refreshtype = "single";
	refreshdeaths(refreshtype);
});

$( "#refreshtos" ).click(function() {
	var refreshtype = "single";
	refreshtos(refreshtype);
});

$( "#refreshltfu" ).click(function() {
	var refreshtype = "single";
	generateltfu();
});

$( "#refreshprevioustxcurr" ).click(function() {
	var refreshtype = "single";
	getrefreshprevioustxcurr();
});



//function to refresh txurr
function refreshtxcurr(refreshtype){
	$('#txcurrindicator').html("<span style='font-size:24px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i></span>");
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'txcurr'+reportingmonth+reportingyear;
	var refreshdata = "";
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			alert(data);
			//alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#txcurrindicator').html(value['total']);
		   		$("#txcurrindicator").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		   		if(refreshtype === ""){
		   			refreshtxnew(refreshdata);
		   		}
				//refreshtxnew(refreshtype);
	        });
			//alert(data);
		}
	});
}

//function to refresh txnew
function refreshtxnew(refreshtype){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#txnewindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var refreshdata = "";
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'txnew',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofnextreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear},		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#txnewindicator').html(value['total']);
		   		if(refreshtype === ""){
		   			refreshtxrtt(refreshdata);
		   		}
	        });
			//alert(data);
		}
	});
}



//function to refresh rtts
function refreshtxrtt(refreshtype){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#txrttindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var refreshdata = "";
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'txrtt',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofnextreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#txrttindicator').html(value['total']);
		   		if(refreshtype === ""){
		   			refreshtis(refreshdata);
		   		}
	        });
			//alert(data);
		}
	});
}

//function to refresh tis
function refreshtis(refreshtype){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#tisindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var refreshdata = "";

	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'tis',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofnextreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#tisindicator').html(value['total']);
		   		if(refreshtype === ""){
		   			refreshdeaths(refreshdata);
		   		}
				
	        });
			//alert(data);
		}
	});
}

//function to refresh deaths
function refreshdeaths(refreshtype){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#deathsindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var refreshdata = "";
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'deaths',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofnextreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#deathsindicator').html('Documented '+value['total']);
		    	$.ajax({
				 	type: "POST",
					url: 'getdata.php',
					data: {indicator: 'deathsanalysis',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
					success: function(data){
						if(data === 'error'){
							$('#deathsindicator').html('<span>Refresh Data</span>');
						}else{
							var result = jQuery.parseJSON(data);
						   	$.each( result, function( key, value ) {  
						   		$('#previousactivedeaths').html(value['TotalPreviousActive']);
						   		$('#previousltfudeaths').html(value['TotalPreviousLTFU']);
						   		$('#notintxdeaths').html(value['TotalNotInART']);
						   		// $("#deathslinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
					        });
						}
					},
					error: function(xhr, status, error){
						alert(xhr);
					}
				});

		   		if(refreshtype === ""){
		   			refreshtos(refreshdata);
		   		}
				
	        });
			//alert(data);
		}
	});
}

//function to refresh tos
function refreshtos(refreshtype){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#tosindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var refreshdata = "";
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'tos',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofnextreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#tosindicator').html(value['total']);
		   		if(refreshtype === ""){
		   			refreshltfu(refreshtype);
		   		}
				
	        });
			//alert(data);
		}
	});
}


//function to refresh deaths
function refreshltfu(){
	//$('#txcurrindicator').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	$('#ltfuindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();

	var previousreportingmonth = getpreviousreportingmonth();
	var previousreportingyear = getpreviousreportingyear();
	//check if previous txcurr exists
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: endoflastreportingperiod,newmonthdate:endofcurrentreportingperiod,reportingmonth:previousreportingmonth,reportingyear:previousreportingyear},
		success: function(data){
			//alert(data);
			if(data === 'error'){
				$('#previoustxcurrval').html('<span>Generating Data..</span>');
				getrefreshprevioustxcurr();
			}
			else{
				generateltfu();
			}
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getcurrenttxcurrentcount(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'txcurr'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			//alert(data);
			if(data === 'error'){
				$('#txcurrindicator').html('<span style="font-size: 30px;"><b>Refresh Data</b></span>');
				//$("#currenttxcurrlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#txcurrindicator').html(value['Total']);
			   		$("#txcurrindicator").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrentnewdata();	
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}


function getcurrentnewdata(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'txnew'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txnew',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			//alert(data);
			if(data === 'error'){
				$('#txnewindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#txnewindicator').html(value['Total']);
			   		$('#newnet').html(value['Total']);
			   		$("#txnewlinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrentrttdata();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}


function getcurrentrttdata(){
	//alert("getting rtt");
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'txrtt'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txrtt',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			//alert(data);
			if(data === 'error'){
				$('#txrttindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#txrttindicator').html(value['Total']);
			   		$('#rttnet').html(value['Total']);
			   		$("#txrttlinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrenttidata();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getcurrenttidata(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'tis'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'tis',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#tisindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#tisindicator').html(value['Total']);
			   		$('#tisnet').html(value['Total']);
			   		$("#tislinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrentdeathsdata();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getcurrentdeathsdata(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'deaths'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'deaths',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#deathsindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#deathsindicator').html('Documented '+value['Total']);
			   		$("#deathslinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
          		$.ajax({
				 	type: "POST",
					url: 'getdata.php',
					data: {indicator: 'deathsanalysis',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
					success: function(data){
						if(data === 'error'){
							$('#deathsindicator').html('<span>Refresh Data</span>');
						}else{
							var result = jQuery.parseJSON(data);
						   	$.each( result, function( key, value ) {  
						   		$('#previousactivedeaths').html(value['TotalPreviousActive']);
						   		$('#previousltfudeaths').html(value['TotalPreviousLTFU']);
						   		$('#notintxdeaths').html(value['TotalNotInART']);
						   		// $("#deathslinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
					        });
						}
					},
					error: function(xhr, status, error){
						alert(xhr);
					}
				});
			}
			getcurrentltfudata();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getcurrentltfudata(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'ltfu'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'ltfu',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#ltfuindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#ltfuindicator').html(value['Total']);
			   		$("#ltfulinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrenttosdata();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getcurrenttosdata(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var reportingtbl = 'tos'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'tos',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#tosindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#tosindicator').html('Documented '+value['Total']);
			   		$("#toslinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
		        $.ajax({
				 	type: "POST",
					url: 'getdata.php',
					data: {indicator: 'toanalysis',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
					success: function(data){
						if(data === 'error'){
							$('#tosindicator').html('<span>Refresh Data</span>');
						}else{
							var result = jQuery.parseJSON(data);
						   	$.each( result, function( key, value ) {  
						   		$('#previousactivetos').html(value['TotalPreviousActive']);
						   		$('#previousltfutos').html(value['TotalPreviousLTFU']);
						   		$('#notintxtos').html(value['TotalNotInART']);
						   		// $("#deathslinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
					        });
						}
					},
					error: function(xhr, status, error){
						alert(xhr);
					}
				});
			}
			getprevioustxcurr();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function getprevioustxcurr(){
	var reportingdate = getlastrpenddate();
	var newmonthdate = getrpstartdate();
	var reportingmonth = getpreviousreportingmonth();
	var reportingyear = getpreviousreportingyear();
	var reportingtbl = 'txcurr'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#previoustxcurrval').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		$('#previoustxcurrval').html(value['Total']);
			   		$("#previoustxcurrvallink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		        });
			}
			getcurrentnetnew();
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}


function returnprevioustxcurr(){
	var reportingdate = getlastrpenddate();
	var newmonthdate = getrpstartdate();
	var reportingmonth = getpreviousreportingmonth();
	var reportingyear = getpreviousreportingyear();
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			if(data === 'error'){
				$('#previoustxcurrval').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		//$('#previoustxcurrval').html(value['Total']);
			   		return (value['total']);
		        });
			}
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}


function getrefreshprevioustxcurr(){
	$('#previoustxcurrval').html('...');
	$('#refreshprevioustxcurr').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>");
	var reportingdate = getlastrpenddate();
	var newmonthdate =  getrpstartdate();
	var reportingmonth = getpreviousreportingmonth();
	var reportingyear = getpreviousreportingyear();
	var reportingtbl = 'txcurr'+reportingmonth+reportingyear;
	//alert(getreportingmonth());
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			//alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#previoustxcurrval').html(value['total']);
		   		$("#previoustxcurrvallink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		   		$('#refreshprevioustxcurr').html("<i class='fa fa-refresh' aria-hidden='true'></i>");
		   		generateltfu();
	        });
			//alert(data);
		}
	});
}

function returncurrenttxcurrentcount(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			//alert(data);
			var txcurrtotal = 0;
			if(data === 'error'){
				$('#txcurrindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		//$('#txcurrindicator').html(value['Total']);
			   		alert(value['Total']);
			   		txcurrtotal = value['Total'];
					return (value['Total']);
		        });
			}
			return txcurrtotal;	
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}

function generateltfu(){
	$('#ltfuindicator').html('Refreshing..');
	var endoflastreportingperiod = getlastrpenddate();
	var startofcurrentreportingperiod = getrpstartdate();
	var endofcurrentreportingperiod = getrpenddate();
	var startofnextreportingperiod = getnextrpstartdate();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var previousreportingmonth = getpreviousreportingmonth();
	var previousreportingyear = getpreviousreportingyear();
	var previoustxcurrtbl = 'txcurr'+previousreportingmonth+previousreportingyear;
	var currenttxcurrtbl = 'txcurr'+reportingmonth+reportingyear;
	var currentdeathstbl = 'deaths'+reportingmonth+reportingyear;
	var currenttostbl = 'tos'+reportingmonth+reportingyear;
	var reportingtbl = 'ltfu'+reportingmonth+reportingyear;
	$.ajax({
	 	type: "POST",
		url: 'getdata/refreshdata.php',
		data: {indicator: 'ltfu',endoflastreportingperiod: endoflastreportingperiod,startofcurrentreportingperiod:startofcurrentreportingperiod,endofcurrentreportingperiod:endofcurrentreportingperiod,startofnextreportingperiod:startofcurrentreportingperiod,reportingmonth:reportingmonth,reportingyear:reportingyear,previoustxcurrtbl:previoustxcurrtbl,currenttxcurrtbl:currenttxcurrtbl,currentdeathstbl:currentdeathstbl,currenttostbl:currenttostbl},
		success: function(data){
			alert(data);
			var result = jQuery.parseJSON(data);
		   	$.each( result, function( key, value ) {
		   		//alert(value['total']);  
		   		$('#ltfuindicator').html(value['total']);
		   		$("#ltfulinelistlink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
				//refreshrtt();
	        });
			//alert(data);
		}
	});
}

function getcurrentnetnew(){
	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	var lastreportingdate = getlastrpenddate();
	var previousreportingmonth = getpreviousreportingmonth();
	var previousreportingyear = getpreviousreportingyear();

	var reportingdate = getreportingperiod();
	var newmonthdate = getnewmonth();
	var reportingmonth = getreportingmonth();
	var reportingyear = getreportingyear();
	$.ajax({
	 	type: "POST",
		url: 'getdata.php',
		data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
		success: function(data){
			var currenttxcurrtotal = 0;
			var previoustxcurrtotal = 0;
			if(data === 'error'){
				$('#txcurrindicator').html('<span>Refresh Data</span>');
			}else{
				var result = jQuery.parseJSON(data);
			   	$.each( result, function( key, value ) {  
			   		currenttxcurrtotal = value['Total'];
		        });
		        var reportingdate = getlastrpenddate();
				var newmonthdate = getrpstartdate();
				var reportingmonth = getpreviousreportingmonth();
				var reportingyear = getpreviousreportingyear();
				$.ajax({
				 	type: "POST",
					url: 'getdata.php',
					data: {indicator: 'txcurr',reportingdate: reportingdate,newmonthdate:newmonthdate,reportingmonth:reportingmonth,reportingyear:reportingyear},
					success: function(data){
						if(data === 'error'){
							$('#previoustxcurrval').html('<span>Refresh Data</span>');
						}else{
							var result = jQuery.parseJSON(data);
						   	$.each( result, function( key, value ) {  
						   		previoustxcurrtotal = value['Total'];
						   		var netnewvalue = (parseInt(currenttxcurrtotal)-parseInt(previoustxcurrtotal));
						   		if(netnewvalue < 0){
						   			$('#netnewvalue').html('<span style="color:#F65959 !important;">'+netnewvalue+'</span>');
						   			$('#netnewindicator').html('<span style="color:#F65959 !important;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>');
						   		}
						   		if(netnewvalue > 0){
						   			$('#netnewvalue').html('<span style="color:#43d396 !important;">'+netnewvalue+'</span>');
						   			$('#netnewindicator').html('<span style="color:#43d396 !important;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>');
						   		}
						   		if(netnewvalue === 0){
						   			$('#netnewvalue').html('<span style="color:#FDBC2E !important;">'+netnewvalue+'</span>');
						   			$('#netnewindicator').html('<span style="color:#FDBC2E !important;"><i class="fa fa-arrows-h" aria-hidden="true"></i></span>');
						   		}
					        });
						}
					},
					error: function(xhr, status, error){
						alert(xhr);
					}
				});
			}
		},
		error: function(xhr, status, error){
			alert(xhr);
		}
	});
}


//export data to excel
$('#exportlinelisttoexcel').click(function() {
	var reportingtbl = getUrlVars()["reportingtbl"];
	$.ajax({
	 	type: "POST",
		url: 'getdata/datatoexcel.php',
		data: {tblname: reportingtbl},
		success: function(data){
			alert(data);
			// var result = jQuery.parseJSON(data);
		 //   	$.each( result, function( key, value ) {
		 //   		//alert(value['total']);  
		 //   		$('#previoustxcurrval').html(value['total']);
		 //   		$("#previoustxcurrvallink").attr("href", "reportinghub/linelist.php?reportingtbl="+reportingtbl+"");
		 //   		generateltfu();
	  //       });
			//alert(data);
		}
	});
});


