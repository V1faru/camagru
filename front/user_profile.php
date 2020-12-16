<?php
    session_start()
?>
<div class="container-userprofile">
<div id="userProfile" class="row d-flex justify-content-center bg-dark text-white">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-white profile-widget">
            <div class="row">
                <div class="col-sm-12">
                    <div class="image-container bg2">  
                        <img src="assets/imgs_w/avatar-1295404_640.png" class="avatar" alt="avatar"> 
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="details">
                        <h4><?php echo $_SESSION['username'];?> <i class="fa fa-sheild"></i></h4>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="row">           
            <div class="col-sm-6">               
            <div class="panel panel-white border-top-pink">
                   <div class="panel-heading">
                        <h3 class="panel-title">Social Statistics</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="body-section">
                            <h5 class="section-heading">Pictures</h5>
                            <p class="section-content">242</p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading">Likes</h5>
                            <p class="section-content">2240</p>
                        </div> 
                        <div class="body-section">
                            <h5 class="section-heading">Comments</h5>
                            <p class="section-content">18</p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-sm-6">                
                <div class="panel panel-white border-top-pink">
                   <div class="panel-heading">
                        <h3 class="panel-title">User Info</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="body-section">
                            <h5 class="section-heading">Username</h5>
                            <p class="section-content"><?php echo $_SESSION['username'];?></p>
                            <input type="submit" value="Edit" class="section-content btn btn-sm edit-btn">
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading">Email</h5>
                            <p class="section-content"><?php echo $_SESSION['email'];?></p>
                            <input type="submit" value="Edit" class="section-content btn btn-sm edit-btn">
                        </div> 
                        <div class="body-section">
                            <h5 class="section-heading">User Since</h5>
                            <p class="section-content"><?php echo $_SESSION['date'];?></p>
                            <input id="chpw" type="submit" value="Change password" class="section-content btn btn-sm edit-btn">
                            <br>
                            <input type="submit" value="Delete Account" class="section-content btn btn-sm edit-btn">
                        </div> 
                    </div>
                </div>                   
            </div>
        </div>
    </div>
</div>
</div>