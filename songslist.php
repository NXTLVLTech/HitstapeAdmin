<!doctype html>
<html lang="en">

<head>
<script type="text/javascript" src="commonData.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
	  	<script>

				function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            
				return c.substring(name.length, c.length);
		   
        }
    }
     //window.location.href="/";
	}	

	var cokie=getCookie('username');
	
	
	if(cokie!="Admin"){
		window.location.href="./login.php";
	}

	function logout(){
		
		document.cookie = "username=expire";
		var cokie=getCookie('username');
		window.location.href="./login.php";
		return false;
	}	

	firebase.initializeApp(config);
	
		
	
	$increment=0;
	
	var playersRef = firebase.database().ref().child("discover/newmusic").orderByChild('timestamp');
	
	
	playersRef.on("child_added", function(snapshot) {
		
		
		//var k=keys[i];
		 $userKey=snapshot.key;   
			  var songurl=snapshot.val().songURL;
			  var songartist=snapshot.val().songArtist;
			  var songlenth=snapshot.val().length;
			  var songname=snapshot.val().songName;
			//  var numberofplays=snapshot.val().numberOfPlays;
			
			
			  
			  $increment++;
                                                                    
                                                    
                                $("#table_body").append(
								
								 "<tr id ="+$userKey+"><td ><b>"+
                                                     $increment+"</b></td><td><b>"+
                                                    songname+"</b></td><td><b>"+
                                                   songartist+"</b></td><td><b>"+
												   songlenth+"</b></td><td ><b>"+
												   songurl+"</b></td>"+'<td class="td-actions text-right">'+
												     
                                                        '<button onclick="editData(this)"  type="button" rel="tooltip" class="btn btn-simple btn-dangers btn-icon"  style="color:#fea01c";>'+
                                                            '<i class="material-icons">edit</i></button>'+
                                                        
                                                        
                                                        '<button onclick="getRowId(this)"  type="button" rel="tooltip" class="btn btn-simple btn-dangers btn-icon"  style="color:#fea01c";>'+
                                                            '<i class="material-icons">delete</i></button>'+"</td></tr>"
                                                    
                                                                                 
                                                                                       
								
								
								);  
			  
		
		
		
		
 
});
	
	


	function getRowId(element){
 var index=element.parentNode.parentNode.rowIndex;
 var table = document.getElementById("table_body");
 var row = table.rows[index-1];
 var id =row.id;
  console.log("albumid="+id);
  document.cookie = "albumid="+id;

  
    swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this music!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
		var playersRef = firebase.database().ref("discover/newmusic");
		playersRef.child(id).remove();
 console.log('success delete'+result.value);
   window.open("../songslist.php", '_top');
     

   if (result.value) {
	  
	
	  
	  
	  console.log('success delete');
    swal(
      'Deleted!',
      'Your imaginary file has been deleted.',
      'success'
    )
  // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
  } else if (result.dismiss === 'cancel') {
	  
	  console.log('success delete');
    swal(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
}).catch(swal.noop);
	
	}

function editData(element)

{
	 var index=element.parentNode.parentNode.rowIndex;
 var table = document.getElementById("table_body");
 var row = table.rows[index-1];
 var id =row.id;
 document.cookie = "songId="+id;
  window.open("../updateSongs.php", '_top');
 console.log('songid -'+id);
}

	</script>




    <meta charset="utf-8" />
   <link rel="icon" type="image/png" href="../adminpanel/assets/img/hitstape.png" />
	<title>Hitstape-New Music</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../adminpanel/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../adminpanel/assets/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../adminpanel/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../adminpanel/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
             <div 
			align="center"
			class="logo">
			<img 
			src="../adminpanel/assets/img/hitstape.png"
			align="middle"
			height="42" width="100"
			/>
                
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span >
							<p id ="emailid">   </p>
                                
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
							    
                                <li>
                                    <a  onClick=logout()>
                                       
                                        <span class="sidebar-normal"> Logout </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
					<div >
                            <ul class="nav">
							     <li  >
                                    <a href="../users.php">
                                      
                                        <span class="sidebar-normal"> Users </span>
                                    </a>
                                </li>
                                <li style="background-color: rgb(254,160,28);">
                                    <a href="../songslist.php">
                                      
                                        <span class="sidebar-normal"> New Music</span>
                                    </a>
                                </li>
                                 <li   >
                                    <a href="../albums.php">
                                        
                                        <span class="sidebar-normal"> Mix Tape</span>
                                    </a>
                                </li><li><a href="../albumlist.php"><span class="sidebar-normal">Albums</span></a></li>

								<li   >
                                    <a href="../videoslist.php">
                                        
                                        <span class="sidebar-normal">Videos</span>
                                    </a>
                                </li>

                                <li   >
                                    <a href="../newslist.php">
                                        
                                        <span class="sidebar-normal">News</span>
                                    </a>
                                </li>
                                		 <li  >                                   
                                        <a href="../bannerlist.php"
                                        <span class="sidebar-normal"> Banner </span>
                                    </a>
                                </li>
                                <li>
                                   
                                        <a href="../pushnotification.php"
                                        <span class="sidebar-normal"> Push Notification </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                </div>
              
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Hit Tapes </a>
                    </div>
                
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="orange">
                                    <i class="material-icons">assignment</i>
                                </div>
								<a href="../uploadsongs.php">	
									<div _ngcontent-c1=""  class="card-header card-header-icon" data-background-color="orange" style="float: right;"><i _ngcontent-c1="" class="material-icons">add</i></div></a>
                                <div class="card-content">
                                    <h4 class="card-title">New Music</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>SongName</th>
                                                    <th>SongArtist</th>
                                                    <th>SongLength</th>
                                                    <th>SongUrl</th>
                                                    
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id ="table_body">
			
                                      
                                            </tbody>
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
</body>
<!--   Core JS Files   -->
<script src="../adminpanel/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../adminpanel/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../adminpanel/assets/js/material.min.js" type="text/javascript"></script>
<script src="../adminpanel/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../adminpanel/assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../adminpanel/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../adminpanel/assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../adminpanel/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../adminpanel/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../adminpanel/assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../adminpanel/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../adminpanel/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../adminpanel/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../adminpanel/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../adminpanel/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../adminpanel/assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../adminpanel/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../adminpanel/assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../adminpanel/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../adminpanel/assets/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../adminpanel/assets/js/demo.js"></script>
<script >


 $("#emailid").text(getCookie('email'));  </script>
</html>