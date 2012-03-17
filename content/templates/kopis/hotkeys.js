function init_keys() {
$(document).keypress(function(data) {
 switch(data.charCode) {
   case 63: console.log('help');
     break;
   case 106:
     if(kopis.current_article_pos <= kopis.max_article_pos) $.scrollTo($('div#articles h1')[kopis.current_article_pos++]);
     break;
   case 107:
     if(kopis.current_article_pos > kopis.min_article_pos) kopis.current_article_pos--;
     $.scrollTo($('div#articles h1')[kopis.current_article_pos]);
     break;
   default:
     return true;
 }
});

kopis.max_article_pos = $('div#articles h1').size()
}

kopis = {}
kopis.current_article_pos = 0;
kopis.min_article_pos = 0;

