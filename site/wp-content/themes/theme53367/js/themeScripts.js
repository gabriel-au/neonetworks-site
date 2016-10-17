
jQuery(document).ready(function(){

  setTimeout(function(){
      $('.parallax-1').css({visibility:"visible", opacity:0}).stop().animate({opacity:1}, 800);   
  },0);

	var
		_window = jQuery(window)
	;

	_window.on("resize", function(){
		resizeFunction();
	})
	resizeFunction();

	function resizeFunction(){
		var
			newWidth = _window.width()
		,	marginHalf = _window.width()/-2;
		;
		if (jQuery('body').hasClass('cherry-fixed-layout')) {
			var
				newWidth = jQuery('.main-holder').width()
			,	marginHalf =jQuery('.main-holder').width()/-2;
			;	
		}

		jQuery('.wide').css({width: newWidth, "margin-left": marginHalf, left: '50%'});
	}    

	jQuery('.sf-menu>li>a, a.btn').each(function(){
		$(this).attr("data-hover", $(this).text());
	});

	jQuery('a.btn').append(jQuery('<strong></strong><strong></strong><strong></strong><strong></strong><strong></strong><strong></strong><strong></strong><strong></strong>'));

      jQuery('.skills_wrapper').scrollShowTime({onShow: chartStart})
      
      function chartStart(){
      jQuery('.skills_wrapper > .skills-item').each(function(){
        var
          skill_level = parseFloat(jQuery(this).data("level"))
        , base_color_pie = jQuery(".chartCanvasPie",this).data("base-color")
        , skill_color_pie = jQuery(".chartCanvasPie",this).data("skill-color")
        , levelHolder = jQuery('.level', this)
        , animInterval
        ;

        //if (device.tablet() || device.mobile()) {}
        var OptionPie = {
          animationSteps: 50
        , segmentShowStroke   : false
        , animationEasing: "easeOutExpo"
        }
        

        var dataPie = [
          {
            value: skill_level,
            color: skill_color_pie
          },
          {
            value : 100-skill_level,
            color : base_color_pie
          }
        ];

        var ctxPie = jQuery(".chartCanvasPie", this).get(0).getContext("2d");
        var myPie = new Chart(ctxPie).Pie(dataPie, OptionPie);
        })
      }

       jQuery('body').find('.main-holder').each(function(){
       _this = jQuery(this);
       _this.find('.title-header').insertAfter(_this.find('.breadcrumb__t'));


         $('.title-header, .related-posts_h, .comments-h, #respond h3').each(function(){
             var me = $(this);
             me.html(me.html().replace(/^(\w+)/, '<span>$1</span>'));
        });
      });


});

$(document).ready(function(){

  function showRocketChat() {
    // alert('SHOW');
    $("#rocketchat-iframe").show();
  }

  function hideRocketChat() {
    // alert('HIDE');
    $("#rocketchat-iframe").hide();
    // $("#rocketchat-iframe").children().hide();
    // $("#rocketchat-iframe").css("display", "none");
  }

  function verifyPage() {
    if (jQuery('#content div div').hasClass('portfolio_category-products') || jQuery('body').hasClass('home')) {
      // showRocketChat();
      $("h2.related-posts_h").html('<span>RELATED</span> PRODUCTS');
    } else {
      // hideRocketChat();
      $("h2.related-posts_h").html('<span>RELATED</span> SERVICES');
    }
  }
  
  verifyPage();

  $("a[data-hover='Home'").click(function(){
      showRocketChat();
  });

  $("a[data-hover='Services'").click(function(){
      hideRocketChat();
  });

  $("a[data-hover='Products'").click(function(){
      showRocketChat();
  });

  $("a[data-hover='Contact Us'").click(function(){
      showRocketChat();
  });

  $("dd").hide();

  $("dt").click(function(){
      if($(this).next().is(':hidden')) {
        $(this).next().show();
        $(this).find('h4.marker').html('<img src="../../wp-content/themes/CherryFramework/images/toggle-close.png" style="cursor: pointer;"/>');
      } else {
        $(this).next().hide();
        $(this).find('h4.marker').html('<img src="../../wp-content/themes/CherryFramework/images/toggle-open.png" style="cursor: pointer;"/>');
      }
      
  });

  $("dt > h4.marker").html('<img src="../../wp-content/themes/CherryFramework/images/toggle-open.png" style="cursor: pointer;"/>');
  $("dd > h4.marker").html('');
  
});

$(window).load(function(){
  // alert("TESTE");
  $('body.home').attr('style', 'background-color: #FFFFFF !important');
  // $("#rocketchat-iframe").hide();

  if (jQuery('#content div div').hasClass('portfolio_category-products') || jQuery('body').hasClass('home')) {
      $("#rocketchat-iframe").show();
    } else {
      $("#rocketchat-iframe").hide();
    }
});

// $(document).load(function(){
//   $("#rocketchat-iframe").hide();
// });

// $('#rocketchat-iframe').ready(function(){
//   // alert('');
//    // $('div.rocketchat-container').html('PORRA');
//    // $('div.rocketchat-container').css("display", "none");
//    // $(this).css("display", "none");
//    $(this).hide();
// });

