jQuery(document).ready(function($) {
  var windowWidth = $(window).outerWidth();
  var filteredTeamMembers = [];
  var selection = "all";
  var running = false;
  var elemHeight = "";
  $(".ctshowcase-layout.with-filter").each(function() {
    var existingGroups = [];
    $(this).find(".ctshowcase-team-member").each(function() {
      var dataString = $(this).data("groups").toString();
      var dataArray = dataString.split(",");
      for (var i = 0; i < dataArray.length; i++) {
        if (dataArray[i]) {
          existingGroups.push(dataArray[i]);
        }
      }
    });
    $(this).find(".ctshowcase-group-buttons a").each(function() {
      if ($(this).data("group").toString() != "all") {
        if ($.inArray($(this).data("group").toString(), existingGroups) <= -1) {
          $(this).hide();
        }
      }
    });
  });

  function getTeamMemberPositions(layout) {
    var allTeamPositions = [];
    layout.find(".ctshowcase-team-member").each(function() {
      allTeamPositions.push($(this).offset());
    });
    layout.attr("all-positions", JSON.stringify(allTeamPositions));
  }
  window.setTimeout(function() {
    $(".ctshowcase-layout.with-filter").each(function() {
      getTeamMemberPositions($(this));
    });
    $(".ctshowcase-layout.with-filter .all").trigger("click");
  }, 400);
  function resizedw() {}
  $(window).on("resize", function(e) {
    if ($(window).outerWidth() != windowWidth) {
      windowWidth = $(window).outerWidth();
      $(
        ".ctshowcase-layout.with-filter .ctshowcase-team-member-wrapper"
      ).addClass("no-transition");
      $(".ctshowcase-layout.with-filter .ctshowcase-team-member").addClass(
        "no-transition"
      );
      $(".ctshowcase-layout.with-filter .ctshowcase-team-member-wrapper").css({
        transform: "scale(0)",
        opacity: 0
      });
      $(".ctshowcase-layout.with-filter .ctshowcase-team-member").css(
        "transform",
        "translate3d(0,0,0)"
      );
      $(".ctshowcase-layout.with-filter").css("height", "auto");
      $(".ctshowcase-layout.with-filter").each(function() {
        var $thisLayout = $(this);
        getTeamMemberPositions($thisLayout);
        buildGrid($thisLayout.find(".ctshowcase-team-member.show"), false);
      });
    }
  });
  $(
    ".ctshowcase-layout.with-filter .ctshowcase-group-buttons a"
  ).on("click", function(e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      return;
    }
    $(this)
      .closest(".ctshowcase-layout.with-filter")
      .find(".ctshowcase-group-buttons a")
      .each(function() {
        $(this).removeClass("active");
        $(this).css({
          background: $(this)
            .closest(".ctshowcase-group-buttons")
            .data("filter_inactive_link_bg_color"),
          color: $(this)
            .closest(".ctshowcase-group-buttons")
            .data("filter_inactive_link_font_color")
        });
      });
    $(this).addClass("active");
    $(this).css({
      background: $(this)
        .closest(".ctshowcase-group-buttons")
        .data("filter_active_link_bg_color"),
      color: $(this)
        .closest(".ctshowcase-group-buttons")
        .data("filter_active_link_font_color")
    });
    var teamMembers = $(this)
      .closest(".ctshowcase-layout.with-filter")
      .find(".ctshowcase-team-member");
    if (!running) {
      running = true;
      selection = $(this).data("group").toString();
      filteredTeamMembers = [];
      for (i = 0; i < teamMembers.length; i++) {
        var teamMember = teamMembers[i];
        var dataString = $(teamMember).data("groups").toString();
        var dataArray = dataString.split(",");
        if (selection === "all") {
          if ($(teamMember).hasClass("show")) {
            $(teamMember).addClass("already-shown");
          } else {
            $(teamMember).addClass("show");
          }
          filteredTeamMembers.push(teamMember);
        } else {
          if ($.inArray(selection, dataArray) > -1) {
            if ($(teamMember).hasClass("show")) {
              $(teamMember).addClass("already-shown");
            } else {
              $(teamMember).addClass("show");
            }
            filteredTeamMembers.push(teamMember);
          } else {
            $(teamMember).removeClass("show already-shown");
          }
        }
      }
      buildGrid(filteredTeamMembers, true);
    }
  });
  function buildGrid(filteredTeamMembers, enableTransition) {
    var selectedLayout = $(filteredTeamMembers).closest(
      ".ctshowcase-layout.with-filter"
    );
    var allTeamPositions = JSON.parse(selectedLayout.attr("all-positions"));
    selectedLayout.css("height", "auto");
    selectedLayout.find(".ctshowcase-team-member").each(function() {
      if (!$(this).hasClass("show")) {
        if (!enableTransition) {
          $(this).addClass("no-transition");
        } else {
          $(this).removeClass("no-transition");
        }
        $(this).find(".ctshowcase-team-member-wrapper").css({
          transform: "scale(0)",
          "-ms-transform": " scale(0)",
          "-webkit-transform": "scale(0)",
          opacity: 0
        });
      }
    });
    var counter = 0;
    if (filteredTeamMembers && filteredTeamMembers.length > 0) {
      $(filteredTeamMembers).each(function() {
        var index = selectedLayout.find(".ctshowcase-team-member").index(this);
        var dx = allTeamPositions[counter].left - allTeamPositions[index].left;
        var dy = allTeamPositions[counter].top - allTeamPositions[index].top;
        if (!enableTransition) {
          $(this).addClass("no-transition");
        } else {
          $(this).removeClass("no-transition");
        }
        $(this).css({
          transform: "translate3d(" + dx + "px ," + dy + "px ,0)",
          "-ms-transform": "translate3d(" + dx + "px ," + dy + "px ,0)",
          "-webkit-transform": "translate3d(" + dx + "px ," + dy + "px ,0 )"
        });
        $(this).find(".ctshowcase-team-member-wrapper").css({
          transform: "scale(1)",
          "-ms-transform": "scale(1)",
          "-webkit-transform": "scale(1)",
          opacity: 1
        });

        counter++;
      });
    }
    var teamLength = allTeamPositions.length;
    var filteredTeamLength = filteredTeamMembers.length;
    var heightChange =
      allTeamPositions[teamLength - 1].top -
      allTeamPositions[filteredTeamLength - 1].top;
    var layoutHeight = selectedLayout.outerHeight();
    //            selectedLayout.animate({'height': (layoutHeight - heightChange)}, 400);
    if (selection == "all") {
      selectedLayout.css("height", "auto");
    } else {
      selectedLayout.css("height", layoutHeight - heightChange);
    }
    running = false;
    counter = 0;
  }
});
