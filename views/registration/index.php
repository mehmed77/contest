<style type="text/css">
    .signup{background-color: lightgrey;
        border-color: #fddcc8; font-family: cursive;}
    .signup .panel-body label
    {
        color: #000; font-size: larger;
        font-weight: lighter;
    }
    .signup .panel-heading
    {
        background-color: #f0fffa;
        color: #000000;
        font-family: fantasy;
    }
    .signup .panel-footer
    {
        background-color: #f1f1f1;
    }
    .btn-submit{margin-right:5px;}
</style>
<script>document.getElementById("idsubmit").disabled = true;</script>
<div class="my_content">
    <form name="form1" class="form-horizontal"  action="<?php print URL ?>registration/run" method="POST">
        <script type="text/javascript">ok();</script>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel signup">
                        <div class="panel-heading">
                            <h4 class="panel-title">Registration</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputlastname" class="col-md-3 control-label">
                                    Ismingiz</label>
                                <div class="col-md-8">
                                    <input type="text" onkeyup="LastName(this.value)"  name="FName" class="form-control" id="inputlastname" placeholder="Ismingizni kiriting..." />
                                </div>
                                <div class="col-md-1">
                                    <span id="lastname"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputfirstname" class="col-md-3 control-label">
                                    Familiyangiz</label>
                                <div class="col-md-8">
                                    <input type="text" onkeyup="FirstName(this.value)"  name="LName" class="form-control" id="inputfirstname" placeholder="Familyangizni kiriting..." value="" />
                                </div>
                                <div class="col-md-1">
                                    <span id="firstname"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputscreenname" class="col-md-3 control-label">
                                    Login</label>
                                <div class="col-md-8">
                                    <input type="text" onkeyup="Login(this.value)"  name="login" class="form-control" id="inputscreenname" placeholder="Login..." />
                                </div>
                                <div class="col-md-1">
                                    <span id="login"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputparolname" class="col-md-3 control-label">
                                    Parol</label>
                                <div class="col-md-8">
                                    <input type="password" onkeyup="Parol(this.value)"  name="parol" class="form-control" id="inputparolname" placeholder="Parol..." />
                                </div>
                                <div class="col-md-1">
                                    <span id="parol"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputdateofbirth" class="col-md-3 control-label"> Date of Birth</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select class="form-control" name="month">
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="date" class="form-control">
                                                <?php
                                                for($i = 1; $i <= 31; $i++){
                                                    echo "<option value='".$i."'>".$i."</option>\n";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="year" class="form-control">
                                                <?php
                                                for($i = 1990; $i <= 2008; $i++){
                                                    echo "<option value='".$i."'>".$i."</option>\n";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputgender" class="col-md-3 text-right">
                                    Gender</label>
                                <div class="col-md-8">
                                    <label>
                                        <input type="radio" checked="" name="gender" value="1">
                                        Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="0">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="col-md-8 text-right">
                                    <input type="submit" id="idsubmit" onclick="ok()" name="submit" value="submit" class="btn btn-success">
                                    <input type="button" name="cancel" value="Cancel" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
