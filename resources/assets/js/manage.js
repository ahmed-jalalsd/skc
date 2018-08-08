const accordions = document.getElementsByClassName('has-submenu')

for (var i = 0; i < accordions.length ; i++) {

	// check if we already on sub menu page

	if (accordions[i].classList.contains('is-active')) {
		const submenu = accordions[i].nextElementSibling
		submenu.style.maxHeight = submenu.scrollHeight + 'px'
		submenu.style.marginTop = "0.75em"
		submenu.style.marginBottom = "0.75em"
	}
	accordions[i].onclick = function() {
		this.classList.toggle('is-active')

		const submenu = this.nextElementSibling

		if(submenu.style.maxHeight) {
			// menu is open, we need to close it 
			submenu.style.maxHeight = null
			submenu.style.marginTop = null
			submenu.style.marginBottom = null
		} else {
			// menu is close, so we need to open it
			submenu.style.maxHeight = submenu.scrollHeight + 'px'
			submenu.style.marginTop = "0.75em"
			submenu.style.marginBottom = "0.75em"

		}
	}
}