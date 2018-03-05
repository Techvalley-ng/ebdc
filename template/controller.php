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
                   <div class="row">
                    <div class="col-md-12 tem-box">
                        <div class="row">
                                <div class="col-md-12" ng-show="loading">
                                    <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                                </div
                            <!--########################### TAB ###########################-->
                            <div class="col-md-4" ng-repeat="tab in tab">
                                <div class="c-tab">
                                    <div class="row">
                                        <div class="col">
                                            <div class="img-fluid img-thumbnail rounded float-left">
                                                <h4>{{tab.symbol}}</h4>
                                            </div>
                                            <span class="currency-name">{{tab.name}}</span>
                                        </div>
                                        <div class="col rate text-right">{{tab.outgoing}} : {{tab.incoming}}</div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive-sm">
                                               <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                                <tr>
                                                  <th scope="col">Opening Balance:</th>
                                                  <th scope="col">{{tab.openingbalance | currency:tab.symbol+" ":0}}</th>
                                                </tr>
                                                <tr class="table-success">
                                                  <th scope="col">Current Balance:</th>
                                                  <th scope="col">{{tab.balance | currency:tab.symbol+" ":0}}</th>
                                                </tr>
                                                 <tr class="table-primary">
                                                  <th scope="col">Transaction Made:</th>
                                                  <th scope="col">{{tab.transaction_made | currency:tab.symbol+" ":0}}</th>
                                                </tr>
                                              </table>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col">
                                            <a href="/#!/maketransaction/{{tab.deposit_id}}/{{tab.outgoing}}/{{tab.incoming}}/" class="mylink">
                                                <input type="submit" value="Make Transaction" class="btn btn-primary form-control"/>
                                            </a>    
                                        </div>
                                        <div class="col">
                                            <a href="/#!/tabsreport/{{tab.deposit_id}}">
                                                <input type="submit" value="View Reports" class="btn btn-danger form-control"/>
                                            </a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!--########################### TAB ###########################-->
                            
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>



 
