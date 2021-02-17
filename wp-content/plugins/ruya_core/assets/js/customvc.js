// check taxonomy 
function changeCategory(obj){
    var $this = jQuery(obj),
        $input = $this.parents(".wpb_el_type_mo_taxonomy").find(".mo_taxonomy_field"),
        arr = $input.val().split(",");
	if ($this.is(":checked")) {
        arr.push($this.val());
        var emptyKey = arr.indexOf("");
        if (emptyKey > -1) {
            arr.splice(emptyKey, 1);
        }
    } else {
        var foundKey = arr.indexOf($this.val());
        if (foundKey > -1) {
            arr.splice(foundKey, 1);
        }
    }
    $input.val(arr.join(","));
}

(function($) {
    "use strict";
    $(document).ready(function($) {
        $('.post_type').change(function(){
        })
    });
})(jQuery);

// select_preview
! function($) {
        vc.atts.select_preview = {
            render: function(a, e) {
                return e
            },
            init: function(a, e) {
                e.find(".wpb_vc_param_value").imagepicker({
                    show_label: !0
                })
            },
            defaults: function(a) {
                var e;
                return _.isArray(a.value) || _.isString(a.value) ? _.isArray(a.value) ? (e = a.value[0].value, _.isArray(e) && e.length ? e[0].value : e) : "" : (e = _.values(a.value)[0].value, e.label ? e.value : e)
            }
        }
}(jQuery);

// slider
! function($) {
	vc.atts.mo_slider = {
        render: function(a, e) {
            return e
        },
        init: function(a, e) {
            var t = e.find("input.wpb_vc_param_value").val(),
                i = e.find(".mo-handle");
            e.find(".mo-slider").slider({
                min: a.min,
                max: a.max,
                step: a.step,
                value: t,
                create: function() {
                    i.text($(this).slider("value"))
                },
                slide: function(a, e) {
                    i.text(e.value)
                },
                change: function(a, t) {
                    e.find("input.wpb_vc_param_value").val(t.value)
                }
            })
        }
    }
}(jQuery);
