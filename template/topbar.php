<div class="container-fluid top-bar">
    <div class="col-md-12">
       <div class="row">
        <div class="col">
            <i class="fa fa-bars fa-2x" aria-hidden="true" id="menu"></i>
        </div>
            <div class="col text-nowrap pageheader">
                {{pagename}}
            </div>
        <div class="col">
            
            <div class="dropdown float-right">
                <a href="/#!/outgoingcash"><div class="fa fa-bell fa-2x notification" aria-hidden="true" id="noty"></div></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-user-o fa-2x" aria-hidden="true"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-item text-center text-nowrap font-weight-bold">Welcome</div>
                                <div class="dropdown-divider font-weight-bold"></div>
                                <div class="dropdown-item text-nowrap font-weight-bold">Username: {{userinfo.username}}</div>
                                <div class="dropdown-item text-nowrap font-italic font-weight-normal">First name: {{userinfo.fname | uppercase}}</div>
                                <div class="dropdown-item text-nowrap font-italic font-weight-normal">Last name: {{userinfo.lname | uppercase}}</div>
                                <div class="dropdown-divider font-weight-bold"></div>
                                <a class="dropdown-item text-nowrap font-weight-bold" href="../severside/dataquery/logout.php">Logout</a>
                            </div>
            </div>
        </div>
       </div>
    </div>
</div>

