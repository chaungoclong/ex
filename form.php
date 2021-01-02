<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script>
    function showImg(input) {
            //lấy số lượng file trong thẻ input
            var numberFile = input.files.length;
            // console.log(numberFile);

            //đọc từng file
            for(let i = 0; i < numberFile; ++i) {
                //tạo đối tượng đọc file
                var reader = new FileReader();

              /**
               * [onload description]
               * khi xảy ra sự kiện load lấy kết quả tại vị trí xảy ra sự kiện
               * tạo một thẻ phần tử 'img' để hiển thị
               * gán đường dẫn của hình ảnh bằng kết quả lấy được
               * thêm hình ảnh vào nơi cần thêm
               * 
               */
               reader.onload = function(e) {
                var url = e.target.result;
                var img = $('<img >');
                img.attr('src', url);
                $('#img').append(img);
              }

                //trả kết quả của từng phần tử file dưới dạng url
                reader.readAsDataURL(input.files[i]);
              }
            }

            $(document).ready(function() {
              $('#imgInp').on('change', function() {
                $('#img').html('');
                showImg(this);
              });

              $('#btn-upload').on('click', function(e) {
                e.preventDefault();
                var file = document.querySelector('#imgInp').files[0];
                console.log(file);

                var form = new FormData();
                form.append('ok', file);

                $.ajax({
                  url: 'up_load.php',
                  type: 'post',
                  data: form,
                  dataType: 'text',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(res) {
                    $('#img').html('');
                    alert(res);
                  }

                });
              });

            });
          </script>
        </head>

        <style>
          img{
            height: 100px;
            width: auto;
            margin: 5px;
          }
        </style>
        <body>
          <form>
            <input type='file' id="imgInp" multiple/>
            <br>
            <br>
            <button id="btn-upload">UPLOAD</button>
            <hr>
            <div id="img"></div>
          </form>
        </body>
        </html>
