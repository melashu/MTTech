$('document').ready(function () {
    /***
     * This event is used for deleting the blog post 
     */

    $('#mt-for-del').one('change', function (e) {

        $('button.mt-del-video').click(function () {
            var conform = confirm("Do you want to delete this video");
            if (conform) {
                var id = $(this).parent().parent().find('input').val();
                var data = [];
                data.push(id);
                ajaxToVideoPost(JSON.stringify(data), 'delete');
            }
        });
        /**
         * For viewpost.php and manipulating  video post
         */
        $('button.mt-video-view').click(function () {
            var id = $(this).parent().parent().find('input').val();
            // $('#mt-display').fadeIn();
            // $('#mt-review-video').fadeIn();
            // $('#mt-review-blog').fadeOut();

            previewVideo(id);
        });


        $('button.mt-del-btn').click(function () {
            var conform = confirm("Do you want to delete this blog");
            if (conform) {
                var id = $(this).parent().parent().find('input').val();
                var data = [];
                data.push(id);
                ajaxToBlogPost(JSON.stringify(data), 'delete');
            }
        });

        $('button.mt-edit-btn').click(function () {
            var id = $(this).parent().parent().find('input').val();
            location = "blogpost.php?pid=" + id;
        });
        // console.log($('button.mt-preview-btn'));


        $('button.mt-preview-btn').click(function () {
            var id = $(this).parent().parent().find('input').val();
            $('#mt-display').show(600);
            // $('#mt-review-video').fadeOut();
            // $('#mt-review-blog').fadeIn();

            var display = document.getElementById('mt-display');
            display.scrollIntoView();
            $.ajax({
                url: 'mt-blogpost.php',
                data: { 'row': id, 'data': 'edit' },
                type: 'POST',
                dataType: 'text'
            }).done(function (data) {
                if (data === 'noEdit') {
                    alert('not edited');
                } else {
                    var row = JSON.parse(data);
                    $('#mt-author').text('Author: ' + row['username']);
                    $('#mt-post-date').text('Post Date: ' + row['postdate']);
                    $('#mt-last-update').text('Last Update: ' + row['lastupdate']);
                    $('#mt-post-categorie').text('Categorie: ' + row['categorie']);
                    $('#mt-blog-title').text('Title: ' + row['title']);
                    $('#mt-view-content').html(row['content']);
                }
            });
        });
    });


    var getBlogList = () => {
        var blogCheckBox = document.getElementsByClassName('mt-view-box');
        var arrayValue = [];
        for (let i = 0; i < blogCheckBox.length; i++) {
            if (blogCheckBox[i].checked) {
                arrayValue.push(blogCheckBox[i].value);
            }
        }
        return arrayValue;
    }
    var getVideoList = () => {
        var blogCheckBox = document.getElementsByClassName('mt-view-checkbox');
        var arrayValue = [];
        for (let i = 0; i < blogCheckBox.length; i++) {
            if (blogCheckBox[i].checked) {
                arrayValue.push(blogCheckBox[i].value);
            }
        }
        return arrayValue;
    }
    var ajaxToVideoPost = (result, role) => {
        $.ajax({
            url: 'mt-videopost.php',
            data: { 'row': result, 'role': role },
            type: 'POST',
            dataType: 'text'
        }).done((data) => {
            if (data === 'delete') {
                alert('You successfuly delete the selected video post ');
                setTimeout(() => {
                    showVideoPost();
                    // location = 'viewpost.php';
                }, 100)
            } else if (data === 'update') {
                alert('You successfuly update the selected video post ');
                setTimeout(() => {
                    showVideoPost();
                    // location = 'viewpost.php';
                }, 100)
            } else {
                alert('There may be error please try again ');
            }
        }).fail((responseTxt, statusTxt, xhr) => {

        })
    }
    /***This method is used for any ajax request to any blogpost operation */
    var ajaxToBlogPost = (result, role) => {
        $.ajax({
            url: 'mt-blogpost.php',
            data: { 'row': result, 'role': role },
            type: 'POST',
            dataType: 'text'
        }).done((data) => {
            if (data === 'delete') {
                alert('You successfuly delete the selected blog post');
                setTimeout(() => {
                    location = 'viewpost.php';
                }, 100)
            } else if (data === 'update') {
                alert('You successfuly update the selected blog post');
                setTimeout(() => {
                    location = 'viewpost.php';
                }, 100);
            } else {
                alert('There may be error please try again ');
            }
        }).fail((responseTxt, statusTxt, xhr) => {

        })
    }

    // location = "blogpost.php";
    // $('#mt-title').val('Introduction to jQuery')
    $('#mt-btn-apply').click(() => {
        var $update = $('#mt-view-update');
        //   console.log($update);
        var viewPost = $('#mt-view-post');
        if ($update.val() === '') {
            var style = { 'background-color': 'pink', 'border': '2px solid red' };
            $update.css(style);//set css to the selected element 
        } else if ($update.val() === 'delete') {
            var style = { 'background-color': 'white', 'border': '2px solid lightskyblue' };
            $update.css(style);//set css to the selected element 
            if (viewPost.val() == 'blog') {
                var result = getBlogList();
                if (result.length === 0) {
                    alert('Please select the spesific blog you want to delete')
                } else {
                    ajaxToBlogPost(JSON.stringify(result), 'delete');
                }
            } else {
                var result = getVideoList();
                if (result.length === 0) {
                    alert('Please select the spesific video you want to delete')
                } else {
                    ajaxToVideoPost(JSON.stringify(result), 'delete');
                }
            }
        } else {
            var style = { 'background-color': 'white', 'border': '2px solid lightskyblue' };
            $update.css(style);//set css to the selected element 

            if (viewPost.val() == 'blog') {
                var result = getBlogList();
                // alert(result);
                if (result.length === 0) {
                    alert('Please select the spesific blog you want to set as ' + $update.val())

                } else {
                    ajaxToBlogPost(JSON.stringify(result), $update.val());
                }
            } else {
                var result = getVideoList();
                if (result.length === 0) {
                    alert('Please select the spesific video you want to set as ' + $update.val())
                } else {
                    ajaxToVideoPost(JSON.stringify(result), $update.val());
                }
            }
        }
    });
})


/****
 * for viewpost.php and manipulate video post preview
 */
function previewVideo(para) {
    // $('#mt-display').show(600);
    var display = document.getElementById('mt-display');
    display.scrollIntoView();
    $.ajax({
        url: 'mt-videopost.php',
        data: { 'row': para, 'preview': 'view' },
        type: 'POST',
        dataType: 'text'
    }).done(function (data) {
        if (data === 'no view') {
            alert('View could not viewed');
        } else {
            var row = JSON.parse(data);
            $('#mt-review-blog').hide();
            var display = document.getElementById('mt-display');
            display.scrollIntoView();
            $('#mt-video-author').text('Author: ' + row['username']);
            $('#mt-video-post-date').text('Post Date: ' + row['postdate']);
            $('#mt-video-last-update').text('Last Update: ' + row['lastupdate']);
            $('#mt-video-post-categorie').text('Categorie: ' + row['categorie'] + " Video Post");
            $('#mt-video-blog-title').text('Title: ' + row['title']);
            $('#mt-preview-video').attr('src', row['content']);
            $('#mt-preview-video').attr('poster', row['coverpage']);
        }
    });
}

/***
 * for course.php 
 */