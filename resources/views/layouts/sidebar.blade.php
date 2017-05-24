 @if(Auth::check())
<div class="panel panel-default">
                <div class="panel-body" style="text-align:center">
                    <div class="sidebar_user_info center arial_bold">
                        <h3> 555 Operator </h3>
                    </div>
                    <br>
                    <div class="sidebar_menu center">
                        <a href="/user/profile">
                            <img src="http://image0.flaticon.com/icons/png/512/49/49128.png" style="border-radius:100%;padding: 1px;width: 60%;border:solid 1px #d3e0e9 !important;" class="profile_img_sidebar"/>
                        </a>
                    </div>
                    <br>
                    <div class="sidebar-nav" role="group">
                      <a href="/" role="button"> Patients </a>
                      <a href="/doctor/" role="button"> Doctors </a>
                      <a href="/ambulance/" role="button"> Ambulances </a>
                      <a href="/pharmacy/" role="button"> Pharmacies </a>
                    </div>
                </div>
            </div>
@endif