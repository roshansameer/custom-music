/**
 * Custom JS
 * global custom_params
 */
(function ($) {
  var Custom = {
    /**
     * Start the engine.
     *
     */
    init: function () {
      Custom.bindUIActions();
    },

    /**
     * Element bindings.
     *
     */
    bindUIActions: function () {
      $(document).on("click", ".nav-pills .nav-link", function (e) {
        Custom.categorySearch(this, e);
      });
      $(document).on("click", ".menu-item-has-children > a", function (e) {
        Custom.toggleClass(this, e);
      });
      $(document).on("change", "#custom_tag_filter", function (e) {
        Custom.categorySearch(this, e);
      });
    },

    categorySearch: function (el, e) {
      e.preventDefault();
      var $this = $(el);
      $this.siblings().removeClass("active");
      $this.addClass("active");
      var term_id = $(".nav-pills .nav-link.active").data("term_id"),
        tag = $("#custom_tag_filter").val();

      var data = {
        action: "custom_cat_search",
        term_id: term_id,
        tag: tag,
        security: custom_params.ajax_nonce,
      };

      $.ajax({
        url: custom_params.ajax_url,
        data: data,
        type: "POST",
        success: function (response) {
          $(".category_filter_container").html(response.data.posts);
        },
      });
    },
    toggleClass: function (el, e) {
      e.preventDefault();
      var $this = $(el);
      $this.parent().toggleClass("test_class");
    },
  };
  Custom.init();
})(jQuery);
