if (localStorageSupport) {
	var skin = localStorage.getItem("skin");
	if (skin == '0') {
		$("body").removeClass("skin-1");
		$("body").removeClass("skin-2");
		$("body").removeClass("skin-3");
		$("body").removeClass("md-skin");
	}			
	if (skin == '1') {
		$("body").removeClass("skin-2");
		$("body").removeClass("skin-3");
		$("body").removeClass("md-skin");
		$("body").addClass("skin-1");
	}			
	if (skin == '2') {
		$("body").removeClass("skin-1");
		$("body").removeClass("skin-3");
		$("body").removeClass("md-skin");
		$("body").addClass("skin-2");
	}			
	if (skin == '3') {
		$("body").removeClass("skin-1");
		$("body").removeClass("skin-2");
		$("body").removeClass("md-skin");
		$("body").addClass("skin-3");
	}

	if (skin == '4') {
		$("body").removeClass("skin-1");
		$("body").removeClass("skin-2");
		$("body").removeClass("skin-3");
		$("body").addClass("md-skin");
	}
}