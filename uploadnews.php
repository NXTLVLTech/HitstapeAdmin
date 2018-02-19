<!doctype html>
<html lang="en">

<head>
<script type="text/javascript" src="commonData.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
<link rel="stylesheet" href="../adminpanel/assets/css/customstyle.css">
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
		
	
	
	

function	getPath()
  { 
  

    var saveref = firebase.database().ref('discover/news');
   var ref = firebase.storage().ref().child('newsimages');
   
   
  var title=$('#title').val();
  var description=$('#des').val();
  var newsurl=$('#newsurl').val();
  console.log('title  -- '+title+'  description  '+description);
const file = $('#wizard-picture').get(0).files[0];
  title=title.trim();
  description=description.trim();
  newsurl=newsurl.trim();
  if(title.length==0)
  {
  alert('Please enter title of news');
  }else if(description.length==0)
  {
  alert('Please enter description of news');
  }
  else if(newsurl.length==0)
  {
  alert('Please enter news url');
  }
  else if(file==undefined)
  {
	 alert('Please select image for news'); 
  }else{
	  
	  var loader=document.getElementById("loaderid");
	  loader.style.display="block";
	 // $('#loaderid').show();
	    console.log('imageurl '+file.value);
  var fil = document.getElementById("wizard-picture");

 
  const name = file.name;
  console.log('imageurl '+file.type);
  console.log('imageurl '+file.url);
  console.log('imageurl '+file.getPath);
  
  var d = new Date();
var n = d.getTime();
  const name1 = n + '-' + file.name;
  const metadata = { contentType: file.type };
  const task = ref.child(name1).put(file, metadata);
  task.then((snapshot) => {
    console.log('url     '+snapshot.downloadURL);
	
  var data={
	  imageUrl:snapshot.downloadURL,
	  title:title,
	  text:description,
	  newsurl:newsurl,
	  timestamp:parseFloat('-'+n)
	  
  }
saveref.push(data);

loader.style.display="none";
  window.open("../newslist.php", '_top');
  
    
});

  }
  
  

    }

	
	
	
		</script>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../adminpanel/assets/img/hitstape.png" />
    <title>Hitstape-Upload News</title>
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
		 	/></div>
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
							     <li   >
                                    <a href="../users.php">
                                      
                                        <span class="sidebar-normal"> Users </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../songslist.php">
                                      
                                        <span class="sidebar-normal"> New Music </span>
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

								 <li  style="background-color: rgb(254,160,28);" >
                                   
                                        <a href="../newslist.php"
                                        <span class="sidebar-normal"> News </span>
                                    </a>
                                </li>
                                <li   >                                   
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
                        <a class="navbar-brand" href="#"> Hitstape </a>
                    </div>
                
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                                <form action="" method="">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Upload News
                                        </h3>
                                    </div>
                                    <div style="background-color: rgb(254,160,28);">
										<ul>
                                            <li>
                                                <a href="#about" data-toggle="tab">News</a>
                                            </li>
                                          
                                        </ul>
									</div>
									
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                            <div class="row">
                                                
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="../adminpanel/assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                            <input type="file" id="wizard-picture" accept="image/*">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons"></i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Title
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="title"  id ="title" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons"></i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Description
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="des"  id ="des" type="text" class="form-control">
                                                        </div>
                                                    </div>
													
													   <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons"></i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">News Url
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="newsurl"  id ="newsurl" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                      
                                        
                                    </div>
                                    <div class="wizard-footer">
									
									
									<div   align="center" >  
									<div  id = "loaderid"class="loader" > </div> 
									
									</div>
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                            <input type='button' onclick="getPath()"  class='btn btn-finish btn-fill btn-orange btn-wd' name='finish' value='Finish' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
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
<script type="text/javascript">
    $(document).ready(function() {
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });
</script>

</html>