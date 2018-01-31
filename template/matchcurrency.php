<div class="container-fluid top-bar">
    <div class="col-md-12">
       <div class="row">
        <div class="col">
            <i class="fa fa-bars fa-2x" aria-hidden="true" id="menu"></i>
        </div>
            <div class="col text-nowrap pageheader">
                Match Transaction
            </div>
        <div class="col">
            <div class="dropdown float-right">
                <a href="/#!/outgoingcash"><div class="fa fa-bell fa-2x notification" aria-hidden="true" id="noty"></div></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-user-o fa-2x" aria-hidden="true"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
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
                                            <option value="USD">Select Currency</option>
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
                                  <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Opening Balance</label>
                                        <div class="input-group mb-2 mb-sm-0">
                                        <div class="input-group-addon">USD Opening</div>
                                        <input type="text" class="form-control form-control-lg" name="Customername" value="40,000.00"> 
                                        </div>
                                    </div>
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