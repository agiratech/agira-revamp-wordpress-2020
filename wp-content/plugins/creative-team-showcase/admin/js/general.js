(function($) {
  // "use strict";
  render_color_picker();

  $.fn.ctshowcaseGetSelector = function() {
    var selector =
      typeof $(this).attr("id") !== "undefined" || $(this).attr("id") !== null
        ? "#" + $(this).attr("id")
        : "." + $(this).attr("class");
    return selector;
  };
  $.fn.ctshowcaseToggleCheckboxHandler = function(
    itemsToBeAffected,
    checkStatus
  ) {
    if (checkStatus == "checked") {
      var changeCondition = $(this).is(":checked");
    } else {
      var changeCondition = !$(this).is(":checked");
    }
    if (changeCondition) {
      $(itemsToBeAffected)
        .show()
        .addClass("visible")
        .removeClass("hidden");
    } else {
      $(itemsToBeAffected)
        .hide()
        .addClass("hidden")
        .removeClass("visible");
    }
  };
  $.fn.ctshowcaseToggleSelectHandler = function(
    value,
    itemsToBeHidden,
    itemsToBeShown
  ) {
    console.log(value);
    if ($(this).val() == value) {
      if (itemsToBeHidden) {
        $(itemsToBeHidden)
          .hide()
          .addClass("hidden")
          .removeClass("visible");
      }
      if (itemsToBeShown) {
        $(itemsToBeShown)
          .show()
          .addClass("visible")
          .removeClass("hidden");
      }
      $(".visible.normal-grid-display-social-icons input").trigger("change");
      $(".normal-grid-display-circle-bar.visible input").trigger("change");
    }
  };
  $.fn.ctshowcaseToggleCheckboxController = function(
    itemsToBeAffected,
    checkStatus
  ) {
    var $checkStatus = checkStatus ? checkStatus : "checked";
    $(this).ctshowcaseToggleCheckboxHandler(itemsToBeAffected, $checkStatus);
    $(document).on("change", $(this).ctshowcaseGetSelector(), function() {
      $(this).ctshowcaseToggleCheckboxHandler(itemsToBeAffected, $checkStatus);
    });
  };
  $.fn.ctshowcaseToggleSelectController = function(
    value,
    itemsToBeShown,
    itemsToBeHidden
  ) {
    $(this).ctshowcaseToggleSelectHandler(
      value,
      itemsToBeShown,
      itemsToBeHidden
    );
    $("body").on("change", $(this).ctshowcaseGetSelector(), function() {
      $(this).ctshowcaseToggleSelectHandler(
        value,
        itemsToBeShown,
        itemsToBeHidden
      );
    });
  };

  if (admin_ajax.post_status == "publish") {
    $(".post-type-ctshowcase_shortcode #post-body #titlediv .inside").append(
      '<p id="cts-shortcode"> Copy this shortcode and paste it in your page or post </p> <div class="shortcode-display">[' +
        admin_ajax.plugin_name +
        ' id="' +
        admin_ajax.id +
        '" title="' +
        admin_ajax.title +
        '"]</div>'
    );
  }
  $(".select_ids , .select_groups").select2();

  $("#wave_display_heading_input").ctshowcaseToggleCheckboxController(
    ".wave-heading-color , .wave-heading-title"
  );
  $("#wave_display_subheading").ctshowcaseToggleCheckboxController(
    ".wave-subheading-title, .wave-subheading-color"
  );
  $("#wave_image_clickable").ctshowcaseToggleCheckboxController(
    ".wave-show-link-options"
  );
  $("#hex_enable_filter").ctshowcaseToggleCheckboxController(
    ".hex-filter-inactive-font-color , .hex-filter-inactive-link-bg-color, .hex-filter-active-link-font-color, .hex-filter-active-link-bg-color"
  );
  $("#normalGrid_enable_filter").ctshowcaseToggleCheckboxController(
    ".normal-grid-filter-inactive-font-color , .normal-grid-filter-inactive-link-bg-color, .normal-grid-filter-active-link-font-color, .normal-grid-filter-active-link-bg-color"
  );
  $(".slider-display-social-icons input").ctshowcaseToggleCheckboxController(
    ".slider-social-icons-color , .slider-social-icons-font-size"
  );
  $(
    "#ctshowcase_override_default_theme_color"
  ).ctshowcaseToggleCheckboxController(".ctshowcase_scheme_color");
  $("#mosaic_display_social_icons").ctshowcaseToggleCheckboxController(
    ".mosaic-social-icons-color , .mosaic-social-icons-font-size"
  );
  $("#inlinePreview_display_heading").ctshowcaseToggleCheckboxController(
    ".inline-preview-heading , .inline-preview-heading-font-size, .inline-preview-heading-color"
  );

  // Layout
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "wave",
    ".layout-settings",
    ".wave-settings , .advanced-modal-settings ,.entry-link"
  );
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "hex-grid",
    ".layout-settings",
    ".hex-settings , .advanced-modal-settings, .entry-link"
  );
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "inline-preview",
    ".layout-settings, .advanced-modal-settings , .entry-link",
    ".inline-preview-settings"
  );
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "mosaic",
    ".layout-settings",
    ".mosaic-settings , .advanced-modal-settings , .entry-link"
  );
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "normal-grid",
    ".layout-settings",
    ".normal-grid-settings , .advanced-modal-settings,.entry-link"
  );
  $("#shortcode_layout").ctshowcaseToggleSelectController(
    "slider",
    ".layout-settings",
    ".slider-settings, .advanced-modal-settings, .entry-link"
  );

  // Entry link
  $(".entry-link select").ctshowcaseToggleSelectController(
    "inactive",
    ".advanced-modal-settings-wrapper, .mosaic-read-more-settings",
    null
  );
  $(".entry-link select").ctshowcaseToggleSelectController(
    "external-url",
    ".advanced-modal-settings-wrapper",
    null
  );
  $(".entry-link select").ctshowcaseToggleSelectController(
    "left-modal",
    null,
    ".advanced-modal-settings-wrapper, .mosaic-read-more-settings"
  );
  $(".entry-link select").ctshowcaseToggleSelectController(
    "right-modal",
    null,
    ".advanced-modal-settings-wrapper, .mosaic-read-more-settings"
  );

  $(".order-by select").ctshowcaseToggleSelectController(
    "rand",
    ".order.general-settings",
    null
  );

  $(".normal-grid-style select").ctshowcaseToggleSelectController(
    "style-1",
    ".normal-grid-team-member-job-title-bg-color , .normal-grid-team-member-name-bg-color, .normal-grid-info-icon-bg-color, .normal-grid-info-icon-color,  .normal-grid-circle-bar-filling-color, .normal-grid-circle-bar-background-color, .normal-grid-display-circle-bar",
    ".normal-grid-display-social-icons"
  );
  $(".normal-grid-style select").ctshowcaseToggleSelectController(
    "style-2",
    ".normal-grid-display-social-icons, .normal-grid-social-icons-color , .normalGrid-social-icons-font-size ",
    ".normal-grid-team-member-job-title-bg-color , .normal-grid-team-member-name-bg-color, .normal-grid-info-icon-bg-color, .normal-grid-info-icon-color,    .normal-grid-display-circle-bar"
  );
  $(".normal-grid-style select").ctshowcaseToggleSelectController(
    "style-3",
    ".normal-grid-display-social-icons, .normal-grid-social-icons-color , .normalGrid-social-icons-font-size ",
    ".normal-grid-team-member-job-title-bg-color , .normal-grid-team-member-name-bg-color, .normal-grid-info-icon-bg-color, .normal-grid-info-icon-color,    .normal-grid-display-circle-bar"
  );

  $(
    ".normal-grid-display-social-icons.visible input"
  ).ctshowcaseToggleCheckboxController(
    ".normal-grid-social-icons-color , .normalGrid-social-icons-font-size"
  );
  $(
    ".normal-grid-display-circle-bar.visible input"
  ).ctshowcaseToggleCheckboxController(
    ".normal-grid-circle-bar-filling-color, .normal-grid-circle-bar-background-color"
  );
  $(
    ".mosaic-display-read-more-link.visible #mosaic_display_read_more_link"
  ).ctshowcaseToggleCheckboxController(
    ".mosaic-read-more-text , .mosaic-read-more-color"
  );

  $(".sortable-team-row").sortable();

  $(document).on("click", ".cancel-team-ordering", function() {
    location.reload();
  });
  $(document).on("change", ".order-by select", function() {
    if ($(this).val() != "rand") {
      $(".order.general-settings").show();
    }
  });

  $(document).on("click", ".save-team-ordering", function() {
    $(".sortable-team-row").sortable();
    var order = jQuery(".sortable-team-row").sortable("toArray");
    $.ajax({
      url: admin_ajax.ajaxurl,
      data: {
        ordering: order,
        team_no: $(".sortable-team-row ").data("team_no"),
        action: "save_team_sorting"
      },
      success: function() {
        location.reload();
      },
      error: function() {
        console.log("Error");
      }
    });
  });
  $(document).on("click", ".add-new-skill-btn", function(e) {
    e.preventDefault();
    $(".skills-table").append(admin_ajax.skill_row);
    reorder_skills_table();
    render_color_picker();
  });
  $(document).on("input", ".skill-level", function() {
    $(this)
      .closest("td")
      .find(".skillLevelOutput")
      .val($(this).val());
  });
  $(document).on("click", ".delete-skill", function(e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this skill?")) {
      $(this)
        .closest("tr")
        .remove();
      reorder_skills_table();
    }
  });
  reorder_skills_table();

  $(document).on(
    "click",
    ".advanced-customization-for-modal, .advanced-customization-for-member-details-col",
    function(e) {
      e.preventDefault();
      var state = $(this).data("state");

      if (!state) {
        $(this)
          .siblings(".advanced-customization-settings")
          .slideDown();
        $(this)
          .find("span")
          .removeClass("dashicons dashicons-arrow-down-alt2")
          .addClass("dashicons dashicons-arrow-up-alt2");
        $(this).data("state", "1");
      } else {
        $(this)
          .siblings(".advanced-customization-settings")
          .slideUp();
        $(this)
          .find("span")
          .removeClass("dashicons dashicons-arrow-up-alt2")
          .addClass("dashicons dashicons-arrow-down-alt2");
        $(this).data("state", 0);
      }
    }
  );

  function reorder_skills_table() {
    var counter = 1;
    jQuery(".skills-counter").each(function() {
      jQuery(this).text(counter);
      counter++;
    });
    counter = 0;
    jQuery(".skill-name").each(function() {
      jQuery(this).attr(
        "name",
        "ctshowcase_skills[" + counter + "][skill_name]"
      );
      counter++;
    });
    counter = 0;
    jQuery(".skill-level").each(function() {
      jQuery(this).attr(
        "name",
        "ctshowcase_skills[" + counter + "][skill_level]"
      );
      counter++;
    });
    counter = 0;
    jQuery(".skill-bar-color").each(function() {
      jQuery(this).attr(
        "name",
        "ctshowcase_skills[" + counter + "][skill_bar_color]"
      );
      counter++;
    });
  }
  function render_color_picker() {
    jQuery(".ctshowcase-color-picker").wpColorPicker();
  }
})(jQuery);
