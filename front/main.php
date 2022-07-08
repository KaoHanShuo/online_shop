<!-- 商品內容主頁 -->
<h1>商品</h1>
<div class="ww"><a href="#">全部商品(<?=rows('item_detail',['sell_state'=>1]);?>)</a>
                    <?php
                        /*<div class='ww'><div class='s'></div></div>*/
                            $bigs=all('category',['parent'=>0]);
                            foreach($bigs as $big){
                                    echo "<div class='ww'>";
                                    echo "<a href=''>";
                                    echo         $big['name'];
                                    echo "</a>";
                                    echo "<div class='s'></div>";
                                    echo "</div>";

                    }
                    ?>
                </div>