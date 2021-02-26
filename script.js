function update() {
seconds = new Date().getTime() / 1000;
$.get('/fetch',function(data,status){
	$("#main").html('');
	keys = Object.keys(data[0]);
	titleRow = "<tr>"
	for (index in keys) {
		titleRow +=  "<th>" + keys[index] + "</th>";
	}
	titleRow += "</tr>"
	$('#main').append(titleRow)
	// Start rows
	for (index in data) {
		row = "<tr>"
		for (keyIndex in keys) {
			key = keys[keyIndex];
			value = data[index][key];
			row += "<td><textarea readonly rows='1' style='resize:none;'>" + value + "</textarea></td>";
		}
		row += "<tr>"
		$('#main').append(row)
	}
});
}

update();console.log('Updated...');

interval = 10;

setInterval(function(){
	update();
	console.log('Updated...');
}, interval*1000);

setInterval(function(){
	var secondsNow = new Date().getTime() / 1000;
	$('#updated').html("Next update in "+Math.round(interval-(secondsNow-seconds))+" seconds.");
},1000);
