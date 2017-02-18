<?php
   $count = 0;
   foreach ($this->header as $key => $val){
       $count++;
   }

?>
<table class="table table-striped table-bordered table-responsive">
    <tr>
        <td class="text-center" style="background: dodgerblue; color: #fff; font-size: larger; width: 30px;">¹</td>
        <td style="background: dodgerblue; color: #fff; font-size: larger; width: 200px;"><span class="glyphicon glyphicon-user"></span> Foydalanuvchi</td>
        <td class="text-center" style="background: dodgerblue; color: #fff; font-size: larger; width: 30px;"><span class="glyphicon glyphicon-ok"></span></td>
        <td class="text-center" style="background: dodgerblue; color: #fff; font-size: larger; width: 70px;"><span class="glyphicon glyphicon-time"></span> Vaqt</td>
        <?php
           foreach ($this->header as $key => $val) {
               $id = $val['id'];
               $name = $val['pname'];
               $title = $val['title'];
             print "<td class=\"text-center\" style=\"width: 50px; background: #a6e1ec\"><a href='".URL."problemset/problem/".$id."'  style=\"color: #000; font-size: larger\" title=\"$title. $name\">$title</a></td>";
           }
       ?>
    </tr>

        <?php
            for($i = 1; $i <= $this->getRowCount; $i++){
                print "<tr>";
                $UserName = $this->allResult[$i]['name'];
                $UserAccp = $this->allResult[$i]['accept'];
                $TimeLim  = intval($this->allResult[$i]['tLimit'] / 60);
                print "<td class='text-center'>$i</td>";
                print "<td style='margin-left: 3px;'>$UserName</td>";
                print "<td class='text-center'>$UserAccp</td>";
                print "<td class='text-center'>$TimeLim</td>";
                $ProbArr = $this->allResult[$i]['ProbList'];
//                print_r($ProbArr);
                foreach($ProbArr as $key => $val){
                    $prob_id    = $val['problemId'];
                    $state      = $val['state'];
                    $unSolved   = $val['unSolved'];
                    $sentTime   = $val['sentTime'];
                    $unsolv     = $unSolved == 0 ? "" : $unSolved;
                    $time       = intval($sentTime / 3600);
                    $time1      = $sentTime % 3600;
                    $min        =intval($time1 / 60);
                    if($state == 1){
                        print "<td class='text-center' style='font-size: small; color: #3e8f3e'>+$unsolv<br>$time:$min</td>";
                    }elseif($unSolved > 0){
                        print "<td class='text-center' style='font-family: Consolas; color: darkred;'>-$unSolved</td>";
                    }else{
                        print "<td class='text-center' style='font-size: small;'></td>";
                    }
                }
                print " </tr>";
            }
        ?>

</table>