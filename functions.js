var stickyNav=".navbar-sticky > .navbar";
$(stickyNav).css({
	top:"0",
	width:"100%"
}),$(".navbar-sticky").height($(stickyNav).outerHeight(!0)),
	$(stickyNav).affix({
	offset:{
		top:$(stickyNav).offset().top
	}
});// JavaScript Document