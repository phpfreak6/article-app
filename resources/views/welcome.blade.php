<div class="login_btn">
        <a href="{{route('loogin')}}">Login</a>
</div>
<section class="blog-list">
    <?php
    foreach($articles as $data){
        if(!empty($data->featured_image) ){
            if(strpos($data->featured_image, "https://") !== false){
                $imgpath = $data->featured_image;
            }else{
                $imgg = json_decode($data->featured_image, true);
                $imgpath = "/images/".$data->id."/".$imgg[0];
            }
        }
    ?>
    <div class="post-blogs">
        <div class="blog-txt">
            <a href="<?php echo 'single-article/'.$data->id;?>" target="blank">
                <h4><?php echo $data->name;?></h4>
                <p><?php echo $data->descriptions;?></p>
            </a>
        </div>
        <div class="blog-img">
            <a href="<?php echo 'single-article/'.$data->id;?>" target="blank">
                <img src="<?php echo $imgpath;?>" alt="post" class="img-fluid">
            </a>
        </div>
    </div>
    <?php
    }
    ?>

</section>
<style>
.login_btn a {
    background: #00f;
    color: #fff;
    text-decoration: none;
    padding: 10px 39px;
    margin-right: 30px;
    margin-top: 20px;
}
.login_btn {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
section.blog-list {
    padding: 60px 20px;
    display: inline-flex;
    justify-content: space-between;
    flex-wrap: wrap;
    align-items: flex-start;
}
.post-blogs {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding-bottom: 30px;
    margin-bottom: 30px !important;
    justify-content: space-between;
    width: 48%;
    margin: 0 10px;
}
.blog-txt h4 {
    color: rgba(41, 41, 41, 1);
    margin: 0;
    font-size: 24px;
    font-family: sans-serif;
}
.blog-img {
    width: 25%;
}
.blog-img img {
    width: 100%;
    height: 150px;
}
section.blog-list a {
    text-decoration: none;
}
.blog-txt {
    margin-right: 40px;
    width: 75%;
}
.blog-txt p {
    color: #858585;
    font-size: 17px;
    font-family: sans-serif;
    line-height: 24px;
    margin: 5px 0 0 0;
    max-height: 50px;
    overflow: hidden;
}
body {
    width: 100%;
    overflow-x: hidden;
    max-width: 1300px;
    margin: 0 auto !important;
    background: #f5f5f5;
}
</style>