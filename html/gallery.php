				<?php if(get_field('gallerij')){ ?>
				<div class="my-gallery clearfix" itemscope itemtype="http://schema.org/ImageGallery">
					<?php foreach(get_field('gallerij') as $photo){
						?>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
					        <a href="<?php echo $photo['url'] ?>" itemprop="contentUrl" data-size="<?php echo $photo['width'] ?>x<?php echo $photo['height'] ?>">
					            <img src="<?php echo $photo['sizes']['thumbnail'] ?>" itemprop="thumbnail" alt="<?php echo $photo['title'] ?>" />
					        </a>
					        <figcaption itemprop="caption description"><?php echo $photo['caption'] ?></figcaption>
					    </figure>
						<?php
					}
					?>
				</div>
				<script>
					var initPhotoSwipeFromDOM=function(a){for(var b=function(a){for(var e,f,g,h,b=a.childNodes,c=b.length,d=[],i=0;i<c;i++)e=b[i],1===e.nodeType&&(f=e.children[0],g=f.getAttribute("data-size").split("x"),h={src:f.getAttribute("href"),w:parseInt(g[0],10),h:parseInt(g[1],10)},e.children.length>1&&(h.title=e.children[1].innerHTML),f.children.length>0&&(h.msrc=f.children[0].getAttribute("src")),h.el=e,d.push(h));return d},c=function a(b,c){return b&&(c(b)?b:a(b.parentNode,c))},d=function(a){a=a||window.event,a.preventDefault?a.preventDefault():a.returnValue=!1;var b=a.target||a.srcElement,d=c(b,function(a){return a.tagName&&"FIGURE"===a.tagName.toUpperCase()});if(d){for(var j,e=d.parentNode,g=d.parentNode.childNodes,h=g.length,i=0,k=0;k<h;k++)if(1===g[k].nodeType){if(g[k]===d){j=i;break}i++}return j>=0&&f(j,e),!1}},e=function(){var a=window.location.hash.substring(1),b={};if(a.length<5)return b;for(var c=a.split("&"),d=0;d<c.length;d++)if(c[d]){var e=c[d].split("=");e.length<2||(b[e[0]]=e[1])}return b.gid&&(b.gid=parseInt(b.gid,10)),b},f=function(a,c,d,e){var g,h,i,f=document.querySelectorAll(".pswp")[0];if(i=b(c),h={galleryUID:c.getAttribute("data-pswp-uid"),getThumbBoundsFn:function(a){var b=i[a].el.getElementsByTagName("img")[0],c=window.pageYOffset||document.documentElement.scrollTop,d=b.getBoundingClientRect();return{x:d.left,y:d.top+c,w:d.width}}},e)if(h.galleryPIDs){for(var j=0;j<i.length;j++)if(i[j].pid==a){h.index=j;break}}else h.index=parseInt(a,10)-1;else h.index=parseInt(a,10);isNaN(h.index)||(d&&(h.showAnimationDuration=0),g=new PhotoSwipe(f,PhotoSwipeUI_Default,i,h),g.init())},g=document.querySelectorAll(a),h=0,i=g.length;h<i;h++)g[h].setAttribute("data-pswp-uid",h+1),g[h].onclick=d;var j=e();j.pid&&j.gid&&f(j.pid,g[j.gid-1],!0,!0)};initPhotoSwipeFromDOM(".my-gallery");
					</script>
					
							<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
						
		<?php } ?>	