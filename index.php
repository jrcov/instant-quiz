<?php

	if(isset($_GET['s'])){
		$student_id = "cstrain".$_GET['s'];
	}
	echo $student_id;
	
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Instant Feedback Quiz Prototype</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
	
		h3.panel-heading span.label {
			float: right;
			margin-left: 20px;
		}
		
		ol { padding-left: 20px; }
		
		em { font-weight: bold; }
		
		.nav-pills > li > a {
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}
		
		.nav > li > a:focus {
			outline: none !important;
		}
		
		#q1 .panel, #q1 .panel-heading {
			border-top-left-radius: 0;
		}
		
	</style>
    
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 page-header">
      <h1 class="text-center">VanDocs Foundation</h1>
      <h3 class="text-center">Skills Practice</h3>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div role="tabpanel">
    <ul class="nav nav-pills" role="tablist">
      <li role="presentation" class="active"><a href="#q1" data-toggle="tab" role="tab" aria-controls="tab1">Q1 &nbsp; <span class="glyphicon glyphicon-ok-sign hidden"></span></a></li>
      <li role="presentation"><a href="#q2" data-toggle="tab" role="tab" aria-controls="tab2">Q2 &nbsp; <span class="glyphicon glyphicon-ok-sign hidden"></span></a></li>
      <li role="presentation"><a href="#q3" data-toggle="tab" role="tab" aria-controls="tab2">Q3 &nbsp; <span class="glyphicon glyphicon-ok-sign hidden"></span></a></li>
    </ul>
    <div id="tabContent1" class="tab-content">
      <div role="tabpanel" class="tab-pane in active" id="q1">
        <div class="panel panel-primary">
          <div class="panel-heading">
           <ol><h3 class="panel-heading"><li value="1"><span class="label label-success" style="visibility: hidden;">Success <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>Search for all <em>VanDocs How Do I</em> documents</li></h3></ol>          </div>
          <div class="panel-body">
            <form action="#" class="form-horizontal col-sm-7">
              <div class="form-group">
                <label class="control-label col-sm-5" for="best_method_1">Best "Search By" method:</label>
                <div class="col-sm-7">
                  <select class="form-control" name="best_method_1" id="best_method_1" data-correct="title_word" data-hint="What metadata are you using to search?">
                    <option value="" selected></option>
                    <option value="creator">Creator</option>
                    <option value="title_word">Title Word</option>
                    <option value="record_number">Record Number</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="criteria_1">Criteria:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="criteria_1" data-correct="vandocs how do i" data-hint="Ensure the criteria matches the 'Search By' method">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="num_found_1">Number of documents:</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" id="num_found_1" data-correct="123">
                  <br>
                  <button type="submit" class="btn btn-primary">Check Answer</button>
                </div>
              </div>
            </form>
            <div class="col-sm-5 hints">
            </div>
          </div>
        </div>
      </div>
      
	  <!-- BEGIN QUESTION -->
      <div role="tabpanel" class="tab-pane" id="q2">
        <div class="panel panel-primary">
          <div class="panel-heading">
           <ol><h3 class="panel-heading"><li value="2"><span class="label label-success" style="visibility: hidden;">Success <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>Search for all <em>Meeting Agenda</em> documents from meetings in <em>2015</em> that are <em>PDFs</em></li></h3></ol>
          </div>
          <div class="panel-body">
            <form action="#" class="form-horizontal col-sm-7">
              <div class="form-group">
                <label class="control-label col-sm-5" for="best_method_2">Best "Search By" method:</label>
                <div class="col-sm-7">
                  <select class="form-control" name="best_method_1" id="best_method_2" data-correct="title_word">
                    <option value="" selected></option>
                    <option value="creator">Creator</option>
                    <option value="title_word">Title Word</option>
                    <option value="record_number">Record Number</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="criteria_2">Criteria:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="criteria_2" data-correct="meeting agenda 2015">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="filter_2">Filter:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="filter_2" data-correct="pdf" data-hint="Are you looking for documents with a particular <u>file type</u>?">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="num_found_2">Number of documents:</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" id="num_found_2" data-correct="123">
                  <br>
                  <button type="submit" class="btn btn-primary">Check Answer</button>
                </div>
              </div>
            </form>
            <div class="col-sm-5 hints">
            </div>
          </div>
        </div>
      </div>
      <!-- END QUESTION -->
      
	  <!-- BEGIN QUESTION -->
      <div role="tabpanel" class="tab-pane" id="q3">
        <div class="panel panel-primary">
          <div class="panel-heading">
           <ol><h3 class="panel-heading"><li value="3"><span class="label label-success" style="visibility: hidden;">Success <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>Search for the document with record number <em>DOC/2014/333530</em></li></h3></ol>
          </div>
          <div class="panel-body">
            <form action="#" class="form-horizontal col-sm-7">
              <div class="form-group">
                <label class="control-label col-sm-5" for="best_method_3">Best "Search By" method:</label>
                <div class="col-sm-7">
                  <select class="form-control" name="best_method_1" id="best_method_3" data-correct="record_number" data-hint="What metadata are you using to search?">
                    <option value="" selected></option>
                    <option value="creator">Creator</option>
                    <option value="title_word">Title Word</option>
                    <option value="record_number">Record Number</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="criteria_3">Criteria:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="criteria_3" data-correct="DOC/2014/333530">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="title_3">Document title:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="title_3" data-correct="Cataloguing transitory and official records - Decision tree">
                  <br>
                  <button type="submit" class="btn btn-primary">Check Answer</button>
                </div>
              </div>
            </form>
            <div class="col-sm-5 hints">
            </div>
          </div>
        </div>
      </div>
      <!-- END QUESTION -->
      
    </div>
  </div>
</div>
<!--
<div class="container">
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer</h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  <hr>
</div>
-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>

<script>
	
	var student_id = "<?php echo $student_id ?>";
	
</script>
<script src="js/quiz.js"></script>

</body>
</html>




















