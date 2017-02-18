<div class="container">
		<div class="modal fade" id="myModal">
			 <div class="modal-dialog">
				 <div class="modal-content">
					 <div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h4 class="modal-title" id="myModalLabel">Source Code</h4>
					 </div>
					 <div class="modal-body">
						 <div id="Source"></div>
					 </div>
					 <div class="modal-footer">
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				 </div>
			  
			 </div>
		 </div>
  </div>

            <table class="table table-bordered table-striped">
                <caption style="margin-left: 15px; color: #000; font-size: large"> <span class="glyphicon glyphicon-list"></span> &nbsp;Natijalar</caption>
                <thead class="bg-success">
                            <tr class="bg-primary">
                                <th class="col-xs-1 text-center">ID</th>
                                <th class="col-xs-2 text-center glyphicon glyphicon-time">&nbsp;Vaqt</th>
                                <th class="col-xs-3 text-center glyphicon glyphicon-user">&nbsp;Foydalanuvchi</th>
                                <th class="col-xs-3 text-center glyphicon glyphicon-tasks">&nbsp;Masala</th>
                                <th class="col-xs-1 text-center glyphicon glyphicon-saved">&nbsp;Lang</th>
                                <th class="col-xs-2 text-center glyphicon glyphicon-ok">&nbsp;Holat</th>
                        
                            </tr>
                </thead>
                <tbody>
                   <?php
                        foreach ($this->status_list as $key => $value) {
                            $state = $value['state'];
                            $TestCase = $value['testcase'];

                            $accepted   = "<td  class='text-center'><span class=\"label label-success\"><span class=\"glyphicon glyphicon-ok\"></span>&nbsp;Accepted		</span></td>";
                                    switch ($state) {
                                        case -2: $accepted  = "<td class='text-center text-primary h4'>Running...</td>";
                                            break;
                                        case -1: $accepted = "<td class='text-center h4'>Running...</td>";
                                            break;
                                        case 2: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>&nbsp; Wrong answer
                                                                    <span class=\"label label-info\">Test:&nbsp;
                                                                        <span class=\"badge\">$TestCase</span>
                                                                    </span>
                                                                </span>
                                                            </td>";
                                            break;
                                        case 3: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>
                                                                    &nbsp;Time limit Excidend
                                                                </span>
                                                             </td>";
                                            break;
                                        case 4: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>
                                                                    &nbsp;Compilation Error
                                                                </span>
                                                             </td>";
                                            break;
                                        case 5: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>
                                                                    &nbsp;Security violation
                                                                </span>
                                                             </td>";
                                            break;
                                        case 6: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>&nbsp; Runtime error
                                                                    <span class=\"label label-info\">Test:&nbsp;
                                                                        <span class=\"badge\">$TestCase</span>
                                                                    </span>
                                                                </span>
                                                            </td>";
                                            break;
                                        case 7: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>&nbsp; Presentation error
                                                                    <span class=\"label label-info\">Test:&nbsp;
                                                                        <span class=\"badge\">$TestCase</span>
                                                                    </span>
                                                                </span>
                                                            </td>";
                                            break;
                                        case 8: $accepted = "<td class='text-center text-danger'>
                                                                <span class=\"label label-danger\">
                                                                    <span class=\"glyphicon glyphicon-remove\"></span>&nbsp; Memory limit exceeded
                                                                    <span class=\"label label-info\">Test:&nbsp;
                                                                        <span class=\"badge\">$TestCase</span>
                                                                    </span>
                                                                </span>
                                                            </td>";
                                            break;
                                        default: $accepted = $accepted;
                                            break;
                                    }
                            print"<tr style='line-height: 0px;'>";
                                echo "<td class='text-center'><a href='' data-toggle='modal' data-target='#myModal' onclick='Result(".$value['uid'].")'>".$value['uid']."</a></td>";
                                echo "<td class=\"h5 text-center\">".$value['send_time']."</td>";
                                echo "<td class=\"h5 text-center\"><a href=\"".URL."profile/user/".$value['login']."\">".$value['login']."</a></td>";
                                echo "<td class=\"h5 text-center\"><a href=\"".URL."problems/problem/".$value['problem_id']."\">".$value['problem_name']."</a></td>";
                                echo "<td class=\"h5 text-center\">".$value['lang_id']."</td>";
                                echo $accepted;
                            print "</tr>";
                        }
                    ?>                                        
                </tbody>
                <tfoot class="text-center">
                    <tr>
                       <td colspan="6">
                           <?php
                           $page = $this->result;
                           if($page % 5 == 0){
                               $next = $page;
                               $last = $page + 4;
                           }else{
                               $next = (int)($page / 5)*5 + 1;
                               $last = $next + 4;
                           }
                           if($this->result > 1){
                               $Previous = $this->result-1;
                               $true = true;
                           }else{
                               $Previous = 1;
                               $true = false;
                           }
                           ?>
                           <nav>
                               <ul class="pagination">
                                   <li>
                                       <a href="<?php print URL."status/my/$Previous"; ?>" aria-label="Previous">
                                           <span aria-hidden="true">&laquo;</span>
                                       </a>
                                   </li>
                                   <?php
                                   for($i = $next; $i <= $last; $i++){
                                       if($this->result == $i){
                                           print "<li class=\"active\"><a href=".URL."status/my/".$i.">$i</a></li>";
                                       }else{
                                           print "<li><a href=".URL."status/my/".$i.">$i</a></li>";
                                       }
                                   }
                                   ?>
                                   <li>
                                       <a href="<?php print URL."status/my/".($this->result+1) ?>" aria-label="Next">
                                           <span aria-hidden="true">&raquo;</span>
                                       </a>
                                   </li>
                               </ul>
                           </nav>
                       </td>
                    </tr>
                </tfoot>
            </table>


    
