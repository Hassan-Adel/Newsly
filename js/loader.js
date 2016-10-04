$('a').click(function(){
	var page = $(this).attr('href');
	$("#sectionnn").load(page);
	return false;
});


