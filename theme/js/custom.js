$(document).ready(function(){
    var screnheight = $( window ).height();
    $('#homebannercontainer').css('height', screnheight);
});

var windowWidth = window.innerWidth;
var divsize = 0.404 * windowWidth;
$("#introbody").css("height", divsize);



$( "#addformbtn" ).click(function() {
	var options = '';
	$.ajax({ 
       	method: "GET", 
       	url: "getfacilities.php",
    }).done(function( data ) { 
    	var n = $( "form" ).length;
    	var newform = n+1;
	   	var duce = jQuery.parseJSON(data);
	   	$.each( duce, function( key, value ) {  
	   		options = options + "<option value='"+value['mflcode']+"'>"+value['facilityname']+"</option>";
        }); 

	    var formsection = "<form action='uploadmultiplesaving.php' method='post' enctype='multipart/form-data' id='form"+newform+"' name='form"+newform+"' >"+
	    				"<input type='hidden' id='id"+newform+"' value=''>"+
	    				"<input type='hidden' id='pendingpositionfor"+newform+"' value='' class='pendingposition'>"+
	    				"<input type='hidden' name='formid' value='"+newform+"'>"+
	    				"<input type='hidden' id='dbname"+newform+"' value=''>"+
						"<div class='formtable'>"+
							"<div class='formrow'>"+
								"<div class='formcol first-col'>"+
									"<select name='facilitymflcode' id='facility"+newform+"' style='width:100%;'>"+
										"<option value=''>-- SELECT FACILITY -- </option>"+
										options+
									"</select>"+
								"</div>"+
								"<div class='formcol second-col' style='text-align: center;'>"+
									"<div class='form-group dbinput'>"+
									    "<input type='file' class='form-control-file' name='fileToUpload' id='fileToUpload"+newform+"' class='uploadinput'>"+
								  	"</div>"+
									"<label for='fileToUpload"+newform+"' id='img-previews' class='galleryuploadicon' style='margin-top:-17px;font-size:25px;'>"+
										"<i class='fa fa-upload' aria-hidden='true'></i>"+
								  	"</label>"+
								"</div>"+
								"<div class='formcol third-col'>"+
									"<span id='status"+newform+"'>Nothing Selected</span>"+
								"</div>"+
							"</div>"+
						"</div>"+
					"</form>"
		$( "#addmoreforms" ).append( formsection );
	}); 
  	
});


$('#formsection').on('change','input',function() {
	//alert("Changed");
	var inputid = ($(this).attr('id'));
	var formidentifier = inputid.replace('fileToUpload','');
	//var statusid = 'id' + formidentifier;
	//var formstatus = $('#id'+formidentifier).val();
	//alert(formidentifier);
	var nextid = $('input[value="waiting"]').attr('id');
	//alert(nextid);
	var formtopost = 'form' + formidentifier;
	var statussection = 'status'+formidentifier;
	//alert(formtopost);
	var max = 0;
	$( ".pendingposition" ).each(function( index ) {
	  //console.log( index + ": " + $( this ).text() );
	  	var positionval = ($( this ).val());
	  	max = (positionval > max) ? positionval : max;
	});
	var currentposition = parseInt(max)+1;
	alert("max:"+max);
	alert("Current Pos:"+currentposition);
	$('#pendingpositionfor'+formidentifier).val(currentposition);

	if(typeof nextid === 'undefined'){
		$('#'+formtopost).ajaxForm({
			beforeSubmit:function(e){
		    	//alert("Position 2");
		    	$('#id'+formidentifier).val('waiting');
		    	$('#'+statussection).html('Waiting...');
		    },
		    success:function(data){
		    	//alert(data);
		    	var databasename = data;
		    	$('#'+statussection).html('Restoring Database to server please wait...');
		    	$('#id'+formidentifier).val('done');
		    	$.ajax({
				 	type: "POST",
					url: 'restoredatabase.php',
					data: {databasename: databasename},
					success: function(data){
						//alert(data);
						$('#'+statussection).html("Database Restored Successfully");
						gotonext(parseInt(currentposition)+1);
					},
					error: function(xhr, status, error){
						$('#'+statussection).html("Error Restoring Database");
					}
				});
		    	//Go to the next form
		    },
		    uploadProgress: function(event, position, total, percentComplete) {
		        var percentVal = percentComplete + '%';
		        //bar.width(percentVal);
		        $('#'+statussection).html(percentVal);
		    },
		    complete: function(xhr) {
		    	alert(xhr.responseText);
		    	//$('#'+statussection).html(xhr.responseText);
		        //status.html(xhr.responseText);
		        $('#'+statussection).html("Upload complete,please wait for restoration...");
		    },
		    error:function(e){
		    	alert("error");
		    }
		}).submit();
	}else{
		//alert("There's form on waiting");
		$('#id'+formidentifier).val('waiting');
		$('#'+statussection).html('waiting...');
	}

});

function gotonext(position){
	//alert("position"+position);
	var nextid = $('input[value="'+position+'"]').attr('id');
	//alert(nextid);
	if(typeof nextid === 'undefined'){
		alert("All Databases selected restored.")
	}
	else{
		var formidentifier = nextid.replace('pendingpositionfor','');
		//alert(formidentifier);
		submitnextform(formidentifier, position);
	}
	//var formidentifier = inputid.replace('pendingpositionfor','');
}

function submitnextform(formidentifier, position){
	//alert("submitting second form");
	//var inputid = ($(this).attr('id'));
	var formidentifier = formidentifier;
	//alert(formidentifier);
	var formtopost = 'form' + formidentifier;
	var statussection = 'status'+formidentifier;
	//alert(formtopost);
	// var max = 0;
	// $( ".pendingposition" ).each(function( index ) {
	//   //console.log( index + ": " + $( this ).text() );
	//   	var positionval = ($( this ).val());
	//   	max = (positionval > max) ? positionval : max;
	// });
	var currentposition = position;
	$('#pendingpositionfor'+formidentifier).val(currentposition);

	$('#'+formtopost).ajaxForm({
		beforeSubmit:function(e){
	    	//alert("Position 2");
	    	$('#id'+formidentifier).val('waiting');
	    	$('#'+statussection).html('Waiting...');
	    },
	    success:function(data){
	    	//alert(data);
	    	var databasename = data;
	    	$('#'+statussection).html('Restoring Database to server please wait...');
	    	$('#id'+formidentifier).val('done');
	    	$.ajax({
			 	type: "POST",
				url: 'restoredatabase.php',
				data: {databasename: databasename},
				success: function(data){
					//alert(data);
					$('#'+statussection).html("Database Restored Successfully");
					gotonext(parseInt(currentposition)+1);
				},
				error: function(xhr, status, error){
					$('#'+statussection).html("Error Restoring Database");
				}
			});
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        //var percentVal = percentComplete + '%';
	        //bar.width(percentVal);
	        //percent.html(percentVal);
	    },
	    complete: function(xhr) {
	    	alert(xhr.responseText);
	    	$('#'+statussection).html("Upload complete,please wait for restoration...");
	        //status.html(xhr.responseText);
	    },
	    error:function(e){
	    	alert("error");
	    }
	}).submit();
}

function submitdata(){


}



// $(document).ready( function () {
//     $('#table_id').DataTable();
// } );


