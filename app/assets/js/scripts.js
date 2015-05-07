/**
 * Created by oshry on 4/11/15.
 */
var Search = Search || {};
Search.Contacts = function(){
    function init(){
        var api_url = "../";
        $.ajax({
            url:api_url+"src/http/Users/Upcoming",
            dataType: "json",
            success: function(res){
                var tmpl = $("#bday_matches_tmpl").html();
                var html = Mustache.to_html(tmpl, res);
                $("#bdays").html(html);
            }
        });
    }
    function search($this){
        var query = $this.value;

        var data = {query: query};
        var api_url = "../";
        $.ajax({
            url:api_url+"src/http/Users/Search",
            data: data,
            type: "post",
            dataType: "json",
            success: function(res){
                var tmpl = $("#name_matches_tmpl").html();
                var html = Mustache.to_html(tmpl, res);
                $("#search_results").html(html);
            }
        });
    }
    return{
        Init: init,
        Search: search
    }
}(jQuery);
