<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col panel">
                    <a href="/#!/home" class="mylink">  
                    <div class="panel-tabs">Dashboard</div>
                    </a>
                    <a href="/#!/addcurrency" class="mylink">  
                    <div class="panel-tabs">Add New Currency</div>
                    </a>
                    <a href="/#!/matchcurrency" class="mylink">  
                    <div class="panel-tabs">Match Currency</div>
                    </a>
                    <a href="/#!/generalreport" class="mylink">  
                    <div class="panel-tabs">General Reports</div>
                    </a>
                    <a href="/#!/transactionhistroy" class="mylink">  
                    <div class="panel-tabs">Transaction History</div>
                    </a>
                    <a href="/#!/makedeport" class="mylink">  
                    <div class="panel-tabs">Make Deports</div>
                    </a>
                    <a href="/#!/deportsreports" class="mylink">  
                    <div class="panel-tabs">Deports Reports </div>
                    </a>
                    <a href="/#!/outgoingcash" class="mylink">  
                    <div class="panel-tabs">OutGoing Cash</div>
                    </a>
                </div>
               
               
                <div class="col">
                   <div class="row tem-box">
                       <div class="col whiteboox">
                           <div class="tem-tiltle text-center font-weight-bold text-nowrap">
                                   Match Two Currency For Transaction
                             </div>
                             
                             <div class="row">
                              
                              <div class="col-md-6">
                                   <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Select Selling Currency</label>
                                            <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                            <option ng-repeat="currency_list in currency_list | limitTo:8 | orderBy:'-data_added'" value="">Select Currency</option>
                                            <option value="one">{{currency_list.name}}</option>
                                            </select> 
                                    </div>
                                        <h4 align="center">VS</h4>
                                    <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Select Buying Currency</label>
                                            <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                            <option value="USD">Select Currency</option>
                                            </select> 
                                    </div>
                              </div>
                              
                              <div class="col-md-6">
                                  
                                    <h4>&nbsp;</h4>
                                    <div class="form-group" style="margin-top:2em;">
                                      <button type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Match Currency</button>
                                      <button type="button" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Reset</button>
                                    </div>    
                              </div>  
                              
                              
                             </div> 
                             
                            <div class="row">
                            <div class="col-md-12">
                                <div class="label text-center font-weight-bold text-nowrap">List Of Matched Currency</div>
                                
                                 <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Selling Currency</th>
                                        <th>Buying Currency</th>
                                        <th>Opening Balance</th>
                                        <th>Date Added</th>
                                        <th>Staff Added</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>USD</td>
                                        <td>NGN</td>
                                        <td>$ 89,000.00</td>
                                        <td>11 NOV 2017</td>
                                        <td>Abdullahi Majiya</td>
                                    </tr>
                                     <tr>
                                        <td>2</td>
                                        <td>USD</td>
                                        <td>NGN</td>
                                        <td>$ 89,000.00</td>
                                        <td>11 NOV 2017</td>
                                        <td>Abdullahi Majiya</td>
                                    </tr>
                                     <tr>
                                        <td>3</td>
                                        <td>USD</td>
                                        <td>NGN</td>
                                        <td>$ 89,000.00</td>
                                        <td>11 NOV 2017</td>
                                        <td>Abdullahi Majiya</td>
                                    </tr>
                                     <tr>
                                        <td>4</td> 
                                        <td>USD</td>
                                        <td>NGN</td>
                                        <td>$ 89,000.00</td>
                                        <td>11 NOV 2017</td>
                                        <td>Abdullahi Majiya</td>
                                    </tr>
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