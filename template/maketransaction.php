<div class="container-fluid top-bar">
    <div class="col-md-12">
       <div class="row">
        <div class="col">
            <i class="fa fa-bars fa-2x" aria-hidden="true" id="menu"></i>
        </div>
            <div class="col text-nowrap pageheader">
                Transaction For USD TO NGN
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
                                   Enter Customer Information
                                </div>
                        
                             <div class="row">
                                 <div class="col giving text-left text-nowrap font-weight-bold">
                                     You are Collecting in: <span>$</span> <span id="ct">{{collecting | currency :"":0 }}</span>
                                      
                                 </div>
                                 <div class="col collecting text-right text-nowrap font-weight-bold">
                                      You are giving out : <span>N</span> <span>{{collecting*rate | currency :"":0 }}</span>
                                 </div>
                             </div>
                             <div class="row">
                              <div class="col-md-6">
                                  
                                  <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Enter Customer Name</label>
                                    <input type="text" class="form-control form-control-lg" name="Customername"  placeholder="Customer name" required>
                                  </div>
                                  
                              </div>
                              
                              <div class="col-md-6">
                                  
                                  <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Amount">Enter Transaction Amount</label>
                                    <input type="number" blur-to-currency class="form-control form-control-lg" name="Amount" ng-model="collecting"  placeholder="Amount" format="currency" >
                                  </div>
                                  
                              </div>
                             
                             </div>
                             
                             <div class="row">
                                 <div class="col-md-12">
                                     <label class="label text-center text-nowrap font-weight-bold" for="Rate">Enter Exchange rate</label>
                                     <div class="input-group mb-2 mb-sm-0">
                                        <div class="input-group-addon">1 USD IS</div>
                                        <input type="text" class="form-control form-control-lg" name="rate"  ng-model="rate" placeholder="Enter Rate">
                                      </div>
                                 </div>
                             </div>
                             <br>
                              <div class="row">
                                  <div class="col-md-6">
                                      <button type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Make Transaction</button>
                                  </div>
                                  <div class="col-md-6">
                                      <button type="button" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Cancle Transaction</button>
                                  </div>
                              </div>
                              
                       </div>
                   </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>