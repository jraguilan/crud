
  <div class="container">
       <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>LIST OF PURCHASES</strong></div>

                <div class="panel-body">
                   


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
              


        <a class="btn btn-primary" href="edit/{{ $user1->id }}" style="padding-left: 25px; padding-right: 25px;">Edit</a>
        <button class="btn btn-danger" data-href="delete/{{ $user1->id }}" data-toggle="modal" data-target="#confirm-delete">
            Delete
        </button>
 <!--DELETE MODAL-->
         <div class="modal fade" id="confirm-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


        </td>
              </tr>
              
  @endforeach

      
<script>
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        </script>

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
         <button type="submit" id="button1id" name="button1id" class="btn btn-success">CREATE</button>
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
