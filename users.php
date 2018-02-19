<!doctype html>
<html lang="en">

<head>
<script type="text/javascript" src="commonData.js"></script>

<style>
.bg { 
display: block;
    content: "";
  
    background-image: url("../assets/img/hitstape.png");

 
    position: center;
    height: 100%; 
     top: 0;
     width: 100%;
    left: 0;
    z-index: 2;
 opacity: 1;
    filter: alpha(opacity=50);
   
    background-position: full;
    background-repeat: no-repeat;
    background-size: cover;
}

.button {
    background-color: transparent;
    border: none;
    color: #d4af37;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}


</style>
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
		
		function getEmail()
		{
			document.getElementById("emailid").innerHtml=getCookie('username');
		}
		

	firebase.initializeApp(config);
	
		
	
	$increment=0;
	var playersRef = firebase.database().ref().child("users");
	
	playersRef.on("child_added", snapshot=> {
		
   console.log(snapshot.child("firstname").val());
   console.log(snapshot.child("lastname").val());
   $increment++;
                         
                                    $userKey=snapshot.key;   
									
                                                    
                                $("#table_body").append(
								
								 "<tr  id ="+$userKey+"><td ><b>"+
                                                     $increment+"</b></td><td><b>"+
                                                    snapshot.child("firstname").val()+"</b></td><td><b>"+
                                                   snapshot.child("lastname").val()+"</b></td><td><b>"+
												   snapshot.child("cellphone").val()+"</b></td><td ><b>"+
												   snapshot.child("email").val()+"</b></td>"+'<td class="td-actions text-right">'+
												     
                                                        
                                                        
                                                        
                                                        '<button  onclick="getRowId(this)" type="submit"      rel="tooltip" class="btn btn-simple btn-dangers btn-icon"  style="color:#fea01c";>'+
                                                            '<i class="material-icons">delete</i></button>'+"</td></tr>"
                                                    
                                                   
                                                  
                                                      
                                                        
                                                    
                                                
								
								
								);                    
                                              
   
   
}, function (error) {
   console.log("Error:  kanu " + error.code);
	
});
	

	function getRowId(element){
 var index=element.parentNode.parentNode.rowIndex;
 var table = document.getElementById("table_body");
   console.log("index="+index);
 var row = table.rows[index-1];
 var id =row.id;
  console.log("userKey="+id);
 

  //demo.showSwal('warning-message-and-confirmation');
  
  
  
  swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this imaginary file!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
		var playersRef = firebase.database().ref("users");
		playersRef.child(id).remove();
 console.log('success delete'+result.value);
   window.open("https://napworks.in/users.php", '_top');
     

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



	</script>




    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../adminpanel/assets/img/hitstape.png" />
<title>Hitstape-Users</title>
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
				<li style="background-color: rgb(254,160,28);">
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
                                </li>
                                <li   >
                                    <a href="../albumlist.php">
                                        
                                        <span class="sidebar-normal">Albums</span>
                                    </a>
                                </li>
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
              <!--  <ul class="nav">
                    <li>
                        <a href="../dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p> Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../pages/pricing.html">
                                        <span class="sidebar-mini"> P </span>
                                        <span class="sidebar-normal"> Pricing </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/rtl.html">
                                        <span class="sidebar-mini"> RS </span>
                                        <span class="sidebar-normal"> RTL Support </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/timeline.html">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Timeline </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/login.html">
                                        <span class="sidebar-mini"> LP </span>
                                        <span class="sidebar-normal"> Login Page </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/register.html">
                                        <span class="sidebar-mini"> RP </span>
                                        <span class="sidebar-normal"> Register Page </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/lock.html">
                                        <span class="sidebar-mini"> LSP </span>
                                        <span class="sidebar-normal"> Lock Screen Page </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pages/user.html">
                                        <span class="sidebar-mini"> UP </span>
                                        <span class="sidebar-normal"> User Profile </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p> Components
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../components/buttons.html">
                                        <span class="sidebar-mini"> B </span>
                                        <span class="sidebar-normal"> Buttons </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/grid.html">
                                        <span class="sidebar-mini"> GS </span>
                                        <span class="sidebar-normal"> Grid System </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/panels.html">
                                        <span class="sidebar-mini"> P </span>
                                        <span class="sidebar-normal"> Panels </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/sweet-alert.html">
                                        <span class="sidebar-mini"> SA </span>
                                        <span class="sidebar-normal"> Sweet Alert </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/notifications.html">
                                        <span class="sidebar-mini"> N </span>
                                        <span class="sidebar-normal"> Notifications </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/icons.html">
                                        <span class="sidebar-mini"> I </span>
                                        <span class="sidebar-normal"> Icons </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../components/typography.html">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Typography </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p> Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../forms/regular.html">
                                        <span class="sidebar-mini"> RF </span>
                                        <span class="sidebar-normal"> Regular Forms </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../forms/extended.html">
                                        <span class="sidebar-mini"> EF </span>
                                        <span class="sidebar-normal"> Extended Forms </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../forms/validation.html">
                                        <span class="sidebar-mini"> VF </span>
                                        <span class="sidebar-normal"> Validation Forms </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../forms/wizard.html">
                                        <span class="sidebar-mini"> W </span>
                                        <span class="sidebar-normal"> Wizard </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="active">
                        <a data-toggle="collapse" href="#tablesExamples" aria-expanded="true">
                            <i class="material-icons">grid_on</i>
                            <p> Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse in" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../tables/regular.html">
                                        <span class="sidebar-mini"> RT </span>
                                        <span class="sidebar-normal"> Regular Tables </span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="../tables/extended.html">
                                        <span class="sidebar-mini"> ET </span>
                                        <span class="sidebar-normal"> Extended Tables </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../tables/datatables.net.html">
                                        <span class="sidebar-mini"> DT </span>
                                        <span class="sidebar-normal"> DataTables.net </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#mapsExamples">
                            <i class="material-icons">place</i>
                            <p> Maps
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="mapsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../maps/google.html">
                                        <span class="sidebar-mini"> GM </span>
                                        <span class="sidebar-normal"> Google Maps </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../maps/fullscreen.html">
                                        <span class="sidebar-mini"> FSM </span>
                                        <span class="sidebar-normal"> Full Screen Map </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../maps/vector.html">
                                        <span class="sidebar-mini"> VM </span>
                                        <span class="sidebar-normal"> Vector Map </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="../widgets.html">
                            <i class="material-icons">widgets</i>
                            <p> Widgets </p>
                        </a>
                    </li>
                    <li>
                        <a href="../charts.html">
                            <i class="material-icons">timeline</i>
                            <p> Charts </p>
                        </a>
                    </li>
                    <li>
                        <a href="../calendar.html">
                            <i class="material-icons">date_range</i>
                            <p> Calendar </p>
                        </a>
                    </li>
                </ul>-->
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
                   <!-- <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder=" Search ">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>-->
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
                                <div class="card-content">
                                    <h4 class="card-title">Users</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Cellnumber</th>
                                                    <th>Email</th>
                                                    
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id ="table_body">
			
                                            <!--    <tr>
                                                    <td class="text-center">2</td>
                                                    <td>John Doe</td>
                                                    <td>Design</td>
                                                    <td>2012</td>
                                                    <td class="text-right">&euro; 89,241</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Alex Mike</td>
                                                    <td>Design</td>
                                                    <td>2010</td>
                                                    <td class="text-right">&euro; 92,144</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Mike Monday</td>
                                                    <td>Marketing</td>
                                                    <td>2013</td>
                                                    <td class="text-right">&euro; 49,990</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>Paul Dickens</td>
                                                    <td>Communication</td>
                                                    <td>2015</td>
                                                    <td class="text-right">&euro; 69,201</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
             <!--           <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Striped Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th></th>
                                                    <th>Product Name</th>
                                                    <th>Type</th>
                                                    <th>Qty</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Moleskine Agenda</td>
                                                    <td>Office</td>
                                                    <td>25</td>
                                                    <td class="text-right">&euro; 49</td>
                                                    <td class="text-right">&euro; 1,225</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Stabilo Pen</td>
                                                    <td>Office</td>
                                                    <td>30</td>
                                                    <td class="text-right">&euro; 10</td>
                                                    <td class="text-right">&euro; 300</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>A4 Paper Pack</td>
                                                    <td>Office</td>
                                                    <td>50</td>
                                                    <td class="text-right">&euro; 10.99</td>
                                                    <td class="text-right">&euro; 109</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Apple iPad</td>
                                                    <td>Meeting</td>
                                                    <td>10</td>
                                                    <td class="text-right">&euro; 499.00</td>
                                                    <td class="text-right">&euro; 4,990</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Apple iPhone</td>
                                                    <td>Communication</td>
                                                    <td>10</td>
                                                    <td class="text-right">&euro; 599.00</td>
                                                    <td class="text-right">&euro; 5,999</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="td-total">
                                                        Total
                                                    </td>
                                                    <td class="td-price">
                                                        <small>&euro;</small>12,999
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                   <!--     <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Shopping Cart Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-shopping">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th>Product</th>
                                                    <th class="th-description">Color</th>
                                                    <th class="th-description">Size</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Qty</th>
                                                    <th class="text-right">Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../adminpanel/assets/img/product1.jpg" alt="...">
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#jacket">Spring Jacket</a>
                                                        <br />
                                                        <small>by Dolce&Gabbana</small>
                                                    </td>
                                                    <td>
                                                        Red
                                                    </td>
                                                    <td>
                                                        M
                                                    </td>
                                                    <td class="td-number text-right">
                                                        <small>&euro;</small>549
                                                    </td>
                                                    <td class="td-number">
                                                        1
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>549
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../adminpanel/assets/img/product2.jpg" alt="..." />
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#pants">Short Pants</a>
                                                        <br />
                                                        <small>by Pucci</small>
                                                    </td>
                                                    <td>
                                                        Purple
                                                    </td>
                                                    <td>
                                                        M
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>499
                                                    </td>
                                                    <td class="td-number">
                                                        2
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>998
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../adminpanel/assets/img/product3.jpg" alt="...">
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#nothing">Pencil Skirt</a>
                                                        <br />
                                                        <small>by Valentino</small>
                                                    </td>
                                                    <td>
                                                        White
                                                    </td>
                                                    <td>
                                                        XL
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>799
                                                    </td>
                                                    <td class="td-number">
                                                        1
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>799
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="td-total">
                                                        Total
                                                    </td>
                                                    <td colspan="1" class="td-price">
                                                        <small>&euro;</small>2,346
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td colspan="2" class="text-right">
                                                        <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
          <!--  <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portofolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com"> Creative Tim </a>, made with love for a better web
                    </p>
                </div>
            </footer> -->
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