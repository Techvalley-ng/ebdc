<div class="container-fluid top-bar">
    <div class="col-md-12">
       <div class="row">
        <div class="col">
            <i class="fa fa-bars fa-2x" aria-hidden="true" id="menu"></i>
        </div>
            <div class="col text-nowrap pageheader">
                Deports Centre
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
                                   Make Deports on Transaction
                            </div>
                            <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Select Transaction To Deport For:</label>
                                    <select name="currency" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                    <option value="USD">select option</option>
                                    <option value="USD">USD VS NGN</option>
                                    <option value="USD">NGN VS USD</option>
                                    </select>
                                </div> 
                                 </div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="tem-tiltle text-center font-weight-bold text-nowrap">
                                       Check Out And Check In For: USD TO NGN
                                    </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                     <div class="giving text-left text-nowrap font-weight-bold">
                                     Check out old transaction
                                     </div>
                                     <br>
                                     <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                        <tr>
                                                  <th scope="col">Opening Balance:</th>
                                                  <th scope="col">10,000.00</th>
                                                </tr>
                                                <tr >
                                                  <th scope="col">Current Balance:</th>
                                                  <th scope="col">6,000</th>
                                                </tr>
                                                 <tr>
                                                  <th scope="col">Transaction Made:</th>
                                                  <th scope="col">4,000</th>
                                                </tr>
                                    </table>    
                                     <button type="button" class="btn btn-danger form-control">Check Out</button>
                                </div>
                               
                                 
                                 <div class="col">
                                     <div class=" collecting text-right text-nowrap font-weight-bold">
                                     Check in new transaction
                                     </div>
                                     <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Enter Opening Balance</label>
                                         <div class="input-group mb-2 mb-sm-0">
                                            <div class="input-group-addon">USD</div>
                                            <input type="text" class="form-control form-control-lg" name="rate" value="3,000">
                                          </div>
                                     </div>
                                      <button type="button" class="btn btn-danger form-control">Check in</button>
                                 </div>
                            </div>
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
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>USD VS NGN</td>
                                            <td>check out</td>
                                            <td>3,000.00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>USD VS NGN</td>
                                            <td>check In</td>
                                            <td>80,000.00</td>
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

