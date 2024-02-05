jQuery(document).ready(function () {
  jQuery(".like-post a").click(function () {
    jQuery(this).text("Liked ✌️").off("click");
    jQuery.ajax({
      type: "post",
      dataType: "html",
      url: urlAjax,
      data: {
        action: "handel_like_post",
        post_id: postId,
      },
      success: function (response) {
        console.log(response);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("The following error occured: " + textStatus, errorThrown);
      },
    });
  });
});
