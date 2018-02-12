$(function() {
	fadeToggle( $('#iscezavanjek') );
});

function fadeToggle(el, hide) {
	el.fadeToggle(8000,null,function() {
		fadeToggle(el);
	});
}

$("#reklame1 > div:gt(0)").hide();

setInterval(function() {
	$('#reklame1 > div:first')
    .fadeIn(1000)
    .next()
    .fadeOut(1000)
    .end()
    .appendTo('#reklame1');
}, 1500);