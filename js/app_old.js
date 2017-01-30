

var $j = jQuery.noConflict(); 
$j(document).ready(function($) {

  'use strict';
    
  //on mouseover have main menu items move and sub-items take their place
  $('.sub-menu-reveal a').on('mouseover', function(){
        $('.menu').css('top', '-40px');
    });

    $('.nav').on('mouseleave', function(){
        $('.menu').css('top', '0px');
    });

    //HAMBURGER NAVIGATION ON MOBILE (WIDTH < 1024)

    // If menu is already showing, slide it up. Otherwise, slide it down.

  $('.hamburger').on('click', function(e) {
    e.preventDefault();
      $('.menu').toggleClass('slide-down');
  });

     //once open slide open galleries to show sub menu 
    $('li.sub-menu-reveal > a').on('click', function(e){

    e.preventDefault();
         $('ul.sub-menu').slideUp('normal');
   
          if($(this).next('ul.sub-menu').is(':hidden') === true) {    
             $(this).next('ul.sub-menu').slideDown('normal');
          } 
    }); 

    //ADD FITVIDS TO THE VIDEO CONTAINER
    $('.video-container').fitVids();


    //SHRINK HEADER ON SCROLL DOWN/REVERSE ON SCROLL UP
    $(window).on('scroll', function() {

        var windowWidth = $(window).width();

          if (windowWidth > 748) {
                if ($(this).scrollTop() > 10) {
                    $('.header-title').css('font-size', '48px');
                    $('header-description').css('font-size', '15px');
                }
                else {
                    $('.header-title').css('font-size', '70px');
                    $('header-description').css('font-size', '16px');

                }
          }
    });

    //SCROLL TO TOP BUTTON 
    $(window).on('scroll', function() {

        var windowWidth = $(window).width();

          if (windowWidth < 1024) {
                if ($(this).scrollTop() > 1500) {
                    $('.back-to-top').css('display', 'inherit');
                }
                else {
                    $('.back-to-top').css('display', 'none');
                }
          }
    });
    $('.back-to-top').click(function() {
         window.scrollTo(0, 0);
    }); 

    //ISOTOPE AND PHOTOSWIPE
     var itemReveal = Isotope.Item.prototype.reveal;
        Isotope.Item.prototype.reveal = function() {
          itemReveal.apply( this, arguments );
          $( this.element ).removeClass('isotope-hidden');
        };
        var itemHide = Isotope.Item.prototype.hide;
        Isotope.Item.prototype.hide = function() {
          itemHide.apply( this, arguments );
          $( this.element ).addClass('isotope-hidden');
        };
        $('.isotope').isotope({
          itemSelector: '.image-item',
          initLayout: false,
          // transitionDuration: '2s',





          // masonry: {
          //   columnWidth: '.gallery-image'
          //   // isFitWidth: true
          //   // gutter: 10
          // }, /* masonry */
          hiddenStyle: {
            opacity: 0
          },
          visibleStyle: {
            opacity: 1
          },
          
        });
        // filter functions
        $('.navigate a').click(function(){
          var selector = $(this).attr('data-filter');
          // console.log('selector: '+ selector);
          $('.isotope').isotope({ filter: selector });
          return false;
           });
           $('.buttonlink').click(function(){
                 $('.buttonlink').removeClass('active');
                $(this).addClass('active');
         });
        /*
        Handle the dynamic image filtering.
        Instead of the `initPhotoSwipeFromDOM` code, you need to use
        */
        var initPhotoSwipeFromDOM = function(gallerySelector) {
          // parse slide data (url, title, size ...) from DOM elements 
          // (children of gallerySelector)
          var hash = '';
          var setHash = function setHash( newHash ){
            newHash = newHash || '';
            if(history.replaceState) {
                if (newHash[0] !== '#'){
                  newHash = '#' + newHash;
                }
                history.replaceState(null, null, newHash);
            }
            else {
              location.hash = newHash;
            }
          };
          var parseThumbnailElements = function(el) {
            var thumbElements = $(el).children(':not(.isotope-hidden)').get(),
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;
            for(var i = 0; i < numNodes; i++) {
              figureEl = thumbElements[i]; // <figure> element
              // include only element nodes 
              if(figureEl.nodeType !== 1) {
                continue;
              }
              linkEl = figureEl.children[0]; // <a> element
              size = linkEl.getAttribute('data-size').split('x');
              // create slide object
              item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
              };
              if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
              }
              if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
              } 
              item.el = figureEl; // save link to element for getThumbBoundsFn
              items.push(item);
            }
            return items;
          };
          // find nearest parent element
          var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
          };
          // triggers when user clicks on thumbnail
          var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
            var eTarget = e.target || e.srcElement;
            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
              return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });
            if(!clickedListItem) {
              return;
            }
            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = $(clickedListItem.parentNode).children(':not(.isotope-hidden)').get(),
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;
            for (var i = 0; i < numChildNodes; i++) {
              if(childNodes[i].nodeType !== 1) { 
                continue; 
              }
              if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
              }
              nodeIndex++;
            }
            if(index >= 0) {
              // open PhotoSwipe if valid index found
              var id = eTarget.getAttribute('title');
              hash = window.location.hash;
              setHash( 'img=' + encodeURIComponent(id) );
              openPhotoSwipe( index, clickedGallery );
            }
            return false;
          };
          // parse custom imag eid #img=imagetitle
          var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
                params = {};
            if(hash.length < 5) {
              return params;
            }
            var pair = hash.split('=');
            if (pair.length === 2){
              params[pair[0]] = pair[1];
            }
            
            return params;
          };
          var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;
            items = parseThumbnailElements(galleryElement);
            // define options (if needed)
            options = {
              index: index,
              history: false,
              // define gallery index (for URL)
              galleryUID: galleryElement.getAttribute('data-pswp-uid'),
              getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 
                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
              }
            };
            if(disableAnimation) {
              options.showAnimationDuration = 0;
            }
            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.listen('destroy',function() { 
              setHash( hash );
            });
            gallery.listen('afterChange',function(){
              var id = $(this.items[ this.getCurrentIndex() ].el).find('a img').attr('title');
              setHash( 'img=' + encodeURIComponent(id) );
            });
            gallery.init();
          };
          // loop through all gallery elements and bind events
          var galleryElements = document.querySelectorAll( gallerySelector );
          for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
          }
          // Parse URL and open gallery if it contains #&pid=3&gid=1
          var hashData = photoswipeParseHash();
          if(hashData.hasOwnProperty('img')) {
            var gallery = $(galleryElements[0]),
                figure = gallery.find('img[title="'+ hashData['img'] +'"]').closest('figure'),
                index = gallery.children('figure').index(figure);
                
            openPhotoSwipe( index,  galleryElements[0], true );
          }
        };
        // execute above function
        initPhotoSwipeFromDOM('.gallery_container');
        
        var $grid = $('.isotope').imagesLoaded( function() {
          // init Isotope after all images have loaded
          $grid.isotope({
            // options...
          });
        });



});
    

