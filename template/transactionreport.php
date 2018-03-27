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
                                   Generate Transaction Report
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Select Currency Category</label>
                                    <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control" ng-model="selectedItem" ng-change="change()">
                                    <option value="">Pleas Select Currency</option>
                                    <option ng-repeat="match_list in match_list_database | filter: {name: ''}" value="{{match_list.marched_id}}"
                                    ng-selected="selectedItem == match_list.marched_id"
                                    >
                                        {{match_list.name}} ({{match_list.code}}) VS {{match_list.incomingname}} ({{match_list.incomingcode}})
                                    </option>
                                    </select>
                                </div>   
                                <div class="form-group" style="margin-top:2em;">
                                    <button type="button" style="cursor:pointer" class="btn btn-primary btn-block btn-lg" id="generaterport">Generate Report</button>
                                    <button type="button" style="cursor:pointer" class="btn btn-danger btn-block btn-lg">Print Report</button>
                                </div>       
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:2em;">
                                    <label for="from" class="label">From</label>
                                    <input type="text" id="from" ng-model="from" name="from" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                </div>
                                <div class="form-group" style="margin-top:2em;">
                                    <label for="to" class="label">To</label>
                                    <input type="text" id="to" name="to" ng-model="to" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                 </div>
                              </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div ng-show="loading">
                                <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                                </div>
                                <div class="label text-center font-weight-bold text-nowrap">Report Result: Today</div>
                                 <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction March</th>
                                        <th>Host Staff</th>
                                        <th>Customer Name</th>
                                        <th>Transaction Amount</th>
                                        <th>Rate</th>
                                        <th>type</th>
                                        <th>Outgoin Amount</th>
                                        <th>Transaction Date</th>
                                    </tr>
                                    <tr ng-repeat="reportdata in transactionreportdata">
                                        <td>1</td>
                                        <td>{{reportdata.outgoing}} VS {{reportdata.incoming}}</td>
                                        <td>{{reportdata.fname}} {{reportdata.lname}}</td>
                                        <td>{{reportdata.customer_name}}</td>
                                        <td>{{reportdata.transactionamount}}</td>
                                        <td>{{reportdata.rate}}</td>
                                        <td>{{reportdata.tran_type}}</td>
                                        <td>{{reportdata.outgoing_amount}}</td>
                                        <td>{{reportdata.transaction_date}}</td>
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