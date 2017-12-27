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

   <title>Purchasing | Ayannah Ojt</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


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
                    PURCHASING
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
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>

                                      @if (Auth::user()->status == 1)
                                        <a href="register">
                                            Register User
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                      @else
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                      @endif

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
<!-- 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                </div>
            </div>
        </div>
    </div>
</div>
 -->
  <div class="container">
       <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>LIST OF PURCHASES</strong></div>

                <div class="panel-body">
                   
          <div class="row">
             <div class="col-sm-9">
             
             <form class="form-inline" action="search" method="get">

            <div class="form-group">
                <label for="datetimepicker1"> Date from:</label>
                    <input type='date' id='datetimepicker1' name="datetimepicker1" class="form-control" required="" />
               
            </div>
             <div class="form-group">
                <label for="datetimepicker2"> Date to:</label>
                    <input type='date' id='datetimepicker2' name="datetimepicker2" class="form-control" required="" />
               
            </div>
          <button class="btn btn-primary" type="submit" style="padding-left: 67px; padding-right: 67px;"><span class="glyphicon glyphicon-search"></span>  Search</button> 
           </form>
              
             </div>
             <div class="col-sm-3 text-right">  
          <a id="button3id" name="button3id" class="btn btn-success" href="add-purchase" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus"></span> Create New Transaction</a>     
           </div><br>
               <div class="col-sm-12"><br></div>
                   <div class="col-sm-12">
      
                           <div>
     
          <table id="example" class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Operator</th>
            <th>User</th>
             <th>Date Purchase</th>
            <th>Date Updated</th>
            <th>Remarks</th>
            <th>Action</th> 
          </tr>
        </thead>
          <tbody>
          @foreach ($users2 as $user1)
          <tr>
            <td>{{ $user1->id }}</td>
            <td>{{ $user1->purchase }}</td>
            <td>{{ $user1->amount }}</td>
            <td>{{ $user1->operator }}</td>
            <td>{{ $user1->actor }}</td>
            <td>{{ $user1->created_at }}</td> 
            <td>{{ $user1->updated_at }}</td>
            <td>{{ $user1->remarks }}</td>
            
            <td>
              
<!-- echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$query2['id']."'>x</a></td><tr>"; //use double quotes for js inside php!
 -->
        <a class="btn btn-primary" href="edit/{{ $user1->id }}"" style="padding-left: 20px; padding-right: 20px"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <a class="btn btn-danger" href="delete/{{ $user1->id }}" onclick="return confirm('Do you really want to delete this record?\nID number: {{ $user1->id }}')"><span class="glyphicon glyphicon-remove"></span>
        <!--   <script>
function myFunction() {
    confirm("Do you really want to delete this record?");
}
</script> -->
        <!--    data-target="#confirm-delete" data-toggle="modal -->
            Delete
        </a>

        </td>
              </tr>
  @endforeach

 <!--DELETE MODAL-->
        <!--  <div class="modal fade" id="confirm-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header  btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                    </div>
                
                    <div class="modal-body">
                        <p>You are about to delete this record, this procedure is irreversible.</p>
                        <p>Do you want to proceed? {{ $user1->id }}</p>
                        <!-- <p class="debug-url"></p> -->
                   <!--  </div>
                       
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="delete">Delete</a>
                    </div>
                </div>
            </div>
        </div> --> 

<!-- 
   @if(session('user_id'))
    <script>
    $(function() {
        $('.btn-danger').click(function (){
            var url = ($(this).attr('id'));
            $($(this).data('target')).show();
        })
    });
    </script>
@endif
 -->


<!--       
<script>
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        </script> -->

            </tbody>
          </table>

        </div>

                  </div>
          </div>
   
 
</div>
</div>

<!--CREATE NEW USER-->
<!-- <div class="modal fade" id="addusermodal" role="dialog">
    <div class="modal-dialog">
    
       Modal content
      <div class="modal-content">
        <div class="modal-header btn-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CREATE USER</h4>
        </div>
        <div class="modal-body">
 
        <p></p>

                
              <div class="modal-footer ">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" id="button1id" name="button1id" class="btn btn-success">CREATE</button>
        </div>
             
        </div>           
        </div>
      </div>

        
      </div> -->
           

    </div>
  </div>
<!--CREATE NEW MODAL-->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PURCHASE</h4>
        </div>
        <div class="modal-body">
 
        <p></p>
            <div class="row">
              <div class="col-sm-12">
                <form class="form-horizontal" action="purchase" method="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <fieldset>
              <!-- Form Name 
              <legend>Purchase</legend>
               Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="selectpurchase">Purchase</label>
                <div class="col-md-6">
                  <select id="selectpurchase" name="selectpurchase" class="form-control">
                    <option value="Load">Load</option>
                    <option value="Smartmoney">Smartmoney</option>
                  </select>
                </div>
              </div>
                            <!-- Prepended text-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="amount">Amount</label>
                <div class="col-md-6">
                    <input id="amount" name="amount" class="form-control" placeholder="" type="number" step="any" required="">
                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="selectoperator">Operator</label>
                <div class="col-md-6">
                  <select id="selectoperator" name="selectoperator" class="form-control">
                    <option value="Smart">Smart</option>
                    <option value="Sun">Sun</option>
                    <option value="Globe">Globe</option>
                  </select>
                </div>
              </div> 
              <div class="modal-footer ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" id="button1id" name="button1id" class="btn btn-success">Create</button>
        </div>
             </fieldset>
          </form>
        </div>           
      </div>
        </div>

        
      </div>
           

    </div>
  </div>

  </div>


 
</div>


 </div>
    
</div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    
        var unix = 0;
$('#datetimepicker1').datetimepicker({
    inline: true,
    sideBySide: true
  }).on('dp.change', function(e) {
              unix =  e.date.unix();
 });
    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
   <!--  <script type="text/javascript">
      document.getElementById('datetimepicker1').valueAsDate = new Date()
        document.getElementById('datetimepicker2').valueAsDate = new Date()
    </script> -->
</body>
</html>



