<div class="selectMain">
    <div class="center selectContent">
        <ul id="ul">

            <!--무한스크롤시도-->
            <li class="loading_info"></li>

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
<script>
    var track_page = 1;
    var loading = false;

    load_contents(track_page);

    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height()>=$(document).height()){
            track_page++;
            load_contents(track_page);
        }
    });

    function load_contents() {
        if (loading == false) {
            loading = true;
            $('.loading_info').show();
            $.post('page', {'pagenum': track_page}, function (data) {
                loading = false;
                if (data.trim().length == 0) {
                    $('#ul').html("No more records!");
                    return;
                }
                $('.loading_info').hide();
                $("#ul").append(data);
            }).fail(function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            })
        }
    }
</script>