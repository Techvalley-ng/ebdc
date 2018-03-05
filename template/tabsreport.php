<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 creport-face ">
            <div class="creport-face-size">
                <div  ng-show="loading">
                    <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
                </div>
                <div class="row">
                    <div class="col giving text-center font-weight-bold">TOTAL TRANSACTION FOR TODAY:</div>
                </div>
                
                <div class="row">
                    <div class="col giving font-weight-bold">Sales In Cash:
                    ({{totalCash.totalCash | currency :totalCash.symbol1:0}})
                    ({{totalCash.totalCash2 | currency :totalCash.symbol2:0}})
                    </div>
                    <div class="col collecting font-weight-bold">Sales In Transfer:
                    ({{totaltransfar.totaltransfar | currency :totalCash.symbol1:0}})
                    ({{totaltransfar.totaltransfar2 | currency :totalCash.symbol2:0}}) 
                    </div>
                </div>
                
                <table class="table table-sm table-striped table-sm table-responsive-sm table-hover table-bordered">
                        <thead>
                        <tr class="table-danger">
                            <th scope="col">Staff Name</th>
                            <th clas="row">
                                <center>Transaction</center>
                            </th>
                            <th scope="col">Amount</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">Salls Amount</th>
                            
                        </tr>
                        </thead>
                        <tr ng-repeat="report in tabsreport">
                            <td>{{report.name}}</td>
                            <td>
                               <div class="row" style="color:#ffffff">
                                    <div class="col bg-primary font-weight-bold">Buying</div>
                                    <div class="col bg-warning font-weight-bold">Selling</div>
                                    <div class="col bg-success font-weight-bold">Rate</div>
                               </div> 
                               <div class="row">
                                    <div class="col">{{report.buying}}</div>
                                    <div class="col">{{report.selling}}</div>
                                    <div class="col">{{report.rate | currency :"":0}}</div>
                               </div>
                            </td>
                            <td>&nbsp;&nbsp;{{report.amount | currency :report.symbol:0}}</td>
                            <td>{{report.customer_name}}</td>
                            <td>{{report.tran_type}}</td>
                            <td>{{report.amount*report.rate | currency :report.sellingsymbol:0}}</td>
                            
                        </tr>    
                </table>
                <button type="button" class="btn btn-info form-control">Print Report</button>
            </div>  
        </div> 
    </div>
</div>    