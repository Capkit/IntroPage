 $(function() {

	var $menu = $(".menu");
	var $pages = $(".page");
	var $menuLi = $menu.find("li").not(".to-home");
	var $toHome = $menu.find(".to-home");
  var $profileCard = $("#section-home");   
	
	//interna vars
	var currentPage = "";

  $pages.hide();   
     
	$toHome.on("click", function() {
		currentPage = "";
		TweenMax.to($pages, 0.9, {
			left: "-70%"
		});
		TweenLite.to($menuLi.filter(".active"), 0.5, {
			className: "-=active"
		});
    $profileCard.show();
    $pages.hide();
	});
	
	$menuLi.on("click", function(event) {
		
		var $this = $(this);
		var thisHref = $this.find("a").attr("href");
		
		if (currentPage !== thisHref && $pages.filter(thisHref).length > 0) {
			currentPage = thisHref;
     
			TweenMax.to($pages, 2.0, {
				left: 1700,
        scale: 0.9
			}); 

			TweenMax.to($pages.filter(thisHref), 0.5, {
				left: 0
			});
			TweenLite.to($menuLi.filter(".active"), 0.5, {
				className: "-=active"
			});
			TweenLite.to($this, 0.5, {
				className: "+=active"
			});
		}
		$profileCard.hide();
    $pages.show();
		event.preventDefault();
	})
})

$(document).ready(function () {
	$('.submit').click(function (event) {
		
		var email = $('.email');
		var message = $('.message');
		var name = $('name');
	})
})
