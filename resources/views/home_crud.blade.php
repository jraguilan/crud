<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Ayannah Ojt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>
<body>
 <!-- <header>
    <div class="jumbotron text-center">
      <h1>Dashboard</h1>
        <p style="border-left-color: green">This is your dashboard.</p> 
    </div>

  </header> -->

<section>
  <div class="container">
    <h2>TRANSACTIONS</h2>
      <p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

        <div class="row"></div>
          <div class="col-sm-12" style="background-color: #EEEEEE;
    padding: 50px 50px;
    border: ">
            <ul class="nav nav-pills nav-justified">
              <li class="active"><a data-toggle="pill" href="#view_purchase">PURCHASES</a></li>
            </ul>
          </div>

        <div class="col-sm-12"></div>
      <div class="tab-content">
        <div id="view_purchase" class="tab-pane fade in active">
          <h3>LIST OF PURCHASES</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.To make the tabs toggleable, add the data-toggle="pill" attribute to each link. </p>

          <div class="row">
             <div class="col-sm-3">
               
          <input type="datetime-local" name="date">
   
             </div>
               <div class="col-sm-3"></div>
                 <div class="col-sm-3"></div>
                   <div class="col-sm-3">
      <a id="button3id" name="button3id" class="btn btn-success" href="add-purchase" data-toggle="modal" data-target="#addModal" style="padding-left: 30px; padding-right: 30px;">Create New Transaction</a>
                  </div>
          </div>
    <div>
          <table class="table table-striped">
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
            <th></th>
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
              <div>
      <div>

        <a class="btn btn-info" href="edit/{{ $user1->id }}" style="padding-left: 25px; padding-right: 25px;">Edit</a>
        <button class="btn btn-danger" data-href="delete/{{ $user1->id }}" data-toggle="modal" data-target="#confirm-delete">
            Delete
        </button>
 <!--DELETE MODAL-->
      <!--    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header  btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                    </div>
                
                    <div class="modal-body">
                        <p>You are about to delete this record, this procedure is irreversible.</p>
                        <p>Do you want to proceed?</p>
                        <p class="debug-url"></p>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
 -->

        <!--<button class="btn btn-default" data-href="delete/{{ $user1->id }}" data-toggle="modal" data-target="myModal2">-->

  <!--EDIT MODAL--><!--
<div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    
       Modal content
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title ">Edit Purchase</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this record, this procedure is irreversible.</p>
                        <p>Do you want to proceed? 
                        <p class="debug-url"></p>-->
<!--
        <form class="form-horizontal" action="/edit/{{ $user1->id }}" method="post">
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

      <legend>Edit from..</legend>
    <fieldset>
    <div class="form-group">
            <label class="col-md-4 control-label" for="purchase">Purchase</label>
              <div class="col-md-6">
                   <input id="purchase" list="purchase_list" name="purchase2" class="form-control" required="" placeholder='<?php echo $users2[0]->purchase; ?>'>
                   <datalist id="purchase_list">
                     <option value="Load">
                      <option value="Smartmoney">
                   </datalist>
                
              </div>
      </div>
  
    <div class="form-group">
            <label class="col-md-4 control-label" for="amount">Amount</label>
              <div class="col-md-6">
                   <input id="amount" name="amount2" class="form-control" placeholder="<?php echo $users2[0]->amount; ?>" required="" type="number">
                 
              </div>
      </div>
     
      <div class="form-group">
            <label class="col-md-4 control-label" for="operator">Operator</label>
              <div class="col-md-6">
                   <input id="operator" list="operator_list" name="operator2" class="form-control" placeholder="<?php echo $users2[0]->operator ?>" required="" type="text">
                    <datalist id="operator_list">
                      <option value="Smart">
                      <option value="Sun">
                      <option value="Globe">
                   </datalist>
                
              </div>
      </div>
      
    </fieldset>

    </form>
 
      </div>
       
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a id="button1id" name="button1id" class="btn btn-primary btn-ok">UPDATE</a>
            </div>

      </div>
    </div>
 </div> -->
        


          </div>
        </div>

        </td>
              </tr>
              
  @endforeach
        <script>
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        </script><!--
<script type="text/javascript">
     $("#selectpur").val("{{$user1->purchase}}");
        $("#amount").val("{{$user1->amount}}");
         $("#operator").val("{{$user1->operator}}");
</script>-->
           
            </tbody>

          </table>
  <?php 
  echo $users2->render(); 
  ?>

        </div>
 
</div>
</div>

<!--CREATE NEW MODAL-->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CREATE PURCHASE</h4>
        </div>
        <div class="modal-body">
 
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="row">
              <div class="col-sm-12">
                <form class="form-horizontal" action="purchase" method="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <fieldset>
              <form>
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
                    <input id="amount" name="amount" class="form-control" placeholder="" type="number" required="">
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
         <button type="submit" id="button1id" name="button1id" class="btn btn-success">CREATE</button>
        </div>

          
        </form>
         </fieldset>
        </div>           
     
        </div>
    
   </div>
 </div>
 </div>
</div>
</div>


<br><br><br><br>

<footer>
  <div class="jumbotron fixed-bottom text-center" 
 style="background-color: #EEEEEE;
 padding-bottom:20px;
 padding-top:20px;">
   <h4>© Copyright 2017</h4>


 </div> 
</footer>

<script>
        $('#myModal2').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
</body>
</html>
