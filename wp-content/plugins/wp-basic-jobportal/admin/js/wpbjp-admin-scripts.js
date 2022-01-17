jQuery(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        jQuery('#reportdaterange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        var oldURL  = window.location.href;
        var start_date = start.format('YYYY-MM-DD');
        var end_date = end.format('YYYY-MM-DD');
        var url = new URL(oldURL);
        var search_params = url.searchParams;
        
        search_params.set('date_start', start_date);
        search_params.set('date_end', end_date);
        
        // change the search property of the main url
        url.search = search_params.toString();
        
        // the new url string
        var new_url = url.toString();
        if (history.pushState) {
            window.history.pushState({path:new_url},'',new_url);            
        }
        location.reload();      
    }

    jQuery('#reportdaterange').daterangepicker({
        startDate: start,
        endDate: end,      
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    jQuery('#reportdaterange').on('change',function(){
        //alert('changed');        
        cb(start, end);              
    });
    //cb(start, end);  
});