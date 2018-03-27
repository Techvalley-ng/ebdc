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
                            <div class="tem-tiltle text-center font-weight-bold text-nowrap" id="amounterror">
                                   Make deposits on Transaction
                            </div>
                            <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Select Transaction To Deposit For:</label>
                                    <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control" ng-model="selectedItem" ng-change="change()">
                                    <option value="">select option</option>
                                    <option ng-repeat="match_list in match_list_database | filter: {name: ''}" value="{{match_list.marched_id}}|{{match_list.code}}|{{match_list.incomingcode}}|{{match_list.symbol}}"
                                    ng-selected="selectedItem == match_list.marched_id"
                                    >
                                        {{match_list.name}} ({{match_list.code}}) VS {{match_list.incomingname}} ({{match_list.incomingcode}})
                                    </option>
                                    
                                    </select>
                                </div> 
                                 </div>
                            </div>
                            <!--this get the html data base on the select from the controller-->
                                <div ng-bind-html="deposit_analysis"></div>
                                <div ng-include="curTemplate"></div>
                                

                             <br>
                             <div class="row">
                                <div class="col-md-12">
                                <div class="label text-center font-weight-bold text-nowrap">Check Out and Check In</div>
                                     <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                        <tr>
                                            <th>#</th>
                                            <th>currency Match</th>
                                            <th>Statues</th>
                                            <th>Amout</th>
                                            <th>Staff Added</th>
                                        </tr>
                                        <tr ng-repeat="deposit_list_data in deposit_list | limitTo:5">
                                            <td>{{$index+1}}</td>
                                            <td>{{deposit_list_data.match_name}}</td>
                                            <td>{{deposit_list_data.statues}}</td>
                                            <td>{{deposit_list_data.symbol}}{{deposit_list_data.amount | currency:" ":0}}</td>
                                            <td>{{deposit_list_data.staff_name}}</td>
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

