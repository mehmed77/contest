<script>
    function myFunction(str){
        if(str == "java"){
            document.getElementById("demo").innerHTML = "Asosoiy class nomi main bo'lishi kerak";
        }else{
            document.getElementById("demo").innerHTML = "";
        }
    }
</script>

<div style="margin-top: 15px;" class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" style="margin-top: 10px;"><span class="glyphicon glyphicon-send"></span>  Yechimlarni jo'natish </h3>
        </div>
        <div class="panel-body">
            <form action="<?php print URL; ?>submit/source" method="post">
                <div class="form-group">
                    <select name="problemid" class="form-control panel panel-primary h4">
                        <?php
                           foreach($this->problems_list as $key => $val){
                               $id    = $val['id'];
                               $name  = $val['pname'];
                               $title = $val['title'];
                               $selected = $id == $this->selected ? "selected" : "";
                               print " <option value=".$id." $selected>".$title.'. '.$name."</option>";
                           }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="language" class="form-control panel panel-primary h4" onchange="myFunction(this.value)">
                        <option value="c++">GNU (c++)</option>
                        <option value="java">Java 1.7(JDK)</option>
                        <option value="c">GNU (c)</option>
                        <option value="pascal">Pascal</option>
                        <option value="delphi">Delphi</option>
                    </select>
                </div>
                <span id="demo" style='color: red'></span>
                <div>
                    <textarea  name="source" class="textarea" placeholder="Dastur matnini shu yerga yozing ..." style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #46b8da; border-radius: 5px 5px; padding: 10px;"></textarea>
                </div>
                    <button class="center-block btn btn-primary"><span class="glyphicon glyphicon-upload"></span> Jo'natish <i class="glyphicon glyphicon-arrow-circle-right"></i></button>
            </form>
        </div>
    </div>
</div>