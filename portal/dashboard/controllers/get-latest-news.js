function getLatestDashboardNews(){
//ajax call
$.ajax({
    url: "controllers/get-latest-news.php",
    type: "POST",
    data: {
        ajax_call : 1

    },
    success: function (result) {

        //clear #dashboard_latest_news_main_show
        $("#dashboard_latest_news_main_show").html("");

        //add result to #dashboard_latest_news_main_show
        $("#dashboard_latest_news_main_show").html(result);

        getLatestDashboardNewsPair();
    }
});


}


function getLatestDashboardNewsPair(){

    //call to getLatestDashboardNews after a delay of 2 seconds
    setTimeout(function(){
        getLatestDashboardNews();
    }
    ,30000);
}