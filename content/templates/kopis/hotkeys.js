function init_keys() {
$(document).keypress(function(data) {
 switch(data.charCode) {
   case 63: console.log('help');
     break;
   case 106:
     if(kopis.current_article_pos < kopis.max_article_pos) {
       $('div.article:nth-child(' + kopis.current_article_pos + ')').trigger('collapse');
       kopis.current_article_pos++;
       $('div.article:nth-child(' + kopis.current_article_pos + ')').trigger('expand');
       $.scrollTo($('div.article:nth-child(' + kopis.current_article_pos + ')'));
     }
     break;
   case 107:
     if(kopis.current_article_pos >= kopis.min_article_pos) {
       $('div.article:nth-child(' + kopis.current_article_pos + ')').trigger('collapse');
       kopis.current_article_pos--;
       $('div.article:nth-child(' + kopis.current_article_pos + ')').trigger('expand');
       $.scrollTo($('div.article:nth-child(' + kopis.current_article_pos + ')'));
     }
     break;
   default:
     return true;
 }
});

kopis.max_article_pos = $('div.article').size()
}

kopis = {}
kopis.current_article_pos = 1;
kopis.min_article_pos = 1;

