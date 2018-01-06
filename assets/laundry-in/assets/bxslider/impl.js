(function ($) {
  'use strict';
    $(document).ready(function () {
    
      $('.slider-personalizacja').bxSlider(
          {
              pager: false,
              onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                  var items = $('.js--bg-personalizacja > *');
                  items.eq(oldIndex).removeClass('active');
                  items.eq(newIndex).addClass('active');
              }
          }
      );

        $('.js--menu-toggle').click(function () {

          $('.js--menu').slideToggle();

          return false;
      });

        $('.start-playing-rwd').click(function (event) {
            //if ( md.mobile() ) {
                var containerID = 'mobile-player';
                
                var container = document.createElement('div');
                container.className = 'mobile-player';
                container.id = containerID;
                
                var closeBtn = document.createElement('a');
                closeBtn.className = 'close';
                closeBtn.href = '#0';
                closeBtn.addEventListener("click", function(){
                    $( '#' + containerID ).remove();
                });
                
                $(document).keyup(function(e) {
                    if (e.keyCode == 27) { // escape key maps to keycode `27`
                        $( '#' + containerID ).remove();
                    }
                });
                
                container.appendChild(closeBtn);
                
                var iframe = document.createElement('iframe');
                iframe.src = $(this).attr('href') + '?api=1&player_id=vimeoplayer&autoplay=1';

                container.appendChild(iframe);

                $('body').append(container);
//            } else {
//                $.fn.prepareEmbeddingVideo(event);
//            }
            
            event.preventDefault();
        });
    });
})(jQuery);
