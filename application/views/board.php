<div class="selectMain">
    <div class="center selectContent">
        <ul id="ul">
            <?php

            $count = count($bidx)-1;

            while ($count!=0) {

                $image=explode(",",$img[$count]);
                $imagepath = "/assets/upload/".$image[0];

                echo " <li class='col-4'>
                        <a href='/board/view?num=".$bidx[$count]."' style='display:block'><div class='gallery' style='background:url(".$imagepath.") no-repeat 50%; background-size:cover'>
                        </div></a>
                        <div class='selectxt'>
                            
                            <div class='selectxts'>".$txt[$count]."</div>
							<p>written by ".$id[$count]."</p><span>".$created[$count]."</span>
                        </div>
                    </li>";

                $count--;
            }

            ?>
        </ul>
    </div>
</div>