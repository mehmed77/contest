
<?php
foreach ($this->userdata as $key => $value) {
    $solved   = $value['solved'];
    $unsolved = $value['unsolved'];
}
?>

    <div class="panel panel-primary">
        <div class="panel-heading text-center" style="font-size: 25px;">
           Masalalar
        </div>
        <div class="panel-body">
            <table class="table table-striped" style="font-size: larger; width: 100%">
                <thead>
                <tr>
                    <th class="text-center" style="width: 5%">¹</th>
                    <th style="width: 49%">Masala nomi</th>
                    <th style="width: 15%;" class="text-center">Mavzusi</th>
                    <th style="width: 10%;"class="text-center"></th>
                    <th style="width: 5%;"class=""></th>
                    <th style="width: 6%;"class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($this->problems_list as $key => $value) {
                    $id = $value['id'];
                    if(strstr($solved, $id)){
                        $color = "bg-success";
                    }elseif(strstr($unsolved, $id)){
                        $color = "bg-danger";
                    }else{
                        $color = "";
                    }
                    print"<tr>";
                    echo "<td class=\"text-center $color\"><a href=\"".URL."problemset/problem/".$value['id']."\">".$value['title']."</a></td>";
                    echo "<td><a href=\"".URL."problemset/problem/".$value['id']."\">".$value['pname']."</a></td>";
                    echo "<td class=\"h6 text-center\">".$value['mname']."</td>";
                    echo "<td class=\"h6 text-center\">".($value['tlimit']/1000)." s/ ".($value['mlimit']/1000000)." MB</td>";
                    echo "<td class=\"text-center \"><a href=\"".URL."submit/problem/".$value['id']."\"><span class=\" glyphicon glyphicon-send \"></span></a></td>";
                    ?>
                    <td class=" <?php print $color?>">&nbsp;&nbsp;<span class="glyphicon glyphicon-user text-info"><?php printf('%.0f',$value['accepted']);?></span></td>
                    <?php
                    print "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
