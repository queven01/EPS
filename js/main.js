jQuery(document).ready(function(){
    _swiperSlider();
    _navScroll();
    _activePage();
    // _navImageSwitch();
    // _tabChange();
    // _search_bar();
    // _masonryEffects();
    // _gsapEffects();
    // _arrowBounce();
    _megaMenu_1();
});

var $ = jQuery;

function _swiperSlider(){
    
    var swiper = new Swiper(".sliderWithOnlyImage", {
        centeredSlides: true,
        speed: 1500,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

    var swiper = new Swiper(".sliderWithContent", {
        speed: 1500,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
} 

if($(window).scrollTop() > 50) {
    _navScroll();
}

function printRecipe(event){ 
    event.preventDefault()
    var prtContent = document.getElementById("recipes-single");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
    console.log('printing');
    console.log(window);
    // $('.single-recipes').print();

}

function _navScroll(){
    $(window).scroll(function(event){
        if($(window).scrollTop() > 50) {
            $('.main-navigation').addClass('scroll-bg')
            $('.site-branding').addClass('scroll-bg')
            $('.site-branding img').addClass('resize')
            $('.site-header-container').css('padding', '0px 5% 10px 5%');  
        } else {
            $('.main-navigation').removeClass('scroll-bg')
            $('.site-branding').removeClass('scroll-bg')
            $('.site-branding img').removeClass('resize')
            $('.site-header-container').css('padding', '0px 5% 20px 5%');   
        }
    });
} 

// Search Bar
function _search_bar(){
    jQuery('.search-icon').on('click', function(){
      jQuery('.site-header').toggleClass('search-bar');
      jQuery(this).toggleClass('open');
  
      if(jQuery('.search-container').hasClass('hide')){
        jQuery('.search-container').removeClass('hide');
      } else {
        setTimeout(function(){
          jQuery('.search-container').addClass('hide');
        }, 300)
      }
    });
  }

// Accordion Filter
function _filterFunction(){

  var input, filter, i, accordionTitle, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();

    accordionItem = $('.accordion-body').length

    for (i = 0; i < accordionItem; i++) {
            
        txtValue = $('.accordion-body p')[i].innerText
        accordionTitle = $('.accordion-item')[i]

        if (txtValue.toUpperCase().indexOf(filter) > -1 || accordionTitle.innerText.toUpperCase().indexOf(filter) > -1 ) {
            accordionTitle.style.opacity = '1'
        } else {
            accordionTitle.style.opacity = '0.1'
        }
    }
} 

//Active Page
function _activePage() {
    var current = location.pathname.replace(/\/$/, '');
    var curretSeg = current.substr(current.lastIndexOf('/') + 1);

    $('#inner-page-navigation li a').each(function(){
        var $this = $(this);
        var url= $this.attr('href').replace(/\/$/, '');
        var lastSeg = url.substr(url.lastIndexOf('/') + 1);

        // if the current path is like this link, make it active
        if(lastSeg.indexOf(curretSeg) !== -1){
            $this.addClass('active');
        }
    })
}

//Navigation Image Switch
function _navImageSwitch(){

    function toggleImageVisibility(imageId) {
        // Hide all images
        var megaMenu = document.querySelectorAll('.sub-menu-level-0');
        
        megaMenu.forEach(function (menu) {
            imagesInMenu = menu.querySelectorAll('.target-image')
            $i = 0;
            if(imagesInMenu.length > 0){
                imagesInMenu.forEach(function(image) {
                    if ($i == 0){
                        // image.style.display = 'block';
                        image.classList.add('visible'); // Add visible class for fade-in effect
                    } else {
                        // image.style.display = 'none';
                        image.classList.remove('visible'); // Remove visible class
                    }
                    $i++;
                });
            }
        })
        // Show the selected image
        var imageToShow = document.getElementById(imageId);
        if (imageToShow) {
        //   imageToShow.style.display = 'block';
            imageToShow.classList.add('visible'); // Remove visible class
        }
    }

    toggleImageVisibility()

    // Add event listeners to each link
    var links = document.querySelectorAll('.navigation-link');
    
    links.forEach(function(link) {
        link.addEventListener('mouseover', function() {
            var imageId = this.id.replace('link', 'image');
            toggleImageVisibility(imageId);
        });
    });
    
} 

//Tab Changes
function _tabChange(){

    //hides dropdown content
    $(".tab-pane").hide();
    
    //unhides first option content
    $("#tab_1").show();
    
    //listen to dropdown for change
    $("#location_select").change(function(){
        //rehide content on change
        $('.tab-pane').hide();
        //unhides current item
        $('#'+$(this).val()).show();
    });
}


function _masonryEffects(){

    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        // gutter: 10,
      });
          
      $grid.on( 'layoutComplete', function( event, laidOutItems ) {
        console.log( 'Masonry layout complete with ' + laidOutItems.length + ' items' );
      });
      
}


//GSAP Effects
function _gsapEffects(){
      // Check if it's a touch device
    const isTouchDevice = 'ontouchstart' in window;

    if ($(".cursor-follower")[0]){
      const createCursorFollower = () => {
        const $el = document.querySelector('.cursor-follower');
        const $container = document.querySelector('.gsap-hover'); // Target container

        // Each time the mouse coordinates are updated,
        // we need to pass the values to gsap in order
        // to animate the element
        $container.addEventListener('mousemove', (e) => {
          const { target, x, y } = e;

          // Check if the event is within the container
          if (!$container.contains(target)) {
            return;
          }

          // Check if target is inside a link or button
          const isTargetLinkOrBtn = target?.closest('a') || target?.closest('button');

          // GSAP config
          gsap.to($el, {
            x: x + 3,
            y: y + 3,
            duration: .7,
            ease: 'power4', // More easing options here: https://gsap.com/docs/v3/Eases/
            opacity: isTargetLinkOrBtn ? 0.9 : 1,
            transform: `scale(${isTargetLinkOrBtn ? 3 : 1})`,
          });
        });

        // Hiding the cursor element when the mouse cursor
        // is moved out of the container
        $container.addEventListener('mouseleave', (e) => {
          gsap.to($el, {
            duration: .7,
            opacity: 0,
          });
        });
      };

      // Only invoke the function if isn't a touch device
      if (!isTouchDevice) {
        createCursorFollower();
      }
    }

    $ACF_Title = $('#ACF-title').text();
    gsap.registerPlugin(TextPlugin);
    gsap.fromTo("#headline", 
      { text: "" }, 
      { 
        duration: 3, 
        text: $ACF_Title, 
        ease: "none",
        delay: 0.5 // Add delay if you want to start the animation after some time
      }
    );
}


//Hero Arrow Bounce 
function _arrowBounce(){
  $nextSectionID = $('.banner-home').next().attr('id');
  $('.next_section_arrow').attr('href', '#' + $nextSectionID);
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
};


//Mega Menu 
function _megaMenu_1() {
  const menuItems = document.querySelectorAll('.mega-menu > li.menu-item-has-children');
  // menuItems.forEach((item) => {
  //     item.addEventListener('click', function (e) {
  //         e.preventDefault()
  //         console.log('click');
  //         const submenu = item.querySelector('ul');
  //         console.log(submenu.style.display == "none");
  //         if (submenu.style.display == "none") {
  //             submenu.style.display = 'block';
  //         } else {
  //           submenu.style.display = 'none';
  //         }
  //         if (e.target != submenu) {
  //           console.log('this is not the sub menu')
  //         }
  //     });
  // });
  menuItems.forEach((item) => {
    // Toggle submenu on click
    item.addEventListener('click', function (e) {
        e.preventDefault();
        
        const submenu = item.querySelector('ul');

        // First, close all other submenus
        closeAllSubmenus();

        // Then, toggle the clicked submenu
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
        } else {
            submenu.style.display = 'block';
        }

        // Stop event from bubbling up to the document
        e.stopPropagation();
    });
});

// Function to close all submenus
function closeAllSubmenus() {
    menuItems.forEach((item) => {
        const submenu = item.querySelector('ul');
        if (submenu) {
            submenu.style.display = 'none';
        }
    });
}

// Close submenu if clicking outside the menu item
document.addEventListener('click', function (e) {
    menuItems.forEach((item) => {
        const submenu = item.querySelector('ul');

        // Check if the click is outside the current open submenu and menu item
        if (submenu && submenu.style.display === 'block' && !item.contains(e.target)) {
            submenu.style.display = 'none';
        }
    });
});
}