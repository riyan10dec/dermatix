// $( window ).load(function() {
// 	$( ".loader" ).delay(900).fadeOut( "slow" );  
// });

$(document).ready(function() {

	$('#nav').onePageNav({
		scrollSpeed: 800
	});

	$("#owl-demo").owlCarousel({
		items : 2,
		lazyLoad : true,
		navigation : true
	}); 
 	
 	$('.popup-youtube').magnificPopup({
	  disableOn: 700,
	  type: 'iframe',
	  mainClass: 'mfp-fade',
	  removalDelay: 160,
	  preloader: false,

	  fixedContentPos: false
	});

	$('#searchForm').click(function(e){
        e.preventDefault();
        if ($('body').hasClass('search-open')){
            $('body').removeClass('search-open');
        }else{
            $('body').addClass('search-open');
        };
    });

    $('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})

	$("#input-image-1,#input-image-2,#input-image-3").fileinput({
	    uploadUrl: "/site/image-upload",
	    allowedFileExtensions: ["jpg", "png", "gif"],
	    maxImageWidth: 200,
	    maxFileCount: 1,
	    resizeImage: true
	}).on('filepreupload', function() {
	    $('#kv-success-box').html('');
	}).on('fileuploaded', function(event, data) {
	    $('#kv-success-box').append(data.response.link);
	    $('#kv-success-modal').modal('show');
	});


	$('[data-slug-converter]').keyup(function(){
		var $val = $(this).val(),
			$slug = convertToSlug($val);
		$('[data-slug]').val($slug);
	});

	function convertToSlug(Text)
	{
		return Text
			.toLowerCase()
			.replace(/[^\w ]+/g,'')
			.replace(/ +/g,'-');
	}
});

window.theme = {};

// Select2
(function(theme, $) {

	theme = theme || {};

	var instanceName = '__select2';

	var PluginSelect2 = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginSelect2.defaults = {
	};

	PluginSelect2.prototype = {
		initialize: function($el, opts) {
			if ( $el.data( instanceName ) ) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend( true, {}, PluginSelect2.defaults, opts );

			return this;
		},

		build: function() {
			this.$el.select2( this.options );

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginSelect2: PluginSelect2
	});

	// jquery plugin
	$.fn.themePluginSelect2 = function(opts) {
		return this.each(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginSelect2($this, opts);
			}

		});
	}

}).apply(this, [ window.theme, jQuery ]);

// Select2
(function( $ ) {

	'use strict';

	if ( $.isFunction($.fn[ 'select2' ]) ) {

		$(function() {
			$('[data-plugin-selectTwo]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSelect2(opts);
			});
		});

	}

}).apply(this, [ jQuery ]);

$(function () {
  $('[data-toggle="popover"]').popover();

  	w = window.innerWidth;
	
	if(w <= 360) {
		$('#mobile360_imgTech, #mobile360_imgTech2').addClass('img-100');
		$('#imageFileinput_360').addClass('img_fileInput');
		$('#fc_input').addClass('img-100');
	}else{
		$('#mobile360_imgTech, #mobile360_imgTech2').removeClass('img-100');
		$('#imageFileinput_360').removeClass('img_fileInput');
		$('#fc_input').removeClass('img-100');
	}
	// }else if(w <= 640){
	// 	$('#exc-derma_page-clinical').css('padding-right','15px');
	// }

	if (w <= 480) {
		$('#fileinput480, #fileinput480_2').addClass('border480_fileinput');
	}else{
		$('#fileinput480, #fileinput480_2').removeClass('border480_fileinput');
	};

	if (w <=360 && w >320) {
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').addClass('width25');
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').removeClass('width20');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').addClass('width70');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').removeClass('width75');
	}else if(w <= 320){
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').addClass('width30');
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').removeClass('width20');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').addClass('width65');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').removeClass('width75');
	};
});

$(window).resize(function() {
	w = window.innerWidth;
	
	if(w <= 360) {
		$('#mobile360_imgTech, #mobile360_imgTech2').addClass('img-100');
		$('#imageFileinput_360').addClass('img_fileInput');
		$('#fc_input').addClass('img-100');
	}else{
		$('#mobile360_imgTech, #mobile360_imgTech2').removeClass('img-100');
		$('#imageFileinput_360').removeClass('img_fileInput');
		$('#fc_input').removeClass('img-100');
	}
	// }else if(w <= 640){
	// 	$('#exc-derma_page-clinical').css('padding-right','15px');
	// }

	if (w <= 480) {
		$('#fileinput480, #fileinput480_2').addClass('border480_fileinput');
	}else{
		$('#fileinput480, #fileinput480_2').removeClass('border480_fileinput');
	};

	if (w <=360 && w >320) {
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').addClass('width25');
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').removeClass('width20');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').addClass('width70');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').removeClass('width75');
	}else if(w <= 320){
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').addClass('width30');
		$('#strongChangeMobile,#strongChangeMobile_place,#strongChangeMobile_agenda,#strongChangeMobile_time').removeClass('width20');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').addClass('width65');
		$('#desc-liChangeMobile, #desc-liChangeMobile_place, #desc-liChangeMobile_agenda, #desc-liChangeMobile_time').removeClass('width75');
	};
});

$( window ).scroll(function() {
	
	var $this = $(this);

  	// if ($('body').hasClass('fixed-sidebar')) {
   //      if ($this.scrollTop() >= 0)
   //          $('body').addClass('bray');
   //      else
   //          $('body').removeClass('bray');
   //  }

 	if ($('#sidebar').hasClass('forScroll')) {
 			if ($this.scrollTop() >= 250)
		        $('#sidebar').addClass('awesome');
		    else
		        $('#sidebar').removeClass('awesome');
 	};
});

$(window).load(function(){
	$('.grid').masonry({
	  	columnWidth: '.grid-sizer',
		itemSelector: '.grid-item',
		percentPosition: true
	});
});