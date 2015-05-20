<!DOCTYPE html>
<?php 
session_start();
session_destroy();
?>
<html lang="en">

<head>
<link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.3/normalize.css">
<link rel="stylesheet" href="css/jquery.idealforms.css">
<meta charset=utf-8 />
<title>Registartion Form</title>
<style>
  body {
    max-width: 980px;
    margin: 2em auto;
    font: normal 15px/1.5 Arial, sans-serif;
    color: #353535;
    overflow-y: scroll;
  }
  .content {
    margin: 0 30px;
  }

  .field.buttons button {
    margin-right: .5em;
  }

  #invalid {
    display: none;
    float: left;
    width: 290px;
    margin-left: 120px;
    margin-top: .5em;
    color: #CC2A18;
    font-size: 130%;
    font-weight: bold;
  }

  .idealforms.adaptive #invalid {
    margin-left: 0 !important;
  }

  .idealforms.adaptive .field.buttons label {
    height: 0;
  }
  .loading{
	  
  }
</style>
  <script src="../../js/jquery.js"></script>

<script type="text/javascript">
  
	$(function() {
		$("#pic").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
				$('#previewing').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
			}
			else
			{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
	
	
	function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '20px');
		$('#previewing').attr('height', '180px');
	};
  
  </script>
</head>
<body>

  <div class="content">

    <div class="idealsteps-container">

      <nav class="idealsteps-nav"></nav>

      <form action="" novalidate autocomplete="off" class="idealforms" enctype="multipart/form-data" id="form1">

        <div class="idealsteps-wrap">

          <!-- Step 1 -->

          <section class="idealsteps-step">
			<div class="field">
              <label class="main">Name:</label>
              <input name="name_" type="text" id="name" data-idealforms-ajax="ajax.php">
              <span class="error"></span>
            </div>
			
            <div class="field">
              <label class="main">Username:</label>
              <input name="username" id="username"type="text" data-idealforms-ajax="ajax.php">
              <span class="error"></span>
            </div>
			
			

            <div class="field">
              <label class="main">Password:</label>
              <input name="password" id="password" type="password">
              <span class="error"></span>
            </div>

            <div class="field">
              <label class="main">Confirm Password:</label>
              <input name="confirmpass" type="password">
              <span class="error"></span>
            </div>          
                 
            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="next">Next &raquo;</button>
            </div>

          </section>

          <!-- Step 2 -->

          <section class="idealsteps-step">

            <div class="field">
              <label class="main">Sex:</label>
              <p class="group">
                <label><input name="sex" type="radio" value="m">Male</label>
                <label><input name="sex" type="radio" value="f">Female</label>
              </p>
              <span class="error"></span>
            </div>
			<div class="field">
              <label class="main">Date:</label>
              <input name="date" type="text" id="dob"placeholder="mm/dd/yyyy" class="datepicker">
              <span class="error"></span>
            </div>
            <div class="field">
              <label class="main">Year:</label>
              <p class="group">
                <label><input name="year" type="radio" value="1">First</label>
                <label><input name="year" type="radio" value="2">Second</label>
                <label><input name="year" type="radio" value="3">Third</label>
                <label><input name="year" type="radio" value="4">Fourth</label>
              </p>
              <span class="error"></span>
            </div>

            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="prev">&laquo; Prev</button>
              <button type="button" class="next">Next &raquo;</button>
            </div>

          </section>

          <!-- Step 3 -->

          <section class="idealsteps-step">

           <div class="field">
              <label class="main">E-Mail:</label>
              <input name="email" id="email"type="email">
              <span class="error"></span>
            </div>

            

            <div class="field">
              <label class="main">Group:</label>
              <select name="group">
                <option value="default">&ndash; Select an option &ndash;</option>
                <option value="R1">R1</option>
                <option value="R2">R2</option>
                <option value="R3">R3</option>
              </select>
              <span class="error"></span>
            </div>

           <div class="field">
              <label class="main">Picture:</label>
              <input id="pic" name="pic" type="file" accept="image/*">
              <span class="error"></span>
			  <div id="image_preview"><img id="previewing" src='../../images/anonymous.jpg'/></div>
            </div>
			

            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="prev">&laquo; Prev</button>
              <button type="submit" class="submit" id="submit1">Submit</button>
            </div>

          </section>

        </div>

        <span id="invalid"></span>

      </form>

    </div>
<div><a href="../login.php">Already Registered? Login</a></div>
  </div>

  <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="js/out/jquery.idealforms.js"></script>
  <script type="text/javascript">
  
	$(function() {
		$("#pic").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
				$('#previewing').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
			}
			else
			{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
	
	
	function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '250px');
		$('#previewing').attr('height', '230px');
	};
  
  </script>
  <!--<script src="js/out/jquery.idealforms.min.js"></script>-->
  <script>

    $('form.idealforms').idealforms({

      silentLoad: false,

      rules: {
        'username': 'required username ajax',
        'email': 'required email',
		'name_':'required name_ ajax',
        'password': 'required pass',        
        'confirmpass': 'required equalto:password',
        'date': 'required date',
        //'pic': 'required extension:jpg:png',
        'year': 'minoption:1',
        'sex': 'minoption:1',
        'group': 'select:default',
      },

      errors: {
        'username': {
          ajaxError: 'Username not available'
        }
      },

      onSubmit: function(invalid, e) {
        e.preventDefault();
        $('#invalid')
          .show()
          .toggleClass('valid', ! invalid)
          .text(invalid ? (invalid +' invalid fields') : 'All good..Logging in..!');
		  if(!invalid){
			  /*var name=$('#name').val();
			  var username=$('#username').val();
			  var password=$('#password').val();
			  var gender=$('input[name="sex"]:checked').val();
			  var dob=$('#dob').val();
			  var year=$('input[name="hobbies"]:checked').val();
			  var email=$('#email').val();
			  var group=$('#group').val();
			  var pic = "kk";
			  */
			  $('#submit1').attr('disabled',true);
			  $('#message').html('<span class=\"error\">dd</span>')
		  $.ajax({
			  url:'../register.php',
			  type:'POST',
			  data: new FormData($('form')[0]), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,  
			  //data: 'name='+name+'&username='+username+'&password='+password+'&gender='+gender+'&dob='+dob+'&year='+year+'&email='+email+'&group='+group+'&pic='+pic,
			  success:function(e){
				  if(e=="Logged in"){
					alert(e);	
					window.location.href="../login.php";


				  }
				  else {
					  alert("Registration failed..!! Try Again..!!");

				  }
			  }
			  
		  });
		  }
      }
    });

    $('form.idealforms').find('input, select, textarea').on('change keyup', function() {
      $('#invalid').hide();
    });
/*
    $('form.idealforms').idealforms('addRules', {
      'comments': 'required minmax:50:200'
    });*/

    $('.prev').click(function(){
      $('.prev').show();
      $('form.idealforms').idealforms('prevStep');
    });
    $('.next').click(function(){
      $('.next').show();
      $('form.idealforms').idealforms('nextStep');
    });

	
  </script>
</body>
</html>
