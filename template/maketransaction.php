
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
                           <form name="maketransaction" id="maketransaction" action="severside/post/processtransacton.php" method="POST">
                               <div class="tem-tiltle text-center font-weight-bold text-nowrap">
                                   Enter Customer Information To Make Transaction: 
                                   <br>
                                   FOR
                                   {{incoming}} (Customer) TO {{outgoing}} (Company)
                                </div>
                                <div class="row">
                                 <div class="col giving text-left text-nowrap font-weight-bold">
                                     You are Collecting (in): <span id="ct">{{collecting | currency :incoming+" " }}</span>
                                      
                                 </div>
                                 <div class="col collecting text-right text-nowrap font-weight-bold">
                                      You are giving (out): <span>{{collecting/rate | currency:outgoing+" "  }}</span>
                                 </div>
                             </div>
                              
                           
                           <div class="row">
                               <div class="col">
                                       <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Enter Transaction Type</label>
                                        <select class="form-control form-control-lg"name="type">
                                            <option value="Cash">Cash</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                      </div>
                               </div>
                               
                               <div class="col">
                                   <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Enter Customer Name</label>
                                        <input type="text" class="form-control form-control-lg" name="Customername"  placeholder="Customer name" required>
                                      </div>
                               </div>
                           </div>
                           
                           <div class="row">
                               <div class="col">
                                   <div class="form-group">
                                    <label class="label" for="Amount">Enter Transaction Amount: {{incoming}}</label>
                                    <input type="number"  class="form-control form-control-lg" name="Amount" ng-model="collecting"  format="currency">
                                  </div>
                               </div>
                               
                               <div class="col">
                                   <label class="label text-center text-nowrap font-weight-bold" for="Rate">Enter Exchange rate</label>
                                     <div class="input-group mb-2 mb-sm-0">
                                        <div class="input-group-addon">1 {{outgoing}} IS</div>
                                        <input type="text" class="form-control form-control-lg" name="rate"  ng-model="rate">
                                      </div>
                               </div>
                           </div>
                           
                           <div class="row">
                               <div class="col-md-6">
                                      <button type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Make Transaction</button>
                                  </div>
                                  <div class="col-md-6">
                                      <a href="/#!/home/Dashboard">
                                      <button type="Reset" style="cursor:pointer" class="btn btn-danger btn-block btn-lg">Cancle Transaction</button>
                                      </a>
                                  </div>
                           </div>
                               <input type="hidden" name="deport_id" value="{{deposit_id}}">
                               <input type="hidden" name="url" value="#!/maketransaction/Make Transaction/{{deposit_id}}/{{outgoing}}/{{incoming}}/">
                           </form>
                       </div>
                   </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>