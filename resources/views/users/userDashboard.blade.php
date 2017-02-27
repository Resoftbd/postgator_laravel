@extends('layouts.user')

@section('title', 'Dashboard')

@section('parent')
@parent
@endsection

@section('content')
<div class="dashboard_body row">
    <div class="col-xs-3 row" style="height:92vh;overflow-y: scroll; background:#fafafa; z-index:1000">
        <div class="col-xs-6" style=" padding-left:20px!important; padding-right:0px;">
            <div class="dash_thumbnail">
                <img src="../assets/img/img18.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img19.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img21.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img22.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img23.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img18.jpg" class="thum_image">
            </div>

            <div class="dash_thumbnail">
                <img src="../assets/img/img21.jpg" class="thum_image">
            </div>
        </div>
        <div class="col-xs-6" style="padding-left:20px!important; padding-right:0px;">
            <div class="dash_thumbnail">
                <div class="dash_thumbnail">
                    <img src="../assets/img/img18.jpg" class="thum_image" style="">
                </div>
                <img src="../assets/img/img23.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img22.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img21.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img19.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img18.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="../assets/img/img23.jpg" class="thum_image">
            </div>
            <button class="btn btn-info" style="border-radius: 22px; font-size:20px; margin:10px; margin-bottom:10px; margin-left:-32px; background:#00A5CF;"><b style="padding: 0px 2px;">+</b></button>

        </div>

    </div>
    <div class="col-xs-9">
        <div class="dash_contents">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#images"><b>Images</b></a></li>
                <li><a data-toggle="tab" href="#vedios"><b>Vedios</b></a></li>
                <li><a data-toggle="tab" href="#texts"><b>Texts</b></a></li>
            </ul><br>


            <div class="tab-content">
                <div id="images" class="tab-pane fade in active dash_tab_content">
                    <form class="form-horizontal text-justify" role="form">

                        <h2>Well,</h2> So, I was talking about posting an image and the link of that image is:
                        <input type="text" class="dash_input" id="imagelink" name="imagelink" placeholder="image link" style="">
                        and plz add
                        <input type="text" class="dash_input" id="imagetext" name="imagetext" placeholder="any caption for image" style="">
                        this caption with that image. O, totally forgot about one more thing, hashtags. Plz add these hashtags
                        <input type="text" class="dash_input" name="hashtags" id="hashtags" placeholder="hashtags, separated by commas">
                        . By the way, you should post these images on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                    </form>


                </div>
                <div id="vedios" class="tab-pane fade dash_tab_content">
                    <form class="form-horizontal" role="form">

                        <h2>Well,</h2> So, I was talking about posting a video and the link of that video is:
                        <input type="text" class="dash_input" id="imagelink" name="imagelink" placeholder="video link" style="">
                        and plz add
                        <input type="text" class="dash_input" id="imagetext" name="imagetext" placeholder="any caption for video" style="">
                        this caption with that video. O, totally forgot about one more thing, hashtags. Plz add these hashtags
                        <input type="text" class="dash_input" name="hashtags" id="hashtags" placeholder="hashtags, separated by commas">
                        . By the way, you should post these vedios on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                    </form>
                </div>
                <div id="texts" class="tab-pane fade dash_tab_content">
                    <form class="form-horizontal" role="form">

                        <h2>Well,</h2> So, I was talking about posting a status. All you have to do is to post this
                        <input type="text" class="dash_input" id="onlytext" name="onlytext" placeholder="any text" style="">
                        into my selected social sites with all these hashtags:
                        <input type="text" class="dash_input" name="hashtags" id="hashtags" placeholder="hashtags, separated by commas">
                        . By the way, you should post this article on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="../assets/img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
@endsection