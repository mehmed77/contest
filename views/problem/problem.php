<div class="my_content">
    <?php
    foreach ($this->problem_one as $key => $value) {
        $problem_id          = $value['ID'];
        $problem_name        = $value['Problem_name'];
        $problem_title       = $value['Title'];
        $problem_body        = $value['Body'];
        $problem_Input       = $value['Input'];
        $problem_Output      = $value['Output'];
        $problem_InSample    = $value['InSample'];
        $problem_OutSample   = $value['OutSample'];
        $problem_TimeLimit   = $value['TimeLimit']/1000;
        $problem_MemoryLimit = $value['MemoryLimit']/1000000;
        $problem_manba       = $value['manba'];
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <?php
            print $problem_title.".  ".$problem_name."<br/>";
            print "<i>Vaqt limiti: $problem_TimeLimit  s</i><br/>";
            print "<i>Hotira limiti: $problem_MemoryLimit  MB</i><br/>";
            ?>
        </div>
        <div class="panel-body">
            <?php
            print $problem_body;
            ?>
            <h3>Kiruvchi ma値umotlar:</h3>
            <?php
            print $problem_Input;
            ?>
            <h3>Chiquvchi ma値umotlar:</h3>
            <?php
            print $problem_Output;
            ?>
        </div>
        <div class="panel panel-heading">
            <p class="panel panel-danger h4 text-center">Namuna test</p>
            <ul class="panel panel-primary h4">Kiruvchi ma値umotlar:</ul>
            <ul class="panel panel-success"><?php print $problem_InSample; ?></ul>
            <ul class="panel panel-primary h4">Chiquvchi ma値umotlar:</ul>
            <ul class="panel panel-success"><?php print $problem_OutSample; ?></ul>
        </div>
        <div class="panel-footer">
            &nbsp;&nbsp;
            <?php
            if(Session::get('loggedIn')){
                ?>
                <a href="<?php echo URL."submit/problem/".$problem_id?>">
                    <button class="btn btn-primary center-block" style="margin-top: -7px;" type="submit" name="submit">
                       <span class="glyphicon glyphicon-send"></span> &nbsp;Submit
                    </button>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>