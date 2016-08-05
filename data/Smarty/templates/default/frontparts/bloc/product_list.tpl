<!--{if count($arrProducts) > 0}-->
    <div class="bloc_outer clearfix">
        <div id="productlist_area">
            <h2>新着商品</h2>
            <div class="bloc_body clearfix">
                <!--{foreach from=$arrProducts item=arrProduct}-->
                    <div class="product_item">
                        <div class="productImage">
                            <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->&width=130" alt="<!--{$arrProduct.name|h}-->" /></a>
                        </div>
                    </div>
                <!--{/foreach}-->
            </div>
        </div>
    </div>
<!--{/if}-->
