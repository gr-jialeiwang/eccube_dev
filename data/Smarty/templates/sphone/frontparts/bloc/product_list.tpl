<style type="text/css">
div#productlist_area h2 {
    background-color:#de5e17;
    text-align:center;
    color:#fff;
    padding:7px 0 7px 0;
}
div#productlist_area div.productImage {
    float:left;
    width:40px;
    padding:0 8px 0 0;
}
.bloc_body {
	width: 312px;
	padding: 10px 4px;
}
.product_item {
	width: 96px;
	height: 140px;
	float: left;
	margin: 0 4px 8px 4px;
	overflow: hidden;
	text-align: center;
}

.productImage {

}
.productImage img {
	width: 98px;
	height: auto;
	max-height: 140px;
}
</style>

<!--{if count($arrProducts) > 0}-->
        <section id="productlist_area" style="margin-top:-20px">
            <h2 class="title_block">新着商品</h2>
            <div class="bloc_body clearfix">
                <!--{foreach from=$arrProducts item=arrProduct}-->
                    <div class="product_item">
                        <div class="productImage">
                            <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->&width=300&height=300" alt="<!--{$arrProduct.name|h}-->" /></a>
                        </div>
                    </div >
                </dl>
                <!--{/foreach}-->
            </div>
        </section>
<!--{/if}-->
<script>
screenW = Math.min($(window).width(),$(window).height())
$(".bloc_body").css("zoom",screenW/320);
$(".bloc_body").css("margin", "0 auto");
</script>
