/**
 * MyTicket Hall Layout created by Kenzap on 14/02/2020.
 */

jQuery(function ($) {
	"use strict";

	// seat layout selector
	var khl = ".kenzap-hall-layout";
	// 1 draw seats over hall layout | 0 draw zones over hall layout
	var renderType = $(khl).data('rendertype');
	// seat shape 
	var seatShape = $(khl).data('seatmode'); // circle rect
	// seat shape 
	var numOpacity = $(khl).data('numopacity'); // hide/show seat numbers
	// seat shape 
	var snSize = $(khl).data('snsize'); // hide/show seat numbers
	// seat shape 
	var hideNumbers = $(khl).data('hidenumbers'); // define seat opacity
	// hall layout json structure
	var hall_js = '';
	// ticket reservation array
	var tickets_global = [];
	// unique booking session identifier
	var myticketUserId = "";
	// selected zone id
	var current_zone_id = -1;
	// init ajax call timer
	var myticketCalls = "";
	// adds seat/zone listener delay before bookings are loaded
	var firstLoad = 60;

	$(function() {

		if($(khl).length){

			myticketCalls = setInterval(checkReservations, 10000, true);

			// if product just added redirect to cart
			if(window.location.search.indexOf("add-to-cart") !== -1){

				var href = $(khl).data('checkouturl');
				location.href = href;
			}
			
			// add tickets to cart listener
			$(".kp-btn-reserve").on("click", function(){

				setReservations();
				return false;
			});

			// generate unique user id valid during booking only
			if(getCookie("myticket_user_id")!=''){
				myticketUserId = getCookie("myticket_user_id");
			}else{
				myticketUserId = makeid();
				createCookie("myticket_user_id",myticketUserId,1);
			}

			// reserved but not yet booked ticket list
			if(getCookie("tickets")!='')
				tickets_global = JSON.parse(getCookie("tickets"));

			// get layout code from html sript
			hall_js = JSON.parse(kenzap_hall_layout);

			// HTML area to output seats or zones
			var kp_svg = $(".kp_svg");
			var i = 0;

			// get backend stored data
			checkReservations();

			// load hall layout image
			$("#myticket_img").attr("src",hall_js.img);
			$("#myticket_img").load(function() {

				// find scale factor
				var polygon_scale = hall_js.img_width / parseInt($(khl).data("dwidth"));

				// set up layout proportions with the browsers screen
				var mwidth = $("#myticket_img").width();
				var mheight = $("#myticket_img").height();
				$("#kp_image").css("width", mwidth);
				$("#svg").css("width", mwidth);
				$("#svg").css("height", mheight);
				polygon_scale = hall_js.img_width / parseInt(mwidth);
				var hall = hall_js;

				// switch layout rendering scenarious
				switch(renderType){

					// overlay hall layout image with interactive seat polygons
					case 1:

						var cp = hall_js.areas.map(function(item, z) {

							// map seats
							var tws = 0;
							if (hall.areas[z].seats){
					
								// total seats per zone
								tws = hall.areas[z].seats.tws;
					
								// seat size
								if(typeof(hall.areas[z].seats.height) === 'undefined') hall.areas[z].seats.height = 100; 
								var height = parseFloat(hall.areas[z].seats.height) / polygon_scale / 2;
								var s = 0;
								while (s < tws){
					
									// seat default coordinates
									var x = 0;
									var y = 0;
					
									// prevent undefined js error
									if ( !hall.areas[z].seats.points ) hall.areas[z].seats.points = [];
					
									// get central point 
									var x = 0, y = 0, xc = 0, yc = 0, i = 0, x_start = 99999, y_start = 99999;
									var cp = hall.areas[z].coords.points.map(function(item) {

										if(x_start > item.x) x_start = item.x;
										if(y_start > item.y) y_start = item.y;
										i++;
										x += item.x; y += item.y;
										return item;
									});
								
									// calc all x and y coords separately. Divide by the total amount of coords to find central point
									xc = x / i;
									yc = y / i;

									// get mapped seat coordinates and align them accordingly
									if ( hall.areas[z].seats.points[s] ){
					
										x = xc / polygon_scale + (hall.areas[z].seats.points[s].x) / polygon_scale;
										y = yc / polygon_scale + (hall.areas[z].seats.points[s].y) / polygon_scale;
									}
					
									// get seat HTML
									var seat = structSeat(hall, z, s, height, x, y);
					
									// add seat to hall layout canvas
									seat.g.obj = this;
									kp_svg.append(seat.g);

									// svg_mapping.append(seat.g);
									s++;
								}
							}
							
							i++;
						});

					break;
					// overlay hall layout image with interactive zone polygons
					case 0:

						var cp = hall_js.areas.map(function(item) {

							// generate DOM elements
							var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
							var polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');

							// draw zone overlay polygon 
							polygon.setAttribute('points', item.coords.points.map(function(item) { return item.x / polygon_scale + " " + item.y / polygon_scale; }));
							polygon.setAttribute('data-index', i);
							polygon.setAttribute('id', "pl"+i);
							g.appendChild(polygon);
							kp_svg.append(g);
							i++;

							// fade in
							$("#kp_image").animate({opacity: '100%'}, 300);
					
							return item;
						});
					break;
				}

				// add layout zone seat preview event
				$("polygon").on("click", function(){

					showSeatSelection($(this).data("index"), hall_js);
				});

				refreshSelectedTicket(tickets_global, hall_js, -1, -1);

			});
		}
	});

	// popup window to pick up seat from the zone
	function showSeatSelection(z, hall){

		$("body").prepend($("#seat_mapping").clone().addClass("seat_mapping_temp"));

		var svg_mapping = $("#svg_mapping");
		var svg_width = $(window).width()-200;
		var svg_height = $(window).height()-200;
		var svg_min_width = parseInt($(khl).data("sminwidth"));
		var svg_max_height = parseInt($(khl).data("smaxwidth"));

		if(svg_width<svg_min_width)
			svg_width = svg_min_width;
		if(svg_width>svg_max_height)
			svg_width = svg_max_height;
		if(svg_height<600)
			svg_height = 600;
		
		//svg_width = 1000;
		current_zone_id = z;

		$("#seat_mapping").fadeIn();
		svg_mapping.html("");

		// get central point 
		var x = 0, y = 0, xc = 0, yc = 0, i = 0;
		var cp = hall.areas[z].coords.points.map(function(item) {

			i++; x += item.x; y += item.y;
			return item;
		});

		// calc all x and y coords separately. Divide by the total amount of coords to find central point
		xc = x / i;
		yc = y / i;

		// get relative distance from coords to center point
		var il = 0, yl = 0, xl = 0, max_times = 1;
		hall.areas[z].coords.points_rel = [];
		cp = hall.areas[z].coords.points.map(function(item) {

			var temp = Math.abs(xc - item.x);

			// find longest coordinates
			temp = Math.abs(xc - item.x);
			xl = temp > xl ? temp : xl;
			temp = Math.abs(yc - item.y);
			yl = temp > yl ? temp : yl;
			
			// store central points
			hall.areas[z].coords.points_rel.push({x : item.x - xc, y : item.y - yc});
		}); 

		// detect how many times original poligon can be enlarger
		svg_mapping.css("width",svg_width);
		svg_mapping.css("height",svg_height);

		// get max scalability, calculate based on screen viewport
		var max_x = (svg_width/2) / xl;
		var max_y = (svg_height/2) / yl;
		max_times = max_x < max_y ? max_x : max_y; 

		// generate scaled polygon points
		max_x = 0; max_y = 0;
		var max_x_prev = 0, max_y_prev = 0, max_first = true;
		var polygonPointsAttrValue = hall.areas[z].coords.points_rel.map(function(item) {

			var px = item.x * max_times + (svg_width/2);
			var py = item.y * max_times + (svg_height/2);

			if ( !max_first ){
				max_x += max_x_prev * item.y * max_times;
				max_y += max_y_prev * item.x * max_times;
			}

			max_x_prev = item.x * max_times;
			max_y_prev = item.y * max_times;

			max_first = false;
			return px + " " + py;
		}).join(' ');

		// generate DOM elements
		var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
		var polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
		polygon.setAttribute('points', polygonPointsAttrValue);
		g.appendChild(polygon);
		svg_mapping.append(g);

		// calculate polygon square footage https://www.wikihow.com/Calculate-the-Area-of-a-Polygon
		var sf = Math.round(Math.abs(max_y - max_x)) / 2;

		// generate draggable seats with accordance to square footage size
		var tws = 0;
		if (hall.areas[z].seats){

			// total seats per zone
			tws = hall.areas[z].seats.tws;

			// seat size
			var height = Math.sqrt(sf / tws);
			if(typeof(hall.areas[z].seats.height) === 'undefined') hall.areas[z].seats.height = 100; 
			var height_slider = hall.areas[z].seats.height;
			height *= (parseInt(height_slider) / 100);

			var li = "";
			var s = 0;
			while (s < tws){

				// seat default coordinates
				var x = 0;
				var y = 0;

				// prevent undefined js error
				if ( !hall.areas[z].seats.points ) hall.areas[z].seats.points = [];

				// get mapped seat coordinates and align them accordingly
				if ( hall.areas[z].seats.points[s] ){

					x = (hall.areas[z].seats.points[s].x) * max_times + (svg_width/2);
					y = (hall.areas[z].seats.points[s].y) * max_times + (svg_height/2);
				}

				// get seat HTML
				var seat = structSeat(hall, z, s, height, x, y);

				// add seat to hall layout canvas
				seat.g.obj = this;
				svg_mapping.append(seat.g);
				s++;
			}
		}

		$("#seat_mapping_close").on("click", function(){

			$("#seat_mapping").fadeOut();
			$(".seat_mapping_temp").remove();
			current_zone_id = -1;
		});

		// init seat click listeners
		seatListeners(hall);

		// preload default selections
		refreshSelectedTicket(tickets_global, hall, z, -1);

		// mark reserved seats
		markBookings(hall, z);

		// scroll button listeners
		$(".kp-prev").on("click",function(){ $('#svg_mapping_cont').animate( { scrollLeft: '+=180' }, 500); });
		$(".kp-next").on("click",function(){ $('#svg_mapping_cont').animate( { scrollLeft: '-=180' }, 500); });
	}

	// seat click listeners
	function seatListeners(hall){

		// make sure reservations are loaded
		setTimeout(function(){

			// double click listener for admins only
			$(".cr, .tx").off("dblclick");
			var justdblclick = false;
			if($(khl).data('admin')) $(".cr, .tx").on("dblclick", function(){

				if(justdblclick) return;
				justdblclick = true;

				var ticket_id = $(this).attr("id").substr(1);

				var z = parseInt($(this).data("zone"));
				var s = $(this).data("index");

				// cancel reservation
				if($("#c"+ticket_id).hasClass("booked")){

					var l = confirm("Admin mode. Cancel this reservation?");
					if(l){ setBooking(z+"_"+ticket_id, "clear"); } // $("#c"+ticket_id).removeClass("booked");

				// mark as reserved
				}else{

					var l = confirm("Admin mode. Mark as reserved?");
					if(l){ setBooking(z+"_"+ticket_id, "book"); } //$("#c"+ticket_id).addClass("booked");
				}
				setTimeout(function(){ justdblclick = false; }, 1000);
			});

			// single click listener
			$(".cr, .tx").off("click");
			$(".cr, .tx").on("click", function(){

				var ticket_id = $(this).attr("id").substr(1);

				var z = parseInt($(this).data("zone"));
				var s = $(this).data("index");

				// double click listener for admins to cancel reservations

				if($("#c"+ticket_id).hasClass("booked"))
					return;

				// add ticket
				if(!$("#c"+ticket_id).hasClass("reserved")){

					if(tickets_global.length>parseInt($(khl).data("ticketspbooking"))){
						alert($(khl).data("ajax_max_tickets"));
						return;
					}

					var ticket_text = parseInt(s)+1;
					var ticket_row = '', ticket_price = '';
					var zone_text = hall.areas[z].seats.title;

					if(hall.areas[z].seats.points[s].t)
						ticket_text = hall.areas[z].seats.points[s].t;
						
					if(hall.areas[z].seats.points[s].r)
						ticket_row = hall.areas[z].seats.points[s].r;

					if(hall.areas[z].seats.points[s].p)
						ticket_price = hall.areas[z].seats.points[s].p;

					if(ticket_row=='') ticket_row = zone_text
					tickets_global.push({zone_id: z, zone_text: zone_text, ticket_id: ticket_id, ticket_text: ticket_text, ticket_row: ticket_row, ticket_price: ticket_price });

				// remove ticket
				}else{

					$("#c"+ticket_id).removeClass("reserved");
					tickets_global = jQuery.grep(tickets_global, function(value) {
						return !(value.ticket_id == ticket_id);
					});
				}

				refreshSelectedTicket(tickets_global, hall, z, ticket_id);

				// mark reserved seats
				markBookings(hall, z);

				firstLoad = 50
			});

			$("#kp_image").animate({opacity: '100%'}, 300);

		},firstLoad);
	}

	// construct visual seat HTML code 
	function structSeat(hall, z, i, height, x, y){

		var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
		g.setAttribute('id', "dc"+i);
		g.setAttribute('data-index', i);

		var circle = document.createElementNS('http://www.w3.org/2000/svg', seatShape);
		circle.setAttribute('id', "c"+i+'z'+z);
		circle.setAttribute('class', "cr");
		circle.setAttribute('data-index', i);
		circle.setAttribute('data-zone', z);
		circle.setAttribute('style', 'opacity:'+(numOpacity/100)+';');

		switch(seatShape){

			case 'circle':
				circle.setAttribute('r', height/2);
				// set coordinates
				circle.setAttribute('cx', x);
				circle.setAttribute('cy', y);
			break;
			case 'rect':
				circle.setAttribute('width', height);
				circle.setAttribute('height', height);
				// set coordinates
				circle.setAttribute('x', x-height/2);
				circle.setAttribute('y', y-height/2);
			break;
		}

		var text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
		text.setAttribute('id', "t"+i+'z'+z);
		text.setAttribute('dy', ".3em");
		text.setAttribute('stroke-width', "0px");
		text.setAttribute('text-anchor', "middle");
		text.setAttribute('stroke', "#000");
		if(hideNumbers==1){ text.setAttribute('class', "tx dn"); }else{ text.setAttribute('class', "tx"); }
		text.setAttribute('data-index', i);
		text.setAttribute('data-zone', z);
		text.setAttribute('style', "font-size:"+snSize+"px");

		// set coordinates
		text.setAttribute('x', x);
		text.setAttribute('y', y);

		text.setAttribute('data-toggle', "popover");
		text.setAttribute('title', "Seat Settings");
		text.setAttribute('data-content', "test");

		text.innerHTML = i+1;

		// set custom assigned seat number
		if(hall.areas[z].seats.points[i].t) text.innerHTML = hall.areas[z].seats.points[i].t;
		
		g.appendChild(circle);
		g.appendChild(text);

		return {g:g, circle:circle, text:text};
	}

	function markBookings(hall, zone_id){

		// mark booked seats for current zone
		$(".cr").removeClass("booked");
		zone_id = current_zone_id;

		// switch layout rendering scenarious
		switch(renderType){

			// seat mode
			case 1:

				var cp = hall_js.areas.map(function(item, z) {

					// map seats
					var tws = 0;
					if (hall.areas[z].seats){
			
						// total seats per zone
						tws = hall.areas[z].seats.tws;
			
						var s = 0;
						while (s < tws){

							var ticket_id = s+'z'+z;
							if(reservations[z+'_'+ticket_id]){
		
								if(reservations[z+'_'+ticket_id]["user"]!=myticketUserId){
			
									// mark as booked visually
									$("#c"+ticket_id).addClass("booked");
									$("#t"+ticket_id).addClass("booked");
									
								}
							}
							s++;
						}

					}
				});

			break;

			// zone mode
			case 0:

				var tws = 0;
				if (hall.areas[zone_id])
				if (hall.areas[zone_id].seats){
					
					tws = hall.areas[zone_id].seats.tws;
					var i = 0;
					while (i < tws){
		
						var ticket_id = i+'z'+zone_id;
						if(reservations[zone_id+"_"+ticket_id]){
		
							if(reservations[zone_id+"_"+ticket_id]["user"]!=myticketUserId){
		
								// mark as booked visually. Ex id: 0_0z0
								$("#c"+i+"z"+zone_id).addClass("booked");
								$("#t"+i+"z"+zone_id).addClass("booked");
							}
						}
						i++;
					}
				}
		
				// mark booked and reserved zones if no free tickets left
				for (var i = 0; i < hall.areas.length; i++) {
		
					var tws = 0;
					if (hall.areas[i].seats){
						tws = hall.areas[i].seats.tws;
						var e = 0, ec = 0;
						while (e < tws){
		
							// bookings
							if(reservations[i+"_"+e])
								ec++;
		
							e++;
						}

						// reservation
						var reserved = jQuery.grep(tickets_global, function(value) {
							return value.zone_id == i
						});
		
						// mark booked zones
						if(ec==tws){ 

							$("#pl"+i).addClass("booked"); 
						}else{

							// mark reserved zones
							$("#pl"+i).removeClass("booked");
							if(reserved.length==tws){ $("#pl"+i).addClass("selected"); }else{ $("#pl"+i).removeClass("selected"); }
						}
					}
				}
			break;
		}
	}

	function refreshSelectedTicket(tickets, hall, index, ticket_id){

		createCookie("tickets", JSON.stringify(tickets),1);
		$(".selected_seats").html("");

		var kp_ticket_rows = '';
		var output = tickets.map(function(item) {

			var ticket_row = hall.areas[item.zone_id].seats.title;
			var ticket_price = (item.ticket_price)?item.ticket_price:$(khl).data('price');
			var ticket_id = item.ticket_id;
			var ticket_text = item.ticket_text;

			if(!hall.areas[item.zone_id].seats)
				return "";

			if(hall.areas[item.zone_id].seats.points[ticket_id]){

				// override seat text
				if(hall.areas[item.zone_id].seats.points[ticket_id].t)
					ticket_text = hall.areas[item.zone_id].seats.points[ticket_id].t;

				// override seat row
				if(hall.areas[item.zone_id].seats.points[ticket_id].r)
					ticket_row = hall.areas[item.zone_id].seats.points[ticket_id].r;

				// override seat price
				if(hall.areas[item.zone_id].seats.points[ticket_id].p)
					ticket_price = parseFloat(hall.areas[item.zone_id].seats.points[ticket_id].p);
			}

			kp_ticket_rows += '\
			<tr class="select-seat">\
				<td>'+ticket_text+' / <b>'+hall.areas[item.zone_id].seats.title+'</b></span>\
				<span class="m-row">'+ $(khl).data('row') + ' <b>'+ticket_row+'</b></span>\
				<span class="m-row">'+formatPrice(ticket_price)+' '+$(khl).data('perseat')+'</span>\
				</td>\
				<td>'+ticket_row+'</td>\
				<td>'+formatPrice(ticket_price)+' <span>'+$(khl).data('perseat')+'</span></td>\
				<td data-zone="'+item.zone_id+'" data-index="'+ticket_id+'" class="kp-rem-seat">&times;</td>\
			</tr>';

			$("#c"+ticket_id).addClass("reserved");
		});

		if(kp_ticket_rows==''){
			$(".kp-btn-reserve,.kp-table").fadeOut(0);
		}else{
			$(".kp-btn-reserve,.kp-table").fadeIn();
		}

		$(".selected_seats").html(output);
		if(output!=""){$(".sel_texts").fadeOut(0);}else{$(".sel_texts").fadeIn(0);}
		$(".kp-ticket-row").html(kp_ticket_rows);

		// refresh listeners
		$(".kp-rem-seat").on("click", function(){

			var indexx = $(this).data("index");
			var zone = $(this).data("zone");

			$("#c"+indexx).removeClass("reserved");
			tickets_global = jQuery.grep(tickets, function(value) {
				return !(value.ticket_id == indexx && value.zone_id == zone);
			});

			refreshSelectedTicket(tickets_global, hall, indexx, -1);
		}); 
	}

	// format price according to woo standards
	function formatPrice(price){

		var symb = $(khl).data('cur_symb');
		switch ( $(khl).data('cur_pos') ) {
			case 'left': return symb + price; break;
			case 'right': return price + symb; break;
			case 'left_space': return price + '&nbsp;' + symb; break;
			case 'right_space': return symb + '&nbsp;' + price; break;
		  }
	}

	function setBooking(seat_id, action) {

		// perform ajax request
	    $.ajax({
			type: 'POST',
			dataType: 'json',
			url: $(khl).data("ajax"),
			data: {
				'id': $(khl).data("id"),
				'seat_id': seat_id,
				'baction': action,
				'action': 'myticket_events_set_booking',
				'user_id': myticketUserId
			},
			beforeSend : function () {

			},
			success: function (data) {
				var $data = $(data);
				if ($data.length) {

					if(data.success){

						checkReservations();
					}else{
						
						alert("Can not save:" + data.reason);
					}
				}

			},
			error : function (jqXHR, textStatus, errorThrown) {

				alert($(khl).data('ajax_error'));  
			},
		});
	}

	var reservations = [];
	function setReservations() {

		// perform ajax request
	    $.ajax({
			type: 'POST',
			dataType: 'json',
			url: $(khl).data("ajax"),
			data: {
				'id': $(khl).data("id"),
				'action': 'myticket_events_set_reservations',
				'tickets': tickets_global,
				'user_id': myticketUserId
			},
			beforeSend : function () {

			},
			success: function (data) {

				var $data = $(data);
				if ($data.length) {

					if(data.success){
						
						// check if all reservations were successfull 
						if(data.notreserved){

							alert($(khl).data('ajax_booked'));

							for (var i = 0; i < data.notreserved.length; i++){
								tickets_global = jQuery.grep(tickets_global, function(value) {
									return !(value.zone_id +"_"+ value.ticket_id == data.notreserved[i]);
								});
							} 

							refreshSelectedTicket(tickets_global, hall_js, -1, -1);
							
							// immidiately refresh current list
							checkReservations();
						}else{

							// finalize ticket reservation
							// var href = $(khl).data('carturl')+'?quantity='+tickets_global.length+'&add-to-cart='+$(khl).data('id');
							var href = '?quantity='+tickets_global.length+'&add-to-cart='+$(khl).data('id');
							location.href = href;
						}

					}else{

						alert($(khl).data('ajax_error')+" "+(data.reason)?data.reason:"");  
					}

				}else{
		
				}
			},
			error : function (jqXHR, textStatus, errorThrown) {

				alert($(khl).data('ajax_error'));  
			},
		});
	}

	function checkReservations() {

	    //perform ajax request
	    $.ajax({
			type: 'POST',
			dataType: 'json',
			url: $(khl).data("ajax"),
			data: {
			'id': $(khl).data("id"),
			'action': 'myticket_events_get_reservations',
			'user_id': myticketUserId
			},
			beforeSend : function () {

			},
			success: function (data) {
				var $data = $(data);
				if ($data.length) {

					if(data.success){

						reservations = data.data;
						markBookings(hall_js, current_zone_id);

						// init seat click listeners after first load
						if(renderType==1 && firstLoad==60){ seatListeners(hall_js); }
					}
				
				} 
			},
			error : function (jqXHR, textStatus, errorThrown) {

			},
		});
		return false;
	}

	function makeid() {

		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for (var i = 0; i < 5; i++)
		  text += possible.charAt(Math.floor(Math.random() * possible.length));
	  
		return text;
	}

	function createCookie(name, value, days) {
		var expires;
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}

	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
		  var c = ca[i];
		  while (c.charAt(0) == ' ') {
			c = c.substring(1);
		  }
		  if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		  }
		}
		return "";
	}

});