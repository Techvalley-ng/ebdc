<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col panel">
                    <a href="/#!/home/Dashboard" class="mylink">  
                    <div class="panel-tabs">Dashboard</div>
                    </a>
                    <a href="/#!/addcurrency/Add New Currency/" class="mylink">  
                    <div class="panel-tabs">Add New Currency</div>
                    </a>
                    <a href="/#!/matchcurrency/Match Currency/" class="mylink">  
                    <div class="panel-tabs">Match Currency</div>
                    </a>
                    <a href="/#!/makedeposit/Make Deport/" class="mylink">  
                    <div class="panel-tabs">Make Deposit</div>
                    </a>
                    <a href="/#!/generalreport/Reports" class="mylink">  
                    <div class="panel-tabs">Transaction Reports</div>
                    </a>
                    <a href="/#!/loan/Cash On Loan/" class="mylink">  
                    <div class="panel-tabs">Loans Cash</div>
                    </a>
                </div>
               
               
                <div class="col">
                   <div class="row tem-box">
                       <div class="col whiteboox">
                           <div class="tem-tiltle text-center font-weight-bold text-nowrap">
                                   Match Two Currency For Transaction
                             </div>
                             
                            <form name="newmarchcurrency" method="POST" action="severside/post/processmatchcurrency.php" id="mdothis">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-top:2em;">
                                            <label class="label" for="Customername">Select Selling Currency</label>
                                                <select ng-model="confirmed" ng-change="change()" name="outgoing" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                                <option value="">Select Currency</option>
                                                <option ng-repeat="currency_list in currency_list" value="{{currency_list.currency_id}}">
                                                    {{currency_list.name}} | {{currency_list.code}} | {{currency_list.symbol}}
                                                </option>
                                                </select> 
                                        </div>
                                        
                                        <h4 align="center">VS</h4>
                                    <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Select Buying Currency</label>
                                            <select name="incoming" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control" >
                                            <option value="">Select Currency</option>
                                            <option ng-repeat="currency_list in currency_list | filter:'!'+confirmed" value="{{currency_list.currency_id}}">{{currency_list.name}} | {{currency_list.code}} | {{currency_list.symbol}}</option>
                                            </select> 
                                        </div>
                                        
                                    </div>  
                                    
                                    <div class="col-md-6">
                                    <h4>&nbsp;</h4>
                                    <div class="form-group" style="margin-top:2em;">
                                      <button type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Match Currency</button>
                                      <button type="Reset" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Reset</button>
                                    </div>    
                                  </div>
                                    
                                </div>
                            </form>     
                             
                            <div class="row">
                            <div class="col-md-12">
                                <div ng-show="loading">
                                    <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                                </div>
                                <div class="label text-center font-weight-bold text-nowrap">List Of Matched Currency</div>
                                 <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Selling Currency</th>
                                        <th>Buying Currency</th>
                                        <th>Date Added</th>
                                        <th>Staff Added</th>
                                    </tr>
                                    <tr ng-repeat="match_list in match_list_database | filter: {name: ''}">
                                        <td>{{$index + 1}}</td>
                                        <td>Name: {{match_list.name}} | Code: {{match_list.code}} | Symbol: {{match_list.symbol}}</td>
                                        <td>Name: {{match_list.incomingname}} | Code: {{match_list.incomingcode}} | Symbol: {{match_list.incomingsymbol}}</td>
                                        <td>{{match_list.date_added}}</td>
                                        <td>{{match_list.staff_added}}</td>
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