@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Update ID number: <?php echo $users2[0]->id; ?></div>

                <div class="panel-body">
                    
                    <form class="form-horizontal" action="/edit/<?php echo $users2[0]->id; ?>" method="post">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                    <fieldset>
                    <div class="form-group">
                            <label class="col-md-4 control-label" for="purchase">Purchase</label>
                              <div class="col-md-6">
                                   <input id="purchase" name="purchase2" class="form-control" required="" readonly="" value="<?php echo $users2[0]->purchase; ?>">
                                   
                                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
                              </div>
                      </div>
                  
                    <div class="form-group">
                            <label class="col-md-4 control-label" for="amount">Amount</label>
                              <div class="col-md-6">
                                   <input id="amount" step="any" name="amount2" class="form-control" value="<?php echo $users2[0]->amount; ?>" required="" type="number" readonly>
                                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
                              </div>
                      </div>
                     
                      <div class="form-group">
                            <label class="col-md-4 control-label" for="operator">Operator</label>
                              <div class="col-md-6">
                                   <input id="operator" name="operator2" class="form-control" value="<?php echo $users2[0]->operator; ?>" required="" type="text" readonly>
                                   
                                 <!--  <p class="help-block">Input amount in Philippine peso..</p>-->
                              </div>
                      </div>

                       <div class="form-group">
                                <label class="col-md-4 control-label" for="remarks">Remarks</label>
                                <div class="col-md-6">                     
                                  <textarea type="textarea" rows="4" cols="50" autofocus class="form-control" id="remarks" placeholder="Remarks" name="remarks" value='<?php echo $users2[0]->remarks; ?>'><?php echo $users2[0]->remarks; ?></textarea>
                                </div>
                        </div>  
                                        
                         <div class="col-md-6 col-md-offset-4">
                                <button type="submit" onclick="return confirm('Do you really want to update this record?')" id="button1id" name="button1id" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-ok"></span> Update</button>
                              
                        </div>

                      </fieldset>
                    </form>
                </div>
                 <div class="panel-footer text-right">
                     <a href="/home" class="btn btn-default">Back</a>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
