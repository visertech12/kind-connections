
(function ($) {
  "use strict";

  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {

    // ============== Header Hide Click On Body Js Start ========
    $('.header-button').on('click', function() {
      $('.body-overlay').toggleClass('show'); 
      $('.header').toggleClass('add-bg'); 
    }); 
    $('.body-overlay').on('click', function() {
      $('.header-button').trigger('click')
      $(this).removeClass('show');
      $('.header').removeClass('add-bg'); 
    }); 
    // =============== Header Hide Click On Body Js End =========
    
  // ========================== Header Hide Scroll Bar Js Start =====================
    $('.navbar-toggler.header-button').on('click', function() {
      $('body').toggleClass('scroll-hidden-sm')
    }); 
    $('.body-overlay').on('click', function() {
      $('body').removeClass('scroll-hidden-sm')
    }); 
  // ========================== Header Hide Scroll Bar Js End =====================

  // ========================= Slick Slider Js Start ==============
  $('.testimonial-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: true,
    pauseOnHover: true,
    arrows: false,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-long-arrow-alt-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-long-arrow-alt-right"></i></button>',
    responsive: [
        {
          breakpoint: 1199,
          settings: {
            arrows: false,
            slidesToShow: 1,
            dots: true,
          }
        },
        {
          breakpoint: 991,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        },
        {
          breakpoint: 767,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        }
      ]
  });
  // ========================= Slick Slider Js End ===================

  // ========================= Odometer Counter Up Js End ==========
  $(".counter-item").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
  // ========================= Odometer Up Counter Js End =====================

  // ================== Password Show Hide Js Start ==========
  $(".toggle-password").on('click', function() {
    $(this).toggleClass(" fa-eye-slash");
    var input = $($(this).attr("id"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
  });
  // =============== Password Show Hide Js End =================

  // ============================ ToolTip Js Start=====================
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))  
  // ============================ ToolTip Js End========================
  

  ///////////////// ADDED 26 START


    $(".block-collapse-btn").each(function () {
    var $collapseButton = $(this);
    var $block = $collapseButton.closest(".item-detail-block");
    var $collapseBody = $block.length
      ? $block.find(".collapse-boddy").first()
      : $collapseButton.parent().next(".collapse-boddy");
    var $collapseIcon = $collapseButton.find(".collapse-icon i");

    if (!$collapseBody.length) {
      return;
    }

    $collapseBody.slideUp(0);
    $collapseButton.attr({
      role: "button",
      tabindex: "0",
      "aria-expanded": "false",
    });

    function toggleCollapseBody() {
      var isHidden = !$collapseBody.is(":visible");

      $collapseBody.stop(true, true).slideToggle(250);
      $collapseButton.attr("aria-expanded", String(isHidden));
      $collapseIcon.toggleClass("fa-caret-down", !isHidden);
      $collapseIcon.toggleClass("fa-caret-up", isHidden);
    }

    $collapseButton.on("click", toggleCollapseBody);
    $collapseButton.on("keydown", function (event) {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        toggleCollapseBody();
      }
    });
  });

  if ($(".adv-testimonial-slider").length) {
    $(".adv-testimonial-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      speed: 500,
      autoplay: true,
      adaptiveHeight: true,
    });

    $(".adv-slider-prev").on("click", function () {
      $(this)
        .closest(".adv-testimonial-outer")
        .find(".adv-testimonial-slider")
        .slick("slickPrev");
    });

    $(".adv-slider-next").on("click", function () {
      $(this)
        .closest(".adv-testimonial-outer")
        .find(".adv-testimonial-slider")
        .slick("slickNext");
    });
  }

  $(".business-brand-slider").slick({
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 15000,
    arrows: false,
    swipe: false,
    dots: false,
    variableWidth: true,
    slidesToShow: 5,
    cssEase: "linear",
    pauseOnFocus: true,
    pauseOnHover: true,
  });

  $('.bc-banner-coin-slider').slick({
    autoplay: true,
    autoplaySpeed: 0,
    dots: false,
    speed: 5000,
    swipe: false,
    arrows: false,
    cssEase: "linear",
    pauseOnFocus: false,
    pauseOnHover: false,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 6,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        },
      },
    ],
  });

  $('.sp-testimonial').each((index, el) => {
    let slider = $(el).find('.sp-testimonial-slider');
    let sliderCTRL = $(el).find('.sp-testimonial-slider-ctrl');

    slider.slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      speed: 1500,
      pauseOnHover: true,
      arrows: true,
      autoplay: true,
      appendArrows: sliderCTRL,
      prevArrow: `<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>`,
      nextArrow: `<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>`,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });
  })

  $('.web-banner-slider').slick({
    variableWidth: true,
    slidesToScroll: 1,
    speed: 1000,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
          variableWidth: false,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          variableWidth: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          variableWidth: false,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          variableWidth: true,
        },
      }
    ],
  })

  setTimeout(function () {
    if ($('.dh-banner-cards').length) {
      document
        .querySelector('.dh-banner-cards')
        .classList.add('active');
    }
  }, 300);

  const productSliderConfig = {
    autoplay: true,
    autoplaySpeed: 0,
    speed: 8000,
    arrows: false,
    swipe: false,
    dots: false,
    slidesToScroll: 1,
    variableWidth: true,
    cssEase: 'linear',
    pauseOnFocus: false,
    pauseOnHover: false,
  }

  $('.product-slider-one').slick(productSliderConfig);

  $('.product-slider-two').slick({
    ...productSliderConfig,
    rtl: true
  });
  ///////////////// ADDED 26 END






  });
  // ==========================================
  //      End Document Ready function
  // ==========================================
  
  // ========================= Preloader Js Start =====================
    $(window).on("load", function(){
      $('.preloader').fadeOut(); 
    })
    // ========================= Preloader Js End=====================

    // ========================= Header Sticky Js Start ==============
    $(window).on('scroll', function() {
      if ($(window).scrollTop() >= 300) {
        $('.header').addClass('fixed-header');
      }
      else {
          $('.header').removeClass('fixed-header');
      }
    }); 
    // ========================= Header Sticky Js End===================



//========================= Category icon color Start ======================
    let catItems=$('.category-icon');
    $.each(catItems, function (index, catItem) {
      catItem = $(catItem);
      var customColor = catItem.data('color');
      if(!customColor){
        return '';
      }
      var hslColor = hexToHSL(customColor);
      catItem.css('background-color',`hsl(${hslColor},0.2)`);
      catItem.css('color',`hsl(${hslColor})`);
      catItem.closest('.product-card__actions').find('.item-category-name').css('color',`hsl(${hslColor})`);
      catItem.closest('.product-details__content').find('.item-category-name').css('color',`hsl(${hslColor})`);

    });
//========================= Category icon color end ======================
    
//========================= MegaMenu Color Start ======================

let megaItems=$('.mega-menu-list__item');
  $.each(megaItems, function (index, megaItem) {
    megaItem = $(megaItem);
    var customColor = megaItem.data('color');
    if(!customColor){
      return '';
    }
    var hslColor = hexToHSL(customColor);
    var megaItemTitle = megaItem.find('.mega-menu-list__title');
    megaItem.hover(
      function() {
        megaItem.css('background-color', `hsl(${hslColor},0.05)`);
        megaItemTitle.css('color',`hsl(${hslColor})`);
      },function(){
        megaItem.css('background-color', '#fff');
        megaItemTitle.css('color',`hsl(var(--heading-color))`);
      }
    );
    var megaItemIcon = megaItem.find('.mega-menu-list__icon');
    megaItemIcon.css('background-color',function(){
      return `hsl(${hslColor},0.1)`;
    });
    megaItemIcon.css('color',function(){
      return `hsl(${hslColor})`;
    });
  });

  function hexToHSL(hex) {
    // Remove the '#' character if present
    hex = hex.replace('#', '');
  
    // Convert the hex value to RGB
    var r = parseInt(hex.substring(0, 2), 16) / 255;
    var g = parseInt(hex.substring(2, 4), 16) / 255;
    var b = parseInt(hex.substring(4, 6), 16) / 255;
  
    // Find the minimum and maximum values of RGB
    var min = Math.min(r, g, b);
    var max = Math.max(r, g, b);
  
    // Calculate the hue
    var hue = 0;
    if (min !== max) {
      if (max === r) {
        hue = ((g - b) / (max - min)) % 6;
      } else if (max === g) {
        hue = (b - r) / (max - min) + 2;
      } else {
        hue = (r - g) / (max - min) + 4;
      }
    }
    hue = Math.round(hue * 60);
  
    // Calculate the lightness
    var lightness = (min + max) / 2;
    lightness = Math.round(lightness * 100);
  
    // Calculate the saturation
    var saturation = 0;
    if (min !== max) {
      if (lightness <= 0.5) {
        saturation = (max - min) / (max + min);
      } else {
        saturation = (max - min) / (2 - max - min);
      }
    }
    saturation = Math.round(saturation * 100);
  
    return  hue + ', ' + saturation + '%, ' + lightness + '%';
  }
//========================= MegaMenu Color END ======================



})(jQuery);



