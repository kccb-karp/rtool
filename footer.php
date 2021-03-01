	</div>
	<div class="footersection">
		<div class="contentwrap">
			RTOOL - &copy; KCCB-KARP
		</div>
	</div>
	<script type="text/javascript" src="theme/js/jquery.min.js"></script>	
	<script src="theme/js/jquery.form.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="theme/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<!---<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="theme/js/tinymce/tinymce.min.js"></script>
	<script src="theme/chartjs/dist/Chart.min.js"></script>
	<script src="theme/chartjs/dist/utils.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script src="theme/js/custom.js"></script>
	<script src="theme/js/loaddataaftepageload.js"></script>
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$("#accordian h3").click(function(){
		// 		//slide up all the link lists
		// 		$("#accordian ul ul").slideUp();
		// 		//slide down the link list below the h3 clicked - only if its closed
		// 		if(!$(this).next().is(":visible"))
		// 		{
		// 			$(this).next().slideDown();
		// 		}
		// 	})
		// });

		$(document).ready(function(){
		    $('#fileToUpload').on('change',function(){
		    	alert("Position 1");
		    	var bar = $('.bar');
			    var percent = $('.percent');
			    var status = $('#status');
		        $('#multiple_upload_form').ajaxForm({
		            //display the uploaded images
		            beforeSubmit:function(e){
		            	alert("Position 2");
		            	 status.empty();
			            var percentVal = '0%';
			            bar.width(percentVal);
			            percent.html(percentVal);
		            	$('#uploadfields').hide();
		                $('.progressimage').show();
		                //$( "#savebtn" ).addClass( "disabledlink" );
		                //$( "#savedraftbtn" ).addClass( "disabledlink" );
		                //$('.notification').show();
		                //$( ".notification" ).addClass( "warning" );
		                //$('.notificationmessage').html("Uploading page banner image. Please wait...")
		            },
		            success:function(data){
		            	alert(data);
		            	var databasename = data;
		            	//$('#img-previews').html("<img src='uploads/"+data+"' style='pointer-events: none;width:100%'/>");
		            	$('#databasename').val(data);
		            	$('.progressimage').hide();
		            	$('.restoringdb').show();
		            	$.ajax({

						 	type: "POST",
							url: 'restoredatabase.php',
							data: {databasename: databasename},
							success: function(data){
								//alert(data);
								$('.restoringdb').hide();
								$('.restoringsuccess').show();
							},
							error: function(xhr, status, error){
								//alert(xhr);
								$('.restoringdb').hide();
								$('.restoringerror').show();
							}
						});
		            	//$('#uploadfields').show();

		            	//$( ".notification" ).removeClass( "warning" );
		            	//$('.notificationmessage').html("Page banner image has been uploaded succesfully!")
		            	//$('.notification').show();
		            	//$( "#savebtn" ).removeClass( "disabledlink" );
		                //$( "#savedraftbtn" ).removeClass( "disabledlink" );
		                //$('.notification').delay(5000).hide(500);
		            },
		            uploadProgress: function(event, position, total, percentComplete) {
			            var percentVal = percentComplete + '%';
			            bar.width(percentVal);
			            percent.html(percentVal);
			        },
			        complete: function(xhr) {
			            status.html(xhr.responseText);
			        },
		            error:function(e){
		            	alert("error");
		            }
		        }).submit();
		    });
		});


		//charts
		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: ['June', 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: 'TxCURR',
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [79454, 79500, 79991, 80344, 80900, 81712, 82300],
					fill: false,
				}, {
					label: 'GAINS',
					fill: false,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [2213, 2500, 2010, 1998, 2015, 2067, 2033],
				}, {
					label: 'LOSES',
					fill: false,
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [2000, 2010, 2064, 2044, 2013, 2018, 2035],
				}]
			},
			options: {
				maintainAspectRatio: false,
				responsive: true,
				title: {
					display: true,
					text: '6 Months Current in Treatment Trend '
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						//display: false,
						//scaleLabel: {
						//	display: false,
						//	labelString: 'Value'
						//}
					}]
				}
			}
		};

		window.onload = function() {
			if($("#canvas").length){
	            var ctx = document.getElementById('canvas').getContext('2d');
				window.myLine = new Chart(ctx, config);
	        }
		};

		// document.getElementById('randomizeData').addEventListener('click', function() {
		// 	config.data.datasets.forEach(function(dataset) {
		// 		dataset.data = dataset.data.map(function() {
		// 			return randomScalingFactor();
		// 		});

		// 	});

		// 	window.myLine.update();
		// });

		// var colorNames = Object.keys(window.chartColors);
		// document.getElementById('addDataset').addEventListener('click', function() {
		// 	var colorName = colorNames[config.data.datasets.length % colorNames.length];
		// 	var newColor = window.chartColors[colorName];
		// 	var newDataset = {
		// 		label: 'Dataset ' + config.data.datasets.length,
		// 		backgroundColor: newColor,
		// 		borderColor: newColor,
		// 		data: [],
		// 		fill: false
		// 	};

		// 	for (var index = 0; index < config.data.labels.length; ++index) {
		// 		newDataset.data.push(randomScalingFactor());
		// 	}

		// 	config.data.datasets.push(newDataset);
		// 	window.myLine.update();
		// });

		// document.getElementById('addData').addEventListener('click', function() {
		// 	if (config.data.datasets.length > 0) {
		// 		var month = MONTHS[config.data.labels.length % MONTHS.length];
		// 		config.data.labels.push(month);

		// 		config.data.datasets.forEach(function(dataset) {
		// 			dataset.data.push(randomScalingFactor());
		// 		});

		// 		window.myLine.update();
		// 	}
		// });

		// document.getElementById('removeDataset').addEventListener('click', function() {
		// 	config.data.datasets.splice(0, 1);
		// 	window.myLine.update();
		// });

		// document.getElementById('removeData').addEventListener('click', function() {
		// 	config.data.labels.splice(-1, 1); // remove the label first

		// 	config.data.datasets.forEach(function(dataset) {
		// 		dataset.data.pop();
		// 	});

		// 	window.myLine.update();
		// });

		$(function () {
		  $("#datepicker").datepicker({ 
		        autoclose: true, 
		        todayHighlight: true
		  }).datepicker('update', new Date());
		});
	</script>
</body>
</html>