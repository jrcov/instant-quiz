// JavaScript Document

var tstObj1 = { 0: "12345", 1: true, 2: false, 3: true, 4: false, 5: true, 6: false, 7: true, 8: false };
var tstObj2 = { 0: "J-85829", 1: null, 2: null, 3: null, 4: null, 5: null, 6: null, 7: null, 8: null };
var tstObj3 = { 0: "cstrain1", 1: true, 2: false, 3: true, 4: false, 5: true, 6: false, 7: true, 8: false };

var allObjs = { tstObj1, tstObj2, tstObj3 };
//
//var tstJson = JSON.stringify(allObjs);
////	console.log(tstJson);
//tstJson = JSON.parse(tstJson);
////	console.log(tstJson);

var student_results;
var q_num = 0;

function setStudentID(){
	if(student_id===""){ // If not set, generate new ID
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		for (var i = 0; i < 1; i++){
		  student_id += possible.charAt(Math.floor(Math.random() * possible.length));
		}
		student_id += "-";
		var rand = Math.floor((Math.random() * 10000) + 1);
		var zeros = "0000" + rand;
		rand = zeros.substr(zeros.length-5);
		student_id += rand;
	}
	if(getResults()===true){ // Check for ID uniqueness
		console.log("ID found");
		// var tstObj2 = { 0: "J-85829", 1: null, 2: null, 3: null, 4: null, 5: null, 6: null, 7: null, 8: null };

		var student_results_template = "";
		student_results_template += student_id;
		for(var n = 1; n <= q_num; n++){
			student_results_template += ",null";
		}
		console.log(student_results_template);
		
//		var tstSend = JSON.stringify(student_results_template);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				console.log(this.responseText);
			}
		};
		xmlhttp.open("GET", "quiz.php?data=" + student_results_template, true);
		xmlhttp.send();
		
		
	} else {
		console.log(student_id + " not found in results set");
		student_id = "J-85829";
		// Debug: only used in testing to prevent endless loops
		setStudentID();
	}
	console.log("Student ID: "+student_id);
	
//	var tstSend = JSON.stringify(tstObj2);
//	var xmlhttp = new XMLHttpRequest();
//	xmlhttp.onreadystatechange = function() {
//		if (this.readyState === 4 && this.status === 200) {
//			console.log(this.responseText);
//		}
//	};
//	xmlhttp.open("GET", "http://www.jasonryant.com/cov/quiz.php?data=" + tstSend, true);
//	xmlhttp.send();

}

function getResults(){
	for (var key in allObjs){ // find student's unique object
		// debug: get results from file
		var obj = allObjs[key];
		for(var n = 0; n < Object.keys(allObjs).length; n++){
			if(obj[n]===student_id){ // ID found
//				console.log("ID found");
				console.log(obj);
				student_results = obj;
				return true;
			} else { // ID not found
//				console.log("ID not found");
//				return false;
			}
		}
	}
}

function updateResults(q,a){
	for (var key in allObjs){ // find student's unique object
		var obj = allObjs[key];
		if(obj[0]===student_id){
			console.log(obj);
			obj[q] = a; // update answer
			// debug: update results in file
			console.log(obj);
		}
	}
}



$(document).ready(function(){
		
//	var tstSend = JSON.stringify(tstObj1);
//	var xmlhttp = new XMLHttpRequest();
//	xmlhttp.onreadystatechange = function() {
//		if (this.readyState === 4 && this.status === 200) {
//			console.log(this.responseText);
//		}
//	};
//	xmlhttp.open("GET", "http://www.jasonryant.com/cov/quiz.php?data=" + tstSend, true);
//	xmlhttp.send();

//	getResults();
//	updateResults(1,false);
		
   // Count number of questions
   $("div.tab-pane").each(function(){
	   q_num++;
   });
   console.log("There are "+q_num+" questions.");
	
   // Initialize student ID
   setStudentID();

   // "Check Answer" button
   $(".tab-pane form button").click(function(e){
	   e.preventDefault();
	   var hint_msg = "";
	   var thisQ = $(this).parents().eq(5).attr("id");
	   var thisQnum = thisQ.substr(1);
	   $("#"+thisQ+" form input, #"+thisQ+" form select").each(function(){ // for each question

		   // Parse user input
		   var userInput;
		   if($(this).val()===""){
			   userInput = "BLANK";
		   } else {
			   userInput = $(this).val();
			   if($(this).attr("type")==="number"){
				   userInput = parseInt(userInput);
			   } else {
				   userInput = userInput.toLowerCase();
			   }
		   }

		   // Determine if answer is correct
		   var correctAns;
		   if($(this).attr("type")==="number"){
			   correctAns = $(this).data("correct");
		   } else {
			   correctAns = $(this).data("correct").toLowerCase();
		   }
		   var match = (userInput === correctAns) ? true : false ;
		   if(match){
			   $(this).parents().eq(1).removeClass("has-error").addClass("has-success");	   
		   } else {
			   $(this).parents().eq(1).removeClass("has-success").addClass("has-error");
			   if($(this).data("hint")!==undefined){
				   hint_msg += '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign pull-right"></span><strong>Hint: </strong> '+$(this).data("hint")+'</div>';
			   }
		   }

		   console.log("\"" + userInput + "\" - \"" + correctAns + "\" (" + typeof(correctAns) + ") which is " + match);
	   });

	   // Display hints
	   $("#"+thisQ+ " .hints").html("");
	   $("#"+thisQ+ " .hints").append(hint_msg);

	   console.log("");

	   // Check for success
	   var errors = $("#"+thisQ+" form .has-error").length;
	   if(errors===0){
		   $("#"+thisQ+" span.label-success").css("visibility", "visible");
		   $("a[href=#"+thisQ+"] span.glyphicon").removeClass("hidden");
		   updateResults(thisQnum,true);
	   } else {
		   $("#"+thisQ+" span.label-success").css("visibility", "hidden");
		   $("a[href=#"+thisQ+"] span.glyphicon").addClass("hidden");
		   updateResults(thisQnum,false);
	   }
   });
});