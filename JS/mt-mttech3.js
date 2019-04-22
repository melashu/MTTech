$('document').ready(function () {
    /***
     * This event is used for deleting the blog post 
     */

    $('#mt-for-del').one('change', function (e) {
        // console.log($('button.mt-edit-btn'));
        // console.log(document.getElementsByClassName('button.mt-edit-btn'))
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
        $('button.mt-view').click(function () {
            var id = $(this).parent().parent().find('input').val();
            var display = document.getElementById('mt-display');
            display.scrollIntoView();

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
                    location = 'viewpost.php';
                }, 100)
            } else if (data === 'update') {
                alert('You successfuly update the selected video post ');
                setTimeout(() => {
                    location = 'viewpost.php';
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
