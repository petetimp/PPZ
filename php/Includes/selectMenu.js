function selChanged(sel,data,dependentSel) {
	var selection = sel.options[sel.selectedIndex].value
	var arrOptions = data[selection];
	var opt;
	dependentSel.options.length = 0;
	for (var i in arrOptions) {
		opt = new Option(arrOptions[i]);
		opt.value=i;//options must have value so they can be processed by server
		appendOptionToSelect(dependentSel,opt);
	}
}
observeEvent(window,"load",function() {
	var selectPets = getElementsByClassName(document,"petSelect");
	observeEvent(selectPets[0],"change",function() {
		selChanged(selectPets[0],pets,selectPets[1]);	
	});
});