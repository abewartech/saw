<!doctype html>
<html>
    <head>
        <title>Login Administrator</title>
        <base href="<?php echo base_url() ?>">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body style="background-color: lightblue">
        <div class="container">
            <div class="row">
                <div class="panel panel-info">
                  <div class="panel-body">
                  <center><h2>Silahkan Login disini</h2></center>
                  <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <form class="form-horizontal" role="form" action="" method="post">
                    <!-- Form Group -->
                    <div class="form-group">
                        <!-- Label -->
                        <label for="user" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <!-- Input -->
                          <input type="text" name="username" class="form-control" id="user" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <!-- Button -->
                            <button type="submit" class="btn btn-primary">Login</button>&nbsp;
                            <button type="reset" class="btn btn-white">Reset</button>
                        </div>
                    </div>
                    
                </form>
                </div>
                                                


                  </div>
                </div>

                
            </div>
        </div>
        </body>
</html>