<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
   
    <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Home | Ayannah Ojt</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand">
                    CRUD
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                       
                            <li><a href="/home">Back</a></li>
                            
                    </ul>
                </div>
            </div>
        </nav>

      
    </div>
<br><br><br>
<div class="container">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Edit</strong></div>

                <div class="panel-body">
                   


<div class="row">
  
<br>
    <form class="form-horizontal" action="/edit/<?php echo $users2[0]->id; ?>" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    
    <fieldset>
    <div class="form-group">
            <label class="col-md-4 control-label" for="purchase">Purchase</label>
              <div class="col-md-6">
                   <input id="purchase" list="purchase_list" name="purchase2" class="form-control" required="" placeholder='<?php echo $users2[0]->purchase; ?>'>
                   <datalist id="purchase_list">
                     <option value="Load">
                      <option value="Smartmoney">
                   </datalist>
                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
              </div>
      </div>
  
    <div class="form-group">
            <label class="col-md-4 control-label" for="amount">Amount</label>
              <div class="col-md-6">
                   <input id="amount" step="any" name="amount2" class="form-control" placeholder="<?php echo $users2[0]->amount; ?>" required="" type="number">
                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
              </div>
      </div>
     
      <div class="form-group">
            <label class="col-md-4 control-label" for="operator">Operator</label>
              <div class="col-md-6">
                   <input id="operator" list="operator_list" name="operator2" class="form-control" placeholder="<?php echo $users2[0]->operator; ?>" required="" type="text">
                    <datalist id="operator_list">
                      <option value="Smart">
                      <option value="Sun">
                      <option value="Globe">
                   </datalist>
                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
              </div>
      </div>

       <div class="form-group">
                <label class="col-md-4 control-label" for="remarks">Remarks</label>
                <div class="col-md-6">                     
                  <textarea class="form-control" id="remarks" name="remarks" placeholder='<?php echo $users2[0]->remarks; ?>'></textarea>
                </div>
        </div>  
    <center>
        <button type="submit" onclick="alert('Record updated successfully')" id="button1id" name="button1id" class="btn btn-primary">UPDATE</button>
    </center>  

      </fieldset>
    </form>
 <br>
      
   </div>
  </div>



                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



</body>

<br><br>
<br><br><br><br>
<footer>
  <nav class="navbar navbar-default navbar-static-bottom">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                       
                            <li><a></a></li>
                            
                    </ul>
                </div>
            </div>
        </nav>
</footer>
<script>
        $('#myModal2').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
 <script src="{{ asset('js/app.js') }}"></script>
</html>
