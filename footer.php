<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package intuito-renovation
 */

?>



<?php wp_footer(); ?>

</body>
<div class="div9">
	<div class="row9 footrow">
        <!--noindex--><!--googleoff: all-->
        <div class="footleft col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <p>© <? echo date("Y");?> - <? echo $_SERVER ['SERVER_NAME'];?></p>
            </div>
        </div>
        <!--googleon: all--><!--/noindex-->
        <div class="footright col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <a href="http://webminton.com.ua" style="max-width:217px;" target="_blank"><img src="<? $_SERVER ['DOCUMENT_ROOT'];?>/img/lvv.png" alt="webminton.com"></a>
            </div>
        </div>
    </div>
</div>
</html>
