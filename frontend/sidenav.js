
document.getElementById("main").addEventListener("click", toggleNav);

function toggleNav(width) {
	navSize = document.getElementById("sidenav").style.width;
	if (navSize == '25%' || navSize == '70%' || navSize == '50%') {
		return close();
	} else if (window.matchMedia("(max-width: 768px)").matches) {
		return open("50%");
	}
	else if (window.matchMedia("(max-width: 400px)").matches) {
		return open("70%");
	} else {
		return open("25%");
	}

}

function open(size) {
	document.getElementById("sidenav").style.width = size;
	document.getElementById("main").style.marginLeft = size;
	document.getElementById("sidenav").classList.remove("slide-out-left");
	document.getElementById("sidenav").classList.add("slide-in-left");
}

function close() {
	document.getElementById("sidenav").style.width = "0%";
	document.getElementById("main").style.marginLeft = "0%";
	document.getElementById("sidenav").classList.add("slide-out-left");
	document.getElementById("sidenav").classList.remove("slide-in-left");
}