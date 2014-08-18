<!DOCTYPE html>
<?php
include "functions.php";
$tasks = getTasks();
$users = getUsers();
?>
<html>
<head>
	<title>Gantt Diagram from Phabricator</title>
	<script src="codebase/dhtmlxgantt.js"></script>
	<script src="./functions.js"></script>
	<script src="http://export.dhtmlx.com/gantt/api.js"></script>  
	<link href="codebase/dhtmlxgantt.css" rel="stylesheet">
	<style type="text/css" media="screen">
		html, body{
			margin:0px;
			padding:0px;
			height:100%;
			overflow:hidden;
		}
	</style>
	<script type="text/javascript">
		gantt.config.grid_width = 500;
		gantt.templates.task_text = function(start,end,task) {
			return "<b>" + task.text + "</b>";
		};
		gantt.config.lightbox.sections = [
	        {name: "description", map_to: "description", type: "textarea", focus: true},
	        {name: "time", type: "duration", map_to: "auto", time_format:["%d", "%m", "%Y", "%H:%i"]},
	    ];
	    gantt.config.columns =  [
		    {name:"text",       label:"Task name",  tree:true, width:'*' },
		    {name:"start_date", label:"Start time", align: "center" },
		    {name:"end_date",   label:"End date",   align: "center" },
		    {name:"holder",     label:"Assigned To", align: "center" }
		];
	</script>
</head>
<body>
	<input value="Export to PDF" type="button" onclick='gantt.exportToPDF()'>
	<div id="gantt_here" style='height:400px;'></div>
	<script type="text/javascript">
		var users = userAdapter(<?php echo json_encode($users) ?>);
		var tasks = taskAdapter(<?php echo json_encode($tasks) ?>);
		gantt.init("gantt_here");   
		gantt.parse(tasks);
	</script>
</body>
</html>