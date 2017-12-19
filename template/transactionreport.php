<div class="container-fluid top-bar">
    <div class="col-md-12">
       <div class="row">
        <div class="col">
            <i class="fa fa-bars fa-2x" aria-hidden="true" id="menu"></i>
        </div>
            <div class="col text-nowrap pageheader">
                Transaction Reports
            </div>
        <div class="col">
            <div class="dropdown">
                 <i class="fa fa-user-o fa-2x float-right" aria-hidden="true"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item text-center text-nowrap font-weight-bold">Welcome</div>
                    <div class="dropdown-divider font-weight-bold"></div>
                    <div class="dropdown-item text-nowrap font-weight-bold">Username: Majiya2015</div>
                    <div class="dropdown-item text-nowrap font-italic font-weight-normal">First name: Abdullahi</div>
                    <div class="dropdown-item text-nowrap font-italic font-weight-normal">Last name: Majiya</div>
                    <div class="dropdown-divider font-weight-bold"></div>
                    <a class="dropdown-item text-nowrap font-weight-bold" href="#/">Logout</a>
                   
                 
                </div>
            </div>
        </div>
       </div>
    </div>
</div>

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
                    <a href="/#!/transactionreport" class="mylink">  
                    <div class="panel-tabs">Transaction reports</div>
                    </a>
                    <a href="/#!/makedeport" class="mylink">  
                    <div class="panel-tabs">Make Deports</div>
                    </a>
                    <a href="/#!/deportsreports" class="mylink">  
                    <div class="panel-tabs">Deports reports </div>
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
                                    <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                    <option value="USD">All Currency</option>
                                    <option value="USD">USD VS NGN</option>
                                    </select>
                                </div>   
                                <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Report For</label>
                                    <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                    <option value="USD">Today Transaction</option>
                                    <option value="USD">Last week</option>
                                    <option value="USD">Last Month</option>
                                    <option value="USD">Last Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <button style="margin-top:1.5em; cursor:pointer" type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Generate Report</button>
                                  <button type="button" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Reset</button>
                                  
                                  <button type="button" style="cursor:pointer;margin-top:1.5em" class="btn btn-danger btn-block btn-lg">Print Report</button>
                              </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="label text-center font-weight-bold text-nowrap">Report Result: Today</div>
                                 <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction March</th>
                                        <th>Host Staff</th>
                                        <th>Customer Name</th>
                                        <th>Transaction Amount</th>
                                        <th>Rate</th>
                                        <th>Outgoin Amount</th>
                                        <th>Transaction Date</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>USD VS NGN</td>
                                        <td>Abdullahi Majiya</td>
                                        <td>TECHVALLEY</td>
                                        <td>N 60,000.00</td>
                                        <td>N 300.00</td>
                                        <td>$ 120.00</td>
                                        <td>28 NOV 2017</td>
                                    </tr>
                                     <tr>
                                        <td>2</td>
                                        <td>USD VS NGN</td>
                                        <td>Abdullahi Majiya</td>
                                        <td>TECHVALLEY</td>
                                        <td>N 60,000.00</td>
                                        <td>N 300.00</td>
                                        <td>$ 120.00</td>
                                        <td>28 NOV 2017</td>
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