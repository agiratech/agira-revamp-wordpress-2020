jQuery(document).ready(function($){
    var app_job_id =$('#app_job_id').val();
    var ajaxUrl = ag_ajax.ajaxurl;
    var timezone_offset_minutes = new Date().getTimezoneOffset();
    timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
    $.post(
        ajaxUrl, 
        {action:'get_tzoffset',tzoffset: timezone_offset_minutes}, 
        function(res) {           
            var data = res.data;
            $('#ag_candidate_form').find('#wpbjp_user_tz').val(data.user_tz);
     });   
    if (app_job_id == 1) {
       $('#app-job-others').slideDown({
            opacity: "show"
        }, "slow");       
        $('#app_other_job').attr('required', true);
        $('#app_other_job').attr('data-required-error', "If other, Please enter the details" );
    } else {
        $('#app_other_job').attr('required', false)
        $('#app_other_job').attr('data-required-error', "" ); 
        $('#app-job-others').hide();
    }

   $('#cand_from').on('change', function() {
       $('#applyformsubmit').attr('disabled', false);
        var cand_from =$(this).val();
        if (cand_from == 7) {
            $('#cand-from-others').slideDown({
                opacity: "show"
            }, "slow");           
            $('#cand_from_other').attr('required', true);
            $('#cand_from_other').attr('data-required-error', "If other, Please enter the details" );        
        } else {
            $('#cand_from_other').attr('required', false)
            $('#cand_from_other').attr('data-required-error', "" ); 
            $('#cand-from-others').hide();    

        }
    });

   $('#ag_candidate_form').validator().on('submit', function(e) {    
        //e.preventDefault(e);               
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            var form =$('#ag_candidate_form')[0];
            var formData = new FormData(form);
            e.preventDefault();
            var $form =$(e.target);
            //var formData = new FormData($form);
            var bv = $form.data('bootstrapValidator');
            var url = ajaxUrl;
            /*$.post(url, formData, function(res) {
                console.log(res);
                //$("#response_area").html(res.data);
            });*/
           $.ajax({
                url: url,
                method: "post",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    var success = response.success;
                    var data = response.data;                               
                    var job_id = data.data.job_id;
                    var applied_already = false;
                   $("div[id^='successMsg']").html('');
                   $("div[id^='errorMsg']").html('');
                    if (success) {
                       $("#successMsg").css({
                            "display": "block"
                        });
                       $("#errorMsg").css({
                            "display": "none"
                        });
                       $("#successMsg").html(data.data.message);  
                       $('#ag_candidate_form').trigger("reset");                    
                    } else {
                        
                       $("#successMsg").css({
                            "display": "none"
                        });
                       $("#errorMsg").css({
                            "display": "block"
                        });                       
                       $.each(data.data.errors, function(index, value) {
                            if(index ==='cand_already_applied_error'){
                                applied_already = true; 
                            }
                           $("#errorMsg").append(value + '<br>');
                        });  
                        if(applied_already)  {
                            $('#ag_candidate_form').trigger("reset"); 
                        }                   
                    }
                   
                },
                error: function(e) {
                    //error
                }
            });
        }
    });    
  
    $("#accordion > div > .panel-heading").click(function() {
        if (false == jQuery(this).next().is(':visible')) {
            $('#accordion div.jobdetails').slideUp(300);
        }
        $(this).next().slideToggle(300);
    });

    $(".accordion_head").click(function() {
        if ($('.accordion_body').is(':visible')) {
            $(".accordion_body").slideUp(300);
            $(".plusminus").text('+');
        }
        if ($(this).next(".accordion_body").is(':visible')) {
            $(this).next(".accordion_body").slideUp(300);
            $(this).find(".panel-title").children('.plusminus').text('+');
        } else {
            $(this).next(".accordion_body").slideDown(300);
            $(this).find(".panel-title").children('.plusminus').text('-');
        }
      });

});