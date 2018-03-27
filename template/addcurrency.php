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
                                   Add New Currency 
                                </div>
                            <form name="addcurrency" method="POST" action="severside/post/processnewcurrency.php" id="addnewcurrecny">    
                        <div class="row">
                                 <div class="col-md-6">
                                  <div class="form-group" style="margin-top:2em;">
                                    <label class="label" for="Customername">Enter Currency Name</label>
                                     <select name="money" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-lg form-control">
                                         <option value="">Select Currency</option>
                                         <option ng-repeat="addcurrency in addcurrency" value="{{addcurrency.name}}|{{addcurrency.code}}|{{addcurrency.symbol}}">{{addcurrency.name}}, Code: {{addcurrency.code}}, symbol: {{addcurrency.symbol}}</option>    	
                                        </select>
                                      </div>
                                  </div>   
                                  <div class="col-md-6">
                                      <button style="margin-top:1em;" type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Add New Currency</button>
                                  </div>
                              
                        </div>
                        <input type="hidden" name="url" value="/#!/addcurrency/Add New Currency/"/>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                    <div ng-show="loading">
                                                <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                                        </div>
                                <div class="label text-center font-weight-bold text-nowrap">List Of Currency</div>
                                 <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                    <tr>
                                        <th>
                                            Curremcy name
                                        </th>
                                        <th>
                                            Curremcy code
                                        </th>
                                        <th>
                                            Currency Symbol
                                        </th>
                                        <th>
                                            Staff Added
                                        </th>
                                        <th>
                                            Date Added
                                        </th>
                                    </tr>
                                    <tr ng-repeat="currency_list in currency_list | limitTo:8 | orderBy:'-data_added'">
                                        <td>{{currency_list.name}}</td>
                                        <td>{{currency_list.code}}</td>
                                        <td>{{currency_list.symbol}}</td>
                                        <td>{{currency_list.staff_added}}</td>
                                        <td>{{currency_list.data_added}}</td>
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