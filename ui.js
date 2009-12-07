RazorUI = {};
RazorUI.init = function () {
	$(window).resize(RazorUI.fitToWindow);
	RazorUI.fitToWindow();

	$('.relative').toRelativeTime();

	LilinaAPI.call('feeds.getList', {}, RazorUI.populateFeedList);
	// We'll fix this hardcoded limit later.
	LilinaAPI.call('items.getList', {"limit": 20}, RazorUI.populateItemList);

	$('#items-list li a').live('click', RazorUI.handleItemClick);
};
RazorUI.fitToWindow = function () {
	$('#sidebar, #items-list, #item-view').css( {
		'height': $(window).height() - 51
	});
	$('#sidebar .item-list').css( {
		'height': $(window).height() - 84
	});
	$('#item-view').css( {
		'width': $(window).width() - 592
	});
	$('#item-content').css( {
		'height': $(window).height() - 137
	});
};
RazorUI.populateFeedList = function (list) {
	$('#feeds-list').empty();

	RazorUI.feeds = list;
	$.each(list, function (index, item) {
		var li = $('<li><a href="#"> <span /></a></li>');
		var a = $('a', li);
		var span = $('<span />');

		a.data('feed-id', item.id);
		//a.text( item.title.shorten(40)).attr('title', item.title);
		a.text( Razor.shortenString(item.name, 25) ).attr('title', item.name);
		span.addClass('delete');
		span.text('Delete');
		a.append(span);
		$('#feeds-list').append(li);
	});
};
RazorUI.populateItemList = function (list) {
	$('#items-list ol').empty();

	index = 0;
	$.each(list, function (id, item) {
		var li = $('<li><a href="#"><span class="item-title" /> <span class="sep">from</span> <span class="item-source" /> <span class="sep">at</span> <span class="item-date" /></a></li>');
		var a = $('a', li);

		a.data('item-id', id).attr('title', item.title);
		//$('.item-title', li).text( item.title.shorten(40) );
		$('.item-title', li).text( Razor.shortenString(item.title, 40) );
		var feed = RazorUI.feeds[item.feed_id];
		$('.item-source', li).text(feed.name);

		var date = new Date(item.timestamp * 1000);
		$('.item-date', li).text(date.toUTCString());

		if(index % 2) {
			li.addClass('alt');
		}

		$('#items-list ol').append(li);
		index++;
	});
	$('#items-list .item-date').toRelativeTime();
};
RazorUI.populateItemView = function (item) {
	$('#item-view').empty();
	var basics = $('<div id="item"><div id="heading"><h2 class="item-title"><a /></h2><p class="item-meta"><span class="item-source">From <a /></span>. <span class="item-date">Posted <abbr /></span></p></div><div id="item-content" /></div>');
	var feed = RazorUI.feeds[item.feed_id];
	var date = new Date(item.timestamp * 1000);

	$('.item-title a', basics).text(item.title).attr('href', item.permalink);
	$('.item-source a', basics).text(feed.name).attr('href', feed.url).addClass('external');
	$('.item-date abbr', basics).text(date.toUTCString()).attr('title', date.toUTCString()).toRelativeTime();
	$('#item-content', basics).html(item.content);

	$('#item-view').html(basics);
	RazorUI.fitToWindow();
};
RazorUI.handleItemClick = function () {
	var id = $(this).data('item-id');
	var loading = $('<div class="loading">Loading...</div>');
	$('#item-view').html(loading);
	LilinaAPI.call('items.get', {'id': id}, RazorUI.populateItemView);
};