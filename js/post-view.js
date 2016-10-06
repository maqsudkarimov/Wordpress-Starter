var Formdata = new FormData();
Formdata.append('post_id', Ajax.post_id);
Formdata.append('action', 'qwerty_increment_views');

$.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    data: Formdata,
    processData: false,
    contentType: false,
    cache: false,
});
