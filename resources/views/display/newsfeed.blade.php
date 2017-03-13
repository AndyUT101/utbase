<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>newsfeed</title>
<script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
<script>
    jQuery.browser = {};
(function () {

    jQuery.browser.msie = false;
    jQuery.browser.version = 0;

    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
</script>
<script src="{{ url('js/jquery.jfeed.js') }}"></script>
<style>
@import  url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
* {
    font-family: 'Noto Sans TC', sans-serif; font-size: 50px;
}

p {
    margin: 0; padding: 0;
}

div.newsfeed {
    width: 1920px;
    height: 126px;
    line-height: 120px;
    position: relative;
    background-image: url("{{ url('images/bg/newsfeed.jpg') }}");
}


div.newsfeed div#marquee {
    margin-bottom: 40px;
    overflow: hidden;
    height: 80px;
    white-space: nowrap;
}
</style>
<script>
// <--- Init data object--->

var updatefreq = 10000;
var feedlength = 0;
var currentread = 0;
var width_start = 1920;
var rthk_news_xml = "http://rthk9.rthk.hk/rthk/news/rss/c_expressnews_clocal.xml";
var xml_getstatus = 0;
// End <--- Init data object--->

$(document).ready(function(){

    !function(a){a.fn.marquee=function(b){function e(a,b,c){var d=c.behavior,e=c.width,f=c.dir,g=0;return g="alternate"==d?1==a?b[c.widthAxis]-2*e:e:"slide"==d?a==-1?f==-1?b[c.widthAxis]:e:f==-1?b[c.widthAxis]-2*e:0:a==-1?b[c.widthAxis]:0}function f(){for(var b=c.length,d=null,g=null,h={},i=[],j=!1;b--;)d=c[b],g=a(d),h=g.data("marqueeState"),g.data("paused")!==!0?(d[h.axis]+=h.scrollamount*h.dir,j=h.dir==-1?d[h.axis]<=e(h.dir*-1,d,h):d[h.axis]>=e(h.dir*-1,d,h),"scroll"==h.behavior&&h.last==d[h.axis]||"alternate"==h.behavior&&j&&h.last!=-1||"slide"==h.behavior&&j&&h.last!=-1?("alternate"==h.behavior&&(h.dir*=-1),h.last=-1,g.trigger("stop"),h.loops--,0===h.loops?("slide"!=h.behavior?d[h.axis]=e(h.dir,d,h):d[h.axis]=e(h.dir*-1,d,h),g.trigger("end")):(i.push(d),g.trigger("start"),d[h.axis]=e(h.dir,d,h))):i.push(d),h.last=d[h.axis],g.data("marqueeState",h)):i.push(d);c=i,c.length&&setTimeout(f,25)}var c=[],d=this.length;return this.each(function(g){var h=a(this),i=h.attr("width")||h.width(),j=h.attr("height")||h.height(),k=h.after("<div "+(b?'class="'+b+'" ':"")+'style="display: block-inline; width: '+i+"px; height: "+j+'px; overflow: hidden;"><div style="float: left; white-space: nowrap;">'+h.html()+"</div></div>").next(),l=k.get(0),n=(h.attr("direction")||"left").toLowerCase(),o={dir:/down|right/.test(n)?-1:1,axis:/left|right/.test(n)?"scrollLeft":"scrollTop",widthAxis:/left|right/.test(n)?"scrollWidth":"scrollHeight",last:-1,loops:h.attr("loop")||-1,scrollamount:h.attr("scrollamount")||this.scrollAmount||2,behavior:(h.attr("behavior")||"scroll").toLowerCase(),width:/left|right/.test(n)?i:j};h.attr("loop")==-1&&"slide"==o.behavior&&(o.loops=1),h.remove(),/left|right/.test(n)?k.find("> div").css("padding","0 "+i+"px"):k.find("> div").css("padding",j+"px 0"),k.bind("stop",function(){k.data("paused",!0)}).bind("pause",function(){k.data("paused",!0)}).bind("start",function(){k.data("paused",!1)}).bind("unpause",function(){k.data("paused",!1)}).data("marqueeState",o),c.push(l),l[o.axis]=e(o.dir,l,o),k.trigger("start"),g+1==d&&f()}),a(c)}}(jQuery);

var feedstring = "";

function refreshFeed(){
    $('marquee').fadeOut();
    updateFeed();
}

function updateFeed(){
 jQuery.getFeed({
   url: rthk_news_xml,
   success: function(feed) {
    xml_getstatus = 1;

     feed = feed;
     feedlength = feed['items'].length;

     for (var i = 0; i < feedlength; i++){
        if (i == 0) feedstring = "";

        feedstring += feed['items'][i]['title'] + " (" + 
            feed['items'][i]['updated'].substring(feed['items'][i]['updated'].length-14, feed['items'][i]['updated'].length-9) + ")";
        feedstring += "　　　"; 
     }

     $('.newsfeed').html('<marquee behavior="scroll" scrollamount="4" direction="left" width="' + width_start + '"></marquee>');
     $('marquee').text(feedstring);
     $('marquee').marquee();
   }
 });
 var timeout = setTimeout(refreshFeed, xml_getstatus == 0 ? 10000 : updatefreq);
}

updateFeed();
});
</script>
</head>

<body>
	<div class="newsfeed">
		<div class="marquee">
			<div style="float: left; white-space: nowrap; padding: 0px 600px; font-size: 50px;">
            <span id="content"></span>
            </div>
		</div>
	</div>
</body>

</html>
