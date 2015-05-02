<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
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
</style>
</head>
<body>

  <div class="content">

    <div class="idealsteps-container">

      <nav class="idealsteps-nav"></nav>

      <form action="" novalidate autocomplete="off" class="idealforms">

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
                <label><input name="hobbies" type="radio" value="first">First</label>
                <label><input name="hobbies" type="radio" value="second">Second</label>
                <label><input name="hobbies" type="radio" value="third">Third</label>
                <label><input name="hobbies" type="radio" value="fourth">Fourth</label>
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
              <select name="options" id="group">
                <option value="default">&ndash; Select an option &ndash;</option>
                <option value="R1">R1</option>
                <option value="R2">R2</option>
                <option value="R3">R3</option>
              </select>
              <span class="error"></span>
            </div>

           <div class="field">
              <label class="main">Picture:</label>
              <input id="picture" name="picture" type="file" multiple>
              <span class="error"></span>
            </div>

            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="prev">&laquo; Prev</button>
              <button type="submit" class="submit">Submit</button>
            </div>

          </section>

        </div>

        <span id="invalid"></span>

      </form>

    </div>

  </div>

  <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="js/md5.js">//Script file for password hashing</script>
  <script src="js/out/jquery.idealforms.js"></script>
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
        'picture': 'required extension:jpg:png',
        'website': 'url',
        'hobbies[]': 'minoption:1 maxoption:1',
        'phone': 'required phone',
        'zip': 'required zip',
        'options': 'select:default',
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
          .text(invalid ? (invalid +' invalid fields') : 'All good!');
		  if(!invalid){
			  var name=$('#name').val();
			  var username=$('#username').val();
			  var password=$('#password').val();
			  password=hex_md5(password);
			  var gender=$('input[name="sex"]:checked').val();
			  var dob=$('#dob').val();
			  var year=$('input[name="hobbies"]:checked').val();
			  var email=$('#email').val();
			  var group=$('#group').val();
			  var pic = "kk";
		  $.ajax({
			  url:'../register.php',
			  type:'POST',
			  data:'name='+name+'&username='+username+'&password='+password+'&gender='+gender+'&dob='+dob+'&year='+year+'&email='+email+'&group='+group+'&pic='+pic,
			  success:function(e){
				  alert(e+"registered successfully");
			  }
			  
		  });}
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
