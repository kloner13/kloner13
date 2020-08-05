(function($){
	"use strict";

	// loader
	var loader = function() {
		setTimeout(function() {
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	/**
	 * slider
	 */
    var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
    };

	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});

	$(".clients-carousel").owlCarousel({
        autoplay: true,
        dots: false,
        loop: true,
        responsive: {
          0: {
            items: 2
          },
          768: {
            items: 3
          },
          900: {
            items: 3
          }
        }
	});

	var swiper = new Swiper('.swiper-container', {
		direction: 'vertical',
		loop: true,
		autoplay: {
			delay: 8000,
			disableOnInteraction: false,
		},
		pagination: {
		  clickable: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		  },
	  });

  var normatives = function(){
    $('.icacnormative_estado').click(function(){
	
	  //Open filter	if are hidden
      if(!$('#multiCollapseNormative').hasClass('show')){
        $('#multiCollapseNormative').collapse();
      }

      var val = $(this).data('value');
	  $('select[name="icacnormative_estado_value"] option').eq(val).prop('selected', true);
	  
	  
	  //Add item as active
	  $('.icacnormative_estado').removeClass('active');
	  $(this).addClass('active');

	  //Reset other dropdowns value
	  $('select[name="icacnormative_subseccion_value"] option').eq(0).prop('selected', true);
	  $('select[name="icacnormative_subtipo_value"] option').eq(0).prop('selected', true);

	  $('.icacnormative_subtipo').removeClass('active');
	  $('.icacnormative_subseccion li a').removeClass('active');

	  ///Send Form
	  $('.view-normativas .views-exposed-form .form-submit').trigger('click');
	  

    });

    $('.icacnormative_subtipo').click(function() {

      var val = $(this).data('value');
	   $('select[name="icacnormative_subtipo_value"] option').eq(val).prop('selected', true);
	  
	   ///Reset Values
      if(val > 1){
        $('select[name="icacnormative_subseccion_value"] option').eq(0).prop('selected', true);
        $('#collapseOne').collapse('hide');
	  }
	  
	  //Add item as active
	  $('.icacnormative_subtipo').removeClass('active');
	  $(this).addClass('active');

	  $('.icacnormative_subseccion li a').removeClass('active');

	  ///Send Form
      $('.view-normativas .views-exposed-form .form-submit').trigger('click');
    });

    $('.icacnormative_subseccion li a').click(function() {
      var val = $(this).data('value');
	  $('select[name="icacnormative_subseccion_value"] option').eq(val).prop('selected', true);
	 
	  //add item as active
	  $('.icacnormative_subseccion li a').removeClass('active');
	  $(this).addClass('active');
	  
	  ///Send Form
      $('.view-normativas .views-exposed-form .form-submit').trigger('click');
	});
	
	$('.download-document a').click(function(){
		var go = $(this).parents('.document').find('.document_url').attr('href');
		window.location.href = go;
	});
	$('.file--application-pdf').click(function(){
		var go = $(this).find('a').attr('href');
		window.location.href = go;
	})

  }

  var contabilidad = function() {
	$('.icacnormativecon_estado').click(function(){
		//Open filter	if are hidden
		if(!$('#multiCollapseNormative').hasClass('show')){
			$('#multiCollapseNormative').collapse();
		}

		var val = $(this).data('value');
		$('select[name="icacnormativecon_estado_value"] option').eq(val).prop('selected', true);  

		$('.icacnormativecon_estado').removeClass('active');
		  $(this).addClass('active');
		
		//Reset other dropdowns value
		$('select[name="icacnormativecon_subtipo_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subadaptacion_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subresolucion_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subotra_value"] option').eq(0).prop('selected', true);
  
		$('.icacnormativecon_subtipo').removeClass('active');
		$('.icacnormativecon_subadaptacion li a').removeClass('active');
  
		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');

	});

	$('.icacnormativecon_subtipo').click(function() {

		var val = $(this).data('value');
		 $('select[name="icacnormativecon_subtipo_value"] option').eq(val).prop('selected', true);
		
		 ///Reset Values
		if(val > 1){
		  $('select[name="icacnormativecon_subadaptacion_value"] option').eq(0).prop('selected', true);
		  $('#collapseOne').collapse('hide');
		}
		
		//Add item as active
		$('.icacnormativecon_subtipo').removeClass('active');
		$(this).addClass('active');
  
		$('.icacnormativecon_subadaptacion li a').removeClass('active');
  
		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	  });
	  
	$('.icacnormativecon_subadaptacion li a').click(function() {
		var val = $(this).data('value');
		$('select[name="icacnormativecon_subadaptacion_value"] option').eq(val).prop('selected', true);

		$('select[name="icacnormativecon_subresolucion_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subotra_value"] option').eq(0).prop('selected', true);

		//add item as active
		$('.icacnormativecon_subadaptacion li a').removeClass('active');
		$(this).addClass('active');
		
		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	  });

	$('.icacnormativecon_subresolucion li a').click(function() {
		var val = $(this).data('value');
		$('select[name="icacnormativecon_subresolucion_value"] option').eq(val).prop('selected', true);

		$('select[name="icacnormativecon_subadaptacion_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subotra_value"] option').eq(0).prop('selected', true);

		//add item as active
		$('.icacnormativecon_subresolucion li a').removeClass('active');
		$(this).addClass('active');

		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	})

	$('.icacnormativecon_subotra li a').click(function() {
		var val = $(this).data('value');
		$('select[name="icacnormativecon_subotra_value"] option').eq(val).prop('selected', true);

		$('select[name="icacnormativecon_subadaptacion_value"] option').eq(0).prop('selected', true);
		$('select[name="icacnormativecon_subresolucion_value"] option').eq(0).prop('selected', true);

		//add item as active
		$('.icacnormativecon_subotra li a').removeClass('active');
		$(this).addClass('active');

		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	})
  }

  var contabilidad_internacional = function(){
	$('.icacnormativeconinter_estado').click(function(){
		//Open filter	if are hidden
		if(!$('#multiCollapseNormative').hasClass('show')){
			$('#multiCollapseNormative').collapse();
		}	

		var val = $(this).data('value');
		$('select[name="icacnormativecon_estado_value"] option').eq(val).prop('selected', true);  

		

		$('.icacnormativeconinter_estado').removeClass('active');
		  $(this).addClass('active');
		
		  $('select[name="icacnormativecon_intdirect_value"] option').eq(0).prop('selected', true);
		 $('select[name="icacnormativecon_intnif_value"] option').eq(0).prop('selected', true);
		 $('select[name="icacnormativecon_intopc_value"] option').eq(0).prop('selected', true);

		 $('.icacnormativecon_intopc').removeClass('active');
		  $('.icacnormativecon_intnif li a').removeClass('active');
		  $('.icacnormativecon_intdirect li a').removeClass('active');

		///Send Form
		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	});

	$('.icacnormativecon_intopc').click(function(){
		var val = $(this).data('value');
		 $('select[name="icacnormativecon_intopc_value"] option').eq(val).prop('selected', true);

		 $('select[name="icacnormativecon_intdirect_value"] option').eq(0).prop('selected', true);
		 $('select[name="icacnormativecon_intnif_value"] option').eq(0).prop('selected', true);

		 //Add item as active
		$('.icacnormativecon_intopc').removeClass('active');
		$(this).addClass('active');

		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	});

	$('.icacnormativecon_intnif li a').click(function() {
		var val = $(this).data('value');
		$('select[name="icacnormativecon_intnif_value"] option').eq(val).prop('selected', true);

		$('select[name="icacnormativecon_intdirect_value"] option').eq(0).prop('selected', true);

		$('.icacnormativecon_intnif li a').removeClass('active');
		$(this).addClass('active');

		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	})

	$('.icacnormativecon_intdirect li a').click(function() {
		var val = $(this).data('value');
		$('select[name="icacnormativecon_intdirect_value"] option').eq(val).prop('selected', true);

		$('select[name="icacnormativecon_intnif_value"] option').eq(0).prop('selected', true);

		$('.icacnormativecon_intdirect li a').removeClass('active');
		$(this).addClass('active');

		$('.view-normativas-de-contabilidad .views-exposed-form .form-submit').trigger('click');
	})
  }


  $(document).ready(function(){
	normatives();
	contabilidad();
	contabilidad_internacional();
  });

  $(document).ajaxComplete(function(e, xhr, s){
    if(typeof s.extraData != 'undefined' && typeof s.extraData.view_display_id != 'undefined'){
      console.log(s.extraData.view_display_id);
      if(s.extraData.view_name == 'normativas'
          && s.extraData.view_display_id == 'page_2'){
        normatives();
      }
    }
  })


})(jQuery);
