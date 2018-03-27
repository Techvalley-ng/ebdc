
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
                    <a href="/#!/loan/Cash On Loan" class="mylink">  
                    <div class="panel-tabs">Loans Cash</div>
                    </a>
                </div>
                 <div class="col">
                   <div class="row tem-box">
                       <div class="col whiteboox">
                           <div class="tem-tiltle text-center font-weight-bold text-nowrap">
                                   Add Your Loan List (Reminder)
                            </div>
                            <form name="loan" method="POST" action="severside/post/addloan.php" id="loan">    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Enter Person Name</label>
                                        <input type="text" class="form-control form-control-lg" name="personname"  placeholder="Person Name" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-top:2em;">
                                        <label class="label" for="Customername">Enter Amount And Any Addtional Information</label>
                                      <textarea class="form-control form-control-lg" name="loaninfo"  placeholder="Laon Information"></textarea>
                                      </div>
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-md-12">
                                      <button style="" type="submit" style="cursor:pointer" class="btn btn-primary btn-block btn-lg">Add New Loan Reminder</button>
                                  </div>
                                </div>
                            </form>
                            <br>
                            <div class="row">
                            <div class="col-md-12">
                                    <div ng-show="loading">
                                                <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                                        </div>
                                <div class="label text-center font-weight-bold text-nowrap">List Of Loans</div>
                                     <table class="table table table-dark table-striped table-sm table-responsive-sm table-hover">
                                        <tr>
                                            <th>#</th>
                                            <th>Person Name</th>
                                            <th>Amount / Loan Information</th>
                                            <th>Date Add</th>
                                            <th>Staff added</th>
                                            <th></th>
                                        </tr>
                                        <tr ng-repeat= "loan in loanlist">
                                            <td>{{$index+1}}</td>
                                            <td>{{loan.personname}}</td>
                                            <td>{{loan.loaninformation}}</td>
                                            <td>{{loan.date_added}}</td>
                                            <td>{{loan.fname}} {{loan.lname}}</td>
                                            <td>
                                                <form ng-submit="submit($event)" method="POST" name="deleteloan" action="severside/post/deleteloan.php">
                                                    <input type="hidden" name="laonid" value="{{loan.loan_id}}"/>
                                                    <input type="submit" value="Delete Loan" class="btn btn-danger form-control" name="delete"/>
                                                </form>
                                            </td>
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
</div>
